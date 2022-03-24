<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$first_button = get_field('first_button', 'options');
$first_button_title = $first_button['title'];
$first_button_url = $first_button['url'];
$first_button_target = $first_button['target'];

$second_button = get_field('second_button', 'options');
$second_button_title = $second_button['title'];
$second_button_url = $second_button['url'];
$second_button_target = $second_button['target'];
?>


<div class="wrapper" id="wrapper-footer">

	<footer class="site-footer container py-5 text-white" id="colophon">
		<div class="row">
			<div class="col-md-3">
				<span class="footer-logo d-block mb-2">
					<?= get_custom_logo() ?>
				</span>
				<div class="company-info ps-3">
					<?php the_field('left_column_content', 'options'); ?>
				</div>
			</div>
			<div class="col-md-7 footer-middle">
				<div class="row mt-2">
					<div class="col-md-3">
						<h5 class="fw-normal fs-6">FRAGRANCES</h5>
						<p>Stay up to date on all things OnScent</p>
						<!--[if lte IE 8]> 
						<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
						<![endif]-->
						<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
						<script>
						  hbspt.forms.create({
						region: "na1",
						portalId: "21646813",
						formId: "8d20a057-30fe-49df-9918-13f66646a660"
						});
						</script>
						<?php /*
						<form>
							<input class="p-1 text-center text-uppercase" placeholder="Email Address" />
							<button class="btn btn-primary text-white mt-2 px-3" type="submit">Subscribe</button>
						*/ ?>

					</div>
					<div class="col-md-2">
						<h5 class="fw-normal fs-6">NATURAL COSMETICS</h5>
					</div>
					<div class="col-md-2">
						<h5 class="fw-normal fs-6">COMPANY</h5>
						<a class="btn btn-primary text-white text-nowrap" href="<?= $first_button_url ?>" target="<?= $first_buton_target ?>"><?= $first_button_title ?></a>
					</div>
					<div class="col-md-2">
						<h5 class="fw-normal fs-6">RESOURCES</h5>
						<a class="btn btn-primary text-white text-nowrap" href="<?= $second_button_url ?>" target="<?= $second_buton_target ?>"><?= $second_button_title ?></a>
					</div>
					<div class="col-md-2">
						<h5 class="fw-normal fs-6">CONTACT</h5>
						
					</div>
				</div>
			</div>
			<div class="col">
				<div class="social-icon-column d-flex flex-column">
					<a class="text-white text-decoration-none" href="">
						<i class="fa fa-brands fa-linkedin"></i>
						<span class="social-text">LinkedIn</span>
					</a>
					<a class="text-white text-decoration-none" href="">
						<i class="fa fa-brands fa-youtube-play"></i>
						<span class="social-text">YouTube</span>
					</a>
					<a class="text-white text-decoration-none" href="">
						<i class="fa fa-brands fa-facebook-square"></i>
						<span class="social-text">Facebook</span>
					</a>
					<a class="text-white text-decoration-none" href="">
						<i class="fa fa-brands fa-twitter"></i>
						<span class="social-text">Twitter</span>
					</a>
					<a class="text-white text-decoration-none" href="">
						<i class="fa fa-brands fa-instagram"></i>
						<span class="social-text">Instagram</span>
					</a>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

