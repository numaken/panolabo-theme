<?php
/* Template Name: Case Study */
get_header();
?>

<div class="uk-section ">
    <div class="uk-container">
        <h1 class="uk-heading-line"><span>導入事例</span></h1>
        <p>弊社が提供したサービスを実際に導入いただいた企業様の成功事例をご紹介します。</p>

        <!-- 構造化データ追加 -->
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "ItemList",
          "name": "導入事例一覧",
          "itemListElement": [
            {
              "@type": "CreativeWork",
              "position": 1,
              "name": "飲食店のVR導入",
              "description": "VR導入によりオンライン予約率が50%増加。来店意欲を高めた成功事例。"
            },
            {
              "@type": "CreativeWork",
              "position": 2,
              "name": "美容室のアプリ制作",
              "description": "専用アプリによりリピーター率向上。クーポンや通知機能で高評価。"
            }
          ]
        }
        </script>

        <div class="uk-child-width-1-2@m uk-grid-match" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">飲食店のVR導入</h3>
                    <p>飲食店でのVR導入により、オンライン予約率が50%増加しました。店内の雰囲気をリアルに伝えることで、来店意欲を高めました。</p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">美容室のアプリ制作</h3>
                    <p>美容室専用のスマホアプリを制作し、リピーター率が大幅に向上しました。クーポンやタイムセールの通知機能が高評価を得ました。</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
