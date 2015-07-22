<div id="footer" class="<?php echo 'column'.ct_get_option('style_footer_column'); ?>">

	<div class="row footerrow">
        <?php ct_footer_columns('','<div class="%class% col-md-%col%"><div class="inner">','</div></div>') ?>

	</div>
	<!-- / row -->
</div>
<!-- / footer -->


<div class="footNotes">
	<div class="row">
		<div class="col-md-6">
			<p><?php echo strtr(ct_get_option('general_footer_text', ''), array('%year%' => date('Y'), '%name%' => get_bloginfo('name', 'display'))) ?></p>
		</div>
		<div class="col-md-6 doRight">
        <?php dynamic_sidebar('sidebar-footer4'); ?>
      </div>
	</div>
	<!-- / row -->
</div>
<!-- / footNotes -->