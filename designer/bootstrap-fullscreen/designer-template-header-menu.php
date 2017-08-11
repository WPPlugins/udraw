<?php 
global $woocommerce;
if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
    $product_type = $product->get_type();
    $product_id = $product->get_id();
} else {
    $product_type = $product->product_type;
    $product_id = $product->id;
}
$displayInlineAddToCart = false;
if ($product_type == "simple" && !$isPriceMatrix) {
    $displayInlineAddToCart = true;
}
$friendly_item_name = get_the_title($post->ID);
?>

<!-- Menu Bar -->
<div id="designer-menu" data-udraw="designerMenu">

    <?php if ($allowCustomerDownloadDesign) { 
        if (uDraw::is_udraw_okay()) { ?>
    <a href="#" class="btn btn-primary btn-sm designer-menu-btn" onclick="javascript:RacadDesigner.settings.pdfQualityLevel = 8;RacadDesigner.ExportToLayeredPDF(function(url){ var dl = document.createElement('a'); dl.setAttribute('href', url); dl.setAttribute('download', '<?php echo $friendly_item_name ?>'); dl.click(); });"><span>Download PDF &nbsp;&nbsp;&nbsp;</span><i class="fa fa-cloud-download"></i></a>
        <?php } else { ?>
        <a href="#" class="btn btn-primary btn-sm designer-menu-btn" onclick="javascript:RacadDesigner.settings.pdfQualityLevel = 8;RacadDesigner.ExportToMultiPagePDF('<?php echo $friendly_item_name ?>',false);"><span>Download PDF &nbsp;&nbsp;&nbsp;</span><i class="fa fa-cloud-download"></i></a>
    <?php 
        }
    } ?>

    <?php if ($displayOptionsFirst) { ?>
        <?php if ($isuDrawApparelProduct) { ?>
            <a href="#" class="btn btn-success btn-sm designer-menu-btn" id="ua-ud-continue-btn"><span><?php _e('Continue'); ?>&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></span></a>
        <?php } else { ?>
            <a href="#" class="btn btn-default btn-sm designer-menu-btn" id="show-udraw-display-options-ui-btn"><i class="fa fa-chevron-left"></i><span>&nbsp;&nbsp;&nbsp;Back to Options</span></a>
        <?php } ?>        
        <?php if ($product_type == "variable") { ?> 
            <a href="#" class="btn btn-success btn-sm designer-menu-btn" data-udraw="cart_btn"><span><?php _e('Next Step', 'udraw') ?></span>&nbsp;<i class="fa fa-chevron-right"></i></a>
        <?php } ?>
        <!--<a href="#" class="btn btn-success btn-sm designer-menu-btn" onclick="javascript:__finalize_add_to_cart();"><span>Next</span>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>-->
        <?php if ($product_type == "simple" && $displayInlineAddToCart && !$isuDrawApparelProduct) { ?>
        <form class="cart" method="post" enctype="multipart/form-data" style="display: inline-block; max-width: 300px;position: absolute; <?php if (isset($_udraw_settings['udraw_designer_display_orientation']) && $_udraw_settings['udraw_designer_display_orientation'] == 'rtl') { echo 'margin-right: 45%;'; } else { echo 'margin-left: 45%;'; } ?> margin-top: -3px;">
            <input type="hidden" value="" name="udraw_product">
            <input type="hidden" value="" name="udraw_product_data">
            <input type="hidden" value="" name="udraw_product_svg">
            <input type="hidden" value="" name="udraw_product_preview">
            <input type="hidden" value="" name="udraw_product_cart_item_key">
            <input type="hidden" value="" name="ua_ud_graphic_url" />
            
            <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" style="width: 60px; display: inline; height: 33px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 5px;">
            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product_id ); ?>"> 
            <span style="font-size:1.5em; vertical-align:middle;"><?php echo get_woocommerce_currency_symbol(); ?></span><span id="product_total_price" style="font-size:1.5em; vertical-align:middle;"><?php echo $product->get_price(); ?></span>
            <a href="#" id="simple-add-to-cart-btn" data-udraw="cart_btn" class="btn btn-success btn-sm designer-menu-btn" style="margin-top: -1px;"><i class="fa fa-shopping-cart"></i><i class="fa fa-spinner fa-pulse" style="display: none;"></i><span>&nbsp;<?php echo $product->single_add_to_cart_text(); ?></span></a>
        </form>
    <?php } // End If Product type is Simple ?>
    
    <?php } // End If Display Options First
    if (!$displayOptionsFirst && $templateCount > 1) { ?>
        <a href="#" class="btn btn-default btn-sm designer-menu-btn" id="show-udraw-display-options-ui-btn"><i class="fa fa-chevron-left"></i><span>&nbsp;&nbsp;&nbsp;Back to Options</span></a>
    <?php }
    if (isset($displayPriceMatrixOptions)) { ?>
            <a href="#" class="btn btn-default btn-sm designer-menu-btn" id="udraw-price-matrix-show-quote"><span><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;&nbsp;<?php _e('Show Quote', 'udraw') ?></span></a>
            <a href="#" class="btn btn-success btn-sm designer-menu-btn" id="udraw-price-matrix-designer-save"><span><?php _e('Next', 'udraw') ?></span>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
    <?php } 
    
    if (!$displayOptionsFirst && !isset($displayPriceMatrixOptions)) { ?>
        <?php if ($product_type == "variable") { ?> 
            <a href="#" class="btn btn-success btn-sm designer-menu-btn" id="udraw-variations-step-1-btn"><span id="udraw-variations-step-1-btn-label">Next Step</span>&nbsp;<i class="fa fa-chevron-right"></i></a>
            <a href="#" class="btn btn-default btn-sm designer-menu-btn" id="udraw-variations-step-0-btn" style="display:none;"><span id="udraw-variations-step-0-btn-label"><i class="fa fa-chevron-left"></i>&nbsp;Back to Design</span></a>                   
        <?php } else if ($product_type == "variable" ||$isPriceMatrix) { ?>
            <a href="#" class="btn btn-success btn-sm designer-menu-btn" id="udraw-next-step-1-btn"><span id="udraw-next-step-1-btn-label">Next Step</span>&nbsp;<i class="fa fa-chevron-right"></i></a>
        <?php } else { ?>
        <form class="cart" method="post" enctype="multipart/form-data" style="display: inline-block; <?php if ($displayInlineAddToCart) { echo "max-width: 300px;position: absolute; margin-top: -3px;"; if (isset($_udraw_settings['udraw_designer_display_orientation']) && $_udraw_settings['udraw_designer_display_orientation'] == 'rtl') { echo 'margin-right: 45%;'; } else { echo 'margin-left: 45%;'; } } ?>">
            <input type="hidden" value="" name="udraw_product">
            <input type="hidden" value="" name="udraw_product_data">
            <input type="hidden" value="" name="udraw_product_svg">
            <input type="hidden" value="" name="udraw_product_preview">
            <input type="hidden" value="" name="udraw_product_cart_item_key">

            <?php if ($displayInlineAddToCart) {?>
            <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" style="width: 60px; display: inline; height: 33px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 5px;">
            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product_id ); ?>"> 
            <span style="font-size:1.5em; vertical-align:middle;"><?php echo get_woocommerce_currency_symbol(); ?></span><span id="product_total_price" style="font-size:1.5em; vertical-align:middle;"><?php echo $product->get_price(); ?></span>
            <a href="#" data-udraw="cart_btn" class="btn btn-success btn-sm designer-menu-btn" style="margin-top: -1px;"><i class="fa fa-shopping-cart"></i><span>&nbsp;<?php echo $product->single_add_to_cart_text(); ?></span></a>
            <?php } ?>

        </form>
       <?php } ?>
    <?php } else { ?>
        <?php if ($isPriceMatrix) { ?>
        <?php if ($product_type != "variable") { ?>
            <a href="#" class="btn btn-success btn-sm designer-menu-btn" data-udraw="cart_btn"><span><?php _e('Next Step', 'udraw') ?></span>&nbsp;<i class="fa fa-chevron-right"></i></a>
    <?php } ?>
        <?php } ?>
    <?php } ?>



    <?php if ( (wp_get_current_user()->ID > 0) && ($_udraw_settings['udraw_customer_saved_design_page_id'] > 1) ) { ?>
        <a href="#" class="btn btn-primary btn-sm designer-menu-btn" id="udraw-save-later-design-btn"><i class="fa fa-floppy-o"></i><span>&nbsp;Save Design</span></a>
    <?php } ?>

    <!-- File -->
    <?php if(isset($_GET['cart_item_key']) && !$_udraw_settings['split_variations_2_step'] && !$isuDrawApparelProduct) { ?>
        <a href="#" class="btn btn-success btn-sm designer-menu-btn" id="udraw-update-design-btn"><i class="fa fa-floppy-o"></i><?php _e('Update Now', 'udraw') ?></a>
    <?php } else { ?>
        <a href="#" class="btn btn-success btn-sm designer-menu-btn" id="udraw-save-design-btn" style="width:0px; display:none;"><i class="fa fa-shopping-cart"></i><?php _e('Add To Cart', 'udraw') ?></a>
    <?php } ?>
    <!-- END FILE -->
    <!-- Pages and Layers-->
    <div class="btn-group" id="pages-layers-group" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.view">
                <button id="page-btn" class="btn btn-primary btn-sm dropdown-toggle designer-menu-btn" type="button" data-toggle="dropdown">
                    <i class="fa fa-list"></i>&nbsp;<span data-i18n="[html]menu_label.view"></span>&nbsp;<span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="viewdrop-down" role="menu">
                    <li role="presentation">
                        <a role="menuitem" href="#" id="dropdown-pages-link" data-udraw="togglePages"><i class="fa fa-file-text-o"></i>&nbsp;<span data-i18n="[html]common_label.pages"></span></a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" href="#" id="dropdown-layers-link" data-udraw="toggleLayers"><i class="fa fa-bars"></i>&nbsp;<span data-i18n="[html]common_label.layers"></span></a>
                    </li>
                    <?php if (!$_udraw_settings['designer_disable_image_filters']) { ?>
                    <li role="presentation">
                        <a role="menuitem" href="#" id="dropdown-image-properties-link" data-udraw="toggleImageFilters"><i class="fa fa-image"></i>&nbsp;<span data-i18n="[html]menu_label.image-properties"></span></a>
                    </li>
                    <?php } ?>
                    <li role="presentation">
                        <a role="menuitem" href="#" id="dropdown-show-boundingbox" data-udraw="boundingBox"><i class="fa fa-square-o"></i>&nbsp;<span data-i18n="[html]menu_label.bounding-box"></span></a>
                    </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="dropdown-ruler-link" data-udraw="toggleRuler"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>ruler.png" style="margin-top: -3px;" />&nbsp;<span data-i18n="[html]menu_label.ruler"></span></a>
            </li>
            <li role="presentation">
                        <a role="menuitem" href="#" id="dropdown-snap-to-grid-link" data-udraw="snapToGrid">
                        <input type="checkbox" id="snap-to-grid-checkbox" data-udraw="snapCheckbox">&nbsp;<span data-i18n="[html]menu_label.snap-to-grid"></span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" href="#" id="dropdown-display-grid-link" data-udraw="toggleGridLines">
                        <input type="checkbox" id="toggle-grid-checkbox" data-udraw="gridCheckbox">&nbsp;<span data-i18n="[html]menu_label.toggle-grid"></span>
                        </a>
                    </li>
                </ul>
            </div>
    <!-- End Pages and layers-->
    <!-- Templates -->
    <?php

    if (!isset($isBlankCanvas)) {
        // Default to load in original template design.
        $table_name = $_udraw_settings['udraw_db_udraw_templates'];
        $uDraw = new uDraw();
        $templateId = $uDraw->get_udraw_template_ids($post->ID);
        $tags = "";
        if (count($templateId) > 0) {
            $tags = $wpdb->get_var("SELECT tags FROM $table_name WHERE id = '". $templateId[0] ."'");
        }
        
        if (strlen($tags) > 1) {
            ?>
            <div class="btn-group">
                <button id="template-menu" class="btn btn-primary btn-sm dropdown-toggle designer-menu-btn" type="button" data-toggle="dropdown">
                    <i class=""></i>&nbsp;<span data-i18n="[html]menu_label.templates"></span>&nbsp;<span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li role="presentation"><a role="menuitem" href="#" id="private-template-browser-btn" data-udraw="browsePrivateTemplate"><i class="fa fa-file"></i>&nbsp;Browse Designs</a></li>                
                </ul>
            </div>
            <?php
        }
    }
    ?>
    <!-- END Templates -->
    <!--Zoom Control-->
    <div id="zoom-container" data-udraw="zoomContainer">
        <span id="scale-canvas-slider-label" data-i18n="[html]text.zoom" style="width: 100px" data-udraw="zoomDisplay"></span>
        <div id="scale-canvas-slider" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.zoom-bar" data-udraw="zoomLevel"></div>
    </div>
    <!--End Zoom Control-->
    <!-- Version Number -->
    <div id="version-number-container" data-udraw="versionContainer">
        <button id="full-screen" type="button" class="btn btn-success btn-sm"><i id="full-screen-icon" class="fa fa-expand"></i>&nbsp;<span data-i18n="[html]button_label.full-screen"></span></button>
        <span class="small" id="racad-designer-version" data-udraw="designerVersion"></span>
    </div>
    <!-- END Version Number -->
    <!-- END Menu Bar-->   
</div>