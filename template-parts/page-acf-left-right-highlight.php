<?php

/**
 * Template Part for displaying Page - Team Tile
 * 
 * Displays a 3 column row with the Team Members custom post type data displayed in cards using the Title as 
 * the name of the person, and then custom fields for Headshot, Job Title, and Job Description
 * 
 * This template file also creates a modal with a carousel for each Team Member CPT as well.
 * 
 */

if (have_rows('section_templates')) : // if there are custom section templates on page
    while (have_rows('section_templates')) : the_row();
        if (get_row_layout() == 'left_right_highlight_image') : // and team members is one of those templates

			// options
            $background_color = get_sub_field('background_color');
            $image_horizontal_position = get_sub_field('image_horizontal_position');
            $image_vertical_position = get_sub_field('image_vertical_position');
            // image
			$image_arr = get_sub_field('image');
			$image_ID = $image_arr['ID']; 
            $image_URL = $image_arr['url']; 
			$image_alt = $image_arr['alt']; 
			$image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'd-block mx-auto left-right-img', 'alt'=>$image_alt) );
			// video modal
            $video_URL = get_sub_field('video_url');
			$youtube_video_id = substr($video_URL, -11);
			$youtube_embed_url = "https://www.youtube.com/embed/" . $youtube_video_id;
			$modal_attributes = $video_URL ? 'data-bs-toggle="modal" data-bs-target="#videoModal"' : '';
			// everything else
            $headline = get_sub_field('headline');
            $headline_color = get_sub_field('headline_color');
            $content = get_sub_field('content');
            $button = get_sub_field('button');
            $button_text = $button['title'];
            $button_link = $button['url'];
			$button_target = $button['target'];
?>


<?php 

	$image_class = "";
	$text_class = "text-end";

	if ($image_horizontal_position === "Right") {
		$image_class = "order-2";
		$text_class = "";
	} 

    $image_vertical_position === "Bottom" ? $align_items = "end" : $align_items = "center";

?>

<!-- Headline Left Image Right -->
<div class="content-wrap" style="background-color: <?= $background_color ?>;">
	<div class="container">
		<div class="row pt-2">
			<div class="d-flex col-md-6 align-items-<?= $align_items ?> <?= $image_class ?>">
				<?= $image ?>
			</div>
			<div class="col-md-6 py-4 <?= $text_class ?>">
				<h3 class="display-5 fw-semi-bold" style="color: <?= $headline_color ?>;"><?= $headline ?></h3>
				<p class="text-dark-gray mb-3"><?= $content ?></p>
				<a class="btn btn-primary text-white px-3" href="<?= $button_link ?>" <?= $modal_attributes ?>><?= $button_text ?></a>
			</div>
		</div>
	</div>
</div>

			<?php if ($video_URL) : ?>
			<!-- video modal -->
			<div class="modal fade" id="videoModal"  tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="modal-body">
							<iframe src="<?= $youtube_embed_url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
