<?php
/**
 * HTW
 *
 * Main Functions
 */

require_once 'classes/sys/autoloader.php';

$tmpl = new BaseTheme();
$tmpl->debug(0)->adminBar(0)

// -----------------------------------------------

->addMenus(array(array(
	'main' => 'Main Menu',
)))

->addShortcodes(array(array(
	# [button]
	'button' => function($args, $content = '') {
		return '<a href="'. $args['url'] .'" class="button '. $args['style'] .'">'. $content .'</a>';
	},

	# [lead]
	'lead' => function($args, $content = '') {
		return '<p class="lead">'. $content .'</p>';
	},

	# [grid]
	'grid' => function($args, $content) {
		return '<div class="grid grid-'. $args['cols'] .'">'. do_shortcode($content) .'</div>';
	},

	# [grid_item]
	'grid_item' => function($args, $content) {
		return '<div class="item">'. do_shortcode($content) .'</div>';
	},

	# [list_x]
	'list_x' => function($args, $content) {
		ob_start();

		$type = $args['type'];

		echo '<div class="row list-type ', $type, '">';

		Template::loop($type, array(
			'post_type' => $type,
		));

		echo '</div>';

		return ob_get_clean();
	},
)))

// -----------------------------------------------

->render();