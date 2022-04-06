<?php
/**
 * The template for displaying the Contact Page
 * 
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<!-- Page Header -->
<?php get_template_part('template-parts/page', 'header'); ?>

<div class="wrapper" id="page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<div class="container">
				<div class="row justify-content-center py-3">
					<div class="col-md-5" style="z-index: 999;">
						<div class="contact-form align-items-center mx-2">
							<p>Please fill out each of the sections below.</p>
							<p><small><em>* Required</em></small></p>
							<?php /* uses hubspot */ ?>
							<!--[if lte IE 8]>
							<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
							<![endif]-->
							<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
							<script>
							hbspt.forms.create({
								region: "na1",
								portalId: "21646813",
								formId: "14046c50-ff94-4dc4-8e2a-d7813a7f4b4f"
							});
							</script>
							
						</div>
					</div>
					<div class="col-md-7">			
									
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

							<?php 
							if (have_rows('section_templates')) : // if there are custom section templates on the page

								while (have_rows('section_templates')) : the_row();

									// standard wysiwyg template
									if (get_row_layout() == 'standard_wysiwyg') : 
										get_template_part('template-parts/acf', 'standard-wysiwyg'); 
									endif;

								endwhile;
							
							endif;
							?>

					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #page-wrapper -->

<?php
get_footer();
