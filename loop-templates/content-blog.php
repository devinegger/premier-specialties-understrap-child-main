<?php
/**
 * Search results partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
    
$blog_image = get_the_post_thumbnail( get_the_ID(), 'full');

$title = get_the_title();
$author = get_the_author();
$date = get_the_date();
//$date_formatted = date("F j Y",$date);

$excerpt = substr(get_the_content(),0,200);
// might sub this out for using actual excerpt
$more_link = get_post_permalink($blog_post); 

?>

<div class="col">
	<div class="card blog-card text-center border-0 h-100">
		<span class="card-image-top p-2">
			<?= $blog_image ?>
		</span>
		<div class="card-body p-2">
			<h3 class="card-title mb-0 fw-bold fs-5"><?= $title ?></h3>
			<span class="card-subtitle text-dark text-uppercase">BY <?= $author ?> | <?= $date ?></span>
			<p class="card-text mt-2 text-dark fw-light lh-2 fs-6"><?= strip_tags($excerpt) ?></p>
			<span class="more-link text-uppercase"><a href="<?= $more_link ?>" class="text-secondary text-decoration-none">More ></a></span>
		</div>
	</div>
</div>
