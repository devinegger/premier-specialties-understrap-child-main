<?php

/**
 * Template Part for displaying Left Right Image Highlight Template
 * 
 */

// options
$background_color = get_sub_field('background_color');
$image_horizontal_position = get_sub_field('image_horizontal_position');
$image_vertical_position = get_sub_field('image_vertical_position');
// image
$image_arr = get_sub_field('image');
$image_ID = $image_arr['ID']; 
$image_URL = $image_arr['url']; 
$image_alt = $image_arr['alt']; 
$image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'left-right-img img-fluid', 'alt'=>$image_alt) );

// video modal
$video_URL = get_sub_field('video_url');
if($video_URL) {
	$vimeo_video_id = substr($video_URL, -9);
	$vimeo_embed_url = "https://player.vimeo.com/video/". $vimeo_video_id . "?h=cbc8e3bbc7&portrait=0";
	$modal_attributes = $video_URL ? 'data-bs-toggle="modal" data-bs-target="#videoModal"' : '';
}

// everything else
$headline = get_sub_field('headline');
$headline_color = get_sub_field('headline_color');
$content = get_sub_field('content');
$button = get_sub_field('button');
if($button) {
	$button_text = $button['title'];
	$button_link = $button['url'];
	$button_target = $button['target'];
	$button_bg_color = get_sub_field('button_background_color');
	$button_text_color = get_sub_field('button_text_color');
}

$image_class = "";
$text_class = "text-end";

if ($image_horizontal_position === "Right") {
	$image_class = "order-2";
	$text_class = "";
} 

if ($image_vertical_position === "Bottom") {
	$align_items = "end";
	$row_class = "";
} else {
	$align_items = "center";
	$row_class = "py-3";
}

?>

<!-- Headline Left Image Right -->
<section id="left-right-highlight" style="background-color: <?= $background_color ?>;">
	<div class="container">
		<div class="row <?= $row_class ?> align-items-<?= $align_items ?>">
			<div class="d-flex col-md-5  <?= $image_class ?>">
				<?= $image ?>
			</div>
			<div class="col-md-7 py-4 <?= $text_class ?>">
				<h3 class="display-5 fw-semi-bold" style="color: <?= $headline_color ?>;"><?= $headline ?></h3>
				<p class="text-dark-gray mb-3"><?= $content ?></p>
				<?php if($button) : ?>
					<a class="btn btn-primary px-3 border-0" href="<?= $button_link ?>" <?= $modal_attributes ?>  target="<?= $button_target ?>"  style="background-color:<?= $button_bg_color?>; color: <?= $button_text_color ?>; "><?= $button_text ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php if ($video_URL) : ?>
<!-- video modal -->
<div class="modal fade" id="videoModal"  tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-body">
				<div class="ratio ratio-16x9">
					<iframe src="<?= $vimeo_embed_url_one ?>" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
					<script src="https://player.vimeo.com/api/player.js"></script>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>