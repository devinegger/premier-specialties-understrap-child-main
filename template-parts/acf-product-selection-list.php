<?php

/**
 * Template Part for displaying ACF Product Selection Lists
 */

$product_items = get_sub_field('product_list'); // array of Products

?>

<section id="product-section-list">
    <div class="container px-3">

        <?php 
        foreach($product_items as $product_item) : 

            $product = $product_item['product']; // this is the Product Post Object

            $product_ID = $product->ID;
            $product_name = $product->post_title;
            $product_content = $product->post_content;

            $product_image_ID = get_post_thumbnail_id( $product_ID ); 
            $product_image = wp_get_attachment_image( $product_image_ID, array(260,180), FALSE, array('class'=>'img-full') ); // not sure how to grab the product url and alt from here... 

            //echo $product_image;
            
            // use these if there are custom fields for the product
            // $job_title = get_post_meta($team_member->ID, 'job_title', TRUE);
            // $job_description = get_post_meta( $team_member->ID, 'job_description', TRUE );

            // print_r($product);

        ?>
        <div class="row bg-light mb-2 p-3 product-tile">
            <div class="col">
                <div class="row">
                    <div class="col-md-3">
                        <?= $product_image ?>
                    </div>
                    <div class="col-md-9 p-2">
                        <h3 class="fw-bold mb-0"><?= $product_name ?></h3>
                        <span class="product-sub-titles text-gray">INCI Name: Orbignya Oleifera Seed Oil and Tocopherol</span>
                        <p class="text-black"><?= $product_content ?></p>
                        <span class="text-black">#125845</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form class="text-end">
                            <label class="text-gray">Request Standard Sample</label>
                            <input class="mx-2 text-center" placeholder="1" size="2"/>
                            <button class="btn btn-secondary rounded-0" type="submit">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</section>