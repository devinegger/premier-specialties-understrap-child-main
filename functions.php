<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * Register and enqueue a custom stylesheet in the WordPress admin. Added to hide some options on the FASC (button generator) plugin
 */
function hdc_enqueue_custom_admin_style() {
  wp_register_style( 'admin-overrides-css', get_stylesheet_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
  wp_enqueue_style( 'admin-overrides-css' );
}
add_action( 'admin_enqueue_scripts', 'hdc_enqueue_custom_admin_style' );

/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );


if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// Simple shortcode for keeping copyright year updated in Privacy Policy / WYSIWYG editor
function currentYear( $atts ){
  return date('Y');
}
add_shortcode( 'year', 'currentYear' );

add_filter('enter_title_here', 'team_member_place_holder' , 20 , 2 );
function team_member_place_holder($title , $post){

  if( $post->post_type == 'team_member' ){
    $my_title = "Team Member Name";
    return $my_title;
  }

  return $title;

}



/*	
* WooCommerce Customizations (brought over from previous site)
*/

// add custom fields to product

// Woocommerce custom fields for General tab
// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

// Adding New Fields
function woo_add_custom_general_fields() {

  global $woocommerce, $post;
  
  echo '<div class="options_group">';
  
  // Custom fields will be created here...
  
// Start Text Field
woocommerce_wp_text_input( 
	array( 
		'id'          => '_text_field', 
		'label'       => __( 'INCI name', 'woocommerce' ), 
	)
);
// End Text Field

// Start Textarea
woocommerce_wp_textarea_input( 
	array( 
		'id'          => '_textarea', 
		'label'       => __( 'Product description', 'woocommerce' ), 
	)
);
// End Textarea
  
// Start Number Field
woocommerce_wp_text_input( 
	array( 
		'id'                => '_number_field', 
		'label'             => __( 'Product code', 'woocommerce' ), 
		'type'              => 'number', 
		'custom_attributes' => array(
				'step' 	=> 'any',
				'min'	=> '0'
			) 
	)
);
// End Number Field

  echo '</div>';
	
}

  // Saving Fields Values
function woo_add_custom_general_fields_save( $post_id ){
	
	// Text Field
	$woocommerce_text_field = $_POST['_text_field'];
	if( !empty( $woocommerce_text_field ) )
		update_post_meta( $post_id, '_text_field', esc_attr( $woocommerce_text_field ) );
		
	// Number Field
	$woocommerce_number_field = $_POST['_number_field'];
	if( !empty( $woocommerce_number_field ) )
		update_post_meta( $post_id, '_number_field', esc_attr( $woocommerce_number_field ) );
		
	// Textarea
	$woocommerce_textarea = $_POST['_textarea'];
	if( !empty( $woocommerce_textarea ) )
		update_post_meta( $post_id, '_textarea', esc_html( $woocommerce_textarea ) );
	
}

/**
 * Changing auto complete on all WooCommerce orders to "processing" status. Allows to manually complete order when approved, and then  email will be sent automatically with link to download product.
 */
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
function custom_woocommerce_auto_complete_order( $order_id ) { 
    if ( ! $order_id ) {
        return;
    }

    $order = wc_get_order( $order_id );
    $order->update_status( 'processing' );
}

// Begin WooCommerce – Cart limit to 10 items
// Checking and validating when products are added to cart
add_filter( 'woocommerce_add_to_cart_validation', 'only_ten_items_allowed_add_to_cart', 10, 3 );

function only_ten_items_allowed_add_to_cart( $passed, $product_id, $quantity ) {

    $cart_items_count = WC()->cart->get_cart_contents_count();
    $total_count = $cart_items_count + $quantity;

    if( $cart_items_count >= 10 || $total_count > 10 ){
        // Set to false
        $passed = false;
        // Display a message
         wc_add_notice( __( "Your cart is full. Please contact info@premierfragrances.com for further inquiries.", "woocommerce" ), "error" );
    }
    return $passed;
}
// Checking and validating when updating cart item quantities when products are added to cart
add_filter( 'woocommerce_update_cart_validation', 'only_ten_items_allowed_cart_update', 10, 4 );
function only_ten_items_allowed_cart_update( $passed, $cart_item_key, $values, $updated_quantity ) {

    $cart_items_count = WC()->cart->get_cart_contents_count();
    $original_quantity = $values['quantity'];
    $total_count = $cart_items_count - $original_quantity + $updated_quantity;

    if( $cart_items_count > 10 || $total_count > 10 ){
        // Set to false
        $passed = false;
        // Display a message
         wc_add_notice( __( "Your cart is full. Please contact info@premierfragrances.com for further inquiries.", "woocommerce" ), "error" );
    }
    return $passed;
}
// End WooCommerce – Cart limit to 10 items


/*
 * end WooCommerce functions
 */


// remove parent page templates
function child_remove_page_templates( $page_templates ) {
	unset( $page_templates['page-templates/blank.php'] );
	unset( $page_templates['page-templates/both-sidebarspage.php'] );
	unset( $page_templates['page-templates/empty.php'] );
	unset( $page_templates['page-templates/fullwidthpage.php'] );
	unset( $page_templates['page-templates/left-sidebarpage.php'] );
	unset( $page_templates['page-templates/right-sidebarpage.php'] );

	return $page_templates;
}

add_filter( 'theme_page_templates', 'child_remove_page_templates' );


// remove ellipses from exceprt 
remove_filter('get_the_excerpt', 'wp_trim_excerpt');