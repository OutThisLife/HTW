<?php
/**
 * HTW
 *
 * Header
 */
?>
<!DOCTYPE html>
<head>
	<meta charset="<?php bloginfo('charset') ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="copyright" content="Copyright <?=date('Y'), ' ', bloginfo('name')?>. All Rights Reserved." />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />

	<?php FrontEnd::getTitle() ?>

	<link rel="profile" href="//gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	<link rel="image_src" href="" />
	<link rel="shortcut icon" href="/favicon.ico" />

	<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons" />
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto+Slab:400,700,300" />
	<link rel="stylesheet" href="<?=bowerDir?>/materialize/dist/css/materialize.min.css" />
	<link rel="stylesheet" href="<?=assetDir?>/css/style.css" />

	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
	<script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
	<script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
	<![endif]-->

	<script src="//htw.nwsco.org:35729/livereload.js"></script>
	<?php wp_head() ?>
</head>
<body <?php body_class() ?> itemscope itemtype="http://schema.org/WebPage">

<!-- HEADER -->
<header>
	<div class="top">
	<div class="wrapper">
		<a href="<?=home_url()?>" class="logo">
			<strong>HowTradingWorks</strong>.com
		</a>

		<form action="<?=home_url()?>" class="search hide-on-small-only">
			<input type="text" placeholder="Search this site" name="s" />
		</form>
	</div>
	</div>

	<nav>
	<div class="wrapper">
	<?php
	wp_list_categories(array(
		'title_li' => '',
		'hide_empty' => false,
	))
	?>
	</div>
	</nav>
</header>