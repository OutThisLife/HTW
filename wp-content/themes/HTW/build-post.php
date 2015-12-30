<?php
/**
 * HTW
 *
 * Build: post
 */
?>

<article <?php post_class('post') ?> role="article" itemscope itemtype="http://schema.org/Article">
	<a href="<?php the_permalink() ?>" class="post-title" itemprop="name headline url">
		<?php the_title() ?>
	</a>

	<?php Template::partial('meta.php') ?>

	<div class="post-excerpt" itemprop="description">
		<?php
		if ($lead = CFS()->get('list_lead'))
			echo '<p class="lead">', $lead, '</p>';

		if ($img = CFS()->get('list_img'))
			echo '<img src="', $img, '" class="full-width" alt="', get_the_title(), '" />';

		echo CFS()->get('list_copy') ?: the_excerpt();
		?>

		<a href="<?php the_permalink() ?>" class="btn waves-effect">
			Read more&hellip;
		</a>
	</div>
</article>