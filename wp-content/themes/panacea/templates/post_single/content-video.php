<div class="blogItem">
	<?php if (ct_get_option("posts_single_show_image", 1)): ?>
		<?php
		$embed = get_post_meta($post->ID, 'videoCode', true);
		if (!empty($embed)) {
			echo stripslashes(htmlspecialchars_decode($embed));
		} else {
			ct_post_video($post->ID, 540, 300);
		}
		?>
	<?php endif; ?>

	<?php if (ct_get_option("posts_single_show_title", 1)): ?>
		 <h3 class="heady">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
	<?php endif; ?>
	<?php get_template_part('templates/post_single/content-meta'); ?>
	<?php if (ct_get_option("posts_single_show_content", 1)): ?>
	<?php the_content(); ?>
	<?php endif; ?>

</div>













