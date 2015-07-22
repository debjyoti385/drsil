<?php
//The Query
global $wp_query;
$arrgs = $wp_query->query_vars;
$arrgs['posts_per_page'] = ct_get_option("posts_index_per_page", 3);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$arrgs['paged'] = $paged;
$wp_query->query($arrgs);
?>




<!-- ********************* -->
<!-- main column ********* -->
<div id="column-main" class="no-padding-top">

	<br>
	<br>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php $format = get_post_format();
			$format = $format ? $format : 'standard';
			$class = $format == 'standard' ? 'blogItem post format-type-image' : 'blogItem post format-type-' . $format;
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
				<?php get_template_part('templates/post/content-' . $format); ?>
			</article>
		<?php endwhile; ?>



		<?php if (isset($wp_query) && $wp_query->max_num_pages > 1) : ?>
			<div class="row">
				<div class="col-md-12">
					<div class="pagination-blog">
						<ul class="pagination">
							<?php if ($paged != 1): ?>
								<li><a href="<?php echo get_previous_posts_page_link(); ?>"><i class="icon-chevron-left"></i></a></li>
							<?php endif; ?>
							<?php for ($i = 1; $i <= $wp_query->max_num_pages; $i++) {

									?>
									<li><a href=" <?php echo get_pagenum_link($i); ?>"><?php echo $i; ?></a></li>
								<?php

							}
							?>
							<?php if ($paged != $wp_query->max_num_pages): ?>
								<li ><a href="<?php echo get_next_posts_page_link(); ?>"><i class="icon-chevron-right"></i></a></li>
							<?php endif; ?>
						</ul>
						<?php if (false): ?><?php posts_nav_link(); ?><?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>


	<?php else: ?>
		<div class="inner">
			<h2 class="search-header col-md-9">
				<?php _e('No search results found', 'ct_theme'); ?>
			</h2>
		</div>
	<?php endif; ?>
	<!-- / row -->


</div>
<!-- *********************** -->
<!-- / column-main ********* -->