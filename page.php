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

$page_id = get_the_ID();
//$page = get_page_by_id($page_id); 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );


?>

<!-- Page Header -->
<?php get_template_part('template-parts/page', 'header'); ?>

<div class="wrapper" id="page-wrapper">
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

		<!-- display any ACF Templates -->
		<?php get_template_part( 'template-parts/acf', 'main' ); ?>

		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #page-wrapper -->

<?php
get_footer();
