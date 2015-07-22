
		<div class="chapter" id="aboutus">
			<div class="sectionBox">

				<?php while (have_posts()) : the_post(); ?>
					<?php $custom = get_post_custom(get_the_ID()); ?>

					<div class="row">
						<?php if (ct_get_option("portfolio_single_show_image", 1)): //OK?>
							<div class="col-md-12">
								<?php get_template_part('templates/portfolio/content-single-portfolio', ctPortfolioType::getMethodFromMeta($custom)); ?>
							</div>
						<?php endif; ?>
						<br>
						<div class="col-md-6">
								<?php if (ct_get_option("portfolio_single_show_title", 1)): ?>
									<div class="line-button">
										<h3><?php the_title()?></h3>
									</div>
								<?php endif; ?>
						</div>
						<div class="col-md-6">
							<?php $next = get_next_post(); ?>
							<?php $prev = get_previous_post(); ?>
							<?php if ($next): ?>
								<a href="<?php echo get_permalink($next->ID); ?>" class="btn pull-right btn-next"><?php _e('Next', 'ct_theme'); ?></a>
							<?php endif; ?>

							<?php if ($worksPage = ct_get_option('portfolio_index_page')): ?>

								<?php
								if (function_exists('icl_object_id')) {
									$iclpageid = icl_object_id($worksPage, 'page', true, ICL_LANGUAGE_CODE);
									$worksPage = $iclpageid ? $iclpageid : $worksPage;
								}
								?>

								<a href="<?php echo get_permalink($worksPage); ?>" class="btn pull-right btn-mid"><i class="icon-th"></i></a>
							<?php endif; ?>
							<?php if ($prev): ?>
								<a href="<?php echo get_permalink($prev->ID); ?>" class="btn pull-right btn-previous"><?php _e('Previous', 'ct_theme'); ?></a>
							<?php endif; ?>
						</div></div>

						<!--BRANDBOX START!-->
						<div class="brand-box">
								<a>
			                    <?php $cats = ct_get_categories_string(get_the_ID(), ', ', 'portfolio_category'); ?>
								<?php if (ct_get_option("portfolio_single_show_cats", 1) && $cats): ?>
									<?php if ($cats): ?>
										<i class="icon-list-ul"></i> <?php echo $cats; ?>
									<?php //echo do_shortcode('[icon_text icon="icon-list-ul"]'.$cats.'"[/icon_text]');?>
									<?php endif; ?>
			                    <?php endif; ?>
			                    </a>
                            <?php if (ct_get_option("portfolio_single_show_author", 1)): //OK?>
		                    <a><i class="icon-user"></i><?php echo get_the_author(); ?></a>
                            <?php endif; ?>
                            <?php if (ct_get_option("portfolio_single_show_date", 1)): //OK?>
		                    <a><i class="icon-calendar"></i><?php echo get_the_date()?></a>
                            <?php endif; ?>

                        <?php
			                        $i=1;
									$strTags='';
			                        foreach (wp_get_post_tags(get_the_ID()) as $key=>$value){?>

									<?php
				                        if ($i == count((wp_get_post_tags(get_the_ID())))){
					                        $strTags.= $value->name;
				                        }else{
					                        $strTags.= $value->name . ', ';
				                        }$i++;

			                        }?>
                        <?php if (ct_get_option("portfolio_single_show_tags", 1) && $strTags):?>
		                    <a><i class="icon-tags"></i><?php echo $strTags?></a>
                        <?php endif; ?>

		                    <a class="link" href="<?php echo $custom['external_url'][0] ?>"><?php _e('Visit Online', 'ct_theme'); ?></a>
                        </div><!--BRANDBOX END!-->

						<br><br>
						<div class="text-box"><!--WORK CONTENT START!-->
                            <?php if (ct_get_option("portfolio_single_show_content", 1)): ?>
							<h5><?php _e('Project decription', 'ct_theme'); ?></h5>
								<?php the_content(); ?>
							<?php endif; ?>
						</div><!--WORK CONTENT END!-->
						<div class="row">
						<div class="">
						<h5 class="pull-left"><?php _e('Share this project', 'ct_theme'); ?></h5>
						<?php echo do_shortcode(ct_socials_code())?>
						</div>
							</div>
							<!--RELATED WORKS!-->
						<div class="row">
							<div >

								<?php if (ct_get_option("portfolio_single_show_other_projects", 1)): ?>
									<?php echo do_shortcode('[works limit="4" columns="4" header="" groups=""][/works]');
									//columns="thumb_work_slide" 4 columns single work slider with 235x235 img size ?>
								<?php endif; ?>
							</div>
						</div>


				<!--RELATED WORKS END!-->


				<?php endwhile; ?>
			</div>
            <br>
            <br>
            <?php comments_template('/templates/comments.php'); ?>
		</div>
