<?php 
    global $woocommerce;
    $udrawSettings = new uDrawSettings();
    $_udraw_settings = $udrawSettings->get_settings();
    
    $uDraw = new uDraw();
    $friendly_item_name = get_the_title($post->ID);
    if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
        $product_type = $product->get_type();
        $product_id = $product->get_id();
    } else {
        $product_type = $product->product_type;
        $product_id = $product->id;
    }
?>
<div id="racad-designer-loading" data-udraw="progressDialog">
    <div class="alert alert-info">
        <strong><span data-i18n="[html]common_label.progress"></span></strong>
        <div class="progress progress-striped active">
            <div class="progress-bar" role="progressbar" aria-valuenow="105" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>
    </div>
</div>
<div id="udraw-main-designer-ui" style="min-height: 750px; height: 100%; width: 100%; position: absolute; background-color: #F2F2F2;">
         
<?php
$displayInlineAddToCart = false;
if ($product_type == "simple" && !$isPriceMatrix) {
    $displayInlineAddToCart = true;
}
if (!$_udraw_settings['designer_disable_image_replace']) { ?>
    <a href="#" class="btn-warning btn-sm" id="replace-image-toolbar-btn" style="display: none;" data-udraw="replaceImage"><i class="fa fa-retweet">&nbsp;</i><span data-i18n="[html]common_label.replace"></span></a>
<?php } ?>
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
            <a href="#" class="btn btn-success btn-sm designer-menu-btn" id="ua-ud-continue-btn"><span><?php _e('Continue'); ?>&nbsp;&nbsp;</span><i class="fa fa-chevron-right"></i></a>
        <?php } else { ?>
            <a href="#" class="btn btn-default btn-sm designer-menu-btn" id="show-udraw-display-options-ui-btn"><i class="fa fa-chevron-left"></i><span>&nbsp;&nbsp;&nbsp;Back to Options</span></a>
        <?php } ?>        
        <?php if ($product_type == "variable") { ?> 
            <a href="#" class="btn btn-success btn-sm designer-menu-btn" data-udraw="cart_btn"><span><?php _e('Next Step', 'udraw') ?></span>&nbsp;<i class="fa fa-chevron-right"></i></a>
        <?php } ?>
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
            <a href="#" id="simple-add-to-cart-btn" class="btn btn-success btn-sm designer-menu-btn" data-udraw="cart_btn" style="margin-top: -1px;"><i class="fa fa-shopping-cart"></i><i class="fa fa-spinner fa-pulse" style="display: none;"></i><span>&nbsp;<?php echo $product->single_add_to_cart_text(); ?></span></a>
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
    <div id="zoom-container" style="width:220px" data-udraw="zoomContainer">
        <span id="scale-canvas-slider-label" data-i18n="[html]text.zoom" data-udraw="zoomDisplay"></span>
        <div id="scale-canvas-slider" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.zoom-bar" data-udraw="zoomLevel"></div>
    </div>
    <div id="version-number-container" data-udraw="versionContainer">
        <button id="full-screen" type="button" class="btn btn-success btn-sm"><i id="full-screen-icon" class="fa fa-expand"></i>&nbsp;<span data-i18n="[html]button_label.full-screen"></span></button>
        <span class="small" id="racad-designer-version" data-udraw="designerVersion"></span>
    </div>
</div>
    <div class="designer-body"style="height: 75%; width: 100%; display: flex;">
        <!-- Side Tool Bar-->
        <div class="designer-side-toolbar">
            <div id="canvas-background-btn-holder" class="btn-group btn-group-sm" data-udraw="backgroundColourContainer">
                <a href="#" class="btn button-shadow btn-sm hover-icon" id="canvas-background-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.background-colour" data-udraw="backgroundColour">
                    <i class="fa fa-pencil-square"></i>&nbsp;<span class="hover-text" data-i18n="[html]menu_label.background"></span>
                </a>
            </div>
            <div class="btn-group" data-udraw="textGroup" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.create-text">
                <button type="button" class="btn button-shadow btn-sm dropdown-toggle hover-icon" onclick="javascript: RacadDesigner.Freedraw.disableDrawMode();" data-toggle="dropdown">
                    <i class="fa fa-font"></i>&nbsp;<span class="hover-text"><span data-i18n="[html]common_label.text"></span>&nbsp;<span class="caret"></span></span>
                </button>
                <ul class="dropdown-menu left-dropdown" id="text-dropdown" role="menu">
                    <li>
                        <a href="#" id="add-text-btn" data-udraw="addText">
                            <i class="fa fa-font"></i>&nbsp;<span data-i18n="[html]common_label.text"></span>
                        </a>
                        <hr class="list-hr-divider" />
                    </li>
                    <li>
                        <!--Curved text-->
                        <a href="#" id="add-curved-text-btn" data-udraw="addCurvedText">
                            <img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>arc-text-black.png" style="margin-left: -6px; margin-top: -7px; max-width:180%;" />&nbsp;<span data-i18n="[html]menu_label.curvetext"></span>
                        </a>
                    </li>
                    <li>
                        <hr class="list-hr-divider" />
                        <!--Textbox-->
                        <a href="#" id="add-textbox-btn" data-udraw="addTextbox">
                            <i class="fa fa-i-cursor"></i>&nbsp;<span data-i18n="[html]menu_label.textbox"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Images -->
            <div class="btn-group" id="multiple-image-btn-group" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.insert-image" data-udraw="imagesGroup">
                <button type="button" class="btn button-shadow btn-sm dropdown-toggle hover-icon" onclick="javascript: RacadDesigner.Freedraw.disableDrawMode();" data-toggle="dropdown">
                    <i class="fa fa-picture-o"></i>&nbsp;<span class="hover-text"><span data-i18n="[html]common_label.image"></span>&nbsp;<span class="caret"></span></span>
                </button>
                <ul class="dropdown-menu left-dropdown" id="images-dropdown" role="menu">
                    <li id="Upload-Image-list-container">
                        <input class="jQimage-upload-btn" type="file" name="files[]" multiple data-udraw="uploadImage" />
                        <a href="#"><i class="fa fa-upload icon"></i>&nbsp; <span data-i18n="[html]common_label.upload-image"></span></a>
                        <hr class="list-hr-divider" />
                    </li>
                    <?php if (is_user_logged_in()) { ?>
                    <li id="User-Uploaded-Images-list-container">
                        <a href="#" id="local-images-nav-btn" data-udraw="userUploadedImages">
                            <i class="fa fa-briefcase icon"></i>&nbsp; <span data-i18n="[html]common_label.local-storage"></span>
                        </a>
                        <hr class="list-hr-divider" />
                    </li>
                    <?php }
                    if (!$_udraw_settings['designer_disable_global_clipart']) { ?>
                    <li id="Clipart-Collection-list-container">
                        <a href="#" id="clipart-collection-nav-btn" data-udraw="clipartCollection">
                            <i class="fa fa-picture-o icon"></i>&nbsp; <span data-i18n="[html]common_label.clipart-collection"></span>
                        </a>
                        <hr class="list-hr-divider" />
                    </li>
                    <?php }
                    if ($_udraw_settings['designer_enable_local_clipart']) { ?>
                    <li id="Private-Clipart-Collection-list-container">
                        <a href="#" id="private-clipart-collection-nav-btn" data-udraw="privateClipartCollection">
                            <i class="fa fa-picture-o icon"></i>&nbsp; <span data-i18n="[html]menu_label.private-clipart-collection"></span>
                        </a>
                        <hr class="list-hr-divider" />
                    </li>
                    <?php } ?>
                    <li id="Image-Placeholder-list-container">
                        <a href="#" id="image-placeholder-btn" data-udraw="imagePlaceHolder">
                            <i class="fa fa-picture-o icon"></i>&nbsp; <span data-i18n="[html]menu_label.image-placeholder"></span>
                        </a>
                        <hr class="list-hr-divider" />
                    </li>
                    <?php if ($_udraw_settings['designer_enable_facebook_photos']) {?>
                    <li id="Facebook-Uploads-list-container">
                        <a href="#" id="facebook-image-btn" data-udraw="facebookPhotos">
                            <i class="fa fa-picture-o icon"></i>&nbsp; <span data-i18n="[html]menu_label.facebook-uploads"></span>
                        </a>
                        <hr class="list-hr-divider" />
                    </li>
                    <?php } ?>
                    <?php if ($_udraw_settings['designer_enable_instagram_photos']) { ?>
                        <li id="Instagram-Uploads-list-container">
                            <a href="#" id="instagram-image-btn" data-udraw="instagramPhotos">
                                <i class="fa fa-instagram icon"></i>&nbsp; <span data-i18n="[html]menu_label.instagram-uploads"></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- END IMAGES-->
            <!-- QR CODE -->
            <?php if (!$_udraw_settings['designer_disable_qrqode']) { ?>
            <a href="#" class="btn button-shadow btn-sm hover-icon" id="qrcode-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.open-qr" data-udraw="qrCode">
                <img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>qr-code-icon.png" style="width:17px; height:17px;" />
                &nbsp;<span class="hover-text" data-i18n="[html]common_label.QRcode"></span>
            </a>
            <?php } ?>
            <!-- END QR CODE -->
            <!-- SHAPES -->
            <?php if (!$_udraw_settings['designer_disable_shapes']) { ?>
            <div class="btn-group btn-group-sm" id="multiple-shapes-btn-group" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.create-shape" data-udraw="shapesGroup">
                <button type="button" class="btn button-shadow btn-sm dropdown-toggle hover-icon" onclick="javascript: RacadDesigner.Freedraw.disableDrawMode();" data-toggle="dropdown">
                    <i class="fa fa-circle-o icon"></i>&nbsp;<span class="hover-text"><span data-i18n="[html]common_label.shapes"></span>&nbsp;<span class="caret"></span></span>
                </button>
                <ul class="dropdown-menu left-dropdown" role="menu">
                    <li id="Circle-list-container">
                        <a href="#" data-udraw="addCircle" id="shapes-circle-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>circle-icon.png" class="shape-icon" />&nbsp;<span data-i18n="[html]menu_label.circle-shape"></span></a>
                        <hr class="list-hr-divider" />
                    </li>
                    <li id="Rectangle-list-container">
                        <a href="#" data-udraw="addRectangle" id="shapes-sqaure-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>square-icon.png" class="shape-icon" />&nbsp;<span data-i18n="[html]menu_label.rect-shape"></span></a>
                        <hr class="list-hr-divider" />
                    </li>
                    <li id="Triangle-list-container">
                        <a href="#" data-udraw="addTriangle" id="shapes-triangle-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>triangle-icon.png" class="shape-icon" />&nbsp;<span data-i18n="[html]menu_label.triangle-shape"></span></a>
                        <hr class="list-hr-divider" />
                    </li>
                    <li id="Line-list-container">
                        <a href="#" data-udraw="addLine" id="shapes-line-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>line-icon.png" class="shape-icon" />&nbsp;<span data-i18n="[html]menu_label.line-shape"></span></a>
                        <hr class="list-hr-divider" />
                    </li>
                    <li id="Curved-line-list-container">
                        <a href="#" data-udraw="addCurvedLine" id="shapes-curved-line-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>curved-line-icon.png" class="shape-icon" />&nbsp;<span data-i18n="[html]menu_label.curved-line-shape"></span></a>
                        <hr class="list-hr-divider" />
                    </li>
                    <li id="Polygon-list-container">
                        <a href="#" id="open-polyshape-modal-btn" data-udraw="addPolygon"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>octagon-icon.png" class="shape-icon" />&nbsp;<span data-i18n="[html]menu_label.polyshape-shape"></span></a>
                        <hr class="list-hr-divider" />
                    </li>
                    <li id="Star-list-container">
                        <a href="#" data-udraw="addStar" id="shapes-star-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>star-icon.png" class="shape-icon" />&nbsp;<span data-i18n="[html]menu_label.star-shape"></span></a>
                    </li>
                </ul>
            </div>
            <?php } ?>
            <!-- END SHAPES-->
            <!--FREE DRAW-->
            <a href="#" class="btn button-shadow btn-sm hover-icon" id="freedraw-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.enable-freedraw" data-udraw="freedrawButton">
                <i class="fa fa-pencil"></i>&nbsp;<span class="hover-text" data-i18n="[html]menu_label.freedraw"></span>
            </a>
            <!--END FREE DRAW-->
            <div class="btn-group" data-udraw="effectsGroup" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.extra-effects">
                <button type="button" class="btn button-shadow btn-sm dropdown-toggle hover-icon" onclick="javascript: RacadDesigner.Freedraw.disableDrawMode();" data-toggle="dropdown">
                    <i class="fa fa-star-half-o"></i>&nbsp;<span class="hover-text"><span data-i18n="[html]menu_label.extra-effects"></span>&nbsp;<span class="caret"></span></span>
                </button>
                <ul class="dropdown-menu left-dropdown" id="effects-dropdown" role="menu">
                    <?php if (!$_udraw_settings['designer_disable_text_gradient']) { ?>
                    <li>
                        <a href="#" id="add-gradient-btn" data-udraw="gradientButton">
                            <i class="fa fa-barcode"></i>&nbsp;<span data-i18n="[html]menu_label.gradient"></span>
                        </a>
                        <hr class="list-hr-divider" />
                    </li>
                    <?php } ?>
                    <li>
                        <a href="#" id="add-shadow-btn" data-udraw="shadowButton">
                            <i class="fa fa-tags"></i>&nbsp;<span data-i18n="[html]menu_label.shadow"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Side Tool Bar-->

        <!-- Designer Canvas And Container-->
        <div id="canvas-container" data-udraw="canvasContainer">
            <div id="top-ruler-container" style="padding-left: 26px;"><canvas id="racad-designer-top-ruler-canvas" data-udraw="topRuler"></canvas></div>
            <div>
                <div id="side-ruler-container" style="display:inline-block; width: 25px;"><canvas id="racad-designer-side-ruler-canvas" data-udraw="sideRuler"></canvas></div>
                <div id="racad-designer" style="display: inline-block;" data-udraw="canvasWrapper">
                    <div class="alert alert-danger fade in" role="alert" id="racad-designer-object-outside-alert" style="display:none;padding: 5px;" data-udraw="outsideAlert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" data-i18n="[html]text.objects-outside-dismiss"></span><span class="sr-only">Close</span></button>
                        <p data-i18n="[html]text.objects-outside-description"></p>
                    </div>
                    <canvas id="racad-designer-canvas" width="504" height="288" data-udraw="canvas"></canvas>
                </div>
            </div>
        </div>
        <div class="designer-side-toolbar"></div>
    </div>
        <!-- END Designer Canvas And Container-->

    <div id="toolbox-holder" data-udraw="toolboxContainer">
        <div class="modal toolbox-modal" style="top: 40px; display: block;" data-udraw="toolsModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span>Tools</span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs hide-toolbox" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="bounding-box-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body designer-panel-body">
                            <div id="designer-toolbar" data-udraw="designerToolbar">
                                <div id="object-alignment-container" class="btn-group" data-udraw="objectAlignContainer">
                                    <a href="#" id="objects-align-left" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-left" data-udraw="objectsAlignLeft"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>bg_btn_align_left.png" alt="Align Left" /></a>
                                    <a href="#" id="objects-align-center" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-center" data-udraw="objectsAlignCenter"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>bg_btn_align_center.png" alt="Align Center" /></a>
                                    <a href="#" id="objects-align-right" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-right" data-udraw="objectsAlignRight"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>bg_btn_align_right.png" alt="Align Right" /></a>
                                    <a href="#" id="objects-align-top" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-top" data-udraw="objectsAlignTop"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>bg_btn_align_top.png" alt="Align Top" /></a>
                                    <a href="#" id="objects-align-middle" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-middle" data-udraw="objectsAlignMiddle"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>bg_btn_align_middle.png" alt="Align Middle" /></a>
                                    <a href="#" id="objects-align-bottom" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-bottom" data-udraw="objectsAlignBottom"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>bg_btn_align_bottom.png" alt="Align Bottom" /></a>
                                </div>
                                <div id="undo-redo-container" class="btn-group" data-udraw="undoRedoContainer">
                                    <a href="#" class="btn btn-warning btn-sm hover-icon designer-toolbar-btn" id="canvas-undo-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.undo" data-udraw="undoButton"><i class="fa fa-undo"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm hover-icon designer-toolbar-btn" id="canvas-redo-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.redo" data-udraw="redoButton"><i class="fa fa-repeat"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm hover-icon designer-toolbar-btn" id="delete-object-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.delete" data-udraw="removeButton"><i class="fa fa-remove"></i></a>
                                </div>
                                <div class="btn-group" id="copy-paste-btn-group" data-udraw="copyPasteContainer">
                                    <a class="btn btn-default designer-toolbar-btn" id="copy-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.copy" data-udraw="copyButton"><i class="fa fa-copy"></i></a>
                                    <a class="btn btn-default designer-toolbar-btn" id="paste-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.paste" data-udraw="pasteButton"><i class="fa fa-paste"></i></a>
                                </div>
                                <div style="display: inline-block; vertical-align: middle;" data-udraw="designerColourContainer">
                                    <input type="text" id="designer-colour-picker" readonly value="#000000" data-opacity="1" class="standard-js-colour-picker text-colour-picker" style="background-color: rgb(255, 255, 255);" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.object-colour-picker" data-udraw="designerColourPicker">
                                    <input type="hidden" id="restricted-designer-colours" data-opacity="1" data-udraw="restrictedColourPicker" />
                                </div>
                                <a href="#" class="btn btn-info btn-sm" id="crop-toolbar-btn" data-udraw="cropButton"><i class="fa fa-crop"></i>&nbsp;Crop Image</a>
                                <a href="#" class="btn btn-info btn-sm hover-icon designer-toolbar-btn" id="rotate-objects-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.rotate-object" data-udraw="objectRotationButton"><i class="fa fa-repeat"></i></a>
                                <a href="#" class="btn btn-info btn-sm hover-icon designer-toolbar-btn" id="scale-objects-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.scale-object" data-udraw="objectScaleButton"><i class="fa fa-arrows-alt"></i></a>
                            </div>
                            <div data-udraw="toolboxList">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pages dialog-->
        <div class="modal toolbox-modal" style="top: 95px;" data-udraw="pagesModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]common_label.pages"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-success btn-xs" id="create-new-page-btn" style="padding-top:0px;" data-udraw="addPage"><i class="fa fa-plus-circle"></i>&nbsp;<span data-i18n="[html]button_label.add-page"></span></a>
                            <a href="#" class="btn btn-default btn-xs hide-toolbox" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="bounding-box-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body designer-panel-body">
                            <div id="pages-container" data-udraw="pagesContainer">
                                <div data-udraw="pagesList"></div>
                                <div class="panel-body designer-panel-body" id="designer-header-page-edit-box" style="display: none;" data-udraw="pagesEditContainer">
                                    <div class="row">
                                        <input type="text" class="col-sm-5" id="edit-page-label-input" style="margin-left:15px; padding-left: 5px; padding-right: 5px;" data-udraw="pageLabelInput" />
                                        <a href="#" id="update-page-label-btn" class="btn btn-xs btn-success col-sm-2" style="margin-left:10px;" data-udraw="pageLabelUpdate"><i class="fa fa-check-circle"></i>&nbsp;<span data-i18n="[html]common_label.update"></span></a>
                                        <a href="#" id="cancel-page-label-btn" class="btn btn-xs btn-danger col-sm-2" style="margin-left:60px;" data-udraw="pageLabelCancel"><i class="fa fa-times-circle"></i>&nbsp;<span data-i18n="[html]common_label.cancel"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--bounding box dialog-->
        <div class="modal toolbox-modal" id="bounding-box-modal" style="top: 95px;" data-udraw="boundingBoxModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]menu_label.bounding-box"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-boundingbox-control" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="bounding-box-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="close-boundingbox-control" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body designer-panel-body" id="bounding-box-body">
                            <div class=" row" id="boundingbox-create-btn-area" data-udraw="boundingBoxCreateContainer">
                                <a href="#" id="boundingbox-create-btn" class="btn btn-xs btn-success col-sm-3" style="margin-left:15px;" data-udraw="boundingBoxCreate"><i class="fa fa-plus-circle"></i>&nbsp;<span data-i18n="[html]common_label.create"></span></a>
                            </div>
                            <div id="boundingbox-control-div" style="display:none;" data-udraw="boundingBoxControlContainer">
                                <div class="row" id="boundingbox-remove-btn-area">
                                    <a href="#" id="boundingbox-lock-btn" class="btn btn-xs btn-info col-sm-3" style="margin-left:15px;" data-udraw="boundingBoxLock"><i class="fa fa-lock"></i>&nbsp;<span data-i18n="[html]common_label.lock"></span></a>
                                    <a href="#" id="boundingbox-unlock-btn" class="btn btn-xs btn-info col-sm-3" style="margin-left:15px;" data-udraw="boundingBoxUnlock"><i class="fa fa-unlock"></i>&nbsp;<span data-i18n="[html]common_label.unlock"></span></a>
                                    <a href="#" id="boundingbox-remove-btn" class="btn btn-xs btn-danger col-sm-3" style="margin-left:15px;" data-udraw="boundingBoxRemove"><i class="fa fa-times-circle"></i>&nbsp;<span data-i18n="[html]common_label.remove"></span></a>
                                </div>
                                <div class="row" style="margin-top: 5px;">
                                    <div id="boundingbox-visual-options">
                                        <span class="col-md-8">
                                            <span class="input-group">
                                                <span class="input-group-addon" data-i18n="[html]text_label.thickness"></span>
                                                <input class="boundingbox-spinner spinedit noselect form-control" type="text" id="boundingbox-stroke-size" value="1" data-udraw="boundingBoxSpinner" />
                                            </span>
                                        </span>
                                        <span class="col-md-4">
                                            <input type="color" id="boundingbox-colour-picker" value="#000000" data-opacity="1" style="height:15px;" data-udraw="boundingBoxColourPicker" />
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Image filters modal-->
        <div class="modal toolbox-modal" id="image-filters-modal" style="top:130px;" data-udraw="imageFilterModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]header_label.image-filter-header"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-advanced-object-properties" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="image-properties-filter-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="close-advanced-object-properties" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body designer-panel-body" id="image-properties-box">
                            <div id="designer-advanced-image-properties" style="display:block; font-size: 12px;">
                                <div class="row" style="padding: 5px; margin-left: auto; margin-right: auto;">
                                    <a href="#" id="designer-advanced-image-filter-grayscale" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="grayscale"><span data-i18n="[html]button_label.grayscale"></span></a>
                                    <a href="#" id="designer-advanced-image-filter-sepia-purple" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="sepiaPurple"><span data-i18n="[html]button_label.purple-sepia"></span></a>
                                    <a href="#" id="designer-advanced-image-filter-sepia" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="sepiaYellow"><span data-i18n="[html]button_label.yellow-sepia"></span></a>
                                    <a href="#" id="designer-advanced-image-filter-sharpen" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="sharpen"><span data-i18n="[html]button_label.sharpen"></span></a>
                                    <a href="#" id="designer-advanced-image-filter-emboss" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="emboss"><span data-i18n="[html]button_label.emboss"></span></a>
                                    <a href="#" id="designer-advanced-image-filter-blur" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="blur"><span data-i18n="[html]button_label.blur"></span></a>
                                    <a href="#" id="designer-advanced-image-filter-invert" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="invert"><span data-i18n="[html]button_label.invert"></span></a>
                                    <!--<a href="#" id="designer-advanced-image-filter-remove-white" class="btn btn-default designer-toolbar-btn" style="display: inline-block; width: 30%; margin-bottom: 5px; padding-left: 5px; padding-right: 5px;">Remove White</a>-->
                                    <a href="#" id="designer-advanced-image-clip-image" class="btn btn-default designer-toolbar-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="clipImage"><span data-i18n="[html]button_label.clip-image"></span></a>
                                </div>
                                <div id="image-tint-container">
                                    <a href="#" id="designer-advanced-image-filter-tint" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="tint"><span data-i18n="[html]button_label.tint"></span></a>
                                    <label style="width: 30%; margin-bottom: 5px;"><span data-i18n="[html]text_label.tint-colour"></span><input type="hidden" id="image-tint-color-picker" data-opacity="1" data-udraw="tintColourPicker" /></label>
                                </div>
                                <div id="image-brightness-container">
                                    <a href="#" id="designer-advanced-image-filter-brightness" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="brightness"><span data-i18n="[html]button_label.brightness"></span></a>
                                    <label style="width: 30%;"><span data-i18n="[html]text_label.brightness-level"></span></label>
                                    <div class="slider-class" id="image-brightness-slider" style="width: 30%" data-udraw="imageBrightnessLevel"></div>
                                </div>
                                <div id="image-noise-container">
                                    <a href="#" id="designer-advanced-image-filter-noise" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="noise"><span data-i18n="[html]button_label.noise"></span></a>
                                    <label style="width: 30%;"><span data-i18n="[html]text_label.noise-level"></span></label>
                                    <div class="slider-class" id="image-noise-slider" style="width: 30%" data-udraw="imageNoiseLevel"></div>
                                </div>
                                <div id="image-pixel-container">
                                    <a href="#" id="designer-advanced-image-filter-pixelate" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="pixelate"><span data-i18n="[html]button_label.pixelate"></span></a>
                                    <label style="width: 30%;"><span data-i18n="[html]text_label.pixel-size"></span></label>
                                    <div class="slider-class" id="image-pixel-slider" style="width: 30%" data-udraw="imagePixelateLevel"></div>
                                </div>
                                <div id="image-gradient-transparency-container" style="display: none">
                                    <a href="#" id="designer-advanced-image-filter-gradient-transparency" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px; white-space: normal;" data-udraw="gradientTransparency"><span data-i18n="[html]button_label.gradient-transparency"></span></a>
                                    <label style="width: 30%;"><span data-i18n="[html]text_label.transparency-level"></span></label>
                                    <div class="slider-class" id="image-gradient-transparency-slider" style="width: 30%" data-udraw="imageGradientTransparencyLevel"></div>
                                </div>
                                <div id="image-opacity-container">
                                    <a id="designer-advanced-image-filter-opacity" class="btn btn-default designer-toolbar-btn" style="display: inline-block; width: 30%; margin-bottom: 5px; white-space: normal; opacity: 0; cursor: default;" data-udraw="opacity"></a>
                                    <label style="width: 30%;"><span data-i18n="[html]text.opacity-level"></span></label>
                                    <div class="slider-class" id="image-opacity-slider" style="width: 30%" data-udraw="opacityLevel"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Clip image modal-->
        <div class="modal toolbox-modal" id="clip-images-modal" style="top:130px; height: 101px;" data-udraw="imageClippingModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]header_label.clip-image-container"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-clip-image-container" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="hide-clip-image-container-span" data-i18n="[html]common_label.hide"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div id="clip-image-container" style="padding: 5px;">
                            <div data-i18n="[html]text.clip-usage"></div>
                            <span data-i18n="[html]text.select-clip-image-shape" style="font-size: 12px; width: 30%"></span>
                            <select id="clip-image-shapes-selection" class="image-clipping-box" style="width: 30%;" data-udraw="imageClippingSelection">
                                <option value="Circle" data-i18n="[html]menu_label.circle-shape" selected="selected"></option>
                                <option value="Rectangle" data-i18n="[html]menu_label.rect-shape"></option>
                                <option value="Triangle" data-i18n="[html]menu_label.triangle-shape"></option>
                            </select>
                            <div>
                                <a href="#" class="btn btn-default btn-sm" id="clip-image-apply-mask" style="margin-left: 15px;" data-udraw="applyImageClippingMask">&nbsp;<span data-i18n="[html]button_label.clip-image"></span></a>
                                <a href="#" class="btn btn-default btn-sm" id="clip-image-remove-mask" style="margin-left: 15px;" data-udraw="removeImageClippingMask"><i class="fa fa-times-circle"></i>&nbsp;<span data-i18n="[html]button_label.clip-image-remove"></span></a>
                            </div>
                            <div id="clip-image-shape-mask-control" style="margin-top: 15px;">
                                <div data-i18n="[html]text.clip-image-offset"></div>
                                <a href="#" class="btn btn-default btn-sm clip-image-offset-btn" id="move-clip-image-up" style="margin-left: 30px;" data-udraw="imageClippingOffsetUp"><i class="fa fa-chevron-up"></i></a>
                                <div>
                                    <a href="#" class="btn btn-default btn-sm clip-image-offset-btn" id="move-clip-image-left" data-udraw="imageClippingOffsetLeft"><i class="fa fa-chevron-left"></i></a>
                                    <a href="#" class="btn btn-default btn-sm clip-image-offset-btn" id="move-clip-image-right" style="margin-left: 30px;" data-udraw="imageClippingOffsetRight"><i class="fa fa-chevron-right"></i></a>
                                </div>
                                <a href="#" class="btn btn-default btn-sm clip-image-offset-btn" id="move-clip-image-down" style="margin-left: 30px;" data-udraw="imageClippingOffsetDown"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Linked-templates dialog-->
        <div class="modal toolbox-modal" id="linked-templates-modal" style="top:165px;" data-udraw="linkedTemplatesModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]header_label.linked-templates-header"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-linked-templates-selection-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="linked-templates-selection-box-span" data-i18n="[html]common_label.hide"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body designer-panel-body scroll-content" id="linked-templates-selection-box-panel" style="max-height:195px;" data-udraw="linkedTemplatesContainer">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--SVG image dialog-->
        <div class="modal toolbox-modal" id="svg-image-modal" style="top: 200px;" data-udraw="imageColouringModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]header_label.svg-header"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-designer-header-svg-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="svg-box-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="close-designer-header-svg-box" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body designer-panel-body" id="svg-panel" style="height: 87px; overflow-y: auto;" data-udraw="imageColourContainer">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Advanced colouring dialog-->
        <div class="modal toolbox-modal" id="advanced-colouring-modal" style="top: 200px;" data-udraw="objectColouringModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]header_label.advanced-colouring-header"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-designer-header-advanced-colouring-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="advanced-colouring-box-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="close-designer-header-advanced-colouring-box" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <?php if (!$_udraw_settings['designer_disable_image_fill']) { ?>
                    <div class="modal-body toolbox-body">
                        <a href="#" class="btn btn-default" id="trigger-object-pattern-upload-btn" style="margin: 5px;" data-udraw="triggerObjectColouringUpload">
                            <i class="fa fa-upload icon"></i>&nbsp; <span data-i18n="[html]button_label.upload-pattern"></span>
                        </a>
                        <input id="object-pattern-upload-btn" type="file" name="files[]" multiple style="width:142px; height:34px;" data-udraw="objectColouringUpload" />
                        <div class="panel-body designer-panel-body" id="advanced-colouring-panel">
                            <span data-i18n="[html]header_label.advanced-colouring-fill-header"></span>
                            <div id="advanced-colouring-fill-box" style="margin: 5px;" data-udraw="objectColouringFillContainer">

                            </div>
                            <span data-i18n="[html]header_label.advanced-colouring-stroke-header"></span>
                            <div id="advanced-colouring-stroke-box" style="margin: 5px;" data-udraw="objectColouringStrokeContainer">

                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!--Multilayer image dialog-->
        <div class="modal toolbox-modal" id="multilayer-image-modal" style="top:235px;" data-udraw="multilayerImageModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]header_label.multi-layer-header"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-designer-header-multi-layer-preview-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="multi-layer-preview-box-span" data-i18n="[html]common_label.hide"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body designer-panel-body" style="height: 120px; overflow-y: auto;">
                            <ul id="multi-layer-selection-panel" style="padding-left: 0px;" data-udraw="multilayerImageContainer"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Freedraw modal-->
        <div class="modal toolbox-modal" id="freedraw-modal" style="top:270px;" data-udraw="freedrawModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]header_label.free-draw-head"></span>
                        <div class="modal-header-btn-container" style="float:right;">
                            <a href="#" class="btn btn-default btn-xs" id="hide-freedrawing-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="freedrawing-box-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="close-freedrawing-box" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body" style="padding-top: 5px; font-size: 12px; font-weight:normal;" id="freedraw-tools">
                            <div style="padding: 5px;">
                                <label id="brush-type-label" style="width: 30%"><span data-i18n="[html]text_label.brush-type"></span></label>
                                <select id="brush-type-select-option" data-udraw="brushSelection">
                                    <option value="Pencil" selected="selected" data-i18n="[html]select_text.pencil"></option>
                                    <option value="Circle">Circle</option>
                                </select>
                            </div>
                            <div style="padding: 5px;">
                                <label style="width: 30%"><span data-i18n="[html]text_label.brush-colour"></span></label>
                                <input type="hidden" id="brush-colour-picker" value="#000000" data-opacity="1" data-udraw="brushColourPicker" />
                            </div>
                            <div style="padding: 5px;">
                                <label style="width: 30%"><span data-i18n="[html]text_label.brush-size"></span></label>
                                <input type="number" value="1" min="1" max="25" id="brush-width" style="width: 60px;" data-udraw="brushSize" />
                            </div>
                            <div id="freedraw-shadow-container" data-udraw="freedrawShadowContainer">
                                <div style="padding: 5px;">
                                    <label style="width:30%"><span data-i18n="[html]text_label.brush-shadow-size"></span></label>
                                    <input type="number" value="0" min="0" max="50" id="brush-shadow-width" style="width: 60px;" data-udraw="brushShadowSize" />
                                </div>
                                <div style="padding: 5px;">
                                    <label style="width: 30%"><span data-i18n="[html]text_label.brush-shadow-depth"></span></label>
                                    <input type="number" value="1" min="1" max="25" id="brush-shadow-depth" style="width: 60px;" data-udraw="brushShadowDepth" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer toolbox-footer">
                        <a href="#" class="btn btn-success" tabindex="3" id="freedraw-enable-btn" style="display: none;" data-udraw="enableDrawMode"><span data-i18n="[html]dialog.start-freedraw"></span></a>
                        <a href="#" class="btn btn-danger" data-dismiss="modal" id="freedraw-cancel-btn" data-udraw="disableDrawMode"><span data-i18n="[html]button_label.exit-freedraw"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!--Polyshape dialog-->
        <div class="modal toolbox-modal" id="polyshape-modal" style="top:305px;" data-udraw="polygonModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]button_label.create-polyshape"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-polyshape-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="polyshape-box-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="close-polyshape-box" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div id="create-polyshape-div" style="padding: 5px;">
                            <div>
                                <label style="width: 30%; font-weight: normal; font-size: 14px;"><span data-i18n="[html]text.polygon-sides"></span></label>
                                <input id="polygon-sides-input" type="number" min="3" value="3" data-udraw="polygonSideSelector" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer toolbox-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal" id="polyshape-cancel-btn" data-udraw="polygonCancel"><span data-i18n="[html]common_label.cancel"></span></a>
                        <a href="#" class="btn btn-success" tabindex="3" id="create-polyshape-btn" data-udraw="polygonCreate"><span data-i18n="[html]common_label.create"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!--Edit text dialog-->
        <div class="modal toolbox-modal" id="edit-text-modal" style="top:340px;" data-udraw="textModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]header_label.edit-text-header"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-edit-text-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="edit-text-box-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="close-edit-text-box" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body designer-panel-body" id="edit-text-box-body" style="padding:5px;">
                            <textarea id="current-text-textarea" class="form-control" style="margin-top:5px; margin-bottom: 5px; height:75px; resize: none;" data-udraw="textArea"></textarea>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div id="font-family-holder" class="btn-group" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.font-style" data-udraw="fontFamilyContainer">
                                                <select id="font-family-selection" class="font-family-selection" name="font-family-selection" data-udraw="fontFamilySelector">
                                                    <option value="Arial" style="font-family:'Arial';">Arial</option>
                                                    <option value="Calibri" style="font-family:'Calibri';">Calibri</option>
                                                    <option value="Times New Roman" style="font-family:'Times New Roman'">Times New Roman</option>
                                                    <option value="Comic Sans MS" style="font-family:'Comic Sans MS';">Comic Sans MS</option>
                                                    <option value="French Script MT" style="font-family:'French Script MT';">French Script MT</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="font-size-holder" class="btn-group" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.font-size" data-udraw="fontSizeContainer">
                                                <select class="dropdownList font-size-select-option" id="font-size-select-option" data-udraw="fontSizeSelector"></select>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="font-height-holder" class="btn-group" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.font-height" data-udraw="fontHeightContainer">
                                                <span><i class="fa fa-text-height"></i></span>
                                                <select class="dropdownList" id="font-line-height-select-option" data-udraw="fontHeightSelector"></select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="font-style-btn-group" class="btn-group toolbar-btn-group" data-toggle="buttons-checkbox" data-udraw="fontStyleContainer">
                                                <a class="btn btn-default designer-toolbar-btn" id="font-style-bold-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.bold" data-udraw="boldButton"><i class="fa fa-bold"></i></a>
                                                <a class="btn btn-default designer-toolbar-btn" id="font-style-italic-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.italic" data-udraw="italicButton"><i class="fa fa-italic"></i></a>
                                                <a href="#" class="btn btn-default designer-toolbar-btn" id="font-style-underline-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.underline" data-udraw="underlineButton"><i class="fa fa-underline"></i></a>
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-default dropdown-toggle designer-toolbar-btn" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li id="font-style-overline-btn"><a href="#" style="text-decoration:overline" data-udraw="overlineButton"><span data-i18n="[html]menu_label.font-overline"></span></a></li>
                                                        <li id="font-style-linethrough-btn"><a href="#" style="text-decoration:line-through" data-udraw="strikeThroughButton"><span data-i18n="[html]menu_label.font-linethrough"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="font-align-btn-group" class="btn-group toolbar-btn-group" data-udraw="fontAlignContainer">
                                                <a class="btn btn-default designer-toolbar-btn" id="font-align-left" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.text-left" data-udraw="textAlignLeft"><i class="fa fa-align-left"></i></a>
                                                <a class="btn btn-default designer-toolbar-btn" id="font-align-center" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.text-center" data-udraw="textAlignCenter"><i class="fa fa-align-center"></i></a>
                                                <a class="btn btn-default designer-toolbar-btn" id="font-align-right" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.text-right" data-udraw="textAlignRight"><i class="fa fa-align-right"></i></a>
                                                <a class="btn btn-default designer-toolbar-btn" id="font-align-justify" data-udraw="textAlignJustify"><i class="fa fa-align-justify"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr data-udraw="spacing_row">
                                        <td><span id="advanced-text-spacing-span" data-i18n="[html]text.letter-spacing"></span></td>
                                        <td><input type="number" data-udraw="letterSpaceInput"/></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--<a href="#" id="clone-text-btn" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.clone-text" style="display: inline-block;" data-udraw="editTextAdvancedText"><span id="clone-text-btn-span" data-i18n="[html]button_label.clone-text"></span></a>-->
                            <div id="edit-curved-text-panel" style="display:none;" data-udraw="curvedTextContainer">
                                <hr style="margin-bottom: 3px;margin-top: 14px;">
                                <div id="curved-text-spacing-container" style="padding: 5px;">
                                    <div style="width: 20%; display:inline-block;" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.curved-text-spacing"><span data-i18n="[html]text_label.curved-text-spacing"></span></div>
                                    <div class="slider-class" id="curved-text-module-spacing-slider" style="width: 60%;" data-udraw="curvedTextSpacing"></div>
                                </div>
                                <div id="curved-text-curveRadius-container" style="padding: 5px;">
                                    <div style="width: 20%; display:inline-block;" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.curved-text-radius"><span data-i18n="[html]text_label.curved-text-radius"></span></div>
                                    <div class="slider-class" id="curved-text-module-curveRadius-slider" style="width: 60%;" data-udraw="curvedTextRadius"></div>
                                </div>
                                <a href="#" id="flip-curve-direction" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.flip-curve" style="display: inline-block;" data-udraw="reverseCurve"><span data-i18n="[html]button_label.flip-curve"></span></a>
                            </div>
                            <div id="advanced-text-effects-container" style="padding: 5px;" data-udraw="advancedTextContainer">
                                <hr style="margin-bottom: 3px;margin-top: 14px;">
                                <div id="advanced-text-spacing-container">
                                    <div id="advanced-text-spacing-span-container" style="width: 30%; display: inline-block;">
                                        <span id="advanced-text-spacing-span" data-i18n="[html]text.letter-spacing"></span>
                                    </div>
                                    <div id="advanced-text-spacing-btn-container" style="width: 60%; display: inline-block;">
                                        <a href="#" id="decrease-letter-spacing" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.decrease-letter-spacing" style="display: inline-block;" data-udraw="letterSpaceDecrease"><span>-</span></a>
                                        <a href="#" id="increase-letter-spacing" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.increase-letter-spacing" style="display: inline-block;" data-udraw="letterSpaceIncrease"><span>+</span></a>
                                        <a href="#" id="reset-letter-spacing" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.reset-letter-spacing" style="display: inline-block;" data-udraw="letterSpaceReset"><span data-i18n="[html]common_label.reset"></span></a>
                                    </div>
                                </div>
                                <hr style="margin-bottom: 5px;margin-top: 15px;">
                                <div id="advanced-text-effect-label-container">
                                    <span id="advanced-text-effect-span" data-i18n="[html]text.advanced-text-special-effect"></span>
                                    <a href="#" id="no-effect-text-btn" class="btn btn-default designer-toolbar-btn advanced-text-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.no-effect-text" style="display: inline-block; float: right;" data-udraw="textEffectsReset"><span id="no-effect-text-btn-span" data-i18n="[html]common_label.reset"></span></a>
                                </div>
                                <hr style="margin-bottom: 10px; margin-top: 20px;">
                                <div>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td style="width:40%"><span data-i18n="[html]text_label.effect"></span></td>
                                                <td style="width:40%"><span data-i18n="[html]text.height"></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select id="select-advanced-text-effect" data-udraw="textEffectsSelection">
                                                        <option value="inflated" data-i18n="[html]select_text.inflate"></option>
                                                        <option value="deflated" data-i18n="[html]select_text.deflate"></option>
                                                        <option value="bridgeCurveUp" data-i18n="[html]select_text.bridgeCurveUp"></option>
                                                        <option value="bridgeCurveDown" data-i18n="[html]select_text.bridgeCurveDown"></option>
                                                        <option value="chevronUp" data-i18n="[html]select_text.chevronUp"></option>
                                                        <option value="chevronDown" data-i18n="[html]select_text.chevronDown"></option>
                                                        <option value="fadeLeft" data-i18n="[html]select_text.fadeLeft"></option>
                                                        <option value="fadeRight" data-i18n="[html]select_text.fadeRight"></option>
                                                        <option value="fadeUp" data-i18n="[html]select_text.fadeUp"></option>
                                                        <option value="fadeDown" data-i18n="[html]select_text.fadeDown"></option>
                                                        <option value="triangleUp" data-i18n="[html]select_text.triangleUp"></option>
                                                        <option value="triangleDown" data-i18n="[html]select_text.triangleDown"></option>
                                                        <option value="wave" data-i18n="[html]select_text.wave"></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" id="advanced-text-level-number-picker" min="0" max="10" step="1" value="0" data-udraw="textEffectsLevel" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--shadows modal-->
        <div class="modal toolbox-modal" id="shadows-modal" style="top:375px;" data-udraw="shadowModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]header_label.shadow-box-header"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-shadow-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="shadow-box-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="close-shadow-box" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body designer-panel-body" id="shadow-box-body">
                            <div id="shadow-configurations">
                                <div style="padding: 5px;">
                                    <label style="width:30%; font-size: 12px;"><span data-i18n="[html]text_label.shadows-x-offset"></span></label>
                                    <div class="slider-class" id="shadow-x-offset-slider" style="width: 60%;" data-udraw="shadowOffsetX"></div>
                                </div>
                                <div style="padding: 5px;">
                                    <label style="width: 30%; font-size: 12px;"><span data-i18n="[html]text_label.shadows-y-offset"></span></label>
                                    <div class="slider-class" id="shadow-y-offset-slider" style="width: 60%;" data-udraw="shadowOffsetY"></div>
                                </div>
                                <div style="padding: 5px;">
                                    <label style="width: 30%; font-size: 12px;"><span data-i18n="[html]text_label.shadows-blur"></span></label>
                                    <div class="slider-class" id="shadow-blur-slider" style="width: 60%;" data-udraw="shadowBlur"></div>
                                </div>
                            </div>
                            <div style="padding: 5px;">
                                <a href="#" class="btn btn-default btn-xs" id="remove-shadow-btn" data-udraw="shadowRemove"><span data-i18n="[html]button_label.remove-shadow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Gradient Modal-->
        <div class="modal toolbox-modal" id="gradient-modal" style="top:410px;" data-udraw="gradientModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]menu_label.gradient"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-gradient-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="text-gradient-box-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="close-gradient-box" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body designer-panel-body" id="text-gradient-box-body">
                            <div id="text-gradient" data-udraw="gradientContainer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Layers dialog-->
        <div class="modal toolbox-modal" id="layers-modal" style="top:125px;" data-udraw="layersModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]common_label.layers"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="refresg-designer-layers-box" style="padding-top:0px;" data-udraw="layersRefresh"><i class="fa fa-refresh"></i><span data-i18n="[html]common_label.refresh"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="hide-designer-layers-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="layers-box-span" data-i18n="[html]common_label.hide"></span></a>
                            <a href="#" class="btn btn-default btn-xs" id="close-designer-layers-box" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div id="object-rotation-slider-container" class="object-rotation-slider-container" data-udraw="objectRotationContainer">
                            <span data-i18n="[html]text_label.object-angle"></span>
                            <div id="object-rotation-slider-label" style="width: 30px; display: inline-block;" data-udraw="objectRotationLabel"></div>
                            <div id="object-rotation-slider" class="slider-class" style="width: 200px; display: inline-block; margin-left: 5px;" data-udraw="objectRotationSelector"></div>
                            <a href="#" id="close-rotation-slider-btn" class="btn btn-warning btn-sm" style="float: right; margin-top: -4px; padding:2px;" data-udraw="objectRotationClose"><i class="fa fa-times"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                        <div id="object-scaling-slider-container" class="object-rotation-slider-container" data-udraw="objectScaleContainer">
                            <span data-i18n="[html]text_label.object-scale"></span>
                            <div id="object-scaling-slider-label" style="width: 30px; display: inline-block;" data-udraw="objectScaleLabel"></div>
                            <div id="object-scaling-slider" class="slider-class" style="width: 200px; display: inline-block; margin-left: 5px;" data-udraw="objectScaleSelector"></div>
                            <a href="#" id="close-scaling-slider-btn" class="btn btn-warning btn-sm" style="float: right; margin-top: -4px; padding:2px;" data-udraw="objectScaleClose"><i class="fa fa-times"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                        <div id="rectangle-corner-rounder" data-udraw="rectangleCornerContainer">
                            <span data-i18n="[html]text_label.rectangle-corner-radius"></span><input type="number" id="rectangle-corner-radius-spinner" min="0" max="50" step="1" data-udraw="rectangleCornerSelector" />
                            <a href="#" id="close-rectangle-corner-rounder-btn" class="btn btn-warning btn-sm" style="float: right; margin-top: 0px; padding:2px;" data-udraw="rectangleCornerClose"><i class="fa fa-times"></i><span data-i18n="[html]common_label.close"></span></a>
                        </div>
                        <div class="scroll-content panel-body designer-panel-body" id="layers-box-body" style="padding: 5px; height:inherit; min-height:10px; max-height:250px;">
                            <ul class="layer-box" id="layersContainer" data-udraw="layersContainer"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--LayerLabels Modal-->
        <div class="modal toolbox-modal" style="top:70px;" data-udraw="layerLabelsModal">
            <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                <div class="modal-content">
                    <div class="modal-header toolbox-header">
                        <span data-i18n="[html]header_label.layers-label-header"></span>
                        <div class="modal-header-btn-container">
                            <a href="#" class="btn btn-default btn-xs" id="hide-gradient-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="text-gradient-box-span" data-i18n="[html]common_label.hide"></span></a>
                        </div>
                    </div>
                    <div class="modal-body toolbox-body">
                        <div class="panel-body designer-panel-body" data-udraw="layerLabelsContent"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <div id="designer-footer" data-udraw="designerFooter"></div>
    <!--End-->

        <!-- Public Template Browser Dialog -->
        <div class="modal" id="browse-templates-modal" data-udraw="templatesModal">
            <div class="modal-dialog" style="width:1000px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2><span data-i18n="[html]header_label.templates-header"></span></h2>
                    </div>
                    <div class="modal-body" style="min-height: 520px; max-height: 520px; overflow: auto;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2" id="templates-category-list" style="margin-left: 0px; width:250px; display: inline-block;" data-udraw="templatesCategoryList">
                                </div>
                                <div id="templates-category-content" class="col-md-8" style="display: inline-block;">
                                    <h4 id="templates-category-title" data-udraw="templatesCategoryTitle"><span data-i18n="[html]header_label.items"></span></h4>
                                    <div id="templates-container-list" data-udraw="templatesContainer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.close"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Private Template Browser Dialog -->
        <div class="modal" id="browse-private-templates-modal" data-udraw="privateTemplatesModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2><span data-i18n="[html]header_label.templates-header"></span></h2>
                    </div>
                    <div class="modal-body" style="min-height:520px; max-height: 520px; overflow:auto;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2" id="private-templates-category-list" style="margin-left: 0px; width:250px; display: inline-block;" data-udraw="privateTemplatesCategoryList">
                                    <h4 id="private-templates-category-list-container"><span data-i18n="[html]common_label.category"></span></h4>
                                </div>
                                <div id="private-templates-category-content" class="col-md-10" style="display:inline-block;">
                                    <h4 id="private-templates-container-title"><span data-i18n="[html]header_label.items"></span></h4>
                                    <div id="private-templates-container-list" data-udraw="privateTemplatesContainer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.close"></span></a>
                    </div>
                </div>
            </div>
        </div>
    <?php if (uDraw::is_udraw_apparel_installed()) { ?>
        <!--Apparel Grpahics Modal -->
        <div class="modal" data-udraw="apparelGraphicsModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large;"><span data-i18n="[html]button_label.apparelGraphics"></span></strong>
                        <a href="#" class="btn btn-default btn-sm" data-udraw="uDrawClipartButton"><span data-i18n="[html]button_label.udraw-clipart"></span></a>
                        <a href="#" class="btn btn-default btn-sm" data-udraw="openClipartButton"><span data-i18n="[html]button_label.open-clipart"></span></a>
                        <a href="#" class="btn btn-default btn-sm" data-udraw="apparelGraphicsCollection"><span data-i18n="[html]button_label.apparelGraphics"></span></a>
                        <a href="#" data-dismiss="modal">x</a>
                    </div>
                    <div class="modal-body" style="max-height: 575px; overflow:auto;">
                        <div data-udraw="apparelGraphicsCategoryList" style="padding: 5px;"></div>
                        <div data-udraw="apparelGraphicsList" style="padding: 5px;"></div>
                    </div>
                    <div class="modal-footer">
                        <ol class="breadcrumb" data-udraw="apparelGraphicsCategoryPath"></ol>
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.cancel-btn"></span></a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

        <!-- Progress Bar Dialog -->
        <div class="modal" id="progress-bar-modal" data-udraw="progressModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<button class="close" data-dismiss="modal">×</button>-->
                        <strong style="font-size:larger;"><span data-i18n="[html]common_label.progress"></span></strong>
                    </div>
                    <div class="modal-body">
                        <div class="progress progress-striped active">
                            <div class="progress-bar" role="progressbar" aria-valuenow="105" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Local Images Dialog -->
        <div class="modal" id="local-images-modal" data-udraw="userUploadedModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large;"><span data-i18n="[html]header_label.image-header"></span></strong>
                        <form id="trigger-image-upload" method="get" action="" data-udraw="imageUploadForm">
                            <div id="trigger-image-upload-btn" class="btn btn-default" style="padding-top: 5px; width: 150px; height: 35px;">
                                <i class="fa fa-upload icon"></i>&nbsp; <span data-i18n="[html]common_label.upload-image"></span>
                                <input class="jQimage-upload-btn" type="file" name="files[]" accept="image/*" style="opacity: 0; margin-top: -20px;" data-udraw="uploadImage" />
                            </div>
                        </form>
                        <div style="padding-top:10px;">
                            <ol class="breadcrumb" id="local-images-folder-list" data-udraw="localFoldersList"></ol>
                        </div>
                    </div>
                    <div class="modal-body" style="max-height: 575px; overflow:auto;">
                        <div id="local-images-list" data-udraw="localImageList">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.close"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clipart Collection Dialog -->
        <div class="modal" id="clipart-collection-modal" data-udraw="clipartModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large; padding-right: 15px;"><span data-i18n="[html]header_label.image-header"></span></strong>
                        <a href="#" id="racad-clipart-collection" class="btn btn-default btn-sm" data-udraw="uDrawClipartButton"><span data-i18n="[html]button_label.udraw-clipart"></span></a>
                        <a href="#" id="openclipart-clipart-collection" class="btn btn-default btn-sm" data-udraw="openClipartButton"><span data-i18n="[html]button_label.open-clipart"></span></a>
                        <?php if (uDraw::is_udraw_apparel_installed()) { ?>
                            <a href="#" class="btn btn-default btn-sm" data-udraw="apparelGraphicsCollection"><span data-i18n="[html]button_label.apparelGraphics"></span></a>
                        <?php } ?>
                        <a href="#" data-dismiss="modal">x</a>
                        <div id="search-openclipart-container" style="float: right; display: none;" data-udraw="searchOpenClipartContainer">
                            <input type="text" id="search-openclipart-input" data-i18n="[placeholder]text.search-by-word" data-udraw="searchOpenClipartInput" />
                            <a href="#" id="search-openclipart-input-btn" class="btn btn-default btn-sm" data-udraw="searchOpenClipartButton"><span data-i18n="[html]button_label.search"></span></a>
                        </div>
                    </div>
                    <div class="modal-body" style="max-height: 550px; overflow:auto;">
                        <div data-udraw="uDrawClipartFolderContainer">

                        </div>
                        <div id="clipart-collection-list" data-udraw="uDrawClipartList">

                        </div>
                        <div id="openclipart-collection-div" style="display: none" data-udraw="openClipartContainer">
                            <div id="openclipart-collection-list" data-udraw="openClipartList">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div data-udraw="openClipartPageContainer" style="float: left; display: inline-block;">
                            <a href="#" id="previous-openclipart-page" class="btn btn-default btn-sm" data-udraw="openClipartPrevious"><span data-i18n="[html]common_label.previous"></span></a>
                            <a href="#" id="next-openclipart-page" class="btn btn-default btn-sm" data-udraw="openClipartNext"><span data-i18n="[html]common_label.next"></span></a>
                            <span data-i18n="[html]text_label.clipart-page"></span>
                            <select id="select-openclipart-page" data-udraw="openClipartPageSelect"></select>
                            <a href="#" id="go-to-selected-openclipart-page" class="btn btn-default btn-sm" data-udraw="openClipartGoButton"><span data-i18n="[html]common_label.go"></span></a>
                        </div>
                        <ol class="breadcrumb" id="clipart-collection-folder-list" data-udraw="clipartFolderList"></ol>
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.close"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!--Private  Clipart Collection Dialog -->
        <div class="modal" id="private-clipart-collection-modal" data-udraw="privateClipartModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large;"><span data-i18n="[html]header_label.image-header"></span></strong>
                    </div>
                    <div class="modal-body" style="max-height: 575px; overflow:auto;">
                        <div data-udraw="privateClipartFolderContainer">

                        </div>
                        <div id="private-clipart-collection-list" data-udraw="privateClipartList">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <ol class="breadcrumb" id="private-clipart-collection-folder-list" data-udraw="privateClipartFolderList"></ol>
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.close"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- QR Code Dialog -->
        <div class="modal" id="qrcode-modal" data-udraw="qrModal">
            <div class="modal-dialog modal-md" style="width: 600px;">
                <div class="modal-content">
                    <div class="modal-body" style="max-height: 575px; overflow:auto;">
                        <span class="col-md-8">
                            <input type="text" class="form-control" tabindex="1" id="qrcode-value-txtbox" value="http://somedomain" data-udraw="qrInput" />
                        </span>
                        <span class="col-md-2">
                            <input type="hidden" id="qrcode-colour-picker" value="#000000" data-udraw="qrColourPicker" />
                        </span>
                        <span class="col-md-2">
                            <a href="#" class="btn btn-success btn-sm" id="qrcode-refresh-btn" data-udraw="qrRefreshButton"><i class="fa fa-refresh"></i>&nbsp;<span data-i18n="[html]common_label.refresh"></span></a>
                        </span>
                        <br />
                        <div id="qrcode-preview" style="padding-top:25px;" data-udraw="qrPreviewContainer">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.cancel"></span></a>
                        <a href="#" class="btn btn-success" tabindex="3" id="qrcode-add-btn" data-udraw="qrAddButton"><span data-i18n="[html]common_label.add"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wizard Dialog -->
        <div class="modal" id="wizard-modal" data-udraw="wizardModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div style="float:right">
                            <a href="#" data-dismiss="modal"><i class="fa fa-times-circle"></i></a>
                        </div>
                        <br style="clear:both;" />
                    </div>
                    <div class="modal-body" style="max-height: 430px; overflow:auto;">
                        <div id="wizard-modal-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <h2><span data-i18n="[html]wizard.title"></span></h2>
                                    <hr />
                                    <ul class="list-inline" style="list-style:none;">
                                        <li>
                                            <div class="thumbnail" style="width: 100px;">
                                                <a href="#" onclick="RacadDesigner.Wizard.ShowProductOptions('bc');" style="font-size: 0.9em;">
                                                    <span data-i18n="[html]wizard.business-card"></span>
                                                    <img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>wizard/BC.png" style="height: 90px; max-height: 90px;" />
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumbnail" style="width: 100px;">
                                                <a href="#" onclick="RacadDesigner.Wizard.ShowProductOptions('brochure');" style="font-size: 1.1em;">
                                                    <span data-i18n="[html]wizard.brochure"></span>
                                                    <img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>wizard/Brochures.png" style="height: 90px; max-height: 90px;" />
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumbnail" style="width: 100px;">
                                                <a href="#" onclick="RacadDesigner.Wizard.ShowProductOptions('envelope');" style="font-size: 1.1em;">
                                                    <span data-i18n="[html]wizard.envelopes"></span>
                                                    <img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>wizard/Envelopes.png" style="height: 90px; max-height: 90px;" />
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumbnail" style="width: 100px;">
                                                <a href="#" onclick="RacadDesigner.Wizard.ShowProductOptions('flyers');" style="font-size: 1.1em;">
                                                    <span data-i18n="[html]wizard.flyers"></span>
                                                    <img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>wizard/Flyers.png" style="height: 90px; max-height: 90px;" />
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumbnail" style="width: 100px;">
                                                <a href="#" onclick="RacadDesigner.Wizard.ShowProductOptions('gc');" style="font-size: 0.9em;">
                                                    <span data-i18n="[html]wizard.greetings-card"></span>
                                                    <img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>wizard/GreetingsCards.png" style="height: 90px; max-height: 90px;" />
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumbnail" style="width: 100px;">
                                                <a href="#" onclick="RacadDesigner.Wizard.ShowProductOptions('lh');" style="font-size: 1.1em;">
                                                    <span data-i18n="[html]wizard.letter-head"></span>
                                                    <img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>wizard/Letterheads.png" style="height: 90px; max-height: 90px;" />
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumbnail" style="width: 100px;">
                                                <a href="#" onclick="RacadDesigner.Wizard.ShowProductOptions('postcard');" style="font-size: 1.1em;">
                                                    <span data-i18n="[html]wizard.postcard"></span>
                                                    <img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>wizard/Postcard.png" style="height: 90px; max-height: 90px;" />
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumbnail" style="width: 100px;">
                                                <a href="#" onclick="RacadDesigner.Wizard.ShowProductOptions('custom');" style="font-size: 1.1em;">
                                                    <span data-i18n="[html]wizard.custom"></span>
                                                    <img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>wizard/Upload.png" style="height: 90px; max-height: 90px;" />
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-5">
                                    <h2><span data-i18n="[html]wizard.product-size-header"></span></h2>
                                    <hr />
                                    <div id="wizard-options-area">
                                        <div id="wizard-bc-options" data-udraw="wizardBCoptions">
                                            <input type="radio" name="product-size" value="3.5,2,bc,2.5" checked="checked" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.2x3"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.horizontal"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="2,3.5,bc,1.85" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.2x3"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.vertical"></span></strong>
                                        </div>
                                        <div id="wizard-brochure-options" style="display:none;" data-udraw="wizardBrochureOptions">
                                            <input type="radio" name="product-size" value="11,8.5,brochure,0.8" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.11x8-5"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.letter"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="14,8.5,brochure,0.6" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.14x8-5"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.legal"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="17,11,brochure,0.5" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.17x11"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.tabloid"></span></strong>
                                        </div>
                                        <div id="wizard-envelope-options" style="display:none;" data-udraw="wizardEnvelopeOptions">
                                            <input type="radio" name="product-size" value="6,3.5,envelope,1.45" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.6x3-5"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.number6"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="7.5,3.875,envelope,1.15" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.7-5x3-875"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.monarch"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="8.875,3.875,envelope,1" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.8-875x3-875"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.number9"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="9.5,4.125,envelope,0.9" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.9-5x4-125"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.number10"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="10.375,4.5,envelope,0.85" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.10-375x4-5"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.number11"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="11,4.5,envelope,0.8" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.11x4-5"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.number12"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="11.5,5,envelope,0.75" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.11-5x5"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.number14"></span></strong>
                                        </div>
                                        <div id="wizard-flyers-options" style="display:none;" data-udraw="wizardFlyersOptions">
                                            <input type="radio" name="product-size" value="8.5,5.5,flyers,1.05" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.8-5x5-5"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="8.5,11,flyers,0.8" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.8-5x11"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="5.5,4,flyers,1.6" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.5-5x4"></span></strong>
                                            <br />
                                        </div>
                                        <div id="wizard-gc-options" style="display:none;" data-udraw="wizardGCoptions">
                                            <input type="radio" name="product-size" value="5,3.5,gc,1.75" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.5x3-5"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="6,4,gc,1.45" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.6x4"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="5.5,4.25,gc,1.6" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.5-5x4-25"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="6,4.25,gc,1.45" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.6x4-25"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="7,5,gc,1.25" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.7x5"></span></strong>
                                            <br />
                                        </div>
                                        <div id="wizard-lh-options" style="display:none;" data-udraw="wizardLHoptions">
                                            <input type="radio" name="product-size" value="8.5,11,lh,0.8" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.8-5x11"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.standard"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="8.5,14,lh,0.65" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.8-5x14"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="11,17,lh,0.5" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.11x17"></span></strong>
                                            <br />
                                        </div>
                                        <div id="wizard-postcard-options" style="display:none;" data-udraw="wizardPostcardOptions">
                                            <input type="radio" name="product-size" value="6,4,postcard,1.45" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.6x4"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="6,4.25,postcard,1.45" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.6x4-25"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="7,5,postcard,1.25" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.7x5"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="8.5,5.5,postcard,1.05" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.8-5x5-5"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="9,6,postcard,1" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.9x6"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="11,6,postcard,0.8" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.11x6"></span></strong>
                                            <br />
                                        </div>
                                        <div id="wizard-custom-options" style="display:none;" data-udraw="wizardCustomOptions">
                                            <label class="col-md-2 control-label" style="margin-top:5px;"><span data-i18n="[html]wizard.custom-width"></span></label>
                                            <span class="col-md-10">
                                                <span class="input-group">
                                                    <input type="text" class="form-control" tabindex="1" id="wizard-custom-width" value="3.5"  data-udraw="wizardWidth" />
                                                    <span class="input-group-addon"><span data-i18n="[html]text_label.settings-inch"></span></span>
                                                </span>
                                            </span>

                                            <label class="col-md-2 control-label" style="margin-top:5px;"><span data-i18n="[html]wizard.custom-height"></span></label>
                                            <span class="col-md-10" style="margin-top: 2px;">
                                                <span class="input-group">
                                                    <input type="text" class="form-control" tabindex="1" id="wizard-custom-height" value="2"  data-udraw="wizardHeight" />
                                                    <span class="input-group-addon"><span data-i18n="[html]text_label.settings-inch"></span></span>
                                                </span>
                                            </span>
                                            <br />
                                        </div>
                                    </div>
                                    <hr />
                                    <div id="wizard-bleed-options" style="margin-top:30px;">
                                        <label class="col-md-2 control-label" style="margin-top:5px;"><span data-i18n="[html]wizard.custom-bleed-header"></span></label>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" tabindex="1" id="wizard-bleed-area" value="0"  data-udraw="wizardBleed" />
                                                <span class="input-group-addon"><span data-i18n="[html]text_label.settings-inch"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <span data-i18n="[html]text.measurement-unit"></span>
                                        <select data-udraw="selectMeasurementUnit">
                                            <option value="mm">mm</option>
                                            <option value="cm">cm</option>
                                            <option value="inch">inch</option>
                                        </select>
                                    </div>
                                    <div id="wizard-create-btn-area" style="margin-top:15px; float:right;">
                                        <div class="col-md-12">
                                            <a href="#" class="btn btn-success" id="wizard-create-btn" data-udraw="wizardCreate"><span data-i18n="[html]wizard.create-btn"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Document Properties Dialog -->
        <div class="modal" id="document-properties-modal" data-udraw="settingsModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large;"><span data-i18n="[html]menu_label.settings"></span></strong>
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.cancel"></span></a>
                        <a href="#" class="btn btn-success" tabindex="3" id="update-document-properties-btn"><span data-i18n="[html]common_label.update"></span></a>
                    </div>
                    <div class="modal-body">
                        <div id="document-properties-div">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label"><span data-i18n="[html]text_label.settings-width"></span></label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <input class="form-control" tabindex="1" id="document-width-input" data-udraw="documentWidth" />
                                            <span class="input-group-addon"><span data-i18n="[html]text_label.settings-inch"></span></span>
                                        </div>
                                    </div>

                                    <label class="col-sm-1 control-label"><span data-i18n="[html]text_label.settings-height"></span></label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <input class="form-control" tabindex="1" id="document-height-input" data-udraw="documentHeight" />
                                            <span class="input-group-addon"><span data-i18n="[html]text_label.settings-inch"></span></span>
                                        </div>
                                    </div>

                                    <label class="col-sm-1 control-label"><span data-i18n="[html]text_label.settings-bleed"></span></label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <input class="form-control" tabindex="1" id="document-bleed-area" value="0" data-udraw="documentBleed" />
                                            <span class="input-group-addon"><span data-i18n="[html]text_label.settings-inch"></span></span>
                                        </div>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11 document-settings-container" style="padding-top:15px;">
                                        <span data-i18n="[html]text.measurement-unit"></span>
                                        <select data-udraw="selectMeasurementUnit">
                                            <option value="mm">mm</option>
                                            <option value="cm">cm</option>
                                            <option value="inch">inch</option>
                                        </select>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11 document-settings-container" style="display: none;">
                                        <span data-i18n="[html]text.canvas-pdf-ratio"></span>
                                        <br />
                                        <span>1 <span data-i18n="[html]text_label.settings-inch"></span> <span data-i18n="[html]text.canvas"></span> = </span>
                                        <select data-udraw="selectPDFratio-disabled">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="10">10</option>
                                            <option value="12">12</option>
                                        </select>
                                        <span data-i18n="[html]text_label.settings-inch"></span> <span>PDF</span>
                                        <br />
                                        <div class="pdf-dimensions-container" style="font-size: 12px;">
                                            <span data-i18n="[html]text.settings-pdf-dimensions" style="font-weight: bold;"></span><br />
                                            <table style="width: 25%; margin-left: 15px;">
                                                <tbody>
                                                    <tr>
                                                        <td><span data-i18n="[html]text_label.settings-width"></span></td>
                                                        <td><span data-udraw="pdfDimensionsWidth"></span></td>
                                                        <td><span data-i18n="[html]text_label.settings-inch"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span data-i18n="[html]text_label.settings-height"></span></td>
                                                        <td><span data-udraw="pdfDimensionsHeight"></span></td>
                                                        <td><span data-i18n="[html]text_label.settings-inch"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span data-i18n="[html]text_label.settings-bleed"></span></td>
                                                        <td><span data-udraw="pdfDimensionsBleed"></span></td>
                                                        <td><span data-i18n="[html]text_label.settings-inch"></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="show-grid-checkbox" data-udraw="docuementGridCheckbox" /><span data-i18n="[html]text.settings-display-grid"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="show-crop-marks" checked="checked" data-udraw="documentCropCheckbox" /><span data-i18n="[html]text.settings-display-crop"></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <div style="display: inline-block;">
                                <a href="#" class="btn btn-default" data-udraw="toggleRestrictContainer"><span data-i18n="[html]button_label.restrict-settings-btn"></span></a>
                                <a href="#" class="btn btn-default" data-udraw="toggleDisableContainer"><span data-i18n="[html]button_label.disable-settings-btn"></span></a>
                            </div>
                            <div style="max-height: 500px; overflow-y: auto; overflow-x: hidden">
                                <div id="restrict-designer-controls-div" data-udraw="restrictionsContainer" style="display: none;">
                                    <div id="restriction-header" style="padding-left: 15px; padding-top: 15px;"><strong><span data-i18n="[html]text.document-restrictions"></span></strong>&nbsp;<span style="font-size: 12px;" data-i18n="[html]text.selected-restrictions"></span></div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label style="width: 40%;">
                                            <input type="checkbox" id="restrict-font-family" data-udraw="restrict-font-family" /><span data-i18n="[html]text.restrict-font-family"></span>
                                        </label>
                                        <div id="restrict-font-family-selection-container" style="display: none;" data-udraw="restrict-font-family-container">
                                            <div id="restrict-font-family-list-container" class="restriction-list-container" data-udraw="restrict-font-family-list">

                                            </div>
                                            <select id="restrict-font-family-selection" class="select2-container-multi font-family-selection restrict-font-family-selection" style="width: 150px;" data-udraw="restrict-font-family-selector">
                                                <option value="Arial" style="font-family:'Arial';">Arial</option>
                                                <option value="Calibri" style="font-family:'Calibri';">Calibri</option>
                                                <option value="Times New Roman" style="font-family:'Times New Roman'">Times New Roman</option>
                                                <option value="Comic Sans MS" style="font-family:'Comic Sans MS';">Comic Sans MS</option>
                                                <option value="French Script MT" style="font-family:'French Script MT';">French Script MT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label style="width: 40%;">
                                            <input type="checkbox" id="restrict-font-size" data-udraw="restrict-font-size" /><span data-i18n="[html]text.restrict-font-size"></span>
                                        </label>
                                        <div id="restrict-font-size-selection-container" style="display: none;" data-udraw="restrict-font-size-container">
                                            <div id="restrict-font-size-list-container" class="restriction-list-container" data-udraw="restrict-font-size-list">

                                            </div>
                                            <select id="restrict-font-size-selection" class="dropdownList font-size-select-option" data-udraw="restrict-font-size-selector"></select>
                                        </div>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label style="width: 40%;">
                                            <input type="checkbox" id="restrict-designer-colours" data-udraw="restrict-designer-colours" /><span data-i18n="[html]text.restrict-designer-colours"></span>
                                        </label>
                                        <div id="restrict-designer-colour-selection-container" style="display: none;" data-udraw="restrict-designer-colour-container">
                                            <div id="restrict-designer-colours-list-container" class="restriction-list-container" data-udraw="restrict-desginer-colour-list">
                                                <div></div>
                                            </div>
                                            <input type="color" id="restrict-designer-colour-picker" value="#000000" data-udraw="restrict-designer-colour-picker" />
                                        </div>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label style="width: 40%;">
                                            <input type="checkbox" id="restrict-background-colours" data-udraw="restrict-background-colours" /><span data-i18n="[html]text.restrict-background-colours"></span>
                                        </label>
                                        <div id="restrict-background-colour-selection-container" style="display: none;" data-udraw="restrict-background-colour-container">
                                            <div id="restrict-background-colours-list-container" class="restriction-list-container" data-udraw="restrict-background-colour-list">
                                                <div></div>
                                            </div>
                                            <input type="color" id="restrict-background-colour-picker" value="#000000" data-udraw="restrict-background-colour-picker" />
                                        </div>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11" id="restrict-images-main-container">
                                        <label style="width: 40%;">
                                            <input type="checkbox" id="restrict-images" data-udraw="restrict-images" /><span data-i18n="[html]text.disable-images"></span>&nbsp;*
                                        </label>
                                        <div id="restrict-images-selection-container" style="display: none;" data-udraw="restrict-images-container">
                                            <div id="restrict-images-list-container" class="restriction-list-container" data-udraw="restrict-images-list">

                                            </div>
                                            <select id="restrict-images-selection" style="width: 150px;" data-udraw="restrict-images-selector">
                                                <option value="Upload Image" data-i18n="[html]common_label.upload-image"></option>
                                                <option value="User Uploaded Images" data-i18n="[html]common_label.local-storage"></option>
                                                <option value="Clipart Collection" data-i18n="[html]common_label.clipart-collection"></option>
                                                <option value="Private Clipart Collection" data-i18n="[html]menu_label.private-clipart-collection"></option>
                                                <option value="Image Placeholder" data-i18n="[html]menu_label.image-placeholder"></option>
                                                <option value="Facebook Uploads" data-i18n="[html]menu_label.facebook-uploads"></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11" id="restrict-shapes-main-container">
                                        <label style="width: 40%;">
                                            <input type="checkbox" id="restrict-shapes" data-udraw="restrict-shapes" /><span data-i18n="[html]common_label.shapes"></span>&nbsp;*
                                        </label>
                                        <div id="restrict-shapes-selection-container" style="display: none;" data-udraw="restrict-shapes-container">
                                            <div id="restrict-shapes-list-container" class="restriction-list-container" data-udraw="restrict-shapes-list">

                                            </div>
                                            <select id="restrict-shapes-selection" style="width: 150px;" data-udraw="restrict-shapes-selector">
                                                <option value="Circle" data-i18n="[html]menu_label.circle-shape"></option>
                                                <option value="Rectangle" data-i18n="[html]menu_label.rect-shape"></option>
                                                <option value="Triangle" data-i18n="[html]menu_label.triangle-shape"></option>
                                                <option value="Line" data-i18n="[html]menu_label.line-shape"></option>
                                                <option value="Curved-line" data-i18n="[html]menu_label.curved-line-shape"></option>
                                                <option value="Polygon" data-i18n="[html]menu_label.polyshape-shape"></option>
                                                <option value="Star" data-i18n="[html]menu_label.star-shape"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div id="disable-designer-functions-div" data-udraw="disableFunctionsContainer" style="display: none;">
                                    <div id="disable-functions-header" style="padding-left: 15px; padding-top: 15px;"><strong><span data-i18n="[html]text.document-disable-functions"></span></strong></div>
                                    <div id="document-disable-images-container" class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="document-disable-images" /><span data-i18n="[html]text.disable-images"></span>&nbsp;*
                                        </label>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="document-disable-qrcode" /><span data-i18n="[html]common_label.QRcode"></span>
                                        </label>
                                    </div>
                                    <div id="document-disable-shapes-container" class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="document-disable-shapes" /><span data-i18n="[html]common_label.shapes"></span>&nbsp;*
                                        </label>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="document-disable-freedraw" /><span data-i18n="[html]menu_label.freedraw"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="document-disable-gradient" /><span data-i18n="[html]menu_label.gradient"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="document-disable-shadow" /><span data-i18n="[html]menu_label.shadow"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="document-disable-curvedtext" /><span data-i18n="[html]menu_label.curvetext"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="document-disable-advancedtext" /><span data-i18n="[html]text.disable-advancedtext"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="document-disable-resizeText" /><span data-i18n="[html]text.disable-resizetext"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="document-disable-textDecoration" /><span data-i18n="[html]text.disable-textdecoration"></span>
                                        </label>
                                    </div>
                                </div>

                                <div id="security-settings-div" style="display: none;">
                                    <div class="checkbox col-sm-12" style="padding-left:45px;">
                                        <h4 style="text-decoration:underline;"><span data-i18n="[html]text.settings-security-header"></span></h4>
                                    </div>

                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="lock-pages-checkbox" /><span data-i18n="[html]text.settings-security-lock-pages"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="lock-document-properties-checkbox" /><span data-i18n="[html]text.settings-security-lock-properties"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            *<span style="font-size: 12px;" data-i18n="[html]text.if-selected-here"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <!-- Crop Dialog -->
        <div class="modal" id="crop-modal" data-udraw="cropModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div data-udraw="crop_preview" style="padding-top:35px;">
                            <img src="#" data-udraw="image_crop" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal" data-udraw="crop_cancel"><span data-i18n="[html]common_label.cancel"></span></a>
                        <a href="#" class="btn btn-success" tabindex="3" data-udraw="crop_apply"><span data-i18n="[html]common_label.apply"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Crop Button ( Overlay on Images ) -->
        <button id="image-crop-btn" class="btn btn-warning btn-xs" style="position:absolute; display:none;"><i class="fa fa-crop"></i>&nbsp;Crop</button>

        <!-- Replace Image Dialog -->
        <div class="modal" id="replace-image-modal" data-udraw="replaceImageModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="replace-image-body-div">
                            <input class="replace-image-upload-btn" id="replace-image-upload" style="height: 45px; width:175px; display: block; position: absolute; right: 0px; left:20px; top: 16px; font-family: Arial; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;" type="file" name="files[]" multiple accept="image/*" />

                            <a href="#" class="btn btn-default " style="width:175px;">
                                <i class="fa fa-upload" id="replace-image-upload-btn" style="font-size:1.5em"></i>&nbsp; <span data-i18n="[html]common_label.upload-image"></span>
                            </a>
                            <a href="#" class="replace-image-local-storage-btn btn btn-default" style="width: 175px;">
                                <i class="fa fa-briefcase" style="font-size:1.5em"></i>&nbsp; <span data-i18n="[html]button_label.replace-image-local"></span>
                            </a>
                            <a href="#" class="replcae-image-clipart-btn btn btn-default" style="width: 175px;">
                                <i class="fa fa-picture-o" style="font-size:1.5em"></i>&nbsp; <span data-i18n="[html]common_label.clipart-collection"></span>
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.cancel"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Facebook Images Dialog -->
        <div class="modal" id="facebook-images-modal" data-udraw="facebookModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large;"><span>Facebook Images</span></strong>
                        <div id="facebook-login" style="display: inline-block; float:right;">
                            <div id="fb-root"></div><div class="fb-login-button" data-scope="user_photos" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" onlogin="javascript: RacadDesigner.Facebook.OnLoginLogout()"></div>
                        </div>
                        <div style="padding-top:10px;">
                            <ol class="nav nav-pills" id="facebook-nav">
                                <li id="your-photos-nav">
                                    <a href="#" onclick="javascript: RacadDesigner.Facebook.ShowYourPhotos();">Your Photos</a>
                                </li>
                                <li id="photos-of-you-nav">
                                    <a href="#" onclick="javascript: RacadDesigner.Facebook.ShowPhotosOfYou();">Photos of You</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="modal-body" style="max-height: 500px; overflow:auto;">
                        <div id="facebook-images-container">
                            <div id="image-container">
                                <div id="images">Please log in to facebook</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="paging" style="display: inline-block; float: left;"></div>
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.close"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Instagram Images Dialog -->
        <div class="modal" id="instagram-images-modal" data-udraw="instagramModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large;"><span>Instagram Images</span></strong>
                        <div data-udraw="instagramSearchContainer" style="float: right; display: inline-block; display: none;">
                            <input type="text" data-udraw="instagramSearchInput" data-i18n="[placeholder]text.search-tags"/>
                            <a href="#" data-udraw="instagramSearchButton" class="btn btn-default" data-i18n="[html]button_label.search"></a>
                        </div>
                    </div>
                    <div class="modal-body" style="max-height: 500px; overflow:auto;">
                        <div style="display: block; float:right;">
                            <a href="#" class="btn btn-primary btn-xs" data-udraw="instagramLogin"><i class="fa fa-instagram" style="border-right: 1px solid #cccccc; margin-right: 5px; padding-right: 5px;"></i>Login / Authenticate</a>
                            <a href="#" class="btn btn-primary btn-xs" data-udraw="instagramLogout" style="display: none;"><i class="fa fa-instagram" style="border-right: 1px solid #cccccc; margin-right: 5px; padding-right: 5px;"></i>Logout</a>
                        </div>
                        <div data-udraw="instagramContent" style="margin: auto;"></div>
                    </div>
                    <div class="modal-footer">
                        <div id="paging" style="display: inline-block; float: left;"></div>
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.close"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Multipage PDF upload dialog -->
        <div class="modal overlay-modal" data-udraw="multipagePDFModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large;"><span data-i18n="[html]header_label.import-images"></span></strong>
                    </div>
                    <div class="modal-body" style="overflow:auto;">
                        <div data-udraw="page_list_container">
                            <div data-udraw="page_list"></div>
                        </div>
                        <div data-udraw="imported_images_container">
                            <div data-udraw="imported_images_list"></div>
                        </div>
                        <div class="progress_div">
                            <span data-i18n="[html]common_label.progress" style="font-size: 5em; color: #aaa;"></span>
                            <i class="fa fa-spinner fa-pulse fa-5x"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-success" data-udraw="multipage_import_apply"><span data-i18n="[html]common_label.apply"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Load XML modal -->
        <div class="modal overlay-modal" data-udraw="load_xml_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body" style="text-align: center;">
                        <p data-i18n="[html]text.load_saved_xml"></p>
                        <button type="button" class="button" data-udraw="load_saved_xml" data-i18n="[html]common_label.yes"></button>
                        <button type="button" class="button" data-dismiss="modal" data-i18n="[html]common_label.no" data-udraw="not_load_saved_xml"></button>
                    </div>
                </div>
            </div>
        </div>
</div>