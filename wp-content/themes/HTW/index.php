<?php
/**
 * Theme Name: HTW
 * Version: 1.0
 * Author: Talasan Nicholson
 * Author URI: http://www.nwsco.org/
 */

get_header();
global $wp_query;
?>

<!-- Main content -->
<section role="main">
<div class="wrapper">
	<?php get_sidebar() ?>

	<div class="content">
	<?php
	get_sidebar('top');

	if (is_search())
		echo '<h1 class="page-title">', $wp_query->found_posts, ' results for "', get_query_var('s'), '":</h1>';

	if (have_posts()):
		while (have_posts()):
			the_post();
			get_template_part('build', 'post');
		endwhile;

	else:
		echo '<p>Sorry, no posts yet.</p>';

	endif;
	?>
	</div>

	<?php get_sidebar('right') ?>
</div>
</section>

<?php get_footer() ?>