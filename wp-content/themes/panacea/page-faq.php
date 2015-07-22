<?php
/*
Template Name: Faq Template
*/
?>
<?php get_template_part('templates/page', 'head'); ?>
<?php $breadcrumbs = ct_show_index_post_breadcrumbs('faq') ? 'yes' : 'no';?>
<?php $pageTitle = ct_get_index_post_title('faq');?>

<?php echo do_shortcode('[full_width]
   [parallax imgsrc="'. CT_THEME_ASSETS .'/img/medical-content/parallaxFAQ.jpg"]
      [parallax_text title="'.__('FAQ', 'ct_theme').'"]'.__('frequently given answers', 'ct_theme').'[/parallax_text]
   [/parallax]
[/full_width]') ;?>
<div class="chapter" id="<?php echo $id; ?>" >
	        <div class="sectionBox">
	        	<div class="divider-triangle"></div>

<?php get_template_part('templates/content', 'faq'); ?>
  </div>
 		 </div>
		<?php echo do_shortcode('[full_width]
   [parallax overlay="#4394a3" opacity="0.3" imgsrc="'. CT_THEME_ASSETS .'/img/medical-content/parallax02.jpg"]
      [parallax_text title="'.__('It is time  ', 'ct_theme').'"]'.__('to evolve your website to a new level', 'ct_theme').'[/parallax_text]
   [/parallax]
[/full_width]') ;?>