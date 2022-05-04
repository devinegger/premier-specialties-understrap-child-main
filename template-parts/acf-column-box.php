<?php

/**
 * Template Part for displaying Column Box Template
 * 
 * 
 */
			
$background_color = get_sub_field('background_color');
$heading = get_sub_field('heading');
$heading_color = get_sub_field('heading_color');
$num_columns = get_sub_field('number_of_columns');
$column_class = $num_columns === '2' ? "col-md-6" : "col-md-4";
$content_boxes = get_sub_field('content_boxes');
?>
<section id="learn-more" class="column-box" style="background-color: <?= $background_color ?>;">
	<div class="container">
		<div class="row py-3">
			<div class="col-12">
				<h2 class="display-4 text-center fw-semi-bold" style="color: <?= $heading_color ?>;"><?= $heading ?></h2>
			</div>
		</div>
		<div class="row py-2 justify-content-around">
			<?php foreach($content_boxes as $content_box) : ?> 
				<?php $image_ID = $content_box['image']['ID']; ?> 
				<?php $image_URL = $content_box['image']['url']; ?>
				<?php $image_alt = $content_box['image']['alt']; ?>
				<?php $image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'content-box-img', 'alt'=>$image_alt) ); ?>
				<?php $subhead = $content_box['sub_header']; ?>
				<?php $content = $content_box['content']; ?>
			<div class="<?= $column_class ?>">
				<div class="content-box d-flex flex-row pb-3">
					<?= $image ?>
					<div class="ps-2">
						<h3 class="mb-1"><?= $subhead ?></h3>
						<p><?= $content ?></p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>