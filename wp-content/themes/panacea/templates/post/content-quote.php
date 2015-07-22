
	 <?php if (ct_get_option("posts_index_show_excerpt", 1)): ?>
      <?php $quote = get_post_meta($post->ID, 'quote', true); ?>
		<?php echo do_shortcode('[blockquote]'.$quote.'[/blockquote]')?>
<?php endif;?>
