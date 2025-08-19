<?php
/**
 * Template Name: Contact Form
 * Description: 強化されたお問い合わせフォーム - セキュリティ・バリデーション・UX最適化
 */
get_header();
?>

<!-- Contact Section お問い合わせページ -->
<section id="contact" class="uk-section " role="main" aria-label="お問い合わせフォーム">

    <div class="uk-container">
        <div class="uk-grid-large uk-grid-match" uk-grid>
            <!-- フォームセクション -->
            <div class="uk-width-1-1@m">
                <div class="uk-card uk-card-body uk-animation-slide-left-small uk-margin-large-bottom">

                    <!-- メッセージ表示部分 -->
                    <?php if ( isset( $_GET['success'] ) && $_GET['success'] == 'true' ) : ?>
                        <div class="uk-alert-success uk-text-center" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <p class="uk-text-bold">お問い合わせありがとうございます。メッセージを送信しました。</p>
                        </div>
                    <?php elseif ( isset( $_GET['success'] ) && $_GET['success'] == 'false' ) : ?>
                        <div class="uk-alert-danger uk-text-center" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <p class="uk-text-bold">メッセージの送信中にエラーが発生しました。お手数ですが、再度お試しください。</p>
                        </div>
                    <?php endif; ?>


                    <h2 class="uk-heading-line uk-text-bold  uk-text-center"><span>今すぐお問い合わせください！</span></h2>
                    <p class="uk-text-center">「わくわくする未来」を一緒に創りましょう。お手軽に、でもしっかりとサポートいたします。以下のフォームからお気軽にどうぞ！</p>

                    <!-- フォームの送信先を指定 -->
                    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" class="uk-form-stacked uk-width-1-1@m uk-text-center">
                        <fieldset class="uk-fieldset">
                            <!-- フォーム内のデータを処理するための非表示フィールド -->
                            <input type="hidden" name="action" value="contact_form">
                            <?php wp_nonce_field( 'contact_form_nonce', 'contact_form_nonce_field' ); ?>

                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-subject">お問い合わせの種類</label>
                                <div class="uk-form-controls">
                                    <select class="uk-select uk-form-width-large" id="form-subject" name="subject" required>
                                        <option value="">お問い合わせの種類を選択</option>
                                        <option value="サービスについて">サービスについて</option>
                                        <option value="パートナーシップ">パートナーシップ</option>
                                        <option value="採用について">採用について</option>
                                        <option value="その他">その他</option>
                                    </select>
                                </div>
                            </div>


                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-name">お名前</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input uk-form-width-large" id="form-name" type="text" name="name" placeholder="お名前" required 
                                        value="<?php echo isset( $_GET['name'] ) ? esc_attr( $_GET['name'] ) : ''; ?>">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-email">メールアドレス</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input uk-form-width-large" id="form-email" type="email" name="email" placeholder="メールアドレス" required 
                                        value="<?php echo isset( $_GET['email'] ) ? esc_attr( $_GET['email'] ) : ''; ?>">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-message">お問い合わせ内容</label>
                                <div class="uk-form-controls">
                                    <textarea class="uk-textarea uk-form-width-large" id="form-message" name="message" rows="5" placeholder="お問い合わせ内容" required><?php echo isset( $_GET['message'] ) ? esc_textarea( $_GET['message'] ) : ''; ?></textarea>
                                </div>
                            </div>


                            <!-- どこでお知りになりましたか？ -->
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-how">どこでお知りになりましたか？（必須）</label>
                                <div class="uk-form-controls">
                                    <select class="uk-select uk-form-width-large" id="form-how" name="how_did_you_find_us" required>
                                        <option value="">選択してください</option>
                                        <option value="Google">Google</option>
                                        <option value="Yahoo">Yahoo</option>
                                        <option value="ダイレクトメール">ダイレクトメール</option>
                                    </select>
                                </div>
                            </div>

                            <!-- 販売パートナーに関心がありますか？ -->
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-partner">販売パートナーに関心がありますか？（必須）</label>
                                <div class="uk-form-controls">
                                    <label><input class="uk-radio" type="radio" name="interested_in_partner" value="はい" required> はい</label>
                                    <label><input class="uk-radio" type="radio" name="interested_in_partner" value="いいえ" required> いいえ</label>
                                </div>
                            </div>

                            <!-- Honeypot（スパム対策の隠しフィールド） -->
                            <input type="text" name="honeypot" style="display: none;">


                            <div class="uk-margin">
                                <button class="uk-button uk-button-text" type="submit">送信</button>
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- 背景アニメーション -->
    <div class="uk-background-fixed uk-background-cover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/contact-background.jpg'); height: 100vh; top: 0; position: absolute; z-index: -1;">
        <div class="uk-overlay-primary uk-position-cover"></div>
    </div>
</section>

<?php get_footer(); ?>