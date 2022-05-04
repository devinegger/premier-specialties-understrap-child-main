<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$image_arr = get_field('hero_image', 'option');
$image_URL = $image_arr['url'];

$mobile_image_arr = get_field('mobile_hero_image', 'option');
$mobile_image_URL = $mobile_image_arr['url'];

$headline = get_field('headline', 'option');

$content = get_field('content', 'options');
$content_width  = get_field('content_width', 'options');

$button_one = get_field('button_one', 'options');
$button_one_title = $button_one['title'];
$button_one_url = $button_one['url'];
$button_one_target = $button_one['target'];

$video_URL_one = get_field('video_url_one', 'options');
$modal_attributes_one = "";
if($video_URL_one) {
	$vimeo_video_id_one = substr($video_URL_one, -9);
	$vimeo_embed_url_one = "https://player.vimeo.com/video/". $vimeo_video_id_one . "?h=cbc8e3bbc7&portrait=0";
	$modal_attributes_one = $video_URL_one ? 'data-bs-toggle="modal" data-bs-target="#videoModalOne"' : '';
}

$button_two = get_field('button_two', 'options');
if ($button_two) {
	$button_two_title = $button_two['title'];
	$button_two_url = $button_two['url'];
	$button_two_target = $button_two['target'];
}

$video_URL_two = get_field('video_url_two', 'options');
$modal_attributes_two = "";
if($video_URL_two) {	
	$vimeo_video_id_two = substr($video_URL_two, -9);
	$vimeo_embed_url_two = "https://player.vimeo.com/video/". $vimeo_video_id_two . "?h=cbc8e3bbc7&portrait=0";
	$modal_attributes_two = $video_URL_two ? 'data-bs-toggle="modal" data-bs-target="#videoModalTwo"' : '';
}

?>

<div class="wrapper" id="page-wrapper">

	<div id="content" tabindex="-1">	

		<main class="site-main" id="main">
		
			<!-- homepage hero -->
			<div class="homepage-hero d-flex align-items-center" style="background-image: url('<?= $image_URL ?>');">
				
				<!--<div class="mobile-wrap align-items-center" style="background-image: url('<?= $mobile_image_URL ?>');">
				apply different image bg for mobile
				</div>-->

				
					<div class="container pt-5 py-3" style="z-index: 99;">
						<div class="row">
							<div class="text-light" style="max-width: <?= $content_width ?>px;">
								<div class="container">
									<h2 class="display-5 display-md-4 fw-bold"><?= $headline ?></h2>
									<p><?= $content ?></p>
								</div>
							</div>
							<div class="d-flex text-light">
								<div class="container ">
									<a class="btn btn-primary text-white mt-2 px-3 py-1 me-1" href="<?= $button_one_url ?>" target="<?= $button_one_target ?>" <?= $modal_attributes_one ?>><?= $button_one_title ?></a>
									<?php if($button_two): ?>
										<a class="btn btn-primary text-white mt-2 px-3 py-1" href="<?= $button_two_url ?>" target="<?= $button_two_target ?>" <?= $modal_attributes_two ?>><?= $button_two_title ?></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
			</div>
			<?php if($video_URL_one) : ?>
			<!-- video modal ONE -->
			<div class="modal fade" id="videoModalOne"  tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
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
			<!-- video modal TWO -->
			<?php if($video_URL_two) : ?>
			<div class="modal fade" id="videoModalTwo"  tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="modal-body">
							<div class="ratio ratio-16x9">
								<iframe src="<?= $vimeo_embed_url_two ?>" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
							<script src="https://player.vimeo.com/api/player.js"></script>


							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<!-- display any ACF Templates -->
			<?php get_template_part( 'template-parts/acf', 'main' ); ?>
			
		</main><!-- #main -->
	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
