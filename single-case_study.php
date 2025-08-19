
<?php get_header(); ?>

<main class="uk-section ">
  <div class="uk-container">

    <!-- 投稿内容 -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="uk-article">

        <h1 class="uk-article-title"><?php the_title(); ?></h1>
        <p class="uk-article-meta">公開日：<?php echo get_the_date(); ?></p>
        <div class="uk-margin"><?php the_content(); ?></div>

        <!-- 構造化データ -->
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "CreativeWork",
          "headline": "<?php echo esc_html(get_the_title()); ?>",
          "datePublished": "<?php echo get_the_date('c'); ?>",
          "author": {
            "@type": "Organization",
            "name": "Panolabo LLC"
          },
          "publisher": {
            "@type": "Organization",
            "name": "Panolabo LLC"
          },
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?php echo esc_url(get_permalink()); ?>"
          }
        }
        </script>

      </article>
    <?php endwhile; endif; ?>

    <div class="uk-margin-top">
      <a class="uk-button uk-button-primary uk-button-small" href="/case-studies">← 導入事例一覧に戻る</a>
    </div>

  </div>
</main>

<?php get_footer(); ?>
