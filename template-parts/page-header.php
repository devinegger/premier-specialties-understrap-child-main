<?php

/**
 * Template Part for displaying Page Sub Header
 */

$page_id = get_the_ID();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );
?>

<div class="page-header-wrap">
	<div class="page-header d-flex align-items-center" style="background-image:url('<?php echo $image[0]; ?>');">
		<div class="container clip-path pt-5">
			<div class="row">	
				<div class="col">
					<header class="entry-header">
						<h1 class="entry-title display-4 fw-bold text-light text-center"><?php single_post_title(); ?> </h1>
					</header>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="circle-icon d-flex justify-content-center">
	<span class="d-flex justify-content-center align-items-center">
		<img src="/wp-content/uploads/2022/03/mock-icon.png" height="72" width="72"/>
	</span>
</div>