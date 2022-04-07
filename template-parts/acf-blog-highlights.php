<?php

/**
 * Template Part for displaying ACF Blog Highlights
 */

$blog_selections = get_sub_field('blog_selections'); // array of Blog Posts
$background_color = get_sub_field('background_color');

?>

<section class="blog-highlights" style="background-color: <?= $background_color ?>;">
    <div class="container px-3 py-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">

    <?php 
    
    /*  OLD FOREACH - MAY NEED - DELTE BEFORE LAUNCH

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
        $more_link = $blog_highlight['link']; 
        if($more_link) {
            $more_link_title = $more_link['title']; // not using for now...
            $more_link_url = $more_link['url'];
            $more_link_target = $more_link['target'];
        }
    */

    foreach ($blog_selections as $blog_selection) : 

        $blog_post = $blog_selection['post'];
    
        $blog_image = get_the_post_thumbnail( $blog_post->ID, 'full');
    
        $title = $blog_post->post_title;
        $author_ID = $blog_post->post_author;
        $author = get_the_author_meta( 'display_name', $author_ID);
        $date = strtotime($blog_post->post_date);
        $date_formatted = date("F j Y",$date);
    
        $excerpt = substr($blog_post->post_content,0,200);
        // might sub this out for using actual excerpt
        $more_link = get_post_permalink($blog_post); 
        
    ?>
            <div class="col">
                <div class="card blog-card text-center border-0">
                    <span class="card-image-top p-2">
                        <?= $blog_image ?>
                    </span>
                    <div class="card-body p-2">
                        <h3 class="card-title mb-0 fw-bold fs-5"><?= $title ?></h3>
                        <span class="card-subtitle text-dark text-uppercase">BY <?= $author ?> | <?= $date_formatted ?></span>
                        <p class="card-text mt-2 text-dark fw-light lh-2 fs-6"><?= strip_tags($excerpt) ?></p>
                        <span class="more-link text-uppercase"><a href="<?= $more_link ?>" class="text-secondary text-decoration-none">More ></a></span>
                    </div>
                </div>
            </div>
    
    <?php  endforeach; ?>
    
        </div><!-- .row -->

        <div class="row mt-2">
            <div class="col text-center">
                <a class="text-secondary text-decoration-none" href="/blog/" >See All</a>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</section>
