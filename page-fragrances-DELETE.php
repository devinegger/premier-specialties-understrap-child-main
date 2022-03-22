<?php

//  !!! this template is not being used, and has been moved to resources-parent.php in /page-templates !!!

/**
 * 
 * The template for displaying Resources pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- Page Header -->
<?php get_template_part('template-parts/page', 'header'); ?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row justify-content-center">
			<div class="col-10">
				<main class="site-main" id="main">

					<?php
						while ( have_posts() ) {
							the_post();
							get_template_part( 'loop-templates/content', 'page-internal' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						}
					?>

					<!-- Sub Navigation -->
					<?php get_template_part('template-parts/page', 'sub-nav'); ?>
					
					<!-- Full Tile Template -->
					<?php get_template_part('template-parts/page', 'tile-full'); ?>

				</main><!-- #main -->
			</div><!-- .col -->
		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
