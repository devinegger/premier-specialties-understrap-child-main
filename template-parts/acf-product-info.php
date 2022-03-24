<?php

/**
 * Template Part for displaying ACF Product Info
 */


$info_groups = get_sub_field('info_group');
$num_groups = count($info_groups);
$count = 0;

$image_group = array();
$title_group = array();
$content_group = array();

foreach($info_groups as $info_group)  {
    // because of the way this template is set up, we have to run through the 
    // info groups array and put the individual pieces into their own array, 
    // so that we can loop through them at different parts in the template

    $image_group[] = $info_group['image'];
    $title_group[] = $info_group['title'];
    $content_group[] = array('content' => $info_group['content'], 'more_link' => $info_group['more_link']);
}
?>

<div class="container px-3 product-info">
    <div class="row img-left-tile bg-light mb-2">
        <div class="col-md-3 px-0">
            <?php 
                foreach($image_group as $single_image) { 
                     
                    $image_ID = $single_image['ID']; 
                    $image_URL = $single_image['url']; 
                    $image_alt = $single_image['alt']; 
                    $image_class = 'image-' . $count;

                    if ($count !==0 ) {
                        $image_class .= " d-none";
                    }
                    
                    $image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> $image_class, 'alt'=>$image_alt) );
                    echo $image;
                    $count ++;
                } 

                $count = 0;
            ?>
        </div>
        <div class="col-md-9 p-2">
            <div class="d-flex">
                <ul class="nav text-secondary align-items-center">

                    <?php  foreach($title_group as $single_title) : ?>
                        <?php $count === 0 ? $title_class = "active" : $title_class = "" ; ?>

                    <li class="nav-item tile-sub-section">
                        <a class="product-info-tab nav-link <?= $title_class ?>" data-link="<?= $count ?>" href="#"><?= $single_title ?></a>
                    </li>

                        <?php $count++; ?>
                    <?php endforeach; ?>
                    <?php $count = 0; ?>
                </ul>
            </div>

            <?php foreach($content_group as $single_content) : ?>
                <?php $content_class = 'content-' . $count; ?>
                <?php $count !==0 ? $content_class .= " d-none" : $content_class .= ""; ?>

            <p class="text-black <?= $content_class ?>"><?= $single_content['content'] ?>
                <a class="more-link text-decoration-none fw-light" href="<?= $single_content['more_link']['url'] ?>"> More ></a>
            </p>
                <?php $count++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>