<?php get_template_part('templates/page', 'head'); ?>
<?php $va = true ? 'do when true' : "do when false"; ?>
<?php $breadcrumbs = ct_show_index_post_breadcrumbs('post') ? 'yes' : 'no'; ?>
<?php $pageTitle = ct_get_index_post_title('post'); ?>
<?php if ($pageTitle || $breadcrumbs == "yes"): ?>
	<?php echo do_shortcode('[title_row header="' . $pageTitle . '" breadcrumbs="' . $breadcrumbs . '"]') ?>
<?php endif; ?>






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


<!-- / blog -->


