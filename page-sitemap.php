<?php
/*
Template Name: サイトマップ
*/
get_header();
?>

<!-- サイトマップ -->
<section class="uk-section ">
  <div class="uk-container">
    <h1 class="uk-heading-medium uk-text-center">サイトマップ</h1>
    <p class="uk-text-center uk-text-muted">Panolaboサイトの全ページ一覧</p>

    <div class="uk-grid-large uk-child-width-1-3@m uk-margin-large-top" uk-grid>
      
      <!-- メインコンテンツ -->
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <h3 class="uk-card-title"><span uk-icon="home"></span> メインページ</h3>
          <ul class="uk-list uk-list-divider">
            <li><a href="<?php echo home_url('/'); ?>">🏠 トップページ</a></li>
            <li><a href="<?php echo home_url('/about/'); ?>">👥 会社概要</a></li>
            <li><a href="<?php echo home_url('/contact/'); ?>">📧 お問い合わせ</a></li>
          </ul>
        </div>
      </div>

      <!-- サービス・プロダクト -->
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <h3 class="uk-card-title"><span uk-icon="cog"></span> サービス・プロダクト</h3>
          <ul class="uk-list uk-list-divider">
            <li>
              <a href="<?php echo home_url('/services/'); ?>">💼 サービス一覧</a>
              <ul class="uk-list uk-list-bullet uk-margin-small-left">
                <li><a href="<?php echo home_url('/vr-panoramic/'); ?>">🥽 VRパノラマ現像所</a></li>
                <li><a href="<?php echo home_url('/smartphone-app/'); ?>">📱 スマートフォンアプリ</a></li>
                <li><a href="<?php echo home_url('/website-creation/'); ?>">🌐 ウェブサイト制作</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php echo home_url('/products/'); ?>">🚀 プロダクト</a>
              <ul class="uk-list uk-list-bullet uk-margin-small-left">
                <li><a href="<?php echo home_url('/postpilot-pro/'); ?>">✈️ AiPostPilot Pro</a></li>
                <li><a href="<?php echo home_url('/chat2doc/'); ?>">💬 Chat2Doc</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

      <!-- パートナーシップ・OEM -->
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <h3 class="uk-card-title"><span uk-icon="users"></span> パートナーシップ</h3>
          <ul class="uk-list uk-list-divider">
            <li><a href="<?php echo home_url('/oem/'); ?>">🤝 OEM供給</a></li>
            <li><a href="<?php echo home_url('/partnership/'); ?>">💡 パートナーシップ</a></li>
            <li><a href="<?php echo home_url('/subsidies/'); ?>">💰 助成金・補助金</a></li>
          </ul>
        </div>
      </div>

      <!-- 事例・実績 -->
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <h3 class="uk-card-title"><span uk-icon="star"></span> 事例・実績</h3>
          <ul class="uk-list uk-list-divider">
            <li><a href="<?php echo home_url('/clients/'); ?>">🏢 導入企業一覧</a></li>
            <li><a href="<?php echo home_url('/portfolio/'); ?>">📁 ポートフォリオ</a></li>
            <li><a href="<?php echo home_url('/case-study/'); ?>">📊 導入事例</a></li>
          </ul>
        </div>
      </div>

      <!-- 企業情報 -->
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <h3 class="uk-card-title"><span uk-icon="info"></span> 企業情報</h3>
          <ul class="uk-list uk-list-divider">
            <li><a href="<?php echo home_url('/team/'); ?>">👨‍💼 チーム</a></li>
            <li><a href="<?php echo home_url('/corp-enhanced/'); ?>">🏭 会社詳細</a></li>
            <li><a href="<?php echo home_url('/download-page/'); ?>">⬇️ ダウンロード</a></li>
          </ul>
        </div>
      </div>

      <!-- 法的情報 -->
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <h3 class="uk-card-title"><span uk-icon="file-text"></span> 規約・ポリシー</h3>
          <ul class="uk-list uk-list-divider">
            <li><a href="<?php echo home_url('/privacy/'); ?>">🔒 プライバシーポリシー</a></li>
            <li><a href="<?php echo home_url('/term/'); ?>">📜 利用規約</a></li>
            <li><a href="<?php echo home_url('/tokushoho/'); ?>">⚖️ 特定商取引法に基づく表記</a></li>
          </ul>
        </div>
      </div>

    </div>

    <!-- ブログ記事 -->
    <div class="uk-margin-large-top">
      <div class="uk-card uk-card-default uk-card-body">
        <h3 class="uk-card-title"><span uk-icon="pencil"></span> 最新のブログ記事</h3>
        <ul class="uk-list uk-list-divider">
          <?php
          $recent_posts = get_posts(array(
            'numberposts' => 10,
            'post_status' => 'publish'
          ));
          
          if ($recent_posts) {
            foreach ($recent_posts as $post) {
              setup_postdata($post);
              ?>
              <li>
                <a href="<?php echo get_permalink($post->ID); ?>">
                  📝 <?php echo get_the_title($post->ID); ?>
                  <span class="uk-text-muted uk-text-small">
                    (<?php echo get_the_date('Y年m月d日', $post->ID); ?>)
                  </span>
                </a>
              </li>
              <?php
            }
            wp_reset_postdata();
          } else {
            echo '<li class="uk-text-muted">記事がありません</li>';
          }
          ?>
        </ul>
      </div>
    </div>

    <!-- ツリー形式の表示（代替案） -->
    <div class="uk-margin-large-top">
      <div class="uk-card  uk-card-body ">
        <h3 class="uk-card-title"><span uk-icon="list"></span> ファイルツリー形式</h3>
        <pre class="uk-text-small" style="font-family: 'Courier New', monospace;">
<strong>Panolabo/</strong>
├── 🏠 <a href="<?php echo home_url('/'); ?>" class="uk-link-reset">トップページ</a>
├── 📂 サービス/
│   ├── 💼 <a href="<?php echo home_url('/services/'); ?>" class="uk-link-reset">サービス一覧</a>
│   ├── 🥽 <a href="<?php echo home_url('/vr-panoramic/'); ?>" class="uk-link-reset">VRパノラマ現像所</a>
│   ├── 📱 <a href="<?php echo home_url('/smartphone-app/'); ?>" class="uk-link-reset">スマートフォンアプリ</a>
│   └── 🌐 <a href="<?php echo home_url('/website-creation/'); ?>" class="uk-link-reset">ウェブサイト制作</a>
├── 📂 プロダクト/
│   ├── 🚀 <a href="<?php echo home_url('/products/'); ?>" class="uk-link-reset">プロダクト一覧</a>
│   ├── ✈️ <a href="<?php echo home_url('/postpilot-pro/'); ?>" class="uk-link-reset">AiPostPilot Pro</a>
│   └── 💬 <a href="<?php echo home_url('/chat2doc/'); ?>" class="uk-link-reset">Chat2Doc</a>
├── 📂 パートナーシップ/
│   ├── 🤝 <a href="<?php echo home_url('/oem/'); ?>" class="uk-link-reset">OEM供給</a>
│   ├── 💡 <a href="<?php echo home_url('/partnership/'); ?>" class="uk-link-reset">パートナーシップ</a>
│   └── 💰 <a href="<?php echo home_url('/subsidies/'); ?>" class="uk-link-reset">助成金・補助金</a>
├── 📂 事例・実績/
│   ├── 🏢 <a href="<?php echo home_url('/clients/'); ?>" class="uk-link-reset">導入企業一覧</a>
│   ├── 📁 <a href="<?php echo home_url('/portfolio/'); ?>" class="uk-link-reset">ポートフォリオ</a>
│   └── 📊 <a href="<?php echo home_url('/case-study/'); ?>" class="uk-link-reset">導入事例</a>
├── 📂 企業情報/
│   ├── 👥 <a href="<?php echo home_url('/about/'); ?>" class="uk-link-reset">会社概要</a>
│   ├── 👨‍💼 <a href="<?php echo home_url('/team/'); ?>" class="uk-link-reset">チーム</a>
│   └── 🏭 <a href="<?php echo home_url('/corp-enhanced/'); ?>" class="uk-link-reset">会社詳細</a>
├── 📧 <a href="<?php echo home_url('/contact/'); ?>" class="uk-link-reset">お問い合わせ</a>
└── 📂 規約・ポリシー/
    ├── 🔒 <a href="<?php echo home_url('/privacy/'); ?>" class="uk-link-reset">プライバシーポリシー</a>
    ├── 📜 <a href="<?php echo home_url('/term/'); ?>" class="uk-link-reset">利用規約</a>
    └── ⚖️ <a href="<?php echo home_url('/tokushoho/'); ?>" class="uk-link-reset">特定商取引法に基づく表記</a>
        </pre>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>