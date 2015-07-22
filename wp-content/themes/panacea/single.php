<?php $breadcrumbs = ct_show_single_post_breadcrumbs('post') ? 'yes' : 'no'; ?>
<?php $pageTitle = ct_get_single_post_title('post'); ?>
<?php if ($pageTitle || $breadcrumbs == "yes"): ?>
	<?php echo do_shortcode('[title_row header="' . $pageTitle . '" breadcrumbs="' . $breadcrumbs . '"]') ?>
<?php endif; ?>

<div id="blog" class="chapter sectionBox">
	<div class="divider-triangle"></div>
	<div id="pageWithSidebar">


		<div id="column-main" class="no-padding-top">

			<br>
			<br>
			<?php get_template_part('templates/content', 'single'); ?>


		</div>

		<?php if (ct_use_blog_post_sidebar()): ?>



			<?php get_template_part('templates/sidebar'); ?>




		<?php endif; ?>
	</div>
</div>
