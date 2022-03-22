<?php

/**
 * Template Part for displaying ACF Blog Highlights
 */

$blog_highlights = get_sub_field('blog_posts'); // array of Blog highlights

?>

<div class="container px-3 py-2">
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-2">

<?php 
   
foreach ($blog_highlights as $blog_highlight) : 

    $image_arr = $blog_highlight['image'];
    $image_ID = $image_arr['ID']; 
    $image_URL = $image_arr['url']; 
    $image_alt = $image_arr['alt']; 
    $image = wp_get_attachment_image( $image_ID, 'full', FALSE, array('src'=>$image_URL, 'class'=> 'card-img-top p-2', 'alt'=>$image_alt) );

    $title = $blog_highlight['title'];
    $author = $blog_highlight['author'];
    $date = $blog_highlight['date'];

    $excerpt = $blog_highlight['excerpt'];
    $more_link = $blog_highlight['url']; // actually a URL ACF type
   
?>
        <div class="col">
            <div class="card blog-card text-center border-0">
                <?= $image ?>
                <div class="card-body p-2">
                    <h3 class="card-title mb-0 fw-bold fs-5"><?= $title ?></h3>
                    <span class="card-subtitle text-dark text-uppercase">BY <?= $author ?> | <?= $date ?></span>
                    <p class="card-text mt-2 text-dark fw-light lh-2 fs-6"><?= $excerpt ?></p>
                    <span class="more-link text-uppercase"><a href="<?= $more_link ?>" target="_blank" class="text-secondary text-decoration-none">More ></a></span>
                </div>
            </div>
        </div>

<?php  endforeach; ?>

    </div>
</div>
