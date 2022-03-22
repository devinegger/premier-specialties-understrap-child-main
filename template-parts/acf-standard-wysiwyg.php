<?php

/**
 * Template Part for displaying Standard WYSIWYG Template
 */

$content = get_sub_field('content');
?>

<!-- wysiwyg -->
<div class="container">
	<div class="row">
		<div class="col-12 px-3 py-2">
			<?= $content ?>
		</div>
	</div>
</div>