<?php

echo do_shortcode('
[full_width]
   [parallax imgsrc="'.get_template_directory_uri().'/assets/images/pg404-parallax.jpg"]
      [parallax_text title="'.__('ooops...', 'ct_theme').'"]'.__('something is not right', 'ct_theme').'[/parallax_text]
   [/parallax]
[/full_width]
');


$html ='<div class="pg404">
<h1 class="std">'.__('Error 404 - page not found', 'ct_theme').'</h1>
<h3 class="std">'.__('Don\'t panic, that\'s nothing serious', 'ct_theme').'</h3>
<p>
'.__('The page you were looking for probably never existed or it has been deleted. Please make sure you didn\'t entered wrong address.', 'ct_theme').'<br>
'.__('You can contact us and we will try to solve this for you.', 'ct_theme').'
</p>
<a href="'.home_url().'" class="btn btn-primary btn-wide">'.__('Take me to home page', 'ct_theme').'</a>
</div>';

echo do_shortcode('[chapter id="p404"]'.$html.'[/chapter]');


echo do_shortcode('
[full_width]
   [parallax imgsrc="'.get_template_directory_uri().'/assets/images/parallax02.jpg"]
      [parallax_text title="'.__('It\'s time', 'ct_theme').'"]'.__('to evolve your website to a new level', 'ct_theme').'[/parallax_text]
   [/parallax]
[/full_width]
');

?>

