<?php

/**
 * Template Part for displaying ACF Product Selection Lists
 */

$product_items = get_sub_field('product_list'); // array of Products
$background_color = get_sub_field('background_color');
?>

<section id="product-section-list"  style="background-color: <?= $background_color ?>;">
    <div class="container px-3 py-2">

        <?php 
        foreach($product_items as $product_item) : 

            $product_post = $product_item['product']; // this is the Product Post Object

            $product_ID = $product_post->ID;
            $product_name = $product_post->post_title;

            $product = wc_get_product($product_ID);

            //print_r($product);

            $product_image_ID = get_post_thumbnail_id( $product_ID ); 
            $product_image = wp_get_attachment_image( $product_image_ID, array(260,180), FALSE, array('class'=>'img-full') ); // not sure how to grab the product img url and alt from here... 

            // product custom meta
            $INCI_name = get_post_meta($product_ID, '_text_field', TRUE);
            $product_number = get_post_meta($product_ID, '_number_field', TRUE);
            $product_description = get_post_meta($product_ID, '_textarea', TRUE);

            //echo $product->get_type();

            
            if ($product->is_type( 'variable' )) {
                $available_variations = $product->get_available_variations();

                /*
                foreach ($available_variations as $variation) {
                    $pa_request_name = $variation['attributes']['attribute_pa_request'];
                    echo ucwords(str_replace('-', ' ', $pa_request_name));
                    //print_r($variation);
                }
                */
            }

            

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
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</section>