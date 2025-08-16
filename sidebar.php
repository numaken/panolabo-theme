			<div id="sidebar">
				<!-- 検索フォームの表示 -->
				<?php get_search_form(); ?>

				<!-- 最近の投稿を10件表示 -->
				<h4>最近の記事</h4>

				<!-- 表示する記事の条件設定 -->
				<?php $posts = get_posts('numberposts=5'); ?>

				<!-- ループ開始 -->
				<?php foreach($posts as $post): ?>
				<div class="clearfix side-post">
					<a href="<?php the_permalink(); ?>" class="thumb">
						<span itemprop="image"><?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></span>
					</a>
					<a href="<?php the_permalink(); ?>" class="clearfix">
						<span itemprop="name"><?php the_title(); ?></span>
					</a>
				</div>
				<?php endforeach; ?>
				<!-- /ループ開始 -->

				<!-- 人気記事を手動で表示 -->
				<h4 class="clearfix">人気記事</h4>

				<div class="clearfix side-post">
					<a href="http://manabubb.xsrv.jp/karui/?p=23" class="thumb">
						<img itemprop="image" width="500" height="333" src="http://manabubb.xsrv.jp/karui/wp-content/uploads/2014/11/medium_3232133635.jpg" class="attachment-post-thumbnail wp-post-image" alt="medium_4870052004">
					</a>
					<a href="http://manabubb.xsrv.jp/karui/?p=23" class="clearfix">
						<span itemprop="name">かるいテーマのサンプル記事。
					</a>
				</div>

				<div class="clearfix side-post">
					<a href="http://manabubb.xsrv.jp/karui/?p=23" class="thumb">
						<img itemprop="image" width="500" height="333" src="http://manabubb.xsrv.jp/karui/wp-content/uploads/2014/11/medium_4870052004.jpg" class="attachment-post-thumbnail wp-post-image" alt="medium_4870052004">
					</a>
					<a href="http://manabubb.xsrv.jp/karui/?p=23" class="clearfix">
						<span itemprop="name">かるいテーマのサンプル記事。</span>
					</a>
				</div>

				<div class="clearfix side-post">
					<a href="http://manabubb.xsrv.jp/karui/?p=23" class="thumb">
						<img itemprop="image" width="500" height="333" src="http://manabubb.xsrv.jp/karui/wp-content/uploads/2014/11/medium_3964326958.jpg" class="attachment-post-thumbnail wp-post-image" alt="medium_4870052004">
					</a>
					<a href="http://manabubb.xsrv.jp/karui/?p=23" class="clearfix">
						<span itemprop="name">かるいテーマのサンプル記事。</span>
					</a>
				</div>

				<div class="clearfix side-post">
					<a href="http://manabubb.xsrv.jp/karui/?p=23" class="thumb">
						<img itemprop="image" width="500" height="333" src="http://manabubb.xsrv.jp/karui/wp-content/uploads/2014/11/medium_14362470179.jpg" class="attachment-post-thumbnail wp-post-image" alt="medium_4870052004">
					</a>
					<a href="http://manabubb.xsrv.jp/karui/?p=23" class="clearfix">
						<span itemprop="name">かるいテーマのサンプル記事。</span>
					</a>
				</div>

				<div class="clearfix side-post">
					<a href="http://manabubb.xsrv.jp/karui/?p=23" class="thumb">
						<img itemprop="image" width="500" height="333" src="http://manabubb.xsrv.jp/karui/wp-content/uploads/2014/11/medium_3914801860.jpg" class="attachment-post-thumbnail wp-post-image" alt="medium_4870052004">
					</a>
					<a href="http://manabubb.xsrv.jp/karui/?p=23" class="clearfix">
						<span itemprop="name">かるいテーマのサンプル記事。</span>
					</a>
				</div>



				<h4 class="clearfix">アーカイブ</h4>
				<p>・<a href="http://manabubb.xsrv.jp/karui/?m=201411">2014年11月</a></p>
				<p>・<a href="">2014年10月</a></p>
				<p>・<a href="">2014年9月</a></p>
				<p>・<a href="">2014年8月</a></p>
				<p>・<a href="">2014年7月</a></p>
				<p>・<a href="">2014年6月</a></p>


			</div><!-- end sidebar -->

