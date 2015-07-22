<?php
/*
Template Name: Archives
*/
?>

<?php get_template_part('templates/page', 'head'); ?>

<?php $breadcrumbs = ct_show_index_post_breadcrumbs('post') ? 'yes' : 'no';?>
<?php
$pageTitle = __('Archive', 'ct_theme');
if (is_day()) {
	$pageTitle = __('Archive for', 'ct_theme') . ' ' . get_the_time(get_option('date_format'));
}
if (is_month()) {
	$pageTitle = __('Archive for', 'ct_theme') . ' ' . get_the_time('F, Y');
}
if (is_year()) {
	$pageTitle = __('Archive for', 'ct_theme') . ' ' . get_the_time('Y');
}
?>

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