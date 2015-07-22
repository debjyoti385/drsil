<?php $data = ct_get_posts_grouped_by_cat(array('post_type' => 'faq', 'showposts' => -1), 'faq_category'); ?>

<?php $breadcrumbs = ct_show_index_post_breadcrumbs('faq') ? 'yes' : 'no';?>
<?php $pageTitle = ct_get_index_post_title('faq');?>

<div class="inner">
	<div class="row">
		<div class="col-md-4">
			<?php if ($data): ?>
				<div id="faq1" class="faqMenu" data-spy="affix" data-offset-top="50">
					<ul class="nav">
						<?php $counter = 0; ?>
						<?php foreach ($data as $catId => $details): ?>
							<?php if (isset($details['cat'])): ?>
								<?php $counter++; ?>
								<li<?php if ($counter == 1): ?> class="active"<?php endif; ?>><a href="#q<?php echo $catId ?>"><?php echo $details['cat']; ?></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-md-8">
			<?php if ($pageTitle || $breadcrumbs == "yes"): ?>
				<?php echo do_shortcode('[row headertype="1" header="' . $pageTitle . '"]') ?>
			<?php endif; ?>
			<?php if ($data): ?>
				<div class="faqItems">
				<?php foreach ($data as $catId => $details): ?>
					<div class="sectionFaq" id="q<?php echo $catId; ?>">
						<?php if (isset($details['posts']) && isset($details['cat'])): ?>
							<?php $html = '[accordion header="' . $details['cat'] . '"]'; ?>
							<?php foreach ($details['posts'] as $faq): ?>
								<?php $html .= '[accordion_item title="' . $faq->post_title . '"]' . $faq->post_content . '[/accordion_item]'; ?>
							<?php endforeach; ?>
							<?php $html .= '[/accordion]'; ?>
							<?php echo do_shortcode($html) ?>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>