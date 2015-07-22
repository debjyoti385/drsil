<?php

/**
 * Socials shortcode
 */
class ctSocialsShortcode extends ctShortcode
{

    /**
     * Returns name
     * @return string|void
     */
    public function getName()
    {
        return 'Socials';
    }

    /**
     * Shortcode name
     * @return string
     */
    public function getShortcodeName()
    {
        return 'socials';
    }

    /**
     * Handles shortcode
     * @param $atts
     * @param null $content
     * @return string
     */
    public function handle($atts, $content = null)
    {
        extract(shortcode_atts($this->extractShortcodeAttributes($atts), $atts));

        $headerHtml = $header ? '<h4>' . $header . '</h4>' : '';

        $linksHtml = '';
        if ($fb) {
            $linksHtml .= '<li class="fb"><a href="http://www.facebook.com/' . $fb . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a></li>';
        }
        if ($twit) {
            $linksHtml .= '<li class="tw"><a href="http://www.twitter.com/' . $twit . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a></li>';
        }
        if ($dribbble) {
            $linksHtml .= '<li class="dribbble"><a href="http://dribbble.com/' . $dribbble . '" target="_blank" data-toggle="tooltip"  data-placement="bottom" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>';
        }
        if ($google) {
            $linksHtml .= '<li class="gg"><a href="http://plus.google.com/' . $google . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a></li>';
        }
        if ($linkedin) {
            $linksHtml .= '<li class="ld"><a href="http://www.linkedin.com/' . $linkedin . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>';
        }
        if ($pinterest) {
            $linksHtml .= '<li class="pinterest"><a href="http://www.pinterest.com/' . $pinterest . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>';
        }

        if ($flickr) {
            $linksHtml .= '<li class="flickr"><a href="http://www.flickr.com/photos/' . $flickr . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i class="fa fa-flickr"></i></a></li>';
        }
        if ($tumblr) {
            $linksHtml .= '<li class="tumblr"><a href="http://' . $tumblr . '.tumblr.com" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Tumblr"><i class="fa fa-tumblr"></i></a></li>';
        }
        if ($instagram) {
            $linksHtml .= '<li class="instagram"><a href="http://instagram.com/' . $instagram . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a></li>';
        }
        if ($youtube) {
            $linksHtml .= '<li class="youtube"><a href="http://www.youtube.com/' . $youtube . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube-play"></i></a></li>';
        }
        if ($vimeo) {
            $linksHtml .= '<li class="vimeo"><a href="http://vimeo.com/' . $vimeo . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Vimeo"><i class="fa fa-vimeo-square"></i></a></li>';
        }
        if ($phone) {
            $linksHtml .= '<li class="phone"><a href="callto://+' . $phone . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="' . $phonelabel . '"><i class="fa fa-phone"></i></a></li>';
        }
        if ($skype) {
            $linksHtml .= '<li class="skype"><a href="skype:' . $skype . '?call" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Skype"><i class="fa fa-skype"></i></a></li>';
        }
        if ($email) {
            $linksHtml .= '<li class="email"><a href="mailto:' . $email . '" target="_blank" data-toggle="tooltip" data-placement="bottom" title="' . $emaillabel . '"><i class="fa fa-envelope"></i></a></li>';
        }

        if ($rss == 'yes') {
            $linksHtml .= '<li class="email"><a href="' . current_page_url() . '?feed=rss2" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title="RSS"><i class="fa fa-rss"></i></a></li>';
        }

        if ($widgetmode == 'true') {
            return
                $headerHtml . '
					<ul' . $this->buildContainerAttributes(array('class' => array('extraSocials', 'pull-right')), $atts) . '>' . $linksHtml . '</ul>';
        } else {
            return
                $headerHtml . '
					<ul' . $this->buildContainerAttributes(array('class' => array('extraSocials')), $atts) . '>' . $linksHtml . '</ul>';
        }
    }


    protected function getInlineJS()
    {
        return ' ';

    }

    /**
     * Returns config
     * @return null
     */
    public function getAttributes()
    {
        return array(
            'widgetmode' => array('default' => 'false', 'type' => false),
            'header' => array('label' => __("header text", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'fb' => array('label' => __("Facebook username", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'twit' => array('label' => __("Twitter username", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'dribbble' => array('label' => __("Dribbble username", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'google' => array('label' => __("Google+ username", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'linkedin' => array('label' => __("LinkedIn username", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'pinterest' => array('label' => __("Pinterest username", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'flickr' => array('label' => __("Flickr username", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'tumblr' => array('label' => __("Tumblr username", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'instagram' => array('label' => __("Instagram username", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'youtube' => array('label' => __("Youtube movie", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'phone' => array('label' => __("Phone number to call by Skype", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'phonelabel' => array('label' => __("Phone tooltip label", 'ct_theme'), 'default' => __("Phone", 'ct_theme'), 'type' => 'input'),
            'skype' => array('label' => __("Skype user", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'vimeo' => array('label' => __("Vimeo url - with http://", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'email' => array('label' => __("Email address", 'ct_theme'), 'default' => '', 'type' => 'input'),
            'emaillabel' => array('label' => __("Email tooltip label", 'ct_theme'), 'default' => __("Email", 'ct_theme'), 'type' => 'input'),
            'rss' => array('label' => __('Rss', 'ct_theme'), 'default' => 'no', 'type' => 'select', 'options' => array('no' => __('no', 'ct_theme'), 'yes' => __('yes', 'ct_theme')), 'help' => __("Show rss feed link?", 'ct_theme')),
        );
    }
}

new ctSocialsShortcode();