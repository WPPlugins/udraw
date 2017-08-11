<?php
/*
 * Plugin Name: Web To Print Shop : uDraw
 * Plugin URI: http://www.webtoprintshop.com/
 * Description: Browser based online designer and Web To Print technology for any product.
 * Version: 2.7.3
 * Author: Racad Tech, Inc.
 * Author URI: http://webtoprint.solutions/
 * 
 * Requires at least: 4.1
 * Tested up to: 4.7
 * Stable tag: 2.7.3
 * 
 * @package uDraw
 * @author Amram Bentolila, Crystal Ng
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!defined('UDRAW_PLUGIN_DIR')) {
    define('UDRAW_PLUGIN_DIR', dirname(__FILE__));
}

if (!defined('UDRAW_PLUGIN_URL')) {
    define('UDRAW_PLUGIN_URL', plugins_url('/', __FILE__));
}

if (!defined('UDRAW_ORDERS_DIR')) {    
    define('UDRAW_ORDERS_DIR', WP_CONTENT_DIR . '/udraw/orders/');
}

if (!defined('UDRAW_ORDERS_URL')) {
    define('UDRAW_ORDERS_URL', content_url() . '/udraw/orders/');
}

if (!defined('UDRAW_STORAGE_DIR')) {
    define('UDRAW_STORAGE_DIR', WP_CONTENT_DIR . '/udraw/storage/');
}

if (!defined('UDRAW_STORAGE_URL')) {
    define('UDRAW_STORAGE_URL', content_url() . '/udraw/storage/');
}

if (!defined('UDRAW_DESIGN_STORAGE_DIR')) {
    define('UDRAW_DESIGN_STORAGE_DIR', WP_CONTENT_DIR . '/udraw/storage/_designs_/');
}

if (!defined('UDRAW_DESIGN_STORAGE_URL')) {
    define('UDRAW_DESIGN_STORAGE_URL', content_url() . '/udraw/storage/_designs_/');
}

if (!defined('UDRAW_FONTS_DIR')) {
    define('UDRAW_FONTS_DIR', WP_CONTENT_DIR . '/udraw/fonts/');
}

if (!defined('UDRAW_FONTS_URL')) {
    define('UDRAW_FONTS_URL', content_url() . '/udraw/fonts/');
}

if (!defined('UDRAW_CLIPART_DIR')) {
    define('UDRAW_CLIPART_DIR', WP_CONTENT_DIR . '/udraw/clipart/');
}

if (!defined('UDRAW_CLIPART_URL')) {
    define('UDRAW_CLIPART_URL', content_url() . '/udraw/clipart/');
}

if (!defined('UDRAW_TEMP_UPLOAD_DIR')) {
    define('UDRAW_TEMP_UPLOAD_DIR', WP_CONTENT_DIR . '/udraw/uploads/');    
}

if (!defined('UDRAW_TEMP_UPLOAD_URL')) {
    define('UDRAW_TEMP_UPLOAD_URL', content_url() . '/udraw/uploads/');    
}

if (!defined('UDRAW_LANGUAGES_DIR')) {
    define('UDRAW_LANGUAGES_DIR', WP_CONTENT_DIR . '/udraw/languages/');    
}

if (!defined('UDRAW_LANGUAGES_URL')) {
    define('UDRAW_LANGUAGES_URL', content_url() . '/udraw/languages/');    
}

if (!defined('UDRAW_BOOTSTRAP_JS')) {
    define('UDRAW_BOOTSTRAP_JS', UDRAW_PLUGIN_URL . 'assets/bootstrap-3.2.0/js/bootstrap.min.js');
}
if (!defined('UDRAW_BOOTSTRAP_CSS')) {
    define('UDRAW_BOOTSTRAP_CSS', UDRAW_PLUGIN_URL . 'designer/includes/css/udraw-bootstrap.css');
}
if (!defined('UDRAW_JQUERY_UI_CSS')) {
    define('UDRAW_JQUERY_UI_CSS', UDRAW_PLUGIN_URL . 'assets/jquery-ui-1.11.1.custom/jquery-ui.min.css');
}

if (!defined('UDRAW_JQUERY_UI_THEME_CSS')) {
    define('UDRAW_JQUERY_UI_THEME_CSS', UDRAW_PLUGIN_URL . 'assets/jquery-ui-1.11.1.custom/jquery-ui.theme.min.css');
}

if (!defined('UDRAW_FONTAWESOME_CSS')) {
    define('UDRAW_FONTAWESOME_CSS', UDRAW_PLUGIN_URL . 'assets/font-awesome-4.4.0/css/font-awesome.min.css');
}

if (!defined('UDRAW_WEBFONT_JS')) {
    define('UDRAW_WEBFONT_JS', UDRAW_PLUGIN_URL . 'assets/webfont-1.5.3/webfont.js');
}

if (!defined('UDRAW_MAGNIFIC_POPUP_JS')) {
    define('UDRAW_MAGNIFIC_POPUP_JS', UDRAW_PLUGIN_URL . 'assets/magnific-popup/jquery.magnific-popup.js');
}

if (!defined('UDRAW_MAGNIFIC_POPUP_CSS')) {
    define('UDRAW_MAGNIFIC_POPUP_CSS', UDRAW_PLUGIN_URL . 'assets/magnific-popup/magnific-popup.css');
}

if (!defined('UDRAW_CHOSEN_JS')) {
    define('UDRAW_CHOSEN_JS', UDRAW_PLUGIN_URL . 'assets/chosen_v1.4.2/chosen.jquery.min.js');    
}

if (!defined('UDRAW_CHOSEN_CSS')) {
    define('UDRAW_CHOSEN_CSS', UDRAW_PLUGIN_URL . 'assets/chosen_v1.4.2/chosen.min.css');    
}

if (!defined('UDRAW_SELECT2_JS')) {
    define('UDRAW_SELECT2_JS', UDRAW_PLUGIN_URL . 'assets/select-js/select2.js');    
}

if (!defined('UDRAW_SELECT2_CSS')) {
    define('UDRAW_SELECT2_CSS', UDRAW_PLUGIN_URL . 'assets/select-js/select2.css');    
}

if (!defined('UDRAW_ACE_JS')) {
    define('UDRAW_ACE_JS', UDRAW_PLUGIN_URL . 'assets/ace-1.1.01/js/ace.js');    
}

if (!defined('UDRAW_ACE_MODE_JAVASCRIPT_JS')) {
    define('UDRAW_ACE_MODE_JAVASCRIPT_JS', UDRAW_PLUGIN_URL . 'assets/ace-1.1.01/js/mode-javascript.js');    
}

if (!defined('UDRAW_ACE_MODE_CSS_JS')) {
    define('UDRAW_ACE_MODE_CSS_JS', UDRAW_PLUGIN_URL . 'assets/ace-1.1.01/js/mode-css.js');    
}

if (!defined('UDRAW_ACE_THEME_CHROME_JS')) {
    define('UDRAW_ACE_THEME_CHROME_JS', UDRAW_PLUGIN_URL . 'assets/ace-1.1.01/js/theme-chrome.js');   
}

if (!defined('UDRAW_ACE_WORKER_JAVASCRIPT_JS')) {
    define('UDRAW_ACE_WORKER_JAVASCRIPT_JS', UDRAW_PLUGIN_URL . 'assets/ace-1.1.01/js/worker-javascript.js');   
}

if (!defined('UDRAW_ACE_WORKER_CSS_JS')) {
    define('UDRAW_ACE_WORKER_CSS_JS', UDRAW_PLUGIN_URL . 'assets/ace-1.1.01/js/worker-css.js');   
}

if (!defined('UDRAW_ACE_THEME_PATH')) {
    define('UDRAW_ACE_THEME_PATH', wp_make_link_relative(UDRAW_PLUGIN_URL . 'assets/ace-1.1.01/theme/'));
}

if (!defined('UDRAW_TAGS_INPUT_CSS')) {
    define('UDRAW_TAGS_INPUT_CSS', UDRAW_PLUGIN_URL . 'assets/jQuery-Tags-Input/jquery.tagsinput.css');    
}

if (!defined('UDRAW_TAGS_INPUT_JS')) {
    define('UDRAW_TAGS_INPUT_JS', UDRAW_PLUGIN_URL . 'assets/jQuery-Tags-Input/jquery.tagsinput.min.js');    
}

if (!defined('UDRAW_DESIGNER_IMG_PATH')) {
    define('UDRAW_DESIGNER_IMG_PATH', plugins_url('designer/includes/img/', __FILE__));	
}

if (!defined('UDRAW_DESIGNER_INCLUDE_PATH')) {
    define('UDRAW_DESIGNER_INCLUDE_PATH', plugins_url('designer/includes/', __FILE__));
}

if (!defined('UDRAW_IMAGE_CROPPER_JS')) {
    define('UDRAW_IMAGE_CROPPER_JS', UDRAW_PLUGIN_URL . 'assets/image-cropper-1.0.0/js/cropper.min.js');    
}
if (!defined('UDRAW_IMAGE_CROPPER_CSS')) {
    define('UDRAW_IMAGE_CROPPER_CSS', UDRAW_PLUGIN_URL . 'assets/image-cropper-1.0.0/css/cropper.min.css');    
}

if (!defined('UDRAW_JQUERY_SMOOTHNESS_CSS')) {
    define('UDRAW_JQUERY_SMOOTHNESS_CSS', UDRAW_PLUGIN_URL . 'assets/jQuery-smoothness/jquery-ui.min.css');
}

if (!defined('UDRAW_PANZOOM_JS')) {
    define('UDRAW_PANZOOM_JS', UDRAW_PLUGIN_URL . 'assets/panzoom/jquery.panzoom.js');
}

if (!defined('UDRAW_CHECKLIST_JS')) {
    define('UDRAW_CHECKLIST_JS', UDRAW_PLUGIN_URL . 'assets/ui-checklist/ui.dropdownchecklist.js');
}

if (!defined('UDRAW_CONVERT_URL')) {
    define('UDRAW_CONVERT_URL', 'https://udraw-server.w2pstore.com/convert.php?');
    //define('UDRAW_CONVERT_URL', 'http://localhost:1111/convert.php?');
}


if (!defined('UDRAW_DRAW_SERVER_URL')) {
    if (substr(OPENSSL_VERSION_TEXT, 0, 10) === "OpenSSL 0.") {
        // OpenSSL version too old. Doesn't support TLSv1.1/1.2
        define('UDRAW_DRAW_SERVER_URL', 'http://draw.racadtech.com');
        define('UDRAW_API_1_SERVER_URL', 'http://udraw-api.goepower.com');
        define('UDRAW_API_2_SERVER_URL', 'http://udraw-api.w2pshop.com');
    } else {
        define('UDRAW_DRAW_SERVER_URL', 'https://draw.racadtech.com');
        define('UDRAW_API_1_SERVER_URL', 'https://udraw-api.goepower.com');
        define('UDRAW_API_2_SERVER_URL', 'https://udraw-api.w2pshop.com');        
    }
}

if (!defined('UDRAW_SYSTEM_WEB_PROTOCOL')) {
    if (isset($_SERVER['HTTPS']) &&  ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
        define('UDRAW_SYSTEM_WEB_PROTOCOL','https://');
    } else {
        define('UDRAW_SYSTEM_WEB_PROTOCOL','http://');
    }
}

if (!class_exists('uDraw')) {

    class uDraw {
        
        public $udraw_version = "2.7.3";
        
        public function __construct() { }
        
        public function init_udraw_plugin() {
            // Include Required Classes.
            require_once(dirname(__FILE__). '/classes/uDrawUtil.class.php');
            require_once(dirname(__FILE__). '/classes/uDrawAjaxBase.class.php');
            require_once(dirname(__FILE__). '/classes/GoPrint2.class.php');
            require_once(dirname(__FILE__). '/classes/GoEpower.class.php');            
            require_once(dirname(__FILE__). '/classes/uDrawSettings.class.php');        
            require_once(dirname(__FILE__). '/classes/uDrawTemplates.class.php');
            require_once(dirname(__FILE__). '/classes/uDrawUpload.class.php');
            require_once(dirname(__FILE__). '/classes/uDrawClipart.class.php');
            require_once(dirname(__FILE__). '/classes/uDrawCustomerDesigns.class.php');
            require_once(dirname(__FILE__). '/classes/uDrawConnect.class.php');
            require_once(dirname(__FILE__). '/classes/uDrawDesignHandler.class.php');
            //Translator
            require_once(dirname(__FILE__) . '/vendor/autoload.php');
            
            require_once(dirname(__FILE__). '/classes/tables/uDrawTemplatesTable.class.php');
            require_once(dirname(__FILE__). '/classes/tables/uDrawClipartTable.class.php');
            require_once(dirname(__FILE__). '/classes/tables/uDrawPublicTemplatesTable.class.php');
            
            require_once(dirname(__FILE__). '/pdf-xmpie/uDrawXmPieTemplatesTable.class.php');
            require_once(dirname(__FILE__). '/pdf-blocks/uDrawBlockTemplatesTable.class.php');            
            
            // Include Price Matrix
            require_once(dirname(__FILE__). '/price-matrix/uDrawPriceMatrix.class.php');            
            // init the Price Matrix Plugin.            
            $udrawPriceMatrix = new uDrawPriceMatrix();
            $udrawPriceMatrix->init();
            
            // Include PDF Blocks
            require_once(dirname(__FILE__). '/pdf-blocks/uDrawPDFBlocks.class.php');
            // init the PDF Block Plugin.
            $udrawPDFBlocks = new uDrawPDFBlocks();
            $udrawPDFBlocks->init();

            // Include XmPie Blocks
            require_once(dirname(__FILE__). '/pdf-xmpie/uDrawPDFXMPie.class.php');
            // init the XmPie Block Plugin.
            $udrawPDFXmPie = new uDrawPdfXMPie();
            $udrawPDFXmPie->init();
                       
            // init uDraw Connect
            $udrawConnect = new uDrawConnect();
            $udrawConnect->init();

            // init uDraw Templates Class
            $uDrawTemplates = new uDrawTemplates();
            $uDrawTemplates->init_actions();
            
            // init uDraw Clipart Class
            $uDrawClipart = new uDrawClipart();
            $uDrawClipart->init_actions();            
            
            // init uDraw CustomerDesigns Class
            $uDrawCustomerDesigns = new uDrawCustomerDesigns();
            $uDrawCustomerDesigns->init_actions();
            
            // init uDraw Design Handler Class
            $uDrawDesignHandler = new uDrawDesignHandler();
            $uDrawDesignHandler->init_actions();
            
            // init GoPrint2 Class
            $GoPrint2 = new GoPrint2();
            $GoPrint2->init();
            
            // init uDraw Upload Class
            $uDrawUpload = new uDrawUpload();
            $uDrawUpload->init();
            
            // init uDraw Bootstrap Mobile Skin
            require_once(dirname(__FILE__). '/designer/bootstrap-mobile/udraw-designer-mobile-ui.php');
                        
            // Wordpress Actions and Filters
            add_filter('post_class', array(&$this, 'add_udraw_class'));            

            // Wordpress Admin Actions and Filters
            add_action('plugins_loaded', array($this, 'udraw_plugins_loaded'));
            add_action('admin_init', array(&$this, 'admin_init'));
            add_action('admin_menu', array(&$this, 'admin_add_menu_pages'));
            add_action('wp_before_admin_bar_render', array(&$this, 'udraw_before_admin_bar_render' ));
            add_action('add_meta_boxes', array(&$this, 'udraw_add_meta_boxes'), 10, 2);            
            add_filter('plugin_row_meta', array(&$this, 'udraw_plugin_row_meta'), 10, 2);            
            add_filter('product_type_options', array(&$this, 'woo_udraw_add_proudct_type'));
            add_filter('woocommerce_hidden_order_itemmeta', array(&$this, 'woo_udraw_hide_order_itemmeta'), 99, 1);
            add_action('woocommerce_product_write_panel_tabs', array(&$this, 'woo_udraw_add_product_data_tab'));
            add_action('woocommerce_process_product_meta', array(&$this, 'woo_udraw_save_custom_fields'), 10, 2);
            add_action('woocommerce_admin_order_item_headers', array( &$this, 'woo_udraw_add_order_item_header' ) );
            add_action('woocommerce_admin_order_item_values', array( &$this, 'woo_udraw_admin_order_item_values' ), 10, 3 );
            add_action('woocommerce_checkout_update_order_meta', array( &$this, 'woo_udraw_checkout_update_order_meta'), 10, 1);
            add_action('woocommerce_admin_order_item_headers', array( &$this, 'woo_udraw_admin_order_item_headers') );
            add_action('woocommerce_order_status_processing', array(&$this, 'woo_udraw_order_status_processing'), 10, 1);
            add_action('woocommerce_email_before_order_table', array(&$this, 'woo_udraw_email_before_order_table'), 99, 4);
            add_action('admin_notices', array(&$this, 'check_folder_permissions'));
            
            // WooCommerce Frontend Action and Filters
            add_filter('woocommerce_loop_add_to_cart_link', array(&$this, 'woo_udraw_add_to_cart_cat_text'), 10, 2);
            add_filter('template_include', array(&$this, 'woo_udraw_use_custom_template'), 99);
            add_filter('woocommerce_add_cart_item', array(&$this, 'woo_udraw_add_cart_item'), 10);
            add_filter('woocommerce_get_cart_item_from_session', array(&$this, 'woo_udraw_get_cart_item_from_session'), 10, 2);
            add_filter('woocommerce_add_cart_item_data', array(&$this, 'woo_udraw_add_cart_item_data'), 10, 2);
            add_filter('woocommerce_get_item_data', array(&$this, 'woo_udraw_get_item_data'), 30, 2);
            add_filter('woocommerce_cart_item_product', array(&$this, 'woo_udraw_cart_item_product'), 10, 3);
            add_filter('woocommerce_cart_item_thumbnail', array(&$this, 'woo_udraw_cart_item_thumbnail'), 10, 3);
            add_filter('woocommerce_cart_item_name', array(&$this, 'woo_udraw_cart_item_name'), 10, 3);            
            add_filter('woocommerce_continue_shopping_redirect', array(&$this,'wc_custom_redirect_continue_shopping'), 10, 3);            
            add_action('woocommerce_before_single_product', array(&$this, 'woo_udraw_add_product_designer'), 15);            
            add_action('woocommerce_before_add_to_cart_button', array(&$this, 'woo_udraw_add_product_designer_form'));
            add_action('woocommerce_after_cart', array(&$this, 'woo_udraw_after_cart'));    
            add_action('woocommerce_add_to_cart', array(&$this, 'woo_udraw_add_to_cart'), 99, 6);
            add_action('woocommerce_order_details_after_order_table', array(&$this, 'woo_udraw_after_order_details'), 10, 1);
            add_action('woocommerce_order_item_quantity_html', array(&$this, 'woo_order_item_quantity_html'), 10, 2);
            
            // WooCommerce Frontend Order Details
            add_filter('woocommerce_order_item_name', array(&$this, 'woo_udraw_order_item_name'), 10, 2);
            add_filter('woocommerce_order_again_cart_item_data', array(&$this, 'woo_udraw_order_again_cart_item_data'), 10, 3);
            
            // WooCommerce Frontend Products Filter
            add_filter('woocommerce_product_is_visible', array(&$this, 'woo_udraw_product_is_visible'), 10, 2);
            add_filter('woocommerce_is_purchasable', array(&$this, 'woo_udraw_is_purchasable'), 10, 2);
            
            // Wordpress Footer Action
            add_action('wp_footer', array(&$this,'udraw_wp_footer'), 100);
            
            // Wordpress Menu Filter
            add_filter('wp_nav_menu_objects', array(&$this, 'udraw_wp_nav_menu_objects'), 10, 2);
            
            // uDraw Shortcodes
            add_shortcode( 'udraw_private_templates', array(&$this, 'shortcode_udraw_private_templates') );
            add_shortcode( 'udraw_customer_saved_designs', array(&$this, 'shortcode_udraw_customer_saved_designs') );
            add_shortcode( 'udraw_list_product_categories', array(&$this, 'shortcode_udraw_list_categories') );            
            
            // Dequeue conflicting scripts on certain pages.
            add_action( 'wp_print_scripts', array( &$this, 'udraw_dequeue_scripts'), 100 );
            
            //Localization & Languages
            add_action('init', array(&$this, 'load_plugin_textdomain'), 99);
            
            // Login
            add_action('wp_logout', array(&$this, 'udraw_session_end'), 99);
            add_action('wp_login', array(&$this, 'udraw_session_end'), 99);
            
        }
        
        public function load_plugin_textdomain() {
		    $locale = apply_filters( 'plugin_locale', get_locale(), 'udraw' );
		    $dir    = trailingslashit( WP_LANG_DIR );
            //		/**
            //		 * Admin Locale. Looks in:
            //		 *
            //		 * 		- WP_LANG_DIR/woocommerce/woocommerce-admin-LOCALE.mo
            //		 * 		- WP_LANG_DIR/plugins/woocommerce-admin-LOCALE.mo
            //		 */
		    if ( is_admin() ) {
			    load_textdomain( 'udraw', $dir . 'udraw/' . $locale . '.mo' );
			    load_textdomain( 'udraw', $dir . 'udraw/' . $locale . '.mo' );
		    }

		    /**
		     * Frontend/global Locale. Looks in:
		     *
		     * 		- WP_LANG_DIR/woocommerce/woocommerce-LOCALE.mo
		     * 	 	- woocommerce/i18n/languages/woocommerce-LOCALE.mo (which if not found falls back to:)
		     * 	 	- WP_LANG_DIR/plugins/woocommerce-LOCALE.mo
		     */
		    load_textdomain( 'udraw', $dir . 'udraw/' . $locale . '.mo' );
		    load_plugin_textdomain( 'udraw', false, plugin_basename( dirname( __FILE__ ) ) . "/languages" );  
            
            // start session if not already started.
            if (version_compare(phpversion(), '5.4.0', '<')) {
                 if(session_id() == '') {
                    session_start();
                 }
             } else {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
             }
	    }
        
        public function udraw_session_end() {
            session_destroy();
        }
        
        /**
         * Show row meta on the plugin screen.
         *
         * @param	mixed $links Plugin Row Meta
         * @param	mixed $file  Plugin Base file
         * @return	array
         */
        public function udraw_plugin_row_meta( $links, $file ) {            
            if ( strtolower($file) == 'udraw/udraw.php' ) {
                $row_meta = array(
                    'docs'    => '<a href="' . esc_url('https://racadtech.atlassian.net/wiki/display/UDDOC/uDraw+Documentation') . '" title="' . esc_attr( __( 'View uDraw Designer Documentation', 'uDraw' ) ) . '">' . __( 'Docs', 'uDraw' ) . '</a>',
                    'ticket' => '<a href="' . esc_url('https://racadtech.atlassian.net/servicedesk/customer/portal/5') . '" title="' . esc_attr( __( 'Submit a Support Ticket', 'woocommerce' ) ) . '">' . __( 'Submit a Ticket', 'uDraw' ) . '</a>',
                );
                if (!uDraw::is_udraw_okay()) {
                    array_push($row_meta,'<a style="color:red;" href="' . esc_url('https://draw.racadtech.com/payment/Pricing.aspx?param=uDraw-wp') . '" title="' . esc_attr( __( 'Upgrade to Premium Version Now!', 'woocommerce' ) ) . '">' . __( 'Premium Upgrade', 'uDraw' ) . '</a>');
                }

                return array_merge( $links, $row_meta );
            }            
            return (array) $links;
        }

        /*
        public function woo_udraw_pre_current_active_plugins() {
            global $wp_list_table;
            $myplugins = $wp_list_table->items;
            foreach ($myplugins as $key => $val) {
                if ($wp_list_table->items[$key]["Name"] == "uDraw - Racad Tech, Inc.") {
                    unset($wp_list_table->items[$key]);
                }
            }
        }*/          
        
        public function udraw_wp_footer() {                                                          
            ?>
	            <script type="text/javascript" src="<?php echo UDRAW_MAGNIFIC_POPUP_JS; ?>"></script>
	            <link rel="stylesheet" type="text/css" href="<?php echo UDRAW_MAGNIFIC_POPUP_CSS; ?>" media="screen" />
                <script>
                    jQuery(document).ready(function($) {
                        
                        // Hook popup on GoPrint2 Webclient.
                        jQuery("a[href*=webclient]").on('click', function (e) {
                            e.preventDefault();
                            var win = window.open(e.currentTarget.href, '_blank');
                            win.focus();
                            return false;                            
                        });
                    });
                </script>
            <?php
        }               

        /**
         * Add uDraw Product Class to the body
         */
        public function add_udraw_class($classes) {
            global $post;
            
            //$this->registerBootstrapJS();
            
            if (self::is_udraw_product($post->ID)) {
                $classes[] = 'udraw-product';
            }
            return $classes;
        }

        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//
        // ------------------- WooCommerce Admin Methods ------------------------ //
        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//

        /**
         * Plugins Loaded Hook
         */
        public function udraw_plugins_loaded() {
            global $woocommerce;
            if (version_compare( $woocommerce->version, '2.6.0', ">=" )) {
                add_action('woocommerce_product_data_panels', array(&$this, 'woo_udraw_add_product_data_panel'));
            } else {
                add_action('woocommerce_product_write_panels', array(&$this, 'woo_udraw_add_product_data_panel'));
            }
            if (version_compare( $woocommerce->version, '3.0.1', ">=" )) {
                add_action('woocommerce_add_order_item_meta', array(&$this, 'woo_udraw_add_order_item_meta'), 30, 2);
            } else {
                add_action('woocommerce_new_order_item', array(&$this, 'woo_udraw_add_order_item_meta'), 30, 2);
            }
            
            $udraw_db_version = '';
            if (is_multisite()) {
                $udraw_db_version = get_site_option( 'udraw_db_version' );
            } else {
                $udraw_db_version = get_option( 'udraw_db_version' );
            }
            
            if ($udraw_db_version != $this->udraw_version) {
                // Create table.
                global $wpdb, $charset_collate;
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

                // uDraw Templates Table
                $sql = "id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                                name TEXT COLLATE utf8_general_ci NOT NULL,
                                design LONGTEXT COLLATE utf8_general_ci NOT NULL,
                                preview TEXT COLLATE utf8_general_ci NULL,
                                pdf TEXT COLLATE utf8_general_ci NULL,
                                create_date DATETIME COLLATE utf8_general_ci NOT NULL,
                                create_user TEXT COLLATE utf8_general_ci NOT NULL,
                                modify_date DATETIME COLLATE utf8_general_ci NULL,
                                design_width TEXT COLLATE utf8_general_ci NULL,
                                design_height TEXT COLLATE utf8_general_ci NULL,
                                design_pages TEXT COLLATE utf8_general_ci NULL,
                                public_key VARCHAR(64) COLLATE utf8_general_ci NULL,
                                tags TEXT COLLATE utf8_general_ci NULL,
                                category TEXT COLLATE utf8_general_ci NULL,
                                PRIMARY KEY  (id)";
                $sql = "CREATE TABLE " . $wpdb->prefix . "udraw_templates ($sql) $charset_collate;";
                dbDelta($sql);
                
                // uDraw Customer Designs Table                
                $sql = "id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                        post_id BIGINT(20) NOT NULL,
                        customer_id BIGINT(20) NOT NULL,
                        preview_data LONGTEXT COLLATE utf8_general_ci NOT NULL,
                        design_data LONGTEXT COLLATE utf8_general_ci NOT NULL,
                        create_date DATETIME COLLATE utf8_general_ci NOT NULL,
                        modify_date DATETIME COLLATE utf8_general_ci NULL,
                        access_key VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
                        name VARCHAR(255) COLLATE utf8_general_ci NULL,
                        PRIMARY KEY  (id)";                
                $sql = "CREATE TABLE " . $wpdb->prefix . "udraw_customer_designs ($sql) $charset_collate;";                
                dbDelta($sql);
                
                // uDraw Clipart Table                
                $sql = "ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                        image_name LONGTEXT COLLATE utf8_general_ci NOT NULL,
                        user_uploaded VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
                        date DATETIME COLLATE utf8_general_ci NOT NULL,
                        tags LONGTEXT COLLATE utf8_general_ci NULL,
                        category LONGTEXT COLLATE utf8_general_ci NULL,
                        access_key VARCHAR(64) COLLATE utf8_general_ci NOT NULL,
                        PRIMARY KEY  (ID)";                
                $sql = "CREATE TABLE " . $wpdb->prefix . "udraw_clipart ($sql) $charset_collate;";                
                dbDelta($sql);
                
                // uDraw Clipart Category Table                
                $sql = "ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                        category_name LONGTEXT COLLATE utf8_general_ci NOT NULL,
                        parent_id BIGINT(20) NULL,
                        PRIMARY KEY  (ID)";                
                $sql = "CREATE TABLE " . $wpdb->prefix . "udraw_clipart_category ($sql) $charset_collate;";                
                dbDelta($sql);
                
                // uDraw Template Category Table                
                $sql = "ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                        category_name LONGTEXT COLLATE utf8_general_ci NOT NULL,
                        parent_id BIGINT(20) NULL,
                        PRIMARY KEY  (ID)";                
                $sql = "CREATE TABLE " . $wpdb->prefix . "udraw_templates_category ($sql) $charset_collate;";                
                dbDelta($sql);
                
                // uDraw Temporary DesignData Table                
                $sql = "ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                        designData LONGTEXT COLLATE utf8_general_ci NOT NULL,
                        data_key VARCHAR(64) COLLATE utf8_general_ci NOT NULL,
                        PRIMARY KEY  (ID)";                
                $sql = "CREATE TABLE " . $wpdb->prefix . "udraw_temporary_designdata ($sql) $charset_collate;";                
                dbDelta($sql);
                
                // update uDraw Price Matrix DB.
                $udrawPriceMatrix = new uDrawPriceMatrix();
                $udrawPriceMatrix->init_db();
            
                // Update option to set DB version to current version.
                if (is_multisite()) {
                    update_site_option( 'udraw_db_version', $this->udraw_version );
                } else {
                    update_option( 'udraw_db_version', $this->udraw_version );
                }
                
                
                $udraw_designer_role = add_role(
                    'udraw_designer',
                    __( 'uDraw Designer' ),
                    array(
                        'read' => true,
                        'edit_posts' => true,
                        'delete_posts' => false,
                        
                        'read_udraw_templates' => true,
                        'read_udraw_fonts' => true,
                        'read_udraw_global_templates' => true,
                        'read_udraw_block_templates' => true,
                        'read_udraw_price_matrix' => true,
                        'read_udraw_clipart_upload' => true,
                                                
                        'edit_udraw_templates' => true,
                        'edit_udraw_fonts' => true,
                        'edit_udraw_global_templates' => false,
                        'edit_udraw_block_templates' => false,
                        'edit_udraw_settings' => false,
                        'edit_udraw_price_matrix' => false,
                        'edit_udraw_clipart_upload' => false,
                        
                        'delete_udraw_templates' => false,
                        'delete_udraw_fonts' => false,
                        'delete_udraw_price_matrix' => false,
                        'delete_udraw_clipart_upload' => false
                    )
                );
                if (null === $udraw_designer_role) {
                    // Role exists, we'll update capabilities.
                    $udraw_designer_role = get_role('udraw_designer');
                    
                    $udraw_designer_role->add_cap('read_udraw_templates');
                    $udraw_designer_role->add_cap('read_udraw_fonts');
                    $udraw_designer_role->add_cap('read_udraw_global_templates');
                    $udraw_designer_role->add_cap('read_udraw_block_templates');
                    $udraw_designer_role->add_cap('read_udraw_price_matrix');
                    $udraw_designer_role->add_cap('read_udraw_clipart_upload');
                    
                    $udraw_designer_role->add_cap('edit_udraw_templates');
                    $udraw_designer_role->add_cap('edit_udraw_fonts');                
                    $udraw_designer_role->remove_cap('edit_udraw_global_templates');
                    $udraw_designer_role->remove_cap('edit_udraw_block_templates');
                    $udraw_designer_role->remove_cap('edit_udraw_settings');
                    $udraw_designer_role->remove_cap('edit_udraw_price_matrix');
                    $udraw_designer_role->remove_cap('edit_udraw_clipart_upload');
                    
                    
                    $udraw_designer_role->remove_cap('delete_udraw_templates');
                    $udraw_designer_role->remove_cap('delete_udraw_fonts');
                    $udraw_designer_role->remove_cap('delete_udraw_price_matrix');
                    $udraw_designer_role->remove_cap('delete_udraw_clipart_upload');
                }
                
                
                $udraw_manager_role = add_role(
                    'udraw_manager',
                    __( 'uDraw Manager' ),
                    array (
                        'read' => true,
                        'edit_posts' => true,
                        'delete_posts' => false,
                        
                        'read_udraw_templates' => true,
                        'read_udraw_fonts' => true,
                        'read_udraw_block_templates' => true,
                        'read_udraw_global_templates' => true,
                        'read_udraw_price_matrix' => true,
                        'read_udraw_clipart_upload' => true,
                        
                        'edit_udraw_templates' => true,
                        'edit_udraw_fonts' => true,
                        'edit_udraw_block_templates' => true,
                        'edit_udraw_global_templates' => true,
                        'edit_udraw_settings' => true,
                        'edit_udraw_price_matrix' => true,
                        'edit_udraw_clipart_upload' => true,
                        
                        'delete_udraw_templates' => true,
                        'delete_udraw_fonts' => true,
                        'delete_udraw_price_matrix' => true,
                        'delete_udraw_clipart_upload' => true
                    )
                );
                if (null === $udraw_manager_role) {
                    // Role exists, we'll update capabilities.
                    $udraw_manager_role = get_role('udraw_manager');
                    
                    $udraw_manager_role->add_cap('read_udraw_templates');
                    $udraw_manager_role->add_cap('read_udraw_fonts');
                    $udraw_manager_role->add_cap('read_udraw_global_templates');
                    $udraw_manager_role->add_cap('read_udraw_block_templates');
                    $udraw_manager_role->add_cap('read_udraw_price_matrix');
                    $udraw_manager_role->add_cap('read_udraw_clipart_upload');
                                        
                    $udraw_manager_role->add_cap('edit_udraw_templates');
                    $udraw_manager_role->add_cap('edit_udraw_fonts');
                    $udraw_manager_role->add_cap('edit_udraw_global_templates');
                    $udraw_manager_role->add_cap('edit_udraw_block_templates');
                    $udraw_manager_role->add_cap('edit_udraw_settings');
                    $udraw_manager_role->add_cap('edit_udraw_price_matrix');
                    $udraw_manager_role->add_cap('edit_udraw_clipart_upload');
                    
                    $udraw_manager_role->add_cap('delete_udraw_templates');
                    $udraw_manager_role->add_cap('delete_udraw_fonts');                    
                    $udraw_manager_role->add_cap('delete_udraw_price_matrix');                    
                    $udraw_manager_role->add_cap('delete_udraw_clipart_upload');
                }                
                
                $shop_manager_role = get_role('shop_manager');
                if (null != $shop_manager_role) {
                    $shop_manager_role->add_cap('read_udraw_templates');
                    $shop_manager_role->add_cap('read_udraw_fonts');
                    $shop_manager_role->add_cap('read_udraw_global_templates');
                    $shop_manager_role->add_cap('read_udraw_block_templates');
                    $shop_manager_role->add_cap('read_udraw_price_matrix');
                    $shop_manager_role->add_cap('read_udraw_clipart_upload');
                                        
                    $shop_manager_role->add_cap('edit_udraw_templates');
                    $shop_manager_role->add_cap('edit_udraw_fonts');
                    $shop_manager_role->add_cap('edit_udraw_global_templates');
                    $shop_manager_role->add_cap('edit_udraw_block_templates');
                    $shop_manager_role->add_cap('edit_udraw_settings');
                    $shop_manager_role->add_cap('edit_udraw_price_matrix');
                    $shop_manager_role->add_cap('edit_udraw_clipart_upload');
                    
                    $shop_manager_role->add_cap('delete_udraw_templates');
                    $shop_manager_role->add_cap('delete_udraw_fonts');                    
                    $shop_manager_role->add_cap('delete_udraw_price_matrix');                    
                    $shop_manager_role->add_cap('delete_udraw_clipart_upload');                  
                }
                
                $admin_role = get_role('administrator');
                if (null != $admin_role) 
                {
                    $admin_role->add_cap('read_udraw_templates');
                    $admin_role->add_cap('read_udraw_fonts');
                    $admin_role->add_cap('read_udraw_global_templates');
                    $admin_role->add_cap('read_udraw_block_templates');
                    $admin_role->add_cap('read_udraw_price_matrix');
                    $admin_role->add_cap('read_udraw_clipart_upload');
                                        
                    $admin_role->add_cap('edit_udraw_templates');
                    $admin_role->add_cap('edit_udraw_fonts');
                    $admin_role->add_cap('edit_udraw_global_templates');
                    $admin_role->add_cap('edit_udraw_block_templates');
                    $admin_role->add_cap('edit_udraw_settings');
                    $admin_role->add_cap('edit_udraw_price_matrix');
                    $admin_role->add_cap('edit_udraw_clipart_upload');
                    
                    $admin_role->add_cap('delete_udraw_templates');
                    $admin_role->add_cap('delete_udraw_fonts');                    
                    $admin_role->add_cap('delete_udraw_price_matrix');                    
                    $admin_role->add_cap('delete_udraw_clipart_upload');                    
                }
                
                $uDrawSettings = new uDrawSettings();
                $uDrawSettings->__logAccess();
                
                $uDrawUtil = new uDrawUtil();
                
                // Setup uDraw folders and init them if needed.
                if (!file_exists(UDRAW_ORDERS_DIR)) {
                    wp_mkdir_p(UDRAW_ORDERS_DIR);
                }
                
                if (!file_exists(UDRAW_STORAGE_DIR)) {
                    wp_mkdir_p(UDRAW_STORAGE_DIR);
                }
                
                $installFonts = false;
                if (!file_exists(UDRAW_FONTS_DIR)) {
                    wp_mkdir_p(UDRAW_FONTS_DIR);
                    $installFonts = true;
                }
                if (!file_exists(UDRAW_LANGUAGES_DIR)) {
                    wp_mkdir_p(UDRAW_LANGUAGES_DIR);
                }
                if ($uDrawUtil->is_dir_empty(UDRAW_FONTS_DIR)) { 
                    $installFonts = true;
                }
                
                if ($installFonts) {
                    // unzip default fonts ( init )
                    $uDrawConnect = new uDrawConnect();
                    $defaultFontsZip = UDRAW_PLUGIN_DIR . '/default-fonts.zip';
                    $uDrawConnect->__downloadFile('https://draw.racadtech.com/default-fonts.zip', $defaultFontsZip);
                    if (file_exists($defaultFontsZip)) {
                        $zip = new ZipArchive;
                        $res = $zip->open($defaultFontsZip);
                        if ($res === TRUE) {
                            // extract it to the path we determined above
                            $zip->extractTo(UDRAW_FONTS_DIR);
                            $zip->close();
                        }
                        unlink($defaultFontsZip);
                    }
                }
                
                if (!file_exists(UDRAW_CLIPART_DIR)) {
                    wp_mkdir_p(UDRAW_CLIPART_DIR);
                }                
                
                if (!file_exists(UDRAW_TEMP_UPLOAD_DIR)) {
                    wp_mkdir_p(UDRAW_TEMP_UPLOAD_DIR);
                }
            
                //Run this function to do trigger clipart cleanup
                $this->trigger_clean_clipart();
                
                // Finally redirect to uDraw about page.
                //wp_redirect( "admin.php?page=about_udraw" );
                //exit;
            }
        }
        
        /**
         * uDraw Admin Init Hook.
         */
        public function admin_init() {
            // Register and Enqueue Admin Script.
            wp_register_script('udraw_admin_js', plugins_url('assets/includes/uDrawAdmin.js', __FILE__));
            wp_enqueue_script('udraw_admin_js');
        }

        public function udraw_add_meta_boxes($post_type, $post) {
            if ($post_type == "product") {
                if (isset($_GET['udraw_template_id']) && isset($_GET['udraw_action'])) {
                    if ($_GET['udraw_action'] == "new-product") {
                        $this->replace_all_product_images($_GET['udraw_template_id'], $post->ID);                        
                    } else if ($_GET['udraw_action'] == "new-block-product") {
                        $this->replace_block_product_image($_GET['udraw_template_id'], $post->ID);
                    }else if ($_GET['udraw_action'] == "new-xmpie-product") {
                        $this->replace_xmpie_product_image($_GET['udraw_template_id'], $post->ID);
                    }
                }
            }
        }
        
        /**
         * Add uDraw Admin Navigation.
         */
        public function admin_add_menu_pages() {
            $udrawSettings = new uDrawSettings();
            $_udraw_settings = $udrawSettings->get_settings();
            add_menu_page('uDraw Suite', 'W2P: uDraw', 'read_udraw_templates', 'udraw', array(&$this, 'uDraw_manage_templates_page'), 'dashicons-format-image', 59.5);
            add_submenu_page('udraw', __('View Templates', 'udraw'), __('View Templates', 'udraw'), 'read_udraw_templates', 'udraw', array(&$this, 'uDraw_manage_templates_page'));
            
            if ($this->is_udraw_okay() || count($this->get_udraw_templates()) < 2) {
                add_submenu_page('udraw', __('Add Template', 'udraw'), __('Add Template', 'udraw'), 'edit_udraw_templates', 'udraw_add_template', array(&$this, 'uDraw_designer_admin_page'));          
            }
            
            if (uDraw::is_udraw_okay()) {
                add_submenu_page('udraw', __('Global Templates', 'udraw'), __('Global Templates', 'udraw'), 'read_udraw_global_templates', 'udraw_global_template', array(&$this, 'uDraw_manage_global_templates_page'));
            }

            if ( strlen($_udraw_settings['goepower_api_key']) > 1 && strlen($_udraw_settings['goepower_producer_id']) > 0 &&
             strlen($_udraw_settings['goepower_company_id']) > 0) {            
                add_submenu_page('udraw', __('PDF Templates', 'udraw'), __('PDF Templates', 'udraw'), 'read_udraw_block_templates', 'udraw_block_template', array(&$this, 'uDraw_manage_block_templates_page'));
            }
            if ( strlen($_udraw_settings['goepower_api_key']) > 1 && strlen($_udraw_settings['goepower_producer_id']) > 0 &&
             strlen($_udraw_settings['goepower_company_id']) > 0) {            
                add_submenu_page('udraw', __('XMPie Templates', 'udraw'), __('XMPie Templates', 'udraw'), 'read_udraw_block_templates', 'udraw_xmpie_template', array(&$this, 'uDraw_manage_xmpie_templates_page'));
            }
            
            add_submenu_page('udraw', __('Manage Fonts', 'udraw'), __('Manage Fonts', 'udraw'), 'read_udraw_fonts', 'udraw_manage_fonts', array(&$this, 'uDraw_manage_fonts')); 
            
            if ($_udraw_settings['designer_enable_local_clipart']) {
                add_submenu_page('udraw', __('Manage Clipart', 'udraw'), __('Manage Clipart', 'udraw'), 'read_udraw_clipart_upload', 'upload_clipart_collection', array(&$this, 'uDraw_upload_clipart_page'));
            }
            
            add_submenu_page('udraw', __('Settings', 'udraw'), __('Settings', 'udraw'), 'edit_udraw_settings', 'edit_udraw_settings', array(&$this, 'uDraw_settings_page'));
            
            add_submenu_page('udraw', __('About', 'udraw'), __('About', 'udraw'), 'read_udraw_templates', 'about_udraw', array(&$this, 'uDraw_about_page'));
            
            // Hidden pages.
            add_submenu_page(null, __('Modify Template','udraw'), __('Modify Template','udraw'), 'edit_udraw_templates', 'udraw_modify_template', array(&$this, 'uDraw_designer_admin_page'));
            
        }
        
        public function udraw_before_admin_bar_render() {
            global $wp_admin_bar, $post, $product;            
            if (is_single() && !is_admin() && is_product()) {
                $templateId = $this->get_udraw_template_ids($post->ID);
                if (count($templateId) > 0) {
                    if (is_user_logged_in()) {
                        if (current_user_can('edit_udraw_templates')) {
                            $wp_admin_bar->add_node(array(
                                'id'    => 'udraw-edit-template',
                                'title' => 'Edit uDraw Template',
                                'href'  => admin_url() . 'admin.php?page=udraw_modify_template&template_id='. $templateId[0],
                                'meta' => array ( 'class' => 'ab-item' )
                            ));
                        }
                    }                    
                }
            }
        }

        public function uDraw_about_page() {
            require_once("templates/admin/uDraw-about.php");
        }
        
        public function uDraw_manage_templates_page() {
            $this->registerJQueryTagsInput();
            $this->registerFontAwesome();
            $this->registerSelect2JS();
            wp_register_script('udraw_base64_js', plugins_url('assets/Base64.js', __FILE__));
            wp_enqueue_script('udraw_base64_js');
            require_once("templates/admin/uDraw-manage-templates.php");
        }
        
        public function uDraw_manage_global_templates_page() {
            require_once("templates/admin/uDraw-manage-global-templates.php");            
        } 
        
        public function uDraw_manage_block_templates_page() {
            require_once("pdf-blocks/templates/admin/uDraw-manage-block-templates.php");            
        }        
        public function uDraw_manage_xmpie_templates_page() {
            require_once("pdf-xmpie/templates/admin/uDraw-manage-xmpie-templates.php");
        }

        public function uDraw_designer_admin_page() {
            $udrawSettings = new uDrawSettings();
            $_udraw_settings = $udrawSettings->get_settings();
            
            $this->register_jquery_css();
            $this->registerBootstrapJS();
            $this->registerStyles();
            $this->register_designer_min_js();
            if ($_udraw_settings['udraw_designer_enable_threed']) {
                $this->register_designer_threed_min_js();
            }
            $this->registerDesignerDefaultStyles();
            $this->registerScripts();

            // Load up Designer
            require_once("designer/designer-admin.php");
        }
        
        public function uDraw_settings_page() {
            $this->register_jquery_ui();
            $this->registerChosenJS();
            $this->registerAceJS();
            $this->registerStyles();
            $this->registerChecklistUI();
            wp_register_script('languageList_js', plugins_url('assets/languageList.js', __FILE__));
            wp_enqueue_script('languageList_js');
            
            require_once("templates/admin/uDraw-settings.php");
        }
        
        public function uDraw_upload_clipart_page() {
            $udrawSettings = new uDrawSettings();
            $_udraw_settings = $udrawSettings->get_settings();
            $this->registerjQueryFileUpload();
            $this->registerJQueryTagsInput();
            $this->registerFontAwesome();
            $this->registerSelect2JS();            
            require_once('templates/admin/uDraw-upload-clipart.php');
        }
        
        public function uDraw_manage_fonts() {
            $udrawSettings = new uDrawSettings();
            $_udraw_settings = $udrawSettings->get_settings();
            $this->registerStyles();
            $this->registerScripts();
            $this->registerjQueryFileUpload();
            require_once("templates/admin/uDraw-manage-fonts.php");
        }

        /**
         * Add uDraw check box on Product page as a product type.
         */
        public function woo_udraw_add_proudct_type($types) {
            $types['udraw_proudct'] = array(
                'id' => '_udraw_product',
                'wrapper_class' => 'show_if_udraw_product hide_if_grouped',
                'label' => __('uDraw Product', 'udraw'),
                'description' => __('Select if you want to designate this product as a uDraw product.', 'udraw')
            );

            return $types;
        }

        /**
         * This will add the uDraw tab in the products page, but it will only show if checked via Javascript in the method 'woo_udraw_add_product_data_panel()'.
         */
        public function woo_udraw_add_product_data_tab() {
            ?>
            <li class="udraw_product_tab hide_if_udraw_product udraw_product_options"><a href="#udraw_product_data"><?php _e('uDraw Product', 'udraw'); ?></a></li>
            <?php
        }
        
        public function woo_udraw_admin_order_item_headers() {
            if (isset($_GET['udraw_rebuild_pdf']) && isset($_GET['post']) ) {
                if ($_GET['udraw_rebuild_pdf'] == "true") {
                    ?>            
                    <div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Request to regenerate production PDF was sent. &nbsp;&nbsp; This page will be redirected automatically in <span id="timespan">30 seconds</span>. </strong></p></div>
                    <script>

                        var udraw_rebuild_order_id = '<?php echo $_GET['post']; ?>';
                        jQuery.getJSON(ajaxurl + '?action=udraw_designer_rebuild_order_pdf&order_id=' + udraw_rebuild_order_id,
                            function (data) {
                                setTimeout(function () {
                                    window.location.replace('<?php echo remove_query_arg('udraw_rebuild_pdf'); ?>');
                                }, 30000);

                                timeout_countdown(30);
                            }
                        );

                        function timeout_countdown(time) {
                            if (time > 0) {
                                setTimeout(function(){
                                    var secondText = ((time - 1) > 1 ) ? 'seconds' : 'second';
                                    jQuery('#timespan').html((time - 1) + ' ' + secondText);
                                    timeout_countdown(time - 1);
                                }, 1000);
                            }
                        }                        
                    </script>
                    <?php
                }
            }
        }
        
        public function woo_udraw_email_before_order_table($order, $sent_to_admin, $plain_text, $email ) {
            global $woocommerce;
            if ( uDraw::is_udraw_okay() && $sent_to_admin ) {
                $items = $order->get_items();
                $item_keys = array_keys($items);
                for ($x = 0; $x < count($item_keys); $x++) {
                    $product_type = "";
                    if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                        $udraw_data = $items[$item_keys[$x]]['udraw_data'];
                    } else {
                        $udraw_data = unserialize($items[$item_keys[$x]]['udraw_data']);
                    }
                    // uDraw designer.
                    if (isset($udraw_data['udraw_product_data']) && strlen($udraw_data['udraw_product_data']) > 0) {
                        $product_type = 'designer';
                        if (isset($udraw_data['udraw_options_uploaded_excel']) && strlen($udraw_data['udraw_options_uploaded_excel']) > 0) {
                            // uDraw Excel Uploads not supported.
                            $product_type = '';
                        }
                    }
                    
                    // Price Matrix.
                    if (isset($udraw_data['udraw_price_matrix_design_data']) && strlen($udraw_data['udraw_price_matrix_design_data']) > 0) {
                        $product_type = 'designer';
                    }
                    
                    // PDF product.
                    if (isset($udraw_data['udraw_pdf_block_product_id']) && strlen($udraw_data['udraw_pdf_block_product_id']) > 0) {
                        $product_type = 'blocks';
                    }
                    
                    // XMPie product.
                    if (isset($udraw_data['udraw_pdf_xmpie_product_id']) && strlen($udraw_data['udraw_pdf_xmpie_product_id']) > 0) {
                        $product_type = 'xmpie';
                    }

                    $order_id = trim(str_replace('#', '', $order->get_order_number()));
                    $pdf_download_link = "uDraw-Order-" . $order_id . "-" . $item_keys[$x] . ".pdf";
                    echo '<br /><strong>'. $items[$item_keys[$x]]["name"] . '</strong> : <a href="' . UDRAW_ORDERS_URL . $pdf_download_link . '">Download PDF</a>';
                }
                
            }
        }

        /**
         * WooCommerce Product Panel for uDraw Products.
         * 
         * @global type $wpdb
         * @global type $post
         */
        public function woo_udraw_add_product_data_panel() {            
            global $wpdb, $post;            
            
            $udrawSettings = new uDrawSettings();
            $_udraw_settings = $udrawSettings->get_settings();   
            $_activation_key = uDraw::get_udraw_activation_key();
            
            $udraw_public_key = "";
            // this is a new product. we'll check to see if user wants to link from template.
            if (isset($_GET['udraw_template_id']) && isset($_GET['udraw_action'])) {
                if ($_GET['udraw_action'] == "new-product") {
                    $templateId = $_GET['udraw_template_id'];                    
                    $udrawTemplate = $this->get_udraw_templates($templateId);
                    if (strlen($udrawTemplate[0]->public_key) > 1) {
                        $udraw_public_key = $udrawTemplate[0]->public_key;
                    }
                }
            } else {
                $udraw_public_key = get_post_meta($post->ID, '_udraw_public_key', true);
            }            
            echo "<input type=\"hidden\" name=\"udraw_public_key\" value=\"". $udraw_public_key . "\" />";
            ?>


            <div id="udraw_product_data" class="panel woocommerce_options_panel">				
                <div class="options_group" id="udraw_template_id_form_group">
                    <p class="form-field">
                        <label for="udraw_template_id"><?php _e('Select uDraw Template', 'udraw'); ?></label>
                        <select id="udraw_template_id" name="udraw_template_id[]" multiple="multiple" data-placeholder="<?php _e('Select uDraw Template&hellip;', 'udraw'); ?>">
                            <?php
                            $templates = $this->get_udraw_templates();
                            $templateId = $this->get_udraw_template_ids($post->ID);
                            if (count($templateId) == 0) {
                                // this is a new product. we'll check to see if user wants to link from template.
                                if (isset($_GET['udraw_template_id']) && isset($_GET['udraw_action'])) {
                                    if ($_GET['udraw_action'] == "new-product") {
                                        $templateId = array();
                                        array_push($templateId, $_GET['udraw_template_id']); // pre-select template if linking as new product.
                                    }
                                }
                            }
                            foreach($templates as $template) {
                                $found_template_id = false;
                                
                                foreach ($templateId as $_template_id) {
                                    if ($_template_id == $template->id) {
                                        $found_template_id = true;                                         
                                        break;
                                    }
                                }
                                if ($found_template_id) {                                        
                                    echo '<option value="' . esc_attr($template->id) . '" selected>' . esc_html($template->name . ' - ' . $template->design_width . '" x '. $template->design_height .'"') . '</option>';
                                } else {
                                    echo '<option value="' . esc_attr($template->id) . '">' . esc_html($template->name . ' - ' . $template->design_width . '" x '. $template->design_height .'"'). '</option>';
                                }
                            }
                            
                            ?>						                        
                        </select>
                        <img class="help_tip" data-tip='<?php _e('Link an existing template. Templates can be created from the uDraw->Add Template section.', 'udraw') ?>' src="<?php echo WC()->plugin_url(); ?>/assets/images/help.png" height="16" width="16" />									
                    </p>
                    <p class="form-field">
                        <div id="udraw_template_preview">
                        </div>
                    </p>
                    <p class="form-field" id="udraw_allow_customer_download_form_group">
                        <label for="udraw_allow_customer_download_design">Allow Save/Download</label>
                        <?php
                            $allowCustomerDownloadDesign = get_post_meta($post->ID, '_udraw_allow_customer_download_design', true);
                        ?>                        
                        <input type="checkbox" class="checkbox" name="udraw_allow_customer_download_design" id="udraw_allow_customer_download_design" value="yes" <?php if ($allowCustomerDownloadDesign == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">This will allow the customer to download the design as a PDF while they are designing the artwork.</span>
                    </p>
                    <p class="form-field" id="udraw_allow_structure_file_group">
                        <label for="udraw_allow_structure_file">Allow Structure File Download/Upload</label>
                        <?php
                            $allowStructureFile = get_post_meta($post->ID, '_udraw_allow_structure_file', true);
                        ?>                        
                        <input type="checkbox" class="checkbox" name="udraw_allow_structure_file" id="udraw_allow_structure_file" value="yes" <?php if ($allowStructureFile == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">This will allow the customer to upload an excel file to automatically fill in labelled objects (If there are labelled objects in the template).</span>
                    </p>
                    <?php
                        $designerSkinOverride = get_post_meta($post->ID, '_udraw_designer_skin_override', true);
                        $designerSkin = get_post_meta($post->ID, '_udraw_designer_skin', true);
                        $display = 'display: none;';
                        if ($designerSkinOverride) {
                            $display = '';
                        }
                    ?>  
                    <p class="form-field" id="udraw_designer_skin_override_form_group">
                        <label for="udraw_designer_skin_override">Override Designer Skin</label>                      
                        <input type="checkbox" class="checkbox" name="udraw_designer_skin_override" id="udraw_designer_skin_override" value="yes" <?php if ($designerSkinOverride == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">This will allow the product to use a skin different from the one set in uDraw Settings.</span>
                    </p>
                    <p class="form-field" id="udraw_designer_skin_form_group" style="<?php echo $display; ?>">;
                        <label for="udraw_designer_skin">uDraw Designer Skin</label>
                        <select id="udraw_designer_skin" name="udraw_designer_skin" data-placeholder="<?php _e('Select Designer Skin', 'udraw'); ?>">
                            <?php
                                $skins = array (
                                    'fullscreen' => 'Fullscreen',
                                    'modern' => 'Modern'
                                );

                                if (uDraw::is_udraw_apparel_installed()) {
                                    $skins['apparel'] = 'Apparel';
                                }

                                $skins = apply_filters('udraw_designer_register_skin', $skins);

                                foreach ( $skins as $value => $name ) {
                                    $selected = "";
                                    if ($designerSkin == $value) {
                                        $selected = "selected";
                                    }
                                    echo "<option class=\"level-0\" value=\"" . $value . "\" ". $selected .">". $name ."</option>";
                                }    
                            ?>
                        </select>
                    </p>
                </div>
               
                <?php
                if ( strlen($_udraw_settings['goepower_api_key']) > 1 && strlen($_udraw_settings['goepower_producer_id']) > 0 ) {
                ?>

                <div class="options_group" id="udraw_pdf_template_id_form_group">
                    <p class="form-field">
                        <label for="udraw_block_template_id"><?php _e('Select PDF Template', 'udraw'); ?></label>
                        <select id="udraw_block_template_id" name="udraw_block_template_id[]" multiple="multiple" data-placeholder="<?php _e('Select PDF Template&hellip;', 'udraw'); ?>" >
                            <?php
                            $uDrawPDFBlocks = new uDrawPDFBlocks();
                            $block_templates = $uDrawPDFBlocks->get_company_products();
                            $block_template_id = get_post_meta($post->ID, '_udraw_block_template_id', true);
                            
                            // Convert String ( old type ) to Array ( new type )
                            if (gettype($block_template_id) == 'string') {
                                $block_template_id = explode("HuhWhatOkay", get_post_meta($post->ID, '_udraw_block_template_id', true));
                            }
                            
                            
                            
                            if (count($block_template_id) == 0 || count($block_template_id) == 1) {
                                if (count($block_template_id) == 1) {
                                    if (strlen($block_template_id[0]) == 0) {
                                        // New product, so we'll assign block template based on request params.
                                        if (isset($_GET['udraw_template_id']) && isset($_GET['udraw_action'])) {
                                            if ($_GET['udraw_action'] == "new-block-product") {
                                                $block_template_id = array();
                                                array_push($block_template_id, $_GET['udraw_template_id']); // pre-select template if linking as new product.
                                            }
                                        }
                                    }
                                }
                            }
                            
                            foreach($block_templates as $block_template) {
                                $found_block_template_id = false;
                                if (gettype($block_template_id) == 'array') {
                                    foreach ($block_template_id as $_block_template_id) {   
                                        if ($_block_template_id == $block_template['ProductID'] || $_block_template_id == $block_template['UniqueID']) {
                                            $found_block_template_id = true;                                         
                                        }
                                    }
                                }
                                        
                                if ($found_block_template_id) {                                        
                                    echo '<option value="' . esc_attr($block_template['UniqueID']) . '" selected>' . esc_html($block_template['ProductName']) . '</option>';
                                } else {
                                    echo '<option value="' . esc_attr($block_template['UniqueID']) . '">' . esc_html($block_template['ProductName']). '</option>';
                                }
                                
                            }
                            
                            ?>
                        </select>
                        <img class="help_tip" data-tip='<?php _e('Link an existing template. Templates can be created from the uDraw->Add Template section.', 'udraw') ?>' src="<?php echo WC()->plugin_url(); ?>/assets/images/help.png" height="16" width="16" />									
                    </p>
                    <p class="form-field">
                        <div id="udraw_block_template_preview">
                        </div>
                    </p>
                    <p class="form-field" id="udraw_pdf_allow_print_save_form">
                        <label for="udraw_pdf_allow_print_save">Allow Saving/Printing of PDF Preview?</label>
                        <?php
                            $allowPDFPrintSave = get_post_meta($post->ID, '_udraw_pdf_allow_print_save', true);
                        ?>                        
                        <input type="checkbox" class="checkbox" name="udraw_pdf_allow_print_save" id="udraw_pdf_allow_print_save" value="yes" <?php if ($allowPDFPrintSave == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">This will allow customer to save or print the PDF preview from within the PDF Viewer.</span>
                    </p>
                </div>

                 <div class="options_group" id="udraw_xmpie_template_id_form_group">
                    <p class="form-field">
                        <label for="udraw_xmpie_template_id"><?php _e('Select XmPie Template', 'udraw'); ?></label>
                        <select id="udraw_xmpie_template_id" name="udraw_xmpie_template_id[]" multiple="multiple" data-placeholder="<?php _e('Select XmPie Template&hellip;', 'udraw'); ?>" >
                            <?php
                            $uDrawPDFXmPie = new uDrawPdfXMPie();
                            $xmpie_templates = $uDrawPDFXmPie->get_company_products();
                            $xmpie_template_id = get_post_meta($post->ID, '_udraw_xmpie_template_id', true);
                            $xmpie_template_id_length = (gettype($xmpie_template_id) == 'array') ? count($xmpie_template_id) : ((gettype($xmpie_template_id) == 'string') ? strlen($xmpie_template_id) : NULL);
                            if ($xmpie_template_id_length == 0) {
                                // New product, so we'll assign block template based on request params.
                                if (isset($_GET['udraw_template_id']) && isset($_GET['udraw_action'])) {
                                    if ($_GET['udraw_action'] == "new-xmpie-product") {
                                        $xmpie_template_id = array();
                                        array_push($xmpie_template_id, $_GET['udraw_template_id']); // pre-select template if linking as new product.
                                    }
                                }
                            }
                            
                            
                            foreach($xmpie_templates as $xmpie_template) {
                                $found_xmpie_template_id = false; 
                                if (gettype($xmpie_template_id) == "array") {
                                    foreach ($xmpie_template_id as $_xmpie_template_id) {   
                                        if ($_xmpie_template_id == $xmpie_template['ProductID']) {
                                            $found_xmpie_template_id = true;                                         
                                        }
                                    }
                                }
                                        
                                if ($found_xmpie_template_id) {                                        
                                    echo '<option value="' . esc_attr($xmpie_template['ProductID']) . '" selected>' . esc_html($xmpie_template['ProductName']) . '</option>';
                                } else {
                                    echo '<option value="' . esc_attr($xmpie_template['ProductID']) . '">' . esc_html($xmpie_template['ProductName']). '</option>';
                                }
                                
                            }
                            
                            ?>
                        </select>
                        <img class="help_tip" data-tip='<?php _e('Link an existing template. Templates can be created from the uDraw->Add Template section.', 'udraw') ?>' src="<?php echo WC()->plugin_url(); ?>/assets/images/help.png" height="16" width="16" />									
                    </p>
                    <div id="udraw_xmpie_template_preview"></div>
                    <p class="form-field" id="udraw_pdf_xmpie_allow_print_save_form">
                        <label for="udraw_pdf_xmpie_allow_print_save">Allow Saving/Printing of PDF Preview?</label>
                        <?php
                            $allowPDFXmPiePrintSave = get_post_meta($post->ID, '_udraw_pdf_xmpie_allow_print_save', true);
                        ?>                        
                        <input type="checkbox" class="checkbox" name="_udraw_pdf_xmpie_allow_print_save" id="udraw_pdf_xmpie_allow_print_save" value="yes" <?php if ($allowPDFXmPiePrintSave == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">This will allow customer to save or print the PDF preview from within the PDF Viewer.</span>
                    </p>
                    <p class="form-field" id="udraw_pdf_xmpie_use_colour_palette_form">
                        <label for="udraw_pdf_xmpie_use_colour_palette">Use colour palette</label>
                        <?php
                            $udraw_pdf_xmpie_use_colour_palette = get_post_meta($post->ID, '_udraw_pdf_xmpie_use_colour_palette', true);
                        ?>                        
                        <input type="checkbox" class="checkbox" name="udraw_pdf_xmpie_use_colour_palette" id="udraw_pdf_xmpie_use_colour_palette" value="yes" <?php if ($udraw_pdf_xmpie_use_colour_palette == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">This will restrict customers to select colours from a defined palette instead of a spectrum.</span>
                    </p>
                </div>

                <?php } ?>                
                
                <div class="options_group">
                    <p class="form-field">
                        <label for="udraw_display_options_page_first">Show Options First</label>
                        <?php
                            $displayOptionsPageFirst = get_post_meta($post->ID, '_udraw_display_options_page_first', true);
                        ?>                        
                        <input type="checkbox" class="checkbox" name="udraw_display_options_page_first" id="udraw_display_options_page_first" value="yes" <?php if ($displayOptionsPageFirst == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">This will display the options page before showing designer and give ability to upload or design artwork.</span>
                    </p>
                    <p class="form-field" id="udraw_allow_upload_artwork_form">
                        <label for="udraw_allow_upload_artwork">Allow Upload Artwork</label>
                        <?php
                            $allowUploadArtwork = get_post_meta($post->ID, '_udraw_allow_upload_artwork', true);
                        ?>                        
                        <input type="checkbox" class="checkbox" name="udraw_allow_upload_artwork" id="udraw_allow_upload_artwork" value="yes" <?php if ($allowUploadArtwork == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">This will enable upload artwork on the product page. </span>
                    </p>
                    <?php if (isset($_activation_key) && strlen($_activation_key) > 0 ) { ?>
                    <p class="form-field" id="udraw_allow_convert_pdf_form" <?php if ($displayOptionsPageFirst != 'yes' || $allowUploadArtwork != 'yes') { ?> style="display: none;" <?php } ?> >
                        <label for="udraw_allow_convert_pdf_form">Convert PDF to uDraw Design</label>
                        <?php
                            $allowConvertPDF = get_post_meta($post->ID, '_udraw_allow_convert_pdf', true);
                        ?>                        
                        <input type="checkbox" class="checkbox" name="udraw_allow_convert_pdf" id="udraw_allow_convert_pdf" value="yes" <?php if ($allowConvertPDF == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">This will give an option to convert the uploaded PDF file to a uDraw design. </span>
                    </p>
                    <?php } ?>
                    <p class="form-field" id="udraw_allow_post_payment_download">
                        <label for="udraw_allow_post_payment_download">Allow Post Payment PDF Download</label>
                        <?php
                            $allowPostPaymentDownload = get_post_meta($post->ID, '_udraw_allow_post_payment_download', true);
                        ?>
                        <input type="checkbox" class="checkbox" name="udraw_allow_post_payment_download" id="udraw_allow_post_payment_download" value="yes" <?php if ($allowPostPaymentDownload == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">This will allow customers to download the PDF after purchase.</span>
                    </p>
                </div>
                <div class="options_group">
                    <p class="form-field">
                        <label for="udraw_is_private_product">Is Product Private?</label>
                        <?php
                            $isUdrawPrivateProduct = get_post_meta($post->ID, '_udraw_is_private_product', true);
                        ?>                        
                        <input type="checkbox" class="checkbox" name="udraw_is_private_product" id="udraw_is_private_product" value="yes" <?php if ($isUdrawPrivateProduct == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">Make this product/template visible for specific set of users only.</span>
                    </p>
                    <p class="form-field udraw-private-users-select">
                        <label for="udraw_private_users_list"><?php _e('Customers', 'udraw'); ?></label>
                        <select id="udraw_private_users_list" name="udraw_private_users_list[]" multiple="multiple" data-placeholder="<?php _e('Select a Customer&hellip;', 'udraw'); ?>">
                            <?php
                            $customers = get_users('role=customer&orderby=display_name');
                            $privateCustomers = get_post_meta($post->ID, '_udraw_private_users_list', true);
            
                            foreach ($customers as $customer) {
                                $foundCustomer = false;
                                if (is_array($privateCustomers)) {
                                    foreach ($privateCustomers as $privateCustomer) { 
                                        if ($customer->ID == $privateCustomer) { $foundCustomer = true;  break; } 
                                    }                                
                                    if ($foundCustomer) {
                                        echo '<option value="' . esc_attr($customer->ID) . '" selected>' . esc_html($customer->display_name . ' <' . $customer->user_email . '> ') . '</option>';
                                    } else {
                                        echo '<option value="' . esc_attr($customer->ID) . '">' . esc_html($customer->display_name . ' <' . $customer->user_email . '> ') . '</option>';
                                    }                                
                                }
                            }
            
                            ?>						                        
                        </select>
                        <img class="help_tip" data-tip='<?php _e('These users will have private access to this product/template.', 'udraw') ?>' src="<?php echo WC()->plugin_url(); ?>/assets/images/help.png" height="16" width="16" />									
                    </p>
                </div>
                <div class="options_group">
                    <p class="form-field">
                        <label for="_manage_price_matrix"><?php _e('Define Price Matrix', 'udraw') ?></label>
                        <?php
                            $isPirceMatrixSet = get_post_meta($post->ID, '_udraw_is_price_matrix_set', true);
                        ?>                        
                        <input type="checkbox" class="checkbox" name="udraw_is_price_matrix_set" id="udraw_is_price_matrix_set" value="yes" <?php if ($isPirceMatrixSet == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description"><?php _e('Override default Price and Price Matrix.', 'udraw') ?></span>
                    </p>
                    <p class="form-field udraw-price-matrix-select">
                        <label for="udraw_price_matrix_list"><?php _e('Price Matrix', 'udraw'); ?></label>
                        <select id="udraw_price_matrix_list" name="udraw_price_matrix_list[]" multiple="multiple" data-placeholder="Select a Price matrix&hellip">
                            <?php
                            $udrawPriceMatrix = new uDrawPriceMatrix();
                            $price_matrix_list = $udrawPriceMatrix->get_price_matrix();
                            $selected_price_matrix = get_post_meta($post->ID, '_udraw_price_matrix_list', true);
                            foreach ($price_matrix_list as $price_matrix_item) {
                                if (gettype($selected_price_matrix) == 'array' && $selected_price_matrix[0] == $price_matrix_item->access_key) {
                                    echo '<option value="' . esc_attr($price_matrix_item->access_key) . '" selected>' . esc_html($price_matrix_item->name) . '</option>';
                                } else {
                                    echo '<option value="' . esc_attr($price_matrix_item->access_key) . '">' . esc_html($price_matrix_item->name) . '</option>';
                                }
                            }
            
                            ?>						                        
                        </select>
                        <img class="help_tip" data-tip='<?php _e('This price matrix will override the default price and price matrix.', 'udraw') ?>' src="<?php echo WC()->plugin_url(); ?>/assets/images/help.png" height="16" width="16" />									
                    </p>
                    <p class="form-field" id="udraw_price_matrix_disable_size_check_form">
                        <label for="udraw_price_matrix_disable_size_check_label">Disable File Upload Size Check</label>
                        <?php
                            $disableSizeCheckPriceMatrix = get_post_meta($post->ID, '_udraw_price_matrix_disable_size_check', true);
                        ?>
                        <input type="checkbox" class="checkbox" name="udraw_price_matrix_disable_size_check" id="udraw_price_matrix_disable_size_check" value="yes" <?php if ($disableSizeCheckPriceMatrix == "yes") { echo "checked=\"checked\""; } ?> />
                        <span class="description">This will disable the default page size check for price matrix which use sizes.</span>
                    </p>
                </div>

                <?php do_action('udraw_admin_product_panel'); ?>
            </div>

            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    var udraw_templates_array = new Array();
                    jQuery.getJSON(ajaxurl + '?action=udraw_get_templates&include_categories=false', function (data){
                        udraw_templates_array = data;
                        if (jQuery('select#udraw_template_id').val()) {
                            jQuery('select#udraw_template_id').trigger('change');
                        }
                    });
                    jQuery('#udraw_allow_upload_artwork, #udraw_display_options_page_first').on('change', function(){
                        if (jQuery('#udraw_allow_upload_artwork').prop('checked') && jQuery('#udraw_display_options_page_first').prop('checked') ) {
                            jQuery('#udraw_allow_convert_pdf_form').show();
                        } else {
                            jQuery('#udraw_allow_convert_pdf_form').hide();
                            jQuery('#udraw_allow_convert_pdf').prop('checked',false);
                        }
                    })
                    jQuery('#_udraw_product').change(function() {
                        if (jQuery(this).is(':checked')) {
                            jQuery('.hide_if_udraw_product').show();
                        } else {
                            jQuery('.hide_if_udraw_product').hide();
                        }
                    }).change();
                    
                    jQuery('#_udraw_product').click(function(){
                        if (jQuery(this).is(':checked')) {
                            jQuery('#udraw_display_options_page_first').prop('checked', true);
                            jQuery('#udraw_allow_upload_artwork_form').show();
                        } else {
                            jQuery('#udraw_display_options_page_first').prop('checked', false);
                            jQuery('#udraw_allow_upload_artwork_form').hide();
                        }
                    });

                    jQuery('#udraw_display_options_page_first').change(function () {
                        if (jQuery(this).is(':checked')) {
                            jQuery('#udraw_allow_upload_artwork_form').show();
                        } else {
                            jQuery('#udraw_allow_upload_artwork_form').hide();
                        }
                    }).change();
                    
                    jQuery('#udraw_is_private_product').change(function() {
                        if (jQuery(this).is(':checked')) {
                            jQuery('.udraw-private-users-select').show();
                        } else {
                            jQuery('.udraw-private-users-select').hide();
                        }
                    }).change();
                    
                    jQuery('#udraw_is_price_matrix_set').change(function() {
                        if (jQuery(this).is(':checked')) {
                            jQuery('.udraw-price-matrix-select').show();
                        } else {
                            jQuery('.udraw-price-matrix-select').hide();
                        }
                    }).change();                    
                    
                    jQuery('select#udraw_template_id').change(function() {
                        jQuery('#udraw_template_preview').empty();
                        var _template_id = jQuery('select#udraw_template_id').val();
                        if (_template_id) {
                            var _random = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 8);
                            if (_template_id.constructor === Array) {
                                for (var x = 0; x < _template_id.length; x++) {
                                    for (var i = 0; i < udraw_templates_array.length; i++) {
                                        if (_template_id[x] === udraw_templates_array[i].id) {
                                            jQuery('#udraw_template_preview').prepend('<img src="' + udraw_templates_array[i].preview + '?' + _random + '" style="max-width:250px; border: 1px solid #9C9C9C; margin-left: 160px;" />');
                                        }
                                    }
                                }
                            } else {
                                for (var i = 0; i < udraw_templates_array.length; i++) {
                                    if (_template_id === udraw_templates_array[i].id) {
                                        jQuery('#udraw_template_preview').prepend('<img src="' + udraw_templates_array[i].preview + '?' + _random + '" style="max-width:250px; border: 1px solid #9C9C9C; margin-left: 160px;" />');
                                    }
                                }
                            }
                            jQuery('#udraw_pdf_template_id_form_group').hide();
                            jQuery('#udraw_xmpie_template_id_form_group').hide();
                            jQuery('#udraw_allow_customer_download_form_group').show();
                        } else {
                            jQuery('#udraw_template_preview').empty();
                            jQuery('#udraw_pdf_template_id_form_group').show();
                            jQuery('#udraw_xmpie_template_id_form_group').show();
                            jQuery('#udraw_allow_customer_download_form_group').hide();
                        }
                    });                   

                    jQuery('select#udraw_block_template_id').change(function() {
                        var _template_id = jQuery('select#udraw_block_template_id').val();
                        jQuery('#udraw_block_template_preview').empty();
                        if (_template_id) {
                            var _random = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 8);

                            if (_template_id.constructor === Array) {
                                for (var x = 0; x < _template_id.length; x++) {
                                    jQuery.getJSON(ajaxurl + '?action=udraw_pdf_block_get_templates&block-template-id=' + _template_id[x],
                                        function (data) {
                                            jQuery('#udraw_block_template_preview').prepend('<img src="' + data.ThumbnailLarge + '?' + _random + '" style="max-width:250px; border: 1px solid #9C9C9C; margin-left: 160px;" />');
                                        }
                                    );
                                }
                            } else {
                                jQuery.getJSON(ajaxurl + '?action=udraw_pdf_block_get_templates&block-template-id=' + _template_id,
                                    function (data) {
                                        jQuery('#udraw_block_template_preview').prepend('<img src="' + data.ThumbnailLarge + '?' + _random + '" style="max-width:250px; border: 1px solid #9C9C9C; margin-left: 160px;" />');
                                    }
                                );
                            }

                            jQuery('#udraw_pdf_allow_print_save_form').show();
                            jQuery('#udraw_template_id_form_group').hide();
                            jQuery('#udraw_xmpie_template_id_form_group').hide();
                            jQuery('#udraw_allow_customer_download_form_group').hide();
                        } else {
                            jQuery('#udraw_template_preview').empty();
                            jQuery('#udraw_pdf_allow_print_save_form').hide();
                            jQuery('#udraw_template_id_form_group').show();
                            jQuery('#udraw_xmpie_template_id_form_group').show();
                        }
                    });

                    jQuery('select#udraw_xmpie_template_id').change(function() {
                        var _template_id = jQuery('select#udraw_xmpie_template_id').val();
                        jQuery('#udraw_xmpie_template_preview').empty();
                        if (_template_id) {
                            var _random = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 8);

                            if (_template_id.constructor === Array) {
                                for (var x = 0; x < _template_id.length; x++) {
                                    jQuery.getJSON(ajaxurl + '?action=udraw_xmpie_get_templates&xmpie-template-id=' + _template_id[x],
                                        function (data) {
                                            jQuery('#udraw_xmpie_template_preview').prepend('<img src="' + data.ThumbnailLarge + '?' + _random + '" style="max-width:250px; border: 1px solid #9C9C9C; margin-left: 160px;" />');
                                        }
                                    );
                                }
                            } else {
                                jQuery.getJSON(ajaxurl + '?action=udraw_xmpie_get_templates&xmpie-template-id=' + _template_id,
                                    function (data) {
                                        jQuery('#udraw_xmpie_template_preview').prepend('<img src="' + data.ThumbnailLarge + '?' + _random + '" style="max-width:250px; border: 1px solid #9C9C9C; margin-left: 160px;" />');
                                    }
                                );
                            }

                            jQuery('#udraw_pdf_xmpie_allow_print_save_form').show();
                            jQuery('#udraw_template_id_form_group').hide();
                            jQuery('#udraw_pdf_template_id_form_group').hide();
                            jQuery('#udraw_allow_customer_download_form_group').hide();
                        } else {
                            jQuery('#udraw_template_preview').empty();
                            jQuery('#udraw_pdf_xmpie_allow_print_save_form').hide();
                            jQuery('#udraw_template_id_form_group').show();
                            jQuery('#udraw_pdf_template_id_form_group').show();
                        }
                    });

                    // Use 'maximumSelectionLength for select2 4.0 ( BETA ) right now.
                    // Currently we need to use 'maximumSelectionSize'
                    jQuery('select#udraw_template_id').css('width', '350px').select2({ maximumSelectionSize: 15 });
                    jQuery('select#udraw_block_template_id').css('width', '350px').select2({ maximumSelectionSize: 15 });
                    jQuery('select#udraw_xmpie_template_id').css('width', '350px').select2({ maximumSelectionSize: 15 });
                    jQuery('select#udraw_private_users_list').css('width', '350px').select2();
                    jQuery('select#udraw_price_matrix_list').css('width', '350px').select2({ maximumSelectionSize: 1 });
                    jQuery('select#udraw_designer_skin').css('width', '350px').select2();

                    <?php
                    if (isset($_GET['udraw_template_id'])) {
                        echo 'jQuery(\'#_udraw_product\').prop(\'checked\', true).change();';
                        echo 'jQuery(\'#udraw_allow_upload_artwork_form\').show();';
                    }
            
                    if (isset($_GET['udraw_template_id']) && isset($_GET['udraw_action'])) {
                        if ($_GET['udraw_action'] == "new-product") {
                            $templateId = $_GET['udraw_template_id'];
                            $udrawTemplate = $this->get_udraw_templates($templateId);
                            echo 'jQuery(\'#title\').val(\''. addslashes($udrawTemplate[0]->name) . '\');';
                        } else if ($_GET['udraw_action'] == "new-block-product") {
                            $block_template_id = $_GET['udraw_template_id'];
                            $block_template = $uDrawPDFBlocks->get_product($block_template_id);
                            echo 'jQuery(\'#title\').val(\''. addslashes($block_template['ProductName']) . '\');';
                        }else if ($_GET['udraw_action'] == "new-xmpie-product") {
                            $xmpie_template_id = $_GET['udraw_template_id'];
                            $xmpie_template = $uDrawPDFXmPie->get_product($xmpie_template_id);
                            echo 'jQuery(\'#title\').val(\''. addslashes($xmpie_template['ProductName']) . '\');';
                        }
                        //Automatically display options first
                        echo 'jQuery("#udraw_display_options_page_first").prop("checked", "true");';
                        echo 'jQuery(\'#udraw_allow_upload_artwork_form\').show();';
                        // This disables WooCommerce Addons Globally.
                        echo 'jQuery(\'#_product_addons_exclude_global\').prop(\'checked\', true);';
                    }
            
                    if (self::is_udraw_product($post->ID)) {
                        echo 'jQuery(\'#_udraw_product\').prop(\'checked\', true).change();';
                        echo 'jQuery(\'#udraw_allow_upload_artwork_form\').show();';
                    }                    
                    ?>
                    
                    var udraw_template_id = jQuery('select#udraw_template_id').val();
                    var block_template_id = jQuery('select#udraw_block_template_id').val();
                    var xmpie_template_id = jQuery('select#udraw_xmpie_template_id').val();

                    if (udraw_template_id) {
                        jQuery('select#udraw_template_id').trigger('change');
                    } else if (block_template_id) {
                        jQuery('select#udraw_block_template_id').trigger('change');
                    } else if (xmpie_template_id) {
                        jQuery('select#udraw_xmpie_template_id').trigger('change');
                    }
                    jQuery('#udraw_designer_skin_override').on('change',function(){
                        if(jQuery('#udraw_designer_skin_form_group').is(':visible')) {
                            jQuery('#udraw_designer_skin_form_group').hide();
                        } else {
                            jQuery('#udraw_designer_skin_form_group').show();
                        }
                    });
                });
            </script>
            <?php
        }

        public function woo_udraw_checkout_update_order_meta($order_id) {  
            $uDrawSettings = new uDrawSettings();
            $udraw_settings = $uDrawSettings->get_settings();
            $submit_order = true;
            if (isset($udraw_settings['goepower_submit_on_status']) && $udraw_settings['goepower_submit_on_status'] == "paid") { $submit_order = false; }
            if ($submit_order) { $this->generate_pdf_from_order($order_id, false); }
        }
        
        public function woo_udraw_order_status_processing($order_id) {
            $uDrawSettings = new uDrawSettings();
            $udraw_settings = $uDrawSettings->get_settings();
            if (isset($udraw_settings['goepower_submit_on_status']) && $udraw_settings['goepower_submit_on_status'] == "paid") {
                $this->generate_pdf_from_order($order_id, false);
            }
        }
        
        /**
         * Save custom form data when saving product.
         * 
         * @param type $post_id
         * @param type $post
         */
        public function woo_udraw_save_custom_fields($post_id, $post) {
            $uDrawProduct = isset($_POST['_udraw_product']) ? 'true' : 'false';
            
            if ($uDrawProduct == 'true') {
                // Update Template Id if Product is uDraw Product.
                $template_id = (isset($_POST['udraw_template_id'])) ? $_POST['udraw_template_id'] : NULL;
                $block_id = (isset($_POST['udraw_block_template_id'])) ? $_POST['udraw_block_template_id'] : NULL;
                $xmpie_id = (isset($_POST['udraw_xmpie_template_id'])) ? $_POST['udraw_xmpie_template_id'] : NULL;
                $use_colour_palette = (isset($_POST['udraw_pdf_xmpie_use_colour_palette'])) ? $_POST['udraw_pdf_xmpie_use_colour_palette'] : NULL;
                $allow_print_save = (isset($_POST['udraw_pdf_allow_print_save'])) ? $_POST['udraw_pdf_allow_print_save'] : NULL;
                $allow_download_design = (isset($_POST['udraw_allow_customer_download_design'])) ? $_POST['udraw_allow_customer_download_design'] : NULL;
                $allow_structure_file = (isset($_POST['udraw_allow_structure_file'])) ? $_POST['udraw_allow_structure_file'] : NULL;
                $udraw_designer_skin_override = (isset($_POST['udraw_designer_skin_override'])) ? $_POST['udraw_designer_skin_override'] : false;
                $udraw_designer_skin = (isset($_POST['udraw_designer_skin'])) ? $_POST['udraw_designer_skin'] : NULL;
                update_post_meta($post_id, '_udraw_template_id', $template_id);
                update_post_meta($post_id, '_udraw_block_template_id', $block_id);
                update_post_meta($post_id, '_udraw_xmpie_template_id', $xmpie_id);
                update_post_meta($post_id, '_udraw_pdf_xmpie_use_colour_palette', $use_colour_palette);
                update_post_meta($post_id, '_udraw_pdf_allow_print_save', $allow_print_save);
                update_post_meta($post_id, '_udraw_allow_customer_download_design', $allow_download_design);
                update_post_meta($post_id, '_udraw_allow_structure_file', $allow_structure_file);
                update_post_meta($post_id, '_udraw_designer_skin_override', $udraw_designer_skin_override);
                update_post_meta($post_id, '_udraw_designer_skin', $udraw_designer_skin);
                
                // Update Options settings.
                $options_first = (isset($_POST['udraw_display_options_page_first'])) ? $_POST['udraw_display_options_page_first'] : false;
                $allow_upload = (isset($_POST['udraw_allow_upload_artwork'])) ? $_POST['udraw_allow_upload_artwork'] : false;
                $allow_convert = (isset($_POST['udraw_allow_convert_pdf'])) ? $_POST['udraw_allow_convert_pdf'] : false;
                $allow_post_payment_download = (isset($_POST['udraw_allow_post_payment_download'])) ? $_POST['udraw_allow_post_payment_download'] : false;
                update_post_meta($post_id, '_udraw_display_options_page_first', $options_first);
                update_post_meta($post_id, '_udraw_allow_upload_artwork', $allow_upload);
                update_post_meta($post_id, '_udraw_allow_convert_pdf', $allow_convert);
                update_post_meta($post_id, '_udraw_allow_post_payment_download', $allow_post_payment_download);
                
                // Update Private User Settings.
                $private_product = (isset($_POST['udraw_is_private_product'])) ? $_POST['udraw_is_private_product'] : NULL;
                update_post_meta($post_id, '_udraw_is_private_product', $private_product);
                $privateUserList = array();
                if (isset($_POST['udraw_private_users_list'])) {
                    foreach ($_POST['udraw_private_users_list'] as $user_id) {
                        array_push($privateUserList, $user_id);
                    }
                }
                update_post_meta($post_id, '_udraw_private_users_list', $privateUserList);
                
                // Update Price Matrix Settings.
                $price_matrix_isset = (isset($_POST['udraw_is_price_matrix_set'])) ? $_POST['udraw_is_price_matrix_set'] : NULL;
                $price_matrix_list = (isset($_POST['udraw_price_matrix_list'])) ? $_POST['udraw_price_matrix_list'] : NULL;
                $disable_price_matrix_size_check = (isset($_POST['udraw_price_matrix_disable_size_check'])) ? $_POST['udraw_price_matrix_disable_size_check'] : NULL;
                update_post_meta($post_id, '_udraw_is_price_matrix_set', $price_matrix_isset);
                update_post_meta($post_id, '_udraw_price_matrix_list', $price_matrix_list);
                update_post_meta($post_id, '_udraw_price_matrix_disable_size_check', $disable_price_matrix_size_check);
                
                // Global Template Check
                if (isset($_POST['udraw_public_key'])) {
                    update_post_meta($post_id, '_udraw_public_key', $_POST['udraw_public_key']);
                }
                
                do_action('udraw_admin_save_custom_fields', $post_id);
            }
            update_post_meta($post_id, '_udraw_product', $uDrawProduct);
        }

		public function woo_udraw_add_order_item_header() {
			?>
			<th class="udraw-product-heading" style="min-width:260px; text-align:center;">uDraw Controls</th>
			<?php
		}

        public function woo_udraw_hide_order_itemmeta($meta = array()) {            
            $meta[] = '_udraw_pdf_path'; 
            $meta[] = '_udraw_pdf_xref';
            $meta[] = '_udraw_preview_xref';
            $meta[] = '_udraw_xml_xref';
            $meta[] = '_udraw_product_jpg';
            return $meta;
        }
        
        /**
         * Adds buttons on item row when viewing order infomation from admin area.
         * Displays meta box also only if order contains uDraw product.
         */
        public function woo_udraw_admin_order_item_values( $_product, $item, $item_id ) {
            global $woocommerce, $post;
            $order = new WC_Order($post->ID);
            //get order id
            if (get_class($item) === 'WC_Order_Refund') {
                return;
            }
            $order_id = trim(str_replace('#', '', $order->get_order_number()));
            $friendly_item_name = $item['name'] . '-' . $order_id;
            $friendly_item_name = preg_replace('/"/', '', $friendly_item_name);
            if (isset($item['udraw_data'])) {
                if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
                    $product = $item['udraw_data'];
                } else {
                    $product = unserialize($item['udraw_data']);
                }
                if (!$product) {
                    $fixed = preg_replace_callback(
                        '/s:([0-9]+):\"(.*?)\";/',
                        function ($matches) { return "s:".strlen($matches[2]).':"'.$matches[2].'";';     },
                        htmlspecialchars($item['udraw_data'], ENT_NOQUOTES)
                    );
                    $product = unserialize($fixed);
                    if (strlen($product['udraw_pdf_block_product_data']) > 0) { 
                        if (is_null(json_decode($product['udraw_pdf_block_product_data']))) {
                            $product['udraw_pdf_block_product_data'] = uDraw::fixBlocksJSONValues($product['udraw_pdf_block_product_data']);
                        }
                    }
                }
                $uniquePreviewId = uniqid('preview');
                $uniquePDFPagesId = uniqid('pages');
                if( isset($item['udraw_data']) ) {
                    if (isset($product['udraw_pdf_block_product_data']) && strlen($product['udraw_pdf_block_product_data']) > 0) {
                        // Add Meta Box if order contains uDraw PDF Product.
                        add_meta_box( 'udraw-pdf-order', 'uDraw PDF Viewer', array( &$this, 'woo_udraw_admin_pdf_product_order_view'), 'shop_order', 'normal', 'default' );
                    }
                    
                    if (isset($product['udraw_product_data']) && strlen($product['udraw_product_data']) > 0) {
                        // Add Meta Box if order contains uDraw Product.
                        add_meta_box( 'udraw-order', 'uDraw Product Viewer', array( &$this, 'woo_udraw_admin_product_order_view'), 'shop_order', 'normal', 'default' );
                    }
                    
                    $_udraw_product_data = '';
                    $_udraw_product_preview = '';
                    
                    // Get data from uDraw Product
                    if (isset($product['udraw_product_data']) && strlen($product['udraw_product_data']) > 0) {
                        $_udraw_product_data = $product['udraw_product_data'];
                        $_udraw_product_preview = $product['udraw_product_preview'];
                    }
                    
                    // Get data from Price Matrix Product.
                    if (isset($product['udraw_price_matrix_design_data'])) {
                        $_udraw_product_data = $product['udraw_price_matrix_design_data'];
                        $_udraw_product_preview = $product['udraw_price_matrix_design_preview'];
                    }
                    
                    // Get data from PDF Block Product
                    if (isset($product['udraw_pdf_block_product_data']) && strlen($product['udraw_pdf_block_product_data']) > 0) {
                        $_udraw_product_data = $product['udraw_pdf_block_product_data'];
                        $_udraw_product_preview = $product['udraw_pdf_block_product_thumbnail'];
                    }
                    ?>

                    <?php if (isset($_udraw_product_preview) && strlen($_udraw_product_preview) > 0) { ?>
                    <div id="<?php echo $uniquePreviewId; ?>" style="display:none;">
                            <?php
                                if (isset($product['udraw_product_data']) && strlen($product['udraw_product_data']) > 0) {
                                    echo '<ul style="list-style: none;font-size: 0px;margin-left: -2.5%;">';
                                    $designXML = simplexml_load_string(base64_decode(file_get_contents(UDRAW_STORAGE_DIR . $product['udraw_product_data'])));
                                    $_pdf_pages = wc_get_order_item_meta($item_id, '_udraw_pdf_pages', true);
                                    for ($cp = 0; $cp < count($designXML->page); $cp++) {
                                        echo '<li style="width: 47.5%;display: inline-block;padding: 10px; margin: 0 0 2.5% 2.5%; background: #fff;border: 1px solid #ddd;font-size: 16px;font-size: 1rem;vertical-align: top;box-shadow: 0 0 5px #ddd;box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;">';
                                        if ($designXML->page[$cp]->item[0]["preview"] == "undefined") {
                                            echo '<div style="max-width: 100%;min-height: 176px; max-height:200px; border: 1px solid #ddd;display: -webkit-flexbox;display: -ms-flexbox;display: -webkit-flex;display: flex;-webkit-flex-align: center;-ms-flex-align: center;-webkit-align-items: center;align-items: center;justify-content: center;"><span style="line-height:45px; text-align:center;font-size:34px; font-family:Arial;">No Preview Available</span></div>';
                                        } else {                                        
                                            echo '<img style="max-width: 100%;height: auto;margin: 0 0 10px;border: 1px solid #ddd;" src="'. $designXML->page[$cp]->item[0]["preview"] . '"></img>';
                                        }
                                        echo '<span style="margin: 0 0 5px;">';
                                        echo '<h3 style="display:inline;">Page '. ($cp+1) .'</h3>';
                                        if (is_array($_pdf_pages)) {
                                            if (isset($_pdf_pages[$cp])) {
                                                echo '<a href="'. $_pdf_pages[$cp] .'" id="udraw-download-pdf-btn" target="_blank" class="button button-small button-secondary" style="float:right;" download="'.$friendly_item_name . '-' . ($cp+1) .'.pdf">Download PDF</a>';
                                            }
                                        }
                                        echo '</span>';
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                } else {
                                    echo '<img style="max-width:580px; max-height:540px; box-shadow: rgba(0, 0, 0, 0.498039) 0px 0px 5px;" src="' . $_udraw_product_preview .'" />';
                                }
			                ?>
                    </div>
                    <?php } ?>
                    
                    <td class="udraw-product" style="width:150px">
                        <?php
                            $disable_default_udraw_order_controls = apply_filters('udraw_disable_default_order_controls', false, $item);
                        ?>
                        <?php if (!$disable_default_udraw_order_controls) { ?>

                        <?php if (isset($_udraw_product_preview) && strlen($_udraw_product_preview) > 0) { ?>
                            <a class='button button-small button-secondary udraw-preview-order-item thickbox' href="#" onclick="javascript:window.tb_show('View Pages', '#TB_inline?width=600&height=550&inlineId=<?php echo $uniquePreviewId; ?>');" style='width: 125px; text-align: center;'>View Page(s)</a>
                        <?php } ?>

                        <?php if (isset($product['udraw_product_data']) && strlen($product['udraw_product_data']) > 0) { ?>
                        <button class='button button-small button-secondary udraw-show-order-item' data-product='<?php echo $_udraw_product_data; ?>' data-id='<?php echo $item_id; ?>' style='width: 125px; text-align: center;' disabled><i class="fa fa-spinner fa-pulse"></i><span style="display: none;">Update Design</span></button>
                        <?php } else if (isset($product['udraw_pdf_block_product_data']) && strlen($product['udraw_pdf_block_product_data']) > 0) { ?>
                            <button class='button button-small button-secondary udraw-show-pdf-order-item' data-product='<?php echo base64_encode($_udraw_product_data); ?>' data-id='<?php echo $product['udraw_pdf_block_product_id']; ?>' style='width: 125px; text-align: center;'>Update Design</button>
                        <?php } ?>

                        <br />
                        <?php
                        $_pdf_path = wc_get_order_item_meta($item_id, '_udraw_pdf_path', true);
                        if (isset($_pdf_path) && strlen($_pdf_path) > 3) { ?>
                            <a href="<?php echo $_pdf_path; ?>" id="udraw-download-pdf-btn" target="_blank" class="button button-small button-secondary" style='width: 125px; text-align: center;' download="<?php echo $friendly_item_name?>.pdf">Download PDF</a>
                        <?php
                        } else {
                            if (isset($_udraw_product_data) && strlen($_udraw_product_data) > 0) {
                            ?>
                                <button id="udraw-download-pdf-btn" class='button button-small button-secondary udraw-download-order-item' data-friendly='<?php echo $friendly_item_name; ?>' data-product='<?php echo $_udraw_product_data; ?>' data-id='<?php echo $item_id; ?>' style='width: 125px; text-align: center;'>Download PDF</button>                            
                            <?php
                            }
                        }                        
                        ?>
                        <?php $rebuild_url = esc_url(add_query_arg('udraw_rebuild_pdf', 'true')); ?>
                        <?php if ( uDraw::is_udraw_okay() && ( (isset($product['udraw_product_data']) && strlen($product['udraw_product_data']) > 0) ||  ( !is_null($product['udraw_pdf_block_product_id']) ) || ( !is_null($product['udraw_pdf_xmpie_product_id']) ) ) ) { ?>
                        <a id="udraw-rebuild-pdf-btn" class='button button-small button-secondary udraw-preview-order-item' href="<?php echo $rebuild_url; ?>" style='width: 125px; text-align: center;'>Rebuild PDF</a>
                        <?php } ?>
                        <?php if (isset($product['udraw_options_uploaded_excel']) && strlen($product['udraw_options_uploaded_excel']) > 0 && strlen(json_decode(stripcslashes($product['udraw_options_uploaded_excel']))->filename) > 0) {
                            $order_item_dir = UDRAW_ORDERS_DIR .'uDraw-Order-'.$order_id.'-'.$item_id.'/';
                            $orderitem = (file_exists($order_item_dir)) ? base64_encode($order_item_dir) : base64_encode('');
                        ?>
                                <a class='button button-small button-secondary udraw-generate-excel-designs' href="#" style='font-size: 9px; width: 125px; text-align: center;' onclick="javascript: generate_excel_xmls(this);" data-excelfiles='<?php echo $product['udraw_options_uploaded_excel']; ?>' data-product='<?php echo $_udraw_product_data ?>' data-itemid='<?php echo $item_id ?>'><i class="fa fa-spinner fa-pulse" style="display: none;"></i>&nbsp;<span>Regenerate Excel Designs</span></a>
                                <a class='button button-small button-secondary udraw-download-excel-designs <?php if (!file_exists($order_item_dir)) echo 'disabled'; ?>' data-orderitem="<?php echo $orderitem; ?>" data-itemid='<?php echo $item_id ?>' style='font-size: 9px; width: 125px; text-align: center;' onclick="javascript: download_package(this); " ><span>Download Excel Designs</span></a>
                                <span class="pop-up-warning" style="display: none; font-size: 10px;"><i class="fa fa-exclamation-circle"></i>&nbsp; Having trouble? Please check that your download was not blocked by any pop-up blockers.</span>
                            <script>
                                var responseArray = new Array();
                                var storage_dir = '<?php echo wp_make_link_relative(str_replace('\\', '\\\\', UDRAW_DESIGN_STORAGE_DIR)); ?>';
                                var storage_url = '<?php echo UDRAW_DESIGN_STORAGE_URL; ?>';
                                var index = 0;
                                var pdf_path = '';
                                
                                function fetch_next_pdf (data, index, element, callback) {
                                    if (typeof data[index] == 'undefined' || data == '') {
                                        window.alert("An error had occurred. Please regenerate the excel design files before trying again.");
                                        jQuery('i', element).hide();
                                        jQuery('span', element).text('Download Excel Designs');
                                        jQuery(element).prop('disabled', false);
                                    } else {
                                        var dataDIR = data[index].replace(storage_dir, storage_url);
                                        jQuery.ajax({
                                            type: 'POST',
                                            url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
                                            data: {
                                                action: 'udraw_convert_xml_to_pdf',
                                                data: dataDIR,
                                                item_key: jQuery(element).data('itemid'),
                                                order_id: '<?php echo $order_id; ?>'
                                            },
                                            dataType: 'json',
                                            success: function(response) {
                                                index += 1;
                                                responseArray.push(response);
                                                if (data.length > index) {
                                                    fetch_next_pdf(data, index,element, callback);
                                                } else {
                                                    if (typeof callback == 'function') {
                                                        callback();
                                                    }
                                                }
                                            },
                                            error: function (error) {
                                                console.log(error);
                                                return;
                                            }
                                        });
                                    }
                                }
                                
                                function generate_excel_xmls (element) {
                                    jQuery('i', element).show();
                                    jQuery('span', element).text('Regenerating...');
                                    jQuery(this).prop('disabled', true);
                                    if (!jQuery(element).siblings('.udraw-download-excel-designs').hasClass('disabled')) {
                                        jQuery(element).siblings('.udraw-download-excel-designs').addClass('disabled');
                                    }
                                    var excelFiles = jQuery(element).data('excelfiles');
                                    var order_id = '<?php echo $order_id ?>';
                                    var item_id = jQuery(element).data('itemid');
                                    var order_dir = '<?php echo str_replace('\\', '\\\\', UDRAW_ORDERS_DIR); ?>';
                                    jQuery.ajax({
                                        url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
                                        data: {
                                            action: 'udraw_generate_excel_designs',
                                            excel: JSON.stringify(excelFiles),
                                            designdata: jQuery(element).data('product')
                                        },
                                        dataType: 'json',
                                        success: function(response) {
                                            if (response.length > 0) {
                                                //Will also automatically download the pdf after generating
                                                generate_excel_pdf(element, response, function(){
                                                    jQuery('span', element).text('Compressing files...');
                                                    jQuery('i', element).hide();
                                                    jQuery('span', element).text('Regenerate Excel Designs');
                                                    jQuery(element).prop('disabled', false);
                                                    jQuery(element).siblings('.udraw-download-excel-designs').removeClass('disabled');
                                                    jQuery(element).siblings('.udraw-download-excel-designs').data('orderitem', Base64.encode(order_dir + 'uDraw-Order-' + order_id + '-' + item_id + '/'));
                                                });
                                            }
                                        }
                                    });
                                };
                                
                                function generate_excel_pdf (element, data, callback) {
                                    responseArray = new Array();
                                    var item_id = jQuery(element).data('itemid');
                                    //Empty the directory out first
                                    var order_folder_dir = '<?php echo str_replace('\\', '\\\\', UDRAW_ORDERS_DIR.'uDraw-Order-'.$order_id.'-'); ?>' + item_id + '/';
                                    var order_folder_url = '<?php echo UDRAW_ORDERS_URL.'uDraw-Order-'.$order_id.'-' ?>' + item_id + '/';
                                    jQuery.ajax({
                                        url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
                                        data: {
                                            action: 'udraw_empty_target_folder',
                                            target_dir: order_folder_dir
                                        },
                                        dataType: 'json',
                                        success: function(response) {
                                            if (response) {
                                                fetch_next_pdf(data, 0, element, function(){
                                                    if (typeof callback == 'function') {
                                                        callback();
                                                    }
                                                });
                                            }
                                        }
                                    });
                                };
                                
                                function download_package(element) {
                                    var order_id = '<?php echo $order_id ?>';
                                    var item_id = jQuery(element).data('itemid');
                                    var order_dir = '<?php echo str_replace('\\', '\\\\', UDRAW_ORDERS_DIR); ?>';
                                    var order_url = '<?php echo str_replace('\\', '\\\\', UDRAW_ORDERS_URL); ?>';
                                    var uniqueID = '<?php echo uniqid() ?>';
                                    var order_item_dir = jQuery(element).data('orderitem');
                                    
                                    var destination_dir = order_dir + order_id + '-' + item_id + '-' + uniqueID + '.zip';
                                    var destination_url = order_url + order_id + '-' + item_id + '-' + uniqueID + '.zip';
                                    jQuery.ajax({
                                        url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
                                        data: {
                                            action: 'udraw_package_excel_designs',
                                            target_dir: order_item_dir,
                                            destination: destination_dir,
                                            overwrite: true
                                        },
                                        dataType: 'json',
                                        success: function(response) {
                                            if (response) {
                                                window.open(destination_url);
                                                setTimeout(function(){
                                                    jQuery(element).siblings('.pop-up-warning').show();
                                                }, 5000);
                                            } else {
                                                window.alert("An error had occurred.");
                                            }
                                        }
                                    });
                                };
                                
                            </script>
                        <?php } ?>
                            
                        <?php } ?>
                            
                        <?php do_action('udraw_admin_order_item_extras', $item, $item_id); ?>
                    </td>              
				<?php } ?>			
			<?php
            }
		}
        
        public function woo_udraw_admin_product_order_view() {  
            add_thickbox();
            ?>
            <script>
            var _udraw_order_item_action = '';
            var _udraw_current_item_id = '';
            var _udraw_selected_element;
            var _udraw_current_friendly_name = '';
            jQuery('.udraw-show-order-item').click(function (evt) {
                jQuery('html, body').animate({ scrollTop: jQuery('#udraw-order').offset().top }, 'slow');
                jQuery('#udraw-order').removeClass('closed');
                evt.preventDefault();

                _udraw_order_item_action = 'view';
                _udraw_current_item_id = jQuery(this).data("id");
                if (jQuery(this).data("product").length < 40) {
                    RacadDesigner.HideDesigner();
                    jQuery.getJSON(ajaxurl + '?action=udraw_get_template_data&template_path=' + jQuery(this).data("product"),
                        function (data) {
                            RacadDesigner.Legacy.loadCanvasDesignXML(data);
                        }
                    );
                } else {
                    RacadDesigner.Legacy.loadCanvasDesignXML(Base64.decode(jQuery(this).data("product")));
                }
            });
            jQuery('.udraw-download-order-item').click(function(evt) {
                _udraw_order_item_action = 'download';
                _udraw_current_item_id = jQuery(this).data("id");
                _udraw_current_friendly_name = jQuery(this).data("friendly");
                if (jQuery(this).data("product").length < 40) {
                    RacadDesigner.HideDesigner();
                    jQuery.getJSON(ajaxurl + '?action=udraw_get_template_data&template_path=' + jQuery(this).data("product"),
                        function (data) {
                            RacadDesigner.Legacy.loadCanvasDesignXML(data);
                        }
                    );
                } else {
                    RacadDesigner.Legacy.loadCanvasDesignXML(Base64.decode(jQuery(this).data("product")));
                }
                _udraw_selected_element = jQuery(this);
                _udraw_selected_element.text("Please Wait...");
                evt.preventDefault();
            });

            jQuery(document).ready(function() {
                jQuery('#udraw-order').removeClass('closed').addClass('closed');
                jQuery('.udraw-product-heading').css("min-width", "260px");
                jQuery('.udraw-product-heading').css("text-align", "center");
            });
            function __loaded_udraw_design() {
                if (_udraw_order_item_action == 'download') {
                    setTimeout(function () {
                        if (_udraw_current_friendly_name.length > 0) {
                            RacadDesigner.ExportToMultiPagePDF(_udraw_current_friendly_name, false);
                        } else {
                            RacadDesigner.ExportToMultiPagePDF('uDraw_Order_<?php echo($_GET['post'])?>_' + _udraw_current_item_id, false);
                        }
                        _udraw_order_item_action = '';
                        jQuery('#udraw-order').removeClass('closed').addClass('closed');

                        if (_udraw_selected_element) {
                            setTimeout(function () {
                                _udraw_selected_element.text("Download PDF");
                                _udraw_selected_element = undefined;
                            }, 5000);                            
                        }
                    }, 1000);
                }

                setTimeout(function () {
                    jQuery("body").css("overflow", "auto");
                }, 1000);
            }                            
            </script>
            <style>
                .order_data_column .select2-container {
                    z-index: 0 !important;
                }
            </style>
            <?php
            $this->register_jquery_css();
            $this->registerBootstrapJS();
            $this->registerStyles();
            $this->register_designer_min_js();
            
            $udrawSettings = new uDrawSettings();
            $_udraw_settings = $udrawSettings->get_settings();
            if ($_udraw_settings['udraw_designer_enable_threed']) {
                $this->register_designer_threed_min_js();
            }
            $this->registerDesignerDefaultStyles();
            $this->registerScripts();

            // Deregister Select2 JS that ships with Woo and use our modded built in Select2 JS
            //wp_deregister_script('select2');
            //wp_deregister_script('jquery');
            
            // Load up Designer
            require_once("designer/designer-admin-order.php");
        }
        
        public function woo_udraw_admin_pdf_product_order_view() {
            add_thickbox(); 
            
            $this->registerStyles();
            $this->registerDesignerDefaultStyles();
            $this->registerPDFBlocksJS();
            $this->registerjQueryFileUpload();
            
            // Load up the PDF template interface
            require_once("pdf-blocks/templates/admin/pdf-block-order-admin.php");
            
            $GoEpower = new GoEpower();
            $udrawSettings = new uDrawSettings();
            $_udraw_settings = $udrawSettings->get_settings();
            if ($_udraw_settings['goepower_username'] !== null && $_udraw_settings['goepower_password'] !== null && strlen($_udraw_settings['goepower_username']) > 0 && strlen($_udraw_settings['goepower_password']) > 0)  {
                $_auth_object = $GoEpower->get_auth_object();
                echo '<script type="text/javascript">var goepower_token="'. $_auth_object->Token .'";</script>';
                echo '<script type="text/javascript">var goepower_custom_id="'. $_auth_object->CustomID .'";</script>';
            }
            
            ?>
            <script>
                var _udraw_pdf_block_product_id = '';
                var _previous_pdf_block_entries = '';
                var _download_requested = false;
                jQuery('.udraw-show-pdf-order-item').click(function (evt) {
                    jQuery('html,body').animate({ scrollTop: jQuery('#udraw-pdf-order').offset().top - 40 }, 700);
                    jQuery('#udraw-pdf-order').removeClass('closed');
                    _udraw_pdf_block_product_id = jQuery(this).data("id");
                    _previous_pdf_block_entries = JSON.parse(Base64.decode(jQuery(this).data("product")));                        
                    Blocks_GetBlocks(_udraw_pdf_block_product_id);                    
                    evt.preventDefault();
                });

                jQuery('#pdf-block-preview-btn').click(function (evt) {
                    Blocks_Process(_udraw_pdf_block_product_id);
                    evt.preventDefault();
                });

                jQuery('#pdf-block-download-btn').click(function (evt) {
                    _download_requested = true;
                    Blocks_Process(_udraw_pdf_block_product_id, false);
                    evt.preventDefault();
                });


                jQuery(document).ready(function() {
                    jQuery('#udraw-pdf-order').removeClass('closed').addClass('closed');
                });

                function __process_pdf_form_completed() {
                    Blocks_Process(_udraw_pdf_block_product_id);
                }

                function __process_pdf_preview_success(doc) {
                    jQuery("#previewDiv").empty();
                    lastBlockPreview = doc + '.png';
                    <?php if (isset($_udraw_settings['goepower_pdf_previwe_as_image']) && $_udraw_settings['goepower_pdf_previwe_as_image']) { ?>
                    jQuery("#previewDiv").html("<img src='" + doc + ".png' style='width:100%; box-shadow: rgba(0,0,0,0.5) 0 0 10px;' />");
                    <?php } else { ?>
                    jQuery("#previewDiv").html("<iframe src='<?php echo wp_make_link_relative(UDRAW_PLUGIN_URL) ?>/assets/pdfjs/web/viewer.php?file=" + doc + "&ps=yes' style='width:100%; min-height: 475px;' allowfullscreen webkitallowfullscreen></iframe>");
                    <?php } ?>

                    if (_download_requested) {
                        _download_requested = false;
                        window.open(doc, '_blank');
                    }
                }
            </script>
            <?php
        }
        
        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//
        // ----------------- WooCommerce Frontend Methods ----------------------- //
        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//

        /**
         * Overrides the default "Continue Shopping" button to return to main WooCommerce Shop page instead of default previous product page.
         * 
         * @return bool|string
         */
        public function wc_custom_redirect_continue_shopping() {
            global $woocommerce;
            if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
                $page_id = wc_get_page_id( 'shop' );
            } else {
                $page_id = woocommerce_get_page_id( 'shop' );
            }
            $shop_page_url = get_permalink( $page_id );
            return $shop_page_url;
        }
        
        /**
         * If product is a uDraw product, we will update the add to cart text and link.
         * 
         * @param type $handler
         * @param type $product
         * 
         * @return Add to cart text
         */
        public function woo_udraw_add_to_cart_cat_text($handler, $product) {
            global $woocommerce;
            $udrawPriceMatrix = new uDrawPriceMatrix();
            
            if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
                $product_type = $product->get_type();
                $product_id = $product->get_id();
            } else {
                $product_type = $product->product_type;
                $product_id = $product->id;
            }
            
            if (self::is_udraw_product($product_id)) {
                // Skip if this is a price matrix product
                if ($product_id == $udrawPriceMatrix->get_price_matrix_product_id()) { return $handler; }
                                
                return sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button product_type_%s">%s</a>', esc_url(get_permalink($product_id)), esc_attr($product_id), esc_attr($product->get_sku()), esc_attr($product_type), esc_html('Order Now'));
            }
            
            // Check if this is a static product and has a price matrix assigned to it.            
            $udraw_price_matrix_access_key = $udrawPriceMatrix->get_product_price_matrix_key($product_id);
            if (strlen($udraw_price_matrix_access_key) > 0) {
                // found price matrix product
                return sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button product_type_%s">%s</a>', esc_url(get_permalink($product_id)), esc_attr($product_id), esc_attr($product->get_sku()), esc_attr($product_type), esc_html('View Now'));
                
            }
            return $handler;
        }

        /**
         * This will tell WooCommerce to load in a custom template if it's a uDraw product.
         */
        public function woo_udraw_use_custom_template($template) {
            global $post;
            $template_slug = basename(rtrim($template, '.php'));
            
            //
            // NOTE: bypassing this page, works well on some themes.
            // August, 5, 2014 - Amram
            //
            /*
            if ($template_slug == 'single-product' && self::is_udraw_product($post->ID)) {
                //set ptoduct title above product designer
                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
                add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 10);                                                
                
                // Load up Designer
                $template = UDRAW_PLUGIN_DIR . '/templates/frontend/uDraw-single-product.php';
            }*/           
            
            if ( ( ($template_slug == 'single-product') || ($template_slug == 'woocommerce') ) && self::is_udraw_product($post->ID)) {
                $updateTitlePosition = true;
                if (self::is_udraw_product($post->ID)) {
                    $displayOptionsFirst = get_post_meta($post->ID, '_udraw_display_options_page_first', true);
                    if ($displayOptionsFirst == "yes") { $updateTitlePosition = false; }
                }
                
                if ($updateTitlePosition) {
                    if (!uDrawPDFBlocks::is_pdf_block_product($post->ID)) {
                        //set ptoduct title above product designer
                        $this->udraw_remove_hooked_action('woocommerce_template_single_title');
                        add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 10);     
                    }
                }
                
                // Load up Designer -- Not really needed. The designer will load up from antother action.
                //$template = UDRAW_PLUGIN_DIR . '/templates/frontend/uDraw-single-product.php';
                
            }            
            return $template;
        }                       
        
        
        public function woo_udraw_load_variable_options_ui() {
            // Enqueue variation scripts
            wp_enqueue_script( 'wc-add-to-cart-variation' );                            
            
            require_once("templates/frontend/uDraw-variable-add-to-cart-V2.php");                            
            
            $foundDisplayMethod = true;            
        }
        
        public function woo_udraw_load_simple_price_matrix_ui() {
            $uDrawPriceMatrix = new uDrawPriceMatrix();
            $uDrawPriceMatrix->registerScripts();
            $this->registerFontAwesome();
            $this->registerChecklistUI();
            require_once("price-matrix/templates/frontend/price-matrix-simple-add-to-cart.php");
            $foundDisplayMethod = true;            
        }
        
        public function woo_udraw_load_simple_upload_ui() {
            require_once("templates/frontend/uDraw-simple-add-to-cart-upload.php");
            $foundDisplayMethod = true;  
        }
        
        private function udraw_find_function_hook ($name = '', $not_filter = '') {
            global $wp_filter;
            $return_array = array();
            foreach ($wp_filter as $filter=>$value) {
                foreach($value as $priority => $function) {
                    foreach($function as $name=>$name_value) {
                        if ($name === 'woocommerce_show_product_images' && $filter !== $not_filter) {
                            array_push($return_array, array($filter, $priority));
                        }
                    }
                }
            }
            return $return_array;
        }
        
        private function udraw_remove_hooked_action ($name = '', $not_filter = '') {
            $filter_array = $this->udraw_find_function_hook($name, $not_filter);
            for ($i = 0; $i < count($filter_array); $i++) {
                $hook = $filter_array[$i][0];
                $priority = $filter_array[$i][1];
                remove_action($hook, $name, $priority);
            }
        }
        
        ///**
        // * This method will load up the designer template interface.
        // */
        public function woo_udraw_add_product_designer() {
            global $post, $wpdb, $product, $woocommerce, $udraw_price_matrix_access_key;
            
            if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
                $product_type = $product->get_type();
                $product_id = $product->get_id();
            } else {
                $product_type = $product->product_type;
                $product_id = $product->id;
            }
            
            $udrawSettings = new uDrawSettings();
            $udrawPriceMatrix = new uDrawPriceMatrix();
            $_udraw_settings = $udrawSettings->get_settings();     
            
            $isuDrawApparelProduct = false;
            $enableDesignOnline = false;
            
            if (uDraw::is_udraw_apparel_installed()) {
                $uDrawApparel = new uDrawApparel();
                if ($uDrawApparel->is_udraw_apparel($post->ID)) {
                    $isuDrawApparelProduct = true;
                    if (isset($_GET['vp'])) {
                        $ID = $_GET['vp'];
                        $vpDB = $wpdb->prefix.'udraw_virtual_products';
                        $boolean = $wpdb->get_var("SELECT design_online FROM $vpDB WHERE ID = $ID");
                        if (intval($boolean) === 1) {
                            $enableDesignOnline = true;
                        }
                    } else {
                        $enableDesignOnline = get_post_meta($post->ID, '_udraw_product', true);
                    }
                    if (isset($_GET['cart_item_key'])) {
                        if ($woocommerce->cart->get_cart()[$_GET['cart_item_key']]['_ua-design_online'] === true) {
                            $enableDesignOnline = true;
                        } else {
                            $enableDesignOnline = false;
                        }
                    }
                }
            }
            $udraw_price_matrix_access_key = $udrawPriceMatrix->get_product_price_matrix_key($post->ID);
            $isPriceMatrix = false;
            if (strlen($udraw_price_matrix_access_key) > 0) { $isPriceMatrix = true; }
            $allowCustomerDownloadDesign = get_post_meta($post->ID, '_udraw_allow_customer_download_design', true);
            
            if (self::is_udraw_product($post->ID)) {
                $templateId = $this->get_udraw_template_ids($post->ID);
                $templateCount = sizeof($templateId);               
                echo "<script>var templateCount=".$templateCount.";</script>";
                
                $displayOptionsFirst = get_post_meta($post->ID, '_udraw_display_options_page_first', true);
                
                if ($displayOptionsFirst != "yes") {
                    $this->udraw_remove_hooked_action('woocommerce_show_product_images');
                    $this->udraw_remove_hooked_action('woocommerce_template_single_price');
                }
                
                // Register Jquery UI js and styles
                $this->register_jquery_css();
                $this->registerStyles();
                $this->registerBootstrapJS();
                $this->registerScripts();
                
                // Get Template Id's ( PDF, XMPie, Designer )
                $designTemplateId = get_post_meta($post->ID, '_udraw_template_id', true); 
                $blockProductId = get_post_meta($post->ID, '_udraw_block_template_id', true);
                $xmpieProductId = get_post_meta($post->ID, '_udraw_xmpie_template_id', true);
                
                // If blockProduct is an array, we'll just grab first instace to just for block
                if (gettype($blockProductId) == "array") { 
                    if (count($blockProductId) > 0) {
                        $_blockArray = get_post_meta($post->ID, '_udraw_block_template_id', true);
                        $_blockProductId = $_blockArray[0];
                    }                    
                } else {
                    $_blockProductId = $blockProductId;
                }

                // If xmpieProduct is an array, we'll just grab first instace to just for block
                if (gettype($xmpieProductId) == "array") { 
                    if (count($xmpieProductId) > 0) {
                        $_xmpieArray = get_post_meta($post->ID, '_udraw_xmpie_template_id', true);
                        $_xmpieProductId = $_xmpieArray[0];
                    }                    
                } else {
                    $_xmpieProductId = $xmpieProductId;
                }
                
                // If designTemplateId is an array, we'll just grab first instace to just for block
                if (gettype($designTemplateId) == "array") { 
                    if (count($designTemplateId) > 0) {
                        $_uDrawTemplateArray = get_post_meta($post->ID, '_udraw_template_id', true);
                        $_designTemplateId = $_uDrawTemplateArray[0];
                    }                    
                } else {
                    $_designTemplateId = $designTemplateId;
                }
                
                $override_template = apply_filters('udraw_product_page_override', false, $_designTemplateId, $_blockProductId, $_xmpieProductId, $product);
                $isTemplatelessProduct = get_post_meta($post->ID, '_udraw_templateless_product', true);
                
                if ($override_template) { return; }
                if ( (strlen($_blockProductId) > 0) || ( is_array($_blockProductId) && count($_blockProductId) > 0)  ){
                    $this->registerPDFBlocksJS();
                    $this->registerjQueryFileUpload();
                    $this->registerBootstrapJS();
                    $this->registerImageCropper();
                    $this->registerSelect2JS();
                    $this->registerPanzoomJS();
                    require_once("pdf-blocks/templates/frontend/pdf-block-product.php");
                } else if ( (strlen($_xmpieProductId) > 0) || ( is_array($_xmpieProductId) && count($_xmpieProductId) > 0)  ){
                    $this->registerjQueryFileUpload();
                    $this->registerXMPieColourPicker();
                    $this->registerPDFXmPieJS();                   
                    $this->registerBootstrapJS();
                    $this->registerImageCropper();
                    $this->registerSelect2JS();
                    $this->registerPanzoomJS();
                    require_once("pdf-xmpie/templates/frontend/pdf-xmpie-product.php");
                } else {
                    if (strlen($_designTemplateId) > 0 || ($isuDrawApparelProduct && $enableDesignOnline) || $isTemplatelessProduct ) {                        
                        $this->register_designer_min_js();
                        if ($_udraw_settings['udraw_designer_enable_threed']) {
                            $this->register_designer_threed_min_js();
                        }                        
                        $designerSkinOverride = get_post_meta($post->ID, '_udraw_designer_skin_override', true);
                        if ($designerSkinOverride == 'yes') {
                            $selected_skin = get_post_meta($post->ID, '_udraw_designer_skin', true);
                            $this->load_designer_skin($_designTemplateId, $selected_skin, $displayOptionsFirst,$allowCustomerDownloadDesign,$isPriceMatrix,$templateCount,$isTemplatelessProduct, $isuDrawApparelProduct);
                        } else {
                            $this->load_designer_skin($_designTemplateId, $_udraw_settings['designer_skin'], $displayOptionsFirst,$allowCustomerDownloadDesign,$isPriceMatrix,$templateCount,$isTemplatelessProduct, $isuDrawApparelProduct);
                        }
                        //Apply extra action here
                        do_action('udraw_frontend_extra_items', $post);
                        if ($product_type == "simple") {
                            $removed_cart = remove_action('woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30);
                        }
                    } else {
                        if (get_post_meta($product_id, '_udraw_is_private_product', true) == "yes") {
                            return;
                        }
                        require_once("templates/frontend/uDraw-general-hooks.php");
                        if (!$displayOptionsFirst && !$isPriceMatrix) {
                            // Didn't find a design template id or a block template id.
                            // We will try to load up a price matrix as a product.
                            require_once("price-matrix/templates/frontend/price-matrix-product.php");
                            remove_action('woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30);
                            $udrawPriceMatrix->registerScripts();
                            $this->registerjQueryFileUpload();
                            
                        }
                    }                    
                }
                
                // Remove default select options for variable items only for design and block templates
                if ( ( (strlen($_blockProductId) > 0) || (strlen($_designTemplateId) > 0) || strlen($_xmpieProductId) > 0 ) || ( $displayOptionsFirst && $isPriceMatrix) || ($isuDrawApparelProduct) || $isTemplatelessProduct) {     
                    if ($displayOptionsFirst) {
                        if ($product_type == "variable") {
                            remove_action('woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30);
                            
                            add_action('woocommerce_variable_add_to_cart', array(&$this, 'woo_udraw_load_variable_options_ui'), 30);
                        } else {
                            if ($isPriceMatrix) {
                                $udrawPriceMatrix->registerScripts();
                                $this->registerjQueryFileUpload();
                                remove_action('woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30);
                                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
                                add_action('woocommerce_simple_add_to_cart', array(&$this, 'woo_udraw_load_simple_price_matrix_ui'), 30);
                            } else {
                                // This is a "simple" product type and display Options is set first.  We will roll our own "Design Now" button 
                                // which is replacing the default "Add to Cart" button.                               
                                $this->registerjQueryFileUpload();
                                remove_action('woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30);
                                add_action('woocommerce_simple_add_to_cart', array(&$this, 'woo_udraw_load_simple_upload_ui'), 30);
                                //Or remove it, if it is an apparel product and design online is disabled
                                if ($isuDrawApparelProduct && !$enableDesignOnline) {
                                    remove_action('woocommerce_simple_add_to_cart', array(&$this, 'woo_udraw_load_simple_upload_ui'), 30);
                                }
                            }
                        }
                    } else {
                        //if ($_udraw_settings['improved_display_options'] || (strlen($_blockProductId) > 0) ) {                                            
                            if ($product_type == "variable") {
                                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
                                remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

                                remove_action('woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30);
                                require_once("templates/frontend/uDraw-variable-add-to-cart.php");
                            } else if ($product_type == "simple") {                                
                                // If access key is defined, it found a price matrix match and we'll load up the UI and components.
                                if ($isPriceMatrix) {
                                    // Category has a price matrix assigned to it.
                                    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
                                    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

                                    remove_action('woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30);

                                    // Define static product because this is a pdf block product.
                                    if (strlen($_blockProductId) > 0) { $isStaticProduct = true; }
                                    
                                    $udrawPriceMatrix->registerScripts();
                                    $this->registerjQueryFileUpload();
                                    require_once("price-matrix/templates/frontend/price-matrix.php");                            
                                }
                            }
                        //}
                    }
                    
                } else {
                    
                    // This is a not a uDraw or PDF template, but maybe has a price matrix attached to it.     
                    // Simple products are only supported for price matrix products, as price matrix takes care of the variable pricing for you.
                    if ($product_type == "simple") {                        
                        // If access key is defined, it found a price matrix match and we'll load up the UI and components.
                        if ($isPriceMatrix) {
                            
                            // Category has a price matrix assigned to it.
                            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
                            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

                            remove_action('woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30);

                            add_action('woocommerce_simple_add_to_cart', array(&$this, 'display_price_matrix_UI'), 30);
                        } else {
                            // This is a uDraw Simple Product, but no templates selected. We will just allow file upload on a simple product.
                            $this->registerjQueryFileUpload();
                            remove_action('woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30);
                            add_action('woocommerce_simple_add_to_cart', array(&$this, 'woo_udraw_load_simple_upload_ui'), 30);
                        }
                    }
                    
                }
            }
        }
        
        private function load_designer_skin ($template_id, $skin,$displayOptionsFirst,$allowCustomerDownloadDesign,$isPriceMatrix,$templateCount,$isTemplatelessProduct,$isuDrawApparelProduct) {
            global $post;
            $override_skin = apply_filters('udraw_designer_ui_override', false, $template_id, $skin, $displayOptionsFirst,$allowCustomerDownloadDesign,$isPriceMatrix,$templateCount,$isTemplatelessProduct,$isuDrawApparelProduct);
            if (!$override_skin) {
                if ($skin === "fullscreen") {
                    $this->registerDesignerDefaultStyles();
                    require_once("designer/bootstrap-fullscreen/designer-frontend.php");
                } else if ($skin === "apparel") {
                    $this->registerDesignerApparelStyles();
                    require_once("designer/bootstrap-apparel/designer-frontend.php");
                } else if ($skin === "modern") {
                    $this->registerDesignerBeautifulStyles();
                    require_once("designer/bootstrap-beautiful/designer-frontend.php");
                } else if ($skin === "simple") {
                    $this->register_designer_simple_styles();
                    require_once("designer/bootstrap-simple/designer-frontend.php");
                }
            }
        }
        
        public function display_price_matrix_UI() 
        {
            global $post;
            $udrawPriceMatrix = new uDrawPriceMatrix();
            $udraw_price_matrix_access_key = $udrawPriceMatrix->get_product_price_matrix_key($post->ID);
            $this->registerStyles();
            $this->registerDesignerDefaultStyles();
            $udrawPriceMatrix->registerScripts();
            $isStaticProduct = true;
            require_once("price-matrix/templates/frontend/price-matrix-product.php");
            ?>
            <script>
                jQuery(document).ready(function() {
                    display_udraw_price_matrix_preview();
                    jQuery('#udraw-price-matrix-ui').fadeIn();                                
                });
            </script>
            <?php            
        }

        /**
         * Custom form data for the uDraw product. Added to the "Add To Cart" form.
         */
        public function woo_udraw_add_product_designer_form() {
            global $post;
            if (self::is_udraw_product($post->ID)) {
                ?>
                <input type="hidden" value="" name="udraw_product" />
                <input type="hidden" value="" name="udraw_product_data" />
                <input type="hidden" value="" name="udraw_product_svg" />
                <input type="hidden" value="" name="udraw_product_preview" />
                <input type="hidden" value="" name="udraw_product_cart_item_key" />
                <?php
                if (self::is_udraw_apparel_installed()) {
                    $uDrawApparel = new uDrawApparel();
                    if ($uDrawApparel->is_udraw_apparel($post->ID)) {
                        echo '<input type="hidden" value="" name="ua_ud_graphic_url" />';
                    }
                }
                ?>
                <?php
            }
        }

        public function woo_udraw_add_cart_item($cart_item) {
            return $cart_item;
        }

        /**
         * Insert extra values from form to $cart_item_meta
         */
        public function woo_udraw_add_cart_item_data($cart_item_meta, $product_id) {           
            global $woocommerce;
            
            if (self::is_udraw_product($product_id)) {
                $uDrawConnect = new uDrawConnect();
                
                // Check to see if udraw data is already defined in cart item meta array.                                
                if (isset($cart_item_meta['udraw_data'])) {
                    if (isset($cart_item_meta['udraw_data']['reorder'])) {
                        return $cart_item_meta; // This is a re-order, no need to touch cart item meta array.
                    }
                    if (isset($cart_item_meta['_ua-product'])) {
                        // This data was already defined from the uDraw Apparel plugin.
                        return $cart_item_meta; 
                    }
                }
                
                if (!file_exists(UDRAW_DESIGN_STORAGE_DIR)) {
                    wp_mkdir_p(UDRAW_DESIGN_STORAGE_DIR);
                }
                
                $cart_item_meta['udraw_data']['udraw_product'] = $_POST['udraw_product'];
                $cart_item_meta['udraw_data']['udraw_product_cart_item_key'] = $_POST['udraw_product_cart_item_key'];
                
                // Store Design Data on the file system.
                if (strlen($_POST['udraw_product_data']) > 0) {
                    $file_path = str_replace(UDRAW_STORAGE_URL, UDRAW_STORAGE_DIR, $_POST['udraw_product_data']);
                    if (file_exists($file_path)) {
                        $design_data = file_get_contents($file_path);
                    } else {
                        $design_data = base64_decode($_POST['udraw_product_data']);
                    }
                    $unid_id = uniqid();
                    $udraw_product_data_file = $unid_id . '_udf';
                    $udraw_preview_file = $unid_id . '_udp.png';
                    // Extract Images from the design and store on file system.
                    $uDrawDesignHandler = new uDrawDesignHandler();
                    $xmlStr = $uDrawDesignHandler->extract_images_from_design(UDRAW_STORAGE_DIR . '_designs_/', UDRAW_STORAGE_URL . '_designs_/', $unid_id, $design_data);                                                            
                    file_put_contents(UDRAW_STORAGE_DIR . '_designs_/' . $udraw_product_data_file, base64_encode($xmlStr));
                    $cart_item_meta['udraw_data']['udraw_product_data'] = '_designs_/' . $udraw_product_data_file;
                    $cart_item_meta['udraw_data']['udraw_product_svg'] = base64_encode($_POST['udraw_product_svg']);
                    if ($this->startsWith($_POST['udraw_product_preview'], 'data:image')) {
                        $preview_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $_POST['udraw_product_preview']));
                        file_put_contents(UDRAW_TEMP_UPLOAD_DIR . $udraw_preview_file, $preview_data);
                        $cart_item_meta['udraw_data']['udraw_product_preview'] = UDRAW_TEMP_UPLOAD_URL . $udraw_preview_file;
                    } else {
                        $cart_item_meta['udraw_data']['udraw_product_preview'] = $_POST['udraw_product_preview'];
                    }
                }
                
                                
                // PDF Blocks Options
                $cart_item_meta['udraw_data']['udraw_pdf_block_product_id'] = (isset($_POST['udraw_pdf_block_product_id'])) ? $_POST['udraw_pdf_block_product_id'] : NULL;
                if (isset($_POST['udraw_pdf_block_product_id']) && strlen($_POST['udraw_pdf_block_product_id']) > 0) {
                    // Attempt to download the thumbnail locally.
                    $previewImage = uniqid('preview') . '.png';
                    $uDrawConnect->__downloadFile($_POST['udraw_pdf_block_product_thumbnail'], UDRAW_TEMP_UPLOAD_DIR . $previewImage);
                    $cart_item_meta['udraw_data']['udraw_pdf_block_product_thumbnail'] = UDRAW_TEMP_UPLOAD_URL . $previewImage;
                    $cart_item_meta['udraw_data']['udraw_pdf_block_product_data'] = mb_convert_encoding($_POST['udraw_pdf_block_product_data'],'HTML-ENTITIES','utf-8');
                    if (isset($_POST['udraw_pdf_order_info']) && strlen($_POST['udraw_pdf_order_info']) > 0) {
                        $cart_item_meta['udraw_data']['udraw_pdf_order_info'] = $_POST['udraw_pdf_order_info'];
                    }
                }
                
                // XMPie Options
                $cart_item_meta['udraw_data']['udraw_pdf_xmpie_product_id'] = (isset($_POST['udraw_pdf_xmpie_product_id'])) ? $_POST['udraw_pdf_xmpie_product_id'] : NULL;
                if (isset($_POST['udraw_pdf_xmpie_product_id']) && strlen($_POST['udraw_pdf_xmpie_product_id']) > 0) {
                    // XMPie Currently doesn't support (Convert to PNG).
                    // We will use our own PDF->PNG process so we can show thumbnail to customer.
                    $previewImage = uniqid('preview') . '.png';
                    
                    // Pass the PDF document to remote converting server and convert to PNG document.
                    $activationKey = base64_encode(uDraw::get_udraw_activation_key() .'%%'. str_replace('.', '-', $_SERVER['HTTP_HOST']));
                    $uDrawConnect->__downloadFile(UDRAW_CONVERT_URL.'type=png&key='. $activationKey . '&document='. $_POST['udraw_pdf_xmpie_product_thumbnail'], 
                        UDRAW_TEMP_UPLOAD_DIR . $previewImage);                            
                    if (is_file(UDRAW_TEMP_UPLOAD_DIR . $previewImage)) {
                        $cart_item_meta['udraw_data']['udraw_pdf_xmpie_product_thumbnail'] = UDRAW_TEMP_UPLOAD_URL . $previewImage;
                    }
                    $cart_item_meta['udraw_data']['udraw_pdf_xmpie_product_data'] = mb_convert_encoding($_POST['udraw_pdf_xmpie_product_data'],'HTML-ENTITIES','utf-8');
                }
                
                // Attached Uploaded Files
                $cart_item_meta['udraw_data']['udraw_options_uploaded_files'] = (isset($_POST['udraw_options_uploaded_files'])) ? $_POST['udraw_options_uploaded_files'] : NULL;
                // Note if its a converted PDF design
                $cart_item_meta['udraw_data']['udraw_options_converted_pdf'] = (isset($_POST['udraw_options_converted_pdf'])) ? $_POST['udraw_options_converted_pdf'] : NULL;
                // If file structure have been uploaded
                $cart_item_meta['udraw_data']['udraw_options_uploaded_excel'] = (isset($_POST['udraw_options_uploaded_excel'])) ? $_POST['udraw_options_uploaded_excel'] : NULL;
                
                // Detect if uploaded files is a PDF document. If so, lets try to convert it to a preview image.
                if (strlen($cart_item_meta['udraw_data']['udraw_options_uploaded_files']) > 0) {
                    $uploaded_files = json_decode(stripcslashes($cart_item_meta['udraw_data']['udraw_options_uploaded_files']));
                    foreach ($uploaded_files as $upload_file) {
                        if ($this->endsWith($upload_file->url, ".pdf")) {          
                            // Pass the PDF document to remote converting server and convert to PNG document.
                            $activationKey = base64_encode(uDraw::get_udraw_activation_key() .'%%'. str_replace('.', '-', $_SERVER['HTTP_HOST']));
                            $uDrawConnect->__downloadFile(UDRAW_CONVERT_URL.'type=png&key='. $activationKey . '&document='. $upload_file->url, 
                                UDRAW_TEMP_UPLOAD_DIR . $upload_file->name . '.png');                            
                            if (is_file(UDRAW_TEMP_UPLOAD_DIR . $upload_file->name . '.png')) {
                                $cart_item_meta['udraw_data']['udraw_options_uploaded_files_preview'] = UDRAW_TEMP_UPLOAD_URL . $upload_file->name . '.png';
                            }                            
                            break;
                        }
                    }
                }
                
                $cart_item_meta = apply_filters('udraw_add_cart_item_data', $cart_item_meta);
            }
            
            return $cart_item_meta;
        }

        public function woo_udraw_get_cart_item_from_session($cart_item, $values) {
            // Check for udraw_data in session
            if (isset($values['udraw_data'])) {
                $cart_item['udraw_data'] = $values['udraw_data'];
            }

            // Check if item is uDraw product
            if (isset($cart_item['udraw_data'])) {
                $this->woo_udraw_add_cart_item($cart_item);
            }
            return $cart_item;
        }

        public function woo_udraw_get_item_data($other_data, $cart_item) {
            // Get uDraw Data           
            $udraw_data = $cart_item['udraw_data'];
            
            if (isset($udraw_data)) {
                $other_data = apply_filters('udraw_get_item_data', $other_data, $udraw_data);
            }
            // Make sure that the uDraw product contains the design data.
            if ( (isset($udraw_data['udraw_product_data']) && $udraw_data['udraw_product_data']) ||
                 (isset($udraw_data['udraw_pdf_block_product_id'])) || (strlen($udraw_data['udraw_options_uploaded_files']) > 0) || isset($udraw_data['udraw_options_uploaded_excel'])) {
                                
                if (isset($cart_item['udraw_data'])) {
                    
                    global $woocommerce;
                    //get cart item key
                    foreach ($woocommerce->cart->get_cart() as $cart_item_key => $values) {
                        if ($values === $cart_item) {
                            $cik = $cart_item_key;
                        }
                    }
                    
                    if (isset($udraw_data['udraw_options_uploaded_files']) && strlen($udraw_data['udraw_options_uploaded_files']) > 0) {
                        $uploaded_files = json_decode(stripcslashes($udraw_data['udraw_options_uploaded_files']));
                        foreach ($uploaded_files as $upload_file) {
                            array_push($other_data, array('name' => "Attached", 'value' => $upload_file->name));
                        }
                    } else if (isset($udraw_data['udraw_options_uploaded_excel'])) {
                        $excelFiles = json_decode(stripcslashes($udraw_data['udraw_options_uploaded_excel']));
                        if ($excelFiles && strlen($excelFiles->filename) > 0) {
                            array_push($other_data, array('name' => "Attached", 'value' => $excelFiles->filename));
                        }
                    } else {
                        if (isset($udraw_data['udraw_pdf_order_info'])) {
                            if (strlen($udraw_data['udraw_pdf_order_info']) > 0) {
                                $pdf_order_info = json_decode(stripcslashes($udraw_data['udraw_pdf_order_info']));
                                if (gettype($pdf_order_info) == "array") {
                                    for ($x = 0; $x < count($pdf_order_info); $x++) {
                                        array_push($other_data, array(
                                            'name' => $pdf_order_info[$x]->name,
                                            'value' => $pdf_order_info[$x]->value
                                        ));  
                                    }
                                }
                            }
                        }
                        
                        $displayOptionsFirst = get_post_meta($cart_item['product_id'], '_udraw_display_options_page_first', true); 
                        // Disable  'Update Design' feature if option '_udraw_display_options_page_first' is enabled.
                        
                        if ($displayOptionsFirst != "yes") {
                            array_push($other_data, array(
                                'name' => 'Design',
                                'value' => '<a href="' . esc_url(add_query_arg(array('cart_item_key' => $cik), get_permalink($cart_item['product_id']))) . '">Update</a>'
                            ));                        
                        }
                    }
                }
            }
            
            if (isset($cart_item['udraw_data'])) {
                $other_data = apply_filters('udraw_add_cart_item_meta', $other_data, $udraw_data);
            }
            
            return $other_data;
        }
        
        /**
         * Action to handle cart data before showing it to the customer. 
         * If the customer is updating the product, we will remove the new cart item and merge it's data to the original cart item.
         * This is really the only way to update the product meta data with out creating a new cart item.
         */
        public function woo_udraw_add_to_cart($cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data) 
        {
            global $woocommerce;
            if (isset($cart_item_data['udraw_data'])) {
                if (isset($cart_item_data['udraw_data']['udraw_product_cart_item_key'])) {                        
                    if (strlen($cart_item_data['udraw_data']['udraw_product_cart_item_key']) > 1 ) {
                        // This item is an update item.
                        $orig_cart_item_key = $cart_item_data['udraw_data']['udraw_product_cart_item_key'];
                        
                        $foundMatch = false;
                        foreach ($woocommerce->cart->get_cart() as $key => $values) {
                            if ($key == $orig_cart_item_key) {
                                // Found original item. 
                                $foundMatch = true;
                            }
                        }
                        
                        
                        if ($foundMatch) {
                            // remove original cart item and add the new one.
                            $woocommerce->cart->remove_cart_item($orig_cart_item_key);
                        }
                    }
                }
            }
        }
        
        public function woo_udraw_cart_item_product($product, $cart_item, $cart_item_key) {
            return $product;
        }    
        
        public function woo_udraw_after_order_details($order) {
            global $woocommerce;
            if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                $order_id = $order->get_id();
            } else {
                $order_id = $order->id;
            }
            wp_register_script('udraw_base64_js', plugins_url('assets/Base64.js', __FILE__));
            wp_enqueue_script('udraw_base64_js');
            
            $udrawSettings = new uDrawSettings();
            $uDrawUtil = new uDrawUtil();
            $_udraw_settings = $udrawSettings->get_settings();
            $fbAppId = $_udraw_settings['designer_facebook_app_id'];
            $orderItems = $order->get_items();
            $status = get_post_status($order->get_id());
            echo '<h2 style="padding-top: 25px;">Download Files</h2>';
            echo '<table class="shop_table download_files"><tbody>';
            foreach($orderItems as $key => $product) {
                $item_id = $key;
                $product_id = ($product['variation_id']) ? $product['variation_id'] : $product['product_id'];
                $downloadable = get_post_meta( $product_id, '_udraw_allow_post_payment_download', true );
                if ($downloadable === 'yes') {
                    //unserialize($orderItem['udraw_data'])['udraw_product_data'] == data-product in admin->order
                    $udraw_product_data = unserialize($product['udraw_data'])['udraw_product_data'];
                    $_png_path = unserialize($product['udraw_data'])['udraw_product_preview'];
                    $_pdf_path = wc_get_order_item_meta($item_id, '_udraw_pdf_path', true);
                    $_jpg_path = wc_get_order_item_meta($item_id, '_udraw_product_jpg', true);
                    echo '<tr>';
                    echo '<td><label>'.$product["name"].'</label></td>';
                    echo '<td>';
                    if (strlen(unserialize($product['udraw_data'])['udraw_options_uploaded_excel'])) {
                        $order_dir = UDRAW_ORDERS_DIR.'uDraw-Order-'.$order_id.'-'.$item_id;
                        if (file_exists($order_dir)) {
                            if (!$uDrawUtil->is_dir_empty($order_dir)) {
                                echo '<a href="#" onclick="javascript: download_package('.$order_id.','.$item_id.'); return false;">Download PDF package</a>';
                            } else {
                                echo '<label>Sorry, PDF download is currently unavailable.</label>';
                            }
                        } else {
                            echo '<label>Sorry, PDF download is currently unavailable.</label>';
                        }
                    } else {
                        if (strlen($_pdf_path) > 0) {
                            echo '<a href="#" onclick="window.open(\''.$_pdf_path.'\'); return false;">Download PDF</a>';
                        } else {
                            echo '<label>Sorry, PDF download is currently unavailable.</label>';
                        }
                    }
                    echo '</td>';
                    echo '<td><a href="#" onclick="window.open(\''.$_png_path.'\'); return false;">Download PNG</a></td>';
                    if (strlen($_jpg_path) > 0) {
                        echo '<td><a href="#" onclick="window.open(\''.$_jpg_path.'\'); return false;">Download JPG</a></td>';
                    } else {
                        echo '<td><label>Sorry, JPG download is currently unavailable.</label></td>';
                    }
                    echo '<td>';
                    //Share PNG
                    if (strlen($fbAppId) > 0) {
                        ?>
                        <div class="fb-share-button" data-href="<?php echo $_png_path ?>" data-layout="button" data-mobile-iframe="true" style="padding-bottom: 5px;"></div>
                        <div id="fb-root"></div>
                        <script>
                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=<?php echo $fbAppId ?>";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                        </script>
                        <?php
                    }
                    ?>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $_png_path ?>" data-text="My design | ">Tweet</a>
                    <a data-pin-do="buttonBookmark" data-pin-custom="true" data-pin="true" href="https://www.pinterest.com/pin/create/button/" style="display: block;"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_28.png" /></a>
                    <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                    <script type="IN/Share" data-url="<?php echo $_png_path ?>"></script>
                    <a href="mailto:?body=<?php echo $_png_path ?>" class="button" style="padding: 10px; height: initial;" onclick="window.open(this.href, 'Email',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); open_email_tip(this); return false;"><span style="font-size: 12px;">Email</span></a>
                    <span class="email-tip" style="font-size: 10px; line-height: 1.5em; display: none;"><?php echo _e('Be sure that an email handler is set in your browser settings.', 'udraw')?></span>
                    <?php
                    echo '</td>';
                    echo '</tr>';
                }
            }
            echo '</tbody></table>';
            ?>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            <script async defer src="//assets.pinterest.com/js/pinit.js"></script>
            <script>
                function open_email_tip(element) {
                    setTimeout(function(){
                        jQuery(element).siblings('.email-tip').css('display','inline-block');
                    }, 1000);
                }
                function download_package(order_id, item_id) {
                    var order_dir = '<?php echo str_replace('\\', '\\\\', UDRAW_ORDERS_DIR); ?>';
                    var order_url = '<?php echo str_replace('\\', '\\\\', UDRAW_ORDERS_URL); ?>';
                    var uniqueID = '<?php echo uniqid() ?>';

                    var destination_dir = order_dir + 'uDraw-Order-' + order_id + '-' + item_id + '-' + uniqueID + '.zip';
                    var destination_url = order_url + 'uDraw-Order-' + order_id + '-' + item_id + '-' + uniqueID + '.zip';
                    jQuery.ajax({
                        url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
                        data: {
                            action: 'udraw_package_excel_designs',
                            target_dir: Base64.encode(order_dir + 'uDraw-Order-' + order_id + '-' + item_id + '/'),
                            destination: destination_dir,
                            overwrite: true
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if (response) {
                                window.open(destination_url);
                            } else {
                                window.alert("An error had occurred.");
                            }
                        }
                    });
                };
            </script>
            <?php
        }
        
        /**
         * Update product image if uDraw product on the cart page.
         * 
         * @param type $image
         * @param type $cart_item
         * @return type
         */
        public function woo_udraw_cart_item_thumbnail($image, $cart_item, $cart_item_key) {
            // Support for variations and uDraw data
            $url_params = array();
            if (count($cart_item['variation']) > 0) {
                if (is_array($cart_item['variation'])) {
                    $url_params = $cart_item['variation'];   
                } else {
                    array_push($url_params, $cart_item['variation']);
                }
            }
            
            array_push($url_params, array('cart_item_key' => $cart_item_key));           
            if (isset($cart_item['udraw_data'])) {
                $udraw_data = $cart_item['udraw_data'];
                
                if (isset($cart_item['udraw_data']['udraw_options_uploaded_files']) && strlen($cart_item['udraw_data']['udraw_options_uploaded_files']) > 0) {
                    // Uploaded Thumbnail
                    // TODO: Make this optional.                    
                    $uploaded_files = json_decode(stripcslashes($cart_item['udraw_data']['udraw_options_uploaded_files']));
                    
                    if (!$this->endsWith(strtolower($uploaded_files[0]->url), ".pdf")) {
                        if ($this->endsWith(strtolower($uploaded_files[0]->url), "png") || $this->endsWith(strtolower($uploaded_files[0]->url), "jpg") ||
                            $this->endsWith(strtolower($uploaded_files[0]->url), "jpeg") || $this->endsWith(strtolower($uploaded_files[0]->url), "gif") ) {
                            $thumbnail = '<a href="' . esc_url(add_query_arg($url_params, get_permalink($cart_item['product_id']))) . '">';
                            $thumbnail .= '<img src="'. $uploaded_files[0]->url .'" class="attachment-shop_thumbnail wp-post-image" alt="uDraw Product" style="width:250px;" />';
                            $thumbnail .= '</a>';
                            return $thumbnail;
                        } else {
                            return $image;
                        }
                    }
                    
                    // Use converted PDF preview image
                    if (strlen($cart_item['udraw_data']['udraw_options_uploaded_files_preview']) > 0) {
                        $thumbnail = '<a href="' . esc_url(add_query_arg($url_params, get_permalink($cart_item['product_id']))) . '">';
                        $thumbnail .= '<img src="'. $cart_item['udraw_data']['udraw_options_uploaded_files_preview'] .'" class="attachment-shop_thumbnail wp-post-image" alt="uDraw Product" style="width:250px;" />';
                        $thumbnail .= '</a>';
                        return $thumbnail;
                    }
                } else if (isset($udraw_data['udraw_pdf_block_product_thumbnail']) && strlen($udraw_data['udraw_pdf_block_product_thumbnail']) > 0) {
                    // PDF Block Thumbnail
                    $thumbnail = '<a href="' . esc_url(add_query_arg($url_params, get_permalink($cart_item['product_id']))) . '">';
                    $thumbnail .= '<img src="'. $udraw_data['udraw_pdf_block_product_thumbnail'] .'" class="attachment-shop_thumbnail wp-post-image" alt="uDraw Product" style="width:250px;">';
                    $thumbnail .= '</a>';
                    return $thumbnail;
                } else if (isset($udraw_data['udraw_pdf_xmpie_product_thumbnail']) && strlen($udraw_data['udraw_pdf_xmpie_product_thumbnail']) > 0) {
                    // XMPie Block Thumbnail
                    $thumbnail = '<a href="' . esc_url(add_query_arg($url_params, get_permalink($cart_item['product_id']))) . '">';
                    $thumbnail .= '<img src="'. $udraw_data['udraw_pdf_xmpie_product_thumbnail'] .'" class="attachment-shop_thumbnail wp-post-image" alt="uDraw Product" style="width:250px;">';
                    $thumbnail .= '</a>';
                    return $thumbnail; 
                } else if ($udraw_data['udraw_product_preview']) {
                    // uDraw Designer Thumbnail
                    $thumbnail = '<a href="' . esc_url(add_query_arg($url_params, get_permalink($cart_item['product_id']))) . '">';
                    $thumbnail .= '<img src="'. $udraw_data['udraw_product_preview'] .'" class="attachment-shop_thumbnail wp-post-image" alt="uDraw Product" style="width:250px;">';
                    $thumbnail .= '</a>';
                    return $thumbnail;
                } else {
                    return $image;
                }
            }
            
            // Default Image, If didn't find any uDraw related product images thumbnails.
            return $image;
        }
        
        /**
         * Update product name if uDraw Product on the cart page.
         * 
         * @param type $name
         * @param type $cart_item
         * @param type $cart_item_key
         * @return type
         */
        public function woo_udraw_cart_item_name($name, $cart_item, $cart_item_key) {
            global $woocommerce;
            // Support for variations and uDraw data
            $url_params = array();
            if (count($cart_item['variation']) > 0) {
                if (is_array($cart_item['variation'])) {
                    $url_params = $cart_item['variation'];   
                } else {
                    array_push($url_params, $cart_item['variation']);
                }
            }
            
            array_push($url_params, array('cart_item_key' => $cart_item_key));
            
            if (isset($cart_item['udraw_data'])) {
                if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                    $_post = get_post( $cart_item['data']->get_id() );
                } else {
                    $_post = $cart_item['data']->post;
                }
                return sprintf('<a href="%s">%s</a>', esc_url(add_query_arg($url_params, get_permalink($cart_item['product_id']))), $_post->post_title);
            } else {
                return $name;
            }
        }
        
        /**
         * Code executed after cart template has loaded.
         */
        public function woo_udraw_after_cart() {
            
            // Remove the link of the images on the cart page. 
            // I had to do this becasue there was no filter to override url for thumbnail.  
            //echo "<script>jQuery('.product-thumbnail a').removeAttr('href').css('cursor','default');</script>";
            echo "<script>jQuery('input[type=number]').css('width', '60px');</script>";
        }
        
        /**
         * Add order meta from the cart
         */
        public function woo_udraw_add_order_item_meta( $item_id, $values ) {
            global $woocommerce;
            if( isset( $values['udraw_data']) ) {
                if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                    wc_add_order_item_meta($item_id, 'udraw_data', $values['udraw_data']);
                } else {
                    woocommerce_add_order_item_meta( $item_id, 'udraw_data', $values['udraw_data'] );
                }
                $udraw_data = $values['udraw_data'];
                $uploaded_files = (isset($udraw_data['udraw_options_uploaded_files'])) ? json_decode(stripcslashes($udraw_data['udraw_options_uploaded_files'])) : NULL;
                if (count($uploaded_files) > 0) {
                    foreach ($uploaded_files as $upload_file) {
                        if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                            wc_add_order_item_meta($item_id, "Attached (" . $upload_file->name . ")" ,
                                                   "<a href='". $upload_file->url ."'>Download</a>", false);
                        } else {
                            woocommerce_add_order_item_meta($item_id, "Attached (" . $upload_file->name . ")" ,
                                                   "<a href='". $upload_file->url ."'>Download</a>", false);
                        }
                    }
                }
                if (isset($udraw_data['udraw_options_uploaded_excel'])) {
                    $excelFile = json_decode(stripcslashes($udraw_data['udraw_options_uploaded_excel']));
                    if (gettype($excelFile) == 'object' && strlen($excelFile->filename) > 0) {
                        if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                            wc_add_order_item_meta($item_id, "Attached (" . $excelFile->filename . ")" , "<a href='". $excelFile->path ."'>Download</a>", false);
                        } else {
                            woocommerce_add_order_item_meta($item_id, "Attached (" . $excelFile->filename . ")" , "<a href='". $excelFile->path ."'>Download</a>", false);
                        }
                    }
                }
                if (isset($udraw_data['udraw_pdf_order_info'])) {
                    if (strlen($udraw_data['udraw_pdf_order_info']) > 0) {
                        $pdf_order_info = json_decode(stripcslashes($udraw_data['udraw_pdf_order_info']));
                        if (gettype($pdf_order_info) == "array") {
                            for ($x = 0; $x < count($pdf_order_info); $x++) {
                                if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                                    wc_add_order_item_meta($item_id,$pdf_order_info[$x]->name, $pdf_order_info[$x]->value, false);
                                } else {
                                    woocommerce_add_order_item_meta($item_id,$pdf_order_info[$x]->name, $pdf_order_info[$x]->value, false);
                                }
                            }
                        }
                    }
                }
                do_action('udraw_add_order_item_meta', $item_id, $values, $udraw_data);
            }
        }
        
        /**
         * Filter for Order Detials on Frontend so Customers can view their design instead of default template for their orders.
         */
        public function woo_udraw_order_item_name($default , $item) {
            global $woocommerce;
            if( isset( $item['udraw_data']) ) {
                if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
                    $udrawData = $item['udraw_data'];
                } else {
                    $udrawData = unserialize($item['udraw_data']);
                }
                $custom_thumbnail = apply_filters('udraw_order_item_name', $default, $udrawData, $item);
                if ($custom_thumbnail !== $default) {
                    return $custom_thumbnail;
                }
                
                if (isset($udrawData['udraw_price_matrix_name'])) {
                    $udrawPriceMatrix = new uDrawPriceMatrix();
                    return $udrawPriceMatrix->order_item_thumbnail( $default, $item);
                } else {
                    
                    $thumbnail = $default . '<br />';
                    
                    // Handle 1st uploaded image as thumbnail.
                    if (isset($udrawData['udraw_options_uploaded_files'])) {
                        $uploaded_files = json_decode(stripcslashes($udrawData['udraw_options_uploaded_files']));
                        
                        if (count($uploaded_files) > 0 && !$this->endsWith(strtolower($uploaded_files[0]->url), ".pdf")) {
                            if ($this->endsWith(strtolower($uploaded_files[0]->url), "png") || $this->endsWith(strtolower($uploaded_files[0]->url), "jpg") ||
                                $this->endsWith(strtolower($uploaded_files[0]->url), "jpeg") || $this->endsWith(strtolower($uploaded_files[0]->url), "gif") ) {
                                $thumbnail = '<a href="' . esc_url(add_query_arg($url_params, get_permalink($cart_item['product_id']))) . '">';
                                $thumbnail .= '<img src="'. $uploaded_files[0]->url .'" class="attachment-shop_thumbnail wp-post-image" alt="uDraw Product" style="max-width:240px; max-height:140px;" />';
                                $thumbnail .= '</a>';
                                return $default . '<br />' . $thumbnail;
                            }
                        }   
                    }
                    
                    if (isset($udrawData['udraw_pdf_block_product_thumbnail']) && strlen($udrawData['udraw_pdf_block_product_thumbnail']) > 0) {
                        // PDF Block Thumbnail
                        return $default . '<br />' . '<img style="max-width:440px;max-height:340px;" src="'. $udrawData['udraw_pdf_block_product_thumbnail'] .'" class="attachment-shop_thumbnail wp-post-image" alt="uDraw Product">';
                    } else if (isset($udrawData['udraw_pdf_xmpie_product_thumbnail']) && strlen($udrawData['udraw_pdf_xmpie_product_thumbnail']) > 0) {
                        // XMPie Thumbnail
                        return $default . '<br />' . '<img style="max-width:440px;max-height:340px;" src="'. $udrawData['udraw_pdf_xmpie_product_thumbnail'] .'" class="attachment-shop_thumbnail wp-post-image" alt="uDraw Product">';
                    } else if (isset($udrawData['udraw_options_uploaded_files_preview']) && strlen($udrawData['udraw_options_uploaded_files_preview']) > 0) {
                        // Uploaded PDF preview image
                        return $default . '<br />' . '<img style="max-width:440px;max-height:340px;" src="'. $udrawData['udraw_options_uploaded_files_preview'] .'" class="attachment-shop_thumbnail wp-post-image" alt="'. $item['name'] .'">';
                    } else {
                        if (isset($udrawData['udraw_product_preview']) && strlen($udrawData['udraw_product_preview']) > 0) {
                        // uDraw Designer Thumbnail
                            return $default . '<br />' . '<img style="max-width:240px;max-height:140px;" src="'. $udrawData['udraw_product_preview'] .'" class="attachment-shop_thumbnail wp-post-image" alt="'. $item['name'] .'">';
                        }
                        return $default . '<br />' . '<img style="max-width:440px;max-height:340px;" src="'. $udrawData['udraw_product_preview'] .'" class="attachment-shop_thumbnail wp-post-image" alt="'. $item['name'] .'">';
                    }
                }
                
            } else {
                return $default;
            }            
        }
        
        public function woo_order_item_quantity_html($default, $item) {
            global $woocommerce;
            if( isset( $item['udraw_data']) ) {
                if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
                    $udrawData = $item['udraw_data'];
                } else {
                    $udrawData = unserialize($item['udraw_data']);
                }
                if (isset($udrawData['udraw_price_matrix_qty'])) {
                    if (strlen($udrawData['udraw_price_matrix_qty']) > 0) { return ''; }
                }
            }
            
            return $default;
        }
        
        /**
         * Filter for cart item data when customer wants to re-order their previous order.
         */
        public function woo_udraw_order_again_cart_item_data ( $array, $item, $order ) {
            global $woocommerce;
            if( isset( $item['udraw_data']) ) {
                if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
                    $udrawData = $item['udraw_data'];
                } else {
                    $udrawData = unserialize($item['udraw_data']);
                }
                $udrawData['reorder'] = true;
                $udrawDataArray = array();
                $udrawDataArray['udraw_data'] = $udrawData;
                return $udrawDataArray;                
            }
            return $array;            
        }    
        
        /**
         * Filter for product visibility. This will hide private products.
         */
        public function woo_udraw_loop_shop_product() {
            global $product, $woocommerce;
            if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
                $product_id = $product->get_id();
            } else {
                $product_id = $product->id;
            }
            if (get_post_meta($product_id, '_udraw_is_private_product', true) == "yes") {                
                $product = null;
            }
        }
        public function woo_udraw_product_is_visible($visible, $id) {
            global $udraw_is_private_list;
            
            if (isset($udraw_is_private_list)) { return $visible; }
            
            if (get_post_meta($id, '_udraw_is_private_product', true) == "yes") {                
                $visible = false;
            }
            return $visible;
        }
        
        public function woo_udraw_is_purchasable($purchasable, $product) {
            global $woocommerce;
            if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
                $product_type = $product->get_type();
                $product_id = $product->get_id();
            } else {
                $product_type = $product->product_type;
                $product_id = $product->id;
            }
            $udrawPriceMatrix = new udrawPriceMatrix();
            $udraw_price_matrix_key = $udrawPriceMatrix->get_product_price_matrix_key($product_id);
            if ($product_type == "simple") {
                if (strlen($udraw_price_matrix_key) > 0) {
                   return true;
                }
            }
            return $purchasable;
        }
        

        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//
        // ------------------ Wordpress Frontend Methods ------------------------ //
        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//        

        public function udraw_wp_nav_menu_objects($sorted_menu_items, $args) {
            $udrawSettings = new uDrawSettings();
            $_udraw_settings = $udrawSettings->get_settings();
            
            $current_user = wp_get_current_user();
            if ( !($current_user instanceof WP_User) )
                return $sorted_menu_items;            
            
            // Look for Private Template Page. If user is not logged in remove it from menu.
            // Also if user is logged in, but doesn't have any private templates, we should also remvoe it.
            $_private_template_page_id = $_udraw_settings['udraw_private_template_page_id'];
            $_private_template_to_remove = -1;
            
            $_customer_saved_design_page_id = $_udraw_settings['udraw_customer_saved_design_page_id'];
            $_customer_saved_to_remove = -1;
            
            for ($x = 1; $x <= count($sorted_menu_items); $x++) {
                
                // Handle Priavte Template Menu Item.
                if ($sorted_menu_items[$x]->object_id == $_private_template_page_id) {
                    if ($current_user->ID == 0) {
                        // User is not logged in.
                        $_private_template_to_remove = $x; break;
                    } else {
                        // User is logged in. We will check to see if they have any private templates.                        
                        if (!$this->user_has_private_templates($current_user->ID)) {
                            // User doesn't have any private templates. We will hide this menu.
                            $_private_template_to_remove = $x; break;
                        }
                    }                    
                }
            }
            
            for ($x = 1; $x <= count($sorted_menu_items); $x++) {
                // Handle Customer Template Menu Item.
                if ($sorted_menu_items[$x]->object_id == $_customer_saved_design_page_id) {
                    if ($current_user->ID == 0) {
                        // User is not logged in.
                        $_customer_saved_to_remove = $x; break;
                    } else {
                        // User is logged in. We will check to see if they have any saved designs.
                        if (!$this->user_has_saved_designs($current_user->ID)) {
                            // User doesn't have any saved designs. We will hide this menu.
                            $_customer_saved_to_remove = $x; break;
                        }
                    }                    
                }                
            }
            
            // Remove any page id, if needed.
            if ($_private_template_to_remove > 0) {
                unset($sorted_menu_items[$_private_template_to_remove]);
            }
            
            if ($_customer_saved_to_remove > 0) {
                unset($sorted_menu_items[$_customer_saved_to_remove]);
            }
            
            return $sorted_menu_items;
        }
        
        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//
        // ------------------------ Helper Methods ------------------------------ //
        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//
		
        public function startsWith($haystack, $needle) {
            // search backwards starting from haystack length characters from the end
            return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
        }
        
        public function endsWith($haystack, $needle) {
            // search forward starting from end minus needle length characters
            return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
        }
        
        public function generateRandomString($length = 18) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }        
        
		function udraw_dequeue_scripts() {
			if (function_exists("get_current_screen") && !is_null(get_current_screen())) {
				$_base_page = get_current_screen()->base;
				
				if ($_base_page == "udraw_page_udraw_add_template" || $_base_page == "admin_page_udraw_modify_template") {				
					// DeQueue some conflicting scripts.
					wp_dequeue_script("cloudfw-functions");
					wp_dequeue_script("cloudfw-script");	
				}
			}
			/*
			else {			
				if (get_post_type() == "product") {
						// DeQueue some conflicting scripts.
						wp_dequeue_script("cloudfw-functions");
						wp_dequeue_script("cloudfw-script");	
				}
			}*/
		}
        
        public function register_designer_min_js()
        {
            wp_register_script('udraw_designer_js', plugins_url('designer/includes/js/Designer.min.js', __FILE__));
            wp_enqueue_script('udraw_designer_js');
        }

        public function register_designer_threed_min_js()
        {
            wp_register_script('udraw_designer_threed_js', plugins_url('designer/includes/js/Designer3D.min.js', __FILE__));
            wp_enqueue_script('udraw_designer_threed_js');
        }

        public function registerScripts() {
            // Register Scripts
            wp_register_script('udraw_webfont_js', UDRAW_WEBFONT_JS);

            // Enqueue Scripts
            $this->register_jquery_ui();
            wp_enqueue_script('udraw_webfont_js');   
        }

        public function registerStyles() {
            // Register Styles
            wp_register_style('udraw_bootstrap_css', UDRAW_BOOTSTRAP_CSS);
            wp_register_style('udraw_bootstrap_theme_css', plugins_url('designer/includes/css/udraw-bootstrap-theme.css', __FILE__));
            wp_register_style('udraw_jquery_css', UDRAW_JQUERY_UI_CSS);
            wp_register_style('udraw_jquery_theme_css', UDRAW_JQUERY_UI_THEME_CSS);
            wp_register_style('udraw_fontawesome_css', UDRAW_FONTAWESOME_CSS);
            wp_register_style('udraw_designer_css', plugins_url('designer/includes/css/Designer.min.css', __FILE__));
            wp_register_style('udraw_common_css' , plugins_url('assets/includes/uDraw.css', __FILE__));

            // Enqueue Styles
            wp_enqueue_style('udraw_bootstrap_css');
            wp_enqueue_style('udraw_bootstrap_theme_css');
            wp_enqueue_style('udraw_jquery_css');
            wp_enqueue_style('udraw_jquery_theme_css');
            wp_enqueue_style('udraw_fontawesome_css');
            wp_enqueue_style('udraw_designer_css');
            wp_enqueue_style('udraw_common_css');         
        }
        
        public function registerDesignerDefaultStyles(){
            wp_register_style('udraw_designer_ui_css' , plugins_url('designer/includes/css/designer.css', __FILE__));
            wp_register_script('udraw_designer_resize_ui_js', plugins_url('designer/includes/js/resizeFullscreenDesigner.js', __FILE__));
            wp_enqueue_style('udraw_designer_ui_css');
            wp_enqueue_script('udraw_designer_resize_ui_js');
        }
        
        public function registerDesignerBeautifulStyles(){
            wp_register_style('udraw_designer_ui_css' , plugins_url('designer/includes/css/designer-beautiful.css', __FILE__));
            wp_register_script('udraw_designer_resize_ui_js', plugins_url('designer/includes/js/resizeBeautifulDesigner.js', __FILE__));
            wp_enqueue_style('udraw_designer_ui_css');
            wp_enqueue_script('udraw_designer_resize_ui_js');
        }
        
        public function registerDesignerApparelStyles() {
            wp_register_style('udraw_designer_ui_css' , plugins_url('designer/includes/css/designer-apparel.css', __FILE__));
            wp_register_script('udraw_designer_resize_ui_js', plugins_url('designer/includes/js/resizeApparelDesigner.js', __FILE__));
            wp_enqueue_style('udraw_designer_ui_css');
            wp_enqueue_script('udraw_designer_resize_ui_js');
        }
        
        public function register_designer_simple_styles() {
            wp_register_style('udraw_designer_ui_css' , plugins_url('designer/bootstrap-simple/simple_designer_css.css', __FILE__));
            wp_register_script('udraw_designer_resize_ui_js', plugins_url('designer/bootstrap-simple/simple_designer_js.js', __FILE__));
            wp_enqueue_style('udraw_designer_ui_css');
            wp_enqueue_script('udraw_designer_resize_ui_js');
        }
        
        public function registerChosenJS()
        {
            wp_register_style('udraw_chosen_css', UDRAW_CHOSEN_CSS);
            wp_register_script('udraw_chosen_js', UDRAW_CHOSEN_JS);
            
            wp_enqueue_style('udraw_chosen_css');
            wp_enqueue_script('udraw_chosen_js');
        }
        
        public function registerSelect2JS()
        {
            wp_register_style('udraw_select2_css', UDRAW_SELECT2_CSS);
            wp_register_script('udraw_select2_js', UDRAW_SELECT2_JS);
            
            wp_enqueue_style('udraw_select2_css');
            wp_enqueue_script('udraw_select2_js');
        }
        
        public function registerFontAwesome()
        {
            wp_register_style('udraw_fontawesome_css', UDRAW_FONTAWESOME_CSS);
            wp_enqueue_style('udraw_fontawesome_css');
        }
        
        public function registerAceJS()
        {
            wp_register_script('udraw_ace_js', UDRAW_ACE_JS);
            wp_register_script('udraw_ace_mode_javascript_js', UDRAW_ACE_MODE_JAVASCRIPT_JS);
            wp_register_script('udraw_ace_mode_css_js', UDRAW_ACE_MODE_CSS_JS);
            wp_register_script('udraw_ace_theme_chrome_js', UDRAW_ACE_THEME_CHROME_JS);
            wp_register_script('udraw_ace_worker_javascript_js', UDRAW_ACE_WORKER_JAVASCRIPT_JS);
            wp_register_script('udraw_ace_worker_css_js', UDRAW_ACE_WORKER_CSS_JS);

            wp_enqueue_script('udraw_ace_js');
            wp_enqueue_script('udraw_ace_mode_javascript_js');
            wp_enqueue_script('udraw_ace_mode_css_js');
            wp_enqueue_script('udraw_ace_theme_chrome_js');
            wp_enqueue_script('udraw_ace_worker_javascript_js');
            wp_enqueue_script('udraw_ace_worker_css_js');
        }

        public function registerImageCropper()
        {
            wp_register_script('udraw_image_cropper_js', UDRAW_IMAGE_CROPPER_JS);
            wp_register_style('udraw_image_cropper_css', UDRAW_IMAGE_CROPPER_CSS);

            wp_enqueue_script('udraw_image_cropper_js');
            wp_enqueue_style('udraw_image_cropper_css');
        }
        
        public function registerPanzoomJS()
        {
            wp_register_script('udraw_panzoom_js', UDRAW_PANZOOM_JS);

            wp_enqueue_script('udraw_panzoom_js');
        }

        public function registerjQueryFileUpload() {
            $udrawSettings = new uDrawSettings();
            $_udraw_settings = $udrawSettings->get_settings();
            
            wp_register_style('udraw_custom_fonts_css', admin_url( 'admin-ajax.php' ) . '?action=udraw_designer_local_fonts_css&localFontPath='. wp_make_link_relative(UDRAW_FONTS_URL));
            wp_register_style('udraw_fileuploader_css', plugins_url('assets/jquery-fileupload/jquery.fileupload.css', __FILE__));
            
            wp_register_script('udraw_fileuploader_js', plugins_url('assets/jquery-fileupload/jquery.fileupload.js', __FILE__));
            wp_register_script('udraw_iframe-transport_js', plugins_url('assets/jquery-fileupload/jquery.iframe-transport.js', __FILE__));
            wp_register_script('udraw_xdr-transport_js', plugins_url('assets/jquery-fileupload/jquery.xdr-transport.js', __FILE__));   
            
            $this->register_jquery_css();
            wp_enqueue_style('udraw_custom_fonts_css');
            wp_enqueue_style('udraw_fileuploader_css');
            
            $this->register_jquery_ui();
            wp_enqueue_script('udraw_iframe-transport_js');
            wp_enqueue_script('udraw_xdr-transport_js');
            wp_enqueue_script('udraw_fileuploader_js');
        }
        
        public function registerXMPieColourPicker() {
            wp_register_style('udraw_xmpie_colour_picker_css', plugins_url('assets/ColorPicker/jquery.colorpicker.css', __FILE__));
            wp_register_script('udraw_xmpie_colour_picker_js', plugins_url('assets/ColorPicker/jquery.colorpicker.js', __FILE__));
            
            wp_enqueue_style('udraw_xmpie_colour_picker_css');
            wp_enqueue_script('udraw_xmpie_colour_picker_js');
            
            //Also include wp color picker
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'wp-color-picker' );
        }
        
        public function registerJQueryTagsInput() 
        {
            wp_register_style('udraw_tags_input_css', UDRAW_TAGS_INPUT_CSS);
            wp_register_script('udraw_tags_input_js', UDRAW_TAGS_INPUT_JS);
            
            wp_enqueue_style('udraw_tags_input_css');
            wp_enqueue_script('udraw_tags_input_js');            
        }
        
        public function registerBootstrapJS() {
            wp_register_script('udraw_bootstrap_js', UDRAW_BOOTSTRAP_JS);
            wp_enqueue_script('udraw_bootstrap_js');            
        }
        
        public function registerChecklistUI() {
            wp_register_script('udraw_checklist_js', UDRAW_CHECKLIST_JS);
            wp_enqueue_script('udraw_checklist_js');     
        }

        public function registerPDFBlocksJS() {
            wp_register_script('udraw_pdf_blocks_js', plugins_url('pdf-blocks/includes/js/pdf-blocks.js', __FILE__));
            wp_register_script('udraw_base64_js', plugins_url('assets/webtoolkit.base64.js', __FILE__));
            
            wp_enqueue_script('udraw_pdf_blocks_js');            
            wp_enqueue_script('udraw_base64_js');            
        }
        public function registerPDFXmPieJS() {
            wp_register_script('udraw_pdf_xmpie_js', plugins_url('pdf-xmpie/includes/js/pdf-xmpie.js', __FILE__));
            wp_register_script('udraw_base64_js', plugins_url('assets/webtoolkit.base64.js', __FILE__));
            
            wp_enqueue_script('udraw_pdf_xmpie_js');            
            wp_enqueue_script('udraw_base64_js');
            //Also enqueue wp-color-picker, but do so manually
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script(
                'iris',
                admin_url( 'js/iris.min.js' ),
                array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
                false,
                1
            );
            wp_enqueue_script(
                'wp-color-picker',
                admin_url( 'js/color-picker.min.js' ),
                array( 'iris' ),
                false,
                1
            );
            $colorpicker_l10n = array(
                'clear' => __( 'Clear' ),
                'defaultString' => __( 'Default' ),
                'pick' => __( 'Select Color' ),
                'current' => __( 'Current Color' ),
            );
            wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n );
        }
        public function register_jquery_ui () {
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_script( 'jquery-ui-widget' );
            wp_enqueue_script( 'jquery-ui-accordion' );
            wp_enqueue_script( 'jquery-ui-autocomplete' );
            wp_enqueue_script( 'jquery-ui-button' );
            wp_enqueue_script( 'jquery-ui-datepicker' );
            wp_enqueue_script( 'jquery-ui-dialog' );
            wp_enqueue_script( 'jquery-ui-draggable' );
            wp_enqueue_script( 'jquery-ui-droppable' );
            wp_enqueue_script( 'jquery-ui-menu' );
            wp_enqueue_script( 'jquery-ui-mouse' );
            wp_enqueue_script( 'jquery-ui-position' );
            wp_enqueue_script( 'jquery-ui-progressbar' );
            wp_enqueue_script( 'jquery-ui-selectable' );
            wp_enqueue_script( 'jquery-ui-resizable' );
            wp_enqueue_script( 'jquery-ui-selectmenu' );
            wp_enqueue_script( 'jquery-ui-slider' );
            wp_enqueue_script( 'jquery-ui-sortable' );
            wp_enqueue_script( 'jquery-ui-tooltip' );
            wp_enqueue_script( 'jquery-ui-tabs' );
        }
        
        public function register_jquery_css ()
        {
            wp_register_style('udraw_jquery_smoothness_css', UDRAW_JQUERY_SMOOTHNESS_CSS);
            wp_enqueue_style('udraw_jquery_smoothness_css');    
        }
        
        public function get_udraw_products() {
            $args = array('post_type' => 'product',
                          'posts_per_page' => 9999,
                          'meta_query' => array(
                                array(
                                    'key' => '_udraw_product',
                                    'value' => array( 'true' ),
                                    'compare' => 'IN'
                                )
                           ));    
            
            $products = new WP_Query( $args );
            
            return $products;
        }
        
        public function get_udraw_templates($id=null) {
            global $wpdb;
            $uDrawSettings = new uDrawSettings();
            $_udraw_settings = $uDrawSettings->get_settings();
            $table_name = $_udraw_settings['udraw_db_udraw_templates'];
            if (isset($id)) {
                $sql = "SELECT * FROM $table_name WHERE id = '$id'";
            } else {
                $sql = "SELECT * FROM $table_name ORDER BY modify_date, create_date DESC";
            }
            
            $results = $wpdb->get_results($sql);
            
            return $results;
        }
        
        public function get_udraw_template_tags($id=null) {
            global $wpdb;
            $uDrawSettings = new uDrawSettings();
            $_udraw_settings = $uDrawSettings->get_settings();
            $table_name = $_udraw_settings['udraw_db_udraw_templates'];
            $tags = "";
            if (isset($id)) {
                $templateId = $this->get_udraw_template_ids($id);                
                if (count($templateId) > 0) {
                    $tags = $wpdb->get_var("SELECT tags FROM $table_name WHERE id = '". $templateId[0] ."'");
                }
            }
            
            return $tags;            
        }
        
        public function get_templates_categories($id=null){
            global $wpdb;
            $uDrawSettings = new uDrawSettings();
            $_udraw_settings = $uDrawSettings->get_settings();
            $category_table_name = $_udraw_settings['udraw_db_udraw_templates_category'];
            if (isset($id)) {
                $sql = "SELECT * FROM $category_table_name WHERE id = '$id'";
            } else {
                $sql = "SELECT * FROM $category_table_name";
            }
            
            $results = $wpdb->get_results($sql);
            
            return $results;
        }
        
        public function get_udraw_clipart($id=null) {
            global $wpdb;
            $uDrawSettings = new uDrawSettings();
            $_udraw_settings = $uDrawSettings->get_settings();
            $table_name = $_udraw_settings['udraw_db_udraw_clipart'];
            if (isset($id)) {
                $sql = "SELECT * FROM $table_name WHERE ID = '$id'";
            } else {
                $sql = "SELECT * FROM $table_name ORDER BY date DESC";
            }
            
            $results = $wpdb->get_results($sql);
            return $results;
        }
        
        public function duplicate_udraw_template($id) {
            global $wpdb;
            $uDrawUtil = new uDrawUtil();
            $uDrawSettings = new uDrawSettings();
            $_udraw_settings = $uDrawSettings->get_settings();
            if (!isset($id)) { return false; }
            
            $templates = $this->get_udraw_templates($id);
            
            // Physical Path
            $_output_path = UDRAW_STORAGE_DIR . wp_get_current_user()->user_login . '/output/';
            
            // Web Path
            $_output_path_url = UDRAW_STORAGE_URL . wp_get_current_user()->user_login . '/output/';
            
            // Create folders if doesn't exist.
            if (!file_exists($_output_path)) { wp_mkdir_p($_output_path); }
            
            $design_url = get_site_url() . $templates[0]->design;
            $preview_url = get_site_url() . $templates[0]->preview;
            $pdf_url = get_site_url() . $templates[0]->pdf;
            
            // Store files into local variable
            $designDocument = $uDrawUtil->get_web_contents($design_url);
            $previewDocument = $uDrawUtil->get_web_contents($preview_url);
            $pdfDocument = $uDrawUtil->get_web_contents($pdf_url);

            // Create new document names.
            $randomString = $this->generateRandomString();
            $design_file = $_output_path . $randomString . '.xml';
            $preview_file = $_output_path . $randomString . '.jpg';
            $pdf_file = $_output_path . $randomString . '.pdf';

            // Save locally desgin, preview and pdf documents
            file_put_contents($design_file, $designDocument);
            file_put_contents($preview_file, $previewDocument);
            file_put_contents($pdf_file, $pdfDocument);
            
            // Create new record in DB.
            $dt = new DateTime();
            $table_name = $_udraw_settings['udraw_db_udraw_templates'];    
            $wpdb->insert($table_name, array(
                'name' => $templates[0]->name . " Copy",
				'design' => wp_make_link_relative($_output_path_url) . $randomString . '.xml',
				'preview' => wp_make_link_relative($_output_path_url) . $randomString . '.jpg',
				'pdf' => wp_make_link_relative($_output_path_url) . $randomString . '.pdf',
                'create_date' => $dt->format('Y-m-d H:i:s'),
                'create_user' => wp_get_current_user()->user_login,
                'design_width' => $templates[0]->design_width,
                'design_height' => $templates[0]->design_height,
                'design_pages' => $templates[0]->design_pages					
            ));
            
            return true;
        }
        
        public function get_udraw_private_templates($id) {
            $args = array('post_type' => 'product',
                          'posts_per_page' => 9999,
                          'meta_query' => array(
                                array(
                                    'key' => '_udraw_is_private_product',
                                    'value' => array( 'yes' ),
                                    'compare' => 'IN'
                                )
                           ));    
            
            $products = new WP_Query( $args );
            $filteredPosts = array();
            foreach ($products->posts as $post) {
                if (in_array($id, get_post_meta($post->ID, '_udraw_private_users_list', true))) {
                    array_push($filteredPosts, $post);
                }
            }
            $products->posts = $filteredPosts;
            return $products;            
        }
        
        public function get_udraw_template_ids($post_id) {
            $templateIds = get_post_meta($post_id, '_udraw_template_id', true);
            if (gettype($templateIds) != "array") {
                $templates = array();
                if (strlen($templateIds) > 0) {
                    array_push($templates, $templateIds);
                }
                return $templates;
            }
            
            return $templateIds;
        }
        
        public function user_has_private_templates($id) {
            $products = $this->get_udraw_private_templates($id);
            if (count($products->posts) > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function get_udraw_customer_designs($id) {
            global $wpdb;
            $uDrawSettings = new uDrawSettings();
            $_udraw_settings = $uDrawSettings->get_settings();
            $table_name = $_udraw_settings['udraw_db_udraw_customer_designs'];
            $sql = "SELECT * FROM $table_name WHERE customer_id = '$id' ORDER BY modify_date, create_date DESC";
            $results = $wpdb->get_results($sql);
            return $results;
        }
        
        public function user_has_saved_designs($id) {
            if ( count($this->get_udraw_customer_designs($id)) >= 1) { return true; } else { return false; }
        }        
        
        function replace_all_product_images($template_id, $additional_post_id) {
            // Get all uDraw Products
            $uDrawProducts = $this->get_udraw_products();
            $posts_to_modify = array();
            if ($additional_post_id > 0) {
                array_push($posts_to_modify, $additional_post_id);
            }
            
            // Get all products that contain the template id.
            foreach ($uDrawProducts->posts as $post) {
                $linkedTemplateId = $this->get_udraw_template_ids($post->ID);
                if (count($linkedTemplateId) > 0) { 
                    if ($template_id == $linkedTemplateId[0]) {
                        // Found linked products.
                        array_push($posts_to_modify, $post->ID);
                    }
                }
            }
            

            // Continue if there are any products to update.
            if (count($posts_to_modify) > 0) {
                // Remove product(s) image if any.
                $template = $this->get_udraw_templates($template_id);
                if (count($template) > 0) {
                    $this->remove_product_image($template[0]->preview);
                    // Generate a new attachment id.
                    $attach_id = $this->create_attachment_image($template[0]->preview);
                    
                    // Set product image of all products with template id.
                    foreach ($posts_to_modify as $key => $value) {
                        // set attachment to post.
                        set_post_thumbnail( $value, $attach_id );
                    }
                }
            }
        }
        
        function replace_block_product_image($product_id, $post_id) {
            $uDrawPDFBlocks = new uDrawPDFBlocks();            
            $block_template = $uDrawPDFBlocks->get_product($product_id);
            
            if (!is_null($block_template)) {
                $this->remove_product_image($block_template['ThumbnailLarge']);
                
                // Generate a new attachment id.
                $attach_id = $this->create_attachment_image($block_template['ThumbnailLarge']);
                
                // set attachment to post.
                set_post_thumbnail( $post_id, $attach_id);
            }
        }
        function replace_xmpie_product_image($product_id, $post_id) {
            $uDrawPDFXmPie = new uDrawPdfXMPie();            
            $block_template = $uDrawPDFXmPie->get_product($product_id);
            
            if (!is_null($block_template)) {
                $this->remove_product_image($block_template['ThumbnailLarge']);
                
                // Generate a new attachment id.
                $attach_id = $this->create_attachment_image($block_template['ThumbnailLarge']);
                
                // set attachment to post.
                set_post_thumbnail( $post_id, $attach_id);
            }
        }
                
        function remove_product_image($_previewURL) {
            // Get the path to the upload directory.
            $wp_upload_dir = wp_upload_dir();

            // Update the preview URL to add http protocol if not in the original URL.
            if (!$this->startsWith($_previewURL, "http")) {
                $_previewURL = "http://". $_SERVER['SERVER_NAME'] . $_previewURL;
            }        
                
            // Remove previous attachment if exists.
            $_previous_attach_id = $this->get_attachment_from_name("udraw_preview_" . basename ($_previewURL));
            if ($_previous_attach_id > 0) {
                wp_delete_attachment($_previous_attach_id);
            }
        }
        
        function create_attachment_image($_previewURL) {
            if (strlen($_previewURL) > 0) {                 
                // Get the path to the upload directory.
                $wp_upload_dir = wp_upload_dir();

                // Update the preview URL to add http protocol if not in the original URL.
                if (!$this->startsWith($_previewURL, "http")) {
                    
                    $_serverPort = "";
                    if (isset($_SERVER['SERVER_PORT'])) {
                        if (intval($_SERVER['SERVER_PORT']) != 80 || intval($_SERVER['SERVER_PORT'] != 443) ) {
                            $_serverPort = ":" . $_SERVER['SERVER_PORT'];
                        }
                    }
                    $_previewURL = UDRAW_SYSTEM_WEB_PROTOCOL . $_SERVER['SERVER_NAME'] . $_serverPort . $_previewURL;
                }                

                // Remove previous attachment if exists.
                $_previous_attach_id = $this->get_attachment_from_name("udraw_preview_" . basename ($_previewURL));
                if ($_previous_attach_id > 0) {
                    return $_previous_attach_id;
                } else {                
                    // Specify physical path to file.
                    $filename = $wp_upload_dir['path'] . "/udraw_preview_" . basename ( $_previewURL ); 

                    // Download image based on http url.
                    $this->download_udraw_preview($_previewURL, $filename);

                    // The ID of the post this attachment is for.
                    $parent_post_id = (isset($post_id)) ? $post_id : 0;

                    // Check the type of tile. We'll use this as the 'post_mime_type'.
                    $filetype = wp_check_filetype( basename( $filename ), null );

                    // Prepare an array of post data for the attachment.
                    $attachment = array(
                        'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
                        'post_mime_type' => $filetype['type'],
                        'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                        'post_content'   => '',
                        'post_status'    => 'inherit'
                    );

                    // Insert the attachment.
                    $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );        

                    // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
                    require_once( ABSPATH . 'wp-admin/includes/image.php' );

                    // Generate the metadata for the attachment, and update the database record.
                    $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
                    wp_update_attachment_metadata( $attach_id, $attach_data );

                    return $attach_id;
                }
            } else {
                return 0;
            }            
        }
        
        public function get_attachment_from_name($name) {
            $args = array(
                'post_type' => 'attachment',
                'numberposts' => -1,
                'post_status' => null,
                'post_parent' => null, // any parent
            ); 
            $attachments = get_posts($args);
            if ($attachments) {
                foreach ($attachments as $post) {
                    if ($post->post_name.".jpg" == strtolower($name)) {
                        return $post->ID;
                    }
                    if ($post->post_name.".png" == strtolower($name)) {
                        return $post->ID;
                    }
                }
            }
            return 0;
        }

        public function is_udraw_valid() 
        {
            if (uDraw::is_udraw_okay()) { return true; }
            
            if (!uDraw::is_udraw_okay() && (count($this->get_udraw_templates()) <= 1) ) { return true; }
            
            return false;
        }
        
        public function download_udraw_preview ($url, $path) {
            $udraw_util = new uDrawUtil();
            $udraw_util->download_file($url, $path);
        }

        public function generate_pdf_from_order($order_id, $build_pdf_only) {
            if (uDraw::is_udraw_okay()) {
                wp_schedule_single_event(time(), 'process_udraw_order', array( $order_id, $build_pdf_only) );
            }
        }
        
        public static function fixBlocksJSONValues($json_str){
            $parts =  split('\"Value\":\"', $json_str);
            foreach($parts as $part) {
                $sub_parts = split('\"},{', $part);
                if (count($sub_parts) > 1) {
                    if (strpos($sub_parts[0], '"') > 0) {
                        $json_str = str_replace($sub_parts[0],strip_tags(html_entity_decode($sub_parts[0])), $json_str);                         
                    }                    
                }
            }
            return $json_str;
        }
        
        public static function accessHelper($response) {
            if ($response == 'valid') {
                return true;
            }
            
            return false;
        }
        
        public function _is_u_valid() 
        {
            if (uDraw::is_udraw_okay()) { return true; }
            
            if (!uDraw::is_udraw_okay() && (count($this->get_udraw_templates()) <= 1) ) { return true; }
            
            return false;
        }

		public function str_replace_first($from, $to, $subject)
		{
			$from = '/'.preg_quote($from, '/').'/';
			return preg_replace($from, $to, $subject, 1);
		}
        
        public function get_physical_path($relative_path) {
            $virtual_path = $this->get_virtual_path();
            if (strlen($virtual_path) > 0) {
                $relative_path = $this->str_replace_first($virtual_path, '', $relative_path);
            }
            
            return get_home_path() . $relative_path;            
        }
        
        public function get_virtual_path() {
            $virtual_path = "";
            if (get_home_url() != wp_make_link_relative(get_home_url())) {
                $virtual_path = wp_make_link_relative(get_home_url());
            }
            return $virtual_path;
        }
        
        public function trigger_clean_clipart () {
            //But check for the table first. Clean up will not run properly if table was not created first
            //$this->check_for_table();
            $this->clean_clipart_directory();
        }
        
        public function clean_clipart_directory () {
            global $wpdb;
            $uDrawSettings = new uDrawSettings();
            $_udraw_settings = $uDrawSettings->get_settings();
            $clipartDB = $_udraw_settings['udraw_db_udraw_clipart'];
            $clipartCategoryDB = $_udraw_settings['udraw_db_udraw_clipart_category'];
            $directories = glob(UDRAW_CLIPART_DIR . '/*' , GLOB_ONLYDIR);
            //Do some Clipart moving stuff; If subdirectories are found in the clipart folder, run this:
            if (count($directories) > 0) {
                foreach ($directories as $directory) {
                    //Create a new entry in the clipart category table for each folder found
                    $category_name = str_replace(UDRAW_CLIPART_DIR.'/', '', $directory);
                    $category_results = $wpdb->get_results("SELECT * FROM $clipartCategoryDB WHERE category_name='$category_name'");
                    if (count($category_results) > 0) {
                        $category_id = $category_results[0]->ID;
                    } else {
                        $wpdb->insert($clipartCategoryDB, array('category_name' => $category_name, 'parent_id' => 0));
                        $category_id = $wpdb->insert_id;
                    }
                    if ($category_id === '0') {
                        $category_id = '';
                    }
                    $clipart_results = $wpdb->get_results("SELECT * FROM $clipartDB WHERE category='$category_name'");
                    $id_array = array();
                    foreach($clipart_results as $result) {
                        array_push($id_array, $result->ID);
                        //Move the file out of the folder and into clipart_dir
                        if (file_exists(UDRAW_CLIPART_DIR.'/'.$category_name.'/'.$result->image_name)) {
                            rename(UDRAW_CLIPART_DIR.'/'.$category_name.'/'.$result->image_name, UDRAW_CLIPART_DIR.$result->image_name);
                        }
                    }
                    $ids = implode(',', $id_array);
                    $wpdb->query("UPDATE $clipartDB SET category=$category_id WHERE ID IN($ids)");
                    $folder_contents = array_diff(scandir(UDRAW_CLIPART_DIR.'/'.$category_name), array('..', '.'));
                    //Make sure folder is empty before deleting
                    if (count($folder_contents) > 0) {
                        //If for some reason a clipart did not move from the previous lines, try to move them now
                        for ($i = 0; $i < count($folder_contents) - 1; $i++) {
                            rename(UDRAW_CLIPART_DIR.'/'.$category_name.'/'.$folder_contents[$i], UDRAW_CLIPART_DIR.'/'.$folder_contents[$i]);
                        }
                    }
                    //Now delete the folder
                    rmdir(UDRAW_CLIPART_DIR.'/'.$category_name);
                }
            }
        }
        
        public function check_folder_permissions () {
            $folder_array = [
                array(
                    'directory' => UDRAW_STORAGE_DIR,
                    'url' => UDRAW_STORAGE_URL
                ),
                array(
                    'directory' => UDRAW_DESIGN_STORAGE_DIR,
                    'url' => UDRAW_DESIGN_STORAGE_URL
                ),
                array(
                    'directory' => UDRAW_CLIPART_DIR,
                    'url' => UDRAW_CLIPART_URL
                ),
                array(
                    'directory' => UDRAW_FONTS_DIR,
                    'url' => UDRAW_FONTS_URL
                ),
                array(
                    'directory' => UDRAW_ORDERS_DIR,
                    'url' => UDRAW_ORDERS_URL
                ),
                array(
                    'directory' => UDRAW_TEMP_UPLOAD_DIR,
                    'url' => UDRAW_TEMP_UPLOAD_URL
                )
            ];
            
            for ($i = 0; $i < count($folder_array); $i++) {
                if (!file_exists($folder_array[$i]['directory'])) {
                    wp_mkdir_p($folder_array[$i]['directory']);
                }
                
                if (!is_writable($folder_array[$i]['directory'])) {
                    $this->display_unwritable_alert($folder_array[$i]['url']);
                }
            }
        }
        
        public function display_unwritable_alert($folder_name = '') {
            ?>
            <div class="notice notice-error" style="background-color: #ffe8e8; padding: 10px;">
                <span><?php echo wp_make_link_relative($folder_name) ?><?php _e(' does not have sufficient permissions.', 'udraw'); ?></span>
            </div>
            <?php
        }
        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//
        // ------------------------ Static Methods ------------------------------ //
        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//

        /**
         * Returns true if product is a uDraw Product.
         * 
         * @param type $product_id
         * @return true | false
         */
        public static function is_udraw_product($product_id) {
            return get_post_meta($product_id, '_udraw_product', true) == 'true';
        }        
       
        public static function get_udraw_customer_design($access_key) {
            global $wpdb;
            $uDrawSettings = new uDrawSettings();
            $_udraw_settings = $uDrawSettings->get_settings();
            $table_name = $_udraw_settings['udraw_db_udraw_customer_designs'];
            $sql = "SELECT * FROM $table_name WHERE access_key = '$access_key'";
            $results = $wpdb->get_row($sql, ARRAY_A);
            return $results;            
        }
        
        public static function get_udraw_activation_key() {
            $udraw_access_key = "";
            if (is_multisite()) {
                $udraw_access_key = get_site_option( 'udraw_access_key' );
            } else {
                $udraw_access_key = get_option( 'udraw_access_key' );
            }
            return $udraw_access_key;
        }
        
        public static function set_udraw_activation_key($key) {
            if (is_multisite()) {
                update_site_option('udraw_access_key', $key);
            } else {
                update_option('udraw_access_key', $key);
            }
        }
        
        public static function is_udraw_okay() 
        {
            $udraw_access_key = uDraw::get_udraw_activation_key();
            if (strlen($udraw_access_key) == 0) { $udraw_access_key = "default"; }
            
            $udrawSettings = new uDrawSettings();
            $response = $udrawSettings->__checkAccess($udraw_access_key);
            
            return uDraw::accessHelper($response);
        }
        
        public static function is_udraw_apparel_installed() {
            $pluginsArray = array();
            foreach(apply_filters('active_plugins', get_option('active_plugins')) as $plugin) {
                array_push($pluginsArray, strtolower($plugin));
            }
            $apparel = in_array('udraw-apparel/udraw-apparel.php', $pluginsArray);
            if ($apparel) {
                return true;
            } else {                
                return false;
            }
        }
        
        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//
        // ------------------------ Shortcode Methods --------------------------- //
        //------------------------------------------------------------------------//
        //------------------------------------------------------------------------//        
        function shortcode_udraw_list_categories($atts, $content = null) {
            ob_start();
            $this->registerStyles();
            $this->registerDesignerDefaultStyles();
            require('templates/shortcodes/list-product-categories.php');
            return ob_get_clean();
        }
        
        function shortcode_udraw_private_templates( $atts, $content = null ) {
            $GLOBALS['udraw_is_private_list'] = true;            
            ob_start();
            require('templates/shortcodes/list-private-templates.php');
            return ob_get_clean();
            
            unset($GLOBALS['udraw_is_private_list']);
        }
        
        function shortcode_udraw_customer_saved_designs( $atts, $content = null ) {
            $GLOBALS['udraw_is_private_list'] = true;            
            ob_start();             
            require('templates/shortcodes/customer-saved-designs.php');
            return ob_get_clean();            
            unset($GLOBALS['udraw_is_private_list']);
        }
        
    }

}

$passed_sanity_check = true;

// Check PHP version 5.4.0 + 
if (version_compare(phpversion(), '5.4.0', '<')) {
    // php version isn't high enough
    add_action('admin_notices', 'udraw_php_admin_notice');
    $passed_sanity_check = false;
}

// Check to see if WooCommerce is Activated.
if (is_multisite()) {
    if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
        require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
    }

    if ( !is_plugin_active_for_network( 'woocommerce/woocommerce.php' ) ) {
        add_action('admin_notices', 'udraw_woocommerce_admin_notice');
        $passed_sanity_check = false;
    }
} else {
    if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        add_action('admin_notices', 'udraw_woocommerce_admin_notice');
        $passed_sanity_check = false;
    }
}

if ($passed_sanity_check) {
    $uDraw = new uDraw();
    $uDraw->init_udraw_plugin();
}

function udraw_php_admin_notice() {
?>
<div class="error" style="color: #A95353; background-color: #FDD0D0; border-radius: 5px;">
    <p style="font-size: 14px;">
        <strong>Important:</strong> uDraw Plugin requires PHP version 5.4 or higher. PHP version currently installed is <strong><?php echo phpversion(); ?></strong> .
    </p>
</div>
<?php
}

//let user know that he needs the woocommerce plugin
function udraw_woocommerce_admin_notice() {
?>
<div class="error" style="color: #A95353; background-color: #FDD0D0; border-radius: 5px;">
    <p style="font-size: 14px;">
        <strong>Important:</strong> uDraw Plugin requires WooCommerce to be Installed & Activated. <a href="<?php echo wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=woocommerce'), 'install-plugin_woocommerce');?>">Click here</a> to install it now.
    </p>
</div>
<?php
}
