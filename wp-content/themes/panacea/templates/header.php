<!doctype html>
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php if (have_posts()) : ?>
		<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name') ?> Feed" href="<?php echo home_url() ?>/feed/">
	<?php endif; ?>

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="<?php echo CT_THEME_ASSETS ?>/css/ie.css" >
	<script src="<?php echo CT_THEME_ASSETS ?>/bootstrap/js/html5shiv.js"></script>
	<script src="<?php echo CT_THEME_ASSETS ?>/bootstrap/js/respond.min.js"></script>
	<![endif]-->

</head>
