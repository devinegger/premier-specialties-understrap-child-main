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

?>

<div class="wrapper" id="page-wrapper">

	<div id="content" tabindex="-1">	

		<main class="site-main" id="main">
		
			<!-- homepage hero -->
			<div class="homepage-hero d-flex align-items-center">
				<div class="container py-5">
					<div class="row">
						<div class="col-md-6 text-light">
							<div class="container">
								<h2 class="display-4 fw-bold">Discover Your Authentic Fragrance Advantage</h2>
								<a class="btn btn-primary text-white mt-2 px-3 py-1" data-bs-toggle="modal" data-bs-target="#videoModal">Watch Video</a>
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
							<iframe src="https://www.youtube.com/embed/Dx5qFachd3A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- 1x2 template -->
			<div class="container">
				<div class="row py-2">
					<div class="col-12 px-2">
						<h2 class="display-4 text-center fw-semi-bold">Create better experiences brand experiences through fragrance differentiation</h2>
					</div>
				</div>
				<div class="row pb-3">
					<div class="col-md-6">
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 1</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 2</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 2x2 template -->
			<div class="container">
				<div class="row py-2">
					<div class="col-12 px-2">
						<h2 class="display-4 text-center fw-semi-bold">Create better experiences brand experiences through fragrance differentiation</h2>
					</div>
				</div>
				<div class="row pb-3">
					<div class="col-md-6">
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 1</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 2</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 3</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 4</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 2x3 template -->
			<div class="container">
				<div class="row py-2">
					<div class="col-12 px-2">
						<h2 class="display-4 text-center fw-semi-bold">Create better experiences brand experiences through fragrance differentiation</h2>
					</div>
				</div>
				<div class="row pb-3">
					<div class="col-md-4">
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 1</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 2</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 3</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 4</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 5</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
						<div class="subhead d-flex flex-row pb-3">
							<img src="wp-content/uploads/2022/03/flowers-2.jpg" alt="" height="100" width="100" />
							<div class="ps-2">
								<h3 class="mb-1">Subhead 6</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- client quotes slider -->
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div id="quoteCarousel" class="carousel carousel-dark slide py-2" data-bs-ride="carousel">
							<div class="carousel-inner text-center">
								<h3 class="display-5 fw-semi-bold">What our clients say</h3>
								<div class="carousel-item text-center active">
									<p class="quote-body fs-4 w-50 mx-auto mb-1">"The OnScent team always comes up with solutions that are on-brief, on-brand, and on-target"</p>
									<p class="quote-author fw-bold">Product Manager, Consumer Packaged Goods</p>
								</div>
								<div class="carousel-item text-center">
									<p class="quote-body fs-4 w-50 mx-auto mb-1">"The OnScent team always comes up with solutions that are on-brief, on-brand, and on-target"</p>
									<p class="quote-author fw-bold">Product Manager, Consumer Packaged Goods</p>
								</div>
								<div class="carousel-item text-center">
									<p class="quote-body fs-4 w-50 mx-auto mb-1">"The OnScent team always comes up with solutions that are on-brief, on-brand, and on-target"</p>
									<p class="quote-author fw-bold">Product Manager, Consumer Packaged Goods</p>
								</div>
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#quoteCarousel" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#quoteCarousel" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Headline Left Image Right -->
			<?php 
				$align_items = "";
				$align_bottom = TRUE; // set to FALSE for middle alignment
				$align_bottom ? $align_items = "end" : $align_items = "center";
			?>

			<div class="container">
				<div class="row py-3">
					<div class="col-md-6 py-4">
						<h3 class="display-5 fw-semi-bold">This is a two-line headline template for short highlights</h3>
						<p class="text-dark-gray mb-3">Leo urna molestie at elementum eu facilisis sed. Mattis pellentesque id nibh tortor id aliquet lectus proin nibh. Luctus accumsan tortor posuere ac. Blandit aliquam etiam erat velit. Dui ut ornare lectus sit amet est. Orci sagittis eu volutpat odio facilisis mauris sit.</p>
						<a class="btn btn-primary text-white px-3">Contact Us</a>
					</div>
					<div class="d-flex col-md-6 align-items-<?= $align_items ?>">
						<img class="d-block mx-auto" style="max-width: 400px;" src="/wp-content/uploads/2022/03/demo-for-temps-2.jpg" alt="">
					</div>
				</div>
			</div>

			<!-- Headline Right Image Left -->
			<div class="container">
				<div class="row py-3">
					<div class="d-flex col-md-6 align-items-center">
						<img class="d-block mx-auto" style="max-width: 400px;" src="/wp-content/uploads/2022/03/demo-for-temps-2.jpg" alt="">
					</div>
					<div class="col-md-6 py-4 text-end">
						<h3 class="display-5 fw-semi-bold">This is a two-line headline template for short highlights</h3>
						<p class="text-dark-gray mb-3">Leo urna molestie at elementum eu facilisis sed. Mattis pellentesque id nibh tortor id aliquet lectus proin nibh. Luctus accumsan tortor posuere ac. Blandit aliquam etiam erat velit. Dui ut ornare lectus sit amet est. Orci sagittis eu volutpat odio facilisis mauris sit. </p>
						<a class="btn btn-primary text-white px-3">Contact Us</a>
					</div>
				</div>
			</div>

			<!-- CTA template -->
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
			
		</main><!-- #main -->
	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
