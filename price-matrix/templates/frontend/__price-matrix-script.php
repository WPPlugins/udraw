<script type="text/javascript">
    var json, bs, selectedDefault, selectedByUser, eFileName = "";
    var selectedSaved = [];
    var selectedOutput = '';
    var selectedPrice = '';
    var loadedFromCart = false;
    var priceMatrixInit = true;
    var measurement_unit_label = '<?php echo $_measurement_unit ?>';
    var priceMatrixObj;
</script>

<?php

$_cart_item_key = '';
// uDraw param for cart item key value
if (isset($_GET['cart_item_key'])) { $_cart_item_key = $_GET['cart_item_key']; }
// support for other plugin that uses diff. name than uDraw
if (isset($_GET['tm_cart_item_key'])) { $_cart_item_key = $_GET['tm_cart_item_key']; }


$is_upload_product_update = false;
$is_design_product_update = false;
$is_converted_pdf_product = false;

// Attempt to previous options selected from cart.
if( isset($_GET['cart_item_key']) ) {
    //load from cart item
    $cart = $woocommerce->cart->get_cart();
    $cart_item = $cart[$_GET['cart_item_key']];
    if($cart_item) {

    }
}


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
            if( isset($cart_item['udraw_data']['udraw_price_matrix_selected_options_idx']) ) {
            ?>
                <script type="text/javascript">
                    selectedOutput = '<?php echo $cart_item['udraw_data']['udraw_price_matrix_selected_options']; ?>';
                    selectedPMOptions = '<?php echo $cart_item['udraw_data']['udraw_price_matrix_selected_options_object']; ?>';
                    var _idx = '<?php echo $cart_item['udraw_data']['udraw_price_matrix_selected_options_idx']; ?>';
                    var selected_quantity = '<?php echo $cart_item['udraw_data']['udraw_price_matrix_qty']; ?>';
                    var selected_width = '<?php echo $cart_item['udraw_data']['udraw_price_matrix_width'] ?>';
                    var selected_height = '<?php echo $cart_item['udraw_data']['udraw_price_matrix_height'] ?>';
                    if (typeof JSON.parse(selectedOutput).Width == "object") { selected_width = JSON.parse(selectedOutput).Width[0]; }
                    if (typeof JSON.parse(selectedOutput).Height == "object") { selected_height = JSON.parse(selectedOutput).Height[0]; }
                    selectedSaved = _idx.split(',');
                    selectedDefault = _idx.split(',');
                    selectedByUser = _idx.split(',');
                    loadedFromCart = true;
                </script>
            <?php
            }
        }
    }
}
?>

<script>
    var pm_original_preview_image = '';
    function udraw_post_file_upload(uploadedFiles) {
        jQuery('div.upload_err').remove();
        var key = '<?php echo base64_encode(uDraw::get_udraw_activation_key() .'%%'. str_replace('.', '-', $_SERVER['HTTP_HOST'])); ?>';
        if (bs.ShowSize || (canvasWidth > 0 && canvasHeight > 0)) {
            if (measurement_unit_label == 'ft' || measurement_unit_label == 'in') {
                var _extension = uploadedFiles[0].url.toLowerCase();
                if (_extension.endsWith('pdf')) {
                    jQuery("<span>Please Wait, Verifying File...<span>").insertBefore('.udraw-progress-bar');
                    if (bs.ShowSize) {
                        jQuery.ajax({
                            method: "GET",
                            response: "json",
                            crossdomain: true,
                            url: '<?php echo UDRAW_CONVERT_URL ?>key=' + key + '&type=udrawsvg&action=info&document=' + uploadedFiles[0].url,
                            success: function (response) {
                                var result = JSON.parse(response);
                                __validate_pm_area_image(uploadedFiles[0].url, parseInt(result.pageWidth), parseInt(result.pageHeight));
                            }
                        });
                    }
                    if (canvasWidth > 0 && canvasHeight > 0) {
                        var targetWidth = canvasWidth;
                        var targetHeight = canvasHeight;
                        if (measurement_unit_label == 'ft') {
                            targetWidth = canvasWidth * 12;
                            targetHeight = canvasHeight * 12;
                        }
                        jQuery.ajax({
                            method: "GET",
                            response: "json",
                            crossdomain: true,
                            url: '<?php echo UDRAW_CONVERT_URL ?>key=' + key + '&type=pdf&action=info&document=' + uploadedFiles[0].url,
                            success: function (response) {
                                var result = JSON.parse(response);
                                jQuery('.price-matrix-upload-error').remove();
                                if (typeof result.imageInfo[0] !== 'undefined') {
                                    __validate_next_image(result.imageInfo, 0, targetWidth, targetHeight, targetDpi, function(){
                                        jQuery('#udraw-options-file-upload-progress span').empty();
                                        var _html = "<label style=\"font-size:10pt;\"><strong>Uploaded</strong>:&nbsp;" + uploadedFiles[0].name + "</label>";
                                        _html += "<a href=\"#\" onclick=\"javascript: removeUploadedFile('"+ uploadedFiles[0].name +"'); return false; \">&nbsp;<i class=\"fa fa-times-circle\" style=\"color: red; font-size: 1.5em;\"></i></a><br/>";
                                        jQuery('.udraw-uploaded-files-list').append(_html);
                                        jQuery('#udraw-options-submit-form-btn').show();
                                    });
                                }
                            }
                        });
                    }
                } else if (_extension.endsWith('png') || _extension.endsWith('jpg') || _extension.endsWith('jpeg') || _extension.endsWith('jpe') ||
                    _extension.endsWith('gif') || _extension.endsWith('tiff') || _extension.endsWith('tif')) {
                    var img = new Image();
                    img.onload = function () {
                        if (bs.ShowSize) {
                            __validate_pm_area_image(uploadedFiles[0].url, this.width, this.height);
                        } else {
                            var targetWidth = canvasWidth;
                            var targetHeight = canvasHeight;
                            if (measurement_unit_label == 'ft') {
                                targetWidth = canvasWidth * 12;
                                targetHeight = canvasHeight * 12;
                            }
                            __validate_image_size(this.width, this.height, targetWidth, targetHeight, targetDpi, function () {
                                jQuery('#udraw-options-file-upload-progress span').empty();
                                var _html = "<label style=\"font-size:10pt;\"><strong>Uploaded</strong>:&nbsp;" + uploadedFiles[0].name + "</label>";
                                _html += "<a href=\"#\" onclick=\"javascript: removeUploadedFile('" + uploadedFiles[0].name + "'); return false; \">&nbsp;<i class=\"fa fa-times-circle\" style=\"color: red; font-size: 1.5em;\"></i></a><br/>";
                                jQuery('.udraw-uploaded-files-list').append(_html);
                                jQuery('#udraw-options-submit-form-btn').show();
                            });
                        }
                        //__pm_update_area_based_on_image(uploadedFiles[0].url, this.width, this.height);
                    }
                    jQuery("<span>Please Wait, Verifying File...<span>").insertBefore('.udraw-progress-bar');
                    img.src = uploadedFiles[0].url;

                }
            }
        }

        return false;
    }
</script>
