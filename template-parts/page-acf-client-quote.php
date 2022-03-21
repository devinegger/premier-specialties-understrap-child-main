<?php

/**
 * Template Part for displaying Client Quote Template
 * 
 * 
 */

if (have_rows('section_templates')) : // if there are custom section templates on page
    while (have_rows('section_templates')) : the_row();
        if (get_row_layout() == 'client_quote_slider') : // and team members is one of those templates
            $client_quotes = get_sub_field('client_quotes');
			$count = 0;
			$active_class = "";
?>
<!-- client quotes slider -->
<div class="container">
	<div class="row">
		<div class="col-12">
			<div id="quoteCarousel" class="carousel carousel-dark slide py-2" data-bs-ride="carousel">
				<div class="carousel-inner text-center">
					<h3 class="display-5 fw-semi-bold">What our clients say</h3>

					<?php foreach($client_quotes as $client_quote) : ?>
						<?php $quote_body = $client_quote['quote_body']; ?>
						<?php $quote_attribution = $client_quote['quote_attribution']; ?>
						<?php $active_class = $count === 0 ? "active" : ""; ?>
					<div class="carousel-item text-center <?= $active_class ?>">
						<p class="quote-body fs-4 w-50 mx-auto mb-1">"<?= $quote_body ?>"</p>
						<p class="quote-author fw-bold"><?= $quote_attribution ?></p>
					</div>
					<?php $count++; ?>
					<?php endforeach; ?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#quoteCarousel" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#quoteCarousel" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</div>
</div>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>