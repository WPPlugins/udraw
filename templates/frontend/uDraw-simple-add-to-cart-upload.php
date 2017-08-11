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

if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
    $product_id = $product->get_id();
} else {
    $product_id = $product->id;
}

$is_design_product = false;
$is_upload_artwork = false;
$allow_structure_file = false;

$uDraw = new uDraw();
$designTemplateId = $uDraw->get_udraw_template_ids($post->ID);
$blockProductId = get_post_meta($post->ID, '_udraw_block_template_id', true);
$xmpieProductId = get_post_meta($post->ID, '_udraw_xmpie_template_id', true);
$isTemplatelessProduct = get_post_meta($post->ID, '_udraw_templateless_product', true);

if (count($designTemplateId) > 0 || count($xmpieProductId) > 0 || count($blockProductId) > 0 || $isTemplatelessProduct) { $is_design_product = true; }
$udrawApparelInstalled = uDraw::is_udraw_apparel_installed();
$isApparel = false;
$isDesignOnline = false;
if ($udrawApparelInstalled) {
    $isApparel = get_post_meta($post->ID, '_udraw_apparel', true);
    //$isDesignOnline = get_post_meta($post->ID, '_udraw_apparel_enable_design_online', true);
    $isApparel = ($isApparel == 'true');
    if ($isApparel) {
        //check virtual products table if allows design online
        $is_design_product = true;
    }
}

$allowUploadArtwork = get_post_meta($post->ID, '_udraw_allow_upload_artwork', true);
if ($allowUploadArtwork == "yes" || !$is_design_product) {
    $is_upload_artwork = true;
}
if ($isApparel) {
    $is_upload_artwork = false;
}
$allowConvertPDF = get_post_meta($post->ID, '_udraw_allow_convert_pdf', true); //'yes'
if (get_post_meta($post->ID, '_udraw_allow_structure_file', true) == "yes") { $allow_structure_file = true; }
?>

<?php
	// Availability
	$availability      = $product->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';

	echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" method="post" enctype='multipart/form-data'>
         <input type="hidden" name="udraw_options_uploaded_files" value="" />
         <input type="hidden" name="udraw_options_converted_pdf" value="" />
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	 	<?php
	 		if ( !$product->is_sold_individually() && !$isApparel ) {
	 			woocommerce_quantity_input( array(
	 				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
	 				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
	 				'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
	 			) );
	 		}
	 	?>
	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product_id ); ?>" />
<?php if (!$isApparel) { ?>
        <button type="submit" style="display:none;" id="udraw-options-submit-form-btn" class="single_add_to_cart_button button alt"><?php echo esc_html($product->single_add_to_cart_text() ); ?></button>
<?php } ?>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>

<?php
$is_upload_product_update = false;
$is_design_product_update = false;
$is_converted_pdf_product = false;
$_cart_item_key = (isset($_REQUEST['cart_item_key'])) ? $_REQUEST['cart_item_key'] : '';

// Attempt to load in design from cart.
if( strlen($_cart_item_key) > 0 ) {
    //load from cart item
    $cart = $woocommerce->cart->get_cart();
    $cart_item = $cart[$_cart_item_key];
    if($cart_item) {
        if( isset($cart_item['udraw_data']) ) {
            if (strlen($cart_item['udraw_data']['udraw_options_uploaded_files']) > 0) {
                $is_upload_product_update = true;
                if ($cart_item['udraw_data']['udraw_options_converted_pdf']) {
                    $is_converted_pdf_product = true;
                }
            } else {
                if (strlen($cart_item['udraw_data']['udraw_product_data']) > 0) {
                    $is_design_product_update = true;
                }
            }
        }
    }
}

?>

<br />
<table id="udraw-options-actions-btn-table" style="width: 100%;text-align: center;">
    <tr class="udraw_action_row design_row">
        <?php if ( $is_design_product && (!$is_upload_product_update || $is_converted_pdf_product)) { ?>
        <td>
            <button id="udraw-options-page-design-btn" class="button btn btn-primary" disabled>
                <span id="udraw-design-online-span" style="display: none;"><?php _e('Design Now','udraw') ?></span>
                <i class="fa fa-pulse fa-spinner"></i>
            </button>
        </td>
        <?php } ?>
        <?php if ($is_design_product && $allow_structure_file) { ?>
        <td>
            <a href="#" id="udraw-generate-structure-file-btn" class="button btn btn-primary" style="display: none;">Generate Structure File</a>
            <div id="structure-file-container" style="display: none;">
                <form id="udraw-structure-form-input" action="<?php echo admin_url('admin-ajax.php') ?>" method="post" target="_blank" style="width: auto; display: inline-block; border: none;padding: 0; margin-bottom: 0;">
                  <input type="hidden" name="action" value="udraw_designer_generate_structure_file"><br>
                  <input type="hidden" name="pages" value=""><br>
                  <input type="submit" value="Download File">
                </form>
                <a href="#" id="udraw-upload-structure-file-btn" class="button btn btn-primary">Upload File</a>
                <input style="display: none;" id="udraw-structure-file-upload" type="file" name="structureFile" accept="application/zip,application/x-zip,application/x-zip-compressed,application/x-rar-compressed, application/octet-stream, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel">
            </div>
        </td>
        <?php } ?>
        <?php do_action('udraw_product_action_row_design_row_custom', $post); ?>
    </tr>
    <tr class="udraw_design_row upload_row">
        <?php if ($is_upload_artwork && !$is_design_product_update) { ?>
        <td>
            <a href="#" id="udraw-options-page-upload-btn" class="button btn btn-primary" onclick="javascript: return false;"><?php if ($is_upload_product_update) { echo "Replace Artwork"; } else { echo "Upload Artwork"; } ?></a>
            <input style="display: none;visibility: hidden;width: 0;height: 0;" id="fileupload" type="file" name="files[]" accept="image/jpg,image/png,image/jpeg,image/gif,application/pdf" multiple>
        </td>
        <?php } ?>
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

<div class="container" id="udraw-bootstrap" style="background:none;" >
    <div class="row" id="udraw-upload-preview-div" style="display:none;">
        <div class="row" style="padding-bottom:15px;">
            <a href="#" class="btn btn-danger" id="udraw-preview-back-to-options-btn"><strong>Back to Options</strong></a>
            <a href="#" class="btn btn-success" id="udraw-preview-approve-btn"><strong>Approve &amp; Add to Cart</strong></a>
        </div>
        <div class="row" id="udraw-preview-upload-placeholer">
        </div>
    </div>
</div>

<style>
    tr.udraw_action_row td{
        padding: 5px;
    }
</style>

<?php include_once(UDRAW_PLUGIN_DIR . '/templates/frontend/__display-options-first-script.php'); ?>