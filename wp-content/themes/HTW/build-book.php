<?php
/**
 * HTW
 *
 * Build: book
 */

$buyUrl = CFS()->get('buy_url');
$img = CFS()->get('image');
?>

<figure class="s12 m4 col item" itemscope itemtype="http://schema.org/Review">
<div class="shadow">
	<a href="<?=$buyUrl?>" class="cover"></a>

	<div class="center-align book-cover">
		<a href="<?=$buyUrl?>" target="_blank">
			<img src="<?=$img?>" itemprop="image" />
		</a>
	</div>

	<div class="desc">
		<a href="<?=$buyUrl?>" target="_blank">
			<?php the_title() ?>
		</a>

		<?php the_content() ?>
	</div>
</div>
</figure>