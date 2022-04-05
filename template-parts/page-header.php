<?php

/**
 * Template Part for displaying Page Sub Header
 */

$page_id = get_the_ID();

if(is_search()) {
	$bg_image = '/wp-content/uploads/2022/03/OnScent_B_Heros-Rectangle-Strategic-Partners.png';
	$icon_image = '/wp-content/uploads/2022/03/leaves-of-a-plant.png';
} else {
	$bg_image = wp_get_attachment_image_url( get_post_thumbnail_id( $page_id ), 'full' );
	$icon_image = get_field('page_icon') ? get_field('page_icon') : "/wp-content/uploads/2022/03/leaves-of-a-plant.png";
}
?>

<div class="page-header-wrap">
	<div class="page-header d-flex align-items-center" style="background-image:url('<?php echo $bg_image; ?>');">
		<div class="container clip-path pt-2">
			<div class="row">	
				<div class="col">
					<header class="entry-header">
						<?php if (is_search()) : ?>
							<h1 class="page-title display-4 fw-bold text-light text-center">
							<?php 
							printf(
									/* translators: %s: query term */
									esc_html__( 'Search Results for: %s', 'understrap' ),
									'<span>' . get_search_query() . '</span>'
							);
							?>
							</h1>
						<?php else : ?>
							<h1 class="entry-title display-4 fw-bold text-light text-center"><?php single_post_title(); ?></h1>
						<?php endif; ?>
					</header>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="circle-icon d-flex justify-content-center">
	<span class="d-flex justify-content-center align-items-center">
		<img src="<?= $icon_image ?>" height="72" width="72"/>
	</span>
</div>