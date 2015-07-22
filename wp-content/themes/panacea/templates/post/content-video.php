<div class="blogItem">
	<?php if (ct_get_option("posts_index_show_image", 1)): ?>
		<div class="bPhoto fullImage">
			<div class="videoFrameContainer">
				<?php
				$embed = get_post_meta($post->ID, 'videoCode', true);
				if (!empty($embed)) {
					echo stripslashes(htmlspecialchars_decode($embed));
				} else {
					ct_post_video($post->ID, 540, 300);
				}
				?>
			</div>
		</div>
	<?php endif; ?>
	<div class="bDescription">
		<?php if (ct_get_option("posts_index_show_title", 1)): ?>
			<h3 class="heady"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>


		<?php endif; ?>

		<?php get_template_part('templates/post/content-meta'); ?>

		<?php if (ct_get_option("posts_index_show_excerpt", 1)): ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>
		<?php if (ct_get_option("posts_index_show_fulltext", 0)): ?>
			><?php the_content(); ?>
		<?php endif; ?>

		<?php if (ct_get_option("posts_index_show_more", 1)): ?>
			<a href="<?php the_permalink() ?>" class="btn"><?php echo __('read more', 'ct_theme') ?></a>
		<?php endif; ?>

	</div>
</div>


