<?php
namespace redlight_Toolkit_Addon;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

 /**
 * For Elementor Global Kit Settings
 */
use Elementor\Core\App\Modules\ImportExport\Directories\Root;
use Elementor\Core\App\Modules\ImportExport\Module;
use Elementor\Core\Settings\Page\Manager as PageManager;
use Elementor\Plugin;

/**
 * Plugin class.
 *
 * The main class that initiates and runs the addon.
 *
 * @since 1.0.0
 */
final class Redlight_Plugin {

	/**
	 * Addon Version
	 *
	 * @since 1.0.0
	 * @var string The addon version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the addon.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.7.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the addon.
	 */
	const MINIMUM_PHP_VERSION = '7.3';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var \redlight_Toolkit_Addon\Redlight_Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 * @return \redlight_Toolkit_Addon\Redlight_Plugin An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}
	
	 /**
     * Constructor
     *
     * Perform some compatibility checks to make sure basic requirements are meet.
     * If all compatibility checks pass, initialize the functionality.
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct() {
 
        if ( $this->is_compatible() ) {
            add_action( 'elementor/init', [ $this, 'init' ] );
        }
        $this->register_callbacks();
    }

	/**
	 * Compatibility Checks
	 *
	 * Checks whether the site meets the addon requirement.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function is_compatible() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return false;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return false;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return false;
		}

		return true;

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'redlight-toolkit-addon' ),
			'<strong>' . esc_html__( 'Redlight Toolkit Addon', 'redlight-toolkit-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'redlight-toolkit-addon' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'redlight-toolkit-addon' ),
			'<strong>' . esc_html__( 'Redlight Toolkit Addon', 'redlight-toolkit-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'redlight-toolkit-addon' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'redlight-toolkit-addon' ),
			'<strong>' . esc_html__( 'Redlight Toolkit Addon', 'redlight-toolkit-addon' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'redlight-toolkit-addon' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Initialize
	 *
	 * Load the addons functionality only after Elementor is initialized.
	 *
	 * Fired by `elementor/init` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {

		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
		add_action( 'elementor/controls/register', [ $this, 'register_controls' ] );
		

	}

	/**
	 * Register Widgets
	 *
	 * Load widgets files and register new Elementor widgets.
	 *
	 * Fired by `elementor/widgets/register` action hook.
	 *
	 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets( $widgets_manager ) {

		require_once( __DIR__ . '/widgets/redlight-button-widget.php' );
		require_once( __DIR__ . '/widgets/services-post-widget.php' );
		require_once( __DIR__ . '/widgets/nav-widget.php' );
		require_once( __DIR__ . '/widgets/redlight-testimonial-widget.php' );
		require_once( __DIR__ . '/widgets/blog-post-widget.php' );
		require_once( __DIR__ . '/widgets/cpt-widget.php' );

		$widgets_manager->register( new \Elementor_Redlight_Button_Widget() );
		$widgets_manager->register( new \Elementor_Services_Post_Widget() );
		$widgets_manager->register( new \Elementor_Redlight_Testimonial_Widget() );
		$widgets_manager->register( new \Elementor_Nav_Widget() );
		$widgets_manager->register( new \Elementor_Blog_post_Widget() );
		$widgets_manager->register( new \Elementor_Cpt_Widget() );
	}

	/**
	 * Register Controls
	 *
	 * Load controls files and register new Elementor controls.
	 *
	 * Fired by `elementor/controls/register` action hook.
	 *
	 * @param \Elementor\Controls_Manager $controls_manager Elementor controls manager.
	 */
	public function register_controls( $controls_manager ) {

		require_once( __DIR__ . '/controls/redlight-testimonial-control.php' );
		require_once( __DIR__ . '/controls/redlight-button-control.php' );
		require_once( __DIR__ . '/controls/services-post-control.php' );
		require_once( __DIR__ . '/controls/nav-control.php' );
		require_once( __DIR__ . '/controls/blog-post-control.php' );
		require_once( __DIR__ . '/controls/cpt-control.php' );

		$controls_manager->register( new \Elementor_Redlight_Testimonial_Control() );
		$controls_manager->register( new \Elementor_Redlight_Button_Control() );
		$controls_manager->register( new \Elementor_Services_Post_Control() );
		$controls_manager->register( new \Elementor_Nav_Control() );
		$controls_manager->register( new \Elementor_Blog_Post_Control() );
		$controls_manager->register( new \Elementor_Cpt_Control() );
	}
	protected function register_callbacks(){
        add_filter('akd_elementor_global', array($this, 'akd_elementor_global'));
    }
 
    public function akd_elementor_global(){
        $data = get_transient( 'ocdi_importer_data' );
        $kit = Plugin::$instance
            ->kits_manager
            ->get_active_kit();
        $old_settings = $kit->get_meta(PageManager::META_KEY);
        if (!$old_settings){
            $old_settings = [];
        }
        //$new_settings = json_decode(file_get_contents(get_template_directory() . '/demo/layout-01/site-settings.json') , true);
        $new_settings = json_decode(file_get_contents($data['selected_import_files']['widgets']) , true);
        $new_settings = $new_settings['settings'];
        if ($old_settings){
            if (isset($old_settings['custom_colors'])){
                $new_settings['custom_colors'] = array_merge($old_settings['custom_colors'], $new_settings['custom_colors']);
            }
            if (isset($old_settings['custom_typography'])){
                $new_settings['custom_typography'] = array_merge($old_settings['custom_typography'], $new_settings['custom_typography']);
            }
        }
        $new_settings = array_replace_recursive($old_settings, $new_settings);
        $kit->save(['settings' => $new_settings]);
    }

}