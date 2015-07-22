<?php $imageSize = ct_show_single_post_image_size();    ?>

<?php switch ($imageSize){
		case 'full':
				$width = '620px';
				$height = '211px';
				if (has_post_thumbnail(get_the_ID())){
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array($width, $height));
					$imageUrl = $image[0]; ?>
					<div class="bPhoto fullImage">
					<a href="<?php echo get_permalink(get_the_ID())?>"><img src="<?php echo $imageUrl?>" alt=" "></a>
					</div>
				<?php }
				break;
		case 'small':
				$width ='180px';
				$height = '180px';
				if (has_post_thumbnail(get_the_ID())){
					$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array($width, $height));
					$imageUrl = $image[0]; ?>
					<div class="bPhoto">
					<a href="<?php echo get_permalink(get_the_ID())?>"><img src="<?php echo $imageUrl?>" alt=" "></a>
					</div>
				<?php }
				break;
		default: '1';
	}?>

