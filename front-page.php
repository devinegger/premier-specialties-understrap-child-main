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
		</div>
	</div>
</div>

<div class="container">
	<div class="row py-3">
		<div class="col-md-6 text-center py-4">
			<p class="display-5 fw-semi-bold">
				Connect with an OnScent fragrance expert
			</p>
			<a class="btn btn-primary text-white px-3">Contact Us</a>
		</div>
		<div class="col-md-6 justify-content-">
			<img class="d-block mx-auto" style="max-width: 400px;" src="/wp-content/uploads/2022/03/demo-for-temps-3.jpg" alt="">
		</div>
	</div>
</div>

<?php
get_footer();
