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

$container = get_theme_mod( 'understrap_container_type' );

?>
<div class="homepage-hero d-flex align-items-center">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-6 text-light">
				<div class="container">
					<h2 class="display-4 fw-bold">Discover Your Authentic Fragrance Advantage</h2>
					<a class="btn btn-primary text-white mt-2 px-3 py-1">Watch Video</a>
				</div>
			</div>
				
			<div class="col-md-6"></div>
		</div>
	</div>
</div>

<?php
get_footer();
