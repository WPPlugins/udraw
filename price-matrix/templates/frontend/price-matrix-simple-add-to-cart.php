<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $post, $woocommerce;
$udraw_settings = new uDrawSettings();
$settings = $udraw_settings->get_settings();
if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
    $product_id = $product->get_id();
} else {
    $product_id = $product->id;
}
include('__price-matrix-header.php');
include('__price-matrix-script.php');
?>
<div class="udraw_price_matrix_container">
<div id="udraw-price-matrix-loading">
    <i class="fa fa-pulse fa-spinner fa-5x"></i>
</div>
<div id="udraw-display-options-ui" style="display: none;">
<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="cart price_matrix_form variations_form" method="post" enctype='multipart/form-data'>
    <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
    <input type="hidden" value="" name="udraw_price_matrix_selected_options_idx" />
    <input type="hidden" value="" name="udraw_price_matrix_selected_options" />
    <input type="hidden" value="" name="udraw_price_matrix_selected_options_object" />
    <input type="hidden" value="" name="udraw_price_matrix_price" />
    <input type="hidden" value="" name="udraw_price_matrix_qty" />
    <input type="hidden" name="udraw_options_uploaded_files" value="" />
    <input type="hidden" name="udraw_options_converted_pdf" value="" />
    <input type="hidden" name="udraw_options_uploaded_excel" value="" />
    <input type="hidden" value="" name="udraw_price_matrix_weight" />
    <input type="hidden" value="" name="udraw_price_matrix_width" />
    <input type="hidden" value="" name="udraw_price_matrix_height" />
    <input type="hidden" value="" name="udraw_price_matrix_length" />
    <input type="hidden" value="" name="udraw_price_matrix_shipping_dimensions" />
    <div id="udraw-price-matrix-ui">
        <div id="udraw-price-matrix-ui-container" style="background: transparent;">
            <div id="udraw-price-matrix-ui-row" style="padding-top:10px;">
                <div>
                    <div class="divContainer">
                        <div id="divSettings" class="divSettings"></div>
                        <div id="canvas" class="divCanvas"></div>
                        <div style="width:100%; text-align: center; padding-bottom: 10px !important;">
                            <strong><?php _e('Total Price:', 'udraw') ?></strong>
                            <span style="font-size: 18pt;color: rgb(0, 128, 0);font-weight: bold;">
                                <img src="<?php echo UDRAW_PLUGIN_URL ?>assets/includes/price-matrix-loading.gif" id="udraw-price-matrix-loading-img" />
                                <span id="totalPriceSymbol"><?php echo get_woocommerce_currency_symbol(); ?></span><span id="totalPrice"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table style="width: 100%;">
        <tr>
            <td>
                <button type="submit" style="display:none;" id="udraw-options-submit-form-btn" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>
                <i class="udraw-add-to-cart-spinner fa fa-spinner fa-pulse" style="display: none; margin-left: 25px; margin-top: 5px;"></i>
            </td>
        </tr>
    </table>
    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product_id ); ?>" />

    <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
    
<br />
<table id="udraw-options-actions-btn-table" style="width: 100%;text-align: justify;">
    <tr class="udraw_action_row design_row">
        <?php if ( ($is_design_product || $isBlockProduct || $isXmpieProduct) && (!$is_upload_product_update || $is_converted_pdf_product)) { ?>
        <td>
            <button id="udraw-options-page-design-btn" class="button btn btn-primary" disabled>
                <span id="udraw-design-online-span" style="display: none;">
                <?php
                if (isset($_GET['cart_item_key'])) {
                    _e('Update Design','udraw');
                } else {
                    _e('Design Now', 'udraw');
                }
                ?>
                </span>
                <i class="fa fa-pulse fa-spinner"></i>
            </button>
        </td>
        <?php } else { ?>
            <td></td>
        <?php } ?>

        <?php if ($is_upload_product && !$is_design_product_update) { ?>
        <td>
            <a href="#" id="udraw-options-page-upload-btn" class="button btn btn-default" onclick="javascript: return false;"><?php if ($is_upload_product_update) { echo "Replace Artwork"; } else { echo "Upload Artwork"; } ?></a>
            <input style="display: none;visibility: hidden;width: 0;height: 0;" id="fileupload" type="file" name="files[]" accept="<?php echo $valid_extensions ?>" multiple>
        </td>
        <?php } else { ?>
            <td></td>
        <?php } ?>
        <?php do_action('udraw_product_action_row_design_row_custom', $post); ?>
    </tr>
    
    <?php if ($is_design_product && $allow_structure_file) { ?>
    <tr class="udraw_action_row upload_row">
        <td colspan="2">
            <a href="#" id="udraw-generate-structure-file-btn" class="button btn btn-default" style="display: none;">Generate Structure File</a>
            <div id="structure-file-container" style="display: none;">
                <form id="udraw-structure-form-input" action="<?php echo admin_url('admin-ajax.php') ?>" method="post" target="_blank" style="width: auto; display: inline-block; border: none;padding: 0; margin-bottom: 0;">
                    <input type="hidden" name="action" value="udraw_designer_generate_structure_file"><br>
                    <input type="hidden" name="pages" value=""><br>
                    <input type="submit" value="Download File">
                </form>
                <a href="#" id="udraw-upload-structure-file-btn" class="button btn btn-default">Upload File</a>
                <input style="display: none;" id="udraw-structure-file-upload" type="file" name="structureFile" accept="<?php echo $valid_extensions ?>">
            </div>
        </td>
    </tr>
    <?php } ?>
    
    <tr class="udraw_action_row upload_row">
        <td colspan="2">
            <div id="udraw-options-file-upload-progress" style="display:none;">
                <div class="udraw-progress-bar udraw-progress-bar-animate">
			        <span style="width: 0%"><span></span></span>
		        </div>
                <div class="udraw-uploaded-files-list"></div>
            </div>
        </td>
    </tr>
</table>

</div>

<div class="container" style="background:none;" >
    <div class="row" id="udraw-upload-preview-div" style="display:none;">
        <div class="row" style="padding-bottom:15px;">
            <button class="btn btn-danger button" id="udraw-preview-back-to-options-btn"><strong>&nbsp;Back to Options</strong></button>
            <button class="btn btn-success button" id="udraw-preview-approve-btn"><strong>Approve &amp; Add to Cart&nbsp;></strong></button>
        </div>
        <div class="row" id="udraw-preview-upload-placeholer">
        </div>
    </div>
</div>
</div>
<script>

    function display_udraw_price_matrix_preview() {
        eFileName = '<?php echo admin_url('admin-ajax.php') . '?action=udraw_price_matrix_get&price_matrix_id='. $udraw_price_matrix_access_key; ?>';
        priceMatrixObj = PriceMatrix({
            url: eFileName,
            key: '<?php echo uDraw::get_udraw_activation_key(); ?>',
            callback: function (obj) {
                json = priceMatrixObj.getFields();
                bs = json;

                AddSettings();
                if (!loadedFromCart) {
                    selectedDefault = priceMatrixObj.getDataDefaults();//jQuery.parseJSON(response);
                    selectedByUser = selectedDefault;
                }

                // Now that we have all data, display UI.                        
                DisplayFieldsJSON();

                if (priceMatrixInit) {
                    // Show Form.
                    jQuery('#udraw-price-matrix-loading').hide();
                    jQuery('#udraw-display-options-ui').show();

                    priceMatrixInit = false;

                    // Show Design Now Button.
                    /*jQuery('#udraw-options-page-design-btn').prop('disabled', false);
                    jQuery('#udraw-design-online-span').html('Design Now');*/
                }
            }
        });
    }

    function __display_price_callback(response) {
        var _html = "";
        var _selectedOutput = jQuery.parseJSON(selectedOutput);
        jQuery('input[name="udraw_price_matrix_selected_options"]').val(selectedOutput);
        jQuery('input[name="udraw_price_matrix_selected_options_idx"]').val(selectedByUser);
        jQuery('input[name="udraw_price_matrix_selected_options_object"]').val(JSON.stringify(selectedPMOptions));
        jQuery('input[name="udraw_price_matrix_price"]').val(response.Price);
        jQuery('input[name="udraw_price_matrix_qty"]').val(jQuery("#txtQty").val());
        if (typeof response.Weight != 'undefined') {
            jQuery('input[name="udraw_price_matrix_weight"]').val(response.Weight);
            jQuery('input[name="udraw_price_matrix_length"]').val(response.Length);
        }
        if (typeof response.Width != 'undefined') {
            jQuery('input[name="udraw_price_matrix_width"]').val(response.Width);
            jQuery('input[name="udraw_price_matrix_height"]').val(response.Height);
        }
        if (typeof response.ShippingDimensions != 'undefined') {
            var _stripped = response.ShippingDimensions.replace(/\""/g, '"');
            jQuery('input[name="udraw_price_matrix_shipping_dimensions"]').val(_stripped);
        }
        // Show Design Button After Price is Displayed
        jQuery('#udraw-options-page-design-btn').fadeIn();
    }

    jQuery(document).ready(function ($) {
        // Display Price
        display_udraw_price_matrix_preview();
        <?php echo $settings['udraw_price_matrix_js_hook'] ?>
        var price_matrix_placement = '<?php echo $settings['udraw_price_matrix_placement'] ?>';
        //Move the price matrix if there is a designated place for it, if said place exists
        if (price_matrix_placement.length > 0) {
            if ($(price_matrix_placement).length > 0) {
                $(price_matrix_placement).append($('div.udraw_price_matrix_container'));
            }
        }
    });

</script>
<style>
    tr.udraw_action_row td{
        padding: 5px;
    }
    <?php echo $settings['udraw_price_matrix_css_hook'] ?>
</style>
<?php include_once(UDRAW_PLUGIN_DIR . '/templates/frontend/__display-options-first-script.php'); ?>