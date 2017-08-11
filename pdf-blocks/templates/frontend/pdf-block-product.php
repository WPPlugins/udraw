<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include_once(UDRAW_PLUGIN_DIR . '/designer/designer-header-init.php');

global $woocommerce, $product, $post;

if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
    $product_type = $product->get_type();
} else {
    $product_type = $product->product_type;
}

$GoEpower = new GoEpower();
$uDrawPDFBlocks = new uDrawPDFBlocks();
$udrawSettings = new uDrawSettings();
$_udraw_settings = $udrawSettings->get_settings();

$allowPDFPrintSave = get_post_meta($post->ID, '_udraw_pdf_allow_print_save', true);
$displayOptionsFirst = get_post_meta($post->ID, '_udraw_display_options_page_first', true);

// Support for multiple block templates for one product.
// If the block template is 'old' method, we will change it to array 'new' method of getting id.
$blocks_array = Array();
if (isset($blockProductId)) {
    if (gettype($blockProductId) == "string") {
        if (strlen($blockProductId) > 0) {
            array_push($blocks_array, $blockProductId);
        }
    } else if (gettype($blockProductId) == "array") {
        $blocks_array = $blockProductId;    
    } else {
        // Uh Oh! Spagetios!
        // This condition shouldn't happen and there was a problem defining the product Id.
        header('/', true);
    }
}

$block_product = $uDrawPDFBlocks->get_product($blocks_array[0]);

// Check if blocks are multiple or single.
$isMultiBlock = (count($blocks_array) > 1) ? true : false;

// Reverse compatibility of older GoEpower implementations
if ($_udraw_settings["goepower_username"] === "") {
    $blocks_array_updated = Array();
    foreach ($blocks_array as $block) {                                
        $block_data = $uDrawPDFBlocks->get_product($block);
        array_push($blocks_array_updated,$block_data['ProductID']);
    }
    $blocks_array = $blocks_array_updated;
}

if (strlen($blocks_array[0]) > 10) {
    $_auth_object = $GoEpower->get_auth_object();
    echo '<script type="text/javascript">var goepower_token="'. $_auth_object->Token .'";</script>';
    if (isset($_auth_object->CustomID)) {
        echo '<script type="text/javascript">var goepower_custom_id="'. $_auth_object->CustomID .'";</script>';
    }
}

?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<form method="POST" action="" name="udraw_save_later_form" id="udraw_save_later">
    <input type="hidden" name="udraw_save_product_data" value="" />
    <input type="hidden" name="udraw_save_product_preview" value="" />
    <input type="hidden" name="udraw_save_post_id" value="<?php echo $post->ID ?>" />
    <input type="hidden" name="udraw_save_access_key" value="<?php echo (isset($_GET['udraw_access_key'])) ? $_GET['udraw_access_key'] : NULL; ?>" />
    <input type="hidden" name="udraw_is_saving_for_later" value="1" />
    <?php wp_nonce_field('save_udraw_customer_design'); ?>
</form>

<div id="pdf-block-product-ui" style="display:none;">
    <div id="udraw-bootstrap" style="background:none;">
        <div class="container" style="background:none; margin:0px; padding:0px;">
            <?php
            $button_placement = "top";
            if (isset($_udraw_settings['goepower_pdf_approve_btn_below_preview']) && $_udraw_settings['goepower_pdf_approve_btn_below_preview']) { $button_placement = "bottom"; }
            if ($_udraw_settings['goepower_approve_button_placement'] == "bottom") { $button_placement = "bottom"; }
            if ($_udraw_settings['goepower_approve_button_placement'] == "both") { $button_placement = "both"; }
            
            $preview_mode = "image";
            if ($_udraw_settings['goepower_preview_mode'] == "pdf") { $preview_mode = "pdf"; }
            
            if($button_placement == "top" || $button_placement == "both") {
                pdf_block_display_approve_html($_udraw_settings, $allowPDFPrintSave);
            }
            ?>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="col-xs-12 col-md-12 col-lg-4">
                        <?php if ($isMultiBlock) { ?>
                        <div class="col-xs-12 col-lg-12">Product Selection</div>
                        <div class="col-xs-12 col-lg-12">
                            <select class="udrawProductSelect2 dropdownList form-control" id="_product_selection" style='width:100%;'>
                            <?php 
                                foreach ($blocks_array as $block) {                                
                                    $block_json = $uDrawPDFBlocks->get_product($block);
                                    echo '<option value="'. $block . '">' . $block_json['ProductName'] . '</option>';
                                }
                            ?>
                            </select>
                        </div>                 
                        <?php } ?>
                        <div id="pdf-block-inputs"></div>
                        <br />
                    </div>
                    <div class="col-xs-12 col-md-12 col-lg-8">
                        <div id="pdf-block-thumbnail-preview" style="border: 1px solid rgb(203, 203, 203); float:right;">
                            <img src="<?php echo $block_product["ThumbnailLarge"]; ?>" />
                        </div>
                        <div id="loadingDiv" style="float:right; display:none;" >
                            <img src="<?php echo UDRAW_PLUGIN_URL ?>assets/includes/loading-animation.gif" />
                        </div>
                        <section id="preview-container">
                            <div id="preview-zoom-controls" class="buttons" style="display:none;">
                                <button class="zoom-in" style="background-color: #54AF54;font-size: 20px; padding-right: 6px; padding-bottom:4px; padding-top: 6px; padding-left: 7px; border-radius: 26px;"><i class="glyphicon glyphicon-plus" style="font-size: 19px;color: white;"></i></button>
                                <button class="zoom-out" style="background-color: #f53e3e;font-size: 20px; padding: 4px; padding-top: 6px; border-radius: 26px; padding-left: 6px; padding-right:7px;"><i class="glyphicon glyphicon-minus" style="font-size: 21px;color: white; margin-left:-2px;"></i></button>
                                <input style="display:none;" type="range" class="zoom-range">
                                <button class="reset"style="background-color: #1678d7;font-size: 20px; padding: 4px; padding-top: 6px; border-radius: 26px; padding-left: 6px; padding-right:7px;"><i class="glyphicon glyphicon-repeat" style="font-size: 21px;color: white; margin-left:0px;"></i></button>
                            </div>
                          <div id="previewDiv" style="padding-top:10px; text-align:center;" class="panzoom-parent">
                          </div>
                        </section>
                    </div>                
                </div>
            </div>
            <?php
            if($button_placement == "bottom" || $button_placement == "both") {
                pdf_block_display_approve_html($_udraw_settings, $allowPDFPrintSave);
            }
            ?>
        </div>
    </div>

    <?php echo $_udraw_settings['udraw_pdf_template_html_hook']; ?>
</div>

<?php 

function pdf_block_display_approve_html($_udraw_settings, $allowPDFPrintSave) {    
    ?>
    <div class="row"  style="padding-right:30px; padding-bottom:5px;">
        <div class="col-md-6 col-md-offset-6">
            <?php if ($allowPDFPrintSave == "yes") { ?>
                <button id="udraw-download-pdf-btn" class="btn btn-primary udraw-download-pdf-btn"><i class="fa fa-download"></i>&nbsp;<?php _e('Download PDF', 'udraw') ?></button> 
            <?php } ?>

            <?php if ( (wp_get_current_user()->ID > 0) && ($_udraw_settings['udraw_customer_saved_design_page_id'] > 1) ) { ?>
                <span style="float:right;">&nbsp;&nbsp;</span>
                <button id="udraw-save-later-design-btn" class="btn btn-primary"><i class="fa fa-floppy-o"></i>&nbsp;<?php _e('Save For Later', 'udraw') ?></button>        
            <?php } ?>

            <?php if (!$_udraw_settings['goepower_pdf_disable_refresh_button']) { ?>
                <button class="pdf-block-preview-btn btn btn-primary"><i class="fa fa-file-image-o"></i>&nbsp;<?php _e('Preview Now', 'udraw') ?></button>
            <?php } ?>

            <span style="padding-left:10px; display:none;" class="pdf-block-next-span">
                <button class="pdf-block-next-btn btn btn-success"><?php _e('Approve & Continue', 'udraw') ?> &nbsp; <i class="fa fa-chevron-right"></i></button>
            </span>
        </div>
    </div>
    <?php
}
?>

<script type="text/javascript">
    var _previous_pdf_block_entries = undefined;
    var currentBlockId = '<?php echo $blocks_array[0]; ?>';
    <?php

    // Attempt to previous options selected from cart.
    if( isset($_GET['cart_item_key']) ) {
        //load from cart item
        $cart = $woocommerce->cart->get_cart();
        $cart_item = $cart[$_GET['cart_item_key']];
        if($cart_item) {
            if( isset($cart_item['udraw_data']['udraw_pdf_block_product_data']) ) {
                //$json_data = json_decode(stripslashes($cart_item['udraw_data']['udraw_pdf_block_product_data']));
                echo '_previous_pdf_block_entries = jQuery.parseJSON(\''. ($cart_item['udraw_data']['udraw_pdf_block_product_data']) .'\');';
                echo 'currentBlockId = "'. $cart_item['udraw_data']['udraw_pdf_block_product_id'] . '";';
            }
        }
    }

    // Attempt to load saved customer design.
    if( isset($_GET['udraw_access_key']) ) {
        $design = uDraw::get_udraw_customer_design($_GET['udraw_access_key']);
        if (strlen($design['design_data']) > 1 ) {
            if (strlen($design['design_data']) < 40) {
                if (is_file(UDRAW_STORAGE_DIR . $design['design_data'])) {
                    $_saved_block_data = file_get_contents(UDRAW_STORAGE_DIR . $design['design_data']);
                    echo '_previous_pdf_block_entries = jQuery.parseJSON(\''. stripslashes($_saved_block_data) .'\');';
                }
            } else {
                echo '_previous_pdf_block_entries = jQuery.parseJSON(\''. stripslashes($design['design_data']) .'\');';
            }   
        }
    }

    ?>
    var udrawFileUploadHandlerURL = '<?php echo admin_url( 'admin-ajax.php' ) . '?action=udraw_price_matrix_upload&session='. uniqid() ?>';
    var appPath =  '<?php echo $GoEpower->get_api_url(); ?>/';
    var lastBlockPreview = '';
    var approvedButtonClicked = false;
    var saveLaterButtonClicked = false;
    
    var currentPDFDoc = '';
    var hideTextLabels = false;
    <?php if ($_udraw_settings['goepower_hide_labels_on_text_input']) { echo "hideTextLabels = true;"; } ?>

    function __process_pdf_preview() {
        jQuery('#previewDiv').hide();
        <?php if (!$_udraw_settings['goepower_pdf_disable_refresh_button']) { ?>
            jQuery('.pdf-block-preview-btn').html('<i class="fa fa-refresh"></i>&nbsp;Refresh Preview')
        <?php } ?>
        jQuery('.pdf-block-next-span').fadeIn();
        jQuery('#pdf-block-thumbnail-preview').fadeOut();
        jQuery('#loadingDiv').fadeIn();
        Blocks_Process(currentBlockId);
    }

    function __process_pdf_preview_completed() {
        jQuery('#loadingDiv').hide();
        setTimeout(function () {
            jQuery('#previewDiv').show();
            <?php if ($preview_mode == "image") { ?>
            jQuery('#preview-zoom-controls').show();
            (function ($) {
                $(function () {
                    var $section = $('#preview-container');
                    $section.find('.panzoom').panzoom({
                        $zoomIn: $section.find(".zoom-in"),
                        $zoomOut: $section.find(".zoom-out"),
                        $zoomRange: $section.find(".zoom-range"),
                        $reset: $section.find(".reset"),
                        startTransform: 'scale(1.0)',
                        increment: 0.1,
                        minScale: 1,
                        contain: 'invert',
                        disablePan: true
                    });
                    jQuery('.panzoom').on('panzoomzoom', function(e, panzoom, scale, options) {
                        jQuery('.panzoom').panzoom('option', 'disablePan', scale <= options.minScale);
                   });
                });
            })(jQuery)

            <?php } ?>
        }, 500);

        setTimeout(function () {
            if (saveLaterButtonClicked) {
                jQuery('#udraw_save_later').submit();
            }
        }, 1000);
    }

    function __process_pdf_preview_success(doc) {
        jQuery("#previewDiv").empty();
        lastBlockPreview = (typeof goepower_token != 'undefined') ? doc + '_1.png' : doc + '.png';
        <?php if ($preview_mode == "image") { ?>
        if (pdf_block_info != null) {
            jQuery("#previewDiv").empty();
            jQuery("#preview-zoom-controls").empty();
            for (var i = 0; i < pdf_block_info.BlocksFilePageCount; i++) {
                jQuery("#previewDiv").append("<img class='col-md-12' src='" + doc + "_"+ (i+1) +".png"+"' /><br />");
            }
        } else {
            jQuery("#previewDiv").html("<img class='panzoom' src='" + lastBlockPreview + "' />");
        }
        <?php } else { ?>
            jQuery("#previewDiv").html("<iframe src='<?php echo wp_make_link_relative(UDRAW_PLUGIN_URL) ?>/assets/pdfjs/web/viewer.php?file=" + doc + "&ps=<?php echo $allowPDFPrintSave; ?>' style='width:100%; min-height: 475px;' allowfullscreen webkitallowfullscreen></iframe>");
        <?php } ?>


        <?php if ($allowPDFPrintSave == "yes") {  ?>
        currentPDFDoc = doc;
        <?php } ?>

        if (saveLaterButtonClicked) {
            jQuery('input[name="udraw_save_product_data"]').val(JSON.stringify(blocksJsonEntry));
            jQuery('input[name="udraw_save_product_preview"]').val(lastBlockPreview);
            // Defer form submit to _completed function
        }

        if (approvedButtonClicked) {

            var isValid = true;
            jQuery('#pdf-block-inputs :input[required]:visible').each(function (index) {
                var element = jQuery(this);
                var elementValue = element.val();
                if (elementValue.length == 0) {
                    element.css("border", "1px solid #F00");
                    element.attr("placeholder", "Please fill in required field");
                    isValid = false;
                } else {
                    element.css("border", "1px solid #ccc");
                }
            });

            if (!isValid) {
                approvedButtonClicked = false;
                return false;
            }


            jQuery('#pdf-block-product-ui').hide();

            if (typeof display_udraw_price_matrix_preview == 'function') {
                display_udraw_price_matrix_preview();
                jQuery('#udraw-price-matrix-ui').fadeIn();
            }

            __update_cart_form();

            <?php if ($displayOptionsFirst == "yes") { ?>
                jQuery('.variations_form').submit();
            <?php } else if ($isPriceMatrix) { ?>
                // Set Image Preview
                var _placeHolder = document.getElementById("udraw-product-preview");

                while (_placeHolder.hasChildNodes()) {
                    _placeHolder.removeChild(_placeHolder.lastChild);
                }

                var imgPreview = document.createElement("img");
                imgPreview.src = lastBlockPreview;
                imgPreview.setAttribute("class", "thumbnail col-md-10");
                //imgPreview.style["margin"] = "3px";
                //imgPreview.style["margin-left"] = "17px";
                _placeHolder.appendChild(imgPreview);

                <?php if ($button_placement == "bottom" || $button_placement == "both") { ?>
                    // Move to top of the page.
                    jQuery('html,body').animate({ scrollTop: jQuery('head') }, 700);
                <?php } ?>
            <?php } else { ?>
                //Check that variations are selectable
                if (!jQuery('#udraw-select-options-ui').is(':visible')) {
                    jQuery('#pdf-block-product-ui').hide();
                    jQuery('#udraw-select-options-ui').show();
                    <?php if ($button_placement == "bottom" || $button_placement == "both") { ?>
                        // Move to top of the page.
                        jQuery('html,body').animate({ scrollTop: jQuery('head') }, 700);
                    <?php } ?>
                }
            <?php } ?>
        }
    }

    function __update_cart_form() {
        jQuery('<input>').attr({
            type: 'hidden',
            id: 'udraw_pdf_block_product_id',
            name: 'udraw_pdf_block_product_id',
            value: currentBlockId
        }).appendTo('form.cart');

        jQuery('<input>').attr({
            type: 'hidden',
            id: 'udraw_pdf_block_product_thumbnail',
            name: 'udraw_pdf_block_product_thumbnail',
            value: lastBlockPreview
        }).appendTo('form.cart');

        jQuery('<input>').attr({
            type: 'hidden',
            id: 'udraw_pdf_block_product_data',
            name: 'udraw_pdf_block_product_data',
            value: JSON.stringify(blocksJsonEntry)
        }).appendTo('form.cart');

        if (typeof pdf_block_order_info == "object") {
            if (pdf_block_order_info.length > 0) {
                jQuery('<input>').attr({
                    type: 'hidden',
                    id: 'udraw_pdf_order_info',
                    name: 'udraw_pdf_order_info',
                    value: JSON.stringify(pdf_block_order_info)
                }).appendTo('form.cart');
            }
        }
    }

    function __process_pdf_form_completed() {
        <?php if ($_udraw_settings['goepower_pdf_preview_auto_update']) { ?>
            jQuery('#pdf-block-inputs :text').blur(function () { __process_pdf_preview(); });
            jQuery('#pdf-block-inputs select').not('.udrawSelect2').change(function () { __process_pdf_preview(); });

            var $udrawSelect2 = jQuery(".udrawSelect2");
            $udrawSelect2.on("select2:select", function (e) { __process_pdf_preview(); });
        <?php } ?>
        __process_pdf_preview();
    }

    function enableDesignNowButton() {
        jQuery('#udraw-options-page-design-btn').removeClass("isLoading");
        jQuery('#udraw-options-page-design-btn i').remove();
        jQuery('#udraw-options-page-design-btn').attr('disabled', false);
        jQuery('#udraw-options-page-design-btn span').show();
        jQuery('#udraw-options-page-design-btn i').hide();
    }

    jQuery(document).ready(function ($) {
        Blocks_GetBlocks(currentBlockId);
        enableDesignNowButton();

        jQuery('#pdf-block-product-ui').trigger({
            type: 'product-loaded'
        });

        <?php if ($allowPDFPrintSave == "yes") {  ?>
        jQuery('#udraw-download-pdf-btn, .udraw-download-pdf-btn').click(function () {
            if (currentPDFDoc.length > 0) {
                window.open(currentPDFDoc, '_blank');
            }
        });
        <?php } ?>

        jQuery('.pdf-block-preview-btn').click(function () { __process_pdf_preview(); });        

        jQuery('.pdf-block-next-btn').click(function () {
            saveLaterButtonClicked = false;
            approvedButtonClicked = true;
            __process_pdf_preview();
            <?php if ($displayOptionsFirst !== "yes") { ?>
                jQuery('div.summary.entry-summary').show();
            <?php } ?>
        });

        jQuery('#udraw-save-later-design-btn').click(function () {
            saveLaterButtonClicked = true;
            approvedButtonClicked = false;
            __process_pdf_preview();
        });

        setTimeout(function () {
            <?php if ($displayOptionsFirst == "yes") { ?>
            jQuery('#pdf-block-product-ui').hide();
            <?php } else { ?>
            jQuery('#udraw-price-matrix-ui').hide();
            jQuery('#pdf-block-product-ui').show();
            jQuery('div.summary.entry-summary').hide();
            <?php } ?>
            
        }, 500);

        jQuery('#_product_selection').change(function () {
            jQuery('#pdf-block-inputs').empty();
            currentBlockId = jQuery('#_product_selection').val();
            previous_block_entries = current_block_entries;
            Blocks_GetBlocks(currentBlockId);
            setTimeout(function () {
                Blocks_Process(currentBlockId);
            }, 1000);

            jQuery('#pdf-block-product-ui').trigger({
                type: 'product-loaded'
            });
        });

        <?php if ($product_type == "simple") { ?>
            jQuery('.cart').click(function() {
                __update_cart_form();
            });
        <?php } ?>

        jQuery('#udraw-options-page-design-btn').click(function () {
            jQuery('#pdf-block-product-ui').show();
        });
        jQuery('#udraw-add-to-cart-btn').click(function(){
            if (_previous_pdf_block_entries != undefined) {
                //If updating a cart item, remove cart item first before adding to cart;
            }
            if (jQuery('.price_matrix_form').length > 0) {
                jQuery('.price_matrix_form').submit();
            } else {
                jQuery('.variations_form').submit();
            }
            return false;
        });
        jQuery('button#variable-product-back-btn').on('click',function(){
            jQuery('#pdf-block-product-ui').show();
        });
        <?php echo $_udraw_settings['udraw_pdf_template_js_hook']; ?>
    });
</script>

<style type="text/css">
    #pdf-block-product-ui .select2-container .select2-choice {
        height: 55px !important;
        line-height: 55px !important;
    }
    .select2-selection {
        height: 55px !important;
        line-height: 55px !important;
        padding-top: 1px !important;
        padding-bottom: 1px !important;
    }

    <?php echo $_udraw_settings['udraw_pdf_template_css_hook']; ?>
</style>

<style>
    #udraw-bootstrap input select {
        max-width:89% !important;
    }

    @media (max-width:1200px) {
        .container div {
            padding: 0px !important;
            margin: 0px !important;
        }
    }

    #udraw-bootstrap {
        min-width: 100% !important;
    }

    #udraw-bootstrap .container {
        width: 100% !important;
        padding-right: 0px !important;
        padding-left: 0px !important;
        margin-right: 0px !important;
        margin-left: 0px !important;
    }
</style>