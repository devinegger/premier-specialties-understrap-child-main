<?php

/**
 * Template Part for displaying the ACF CTA Panel
 *
 */

// options
$background_color = get_sub_field('background_color');
$image_vertical_position = get_sub_field('image_vertical_position');

if ($image_vertical_position === "Bottom") {
	$align_items = "end";
	$row_class = "pt-4";
	
} else {
	$align_items = "center";
	$row_class = "py-2";
}

// image
$image_arr = get_sub_field('image');
$image_ID = $image_arr['ID']; 
$image_URL = $image_arr['url']; 
$image_alt = $image_arr['alt']; 
// cta-panel-img
$image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'd-block mx-auto img-fluid', 'alt'=>$image_alt) );

// everything else
$headline = get_sub_field('headline');
$headline_color = get_sub_field('headline_color');
$content = get_sub_field('content');
$button = get_sub_field('button');
$button_text = $button['title'];
$button_link = $button['url'];
$button_target = $button['target'];
$button_bg_color = get_sub_field('button_background_color');
$button_text_color = get_sub_field('button_text_color');
?>

<!-- CTA template -->
<section id="cta-panel" style="background-color: <?= $background_color ?>;">
	<div class="container">
		<div class="row align-items-center <?= $row_class ?>">
			<div class="col-md-6 py-md-5 text-center content-pane">
				<p class="display-5 fw-semi-bold" style="color: <?= $headline_color ?>;"><?= $headline ?></p>
				<a class="btn btn-primary px-3 border-0" href="<?= $button_link ?>" target="<?= $button_target ?>" style="background-color:<?= $button_bg_color?>; color: <?= $button_text_color ?>; "><?= $button_text ?></a>
			</div>
			<div class="col-md-6 d-flex align-items-<?= $align_items ?>">
				<?= $image ?>
			</div>
		</div>
	</div>
</section>