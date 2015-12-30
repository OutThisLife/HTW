<?php
/**
 * Core of iStatic
 */

ini_set('display_errors', true);
error_reporting(E_ALL);

class iStatic {
	private $basepath, $contentDir, $homeId;

	public function __construct() {
		$this->basepath = str_replace([
			'http://', 'https://',
			$_SERVER['HTTP_HOST']
		], '', get_site_url() . '/');

		$this->contentDir = str_replace('\\', '/', __DIR__) . '/content/';
		$this->homeId = get_option('page_on_front');
		$this->types = $this->getTypes();
		$this->terms = $this->getTerms();

		return $this;
	}

	public function renderUri($uri) {
		$static = $this->staticUri($uri);
		$h = fopen($static, 'w');

		echo 'rendering::', $static, '<hr />';

		if (!$h)
			echo 'Unable to open ', $static, '<hr />';

		else {
			$bytes = fwrite($h, $this->staticContents($uri));
			printf('Wrote %d bytes to %s<hr />', $bytes, $static);
		}

		fclose($h);
		return $this;
	}

	public function renderAll() {
		foreach ($this->terms AS $termUri)
			$this->renderUri($termUri);

		// --

		if (!$this->homeId)
			$this->renderUri(get_home_url());

		// --

		$result = new WP_Query(array(
			'posts_per_page' => -1,
			'post_type' => $this->types,
		));

		if ($result->have_posts()):
			while ($result->have_posts()):
				$result->the_post();
				$this->renderUri(get_the_permalink());
			endwhile;

			wp_reset_query();
		endif;

		return $this;
	}

	public function staticUri($uri) {
		if (
			$uri === get_home_url()
			|| $post->ID == $this->homeId
		):
			$name = 'index';

		else:
			$name = str_replace(get_home_url(), '', $uri);
			$name = substr($name, 1, strlen($name) - 2);
			$name = str_replace('/', '-', $name);

		endif;

		return $this->contentDir . $name . '.html';
	}

	public function staticContents($uri) {
		$search = ['/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s'];
		$replace = ['>', '<', '\\1'];

		return preg_replace(
			$search, $replace,
			file_get_contents($uri . '?dynamic')
		);
	}

	// --

	private function getTypes() {
		$types = get_post_types();

		unset($types['attachment']);
		unset($types['revision']);
		unset($types['nav_menu_item']);
		unset($types['cfs']);

		return $types;
	}

	private function getTerms() {
		$terms = array();
		$taxonomies = get_taxonomies();

		unset($taxonomies['nav_menu']);
		unset($taxonomies['link_category']);
		unset($taxonomies['post_format']);

		foreach ($taxonomies AS $tax):
			$taxTerms = get_terms($tax);

			foreach ($taxTerms as $t)
				$terms[] = get_term_link($t->term_id, $t->taxonomy);
		endforeach;

		return $terms;
	}
}