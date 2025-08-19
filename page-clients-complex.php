<?php
/**
 * Template Name: クライアント一覧
 * 
 * クライアント情報を地図とリストで表示するページ
 * 
 * @package Numaken_Theme
 * @version 2.0.0
 */

// セキュリティチェック
if (!defined('ABSPATH')) {
    exit;
}

get_header();

// クライアントハンドラーを読み込み
if (file_exists(get_template_directory() . '/includes/clients-handler.php')) {
    require_once get_template_directory() . '/includes/clients-handler.php';
}

// グローバルハンドラーインスタンス
global $numaken_clients_handler;

if (!$numaken_clients_handler) {
    echo '<div class="uk-alert-danger" uk-alert><p>システムエラー: クライアントデータを読み込めません。</p></div>';
    get_footer();
    return;
}

// 設定データの取得
$categories = $numaken_clients_handler->get_categories();
$default_coords = $numaken_clients_handler->get_default_coordinates();
$maps_api_key = $numaken_clients_handler->get_maps_api_key();

// APIキーの確認
if (empty($maps_api_key)) {
    echo '<div class="uk-alert-warning" uk-alert><p>Google Maps APIキーが設定されていません。</p></div>';
}
?>

<main class="numaken-clients-page">
    <!-- ヒーローセクション -->
    <section class="uk-section cta-section">
        <div class="uk-container">
            <div class="uk-text-center">
                <h1 class="uk-heading-primary uk-margin-remove-bottom">Clients</h1>
                <h2 class="uk-h3 uk-margin-small-top uk-text-muted">導入店ご紹介</h2>
                <div class="uk-width-1-2@s uk-align-center">
                    <hr class="uk-divider-icon">
                </div>
            </div>
        </div>
    </section>

    <!-- メインコンテンツ -->
    <section class="uk-section">
        <div class="uk-container">
            
            <!-- ピン数表示エリア -->
            <div id="numaken-pin-count" class="uk-text-center uk-margin" aria-live="polite"></div>

            <!-- コントロールパネル -->
            <div class="uk-card uk-card-default uk-card-body uk-margin-medium">
                
                <!-- カテゴリフィルター -->
                <div class="uk-margin-medium">
                    <label class="uk-form-label uk-text-bold" for="numaken-category-filter">
                        <span uk-icon="tag" class="uk-margin-small-right"></span>
                        カテゴリで絞り込み
                    </label>
                    <div id="numaken-category-filter" class="uk-flex uk-flex-wrap uk-flex-center uk-margin-small-top" role="group" aria-label="カテゴリフィルター">
                        <button class="uk-button uk-button-text" 
                                data-category="" 
                                aria-pressed="true">
                            すべてのカテゴリ
                        </button>
                        <?php if (!empty($categories)) : ?>
                            <?php foreach ($categories as $category) : ?>
                                <?php if (!empty($category)) : ?>
                                    <button class="uk-button uk-button-text" 
                                            data-category="<?php echo esc_attr($category); ?>"
                                            aria-pressed="false">
                                        <?php echo esc_html($category); ?>
                                    </button>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="uk-text-muted">カテゴリデータを読み込み中...</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- キーワード検索 -->
                <div class="uk-margin">
                    <label class="uk-form-label uk-text-bold" for="numaken-search-input">
                        <span uk-icon="search" class="uk-margin-small-right"></span>
                        キーワード検索
                    </label>
                    <div class="uk-form-controls uk-margin-small-top">
                        <input type="text" 
                               id="numaken-search-input" 
                               class="uk-input uk-form-width-large" 
                               placeholder="店名、地域、サービス内容で検索"
                               aria-describedby="search-help">
                        <div id="search-help" class="uk-text-meta uk-margin-small-top">
                            入力すると自動的に検索結果が更新されます
                        </div>
                    </div>
                </div>

            </div>

            <!-- タブナビゲーション -->
            <div class="uk-margin-medium">
                <ul class="uk-tab uk-flex-center" uk-tab="connect: .uk-switcher">
                    <li class="uk-active"><a href="#"><span uk-icon="location" class="uk-margin-small-right"></span>地図表示</a></li>
                    <li><a href="#"><span uk-icon="list" class="uk-margin-small-right"></span>一覧表示</a></li>
                </ul>
            </div>

            <!-- コンテンツ切り替えエリア -->
            <ul class="uk-switcher uk-margin">
                
                <!-- 地図表示タブ -->
                <li>
                    <div class="uk-card uk-card-default">
                        <div id="numaken-clients-map" 
                             class="numaken-map-container" 
                             style="width: 100%; height: 600px; min-height: 400px;"
                             role="application" 
                             aria-label="クライアント所在地マップ"
                             tabindex="0">
                            <div class="uk-text-center uk-margin-large-top uk-margin-large-bottom">
                                <div uk-spinner="ratio: 2"></div>
                                <p class="uk-text-muted uk-margin-small-top">地図を読み込み中...</p>
                            </div>
                        </div>
                        <div class="uk-card-footer uk-text-meta uk-text-small">
                            <p><span uk-icon="info"></span> 地図上のマーカーをクリックすると詳細情報が表示されます</p>
                        </div>
                    </div>
                </li>
                
                <!-- 一覧表示タブ -->
                <li>
                    <div id="numaken-clients-list" 
                         class="uk-grid-match uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l uk-grid-small" 
                         uk-grid
                         role="region"
                         aria-label="クライアント一覧">
                        <!-- 動的に更新されるコンテンツ -->
                        <div class="uk-text-center uk-margin-large">
                            <div uk-spinner="ratio: 2"></div>
                            <p class="uk-text-muted">クライアント情報を読み込み中...</p>
                        </div>
                    </div>
                </li>
                
            </ul>

        </div>
    </section>
</main>

<!-- クライアント詳細モーダル -->
<div id="numaken-client-modal" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog uk-flex">
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close aria-label="モーダルを閉じる"></button>
        <div class="uk-modal-body uk-margin-auto-vertical">
            <!-- 動的に更新されるコンテンツ -->
        </div>
    </div>
</div>

<!-- クライアントマップの設定はfunctions.phpで行われます -->
<script>
// デバッグ情報
console.log('Client page debug info:', {
    hasGoogleMaps: typeof google !== 'undefined',
    hasConfig: typeof numakenClientsConfig !== 'undefined',
    config: window.numakenClientsConfig,
    categoriesCount: <?php echo count($categories); ?>,
    apiKey: <?php echo json_encode(!empty($maps_api_key) ? 'configured' : 'not configured'); ?>
});
</script>

<?php
// Google Maps APIキーが設定されている場合のみ地図を読み込み
if (!empty($maps_api_key)) :
?>
<script async defer 
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_attr($maps_api_key); ?>&callback=initNumakenClientsMap&libraries=geometry"
        onerror="console.error('Google Maps API failed to load')"></script>
<?php endif; ?>

<?php get_footer();
