<?php
/**
 * Plugin Name: Redlight Toolkit
 * Description: Redlight Custom Elementor addon.
 * Plugin URI:  http://designingmedia.com
 * Version:     1.0.0
 * Author:      Designing Media
 * Author URI:  http://designingmedia.com
 * Text Domain: redlight-toolkit
 * 
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
define('PLUGIN_BASE_URI', plugin_dir_url( __FILE__ ));

function redlight_toolkit_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/redlight-plugin.php' );

	// Run the plugin
	\redlight_Toolkit_Addon\Redlight_Plugin::instance();

}
add_action( 'plugins_loaded', 'redlight_toolkit_addon' );

function HomeURL() { 
	return home_url(); 
} 
add_shortcode('URL', 'HomeURL'); 
// Home URL Link Shortcode 
	function HomeURL1() { 
	$url = preg_replace("(^http?://)", "", home_url() ); 
	$url = preg_replace("(^https?://)", "", home_url() ); 
	return $url; 
} 
add_shortcode('url', 'HomeURL1');

function cptui_register_my_cpts() {

	/**
	 * Post Type: Services Post.
	 */

	$labels = [
		"name" => esc_html__( "Services Post", "redlight" ),
		"singular_name" => esc_html__( "Service Post", "redlight" ),
	];

	$args = [
		"label" => esc_html__( "Services Post", "redlight" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => [ "slug" => "services-post", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "services-post", $args );

	/**
	 * Post Type: Case Studies.
	 */

	 $labels = [
		"name" => esc_html__( "Case Studies", "redlight" ),
		"singular_name" => esc_html__( "Case Study", "redlight" ),
	];

	$args = [
		"label" => esc_html__( "Case Studies", "redlight" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => [ "slug" => "case_study", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "case_study", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts_services_post() {

	/**
	 * Post Type: Services Post.
	 */

	$labels = [
		"name" => esc_html__( "Services Post", "redlight" ),
		"singular_name" => esc_html__( "Service Post", "redlight" ),
	];

	$args = [
		"label" => esc_html__( "Services Post", "redlight" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => [ "slug" => "services-post", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "services-post", $args );
}

add_action( 'init', 'cptui_register_my_cpts_services_post' );


function cptui_register_my_cpts_case_study() {

	/**
	 * Post Type: Case Studies.
	 */

	$labels = [
		"name" => esc_html__( "Case Studies", "redlight" ),
		"singular_name" => esc_html__( "Case Study", "redlight" ),
	];

	$args = [
		"label" => esc_html__( "Case Studies", "redlight" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => [ "slug" => "case_study", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "case_study", $args );
}

add_action( 'init', 'cptui_register_my_cpts_case_study' );


// Woocomerce Cart Short Code

add_shortcode ('woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
	ob_start();
		if(isset(WC()->cart)){
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
		<a class="btn nav-link" href="<?php echo $cart_url; ?>">
            <img class="cart-img" src="<?php echo get_template_directory_uri() .'/assets/img/cart-icon.png'?>">
			<span class="badge badge-info"></span>
	    <?php
        if ( $cart_count > 0 ) {
       ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
        </a></li>
        <?php
		}
	    else{
            ?>
            <img class="cart-img" src="<?php echo get_template_directory_uri() . '/assets/img/cart-icon.png' ?>">
            <?php
        }
    return ob_get_clean();
 
}
add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count', 10, 1 );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php            
    }
        ?></a>
    <?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}

add_filter( 'wp_nav_menu_top-menu_items', 'woo_cart_but_icon', 10, 2 ); // Change menu to suit - example uses 'top-menu'
/**
 * Add WooCommerce Cart Menu Item Shortcode to particular menu
 */
function woo_cart_but_icon ( $items, $args ) {
       $items .=  '[woo_cart_but]'; // Adding the created Icon via the shortcode already created
       return $items;
}

add_action('wp_ajax_cart_count_retriever', 'cart_count_retriever');
add_action('wp_ajax_nopriv_cart_count_retriever', 'cart_count_retriever');
function cart_count_retriever() {
    global $wpdb;
    echo WC()->cart->get_cart_contents_count();
    wp_die();
}

// Define a function that enqueues your JS styles
function js_styles() {
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_script( 'redlight_JS',  $plugin_url . "assets/js/redlight.js", array( 'jquery' ), '', true );
	wp_enqueue_script( 'services-post',  $plugin_url . "assets/js/services-post.js", array( 'jquery' ), '', true );
    wp_enqueue_script( 'testimonial-js',  $plugin_url . "assets/js/testimonial.js", array( 'jquery' ), '', true );

}
// Define a function that enqueues your CSS styles
function css_styles() {
	$plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style( 'redlight_widget_style',  $plugin_url . "assets/css/redlight-widget.css");
}
// Hook the function to an appropriate WordPress action
add_action( 'wp_enqueue_scripts', 'js_styles' );

function enqueue_admin_scripts() {
    wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'owl-carousel-min-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '', true );

	// Enqueue plugin-related scripts
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_script( 'redlight_JS',  $plugin_url . "assets/js/redlight.js", array( 'jquery' ), '', true );
    wp_enqueue_script( 'services-post',  $plugin_url . "assets/js/services-post.js", array( 'jquery' ), '', true );
}

add_action( 'admin_enqueue_scripts', 'enqueue_admin_scripts' );
add_action( 'elementor/editor/after_enqueue_scripts', 'enqueue_admin_scripts' );



