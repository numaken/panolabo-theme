<?php
/**
 * お問い合わせフォーム処理ハンドラー
 * セキュリティ強化・バリデーション・メール送信機能
 */

/**
 * お問い合わせフォーム送信処理（新版）
 */
function panolabo_handle_contact_form_submission() {
    // デバッグ用：送信されたデータをログに記録
    error_log('Contact form submission received. POST data: ' . print_r($_POST, true));
    
    // セキュリティチェック（新旧フォーム対応）
    $nonce_field = $_POST['_wpnonce'] ?? $_POST['contact_form_nonce_field'] ?? '';
    $nonce_action = 'panolabo_contact_form';
    
    // 旧フォーム互換性チェック
    if (isset($_POST['contact_form_nonce_field'])) {
        $nonce_action = 'contact_form_nonce';
    }
    
    // デバッグ用：ナンス情報をログに記録
    error_log('Nonce field: ' . $nonce_field . ', Action: ' . $nonce_action);
    
    if (!$nonce_field || !wp_verify_nonce($nonce_field, $nonce_action)) {
        error_log('Nonce verification failed');
        wp_die('セキュリティエラー: 不正なリクエストです。', 'Security Error', ['response' => 403]);
    }
    
    // スパム対策: Honeypot
    if (!empty($_POST['honeypot'])) {
        wp_die('スパム検出: 不正な送信です。', 'Spam Detected', ['response' => 403]);
    }
    
    // レート制限チェック
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    $rate_limit_key = 'contact_form_' . md5($ip);
    $submissions = get_transient($rate_limit_key) ?: 0;
    
    if ($submissions >= 5) {
        wp_send_json_error([
            'message' => '送信回数の制限に達しました。1時間後に再度お試しください。'
        ], 429);
    }
    
    // 入力データの取得・サニタイゼーション（新旧フォーム対応）
    $form_data = [
        'name' => sanitize_text_field($_POST['contact_name'] ?? $_POST['name'] ?? ''),
        'company' => sanitize_text_field($_POST['contact_company'] ?? ''),
        'email' => sanitize_email($_POST['contact_email'] ?? $_POST['email'] ?? ''),
        'phone' => sanitize_text_field($_POST['contact_phone'] ?? ''),
        'type' => sanitize_text_field($_POST['contact_type'] ?? $_POST['subject'] ?? ''),
        'budget' => sanitize_text_field($_POST['contact_budget'] ?? ''),
        'timeline' => sanitize_text_field($_POST['contact_timeline'] ?? ''),
        'message' => sanitize_textarea_field($_POST['contact_message'] ?? $_POST['message'] ?? ''),
        'privacy_consent' => isset($_POST['privacy_consent']) ? 'はい' : 'いいえ',
        'how_found' => sanitize_text_field($_POST['how_did_you_find_us'] ?? ''),
        'partner_interest' => sanitize_text_field($_POST['interested_in_partner'] ?? '')
    ];
    
    // バリデーション
    error_log('Form data for validation: ' . print_r($form_data, true));
    $validation_errors = validate_contact_form($form_data);
    error_log('Validation errors: ' . print_r($validation_errors, true));
    
    if (!empty($validation_errors)) {
        // 旧フォームの場合はリダイレクト処理
        if (isset($_POST['contact_form_nonce_field'])) {
            $redirect_url = add_query_arg([
                'success' => 'false',
                'errors' => urlencode(implode(', ', $validation_errors))
            ], wp_get_referer());
            wp_redirect($redirect_url);
            exit;
        }
        
        wp_send_json_error([
            'message' => '入力内容に不備があります。',
            'errors' => $validation_errors
        ], 400);
    }
    
    // メール送信
    $email_sent = send_contact_email($form_data);
    
    if ($email_sent) {
        // 送信成功時の処理
        increment_rate_limit($rate_limit_key);
        save_contact_submission($form_data);
        
        // 旧フォームの場合はリダイレクト処理
        if (isset($_POST['contact_form_nonce_field'])) {
            wp_redirect(add_query_arg('success', 'true', wp_get_referer()));
            exit;
        }
        
        // 新フォームの場合はJSON レスポンス
        wp_send_json_success([
            'message' => 'お問い合わせありがとうございました。24時間以内にご返答いたします。'
        ]);
    } else {
        // 旧フォームの場合はリダイレクト処理
        if (isset($_POST['contact_form_nonce_field'])) {
            wp_redirect(add_query_arg('success', 'false', wp_get_referer()));
            exit;
        }
        
        // 新フォームの場合はJSON レスポンス
        wp_send_json_error([
            'message' => 'メール送信に失敗しました。しばらく時間をおいて再度お試しください。'
        ], 500);
    }
}

/**
 * フォームデータのバリデーション
 */
function validate_contact_form($data) {
    $errors = [];
    
    // 必須フィールドチェック
    if (empty($data['name'])) {
        $errors['name'] = 'お名前を入力してください。';
    } elseif (strlen($data['name']) > 100) {
        $errors['name'] = 'お名前は100文字以内で入力してください。';
    }
    
    if (empty($data['email'])) {
        $errors['email'] = 'メールアドレスを入力してください。';
    } elseif (!is_email($data['email'])) {
        $errors['email'] = '正しいメールアドレスを入力してください。';
    }
    
    if (empty($data['type'])) {
        $errors['type'] = 'お問い合わせ種別を選択してください。';
    } elseif (!in_array($data['type'], ['サービスについて', 'パートナーシップ', '採用について', 'VR制作', 'アプリ開発', 'Web制作', 'AI統合', '技術相談', 'その他'])) {
        $errors['type'] = '不正なお問い合わせ種別が選択されています。';
    }
    
    if (empty($data['message'])) {
        $errors['message'] = 'お問い合わせ内容を入力してください。';
    } elseif (strlen($data['message']) < 10) {
        $errors['message'] = 'お問い合わせ内容は10文字以上入力してください。';
    } elseif (strlen($data['message']) > 2000) {
        $errors['message'] = 'お問い合わせ内容は2000文字以内で入力してください。';
    }
    
    // 必須項目のチェック
    if (empty($data['how_found'])) {
        $errors['how_found'] = 'どこでお知りになったかを選択してください。';
    }
    
    if (empty($data['partner_interest'])) {
        $errors['partner_interest'] = 'パートナーに関心があるかをお答えください。';
    }
    
    // プライバシー同意チェック（任意項目として扱う）
    // if ($data['privacy_consent'] !== 'はい') {
    //     $errors['privacy_consent'] = 'プライバシーポリシーに同意してください。';
    // }
    
    // 電話番号の形式チェック（任意項目）
    if (!empty($data['phone']) && !preg_match('/^[\d\-\(\)\+\s]+$/', $data['phone'])) {
        $errors['phone'] = '正しい電話番号を入力してください。';
    }
    
    return $errors;
}

/**
 * お問い合わせメールの送信
 */
function send_contact_email($data) {
    $admin_email = get_option('admin_email');
    $company_email = 'hello@panolabollc.com';
    
    // 管理者宛メール
    $admin_subject = '【panolabo】新しいお問い合わせ: ' . $data['type'];
    $admin_message = format_admin_email_message($data);
    
    // 顧客宛自動返信メール
    $customer_subject = '【panolabo】お問い合わせありがとうございます';
    $customer_message = format_customer_email_message($data);
    
    // メールヘッダー設定
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: panolabo <' . $company_email . '>',
        'Reply-To: ' . $company_email
    ];
    
    // 管理者宛メール送信
    $admin_sent = wp_mail($admin_email, $admin_subject, $admin_message, $headers);
    
    // 顧客宛自動返信メール送信
    $customer_headers = $headers;
    $customer_headers[] = 'Reply-To: ' . $company_email;
    $customer_sent = wp_mail($data['email'], $customer_subject, $customer_message, $customer_headers);
    
    // ログ記録
    if ($admin_sent && $customer_sent) {
        error_log('Contact form submission successful - Email: ' . $data['email'] . ', Type: ' . $data['type']);
        return true;
    } else {
        error_log('Contact form email failed - Admin: ' . ($admin_sent ? 'OK' : 'FAILED') . ', Customer: ' . ($customer_sent ? 'OK' : 'FAILED'));
        return false;
    }
}

/**
 * 管理者宛メール本文の生成
 */
function format_admin_email_message($data) {
    $timestamp = current_time('Y-m-d H:i:s');
    
    return '
    <html>
    <head>
        <meta charset="UTF-8">
        <title>新しいお問い合わせ</title>
    </head>
    <body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
        <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
            <h2 style="color: #1e87f0; border-bottom: 2px solid #1e87f0; padding-bottom: 10px;">
                新しいお問い合わせが届きました
            </h2>
            
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;">
                <h3 style="margin-top: 0;">お客様情報</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd; font-weight: bold;">お名前:</td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">' . esc_html($data['name']) . '</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd; font-weight: bold;">会社名:</td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">' . esc_html($data['company'] ?: '未記入') . '</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd; font-weight: bold;">メール:</td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <a href="mailto:' . esc_attr($data['email']) . '">' . esc_html($data['email']) . '</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd; font-weight: bold;">電話:</td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">' . esc_html($data['phone'] ?: '未記入') . '</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd; font-weight: bold;">種別:</td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;"><strong>' . esc_html($data['type']) . '</strong></td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd; font-weight: bold;">予算:</td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">' . esc_html($data['budget'] ?: '未記入') . '</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd; font-weight: bold;">時期:</td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">' . esc_html($data['timeline'] ?: '未記入') . '</td>
                    </tr>
                </table>
            </div>
            
            <div style="background: #fff; padding: 15px; border: 1px solid #ddd; border-radius: 5px; margin: 20px 0;">
                <h3 style="margin-top: 0;">お問い合わせ内容</h3>
                <div style="white-space: pre-wrap;">' . esc_html($data['message']) . '</div>
            </div>
            
            <div style="text-align: right; color: #666; font-size: 12px;">
                受信日時: ' . $timestamp . '
            </div>
        </div>
    </body>
    </html>';
}

/**
 * 顧客宛自動返信メール本文の生成
 */
function format_customer_email_message($data) {
    return '
    <html>
    <head>
        <meta charset="UTF-8">
        <title>お問い合わせありがとうございます</title>
    </head>
    <body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
        <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
            <h2 style="color: #1e87f0; text-align: center;">
                お問い合わせありがとうございます
            </h2>
            
            <p>' . esc_html($data['name']) . ' 様</p>
            
            <p>この度は、panolaboにお問い合わせいただき、誠にありがとうございます。</p>
            
            <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;">
                <h3 style="margin-top: 0;">受付内容</h3>
                <p><strong>お問い合わせ種別:</strong> ' . esc_html($data['type']) . '</p>
                <p><strong>受付日時:</strong> ' . current_time('Y年n月j日 H:i') . '</p>
            </div>
            
            <p>
                内容を確認の上、<strong>24時間以内</strong>にご返答させていただきます。
            </p>
            
            <div style="border: 1px solid #ddd; padding: 15px; border-radius: 5px; margin: 20px 0;">
                <h4 style="margin-top: 0;">次のステップ</h4>
                <ol>
                    <li>担当者より詳細確認のご連絡</li>
                    <li>要件・予算などのヒアリング</li>
                    <li>最適なソリューションのご提案</li>
                    <li>お見積もり・スケジュール調整</li>
                </ol>
            </div>
            
            <p style="text-align: center; margin: 30px 0;">
                <a href="https://panolabollc.com/" style="background: #1e87f0; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                    panolaboサイトを見る
                </a>
            </p>
            
            <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">
            
            <div style="text-align: center; color: #666; font-size: 14px;">
                <p>
                    <strong>合同会社panolabo</strong><br>
                    Email: hello@panolabollc.com<br>
                    Web: https://panolabollc.com/
                </p>
                <p style="font-size: 12px;">
                    このメールに心当たりがない場合は、お手数ですが削除をお願いいたします。
                </p>
            </div>
        </div>
    </body>
    </html>';
}

/**
 * レート制限カウンタの増加
 */
function increment_rate_limit($key) {
    $count = get_transient($key) ?: 0;
    set_transient($key, $count + 1, HOUR_IN_SECONDS);
}

/**
 * お問い合わせ内容をデータベースに保存
 */
function save_contact_submission($data) {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'panolabo_contacts';
    
    // テーブルが存在しない場合は作成
    $wpdb->query("CREATE TABLE IF NOT EXISTS $table_name (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        company varchar(255),
        email varchar(255) NOT NULL,
        phone varchar(50),
        type varchar(100) NOT NULL,
        budget varchar(100),
        timeline varchar(100),
        message text NOT NULL,
        ip_address varchar(45),
        user_agent text,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        KEY email (email),
        KEY type (type),
        KEY created_at (created_at)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    
    // データ挿入
    $wpdb->insert($table_name, [
        'name' => $data['name'],
        'company' => $data['company'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'type' => $data['type'],
        'budget' => $data['budget'],
        'timeline' => $data['timeline'],
        'message' => $data['message'],
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? ''
    ]);
}

// WordPress用のアクションフック登録
add_action('wp_ajax_panolabo_contact_form', 'panolabo_handle_contact_form_submission');
add_action('wp_ajax_nopriv_panolabo_contact_form', 'panolabo_handle_contact_form_submission');

// 旧形式のアクション（既存フォーム互換性のため）
add_action('admin_post_contact_form', 'panolabo_handle_contact_form_submission');
add_action('admin_post_nopriv_contact_form', 'panolabo_handle_contact_form_submission');
?>