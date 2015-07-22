<?php
/*
Template Name: Author
*/
?>

<?php get_template_part('templates/page', 'head'); ?>
<?php $breadcrumbs = ct_show_index_post_breadcrumbs('post') ? 'yes' : 'no';?>
<?php $pageTitle = '';?>
<?php if (have_posts()) : ?>
		<?php the_post(); ?>
		<?php $pageTitle =  get_the_author(); ?>
		<?php rewind_posts(); ?>
<?php endif; ?>
<?php $pageTitle =  $pageTitle ? (__('Posts by', 'ct_theme') . ' ' . $pageTitle) : __('Posts', 'ct_theme');?>

<?php if($pageTitle || $breadcrumbs == "yes"):?>
	<?php echo do_shortcode('[title_row header="' . $pageTitle . '" breadcrumbs="' . $breadcrumbs . '"]')?>
<?php endif;?>


<div id="blog" class="chapter sectionBox">
	<div class="divider-triangle"></div>

	<!-- To turn on left sidebar just add "sidebarLeft" class -->

	<!-- *************************** -->
	<!-- pageWithSidebar ********* -->
	<div id="pageWithSidebar">

		<?php get_template_part('templates/content'); ?>

		<?php if (ct_use_blog_index_sidebar()): ?>

			<?php get_template_part('templates/sidebar'); ?>

		<?php endif; ?>


	</div>
	<!-- *************************** -->
	<!-- / pageWithSidebar ********* -->
</div>