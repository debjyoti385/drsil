<?php $slider = ct_slider_code(); ?>
<?php if ($slider && !is_search() && !is_404()): ?>
    <?php echo do_shortcode($slider); ?>
<?php endif; ?>

<div
    class="navbar navbar-default navbar-fixed-top <?php echo ct_get_option('general_show_contact_bar') ? 'navbar-contact' : '' ?>"
    role="navigation">
    <?php if (ct_get_option('general_show_contact_bar')): ?>
        <?php if (ct_get_option('general_contact_bar_email') || ct_get_option('general_contact_bar_phone')): ?>
            <div class="contact-info hidden-xs">
                <div class="container">
                    <?php if (ct_get_option('general_contact_bar_email')): ?>
                        <p class="text-contact"><i class="icon-envelope"></i> <a
                                href="mailto:<?php echo ct_get_option('general_contact_bar_email') ?>"><?php echo ct_get_option('general_contact_bar_email') ?></a>
                        </p>
                    <?php endif ?>
                    <?php if (ct_get_option('general_contact_bar_phone')): ?>
                        <p class="text-contact important"><i
                                class="icon-phone"></i><?php echo ct_get_option('general_contact_bar_phone') ?></p>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>
    <?php endif ?>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="header-area pull-left">
                <?php if ($logo = ct_get_option('general_logo')) { ?>
                    <a class="brand" href="<?php echo home_url(); ?>"><img src="<?php echo esc_url($logo) ?>"
                                                                           alt=" "></a>
                <?php } elseif ($plain = ct_get_option('general_logo_html')) { ?>
                    <?php echo $plain ?>
                <?php }; ?>
                <?php $socials = ct_socials_code(); ?>
                <?php if ($socials != '') { ?>
                    <div class="soc-area">
                        <?php echo do_shortcode($socials); ?>
                        <div class="divider-triangle"></div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="navbar-collapse collapse ">
            <?php
            if (has_nav_menu('primary_navigation')) {
                wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_id' => 'nav', 'menu_class' => 'nav pull-right navbar-nav'));
            }
            ?>
        </div>
    </div>
</div>

