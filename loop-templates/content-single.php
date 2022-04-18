<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		
		<div class="col-lg-8">
			<div class="entry-content">
			<span class="image-wrap">
				<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
			</span>
			<h1 class="entry-title display-6 fw-bold mb-1"><?php single_post_title(); ?></h1>
			<p><?= "Posted on "?> 
			<?= the_date(); ?></p>
			<?php
				the_content();
				understrap_link_pages();
			?>

			</div><!-- .entry-content -->
		</div>
		<div class="col-lg-4">
			
			<?php dynamic_sidebar( 'right-sidebar' ); ?>
		</div>
	</div>
	

	

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
