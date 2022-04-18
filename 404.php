<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="error-404-wrapper" style="background-color: #ffffff;">

<!-- Page Header -->
<?php get_template_part('template-parts/page', 'header'); ?>

	<div class="container py-2" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area py-4" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">

						<div class="page-content">

							<a href="/"><img class="" src="/wp-content/uploads/2022/04/ON_404_Image_1302x444px_v3.png" alt="Page not found, click to go to home page." /></a>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php
get_footer();
