<?php
/**
 * Search results partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$post_type = get_post_type();


if($post_type==="product") : 

	$product_ID = get_the_ID();
	$product_name = get_the_title();

	$product = wc_get_product($product_ID);
	
	$product_image_ID = get_post_thumbnail_id( $product_ID ); 
	$product_image = wp_get_attachment_image( $product_image_ID, array(260,180), FALSE, array('class'=>'img-full') );

	// product custom meta
	$INCI_name = get_post_meta($product_ID, '_text_field', TRUE);
	$product_number = get_post_meta($product_ID, '_number_field', TRUE);
	$product_description = get_post_meta($product_ID, '_textarea', TRUE);

?>

<div class="row bg-light mb-2 p-3 product-tile">
	<div class="col">
		<div class="row">
			<div class="col-md-3">
				<?= $product_image ?>
			</div>
			<div class="col-md-9 p-2">
				<h3 class="fw-bold mb-0"><?= $product_name ?></h3>
				<span class="product-sub-titles text-gray">INCI Name: <?= $INCI_name ?></span>
				<p class="text-black"><?= $product_description ?></p>
				<span class="text-black">#<?= $product_number ?></span>
			</div>
		</div>

		<?php if ($product->is_type( 'variable' )) : // product is variable ?>
			<?php $available_variations = $product->get_available_variations(); ?>

			<? foreach($available_variations as $variation) :?>
				<? //print_r($variation); ?>
				<?php $pa_request_name = $variation['attributes']['attribute_pa_request']; ?>
				<?php $variation_ID = $variation['variation_id']; ?>
				<?php // create the add to cart url ?>
				<?php $base_url = get_home_url() . '/cart/?add-to-cart=' . $product_ID; ?>
				<?php $variation_url = '&variation_id=' . $variation_ID . '&attribute_pa_request=' . $pa_request_name; ?>
				<?php $quantity_url = '&quantity=1'; ?>
				<?php $add_to_cart_url =  $base_url . $variation_url . $quantity_url; ?>
			<div class="row py-1">
				<div class="col">
					<div class="text-end">
						<label class="text-gray"><?= ucwords(str_replace('-', ' ', $pa_request_name)); ?></label>
						<input class="mx-2 text-center quantity-input" placeholder="1" value="1" type="number" size="2"/>
						<a class="add-to-cart btn btn-secondary rounded-0" href="<?= $add_to_cart_url ?>">Add to Cart</a>
					</div>
				</div>
			</div>
			<? endforeach ; ?>
		<?php else : // simple prouduct ?>
			<?php $base_url = get_home_url() . '/cart/?add-to-cart=' . $product_ID; ?>
			<?php $quantity_url = '&quantity=1'; ?>
			<?php $add_to_cart_url =  $base_url . $variation_url . $quantity_url; ?>
			<div class="row py-1">
				<div class="col">
					<div class="form-group text-end">
						<label class="text-gray">Request Standard Sample</label>
						<input class="mx-2 text-center quantity-input" placeholder="1" value="1" type="number" size="2"/>
						<a class="add-to-cart btn btn-secondary rounded-0" href="<?= $add_to_cart_url ?>">Add to Cart</a>
					</div>
				</div>
			</div>
		<?php endif; // end if variable ?>
	</div>
</div>

<?php else : ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				
				<?php understrap_posted_on(); ?>

			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-summary">

		<?php the_excerpt(); ?>

	</div><!-- .entry-summary -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<?php endif; ?>
