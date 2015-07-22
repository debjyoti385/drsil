<?php if (ct_get_option("posts_index_show_author", 1)): ?>
	<span class="textIcon"><i class="icon-user"></i> <?php the_author_posts_link() ?></span>
<?php endif; ?>

<?php if (ct_get_option("posts_index_show_date", 1)): ?>
	<span class="textIcon"><i class="icon-calendar"></i> <?php echo get_the_date(); ?></span>
<?php endif; ?>

<?php $cats = get_the_terms(get_the_ID(), 'category'); ?>
<?php if (ct_get_option("posts_index_show_categories", 1) && $cats): ?>
	<span class="textIcon"><i class="icon-tag"></i> <a href="<?php the_permalink() ?>%category"><?php the_category(', ', '', get_the_ID()) ?> </a></span>
<?php endif; ?>


<?php if (ct_get_option("posts_index_show_comments_link", 1)): ?>
	<span class="textIcon"><i class="icon-comment-alt"></i> <a href="<?php the_permalink() ?>#comments"><?php echo wp_count_comments(get_the_ID())->approved ?> </a></span>
<?php endif; ?>
</br>
</br>