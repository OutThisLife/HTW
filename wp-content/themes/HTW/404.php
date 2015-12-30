<?php
/**
 * HTW
 *
 * 404
 */

get_header();
?>

<!-- CONTENT -->
<section id="content" role="main">
<div class="wrapper">
	<?php get_sidebar() ?>

	<div class="content">
		<?php get_sidebar('top') ?>

		<h2>Sorry, that page could not be found.</h2>

		<p>
			The page you were looking for couldn't be found. Please try again by using the navigation above.
		</p>

		<ul>
			<li><a href="<?=home_url()?>">Homepage</a></li>
			<li><a href="javascript:history.go(-1);">Go back</a></li>
		</ul>
	</div>

	<?php get_sidebar('right') ?>
</div>
</section>

<?php get_footer() ?>