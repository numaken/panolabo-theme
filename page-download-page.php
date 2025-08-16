<?php
/**
 * Template Name: アドオンダウンロードページ
 * 
 * WordPressの固定ページで使用
 * パスワード保護を有効にして、注文番号をパスワードに設定
 */

// パスワード保護の確認
if (!post_password_required()) :
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panolabo Togo アドオン ダウンロード</title>
    <?php wp_head(); ?>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        
        .download-container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .download-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }
        
        .download-header h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
        }
        
        .download-header p {
            margin: 0;
            opacity: 0.9;
        }
        
        .download-content {
            padding: 40px;
        }
        
        .download-box {
            background: #f8f9ff;
            border: 2px dashed #667eea;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .download-button {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 15px 40px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .download-button:hover {
            background: #5a67d8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        
        .file-info {
            margin-top: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 6px;
            text-align: left;
        }
        
        .file-info h3 {
            margin-top: 0;
            color: #333;
        }
        
        .file-info dl {
            margin: 0;
        }
        
        .file-info dt {
            font-weight: bold;
            color: #666;
            margin-top: 10px;
        }
        
        .file-info dd {
            margin: 5px 0 0 0;
            color: #333;
        }
        
        .instructions {
            margin-top: 30px;
        }
        
        .instructions h2 {
            color: #333;
            font-size: 20px;
            margin-bottom: 15px;
        }
        
        .instructions ol {
            line-height: 1.8;
            padding-left: 20px;
        }
        
        .instructions code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
        }
        
        .support-section {
            margin-top: 40px;
            padding: 25px;
            background: #e8f4f8;
            border-radius: 8px;
            text-align: center;
        }
        
        .support-section h3 {
            margin-top: 0;
            color: #333;
        }
        
        .license-reminder {
            background: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 30px;
        }
        
        .license-reminder strong {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="download-container">
        <div class="download-header">
            <h1>ダウンロードページ</h1>
            <p>Panolabo Togo カード決済アドオン</p>
        </div>
        
        <div class="download-content">
            <div class="license-reminder">
                <strong>⚠️ ライセンスキーは大切に保管してください</strong>
                ライセンスキーは購入確認メールに記載されています。プラグイン有効化時に必要となります。
            </div>
            
            <div class="download-box">
                <h2 style="margin-top: 0;">プラグインファイル</h2>
                <p>下のボタンをクリックしてダウンロードしてください</p>
                <a href="<?php echo esc_url(plugin_dir_url(__FILE__) . 'downloads/panolabo-togo-addon-card-v1.0.0.zip'); ?>" 
                   class="download-button" 
                   download>
                    ダウンロード（ZIP形式）
                </a>
                
                <div class="file-info">
                    <h3>ファイル情報</h3>
                    <dl>
                        <dt>ファイル名</dt>
                        <dd>panolabo-togo-addon-card-v1.0.0.zip</dd>
                        
                        <dt>バージョン</dt>
                        <dd>1.0.0</dd>
                        
                        <dt>ファイルサイズ</dt>
                        <dd>約 250KB</dd>
                        
                        <dt>動作環境</dt>
                        <dd>WordPress 5.8以上 / PHP 7.4以上</dd>
                    </dl>
                </div>
            </div>
            
            <div class="instructions">
                <h2>インストール方法</h2>
                <ol>
                    <li>WordPress管理画面にログイン</li>
                    <li><strong>プラグイン</strong> → <strong>新規追加</strong> をクリック</li>
                    <li><strong>プラグインのアップロード</strong> ボタンをクリック</li>
                    <li>ダウンロードした <code>panolabo-togo-addon-card-v1.0.0.zip</code> を選択</li>
                    <li><strong>今すぐインストール</strong> をクリック</li>
                    <li>インストール完了後、<strong>プラグインを有効化</strong> をクリック</li>
                    <li>管理画面の <strong>テイクアウト設定</strong> → <strong>ライセンス認証</strong> へ移動</li>
                    <li>購入時のメールに記載されたライセンスキーを入力して認証</li>
                </ol>
            </div>
            
            <div class="support-section">
                <h3>サポート情報</h3>
                <p>インストールやご利用に関してご不明な点がございましたら<br>お気軽にお問い合わせください。</p>
                <p>
                    <strong>メール:</strong> support@panolabo.com<br>
                    <strong>営業時間:</strong> 平日 10:00-18:00
                </p>
            </div>
        </div>
    </div>
    
    <?php wp_footer(); ?>
</body>
</html>

<?php
else :
    // パスワード入力フォーム（WordPressデフォルト）
    echo get_the_password_form();
endif;
?>