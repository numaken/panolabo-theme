<?php
/*
Template Name: VRパノラマ現像所
*/
get_header();

// 環境変数からAPIキーを取得
$google_maps_api_key = defined('GOOGLE_MAPS_API_KEY') ? GOOGLE_MAPS_API_KEY : '';

// 外部APIからデータを取得
global $code;
$code = 'https://api.panolabo.com/contents/1170';

$context = stream_context_create(array(
    'http' => array(
        'ignore_errors' => true,
    )
));

$json = @file_get_contents($code, false, $context);
global $obj;
$obj = ($json !== false) ? json_decode($json, true) : [];

?>

<!-- ヒーローセクション -->
<section class="uk-section   parallax"
  style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/frontpage/hero-bg.jpg'); background-size: cover; background-position: center;"
  data-bg-mobile="<?php echo get_template_directory_uri(); ?>/images/frontpage/hero-bg.jpg">
  <div class="uk-container">
    <div class="uk-padding">
      <div class="uk-grid uk-child-width-1-2@m" uk-grid>
        <div class="uk-animation-slide-left">
          <h1 class="hero-title  uk-text-bold">VRで「空間」の魅力を最大限に伝える</h1>
          <h3 class="uk-text-bold"><span>全方位を伝える — それがパノラマの真髄</span></h3>
          <p>通常の写真や動画では、カメラのフレーム内に「見せたいもの」だけを収めます。しかし、パノラマ撮影ではフレームという概念が存在しません。すべての方向を映し出し、視聴者が自由に視点を選ぶことができます。</p>

          <p>"紙とWebを近づける"、"アップセルする"、"媒体価値をあげる" などをお考えの地域メディアの皆様、ぜひご検討ください。</p>
          <a href="#contact" class="uk-button uk-button-text">お問い合わせ</a>
        </div>

        <div class="uk-cover-container uk-height-large">
            <iframe
                  src="https://s3-ap-northeast-1.amazonaws.com/static.panolabo.com/155/1087/74213012408102/index.html"
                  width="100%"
                  height="90%"
                  frameborder="0"
                  allowfullscreen
                  style="
                      transform: scale(1);
                      transform-origin: top left;
                      border-radius: 15px; /* 角を丸くする */
                      overflow: hidden; /* 角の部分をクリップ */
                  "
            >
            </iframe>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- パノラマの特性 -->
<section class="uk-section  uk-padding-large">
  <div class="uk-container">
    <p class="uk-text-center">だからこそ、パノラマ撮影には特別な技術や構図のセンスは必要ありません。</p>
    <ul class="uk-list uk-list-bullet">
      <li><strong>構図不要</strong> - すべての方向を撮影するから、画角に悩む必要なし！</li>
      <li><strong>露出不要</strong> - HDRで撮影するから、明暗差のある環境でもバランスよく！</li>
      <li><strong>ピント不要</strong> - パンフォーカスだから、すべてがシャープ！</li>
    </ul>
    <h3 class="uk-text-bold">では、パノラマで最も重要なのは何か？ それは<strong>「どこに立つか」</strong>です。</h3>
    <p>撮影者は、ただカメラを置くだけではなく、「この場所に立ったとき、見る人が何を感じるか？」を考え抜く必要があります。</p>
    <h3 class="uk-text-bold">視点を設計することで、魅力的なパノラマコンテンツに</h3>
    <p>優れたパノラマコンテンツとは、単に360°を撮影したものではありません。どの方向を向いても発見があるように設計することが重要です。</p>
    <p>そのために私たちは、次の3つの視点をコンテンツに必ず取り入れます：</p>
    <ul class="uk-list uk-list-decimal">
      <li><strong>第一被写体（主役）</strong> - 例えば、美しい建築や特別な展示物</li>
      <li><strong>補助的な視点（視線誘導）</strong> - 斜め後ろに意外な発見を配置</li>
      <li><strong>追加の驚き（立体感の演出）</strong> - 視線を上や下に誘導する要素</li>
    </ul>
    <p>このように「見るべきポイントを3ヶ所以上」設計することで、ただグルグル回すだけのコンテンツではなく、視聴者が自分で探索し、発見できるVR体験が生まれます。</p>
  </div>
</section>

<!-- Googleマップセクション -->
<section class="uk-section   uk-background-cover parallax" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/success-bg.jpg');"
  data-bg-mobile="<?php echo get_template_directory_uri(); ?>/images/success-bg.jpg">
    <div class="uk-container">
        <h2 class="uk-heading-line uk-text-center uk-animation-slide-bottom  uk-text-bold"><span>全ての業種に適用！</span></h2>
        <p class="uk-text-center uk-padding uk-padding-remove-bottom">飲食店、エステ、美容院、コーポレイト、ECサイト、学校、病院、ホテル、旅行社、工務店、アーティスト、アスリート、個人、<br>デザインやメニュー名なども自由に変更ができます。</p>
        <div class="uk-text-center">
            <h1>Clients</h1>
        </div>
        <h3 class="uk-text-center uk-padding uk-padding-remove-bottom">弊社の実績として、現在VR化された店舗数は約500社（2015年〜）となっており、<br>販売されている店舗は年間約200店舗となっております。</h3>

        <?php
        // データベースに接続
        global $wpdb;

        // カテゴリを取得
        $categories = $wpdb->get_col("SELECT DISTINCT main_category FROM wp_panolabo_contents ORDER BY main_category ASC");


        // デフォルト位置（愛知県一宮市）
        $default_lat = 35.3056;
        $default_lng = 136.8006;

        ?>

        <div class="uk-text-center">

            <!-- カテゴリフィルター -->
            <div id="categoryFilter" class="uk-flex uk-flex-wrap uk-flex-center uk-margin-small-top">
                <button class="uk-button uk-button-text" data-category="">すべてのカテゴリ</button>
                <?php foreach ($categories as $category) : ?>
                    <?php if (!empty($category)) : ?>
                        <button class="uk-button uk-button-text" data-category="<?php echo esc_attr($category); ?>"><?php echo esc_html($category); ?></button>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- キーワード検索 
            <div class="uk-margin">
                <input type="text" id="searchInput" class="uk-input uk-form-width-large" placeholder="キーワードで検索">
            </div>-->

        </div>

        <!-- マップエリア -->
        <div id="map" class="uk-margin-large-top" style="width: 100%; height: 600px;"></div>
        <div class="uk-text-center uk-margin-large-top uk-animation-fade">
            <a href="<?php echo home_url('/clients'); ?>" class="uk-align-center uk-button uk-button-danger uk-button-large uk-button-hover-pulse uk-scrollspy-inview -up" uk-scrollspy="cls: uk-animation-scale-up; delay: 500;" style="">詳細を見る</a>
        </div>
    </div>
</section>

<!-- モーダルエリア -->
<div id="modalArea" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div id="modals"></div>
    </div>
</div>

<!-- 提供機能 -->
<section class="uk-section  uk-padding-large">
  <div class="uk-container">
    <h2 class="uk-heading-line uk-text-center"><span>提供機能</span></h2>
    <ul class="uk-list uk-list-decimal uk-list-large" uk-scrollspy="target: > li; cls: uk-animation-slide-left; delay: 300;">
      <li>高画質360°パノラマコンテンツの使用権利（半永久的）</li>
      <li>QRコード発行（ショップカードやチラシに使用可能）</li>
      <li>ロゴ設置、ソーシャルアイコン、地図情報、外部リンク、電話番号設置など</li>
      <li>弊社サーバー利用による安定したホスティング</li>
    </ul>
  </div>
</section>

<!-- コンタクト -->
<section id="contact" class="uk-section  uk-padding-large" style="background: linear-gradient(135deg, #316B3F 0%, #2E86AB 100%); color: white;">
  <div class="uk-container uk-text-center">
    <h2 class="uk-heading-line"><span>お問い合わせ</span></h2>
    <p>あなたの空間を、ストーリーのあるパノラマコンテンツにしませんか？今なら無料相談を受け付けています。お気軽にお問い合わせください。</p>
    <a href="<?php echo home_url('/contact'); ?>" class="uk-button uk-button-text">お問い合わせフォームへ</a>
  </div>
</section>


<!-- ================================
      9. JavaScript
=================================== -->
<script>
let map;
let markers = [];
let bounds = null;
let selectedCategory = ""; // 現在選択されているカテゴリ

// 初期化処理
function initMap() {
    console.log("✅ initMap() が実行されました");

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var currentLatLng = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            initializeMap(currentLatLng);
        }, function () {
            handleLocationError(true);
        });
    } else {
        handleLocationError(false);
    }
}

// 位置情報取得エラー時
function handleLocationError(browserHasGeolocation) {
    var defaultLatLng = { lat: 35.3056, lng: 136.8006 }; // 愛知県一宮市
    if (browserHasGeolocation) {
        alert("現在地を取得できませんでした。ブラウザの位置情報設定を確認してください。");
    } else {
        alert("このブラウザでは現在地の取得がサポートされていません。");
    }
    initializeMap(defaultLatLng);
}

// マップを初期化
function initializeMap(centerLatLng) {
    map = new google.maps.Map(document.getElementById('map'), {
        center: centerLatLng,
        zoom: 11
    });

    new google.maps.Marker({
        position: centerLatLng,
        map: map,
        title: '現在地',
        icon: '/wp-content/themes/numaken/images/mapicon/man.png',
        animation: google.maps.Animation.BOUNCE
    });

    // ✅ 初回ロードで全データを取得
    loadMarkers();

    // 地図の範囲変更時にマーカーを更新
    map.addListener('bounds_changed', function () {
        bounds = map.getBounds();
        loadMarkers();
    });

    // カテゴリー選択時のイベント
    document.querySelectorAll("#categoryFilter button").forEach(button => {
        button.addEventListener("click", function () {
            selectedCategory = this.getAttribute("data-category") || "";

            if (selectedCategory === "飲食店") {
                selectedCategory = "飲食";
            }

            // ボタンのデザインを更新
            document.querySelectorAll("#categoryFilter button").forEach(btn => {
                btn.classList.remove("uk-button-primary");
                btn.classList.add("uk-button-default");
            });
            this.classList.add("uk-button-primary");
            this.classList.remove("uk-button-default");

            // ✅ 既存マーカーをすべて削除し、新しいカテゴリのマーカーだけを表示
            clearMarkers();
            loadMarkers();
        });
    });
}

// マーカーを削除する関数
function clearMarkers() {
    markers.forEach(marker => marker.setMap(null));
    markers = [];
}

// マーカーを追加
function addMarker(location) {
    const markerLatLng = {
        lat: parseFloat(location.lat),
        lng: parseFloat(location.lng)
    };

    const marker = new google.maps.Marker({
        position: markerLatLng,
        map: map,
        title: location.title
    });

    marker.addListener("click", function () {
        showModal(location);
    });

    markers.push(marker);
}

// 地図範囲のマーカー取得
function loadMarkers() {
    if (!bounds) return;

    const bounds_ne = bounds.getNorthEast();
    const bounds_sw = bounds.getSouthWest();

    fetch(`/wp-admin/admin-ajax.php?action=get_markers&ne_lat=${bounds_ne.lat()}&ne_lng=${bounds_ne.lng()}&sw_lat=${bounds_sw.lat()}&sw_lng=${bounds_sw.lng()}&category=${encodeURIComponent(selectedCategory)}`)
        .then(response => response.json())
        .then(data => {
            console.log(`✅ カテゴリ「${selectedCategory}」のマーカー取得:`, data);

            data.forEach(location => {
                addMarker(location);
            });
        })
        .catch(error => {
            console.error("🚨 マーカーの取得に失敗しました:", error);
        });
}

// モーダルを表示
function showModal(location) {
    const modalContent = document.getElementById('modals');
    if (!modalContent) {
        console.error("🚨 #modals が見つかりません");
        return;
    }

    modalContent.innerHTML = `
        <iframe src="${location.authored_index_url}" width="100%" height="300px" frameborder="0"></iframe>
        <div class="uk-card uk-card-muted uk-grid-collapse uk-child-width-1-1@s uk-margin" uk-grid>
            <div class="uk-panel">
                <img class="uk-align-left uk-margin-remove-adjacent" src="${location.thumb || 'https://via.placeholder.com/200'}" width="200" alt="${location.title}">
                <h2 class="uk-h4">${location.title}</h2>
                <p class="uk-text-small">${location.description || '詳細情報はありません。'}</p>
            </div>
        </div>
    `;

    UIkit.modal('#modalArea').show();
}

// Google Maps API 読み込み
function loadGoogleMaps() {
    const script = document.createElement("script");
    script.src = `https://maps.googleapis.com/maps/api/js?key=<?php echo esc_attr($google_maps_api_key); ?>&callback=initMap`;
    script.async = true;
    script.defer = true;
    document.body.appendChild(script);
}

document.addEventListener("DOMContentLoaded", loadGoogleMaps);

</script>



<?php get_footer(); ?>
