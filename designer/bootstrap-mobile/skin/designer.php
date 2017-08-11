<?php

include_once(UDRAW_PLUGIN_DIR . '/designer/designer-header-init.php');

$uDraw = new uDraw();
$udrawSettings = new uDrawSettings();
$_udraw_settings = $udrawSettings->get_settings();
$isUpdate = (isset($_GET['cart_item_key'])) ? 'true' : 'false';
$friendly_item_name = get_the_title($post->ID);

global $woocommerce;
if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
    $product_type = $product->get_type();
    $product_id = $product->get_id();
} else {
    $product_type = $product->product_type;
    $product_id = $product->id;
}

?>
<div id="designer-wrapper">
    <div id="udraw-bootstrap" style="display: none;" data-udraw="uDrawBootstrap">
        <div id="udraw-main-designer-ui" style="height: 96%; position: relative; padding: 0px;">

                    <!--Designer Menu-->
            <div data-udraw="designerMenu">
                <div style="width: calc(60% - 20px); height: 100%; display: inline-block; vertical-align: top;">
                    <div id="zoom-container" style="width:220px; line-height:2.5;" data-udraw="zoomContainer">
                        <span id="scale-canvas-slider-label" data-i18n="[html]text.zoom" style="width: 100px" data-udraw="zoomDisplay"></span>
                        <div id="scale-canvas-slider" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.zoom-bar" data-udraw="zoomLevel"></div>
                    </div>

                </div>
                <div style="width: 39%; display: inline-block; height: 100%;">
                    <ul class="actions-list">
                        <?php if ($displayOptionsFirst || $templateCount > 1) { ?>
                        <li style="float: left;">
                            <a href="#" class="btn btn-default" id="show-udraw-display-options-ui-btn">
                                <i class="fa fa-chevron-left" style="font-size: 1.5em; vertical-align: middle; display: table-cell; color: #CCCCCC;"></i>
                                <div style="color: #999999">
                                    <span style="font-weight: bold; font-size: 18px;">Back</span>
                                    <br />
                                    <span style="font-size: 11px;">to options</span>
                                </div>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if ($allowCustomerDownloadDesign) { 
                            if (uDraw::is_udraw_okay()) { ?>
                            <a href="#" class="btn btn-primary btn-sm designer-menu-btn" onclick="javascript:RacadDesigner.settings.pdfQualityLevel = 8;RacadDesigner.ExportToLayeredPDF(function(url){ var dl = document.createElement('a'); dl.setAttribute('href', url); dl.setAttribute('download', '<?php echo $friendly_item_name ?>'); dl.click(); });">
                                <div style="padding: 1px; display: table-cell;">
                                    <span>Download</span>
                                    <br>
                                    <span>PDF</span>
                                </div>
                                <i class="fa fa-cloud-download fa-2x" style="display: table-cell; vertical-align: middle;"></i>
                            </a>
                        <?php } else { ?>
                            <a href="#" class="btn btn-default btn-sm designer-menu-btn" onclick="javascript:RacadDesigner.settings.pdfQualityLevel = 8;RacadDesigner.ExportToMultiPagePDF('<?php echo $friendly_item_name ?>',false);">
                                <div style="padding: 1px; display: table-cell;">
                                    <span>Download</span>
                                    <br>
                                    <span>PDF</span>
                                </div>
                                <i class="fa fa-cloud-download fa-2x" style="display: table-cell; vertical-align: middle;"></i>
                            </a>
                            <?php }
                        } ?>
                        <?php if ((!$displayOptionsFirst || $displayOptionsFirst == '') && ($product_type == "variable" ||$isPriceMatrix)) { ?>
                        <li style="float: right;">
                            <a href="#" class="btn btn-success btn-sm designer-menu-btn" id="udraw-next-step-1-btn">
                                <div style="padding: 10px;">
                                    <span id="udraw-next-step-1-btn-label">Next Step</span>
                                </div>
                                <i class="fa fa-chevron-right" style="font-size: 1.5em; vertical-align: middle; display:  table-cell;"></i>
                            </a>
                        </li>
                        <?php } else { ?>
                        <li style="float: left;">
                            <?php if ($displayOptionsFirst == '' || !$displayOptionsFirst) { ?>
                            <form class="cart" method="post" enctype="multipart/form-data" style="display: inline-block; margin-top: 8px; margin-left: 0!important; float: none;">
                                <input type="hidden" value="" name="udraw_product">
                                <input type="hidden" value="" name="udraw_product_data">
                                <input type="hidden" value="" name="udraw_product_svg">
                                <input type="hidden" value="" name="udraw_product_preview">
                                <input type="hidden" value="" name="udraw_product_cart_item_key">
                                <input type="hidden" value="" name="ua_ud_graphic_url" />
                                <div style="display: inline; vertical-align: middle; color:#fff; float:left; line-height:2.5;">
                                    <label for="input-text" style="font-size: 1.25em; color:#fff;">Qty:</label>
                                    <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" style="width: 60px; display: inline; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 5px; margin-right:30px; background-color: #009ed4;">
                                    <!--<br>-->
                                    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product_id ); ?>">
                                    <label for="product_total_price" style="font-size: 1.25em; color:#fff;">Price:</label>
                                    <span style="font-size:1.5em; vertical-align:middle;"><?php echo get_woocommerce_currency_symbol(); ?></span><span id="product_total_price" style="font-size:1.5em; vertical-align:middle;"><?php echo $product->get_price(); ?></span>
                                    <span style="margin-left:60%;"></span>
                                </div>

                                <a href="#" class="btn btn-success" onclick="javascript: __finalize_add_to_cart();">
                                    <div>
                                        <?php if (isset($_GET['cart_item_key'])) { ?>
                                            <span style="font-weight: bold; font-size: 18px;">Update</span>
                                            <br />
                                            <span style="font-size: 12px;">cart</span>
                                        <?php } else { ?>
                                            <span style="font-weight: bold; font-size: 18px;">Add</span>
                                            <br />
                                            <span style="font-size: 12px;">to cart</span>
                                        <?php } ?>
                                    </div>

                                    <i class="fa fa-chevron-right" style="font-size: 1.5em; vertical-align: middle; display:  table-cell;"></i>
                                </a>
                            </form>
                            <?php } else { ?>
                            <a href="#" class="btn btn-success" onclick="javascript: __finalize_add_to_cart();">
                                <div>
                                    <?php if (isset($_GET['cart_item_key'])) { ?>
                                        <span style="font-weight: bold; font-size: 18px;">Update</span>
                                        <br />
                                        <span style="font-size: 12px;">cart</span>
                                    <?php } else { ?>
                                        <span style="font-weight: bold; font-size: 18px;">Add</span>
                                        <br />
                                        <span style="font-size: 12px;">to cart</span>
                                    <?php } ?>
                                </div>

                                <i class="fa fa-chevron-right" style="font-size: 1.5em; vertical-align: middle; display:  table-cell;"></i>
                            </a>
                            <?php } ?>
                        </li>
                        <?php } ?>
                    </ul>
                </div>

                <div id="version-number-container" data-udraw="versionContainer">
                    <span class="small" id="racad-designer-version" data-udraw="designerVersion"></span>
                </div>
            </div>

            <!--Designer Menu Ends-->
            <div class="float-toolbar" style="display: none;">
                <div class="inner-div" style="padding: 1px;">
                    <div id="text-toolbox" style="display: inline-block;">
                        <div id="font-family-holder" class="btn-group" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.font-style" data-udraw="fontFamilyContainer">
                            <select id="font-family-selection" class="font-family-selection" name="font-family-selection" data-udraw="fontFamilySelector">
                                <option value="Arial" style="font-family:'Arial';">Arial</option>
                                <option value="Calibri" style="font-family:'Calibri';">Calibri</option>
                                <option value="Times New Roman" style="font-family:'Times New Roman'">Times New Roman</option>
                                <option value="Comic Sans MS" style="font-family:'Comic Sans MS';">Comic Sans MS</option>
                                <option value="French Script MT" style="font-family:'French Script MT';">French Script MT</option>
                            </select>
                        </div>
                        <div id="font-size-holder" class="btn-group" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.font-size" data-udraw="fontSizeContainer">
                            <select class="dropdownList font-size-select-option" id="font-size-select-option" data-udraw="fontSizeSelector"></select>
                        </div>
                        <div class="btn-group" data-udraw="fontStyleContainer">
                            <button type="button" class="dropdown-toggle designer-toolbar-btn" data-toggle="dropdown"><i class="fa fa-bold"></i>&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>
                            <div class="dropdown-menu" role="menu">
                                <a href="#" class="btn btn-default designer-toolbar-btn" data-udraw="boldButton"><i class="fa fa-bold"></i></a>
                                <a href="#" class="btn btn-default designer-toolbar-btn" data-udraw="italicButton"><i class="fa fa-italic"></i></a>
                                <a href="#" class="btn btn-default designer-toolbar-btn" data-udraw="underlineButton"><i class="fa fa-underline"></i></a>
                                <a href="#" class="btn btn-default designer-toolbar-btn" style="text-decoration:overline" data-udraw="overlineButton"><span data-i18n="[html]menu_label.font-overline"></span></a>
                                <a href="#" class="btn btn-default designer-toolbar-btn" style="text-decoration:line-through" data-udraw="strikeThroughButton"><span data-i18n="[html]menu_label.font-linethrough"></span></a>
                            </div>
                        </div>
                    </div>

                    <div data-udraw="designerColourContainer">
                        <input type="text" id="designer-colour-picker" value="#000000" data-opacity="1" class="standard-js-colour-picker text-colour-picker" style="background-color: rgb(255, 255, 255);" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.object-colour-picker" data-udraw="designerColourPicker">
                        <input type="hidden" id="restricted-designer-colours" data-opacity="1" data-udraw="restrictedColourPicker" style="display: none;" />
                    </div>
                    <div class="btn-group" data-udraw="objectAlignContainer">
                        <button type="button" class="dropdown-toggle designer-toolbar-btn" data-toggle="dropdown"><i class="fa fa-object-group"></i>&nbsp;&nbsp;<i class="fa fa-caret-down"></i></button>
                        <ul class="dropdown-menu" role="menu" style="min-width: 95px;">
                            <li>
                                <a href="#" data-udraw="objectsAlignLeft"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_left.png" alt="Align Left" /></a>
                                <a href="#" data-udraw="objectsAlignCenter"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_center.png" alt="Align Center" /></a>
                                <a href="#" data-udraw="objectsAlignRight"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_right.png" alt="Align Right" /></a>
                            </li>
                            <li>
                                <a href="#" data-udraw="objectsAlignTop"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_top.png" alt="Align Top" /></a>
                                <a href="#" data-udraw="objectsAlignMiddle"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_middle.png" alt="Align Middle" /></a>
                                <a href="#" data-udraw="objectsAlignBottom"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>bg_btn_align_bottom.png" alt="Align Bottom" /></a>
                            </li>
                            <li>
                                <a class="designer-toolbar-btn" style="width: 30%;" data-udraw="textAlignLeft"><i class="fa fa-align-left"></i></a>
                                <a class="designer-toolbar-btn" style="width: 30%;" data-udraw="textAlignCenter"><i class="fa fa-align-center"></i></a>
                                <a class="designer-toolbar-btn" style="width: 30%;" data-udraw="textAlignRight"><i class="fa fa-align-right"></i></a>
                                <a class="designer-toolbar-btn" style="width: 30%;" data-udraw="textAlignJustify"><i class="fa fa-align-justify"></i></a>
                            </li>
                        </ul>
                    </div>
                    <button type="button" id="copy-paste-btn"><i class="fa fa-copy"></i></button>
                    <?php if (!$_udraw_settings['designer_disable_image_replace']) { ?>
                    <button type="button" data-udraw="replaceImage"><i class="fa fa-retweet">&nbsp;</i><span data-i18n="[html]common_label.replace"></span></button>
                    <?php } ?>
                    <button type="button" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.delete" data-udraw="removeButton"><i class="fa fa-times-circle"></i></button>
                    <div>
                        <div id="object-rotation-slider-container" class="object-rotation-slider-container" style="display: inline-block">
                            <i class="fa fa-2x fa-rotate-right"></i>
                            <div id="object-rotation-slider" class="slider-class" data-udraw="objectRotationSelector"></div>
                        </div>
                        <div id="object-scaling-slider-container" class="object-rotation-slider-container" style="display: inline-block">
                            <i class="fa fa-2x fa-expand"></i>
                            <div id="object-scaling-slider" class="slider-class" data-udraw="objectScaleSelector"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="canvas-container" data-udraw="canvasContainer">

                    <div style="float: right;">
                        <a href="#" data-udraw="undoButton" class="action-button"><div><i class="fa fa-undo fa-2x"><span data-i18n="[html]button_label.undo"></span></i></div></a>
                        <a href="#" data-udraw="redoButton" class="action-button"><div><i class="fa fa-rotate-right fa-2x"><span data-i18n="[html]button_label.redo"></span></i></div></a>
                    </div>

                <div id="racad-designer" style="display: inline-block;" data-udraw="canvasWrapper">
                    <div class="alert alert-danger fade in" role="alert" id="racad-designer-object-outside-alert" style="display:none;padding: 5px;" data-udraw="outsideAlert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" data-i18n="[html]text.objects-outside-dismiss"></span><span class="sr-only">Close</span></button>
                        <p data-i18n="[html]text.objects-outside-description"></p>
                    </div>
                    <table>
                        <tbody>
                            <tr><td></td><td><canvas id="racad-designer-top-ruler-canvas" data-udraw="topRuler"></canvas></td></tr>
                            <tr>
                                <td><canvas id="racad-designer-side-ruler-canvas" data-udraw="sideRuler"></canvas></td>
                                <td><canvas id="racad-designer-canvas" width="504" height="288" data-udraw="canvas"></canvas></td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="racad-designer-loading" data-udraw="progressDialog">
                        <div class="alert alert-info">
                            <strong><span data-i18n="[html]common_label.progress"></span></strong>
                            <div class="progress progress-striped active">
                                <div class="progress-bar" role="progressbar" aria-valuenow="105" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="element-panel">
                <div>
                    <ul style="padding: 0px;" id="elements-list">
                        <li class="element-btn">
                            <a href="#" id="show-text-elements" class="text"><div><i class="fa fa-font"></i><span data-i18n="[html]common_label.text"></span></div></a>
                        </li>
                        <?php if (!$_udraw_settings['designer_disable_shapes']) { ?>
                        <li class="element-btn">
                            <a href="#" id="show-shape-elements" class="shape"><div><i class="fa fa-circle"></i><span data-i18n="[html]common_label.shapes"></span></div></a>
                        </li>
                        <?php } ?>
                        <li class="element-btn">
                            <a href="#" id="show-image-elements" class="image"><div><i class="fa fa-image"></i><span data-i18n="[html]common_label.image"></span></div></a>
                        </li>
                        <li class="element-btn">
                            <a href="#" id="show-layers-elements" class="layers"><div><i class="fa fa-list"></i><span data-i18n="[html]common_label.layers"></span></div></a>
                        </li>
                        <li class="element-btn">
                            <a href="#" id="show-pages-elements" class="pages"><div><i class="fa fa-files-o"></i><span data-i18n="[html]common_label.pages"></span></div></a>
                        </li>
                    </ul>
                </div>
                <div class="elements-container">
                    <div class="text-container" style="display: none; overflow: auto;">
                        <div>
                            <div>
                                <a href="#" data-udraw="addText"><div class="element-btn"><i class="fa fa-2x fa-font"></i><span data-i18n="[html]common_label.text"></span></div></a>
                                <a href="#" data-udraw="addCurvedText"><div class="element-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>arc-text-black.png" style="margin-left: auto; margin-right: auto; max-height: 24px;" /><span data-i18n="[html]menu_label.curvetext"></span></div></a>
                                <!--Textbox-->
                                <a href="#" data-udraw="addTextbox"><div class="element-btn"><i class="fa fa-2x fa-i-cursor"></i><span data-i18n="[html]menu_label.textbox"></span></div></a>
                            </div>
                            <hr />
                            <div>
                                <textarea class="form-control" style="margin-top:5px; margin-bottom: 5px; height:75px; resize: none;" data-udraw="textArea"></textarea>
                                <div style="display:none;" data-udraw="curvedTextContainer">
                                    <hr style="margin-bottom: 3px;margin-top: 14px;">
                                    <div id="curved-text-spacing-container" style="padding: 5px;">
                                        <div style="width: 20%; display:inline-block;" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.curved-text-spacing"><span data-i18n="[html]text_label.curved-text-spacing"></span></div>
                                        <div class="slider-class" id="curved-text-module-spacing-slider" style="width: 60%; display: inline-block;" data-udraw="curvedTextSpacing"></div>
                                    </div>
                                    <div id="curved-text-curveRadius-container" style="padding: 5px;">
                                        <div style="width: 20%; display:inline-block;" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.curved-text-radius"><span data-i18n="[html]text_label.curved-text-radius"></span></div>
                                        <div class="slider-class" id="curved-text-module-curveRadius-slider" style="width: 60%; display: inline-block;" data-udraw="curvedTextRadius"></div>
                                    </div>
                                    <a href="#" id="flip-curve-direction" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.flip-curve" style="display: inline-block; margin-top: 5px;" data-udraw="reverseCurve"><span data-i18n="[html]button_label.flip-curve"></span></a>
                                </div>
                            </div>
                        </div>
                        <div data-udraw="layerLabelsModal" class="mobile_modal">
                            <span data-i18n="[html]header_label.layers-label-header"></span>
                            <div class="panel-body designer-panel-body" data-udraw="layerLabelsContent" style="text-align: left;"></div>
                        </div>
                    </div>
                    <div class="shape-container" style="display: none; overflow: auto;">
                        <div>
                            <a href="#" id="shapes-circle-add-btn" data-udraw="addCircle"><div class="element-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>circle-icon.png" class="shape-icon" /><span data-i18n="[html]menu_label.circle-shape"></span></div></a>
                            <a href="#" id="shapes-sqaure-add-btn" data-udraw="addRectangle"><div class="element-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>square-icon.png" class="shape-icon" /><span data-i18n="[html]menu_label.rect-shape"></span></div></a>
                            <a href="#" id="shapes-triangle-add-btn" data-udraw="addTriangle"><div class="element-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>triangle-icon.png" class="shape-icon" /><span data-i18n="[html]menu_label.triangle-shape"></span></div></a>
                            <a href="#" id="shapes-line-add-btn" data-udraw="addLine"><div class="element-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>line-icon.png" class="shape-icon" /><span data-i18n="[html]menu_label.line-shape"></span></div></a>
                            <a href="#" id="shapes-curved-line-add-btn" data-udraw="addCurvedLine"><div class="element-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>curved-line-icon.png" class="shape-icon" /><span data-i18n="[html]menu_label.curved-line-shape"></span></div></a>
                            <a href="#" id="open-polyshape-modal-btn" data-udraw="addPolygon"><div class="element-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>octagon-icon.png" class="shape-icon" /><span data-i18n="[html]menu_label.polyshape-shape"></span></div></a>
                            <a href="#" id="shapes-star-add-btn" data-udraw="addStar"><div class="element-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>star-icon.png" class="shape-icon" /><span data-i18n="[html]menu_label.star-shape"></span></div></a>
                        </div>
                        <hr />
                        <div>
                            <div data-udraw="polygonModal" class="mobile_modal" style="display: none;">
                                <div id="create-polyshape-div" style="padding: 5px;">
                                    <label style="width: 30%; font-weight: normal; font-size: 14px;"><span data-i18n="[html]text.polygon-sides"></span></label>
                                    <input id="polygon-sides-input" type="number" min="3" value="3" data-udraw="polygonSideSelector" />
                                    <div style="padding: 5px;">
                                        <a href="#" class="btn btn-success" tabindex="3" data-udraw="polygonCreate"><span data-i18n="[html]common_label.create"></span></a>
                                        <a href="#" class="btn btn-danger" data-udraw="polygonCancel"><span data-i18n="[html]common_label.cancel"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="image-container" style="display: none; overflow: auto;">
                        <div>
                            <ul id="images-list" style="padding: 0px;">
                                <li class="element-btn">
                                    <a href="#" onclick="javascript: jQuery('[data-udraw=\'uploadImage\']').trigger('click');"><div>&nbsp;<span data-i18n="[html]text.upload-photo"></span></div></a>
                                    <input class="jQimage-upload-btn" type="file" name="files[]" multiple data-udraw="uploadImage" style="display: none;" />
                                </li>
                                <li class="element-btn active">
                                    <a href="#" class="local"><div>&nbsp;<span data-i18n="[html]common_label.local-storage"></span></div></a>
                                </li>
                                <?php if (!$_udraw_settings['designer_disable_global_clipart']) { ?>
                                <li class="element-btn">
                                    <a href="#" class="clipart"><div>&nbsp;<span data-i18n="[html]common_label.clipart-collection"></span></div></a>
                                </li>
                                <li class="element-btn">
                                    <a href="#" class="openClipart"><div>&nbsp;<span>Open Clipart.org</span></div></a>
                                </li>
                                <?php } ?>
                                <?php if ($_udraw_settings['designer_enable_local_clipart']) { ?>
                                <li class="element-btn">
                                    <a href="#" class="private-clipart"><div>&nbsp;<span data-i18n="[html]menu_label.private-clipart-collection"></span></div></a>
                                </li>
                                <?php } ?>
                                <?php if ($_udraw_settings['designer_enable_facebook_photos']) {?>
                                <li class="element-btn">
                                    <a href="#" class="facebook"><div>&nbsp;<span data-i18n="[html]menu_label.facebook-uploads"></span></div></a>
                                </li>
                                <?php } ?>
                                <?php if ($_udraw_settings['designer_enable_instagram_photos']) { ?>
                                    <li class="element-btn">
                                        <a href="#" class="instagram"><div>&nbsp;<span data-i18n="[html]menu_label.instagram-uploads"></span></div></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="local-container inner-image-container" data-udraw="localImageList" style="display: block;"></div>
                        <div class="clipart-container inner-image-container" data-udraw="clipartContainer" style="position: relative;">
                            <div data-udraw="uDrawClipartFolderContainer">

                            </div>
                            <div id="clipart-collection-list" data-udraw="uDrawClipartList">

                            </div>
                        </div>
                        <div class="openClipart-container inner-image-container" data-udraw="openClipartContainer" style="position: relative;">
                            <div id="search-openclipart-container" data-udraw="searchOpenClipartContainer">
                                <input type="text" id="search-openclipart-input" data-i18n="[placeholder]text.search-by-word" data-udraw="searchOpenClipartInput" />
                                <a href="#" id="search-openclipart-input-btn" class="btn btn-default btn-sm" data-udraw="searchOpenClipartButton"><span data-i18n="[html]button_label.search"></span></a>
                            </div>
                            <div data-udraw="openClipartPageContainer">
                                <a href="#" id="previous-openclipart-page" class="btn btn-default btn-sm" data-udraw="openClipartPrevious"><span data-i18n="[html]common_label.previous"></span></a>
                                <a href="#" id="next-openclipart-page" class="btn btn-default btn-sm" data-udraw="openClipartNext"><span data-i18n="[html]common_label.next"></span></a>
                                <span data-i18n="[html]text_label.clipart-page"></span>
                                <select id="select-openclipart-page" data-udraw="openClipartPageSelect"></select>
                                <a href="#" id="go-to-selected-openclipart-page" class="btn btn-default btn-sm" data-udraw="openClipartGoButton"><span data-i18n="[html]common_label.go"></span></a>
                            </div>
                            <div id="openclipart-collection-list" data-udraw="openClipartList">
                            </div>
                        </div>
                        <div class="private-clipart-container inner-image-container"></div>
                        <div class="facebook-container inner-image-container">
                            <div style="padding:10px; width: 65%; display: inline-block;">
                                <ol class="nav nav-pills" id="facebook-nav">
                                    <li id="your-photos-nav">
                                        <a href="#" onclick="javascript: RacadDesigner.Facebook.ShowYourPhotos();">Your Photos</a>
                                    </li>
                                    <li id="photos-of-you-nav">
                                        <a href="#" onclick="javascript: RacadDesigner.Facebook.ShowPhotosOfYou();">Photos of You</a>
                                    </li>
                                </ol>
                            </div>
                            <div style="width: 25%; display: inline-block; float: right;">
                                <div id="facebook-login">
                                    <div id="fb-root"></div><div class="fb-login-button" data-scope="user_photos" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" onlogin="javascript: RacadDesigner.Facebook.OnLoginLogout()"></div>
                                </div>
                            </div>
                            <div id="facebook-images-container">
                                <div id="image-container">
                                    <div id="images">Please log in to facebook</div>
                                </div>
                            </div>
                        </div>
                        <div class="instagram-container inner-image-container">
                            <div style="display: block;">
                                <a href="#" class="btn btn-primary btn-xs" data-udraw="instagramLogin"><i class="fa fa-instagram" style="border-right: 1px solid #cccccc; margin-right: 5px; padding-right: 5px;"></i>Login / Authenticate</a>
                                <a href="#" class="btn btn-primary btn-xs" data-udraw="instagramLogout" style="display: none;"><i class="fa fa-instagram" style="border-right: 1px solid #cccccc; margin-right: 5px; padding-right: 5px;"></i>Logout</a>
                            </div>
                            <div data-udraw="instagramSearchContainer" style="display: none;">
                                <input type="text" data-udraw="instagramSearchInput" data-i18n="[placeholder]text.search-tags"/>
                                <a href="#" data-udraw="instagramSearchButton" class="btn btn-default" data-i18n="[html]button_label.search"></a>
                            </div>
                            <div data-udraw="instagramContent" style="margin: auto;"></div>
                        </div>
                    </div>
                    <div class="layers-container" style="display: none; overflow: auto;">
                        <div data-udraw="multilayerImageModal" class="mobile_modal" style="display: none;">
                            <div class="panel-body designer-panel-body" style="height: 120px; overflow-y: auto;">
                                <ul id="multi-layer-selection-panel" style="padding-left: 0px;" data-udraw="multilayerImageContainer"></ul>
                            </div>
                        </div>
                        <div data-udraw="imageFilterModal" class="mobile_modal layers-inner-container" style="display: none;">
                            <h4 data-i18n="[html]header_label.image-filter-header" style="display: inline-block;"></h4>
                            <a href="#" class="btn btn-default btn-xs" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                            <div id="designer-advanced-image-properties" style="display:block; font-size: 12px;">
                                <a href="#" id="designer-advanced-image-filter-grayscale" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="grayscale"><span data-i18n="[html]button_label.grayscale"></span></a>
                                <a href="#" id="designer-advanced-image-filter-sepia-purple" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="sepiaPurple"><span data-i18n="[html]button_label.purple-sepia"></span></a>
                                <a href="#" id="designer-advanced-image-filter-sepia" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="sepiaYellow"><span data-i18n="[html]button_label.yellow-sepia"></span></a>
                                <a href="#" id="designer-advanced-image-filter-sharpen" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="sharpen"><span data-i18n="[html]button_label.sharpen"></span></a>
                                <a href="#" id="designer-advanced-image-filter-emboss" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="emboss"><span data-i18n="[html]button_label.emboss"></span></a>
                                <a href="#" id="designer-advanced-image-filter-blur" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="blur"><span data-i18n="[html]button_label.blur"></span></a>
                                <a href="#" id="designer-advanced-image-filter-invert" class="btn btn-default designer-toolbar-btn image-filter-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="invert"><span data-i18n="[html]button_label.invert"></span></a>
                                <!--<a href="#" id="designer-advanced-image-filter-remove-white" class="btn btn-default designer-toolbar-btn" style="display: inline-block; width: 30%; margin-bottom: 5px; padding-left: 5px; padding-right: 5px;">Remove White</a>-->
                                <a href="#" id="designer-advanced-image-clip-image" class="btn btn-default designer-toolbar-btn" style="display: inline-block; width: 30%; margin-bottom: 5px;" data-udraw="clipImage"><span data-i18n="[html]button_label.clip-image"></span></a>

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
                        <div data-udraw="objectColouringModal" class="mobile_modal layers-inner-container" style="display: none;">
                            <a href="#" class="btn btn-default btn-xs" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                            <div>
                                <h4 data-i18n="[html]header_label.advanced-colouring-header" style="display: inline-block;"></h4>
                                <a href="#" class="btn btn-default" id="trigger-object-pattern-upload-btn" style="margin: 5px;" data-udraw="triggerObjectColouringUpload">
                                    <i class="fa fa-upload icon"></i>&nbsp; <span data-i18n="[html]button_label.upload-pattern"></span>
                                </a>
                                <input id="object-pattern-upload-btn" type="file" name="files[]" multiple style="display: none;" data-udraw="objectColouringUpload" />
                                <div class="panel-body designer-panel-body" id="advanced-colouring-panel">
                                    <span data-i18n="[html]header_label.advanced-colouring-fill-header"></span>
                                    <div id="advanced-colouring-fill-box" style="margin: 5px;" data-udraw="objectColouringFillContainer">

                                    </div>
                                    <span data-i18n="[html]header_label.advanced-colouring-stroke-header"></span>
                                    <div id="advanced-colouring-stroke-box" style="margin: 5px;" data-udraw="objectColouringStrokeContainer">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--SVG image dialog-->
                        <div data-udraw="imageColouringModal" class="mobile_modal layers-inner-container" style="display: none;">
                            <a href="#" class="btn btn-default btn-xs" id="close-designer-header-svg-box" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                            <div class="panel-body designer-panel-body" id="svg-panel" style="height: 87px; overflow-y: auto; display: inline-block;" data-udraw="imageColourContainer">
                                        </div>
                        </div>
                        <div>
                            <a href="#" class="btn btn-default btn-xs" id="refresg-designer-layers-box" style="padding-top:0px;" data-udraw="layersRefresh"><i class="fa fa-refresh"></i><span data-i18n="[html]common_label.refresh"></span></a>
                            <div class="scroll-content panel-body designer-panel-body" id="layers-box-body" style="padding: 5px; height:inherit; min-height:10px; max-height:250px;">
                                <ul class="layer-box" id="layersContainer" data-udraw="layersContainer"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="pages-container" style="display: none; overflow: auto;">
                        <div style="padding: 5px;">
                            <span data-i18n="[html]menu_label.background"></span>&nbsp;
                            <input type="hidden" data-opacity="1" data-udraw="backgroundColour" />
                        </div>
                        <a href="#" class="btn btn-success btn-xs" id="create-new-page-btn" style="padding-top:0px;" data-udraw="addPage"><i class="fa fa-plus-circle"></i>&nbsp;<span data-i18n="[html]button_label.add-page"></span></a>
                        <div id="pages-carousel" style="height: 90%!important;" data-udraw="pagesList">
                        </div>
                        <div class="panel-body designer-panel-body" id="designer-header-page-edit-box" style="display: none;" data-udraw="pagesEditContainer">
                            <div class="row">
                                <input type="text" class="col-sm-5" id="edit-page-label-input" style="margin-left:15px; padding-left: 5px; padding-right: 5px;" data-udraw="pageLabelInput" />
                                <a href="#" id="update-page-label-btn" class="btn btn-xs btn-success col-sm-2" style="margin-left:10px;" data-udraw="pageLabelUpdate"><i class="fa fa-check-circle"></i>&nbsp;<span data-i18n="[html]common_label.update"></span></a>
                                <a href="#" id="cancel-page-label-btn" class="btn btn-xs btn-danger col-sm-2" style="margin-left:60px;" data-udraw="pageLabelCancel"><i class="fa fa-times-circle"></i>&nbsp;<span data-i18n="[html]ui-controls.pages-edit-cancel-btn"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
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
                            <a href="#" class="btn btn-danger" data-dismiss="modal" id="A1"><span data-i18n="[html]common_label.cancel"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--clipart modal-->
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
                        <div class="modal-body" style="max-height: 225px; overflow:auto;">
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
            
            <!-- Local Images Dialog -->
            <div class="modal" id="local-images-modal" data-udraw="userUploadedModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <strong style="font-size:large;"><span data-i18n="[html]header_label.image-header"></span></strong>
                            <div style="padding-top:10px;">
                                <ol class="breadcrumb" id="local-images-folder-list" data-udraw="localFoldersList"></ol>
                            </div>
                        </div>
                        <div class="modal-body" style="max-height: 225px; overflow:auto;">
                            <div id="local-images-list" data-udraw="localImageList">

                            </div>
                        </div>
                        <div class="modal-footer">
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
                        <div class="modal-body" style="max-height: 225px; overflow:auto;">
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
            
            <!-- Crop Dialog -->
            <div class="modal" id="crop-modal" data-udraw="cropModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div data-udraw="crop_preview" style="padding-top:35px;">
                                <img src="#" data-udraw="image_crop"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-danger" data-dismiss="modal" data-udraw="crop_cancel"><span data-i18n="[html]common_label.cancel"></span></a>
                            <a href="#" class="btn btn-success" tabindex="3" data-udraw="crop_apply"><span data-i18n="[html]common_label.apply"></span></a>
                        </div>
                    </div>
                </div>
            </div>

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

        <div id="udraw-preview-ui" style="display: none; padding-left: 30px;">
            <div class="row" style="padding-bottom: 15px;">
                <button class="btn button" id="udraw-preview-back-to-design-btn"><strong>&nbsp;Back to Update Design</strong></button>
                <button class="btn button" id="udraw-preview-add-to-cart-btn"><strong>Approve &amp; Add to Cart&nbsp;></strong></button>
            </div>
            <div class="row" id="udraw-preview-design-placeholer">
            </div>
        </div>
    </div>
</div>

<form method="POST" action="" name="udraw_save_later_form" id="udraw_save_later">
    <input type="hidden" name="udraw_save_product_data" value="" />
    <input type="hidden" name="udraw_save_product_preview" value="" />
    <input type="hidden" name="udraw_save_post_id" value="<?php echo $post->ID ?>" />
    <input type="hidden" name="udraw_save_access_key" value="<?php echo (isset($_GET['udraw_access_key'])) ? $_GET['udraw_access_key'] : NULL; ?>" />
    <input type="hidden" name="udraw_is_saving_for_later" value="1" />
    <?php wp_nonce_field('save_udraw_customer_design'); ?>
</form>
<?php include_once(UDRAW_PLUGIN_DIR . '/designer/multi-udraw-templates.php'); ?>
<?php include_once(UDRAW_PLUGIN_DIR . '/designer/designer-template-script.php'); ?>

<style type="text/css">
    <?php echo $_udraw_settings['udraw_designer_css_hook']; ?>
</style>

<script>
    var isUpdate = (<?php echo $isUpdate; ?> === true) ? true : false ;
    var designing = false;
    jQuery(document).ready(function () {
        jQuery('div.entry-summary form.cart div.quantity input').css('width', '5em');
        <?php echo $_udraw_settings['udraw_designer_js_hook']; ?>
        jQuery('div.mobile_modal').modal({
            'backdrop': false,
            'keyboard': false,
            'show' : false
        });
    });

    __load_extra_functions = function () {
        jQuery('.float-toolbar').hide();
        RacadDesigner.resizeElementButtons();
        jQuery('[data-udraw="objectScaleSelector"], [data-udraw="objectRotationSelector"], [data-udraw="zoomLevel"]').slider("option", "range", "min");
        jQuery('[data-udraw="objectScaleSelector"]').slider('option', 'max', 2);
        jQuery(window).resize(function () {
            RacadDesigner.resizeElementButtons();
            RacadDesigner.center_designer(jQuery);
            jQuery('[data-udraw="canvasContainer"]').css('height', jQuery('[data-udraw="canvasWrapper"]').css('height') * 1.5);
            jQuery('.element-panel').css('height', jQuery('[data-udraw="canvasContainer"]').css('height'));
        }).trigger('resize');
        jQuery('ul#elements-list > li > a, ul#images-list > li > a').click(function () {
            jQuery(this).parent().siblings().removeClass('active');
            jQuery(this).parent().addClass('active');
            var classType = jQuery(this).attr('class');
            if (classType == 'image') {
                RacadDesigner.Image.loadLocalImages(RacadDesigner.settings.assetPath);
                jQuery('[data-udraw="uDrawClipartFolderContainer"]').show();
                RacadDesigner.Image.initClipartCollection();
                RacadDesigner.Image.getPrivateClipart();
            }
            if (classType == 'clipart') {
                jQuery('[data-udraw="uDrawClipartFolderContainer"]').show();
                RacadDesigner.Image.initClipartCollection();
            }
            if (classType == 'openClipart') {
                RacadDesigner.Image.__loadOpenClipartRoutine(RacadDesigner.openClipartCurrentPage, RacadDesigner.openClipartSearchTerm);
            }
            jQuery('div.' + classType + '-container').show();
            jQuery('div.' + classType + '-container').siblings().each(function () {
                if (typeof jQuery(this).attr('class') != 'undefined' && jQuery(this).attr('class').indexOf('container') > 0) {
                    jQuery(this).hide();
                }
            });
        });
        jQuery('.elements-container').children().hide();
        jQuery('[data-udraw="addPolygon"]').click(function () {
            jQuery('[data-udraw="polygonModal"]').show();
        });
        jQuery('.jQimage-upload-btn').hide();
        jQuery('ul#imagelist li.clipart').click(function(){
            jQuery('[data-udraw="uDrawClipartFolderContainer"]').show();
            RacadDesigner.Image.initClipartCollection();
        });
        if (jQuery('input[name="udraw_options_converted_pdf"]').val() == 'false') {
            jQuery('#udraw-options-page-design-btn').hide();
        } else {
            jQuery('#udraw-options-page-design-btn').show(); 
        }
        RacadDesigner.isMobile = true;
        jQuery('li.element-btn a.pages').trigger('click');
    }
    jQuery('[data-udraw="uDrawBootstrap"]').on('udraw-undo udraw-redo udraw-switched-page', function(){
        jQuery('.float-toolbar').hide();
    });
</script>