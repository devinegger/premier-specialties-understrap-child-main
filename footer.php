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

?>


<div class="wrapper" id="wrapper-footer">

	<footer class="site-footer container py-5 text-white" id="colophon">
		<div class="row">
			<div class="col-md-3">
				<span class="footer-logo d-block mb-2">
					<?= get_custom_logo() ?>
				</span>
				<div class="company-info ps-3">
					<strong>OnScent Solutions, Inc.</strong><br/>
					201 Egal Avenue<br/>
					Middlesex, NJ 08846<br/>
					&copy; <?= date('Y') ?> ALL RIGHTS RESERVED<br/>
					<a href="#">Privacy Policy</a><br/>
					<a href="#">Privacy Sheld Policy</a><br/>
					<a href="#">California Privacy Act</a><br/>
					<a href="#">Terms of Use</a>

				</div>
			</div>
			<div class="col-md-7 footer-middle">
				<div class="row mt-2">
					<div class="col-md-3">
						<h5 class="fw-normal fs-6">FRAGRANCES</h5>
						<p>Stay up to date on all things OnScent</p>
						<form>
							<input class="p-2 text-center text-uppercase" placeholder="Email Address" />
							<button class="btn btn-primary text-white mt-2 px-3" type="submit">Subscribe</button>
					</div>
					<div class="col-md-2">
						<h5 class="fw-normal fs-6">NATURAL COSMETICS</h5>
					</div>
					<div class="col-md-2">
						<h5 class="fw-normal fs-6">COMPANY</h5>
						<a class="btn btn-primary text-white">Contact Us</a>
					</div>
					<div class="col-md-2">
						<h5 class="fw-normal fs-6">RESOURCES</h5>
						<a class="btn btn-primary text-white">Client Login</a>
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

