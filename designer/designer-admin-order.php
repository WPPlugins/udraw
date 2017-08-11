<?php
if (is_user_logged_in()) {
	if (!current_user_can('edit_products')) {
        exit;
    }
} else {
    exit;
}

$udrawSettings = new uDrawSettings();
$_udraw_settings = $udrawSettings->get_settings();

// Handle update of design while viewing it in admin order area.
if (isset($_POST['udraw_order_item_id'])) {
    // attempt to update order item id.
    global $woocommerce;
    $order_item_meta = wc_get_order_item_meta($_POST['udraw_order_item_id'], 'udraw_data', true);
    $uniq_id = uniqid();
    $udraw_product_data_file = $uniq_id . '_udf';
    
    // Extract Images out of the design
    $uDrawDesignHandler = new uDrawDesignHandler();
    $xmlStr = $uDrawDesignHandler->extract_images_from_design(UDRAW_STORAGE_DIR . '_designs_/', UDRAW_STORAGE_URL . '_designs_/', $uniq_id, base64_decode($_POST['udraw_order_item_product_data']));                                                            
    
    file_put_contents(UDRAW_STORAGE_DIR . '_designs_/' . $udraw_product_data_file, base64_encode($xmlStr));
    $order_item_meta['udraw_product_data'] = '_designs_/' . $udraw_product_data_file;
    $order_item_meta['udraw_product_svg'] = base64_encode($_POST['udraw_order_item_product_svg']);
    $order_item_meta['udraw_product_preview'] = $_POST['udraw_order_item_product_preview'];
    
    wc_update_order_item_meta($_POST['udraw_order_item_id'], 'udraw_data', $order_item_meta);
    
    // Process the change in the server to generate High-Quality PDF.
    $udraw = new uDraw();
    $udraw->generate_pdf_from_order($_GET['post'], true);
}

if (!defined('UDRAW_DESIGNER_IMG_PATH')) {
    define('UDRAW_DESIGNER_IMG_PATH', plugins_url('includes/img/', __FILE__));	
}

if (!defined('UDRAW_DESIGNER_INCLUDE_PATH')) {
    define('UDRAW_DESIGNER_INCLUDE_PATH', plugins_url('includes/', __FILE__));
}

$_asset_path = UDRAW_STORAGE_DIR . wp_get_current_user()->user_login . '/assets/';
$_output_path = UDRAW_STORAGE_DIR . wp_get_current_user()->user_login . '/output/';
$_pattern_path = UDRAW_STORAGE_DIR . wp_get_current_user()->user_login . '/patterns/';

if (!file_exists($_asset_path)) { wp_mkdir_p($_asset_path); }
if (!file_exists($_output_path)) { wp_mkdir_p($_output_path); }
if (!file_exists($_pattern_path)) { wp_mkdir_p($_pattern_path); }

$_asset_path_url = UDRAW_STORAGE_URL . wp_get_current_user()->user_login . '/assets/';
$_output_path_url = UDRAW_STORAGE_URL . wp_get_current_user()->user_login . '/output/';
$_pattern_path_url = UDRAW_STORAGE_URL . wp_get_current_user()->user_login . '/patterns/';

?>
<div id="udraw-bootstrap" data-udraw="uDrawBootstrap">
    <?php include_once(UDRAW_PLUGIN_DIR . '/designer/bootstrap-fullscreen/designer-template-wrapper.php'); ?> 
    
</div>
<style>
    #udraw-bootstrap .select2-container {
          display: inline-block !important;
    }
</style>

<script type="text/javascript">
	jQuery('#udraw-save-design-btn').click(function() {        
	    __save_udraw_design();
	});
	
    jQuery('#save-design-btn').click(function() {        
        __save_udraw_design();
	});
    
    function __save_udraw_design() {
        RacadDesigner.HideDesigner();
        RacadDesigner.SaveDesignSVG(function (response) {
            jQuery.ajax({
                type: "POST",
                data: {
                    udraw_order_item_id: _udraw_current_item_id,
                    udraw_order_item_product_data: Base64.encode(RacadDesigner.GenerateDesignXML()),
                    udraw_order_item_product_preview: RacadDesigner.GetDocumentPreviewThumbnail(),
                    udraw_order_item_product_svg: JSON.stringify(response)
                },
                success: function () {
                    window.location.href = "?post=<?php echo $_GET['post']; ?>&action=edit&message=4";
                }
            });
        }, 0);
    }

	function __init_udraw(settings) {
	    settings.assetPath = '<?php echo wp_make_link_relative($_asset_path_url); ?>';
	    settings.outputPath = '<?php echo wp_make_link_relative($_output_path_url); ?>';
	    settings.handlerFile = ajaxurl;
	    settings.localImagePath = '<?php echo wp_make_link_relative($_asset_path_url); ?>';
	    settings.localPatternsPath = '<?php echo wp_make_link_relative($_pattern_path_url); ?>';
            settings.localImageDisplayThumbs = true;
            settings.displayWizard = false;
            settings.isTemplate = true;
            settings.relativeImagePath = '<?php echo wp_make_link_relative(UDRAW_DESIGNER_IMG_PATH); ?>';
            settings.relativeIncludePath = '<?php echo wp_make_link_relative(UDRAW_DESIGNER_INCLUDE_PATH); ?>';
            settings.virtualAppPath = '/udraw/';
            settings.designMode = 'update';
            settings.useLocalFonts = true;
            settings.localFontPath = '<?php echo wp_make_link_relative(UDRAW_FONTS_URL); ?>';
	    settings.language = '<?php echo $_udraw_settings['udraw_designer_language']; ?>';
	    settings.contentUploadPath = '<?php echo wp_make_link_relative(content_url()."/uploads/")?>';
	    settings.activationKey = '<?php echo uDraw::get_udraw_activation_key()?>';
            settings.localesPath = '<?php echo (file_exists(UDRAW_LANGUAGES_DIR.'udraw-'.$_udraw_settings['udraw_designer_language'].'.txt')) ? wp_make_link_relative(UDRAW_LANGUAGES_URL) : wp_make_link_relative(UDRAW_DESIGNER_INCLUDE_PATH.'locales/');  ?>';
            settings.displayOrientation = '<?php echo $_udraw_settings['udraw_designer_display_orientation']; ?>';
        
        <?php if (uDraw::is_udraw_apparel_installed()) { ?>
            settings.virtualProductsApi = '<?php echo admin_url("admin-ajax.php") ?>';
            settings.apparelGraphicsPath = '<?php echo UDRAW_APPAREL_GRAPHICS_URL ?>';
        <?php }?>
        
        <?php if ($_udraw_settings['designer_enable_facebook_functions']) { ?>
            settings.FBappID = '<?php echo $_udraw_settings['designer_facebook_app_id']?>';
        <?php } else { ?>
            settings.FBappID = null;
	    <?php } ?>

        <?php if ($_udraw_settings['designer_enable_optimize_large_images']) { ?>
	    settings.enableOptimizedLargeImages = true;
	    <?php } ?>

        <?php if ($_udraw_settings['designer_enable_instagram_functions']) { ?>
            settings.instagramClientID = '<?php echo $_udraw_settings['designer_instagram_client_id']?>';
        <?php } else { ?>
            settings.instagramClientID = '';
        <?php } ?>
        
		return settings;		
	}

    function __init_handler_actions(actions) {
        actions.localFontsList = 'udraw_designer_local_fonts_list';
        actions.localFontsCSS = 'udraw_designer_local_fonts_css';
        actions.localFontsCSSBase64 = 'udraw_designer_local_fonts_css_base64';
        actions.upload = 'udraw_designer_upload';
        actions.save = 'udraw_designer_save';
        actions.finalize = 'udraw_designer_finalize';
        actions.exportPDF = 'udraw_designer_export_pdf';
        actions.asset = 'udraw_designer_asset';
        actions.localImages = 'udraw_designer_local_images';
        actions.removeImage = 'udraw_designer_remove_image';
        actions.localPatterns = 'udraw_designer_local_patterns';
        actions.uploadPatterns = 'udraw_designer_upload_patterns';
        actions.savePageData = 'udraw_designer_save_page_data';
        actions.compileDesignData = 'udraw_designer_compile_design_data';
        actions.authenticate_instagram = 'udraw_designer_authenticate_instagram';
        actions.retrieve_instagram = 'udraw_designer_retrieve_instagram';

        return actions;
    }
    
    function __get_app_id(){
        RacadDesigner.settings.FBappID = '<?php echo $_udraw_settings['designer_facebook_app_id']?>';
    }
	
    function __loaded_udraw() {
        jQuery('.udraw-show-order-item').each(function(){
            jQuery('i', this).hide();
            jQuery('span', this).show();
            jQuery(this).prop('disabled', false);
            
        });
        RacadDesigner.ReloadObjects();
    }
</script>  
