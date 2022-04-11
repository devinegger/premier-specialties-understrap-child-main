<?php

/**
 * Template Part for displaying ACF Product Information Groups
 */

$background_color = get_sub_field('background_color');

$info_groups = get_sub_field('info_group');
$page_group_number = $args['group_count'];
$section_count = 0;

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


<section class="product-info group-<?= $page_group_number ?>" data-group="<?=$page_group_number?>" style="background-color: <?= $background_color ?>;">
    <div class="container px-3 py-2">
        <div class="row img-left-tile bg-light">
            <div class="col-md-4 col-lg-3 p-0">
                <?php 
                    foreach($image_group as $single_image) { 
                        
                        $image_ID = $single_image['ID']; 
                        $image_URL = $single_image['url']; 
                        $image_alt = $single_image['alt']; 
                        $image_class = 'image-' . $section_count;

                        if ($section_count !==0 ) {
                            $image_class .= " d-none";
                        }
                        
                        $image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> $image_class, 'alt'=>$image_alt) );
                        echo $image;
                        $section_count ++;
                    } 

                    $section_count = 0;
                ?>
            </div>
            <div class="col-md-8 col-lg-9 p-2">
                <div class="d-flex">
                    <ul class="nav text-secondary align-items-center">

                        <?php  foreach($title_group as $single_title) : ?>
                            <?php $section_count === 0 ? $title_class = "active" : $title_class = "" ; ?>

                        <li class="nav-item tile-sub-section">
                            <a class="product-info-tab nav-link <?= $title_class ?>" data-link="<?= $section_count ?>" href="#"><?= $single_title ?></a>
                        </li>

                            <?php $section_count++; ?>
                        <?php endforeach; ?>
                        <?php $section_count = 0; ?>
                    </ul>
                </div>

                <?php foreach($content_group as $single_content) : ?>
                    <?php $content_class = 'content-' . $section_count; ?>
                    <?php $section_count !==0 ? $content_class .= " d-none" : $content_class .= ""; ?>

                <p class="text-black <?= $content_class ?>"><?= $single_content['content'] ?>
                    <?php if ($single_content['more_link']) : ?>
                        <a class="more-link text-decoration-none fw-light" href="<?= $single_content['more_link']['url'] ?>"> More ></a>
                    <?php endif;?>
                </p>
                    <?php $section_count++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>