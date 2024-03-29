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

		<!-- display any ACF Templates -->
		<?php get_template_part( 'template-parts/acf', 'main' ); ?>

		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #page-wrapper -->

<?php
get_footer();
