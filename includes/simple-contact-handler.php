<?php
/**
 * シンプルなお問い合わせフォーム処理
 */

function simple_contact_form_handler() {
    // 基本的なセキュリティチェック
    if (!wp_verify_nonce($_POST['contact_form_nonce_field'], 'contact_form_nonce')) {
        wp_redirect(add_query_arg('success', 'false', wp_get_referer()));
        exit;
    }
    
    // 基本データの取得
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $subject = sanitize_text_field($_POST['subject'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    $how_found = sanitize_text_field($_POST['how_did_you_find_us'] ?? '');
    $partner_interest = sanitize_text_field($_POST['interested_in_partner'] ?? '');
    
    // 簡単なバリデーション
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        wp_redirect(add_query_arg('success', 'false', wp_get_referer()));
        exit;
    }
    
    if (!is_email($email)) {
        wp_redirect(add_query_arg('success', 'false', wp_get_referer()));
        exit;
    }
    
    // メール送信
    $admin_email = get_option('admin_email');
    $mail_subject = '【panolabo】新しいお問い合わせ: ' . $subject;
    
    $mail_message = "新しいお問い合わせが届きました。\n\n";
    $mail_message .= "お名前: " . $name . "\n";
    $mail_message .= "メールアドレス: " . $email . "\n";
    $mail_message .= "お問い合わせ種別: " . $subject . "\n";
    $mail_message .= "どこでお知りになったか: " . $how_found . "\n";
    $mail_message .= "パートナーに関心: " . $partner_interest . "\n\n";
    $mail_message .= "お問い合わせ内容:\n" . $message . "\n\n";
    $mail_message .= "送信日時: " . current_time('Y-m-d H:i:s') . "\n";
    
    $headers = [
        'From: panolabo <hello@panolabollc.com>',
        'Reply-To: ' . $email
    ];
    
    $mail_sent = wp_mail($admin_email, $mail_subject, $mail_message, $headers);
    
    if ($mail_sent) {
        wp_redirect(add_query_arg('success', 'true', wp_get_referer()));
    } else {
        wp_redirect(add_query_arg('success', 'false', wp_get_referer()));
    }
    exit;
}

// アクションフックの登録
add_action('admin_post_contact_form', 'simple_contact_form_handler');
add_action('admin_post_nopriv_contact_form', 'simple_contact_form_handler');
?>