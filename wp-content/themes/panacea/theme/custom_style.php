<?php
function ct_get_theme_background($key, $selector){
	 // $background is the saved custom image, or the default image.
	$background = get_theme_mod($key.'_image');
	$background = str_replace('#','',$background);
	// $color is the saved custom color.
	// A default has to be specified in style.css. It will not be printed here.
	$color = get_theme_mod( $key.'_color' );
	$color = str_replace('#','',$color);

	if ( ! $background && (! $color ||$color == '#'))
		return;

	$style = $color ? "background-color: #$color;" : '';
	if ( $background ) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod( $key.'_background_repeat', 'repeat' );
		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			$repeat = 'repeat';
		$repeat = " background-repeat: $repeat;";

		$position = get_theme_mod($key.'_background_position_x', 'left' );
		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
			$position = 'left';
		$position = " background-position: top $position;";

		$attachment = get_theme_mod( $key.'_background_attachment', 'scroll' );
		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
			$attachment = 'scroll';
		$attachment = " background-attachment: $attachment;";

		$style .= $image . $repeat . $position . $attachment;
	}

	return $selector.'{'.$style.'}';
}
$motive = get_theme_mod('lead_color');
$second_motive = get_theme_mod('sub_color');

$backgroundColor = get_theme_mod('background_color');
$headerTextColor = get_theme_mod('header_textcolor');

?>

<?php _custom_background_cb()?>
<style type="text/css" media="all">
	<?php $font = ct_get_option('style_font_style'); $fontSize = ct_get_option_pattern('style_font_size', 'font-size: %dpx;',16); ?>
	<?php if($font||($fontSize && $fontSize!=16)):?>
    body {
	<?php if ($font): ?> <?php $normalized = explode(':', $font); ?>
		<?php if (isset($normalized[1])): ?>
            font-family: '<?php echo $normalized[0]?>', sans-serif;
	        <?php if(is_numeric($normalized[1])): ?>
            font-weight: <?php echo $normalized[1];?>;
	    <?php else:?>
	        font-style: <?php echo $normalized[1];?>;
	    <?php endif;?>
			<?php endif; ?> <?php endif;?>
	<?php echo $fontSize?>

	<?php //default styles ?> <?php echo ct_get_option_pattern('style_color_basic_background', 'background-color: %s;')?> <?php echo ct_get_option_pattern('style_color_basic_background_image', 'background: url(%s) repeat;')?> <?php echo ct_get_option_pattern('style_color_basic_text', 'color: %s;')?> <?php if (ct_get_option('style_color_basic_background') && !ct_get_option('style_color_basic_background_image')): ?> background-image: none;
		<?php endif;?>
    }
    <?php endif;?>

	<?php $sizes = array('1'=>50,'2'=>24,'3'=>17,'4'=>14,'5'=>14,'6'=>14)?>
	<?php foreach($sizes as $tag=>$size):?>
		<?php if(ct_get_option('style_font_size_h'.$tag)!=38.5):?>
			<?php echo ct_get_option_pattern('style_font_size_h'.$tag, 'h'.$tag.'{font-size: %dpx;}',$size)?>
		<?php endif;?>
	<?php endforeach;?>

	<?php if($headerTextColor):?>
		h1,h1 a,h2, h2 a, h3, h3 a,h4, h4 a, h5, h5 a,h6m h a {color: #<?php echo $headerTextColor?>!important}
	<?php endif;?>

	<?php if($backgroundColor):?>
		body {background-color: #<?php echo $backgroundColor?>}
	<?php endif;?>

	<?php echo ct_get_theme_background('header_background','#MainNav .navbar-inner')?>
	<?php echo ct_get_theme_background('footer_background','footer, footer .container h4')?>
	<?php echo ct_get_theme_background('subfooter_background','footer h4')?>
	<?php echo ct_get_theme_background('headers_background','div.titleBox')?>
	<?php if($c = get_theme_mod('icons_background_color')):?>
	i:before, li:before {color: <?php echo $c?>!important}
	<?php endif;?>
	<?php if($motive && $motive!='#'):?>


	 a:hover,
	a:focus{
		color: <?php echo $motive; ?>;
	}
	.navbar .brand{
		background: <?php echo $motive; ?>;
	}
	.navbar .brand:after{
		background: <?php echo $motive; ?>;
	}
	.navbar .brand:before{
		background: <?php echo $motive; ?>;
		color: <?php echo $motive; ?>;
	}
	.header-area .soc-area .divider-triangle{
		border-bottom: 4px solid <?php echo $motive; ?>;
	}
	.navbar .nav > li:hover > a{
		color: <?php echo $motive; ?>;
	}
	.navbar .nav > .active:hover > a,
	.navbar .nav > .active > a,
	.navbar .nav > .active > a:hover,
	.navbar .nav > .active > a:focus{
		color: <?php echo $motive; ?>;
	}
	.navbar .nav > .active:hover > a:after,
	.navbar .nav > .active > a:after,
	.navbar .nav > .active > a:hover:after,
	.navbar .nav > .active > a:focus:after{
		background: <?php echo $motive; ?>;
	}
	.navbar .nav > li.dropdown:hover > a:before{
		background: <?php echo $motive; ?>;
		color: <?php echo $motive; ?>;
	}
	.navbar .pull-right > li > .dropdown-menu .dropdown-menu li,
	.navbar .nav > li > .dropdown-menu.pull-right .dropdown-menu li{
		background: <?php echo $motive; ?>;
	}
	.navbar .nav li.dropdown.open > .dropdown-toggle,
	.navbar .nav li.dropdown.active > .dropdown-toggle,
	.navbar .nav li.dropdown.open.active > .dropdown-toggle{
		color: <?php echo $motive; ?>;
	}

    .faqMenu .active a{
        color: <?php echo $motive; ?>;
    }
	.dropdown-menu li{
		background: <?php echo $motive; ?>;
	}
	.dropdown-submenu > a:before,
	.dropdown-submenu > a:after{
		background: <?php echo $motive; ?>;
		color: <?php echo $motive; ?>;
	}
	.heady{
		color: <?php echo $motive; ?>;
	}
	.std i{
		background-color: <?php echo $motive; ?>;
	}
	.big{
		color: <?php echo $motive; ?>;
	}
	.dropcap:first-letter{
		color: <?php echo $motive; ?>;
	}
	.highlight{
		background: <?php echo $motive; ?>;
	}
	ul.signs li{
		color: <?php echo $motive; ?>;
	}
	ul.signs li:before{
		color: <?php echo $motive; ?>;
	}
	.nav-tabs{
		border-bottom: 3px solid <?php echo $motive; ?>;
		margin: 0;
	}
	.nav-tabs{
		border-bottom: 2px solid <?php echo $motive; ?>;
	}
	.nav-tabs > li.active > a,
	.nav-tabs > li.active > a:hover,
	.nav-tabs > li.active > a:focus{
		background-color: <?php echo $motive; ?>;
	}
	.btn{
		background: <?php echo $motive; ?>;
	}
	.btn:hover{
		background: <?php echo $motive; ?>;
	}
	.btn.active,
	.btn:active{
		background: <?php echo $motive; ?>;
	}
	.btn-primary,
	.btn-primary:hover,
	.btn-primary.active,
	.btn-primary:active{
		background: <?php echo $motive; ?>;
	}
	.searchIcon:before{
		color: <?php echo $motive; ?>;
	}
	.contactForm input[type="submit"]{
		background: <?php echo $motive; ?>;
	}
	.iconBox{
		color: <?php echo $motive; ?>;
	}
	.iconBox.small a{
		color: <?php echo $motive; ?>;
	}
	.iconBox i:before{
		color: <?php echo $motive; ?>;
	}
	.flickr_badge .flickr_badge_image{
		border: 1px solid <?php echo $motive; ?>;
	}
	.breadcrumbBox ul.breadcrumb li:before{
		color: <?php echo $motive; ?>;
	}
	.widget-inner h4 + ul li a{
		color: <?php echo $motive; ?>;
	}
	#footer .newsletterBox .dashedBox input[type="submit"]{
		background: <?php echo $motive; ?>;
	}
	#wp-calendar tbody td a{
		color: <?php echo $motive; ?>;
	}
	.smallSocials li a:before{
		color: <?php echo $motive; ?>;
	}
	.pager > li > a:hover{
		color: <?php echo $motive; ?>;
	}
	.pager > li.active > a{
		color: <?php echo $motive; ?>;
	}
	.pager > li.prev a:hover:before,
	.pager > li.next a:hover:before{
		color: <?php echo $motive; ?>;
	}
	.dashedQuote p{
		color: <?php echo $motive; ?>;
	}
	.dashedQuote img.authorPhoto{
		border: 4px solid <?php echo $motive; ?>;
	}
	.easySlider .rslides_nav:before{
		color: <?php echo $motive; ?>;
	}
	ul.commentList .oneComment .comment-reply-link{
		background: <?php echo $motive; ?>;
		text-decoration: none;
	}
	ul.commentList .oneComment .metaIcon{
		background: <?php echo $motive; ?>;
	}
	#footer{
		background: <?php echo $motive; ?>;
	}
	.panel-group a.collapsed{
		color: <?php echo $motive; ?>;
	}
	.panel-group a.collapsed i:before{
		color: <?php echo $motive; ?>;
	}
	.styled-table th{
		color: <?php echo $motive; ?>;
	}
	.progress-bar{
		background: <?php echo $motive; ?>;
	}
	.logoSlider .flexslider .flex-direction-nav .flex-prev,
	.logoSlider .flexslider .flex-direction-nav .flex-next{
		background: <?php echo $motive; ?>;
	}
	.hl-box .divider-triangle{
		border-bottom: 4px solid <?php echo $motive; ?>;
	}
	.galOverlay{
		background: <?php echo $motive; ?>;
	}
	.galleryItem.simple .galTitle .galOverlay{
		background: <?php echo $motive; ?>;
	}
	.boxButton h4{
		color: <?php echo $motive; ?>;
	}
	.boxButton .boxColor{
		background: <?php echo $motive; ?>;
	}
	.price-box h3{
		color: <?php echo $motive; ?>;
	}
	.price-box .divider-triangle{
		border-bottom: 4px solid <?php echo $motive; ?>;
	}
	.price-box .divider-triangle:before{
		background: <?php echo $motive; ?>;
		color: <?php echo $motive; ?>;
	}
	.price-box .price{
		color: <?php echo $motive; ?>;
	}
	.price-box-special.price-box .price{
		background: <?php echo $motive; ?>;
	}
	.media-heading{
		color: <?php echo $motive; ?>;
	}
	.pagination > li > a,
	.pagination > li > span{
		color: <?php echo $motive; ?>;
	}
	.pagination > li > a:hover,
	.pagination > li > span:hover,
	.pagination > li > a:focus,
	.pagination > li > span:focus{
		background-color: <?php echo $motive; ?>;
	}
	.brand-box .icon-list-ul:before{
		color: <?php echo $motive; ?>;
	}
	.brand-box .icon-user:before{
		color: <?php echo $motive; ?>;
	}
	.brand-box .icon-calendar:before{
		color: <?php echo $motive; ?>;
	}
	.brand-box .icon-tags:before{
		color: <?php echo $motive; ?>;
	}
	.brand-box .link{
		color: <?php echo $motive; ?>;
	}

	.mail-box i{
		color: <?php echo $motive; ?>;
	}
	.divider-triangle:before{
		background: <?php echo $motive; ?>;
		color: <?php echo $motive; ?>;
	}
	#toTop:hover{
		background: <?php echo $motive; ?>;
		text-decoration: none;
	}
	#galleryOptions li a{
		background: <?php echo $motive; ?>;
	}
	.flexFull.flexslider .flex-control-paging li a:hover,
	.flexFull.flexslider .flex-control-paging li a.flex-active{
		background: <?php echo $motive; ?>;
	}
	.flexFull.flexslider .flex-direction-nav .flex-prev:before,
	.flexFull.flexslider .flex-direction-nav .flex-next:before{
		color: <?php echo $motive; ?>;
	}
	.flexFull.flexslider .flex-direction-nav .flex-prev:hover,
	.flexFull.flexslider .flex-direction-nav .flex-next:hover{
		background: <?php echo $motive; ?>;
	}
	.btmBx h4{
		color: <?php echo $motive; ?>;
	}
	.btmBx .divider-triangle{
		border-bottom: 4px solid <?php echo $motive; ?>;
	}
	.bigIcon{
		background: <?php echo $motive; ?>;
	}
	.serviceEl .revealBtn h5{
		color: <?php echo $motive; ?>;
	}
	.serviceEl .revealContent{
		background: <?php echo $motive; ?>;
	}
	.divider-triangle{
		border-top: 4px solid <?php echo $motive; ?>;
	}
	.divider-triangle:before{
		background: <?php echo $motive; ?>;
		color: <?php echo $motive; ?>;
	}
	.listPresentation .rs-carousel .rs-carousel-action-prev:hover,
	.listPresentation .rs-carousel .rs-carousel-action-next:hover{
		background: <?php echo $motive; ?>;
	}
	.listPresentation .date{
		color: <?php echo $motive; ?>;
	}
	.listPresentation .date .divider-triangle{
		border-right: 4px solid <?php echo $motive; ?>;
	}
	.listPresentation .date span{
		border-right: 3px solid <?php echo $motive; ?>;
	}
	.listPresentation .date span:after{
		background: <?php echo $motive; ?>;
		color: <?php echo $motive; ?>;
	}
	@media (max-width: 990px){
	.container > .navbar-collapse{
			background: <?php echo $motive; ?>;
		}

	.navbar-static-top .navbar-inner,
	.navbar-fixed-top .navbar-inner{
			background: <?php echo $motive; ?>;
		}

	.nav-collapse .nav > li > a:hover,
	.nav-collapse .nav > li > a:focus,
	.nav-collapse .dropdown-menu a:hover,
	.nav-collapse .dropdown-menu a:focus{
			background: <?php echo $motive; ?>;
		}


    .navbar-contact .text-contact.important{
            background-color: <?php echo $motive; ?>;
        }

	}
	<?php endif;?>

	<?php /*custom style - code tab*/ ?>
	<?php echo ct_get_option('code_custom_styles_css')?>
</style>