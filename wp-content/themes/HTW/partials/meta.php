<?php
/**
 * HTW
 *
 * Meta bar
 */
?>

<div class="meta">
	<?php if (has_category()): ?>
	<span class="categories">
		<i class="material-icons">turned_in</i>&nbsp;
		<span itemprop="keywords"><?php the_category(', ') ?></span>
	</span>
	<?php endif ?>

	<span class="time" itemprop="datePublished">
		<?php the_time('F jS, Y') ?>
	</span>
</div>