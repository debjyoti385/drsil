<?php if(isset($_GET['ctWorkAjax'])): ?>
	<?php get_template_part('templates/content', 'single-portfolio-ajax'); ?>
<?php else: ?>
	<?php get_template_part('templates/header'); ?>
	<?php $faqData = get_post() && ct_get_option('faq_index_page') == get_the_ID() ? ' data-spy="scroll" data-target="#faq1" data-offset="70"' : '';?>
	<?php $html = ct_video_background();?>
	<body <?php body_class( ($html =='' ?  '':' videoPage ' ) . (ct_get_option('style_show_preloader') == 'yes' ? 'preloader ' : '').(function_exists('icl_object_id') ? (ICL_LANGUAGE_CODE . ' ') : '') . (ct_add_menu_shadow() ? 'menuShadow ' : '')) ; ?><?php echo $faqData?>>

	<!-- frame -->
	<?php if(0) { ?>

	<link href="<?php echo CT_THEME_ASSETS ?>/frame/assets/themeplayers/css/jquery.qtip.min.css?v=5" media="all" rel="stylesheet" type="text/css">
	<link href="<?php echo CT_THEME_ASSETS ?>/frame/assets/themeplayers/css/style.css?v=5" media="all" rel="stylesheet" type="text/css">
	<script src="<?php echo CT_THEME_ASSETS ?>/frame/assets/js/jquery.qtip.min.js?v=5"></script>
	<script src="<?php echo CT_THEME_ASSETS ?>/frame/assets/themeplayers/js/jquery.ddslick.js?v=5"></script>
	<script src="<?php echo CT_THEME_ASSETS ?>/frame/assets/themeplayers/js/switcher.js?v=5"></script>

	<div id="themeSwitcher" style="display:none">
		<div class="switcherContainer">
			<a href="http://themeforest.net/user/ThemePlayers/portfolio?ref=themewoodmen" class="tp-logo"><img src="<?php echo CT_THEME_ASSETS ?>/frame/assets/themeplayers/images/tp-logo.png?v=5" alt="ThemePlayers"></a>

			<div class="themeSelectContainer">
				<select name="theme" id="themeSelect">
					<option data-imagesrc="<?php echo CT_THEME_ASSETS ?>/frame/assets/themeplayers/projects/panacea-wp.jpg" value="http://nonus.splash.themewoodmen.com">Nonus Wordpress</option>
					<option data-imagesrc="<?php echo CT_THEME_ASSETS ?>/frame/assets/themeplayers/projects/panacea.jpg" selected="selected" value="http://nonus.html.themewoodmen.com">Nonus</option>
				</select>
			</div>
			<div class="devicesResize">
				<a href="#" class="deviceItem1"></a>
				<a href="#" class="deviceItem2"></a>
				<a href="#" class="deviceItem3"></a>
				<a href="#" class="deviceItem4"></a>
				<a href="#" class="deviceItem5"></a>
			</div>

			<div class="switcherRt">
				<a href="http://themeforest.net/item/nonus-one-page-parallax-html-portfolio/5242349?ref=themewoodmen" class="tw-purchase" title="Purchase"><img src="<?php echo CT_THEME_ASSETS ?>/frame/assets/themeplayers/images/purchase-bt.png" alt="ThemePlayers"></a>
				<a href="#" class="tp-close switcherClose" title="close"><img src="<?php echo CT_THEME_ASSETS ?>/frame/assets/themeplayers/images/close-bt.png" alt="ThemePlayers"></a>
			</div>
		</div>
	</div>

	<?php } ?>

	<!-- end frame -->

	<div id="ct_preloader"></div>

	<?php if ($html): ?>
		<?php echo do_shortcode('[video_background link="'.$html.'"]'); ?>
	<?php endif; ?>

	<?php get_template_part('templates/head-top-navbar');?>

	<div id="boxedWrapper">

		<div class="container">
			<?php include roots_template_path(); ?>
			<?php get_template_part('templates/footer'); ?>
		</div>
	</div>

	<!--Back to top-->
	<a href="#" id="toTop">Back to top
		<i class="icon-chevron-up"></i>
	</a>

	<!--footer-->
	<?php wp_footer(); ?>

	

</body>
	</html>
<?php endif;?>

