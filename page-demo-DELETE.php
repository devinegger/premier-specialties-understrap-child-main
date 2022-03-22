<?php
/**
 * The template for displaying demo page
 *
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$page_id = get_the_ID();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );
?>

<!-- Page Header -->
<?php get_template_part('template-parts/page', 'header'); ?>

<div class="wrapper p-0" id="page-wrapper">
	<div class="container-fluid p-0" id="content" tabindex="-1">

		<div class="row justify-content-center">
			<div class="col-10">
				<main class="site-main" id="main">

					<?php
					while ( have_posts() ) { the_post();
						get_template_part( 'loop-templates/content', 'page-internal' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

				</main><!-- #main -->
			</div><!-- .col -->
		</div><!-- .row -->

		<!-- display any ACF Templates -->
		<?php get_template_part( 'template-parts/acf', 'main' ); ?>

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();