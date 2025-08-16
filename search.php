<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>
<?php $s = $_GET['s']; ?>

<div id="main">
	<div id="content">
		<div>検索条件</div>
		<?php if($s){ ?>検索キーワード：<?php echo $s; ?><br><?php } ?>

		<h3>検索結果</h3>
		<?php query_posts( array('s' => $s,)); ?>

		<!-- ループ開始 -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<!-- タイトル表示 -->
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php printf(the_title_attribute('echo=0') ); ?>">
					<span itemprop="name"><?php the_title(); ?></span>
				</a>
			</h2>

			<!-- メタデータの読み込み -->
			<?php get_template_part( 'meta' ); ?>

			<!-- サムネイルの表示 -->
			<span itemprop="image">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
			</span>

			<!-- 抜粋の表示 -->
			<?php the_excerpt(); ?>
			<a href="<?php echo get_permalink(); ?>">続きを読む</a>

		<?php endwhile; else : ?>
		<!-- ループ開始 -->

		<div>該当なし</div>
		<?php endif; ?>
	</div><!-- end content -->
	<?php get_sidebar(); ?>
</div><!-- end main -->
<?php get_footer(); ?>