<?php
/**
 * HTW
 *
 * Single page
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

		<article class="page" role="article" itemscope itemtype="http://schema.org/Article">
			<h1 class="page-title" itemprop="name headline">
				<?php the_title() ?>
			</h1>

			<div class="page-contents" itemprop="articleBody">
				<?php the_content() ?>
			</div>
		</article>
	</div>

	<?php get_sidebar('right') ?>
</div>
</section>

<?php get_footer() ?>