<?php
/**
 * The blog template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="page-wrapper">

	<!-- Page Header -->
	<?php get_template_part('template-parts/page', 'header'); ?>

	<div class="py-3" id="content" tabindex="-1">
		<main class="site-main" id="main">

			<!-- Sub Navigation -->
			<?php get_template_part( 'template-parts/sub', 'navigation'); ?>

			<div class="container">

				<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 py-2">

						<?php
						if ( have_posts() ) {
							// Start the Loop.
							while ( have_posts() ) {
								the_post();
								get_template_part( 'loop-templates/content', 'blog' );
							}
						} else {
							get_template_part( 'loop-templates/content', 'none' );
						}
						?>

					<!-- The pagination component -->
					<?php understrap_pagination(); ?>
				
				</div><!-- .row -->
			</div>
		</main>

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
