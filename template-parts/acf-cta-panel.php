<?php

/**
 * Template Part for displaying the ACF CTA Panel
 * 
 * 
 */

// options
$background_color = get_sub_field('background_color');

// image
$image_arr = get_sub_field('image');
$image_ID = $image_arr['ID']; 
$image_URL = $image_arr['url']; 
$image_alt = $image_arr['alt']; 
$image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'd-block mx-auto cta-panel-img', 'alt'=>$image_alt) );

// everything else
$headline = get_sub_field('headline');
$content = get_sub_field('content');
$button = get_sub_field('button');
$button_text = $button['title'];
$button_link = $button['url'];
$button_target = $button['target'];
?>

<!-- CTA template -->
<div class="content-wrap" style="background-color: <?= $background_color ?>;">
	<div class="container-fluid">
		<div class="row py-3">
			<div class="col-md-6 text-center py-4">
				<p class="display-5 fw-semi-bold"><?= $headline ?></p>
				<a class="btn btn-primary text-white px-3" href="<?= $button_link ?>" target="<?= $button_target ?>"><?= $button_text ?></a>
			</div>
			<div class="col-md-6">
				<?= $image ?>
			</div>
		</div>
	</div>
</div>