<?php get_header(); ?>
		<div id="main">
			<div itemscope itemtype="https://schema.org/Article" id="content">

				<!-- ループ開始 -->
				<?php while ( have_posts() ) : the_post() ?>

					<!-- タイトルの表示 -->
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<span itemprop="name"><?php the_title(); ?></span>
						</a>
					</h2>

					<!-- サムネイルの表示 -->
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<span itemprop="image"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></span>
					</a>

					<!-- メタデータの読み込み -->
					<?php get_template_part( 'meta' ); ?>

					<!-- ディスクリプションの表示 -->
					<span itemprop="articleBody">
						<?php echo esc_attr( $post->my_description ); ?>
					</span>
					<a href="<?php echo get_permalink(); ?>">続きを読む</a>
				<?php endwhile; ?>
				<!-- /ループ開始 -->

				<?php posts_nav_link(); ?>
			</div><!-- end content -->
			<?php get_sidebar(); ?>
		</div><!-- end main -->
		<?php get_footer(); ?>
