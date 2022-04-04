<?php
/**
 * Template Name: Page with Sub Navigation
 * 
 * The template for displaying Resources pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

// get page background color
$page_background = get_field('page_background');

?>

<div class="wrapper" id="page-wrapper" style="background-color: <?= $page_background ?>;">

<!-- Page Header -->
<?php get_template_part('template-parts/page', 'header'); ?>


	<div id="content" tabindex="-1">
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
		<?php get_template_part( 'template-parts/sub', 'navigation'); ?>

		<!-- display any ACF Templates -->
		<?php get_template_part( 'template-parts/acf', 'main' ); ?>
		
	
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #page-wrapper -->

<?php
get_footer();
