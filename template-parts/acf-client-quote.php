<?php

/**
 * Template Part for displaying Client Quote Template
 * 
 * 
 */

$background_color = get_sub_field('background_color');
$client_quotes = get_sub_field('client_quotes');
$count = 0;
$active_class = "";
?>
<!-- client quotes slider -->
<section class="client-quote" style="background-color: <?= $background_color ?>;">
	<div class="container">
		<div class="row py-4">
			<div class="col-12">
				<div id="quoteCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
					<div class="carousel-inner text-center">
						<h3 class="display-5 fw-semi-bold">What our clients say</h3>

						<?php foreach($client_quotes as $client_quote) : ?>
							<?php $quote_body = $client_quote['quote_body']; ?>
							<?php $quote_attribution = $client_quote['quote_attribution']; ?>
							<?php $active_class = $count === 0 ? "active" : ""; ?>
						<div class="carousel-item text-center <?= $active_class ?>">
							<p class="quote-body fs-4 w-50 mx-auto my-1">"<?= $quote_body ?>"</p>
							<p class="quote-author fw-bold"><?= $quote_attribution ?></p>
						</div>
						<?php $count++; ?>
						<?php endforeach; ?>
					</div>

					<?php if ($count > 1) : // only display arrows if there are more than 1 ?>
					<button class="carousel-control-prev" type="button" data-bs-target="#quoteCarousel" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#quoteCarousel" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>