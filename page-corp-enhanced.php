
<?php
/* Template Name: Company Profile Enhanced */
get_header(); 
?>

<main class="uk-section uk-section-default">
  <div class="uk-container">

    <!-- ヒーローセクション -->
    <div class="uk-text-center uk-margin-large-bottom">
      <h1 class="uk-heading-medium">技術とアイデアで、中小企業の未来をつくる</h1>
      <a class="uk-button uk-button-text" href="/contact">お問い合わせはこちら</a>
    </div>

    <!-- 代表メッセージ -->
    <div class="uk-card uk-card-default uk-card-body uk-margin-large-bottom">
      <h2 class="uk-card-title">代表メッセージ</h2>
      <p>「大手にはないスピードと柔軟性で、現場に寄り添う」</p>
    </div>

    <!-- 会社概要 -->
    <div class="uk-margin-large-bottom">
      <h2>会社概要</h2>
      <table class="uk-table uk-table-divider">
        <tbody>
          <tr><td>社名</td><td>合同会社 panolabo</td></tr>
          <tr><td>所在地</td><td>愛知県一宮市三条</td></tr>
          <tr><td>設立</td><td>2015年5月</td></tr>
          <tr><td>事業内容</td><td>VR制作 / アプリ開発 / Web制作</td></tr>
          <tr><td>対応地域</td><td>関東圏・全国リモート対応可</td></tr>
        </tbody>
      </table>
    </div>

    <!-- Mission & Vision -->
    <div class="uk-child-width-1-2@m uk-grid-match" uk-grid>
      <div>
        <div class="uk-card uk-card-primary uk-card-body">
          <h3 class="uk-card-title">Mission</h3>
          <p>技術をもっと身近に。現場で役立つものを最短距離で。</p>
        </div>
      </div>
      <div>
        <div class="uk-card uk-card-secondary uk-card-body">
          <h3 class="uk-card-title">Vision</h3>
          <p>地域企業に、全国レベルのデジタル力を。</p>
        </div>
      </div>
    </div>

    <!-- 沿革 -->
    <div class="uk-margin-large-top">
      <h2>沿革</h2>
      <ul class="uk-list uk-list-bullet">
        <li>2015年5月：合同会社 panolabo 設立</li>
        <li>2021年～：VRパノラマ導入プロジェクト全国展開</li>
        <li>2023年～：OEMアプリ事業本格化（累計100本超）</li>
      </ul>
    </div>

    <!-- 構造化データ -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "AboutPage",
      "mainEntity": {
        "@type": "Organization",
        "name": "Panolabo LLC",
        "url": "https://panolabollc.com",
        "description": "A creative tech company in Tokyo providing VR production, mobile app development, and WordPress-based solutions.",
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "Ichinomiya-shi",
          "addressRegion": "Aichi",
          "addressCountry": "JP"
        },
        "foundingDate": "2015-05-30"
      }
    }
    </script>

  </div>
</main>

<?php get_footer(); ?>
