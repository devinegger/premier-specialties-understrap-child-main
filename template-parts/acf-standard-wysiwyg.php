<?php

/**
 * Template Part for displaying Standard WYSIWYG Template
 */

$content = get_sub_field('content');
$background_color = get_sub_field('background_color');
?>

<!-- wysiwyg -->
<div class="content-wrap" style="background-color: <?= $background_color ?>;">
	<div class="container">
		<div class="row">
			<div class="col-12 px-3 py-2">
				<?= $content ?>
			</div>
		</div>
	</div>
</div>