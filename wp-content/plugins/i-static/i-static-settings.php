<?php
/**
 * iStatic settings
 */

class iStaticSettings {
	public function __construct(iStatic $is) {
		add_action('admin_menu', [__CLASS__, 'registerToolsSubpage']);
		add_action('admin_bar_menu', [__CLASS__, 'menuButton'], 81);
	}

	public function registerToolsSubpage() {
		add_submenu_page(
			'tools.php',
			'iStatic', 'iStatic',
			'manage_options',
			'istatic-options',
			function() { require_once 'admin/settings.php'; }
		);
	}

	public function menuButton($bar) {
		$bar->add_node([
			'id' => 'istatic-btn',
			'title' => 'Rebuild Files',
			'href' => get_admin_url() . 'tools.php?page=istatic-options',
		]);
	}
}