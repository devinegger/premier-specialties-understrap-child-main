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
$excerpt = get_the_excerpt( );
$more_link = get_post_permalink($blog_post); 
$category = get_the_category();
?>

<?php if($category[0]->name !== "News") : ?>
<div class="col">
	<div class="card blog-card text-center border-0 h-100">
		<span class="card-image-top p-2">
			<?= $blog_image ?>
		</span>
		<div class="card-body p-2">
			<h3 class="card-title mb-0"><a class="text-secondary text-decoration-none fw-bold fs-5" href="<?= $more_link ?>"><?= $title ?></a></h3>
			<span class="card-subtitle text-dark text-uppercase">BY <?= $author ?> | <?= $date ?></span>
			<p class="card-text mt-2 text-dark fw-light lh-2 fs-6"><?= $excerpt ?></p>
			<span class="more-link text-uppercase"><a href="<?= $more_link ?>" class="text-secondary text-decoration-none">More ></a></span>
		</div>
	</div>
</div>
<?php endif; ?>