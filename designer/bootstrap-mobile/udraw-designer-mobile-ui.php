<?php
/*
 * Plugin Name: Web To Print Shop : uDraw - Mobile UI
 * Plugin URI: http://www.webtoprintshop.com/
 * Description: Custom Designer UI for uDraw Plugin
 * Version: 0.0.1
 * Author: Racad Tech, Inc.
 * Author URI: http://www.racadtech.com
 * 
 * Requires at least: 4.1
 * 
 * @package uDraw_Custom_UI
 */

if (!defined('UDRAW_MOBILE_UI_URL')) {
    define('UDRAW_MOBILE_UI_URL', plugins_url('/', __FILE__));
}

if (!defined('UDRAW_MOBILE_UI_DIR')) {
    define('UDRAW_MOBILE_UI_DIR', dirname(__FILE__));
}

if (!defined('UDRAW_MOBILE_UI_IMG_URL')) {
    define('UDRAW_MOBILE_UI_IMG_URL', UDRAW_MOBILE_UI_URL . 'skin/img/');
}

if (!defined('UDRAW_MOBILE_UI_IMG_DIR')) {
    define('UDRAW_MOBILE_UI_IMG_DIR', UDRAW_MOBILE_UI_DIR . 'skin/img/');
}

if (!class_exists('uDrawMobileUI')) {
    class uDrawMobileUI {
        function __contsruct() { }
        
        // ------------------------------------------------------------- //
        // -------------------------- Init ----------------------------- //
        // ------------------------------------------------------------- //        
        public function init() {
            add_filter('udraw_designer_register_skin', array(&$this, 'udraw_designer_register_skin'), 10, 1);
            add_filter('udraw_designer_ui_override', array(&$this,'udraw_designer_ui_override'), 10, 9);
        }
        
        public function udraw_designer_register_skin($skins) {
            $skins['mobile'] = "Mobile";
                        
            return $skins;
        }
        
        public function udraw_designer_ui_override($override, $template_id, $current_skin, $displayOptionsFirst,$allowCustomerDownloadDesign,$isPriceMatrix,$templateCount,$isTemplatelessProduct,$isuDrawApparelProduct) {
            if (strtolower($current_skin) == 'mobile') {
                $this->registerDesignerMobileStyles();
                require_once("skin/designer.php");
                return true; // We will override the default UI
            }
            
            return false; // We wont override the default UI
        }
        
        public function registerDesignerMobileStyles(){
            wp_register_style('udraw_skin_ui_css' , plugins_url('skin/css/designer-mobile.css', __FILE__));
            wp_register_script('udraw_skin_resize_ui_js', plugins_url('skin/js/resizeMobileDesigner.js', __FILE__));
            wp_enqueue_style('udraw_skin_ui_css');
            wp_enqueue_script('udraw_skin_resize_ui_js');
        }
        
    }
}


// Init the plugin.
$uDrawMobileUI = new uDrawMobileUI();
$uDrawMobileUI->init();
