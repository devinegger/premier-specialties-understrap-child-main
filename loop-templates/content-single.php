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
		<div class="col-md-4  order-md-2">
			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
			<div class="entry-meta text-center">

				<?= "Posted by "?> 
				<?= get_the_author(); ?>
				<?= " on " ?> 
				<?= get_the_date(); ?>

			</div><!-- .entry-meta -->
		</div>
		<div class="col-md-8">
			<div class="entry-content">

			<?php
				the_content();
				understrap_link_pages();
			?>

			</div><!-- .entry-content -->
		</div>
	</div>
	

	

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
