<?php
/**
 * Plugin name: iStatic
 * Author: Talasan Nicholson
 * Author URI: http://nwsco.org
 * Version: 0.1
 * Description: Serve 100% plain HTML/CSS/JS to the user.
 * Max WP Version: 3.9
 * Text Domain: istatic
*/

// -----------------------------------------------

require_once 'i-static-base.php';
require_once 'i-static-settings.php';

// -----------------------------------------------

add_action('wp_loaded', function() {
	$is = new iStatic();
	new iStaticSettings($is);

	add_action('istatic_render_all', [&$is, 'renderAll']);
	add_action('post_updated', function($postID, $post, $oldPost) use (&$is) {
		$is->renderPost($post);
	}, 10, 3);
});