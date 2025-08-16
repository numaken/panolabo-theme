<div class="sns">

	<!-- facebook -->
	<a href="javascript:void(0)" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436'); return false;"><img style="cursor: pointer" src="<?php echo get_template_directory_uri(); ?>/images/fb.png"></a>

	<!-- Twitter -->
	<a href="http://twitter.com/share?url=<?php echo the_permalink(); ?>&text=<?php echo the_title(); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/tw.png"></a>

	<!-- hatebu -->
	<a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo the_permalink(); ?>&title=<?php echo the_title(); ?>" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="<?php echo get_template_directory_uri(); ?>/images/hatebu.png"/></a>

</div>
