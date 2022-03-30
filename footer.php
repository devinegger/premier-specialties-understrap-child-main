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


<footer id="colophon">
	<div class="container">
		<div class="row">
			<div class="order-1 col-md-9 mb-2 mb-md-0 col-lg-3">
				<span class="footer-logo d-block mb-2">
					<img src="/wp-content/uploads/2022/03/OnScent_Footer_logo_168x70px.png" alt="OnScent Logo" />
				</span>				
				<div class="company-info ps-3">
					<?php the_field('left_column_content', 'options'); ?>
				</div>
			</div>
			<div class="order-2 order-md-3 order-lg-2 col-lg-7">
				<div class="row">
					<div class="col-md-12 order-2 order-md-1">
						<div class="menu-wrapper">
							<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'footer-menu',
									'container_class' => '',
									'menu_class'      => 'footer-nav',
									'fallback_cb'     => 'false',
									'menu_id'         => 'footer-menu',
									'depth'           => 1,
									'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
								)
							);
							?>
						</div>						
					</div>
					<div class="order-1 order-md-2 col-md-6 col-lg-5 col-xl-4">
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
					</div>
					<div class="order-3 col-md-4 offset-md-1 col-lg-7 offset-lg-0 col-xl-8">
						<div class="user-btns">
							<a class="btn btn-primary text-white text-nowrap" href="<?= $first_button_url ?>" target="<?= $first_buton_target ?>"><?= $first_button_title ?></a>
							<a class="btn btn-primary text-white text-nowrap" href="<?= $second_button_url ?>" target="<?= $second_buton_target ?>"><?= $second_button_title ?></a>							
						</div>
					</div>
				</div>
			</div>
			<div class="order-3 col-md-3 order-md-2 col-lg-2 ps-lg-3 ps-xl-4">
				<ul class="social-links">
					<li>
						<a class="text-white text-decoration-none" href="">
							<i class="fa fa-brands fa-linkedin"></i>
							<span class="social-text">LinkedIn</span>
						</a>
					</li>
					<li>
						<a class="text-white text-decoration-none" href="">
							<i class="fa fa-brands fa-youtube-play"></i>
							<span class="social-text">YouTube</span>
						</a>
					</li>
					<li>
						<a class="text-white text-decoration-none" href="">
							<i class="fa fa-brands fa-facebook-square"></i>
							<span class="social-text">Facebook</span>
						</a>
					</li>
					<li>
						<a class="text-white text-decoration-none" href="">
							<i class="fa fa-brands fa-twitter"></i>
							<span class="social-text">Twitter</span>
						</a>
					</li>
					<li>
						<a class="text-white text-decoration-none" href="">
							<i class="fa fa-brands fa-instagram"></i>
							<span class="social-text">Instagram</span>
						</a>
					</li>					
				</ul>
			</div>
		</div>
	</div>
</footer>


</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

