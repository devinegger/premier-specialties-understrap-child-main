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

$image_arr = get_field('hero_image', 'options');
$image_URL = $image_arr['url'];

$content = get_field('content', 'options');
$content_width  = get_field('content_width', 'options');

$button = get_field('button', 'options');
$button_title = $button['title'];
$button_url = $button['url'];
$button_target = $button['target'];

$video_URL = get_field('video_url', 'options');
$youtube_video_id = substr($video_URL, -11);
$youtube_embed_url = "https://www.youtube.com/embed/" . $youtube_video_id;
$modal_attributes = $video_URL ? 'data-bs-toggle="modal" data-bs-target="#videoModal"' : '';

?>

<div class="wrapper" id="page-wrapper">

	<div id="content" tabindex="-1">	

		<main class="site-main" id="main">
		
			<!-- homepage hero -->
			<div class="homepage-hero d-flex align-items-center" style="background-image: url('<?= $image_URL ?>')">
				<div class="container py-5">
					<div class="row">
						<div class="text-light" style="max-width: <?= $content_width ?>px;">
							<div class="container">
								<h2 class="display-4 fw-bold"><?= $content ?></h2>
								<a class="btn btn-primary text-white mt-2 px-3 py-1" href="<?= $button_url ?>" target="<?= $button_target ?>" <?= $modal_attributes ?>><?= $button_title ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- video modal -->
			<div class="modal fade" id="videoModal"  tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="modal-body">
							<div class="ratio ratio-16x9">
							<iframe src="<?= $video_URL ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- display any ACF Templates -->
			<?php get_template_part( 'template-parts/acf', 'main' ); ?>
			
		</main><!-- #main -->
	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
