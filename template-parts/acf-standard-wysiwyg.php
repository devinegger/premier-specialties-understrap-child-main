<?php

/**
 * Template Part for displaying Standard WYSIWYG Template
 */

$content = get_sub_field('content');
$background_color = get_sub_field('background_color');
?>

<!-- wysiwyg -->
<section id="standard-wysiwyg" style="background-color: <?= $background_color ?>;">
	<div class="container">
		<div class="row">
			<div class="py-4">
				<?= $content ?>
			</div>
		</div>
	</div>
</section>