<?php
/**
 * HTW
 *
 * Build: video
 */

$ytUrl = CFS()->get('youtube_url');
$ytID = FrontEnd::extractYT($ytUrl);
$img = "//img.youtube.com/vi/{$ytID}/hqdefault.jpg";
?>

<figure class="item row" itemscope itemtype="http://schema.org/Review">
	<div class="s12 m3 col image full-bg" style="
		background-image: url(<?=$img?>)
	">
		<a href="<?=$ytUrl?>" target="_blank" class="cover"></a>
		<img src="<?=$img?>" class="invisible" itemprop="image" />
	</div>

	<div class="s12 m8 col desc">
		<a href="<?=$ytUrl?>" target="_blank">
			<?php the_title() ?>
			&raquo;
		</a>

		<?php the_content() ?>
	</div>
</figure>