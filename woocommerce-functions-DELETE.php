<?php 

// temporary file for holding all WooCommerce functions from previous site

//add_action( 'after_setup_theme', 'be_themes_child_theme_setup' );
//function be_themes_child_theme_setup() {
    load_child_theme_textdomain( 'be-themes', get_stylesheet_directory() . '/languages' );
//}

// function be_restore_default_gallery() {
// remove_shortcode('gallery');
// add_shortcode('gallery','gallery_shortcode');
// remove_shortcode('video');
// add_shortcode('video','wp_video_shortcode');      
// }
// add_action( 'init', 'be_restore_default_gallery');




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
		
	// Select
	$woocommerce_select = $_POST['_select'];
	if( !empty( $woocommerce_select ) )
		update_post_meta( $post_id, '_select', esc_attr( $woocommerce_select ) );
	
	// Custom Field
	$custom_field_type =  array( esc_attr( $_POST['_field_one'] ), esc_attr( $_POST['_field_two'] ) );
	update_post_meta( $post_id, '_custom_field_type', $custom_field_type );
	
	// Hidden Field
	$woocommerce_hidden_field = $_POST['_hidden_field'];
	if( !empty( $woocommerce_hidden_field ) )
		update_post_meta( $post_id, '_hidden_field', esc_attr( $woocommerce_hidden_field ) );
		
	// Product Field Type
	$product_field_type =  $_POST['product_field_type'];
	update_post_meta( $post_id, '_product_field_type_ids', $product_field_type );
	
}



// Custom Woocommerce placeholder image
// Add action to hook into the approp
add_filter( 'woocommerce_placeholder_img_src', 'growdev_custom_woocommerce_placeholder', 10 );

/**
 * Function to return new placeholder image URL.
 */
function growdev_custom_woocommerce_placeholder( $image_url ) {
  $image_url = 'http://www.premierfragrances.com/wp-content/uploads/2017/01/image-placeholder.png';
  return $image_url;
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

/**
 * WooCommerce email styles
 */
add_filter( 'woocommerce_email_styles', 'patricks_woocommerce_email_styles' );
function patricks_woocommerce_email_styles( $css ) {
	$css .= "#template_header { background-color: #8326a0; }";
	$css .= "a { color: #8326a0 !important; }";
	$css .= "h2 { color: #8326a0; }";
	$css .= "h2 a { color: #8326a0 !important; }";
	$css .= "h3 { color: #8326a0; }";
	$css .= "td p { color: #575058; }";
	$css .= "table.product-code-cont tbody tr td { border: 1px solid #e4e4e4; }";
	$css .= "small { font-size: 14px; }";
	$css .= "small a { color: #8326a0 !important; }";
	$css .= ".ii a[href] { color: #8326a0 !important; }";
	$css .= ".attr-attribute_pa_request { display:none; }";
	return $css;
}


 /**
 * Remove the href from empty links `<a href="#">` in the nav menus (Strategic Partners)
 * @param string $menu the current menu HTML
 * @return string the modified menu HTML
 */
function wpse_remove_empty_links( $menu ) {
    return str_replace( '<a href="#">', '<a>', $menu );
}

add_filter( 'wp_nav_menu_items', 'wpse_remove_empty_links' );

		function be_woo_after_shop_loop_item_title() {
			// echo '</div><a href="#">'; // be-woo-functions.php
			echo '</div>';
		}
		add_action('woocommerce_after_shop_loop_item_title', 'be_woo_after_shop_loop_item_title', 12);

/**
 * WooCommerce variations - create grid instead of dropdown menu
 */
 function woocommerce_variable_add_to_cart(){
    global $product, $post;
 
    $variations = find_valid_variations();
 
    // Check if the special 'price_grid' meta is set, if it is, load the default template:
    if ( get_post_meta($post->ID, 'price_grid', true) ) {
        // Enqueue variation scripts
        wp_enqueue_script( 'wc-add-to-cart-variation' );
 
        // Load the template
        wc_get_template( 'single-product/add-to-cart/variable.php', array(
                'available_variations'  => $product->get_available_variations(),
                'attributes'            => $product->get_variation_attributes(),
                'selected_attributes'   => $product->get_variation_default_attributes()
            ) );
        return;
    }
 
    // Cool, lets do our own template!
    ?>
    <table class="variations variations-grid" cellspacing="0">
        <tbody>
            <?php
            foreach ($variations as $key => $value) {
                if( !$value['variation_is_visible'] ) continue;
            ?>
            <tr>
                <td>
                    <?php foreach($value['attributes'] as $key => $val ) {
                        $val = str_replace(array('-','_'), ' ', $val);
                        printf( '<span class="attr attr-%s">%s</span>', $key, ucwords($val) );
                    } ?>
                </td>
                <td>
                    <?php echo $value['price_html'];?>
                </td>
                <td>
                    <?php if( $value['is_in_stock'] ) { ?>
                    <form class="cart" action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" method="post" enctype='multipart/form-data'>
                        <?php woocommerce_quantity_input(); ?>
                        <div class="add-to-cart-cont"><?php
                        if(!empty($value['attributes'])){
                            foreach ($value['attributes'] as $attr_key => $attr_value) {
                            ?>
                            <input type="hidden" name="<?php echo $attr_key?>" value="<?php echo $attr_value?>">
                            <?php
                            }
                        }
                        ?>
                        <button type="submit" class="single_add_to_cart_button btn btn-primary"><span class="glyphicon glyphicon-tag"></span> Add to cart</button>
                        <input type="hidden" name="variation_id" value="<?php echo $value['variation_id']?>" />
                        <input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
                        <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $post->ID ); ?>" />
                        </div>
                    </form>
                    <?php } else { ?>
                        <p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
}

function find_valid_variations() {
    global $product;
 
    $variations = $product->get_available_variations();
    $attributes = $product->get_attributes();
    $new_variants = array();
 
    // Loop through all variations
    foreach( $variations as $variation ) {
 
        // Peruse the attributes.
 
        // 1. If both are explicitly set, this is a valid variation
        // 2. If one is not set, that means any, and we must 'create' the rest.
 
        $valid = true; // so far
        foreach( $attributes as $slug => $args ) {
            if( array_key_exists("attribute_$slug", $variation['attributes']) && !empty($variation['attributes']["attribute_$slug"]) ) {
                // Exists
 
            } else {
                // Not exists, create
                $valid = false; // it contains 'anys'
                // loop through all options for the 'ANY' attribute, and add each
                foreach( explode( '|', $attributes[$slug]['value']) as $attribute ) {
                    $attribute = trim( $attribute );
                    $new_variant = $variation;
                    $new_variant['attributes']["attribute_$slug"] = $attribute;
                    $new_variants[] = $new_variant;
                }
 
            }
        }
 
        // This contains ALL set attributes, and is itself a 'valid' variation.
        if( $valid )
            $new_variants[] = $variation;
 
    }
 
    return $new_variants;
}

//enqueues our external font awesome stylesheet
function enqueue_our_required_stylesheets(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
	wp_enqueue_script('sticky-table-header', get_stylesheet_directory_uri() . '/assets/js/jquery.stickytableheader.js');
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');

/**
 * Search Results - remove pagination
 */
function jc_limit_search_posts() {
	if ( is_search())
		set_query_var('posts_per_page', -1);
}
add_filter('pre_get_posts', 'jc_limit_search_posts');

//WP widgets - turns text widgets into php widgets
add_filter('widget_text','execute_php',100);
function execute_php($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}

class AT_Order_Item_Meta extends WC_Order_Item_Meta {
	/**
	 * Display meta in a formatted list.
	 *
	 * @param bool $flat (default: false)
	 * @param bool $return (default: false)
	 * @param string $hideprefix (default: _)
	 * @param  string $delimiter Delimiter used to separate items when $flat is true
	 * @return string|void
	 */
	public function display( $flat = false, $return = false, $hideprefix = '_', $delimiter = ", \n" ) {
		// Override parent functionality, only if we are working with a flat request
		if ($flat) {
			$formatted_meta = $this->get_formatted($hideprefix);
			$meta_list = array();
			
			foreach ( $formatted_meta as $meta ) {
				// $meta_list[] = wp_kses_post( $meta['label'] . ': ' . $meta['value'] );
				$meta_list[] = wp_kses_post($meta['value'] );
			}

			if ( ! empty( $meta_list ) ) {
				$output .= implode( $delimiter, $meta_list );
			}
			
			$output = apply_filters( 'woocommerce_order_items_meta_display', $output, $this );
	
			if ( $return ) {
				return $output;
			} else {
				echo $output;
			}
			// Short circuit
			return;
		}
		return parent::display($flat, $return, $hideprefix);
		
	}
}

add_filter('pre_get_posts', 'cwi_filter_search');
function cwi_filter_search($query) {
	global $wp_post_types;
	if (isset($_GET['debugtypes'])) {
        $exclude = array('product', 'product_variation');
        $post_types = array();
        foreach($wp_post_types as $type => $info) {
            $exclude_from_search = null;

            if (null === $info->exclude_from_search) {
                if (true === $info->public) $exclude_from_search = false;
                else $exclude_from_search = true;
            } else {
                $exclude_from_search = $type->exclude_from_search;
            }
            if (!in_array($type, $exclude) && !$exclude_from_search) $post_types[] = $type;
        }
        if (!$query->is_admin && $query->is_search) {
            $query->set('post_type', $post_types);
        }
	}
    return $query;
}
function cwi_footer() {
    ?>
    <script type="text/javascript">
//	StickyTableHeader.prototype.getHeaderTop = function() {
//		var $obj = jQuery('.chart-thumb');
//		return ($obj.offset().top + $obj.outerHeight())
// 		return this.$hdr.offset().top;;
//	}
//	StickyTableHeader.prototype.getHeaderHeight = function() {
//		return this.getHeaderTop() + this.$hdr.outerHeight();
//		return this.$hdr.outerHeight();
//	}
        jQuery(document).ready(function() {
            StickyTableHeader.create('#tablepress-1').keepBelow('#header-wrap');
        });
    </script>
    <?php
}
add_action('wp_footer', 'cwi_footer');

function woocommerce_template_loop_product_title() {
	echo '<div id="product-link-' . get_the_ID() . '"></div><h3>' . get_the_title() . '</h3>';
}
// add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

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

/**
 * WooCommerce new order email customer details
 */
function wc_customer_details( $fields, $sent_to_admin, $order ) {
	if ( empty( $fields ) ) {
		if ( $order->get_billing_email() ) {
			$fields['billing_email'] = array(   
				'label' => __( 'Email address', 'woocommerce' ),
				'value' => wptexturize( $order->get_billing_email() ),
			);
		}
		if ( $order->get_billing_phone() ) {
			$fields['billing_phone'] = array(
				'label' => __( 'Phone', 'woocommerce' ),
				'value' => wptexturize( $order->get_billing_phone() ),
			);
		}
	}
	return $fields;
}
add_filter( 'woocommerce_email_customer_details_fields', 'wc_customer_details', 10, 3 );
// End WooCommerce new order email customer details

// Start Disable WordPress Comment Form User Details Cookie
remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );
// End Disable WordPress Comment Form User Details Cookie

/**
 * Add additional styles for be_themes
 */
function cwi_themes_options_css() {
	if ( false === ( $css = get_transient( 'be_themes_css_override' ) ) ) {
		$css_dir = get_stylesheet_directory() . '/assets/css/';
		ob_start(); // Capture all output (output buffering)
#		require(get_template_directory() .'/css/be-themes-styles.php'); // Generate CSS
		require(__DIR__ . '/assets/css/be-themes-styles-override.php'); // Generate CSS
		$css = ob_get_clean(); // Get generated CSS (output buffering)
		set_transient( 'be_themes_css_override', $css );
	}
	echo '<style type="text/css">' . $css . '</style>';
}
add_action( 'wp_head', 'cwi_themes_options_css' );

/**
* For SSL padlock to appear - Enables the HTTP Strict Transport Security (HSTS) header.
*
* @since 1.0.0
*/
add_action( 'send_headers', 'tgm_io_strict_transport_security' );

function tgm_io_strict_transport_security() {

header( 'Strict-Transport-Security: max-age=10886400' );

}
