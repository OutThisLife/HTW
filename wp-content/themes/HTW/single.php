<?php
/**
 * HTW
 *
 * Single post
 */

get_header();
the_post();
?>

<!-- Main content -->
<section role="main">
<div class="wrapper">
	<?php get_sidebar() ?>

	<div class="content">
		<?php get_sidebar('top') ?>

		<article class="post" role="article" itemscope itemtype="http://schema.org/Article">
			<h1 class="post-title" itemprop="name headline">
				<?php the_title() ?>
			</h1>

			<?php Template::partial('meta.php') ?>

			<div class="post-contents" itemprop="articleBody">
				<?php the_content() ?>
			</div>
		</article>
	</div>

	<?php get_sidebar('right') ?>
</div>
</section>

<?php get_footer() ?>