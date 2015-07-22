<?php
function theme_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;?>

<li>
	<div class="oneComment" id="comment-<?php comment_ID(); ?>">
		<div class="inner">
			<span class="author"><?php echo get_comment_author_link() ?></span>
			<span class="date"><?php echo get_comment_date(); ?><?php if (get_comment_time()): ?> <?php _e('at', 'ct_theme') ?> <?php echo get_comment_time() ?><?php endif; ?> </span>
			<?php if (ct_get_option("posts_single_show_comment_form", 1)): ?><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?><?php endif; ?>
			<p><?php comment_text() ?> </p>
		</div>
		<ol class="children">
			<li class="comment byuser comment-author-admin bypostauthor odd alt depth-2" id="li-comment-<?php comment_ID(); ?>">
	</div>

	<?php
	}
	?>


	<?php if (((get_post_type() == 'portfolio' && ct_get_option("portfolio_single_show_comments", 0)) || (get_post_type() == 'post' && ct_get_option("posts_single_show_comments", 1)) || (get_post_type() == 'page' && ct_get_option("pages_single_show_comments", 0))) && have_comments()): ?>

		<h3 class="huge"> <?php echo __("Comments", "ct_theme"); ?></h3>
		<ul class="commentList">
			<?php wp_list_comments(array('callback' => 'theme_comments', 'style' => 'ol')); ?>
		</ul>

		<div class="pagination-comments">
			<?php paginate_comments_links(array('type'=>'list','prev_text'=>'<i class="icon-chevron-left"></i>','next_text'=>'<i class="icon-chevron-right"></i>')); ?>
		</div>

	<?php endif; ?>


	<?php if (((get_post_type() == 'portfolio' && ct_get_option("portfolio_single_show_comment_form", 0)) || (get_post_type() == 'post' && ct_get_option("posts_single_show_comment_form", 1)) || get_post_type() == 'page' && ct_get_option("pages_single_show_comment_form", 0)) && comments_open()) : // Comment Form ?>

		<!-- comment form ****** -->


		<form class="contactForm" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<fieldset>
				<div class="row">
					<div class="col-md-12">
						<input name="name" required type="text" placeholder="<?php _e('your name...', 'ct_theme') ?>"">
					</div>
				</div>
				<!-- / row -->
				<div class="row">
					<div class="col-md-6">
						<input name="email" required type="text" placeholder="<?php _e('your email...', 'ct_theme') ?>">
					</div>
					<div class="col-md-6">
						<input name="website" type="text" placeholder="<?php _e('your website address...', 'ct_theme') ?>">
					</div>
				</div>
				<!-- / row -->
				<div class="row">
					<div class="col-md-12">
						<textarea name="comment" required placeholder="<?php _e('your message goes here...', 'ct_theme') ?>"></textarea>
					</div>
				</div>
				<!-- / row -->

				<div class="row">
					<div class="col-md-12 doRight">
						<input type="submit" value="submit">
					</div>
				</div>
				<!-- / row -->
			</fieldset>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', get_the_ID()); ?>
			<?php if (false): ?><?php comment_form() ?><?php endif; ?>
		</form>


		<!-- ********************* -->
		<!-- / comment form ****** -->

	<?php endif; ?>



