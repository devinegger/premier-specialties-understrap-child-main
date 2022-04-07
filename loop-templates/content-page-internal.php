<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="post-content">
	<div class="entry-content container py-2">
		<div class="row">
			<div class="col">
				<?php
					the_content();
					understrap_link_pages();
				?>
			</div>
		</div>

	</div><!-- .entry-content -->
</section><!-- .post-content -->
