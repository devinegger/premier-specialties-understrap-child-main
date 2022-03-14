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

$container = get_theme_mod( 'understrap_container_type' );

$page_id = get_the_ID();
//$page = get_page_by_id($page_id); 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );


?>
<div class="page-header-wrap">
	<div class="page-header d-flex align-items-center" style="background-image:url('<?php echo $image[0]; ?>');">
		<div class="container clip-path pt-5">
			<div class="row">	
				<div class="col">
					<header class="entry-header">
						<h1 class="entry-title display-4 fw-bold text-light text-center"><?php single_post_title(); ?> </h1>
					</header>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="circle-icon d-flex justify-content-center">
	<span class="d-flex justify-content-center align-items-center">
		<img src="/wp-content/uploads/2022/03/mock-icon.png" height="72" width="72"/>
	</span>
</div>
<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row justify-content-center">
			<div class="col-10">
				<main class="site-main" id="main">

					<!-- Sub Navigation -->
					<?php get_template_part('template-parts/page', 'sub-nav'); ?>
					
					<!-- Full Tile Template -->
					<?php //get_template_part('template-parts/page', 'tile-full'); ?>
					
					<!-- Full Tile Template -->
					<?php // get_template_part('template-parts/page', 'tile-half'); ?>

					<div class="container px-0">
						<div class="row bg-light mb-2 p-2 product-tile">
							<div class="col">
								<div class="row">
									<div class="col-md-3 px-0">
										<img src="/wp-content/uploads/2022/03/demo-for-temps.jpg" />
									</div>
									<div class="col-md-9 p-2">
										<h3 class="fw-bold mb-0">Toiletries</h3>
										<span class="product-sub-titles text-gray">INCI Name: Orbignya Oleifera Seed Oil and Tocopherol</span>
										<p class="text-black">Vitae congue eu consequat ac felis donec et odio pellentesque. Orci sagittis eu volutpat odio facilisis mauris sit. Sed elementum tempus egestas sed sed risus pretium. Vehicula ipsum a arcu cursus vitae. Tempus urna et pharetra pharetra massa massa. Diam quam nulla porttitor massa id neque aliquam. </p>
									</div>
								</div>
								<div class="row">
									<div class="col text-end">
										<form>
											<label class="text-gray">Request Standard Sample</label>
											<input class="mx-2 text-center" size="2"/>
											<button class="btn btn-secondary rounded-0" type="submit">Add to Cart</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

				
				
							
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

				</main><!-- #main -->
			</div><!-- .col -->
		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
