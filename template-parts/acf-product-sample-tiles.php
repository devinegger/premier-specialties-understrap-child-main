<?php

/**
 * Template Part for displaying ACF Product Sample Tags
 */

$sample_tiles = get_sub_field('sample_tiles'); // array of Product Sample Tiles

?>

<div class="container px-3 py-2">
    <div class="row py-1">

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
        <div class="col-md-6">
            <div class="row img-left-tile bg-light m-1">
                <div class="col-5 px-0">
                    <?= $image ?>
                </div>
                <div class="col-7 p-2">
                    <div class="d-flex flex-column text-end py-3">
                        <h3 class="fw-bold mb-0"><?= $title ?></h3>
                        <a class="fst-italic text-secondary text-decoration-none" href="<?= $link_url ?>">Order Samples</a>
                    </div>
                </div>
            </div>
        </div>

        <!--
        <div class="col-md-6">
            <div class="row img-left-tile bg-light m-1">
                <div class="col-5 px-0">
                    <img src="/wp-content/uploads/2022/03/flowers-2.jpg" />
                </div>
                <div class="col-7 p-2">
                    <div class="d-flex flex-column text-end py-3">
                        <h3 class="fw-bold mb-0">Floral Waxes</h3>
                        <p class="fst-italic">Order Samples</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-1">
        <div class="col-md-6">
            <div class="row img-left-tile bg-light m-1">
                <div class="col-5 px-0">
                    <img src="/wp-content/uploads/2022/03/flowers-3.jpg" />
                </div>
                <div class="col-7 p-2">
                    <div class="d-flex flex-column text-end py-3">
                        <h3 class="fw-bold mb-0">Butters</h3>
                        <p class="fst-italic">Order Samples</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row img-left-tile bg-light m-1">
                <div class="col-5 px-0">
                    <img src="/wp-content/uploads/2022/03/flowers-4.jpg" />
                </div>
                <div class="col-7 p-2">
                    <div class="d-flex flex-column text-end py-3">
                        <h3 class="fw-bold mb-0">Exotic Plant Oils</h3>
                        <p class="fst-italic">Order Samples</p>
                    </div>
                </div>
            </div>
        </div>
        -->
<?php endforeach; ?>
    </div>
</div>