<?php

/**
 * Template Part for displaying ACF Product Sample Tags
 */

$sample_tiles = get_sub_field('sample_tiles'); // array of Product Sample Tiles
$background_color = get_sub_field('background_color');
?>

<section class="product-sample-tiles" style="background-color: <?= $background_color ?>;">
    <div class="container px-3 py-4">
        <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-around">

    <?php 
        foreach($sample_tiles as $sample_tile) : 

            $image_arr = $sample_tile['image'];
            $image_ID = $image_arr['ID']; 
            $image_URL = $image_arr['url']; 
            $image_alt = $image_arr['alt']; 
            $image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> '', 'alt'=>$image_alt) );

            $title = $sample_tile['title'];
            $link = $sample_tile['link'];
            $link_url = $link['url'];
    ?>
            <div class="col">
                <div class="row img-left-tile bg-light align-items-center">
                    <div class="col-5 px-0">
                        <?= $image ?>
                    </div>
                    <div class="col-7 pe-3 text-end">
                        <h3 class="fw-bold mb-0 display-6"><?= $title ?></h3>
                        <a class="fst-italic text-secondary text-decoration-none" href="<?= $link_url ?>">Order Samples</a>
                    </div>
                </div>
            </div>

    <?php endforeach; ?>
        </div><!-- .row -->
    </div><!-- .container -->
</section>