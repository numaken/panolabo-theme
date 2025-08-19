<?php
// single.php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
get_header();
?>

<section class="uk-section ">
  <div class="uk-container">

    <!-- パンくずリスト -->
    <?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
      <div class="uk-margin-bottom">
        <?php yoast_breadcrumb( '<nav class="uk-breadcrumb">', '</nav>' ); ?>
      </div>
    <?php else : ?>
      <?php panolabo_breadcrumb(); ?>
    <?php endif; ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <article <?php post_class( 'uk-article' ); ?> itemscope itemtype="http://schema.org/Article">

        <!-- タイトル -->
        <h1 class="uk-article-title" itemprop="headline"><?php the_title(); ?></h1>

        <!-- 日付・投稿者などメタ -->
        <p class="uk-article-meta">
          <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished">
            <?php echo esc_html( get_the_date() ); ?>
          </time>
          <?php /* 投稿者表示が必要なら以下をアンコメント */
          // echo ' | ' . esc_html( get_the_author() );
          ?>
        </p>

        <!-- カスタム meta.php（カテゴリー・タグ等） -->
        <?php get_template_part( 'meta' ); ?>

        <!-- SNSシェアボタン -->
        <?php get_template_part( 'sns' ); ?>

        <!-- サムネイル -->
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="uk-text-center uk-margin">
            <?php the_post_thumbnail( 'large', [
              'loading' => 'lazy',
              'class'   => 'uk-width-1-1 uk-border-rounded',
              'itemprop'=> 'image',
            ] ); ?>
          </div>
        <?php endif; ?>

        <!-- 本文 -->
        <div class="uk-margin uk-text-justify" itemprop="articleBody">
          <?php the_content(); ?>
        </div>

        <!-- SNSシェアボタン（再表示） -->
        <?php get_template_part( 'sns' ); ?>

        <!-- 関連記事 -->
        <?php get_template_part( 'related-post' ); ?>

      </article>

    <?php endwhile; wp_reset_postdata(); endif; ?>

  </div>
</section>

<?php get_footer(); ?>
