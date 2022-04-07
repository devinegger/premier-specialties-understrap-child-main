<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="single-wrapper">

	<!-- Page Header -->
	<?php get_template_part('template-parts/page', 'header'); ?>

	<div class="py-3" id="content" tabindex="-1">
		<main class="site-main" id="main">

			<div class="container">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );
					// understrap_post_nav();
					
					/*  disable comments for now
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					*/
				}
			?>
			</div>

		</main><!-- #main -->
	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
