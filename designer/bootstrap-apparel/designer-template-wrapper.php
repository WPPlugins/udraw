<?php 
$udrawSettings = new uDrawSettings();
$_udraw_settings = $udrawSettings->get_settings();

$uDraw = new uDraw();
?>
<div id="racad-designer-loading" data-udraw="progressDialog">
    <div class="alert alert-info">
        <strong><span data-i18n="[html]common_label.progress"></span></strong>
        <div class="progress progress-striped active">
            <div class="progress-bar" role="progressbar" aria-valuenow="105" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>
    </div>
</div>
<div id="udraw-main-designer-ui" style="min-height: 530px; height: 100%; position: relative; text-align:initial; background:#dcdcdc;">

    <!-- Top Tool Bar-->
    <div id="apparel-tool-bar">
        <a class="btn btn-sm hover-icon designer-toolbar-btn apparel-tool-bar-btn" style="background-image: linear-gradient(#707070, #000000);" id="canvas-undo-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.undo" data-udraw="undoButton"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/undo.png" /></a>
        <a class="btn btn-sm hover-icon designer-toolbar-btn apparel-tool-bar-btn" style="background-image: linear-gradient(#707070, #000000);" id="canvas-redo-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.redo" data-udraw="redoButton"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/redo.png" /></a>
        <a class="btn btn-sm hover-icon designer-toolbar-btn apparel-tool-bar-btn" style="background-image: linear-gradient(#707070, #000000);" id="refresh-object-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.refresh"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/clear.png" /></a>
        <a class="btn btn-sm hover-icon designer-toolbar-btn apparel-tool-bar-btn" style="background-image: linear-gradient(#707070, #000000);" id="ua-ud-continue-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.save"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/save-icon.png" /></a>
        <a class="btn btn-sm hover-icon designer-toolbar-btn apparel-tool-bar-btn" style="background-image: linear-gradient(#707070, #000000);" id="zoom-in-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.zoom-in"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/zoom-in.png" /></a>
        <a class="btn btn-sm hover-icon designer-toolbar-btn apparel-tool-bar-btn" style="background-image: linear-gradient(#707070, #000000);" id="zoom-out-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.zoom-out"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/zoom-out.png" /></a>
        <a class="btn btn-sm hover-icon designer-toolbar-btn apparel-tool-bar-btn" style="background-image: linear-gradient(#707070, #000000);" id="full-screen" data-toggle="tooltip-top" data-i18n="[data-original-title]button_label.full-screen"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/full-screen.png" /></a>
        <div id="version-number-container">
            <span class="small" id="racad-designer-version" style="float: right;"></span>
        </div>
    </div>
    <div>
        <div id="accordion-resizer" class="ui-widget-content" style="display: inline-block;">
            <div id="accordion">
                <strong class="accordion-toolbox-header"><span data-i18n="[html]ui-controls.linked-apparel-products-header"></span></strong>
                <div class="accordion-toolbox">
                    <div class="accordion-content-wrapper">
                        <div id="product-category-container" style="max-height:195px;">

                        </div>
                        <hr style="margin: 0px 5px 0px 0px;" />
                        <div class="scroll-content" id="product-subcategory-container" style="max-height:110px; display: none;">

                        </div>
                        <hr style="margin: 0px 5px 0px 0px;" />
                        <div class="scroll-content" id="apparel-products-container" style="max-height:195px; display: none;">

                        </div>
                    </div>
                </div>
                <strong class="accordion-toolbox-header"><span data-i18n="[html]header_label.multi-layer-header"></span></strong>
                <div class="accordion-toolbox">
                    <div class="accordion-content-wrapper">
                        <div class="panel-body designer-panel-body" id="colour-options-selection-panel" data-udraw="apparelColourOptionsContainer">
                        </div>
                    </div>
                </div>
                <strong class="accordion-toolbox-header" id="images-accordion-header" data-udraw="imagesGroup"><span data-i18n="[html]common_label.image"></span></strong>
                <div id="images-accordion-box" class="accordion-toolbox">
                    <div class="accordion-content-wrapper">
                        <div id="accordion-image-box" class="row">
                            <div style="display: inline-block; padding: 0px 5px 0px 5px; float: right;"><a class="shape-icon" href="#" id="local-images-nav-btn" style="margin: 5px;" data-udraw="userUploadedImages"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/coffee-mug-icon.png" /></a>&nbsp; <span data-i18n="[html]common_label.local-storage" style="white-space: normal; font-size: 14px; font-weight: normal;"></span></div>
                            <div style="display: inline-block; padding: 0px 5px 0px 5px; float: left;"><a class="shape-icon" href="#" id="clipart-collection-nav-btn" style="margin: 5px;" data-udraw="clipartCollection"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/grey-star.png" /></a>&nbsp; <span data-i18n="[html]common_label.clipart-collection" style="white-space: normal; font-size: 14px; font-weight: normal;"></span></div>
                        </div>
                    </div>
                </div>
                <strong class="accordion-toolbox-header"><span data-i18n="[html]common_label.text"></span></strong>
                <div id="text-accordion-box" class="accordion-toolbox">
                    <div class="accordion-content-wrapper">
                        <div class="row" style="margin-bottom:3px; margin-left: -10px;">
                            <select id="font-family-selection" class="font-family-selection col-md-4" name="font-family-selection" data-udraw="fontFamilySelector">
                                <option value="Arial" style="font-family:'Arial';">Arial</option>
                                <option value="Calibri" style="font-family:'Calibri';">Calibri</option>
                                <option value="Times New Roman" style="font-family:'Times New Roman'">Times New Roman</option>
                                <option value="Comic Sans MS" style="font-family:'Comic Sans MS';">Comic Sans MS</option>
                                <option value="French Script MT" style="font-family:'French Script MT';">French Script MT</option>
                            </select>

                            <select class="dropdownList font-size-select-option col-md-3" id="font-size-select-option" data-udraw="fontSizeSelector"></select>

                            <span><i class="fa fa-text-height" data-toggle="tooltip-top" data-original-title="Font height"></i></span>
                            <select class="dropdownList col-md-3" id="font-line-height-select-option" data-udraw="fontHeightSelector"></select>
                        </div>

                        <div class="row" style="margin-top: 5px; margin-left: 5px;">
                            <div id="font-style-btn-group" class="btn-group toolbar-btn-group" data-toggle="buttons-checkbox" data-udraw="fontStyleContainer">
                                <a class="btn btn-default designer-toolbar-btn" id="font-style-bold-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.bold" data-udraw="boldButton"><i class="fa fa-bold"></i></a>
                                <a class="btn btn-default designer-toolbar-btn" id="font-style-italic-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.italic" data-udraw="italicButton"><i class="fa fa-italic"></i></a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default designer-toolbar-btn" id="font-style-underline-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.underline" data-udraw="underlineButton"><i class="fa fa-underline"></i></button>
                                    <button type="button" class="btn btn-default dropdown-toggle designer-toolbar-btn" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li id="font-style-overline-btn"><a href="#" style="text-decoration:overline" data-udraw="overlineButton"><span data-i18n="[html]menu_label.font-overline"></span></a></li>
                                        <li id="font-style-linethrough-btn"><a href="#" style="text-decoration:line-through" data-udraw="strikeThroughButton"><span data-i18n="[html]menu_label.font-linethrough"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="font-align-btn-group" class="btn-group toolbar-btn-group" data-udraw="fontAlignContainer">
                                <a class="btn btn-default designer-toolbar-btn" id="font-align-left" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.text-left" data-udraw="textAlignLeft"><i class="fa fa-align-left"></i></a>
                                <a class="btn btn-default designer-toolbar-btn" id="font-align-center" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.text-center" data-udraw="textAlignCenter"><i class="fa fa-align-center"></i></a>
                                <a class="btn btn-default designer-toolbar-btn" id="font-align-right" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.text-right" data-udraw="textAlignRight"><i class="fa fa-align-right"></i></a>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px; margin-left: 5px;">
                            <div style="display: inline-block; width: 35px;">
                                <a href="#" id="add-apparel-text-btn" class="btn btn-default btn-xs hover-icon" onclick='javascript: RacadDesigner.Text.AddTextFromDesigner();' data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.create-text">
                                    <i class="fa fa-font" style="transform: scale(1.5);"></i>&nbsp;
                                </a>
                            </div>
                            <div id="apparel-object-stroke-spinner-container" style="display: inline-block; width: 185px;">
                                <div class="input-group" style="top: 9px;">
                                    <span class="input-group-addon" style="padding: 2px 7px;" data-i18n="[html]text_label.stroke-width"></span>
                                    <input id="apparel-object-stroke-spinner" class="stroke-spinner spinedit noSelect form-control" value="0.0">
                                </div>
                            </div>
                            <div id="apparel-stroke-colour-picker-container" style="display: inline-block">
                                <input type="color" id="apparel-stroke-colour-picker" value="#000000" data-opacity="1" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.stroke-colour-picker" style="display: inline-block" />
                            </div>
                        </div>
                        <hr style="padding-top: 10px;" />
                        <div>
                            <div style="margin-left: 5px;">
                                <a class="btn btn-default designer-toolbar-btn" id="open-gradient-container" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.add-gradient" data-udraw="gradientButton"><img style="height: 20px;" src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>color-gradient-icon.png"></a>
                                <a class="btn btn-default designer-toolbar-btn" id="open-text-colour-container" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.add-colour"><img style="height: 20px;" src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>color-solid-icon.png"></a>
                            </div>
                            <div id="text-colour-picker-container" style="margin-left: -5px;">
                                <input type="color" id="text-colour-picker" value="#000000" data-opacity="1" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.object-colour-picker" />
                            </div>
                            <div id="text-gradient-container" style="display: none;">
                                <!--Gradient Modal-->
                                <div class="modal toolbox-modal" id="gradient-modal" style="top:410px;" data-udraw="gradientModal">
                                    <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                                        <div class="modal-content">
                                            <div class="modal-header toolbox-header">
                                                <span data-i18n="[html]menu_label.gradient"></span>
                                                <div class="modal-header-btn-container" style="float:right;">
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
                            </div>
                        </div>
                    </div>
                </div>
                <strong class="accordion-toolbox-header" id="shapes-accordion-header" data-udraw="shapesGroup"><span data-i18n="[html]common_label.shapes"></span></strong>
                <div id="shapes-accordion-box" class="accordion-toolbox">
                    <div class="accordion-content-wrapper">
                        <a href="#" data-udraw="addCircle" id="shapes-Circle-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/grey-circle.png" class="shape-icon" data-toggle="tooltip-top" data-i18n="[data-original-title]menu_label.circle-shape" /></a>
                        <a href="#" data-udraw="addRectangle" id="shapes-Rectangle-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/grey-rectangle.png" class="shape-icon" data-toggle="tooltip-top" data-i18n="[data-original-title]menu_label.rect-shape" /></a>
                        <a href="#" data-udraw="addTriangle" id="shapes-Triangle-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/grey-triangle.png" class="shape-icon" data-toggle="tooltip-top" data-i18n="[data-original-title]menu_label.triangle-shape" /></a>
                        <a href="#" data-udraw="addLine" id="shapes-Line-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/grey-line.png" class="shape-icon" data-toggle="tooltip-top" data-i18n="[data-original-title]menu_label.line-shape" /></a>
                    </div>
                </div>
                <strong class="accordion-toolbox-header"><span data-i18n="[html]nav.align"></span></strong>
                <div class="accordion-toolbox">
                    <div class="accordion-content-wrapper">
                        <div id="object-alignment-container" style="height: 50px; padding: 15px 0px 15px 0px; text-align: justify !important;" data-udraw="objectAlignContainer">
                            <a href="#" id="objects-align-left" class="align-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-left" data-udraw="objectsAlignLeft"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/align-left.png" alt="Align Left" /></a>
                            <a href="#" id="objects-align-center" class="align-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-center" data-udraw="objectsAlignCenter"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/align-horizontal-middle.png" alt="Align Center" /></a>
                            <a href="#" id="objects-align-right" class="align-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-right" data-udraw="objectsAlignRight"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/align-right.png" alt="Align Right" /></a>
                            <a href="#" id="objects-align-top" class="align-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-top" data-udraw="objectsAlignTop"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/align-top.png" alt="Align Top" /></a>
                            <a href="#" id="objects-align-middle" class="align-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-middle" data-udraw="objectsAlignMiddle"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/align-vertical-middle.png" alt="Align Middle" /></a>
                            <a href="#" id="objects-align-bottom" class="align-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.shift-bottom" data-udraw="objectsAlignBottom"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/align-bottom.png" alt="Align Bottom" /></a>
                        </div>
                    </div>
                </div>
                <strong class="accordion-toolbox-header"><span data-i18n="[html]common_label.layers"></span></strong>
                <div class="accordion-toolbox">
                    <div class="accordion-content-wrapper">
                        <div class="scroll-content panel-body designer-panel-body" id="layers-box-body" style="padding: 5px; height:auto; max-height:200px;">
                            <ul class="layer-box" id="layersContainer" data-udraw='layersContainer'></ul>
                        </div>
                    </div>
                </div>
                <strong class="accordion-toolbox-header"><span data-i18n="[html]nav.shirt-size"></span></strong>
                <div id="shirt-size-accordion-box" class="accordion-toolbox" style="text-align: left;">
                    <div class="accordion-content-wrapper">
                        <div id="shirt-size-btn-container">
                            <a href="#" id="select-small-size-btn" class="shirt-size-btn">S</a>
                            <a href="#" id="select-medium-size-btn" class="shirt-size-btn">M</a>
                            <a href="#" id="select-large-size-btn" class="shirt-size-btn">L</a>
                            <a href="#" id="select-extra-large-size-btn" class="shirt-size-btn">XL</a>
                            <a href="#" id="select-2-extra-large-size-btn" class="shirt-size-btn">XXL</a>
                            <a href="#" id="select-3-extra-large-size-btn" class="shirt-size-btn">XXXL</a>
                        </div>
                        <div id="shirt-image-div">
                            <img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>shirt-img.png" />
                        </div>
                        <div>
                            <table id="shirt-size-table">
                                <tbody>
                                    <tr>
                                        <td style="border: none;"></td>
                                        <td>S</td>
                                        <td>M</td>
                                        <td>L</td>
                                        <td>XL</td>
                                        <td>XXL</td>
                                        <td>3XL</td>
                                    </tr>
                                    <tr>
                                        <td>A (<span class="shirt-cm-in">cm</span>)</td>
                                        <td id="small-a">69.5</td>
                                        <td id="medium-a">72</td>
                                        <td id="large-a">74.5</td>
                                        <td id="xlarge-a">77</td>
                                        <td id="xxlarge-a">78.5</td>
                                        <td id="xxxlarge-a">80</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ababab;">
                                        <td>B (<span class="shirt-cm-in">cm</span>)</td>
                                        <td id="small-b">48.5</td>
                                        <td id="medium-b">53.5</td>
                                        <td id="large-b">56</td>
                                        <td id="xlarge-b">61</td>
                                        <td id="xxlarge-b">66</td>
                                        <td id="xxlarge-b">71</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <strong class="accordion-toolbox-header"><span data-i18n="[html]nav.quantity"></span></strong>
                <div id="quantity-accordion-box" class="accordion-toolbox" style="text-align: left;">
                    <div class="accordion-content-wrapper">
                        <table>
                            <tbody>
                                <tr>
                                    <td style="border-right: 1px solid #ABABAB">
                                        <div style="width: 20%; display:inline-block;">S</div>
                                        <div style="width: 70%; display:inline-block;">
                                            <a href="#" id="decrease-s-quantity" class="apparel-quantity-decrease-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('s', -1)">-</a>
                                            <input type="number" id="input-s-quantity" class="apparel-quantity-input" value="0" min="0" style="width: 50%; padding: 2px;" />
                                            <a href="#" id="increase-s-quantity" class="apparel-quantity-increase-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('s', +1)">+</a>
                                        </div>
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div style="width: 20%; display:inline-block;">XL</div>
                                        <div style="width: 70%; display:inline-block;">
                                            <a href="#" id="decrease-xl-quantity" class="apparel-quantity-decrease-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('xl', -1)">-</a>
                                            <input type="number" id="input-xl-quantity" class="apparel-quantity-input" value="0" min="0" style="width: 50%; padding: 2px;" />
                                            <a href="#" id="increase-xl-quantity" class="apparel-quantity-increase-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('xl', +1)">+</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-right: 1px solid #ABABAB">
                                        <div style="width: 20%; display:inline-block;">M</div>
                                        <div style="width: 70%; display:inline-block;">
                                            <a href="#" id="decrease-m-quantity" class="apparel-quantity-decrease-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('m', -1)">-</a>
                                            <input type="number" id="input-m-quantity" class="apparel-quantity-input" value="0" min="0" style="width: 50%; padding: 2px;" />
                                            <a href="#" id="increase-m-quantity" class="apparel-quantity-increase-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('m', +1)">+</a>
                                        </div>
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div style="width: 20%; display:inline-block;">XXL</div>
                                        <div style="width: 70%; display:inline-block;">
                                            <a href="#" id="decrease-xxl-quantity" class="apparel-quantity-decrease-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('xxl', -1)">-</a>
                                            <input type="number" id="input-xxl-quantity" class="apparel-quantity-input" value="0" min="0" style="width: 50%; padding: 2px;" />
                                            <a href="#" id="increase-xxl-quantity" class="apparel-quantity-increase-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('xxl', +1)">+</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-right: 1px solid #ABABAB">
                                        <div style="width: 20%; display:inline-block;">L</div>
                                        <div style="width: 70%; display:inline-block;">
                                            <a href="#" id="decrease-l-quantity" class="apparel-quantity-decrease-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('l', -1)">-</a>
                                            <input type="number" id="input-l-quantity" class="apparel-quantity-input" value="0" min="0" style="width: 50%; padding: 2px;" />
                                            <a href="#" id="increase-l-quantity" class="apparel-quantity-increase-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('l', +1)">+</a>
                                        </div>
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div style="width: 20%; display:inline-block;">XXXL</div>
                                        <div style="width: 70%; display:inline-block;">
                                            <a href="#" id="decrease-xxxl-quantity" class="apparel-quantity-decrease-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('xxxl', -1)">-</a>
                                            <input type="number" id="input-xxxl-quantity" class="apparel-quantity-input" value="0" min="0" style="width: 50%; padding: 2px;" />
                                            <a href="#" id="increase-xxxl-quantity" class="apparel-quantity-increase-btn" onclick="javascript: RacadDesigner.apparelChangeQuantity('xxxl', +1)">+</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div style="display: inline-block; position: absolute; max-width: 90%; max-height: 90%;">
            <div id="canvas-container" data-udraw="canvasContainer">
                <!--Ruler-->
                <table style="padding: 0 0 0 0; width:100%">
                    <tr>
                        <td style="vertical-align:top;">
                            <div class="alert alert-danger fade in" role="alert" id="racad-designer-object-outside-alert" style="display:none;padding: 5px;" data-udraw="outsideAlert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" data-i18n="[html]text.objects-outside-dismiss"></span><span class="sr-only">Close</span></button>
                                <p data-i18n="[html]text.objects-outside-description"></p>
                            </div>

                            <div id="racad-designer" data-udraw="canvasWrapper">
                                <canvas id="racad-designer-canvas" width="504" height="288" data-udraw="canvas"></canvas>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="apparel-bottom-container">
                <div id="pages-container" data-udraw="pagesContainer" style="display: inline-block;">
                    <div id="pages-carousel" style="height: 110px;" data-udraw="pagesList">

                    </div>
                </div>
                <div id="pricing-cart-div" style="display: inline-block; margin: 15px;">
                    <a href="#" class="btn btn-sm designer-menu-btn" style="background-image: linear-gradient(#707070, #000000);" onclick="javascript: jQuery('#ua-ud-continue-btn').trigger('click'); _ua_add_selected_option(ua_current_idx);"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>apparel/cart-icon.png"/></a>
                </div>
            </div>
        </div>

        <div id="toolbox-holder" data-udraw="toolboxContainer">
            <!-- Experimental -->
            <!--bounding box dialog-->
            <div class="modal toolbox-modal" id="bounding-box-modal" style="top: 95px;" data-udraw="boundingBoxModal">
                <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                    <div class="modal-content">
                        <div class="modal-header toolbox-header">
                            <span data-i18n="[html]menu_label.bounding-box"></span>
                            <div class="modal-header-btn-container" style="float:right;">
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
                            <div class="modal-header-btn-container" style="float:right;">
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
                            <div class="modal-header-btn-container" style="float:right;">
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

            <!--SVG image dialog-->
            <div class="modal toolbox-modal" id="svg-image-modal" style="top: 200px;" data-udraw="imageColouringModal">
                <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                    <div class="modal-content">
                        <div class="modal-header toolbox-header">
                            <span data-i18n="[html]header_label.svg-header"></span>
                            <div class="modal-header-btn-container" style="float:right;">
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
                            <div class="modal-header-btn-container" style="float:right;">
                                <a href="#" class="btn btn-default btn-xs" id="hide-designer-header-advanced-colouring-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="advanced-colouring-box-span" data-i18n="[html]common_label.hide"></span></a>
                                <a href="#" class="btn btn-default btn-xs" id="close-designer-header-advanced-colouring-box" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                            </div>
                        </div>
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
                            <a href="#" class="btn btn-success" tabindex="3" id="freedraw-enable-btn" style="display: none;" data-udraw="enableDraw"><span data-i18n="[html]dialog.start-freedraw"></span></a>
                            <a href="#" class="btn btn-danger" data-dismiss="modal" id="freedraw-cancel-btn" data-udraw="disableDraw"><span data-i18n="[html]button_label.exit-freedraw"></span></a>
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
                            <div class="modal-header-btn-container" style="float:right;">
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
            <!--<div class="modal toolbox-modal" id="edit-text-modal" style="top:340px;" data-udraw="textModal">
                <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                    <div class="modal-content">
                        <div class="modal-header toolbox-header">
                            <span data-i18n="[html]header_label.edit-text-header"></span>
                            <div class="modal-header-btn-container" style="float:right;">
                                <a href="#" class="btn btn-default btn-xs" id="hide-edit-text-box" style="padding-top:0px;" data-udraw="toolboxHide"><i class="fa fa-chevron-up"></i><span id="edit-text-box-span" data-i18n="[html]common_label.hide"></span></a>
                                <a href="#" class="btn btn-default btn-xs" id="close-edit-text-box" style="padding-top:0px;" data-udraw="toolboxClose"><i class="fa fa-close"></i><span data-i18n="[html]common_label.close"></span></a>
                            </div>
                        </div>
                        <div class="modal-body toolbox-body">
                            <div class="panel-body designer-panel-body" id="edit-text-box-body" style="padding:5px;">
                                <textarea id="current-text-textarea" class="form-control" style="margin-top:5px; margin-bottom: 5px; height:75px; resize: none;" data-udraw="textArea"></textarea>
                                <a href="#" id="text-set-camelcase" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.camel-case" style="display: inline-block;" data-udraw="editTextCamelCase"><span>Aa</span></a>
                                <a href="#" id="text-set-uppercase" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.upper-case" style="display: inline-block;" data-udraw="editTextUpperCase"><span>AA</span></a>
                                <a href="#" id="text-set-lowercase" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.lower-case" style="display: inline-block;" data-udraw="editTextLowerCase"><span>aa</span></a>
                                <a href="#" id="convert-text-btn" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.convert-text" style="display: inline-block;" data-udraw="editTextConvertCurved"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>arc-text-black.png" style="margin-left: -6px; margin-top: -7px; max-width:180%;" /></a>
                                <a href="#" id="clone-text-btn" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.clone-text" style="display: inline-block;" data-udraw="editTextAdvancedText"><span id="clone-text-btn-span" data-i18n="[html]button_label.clone-text"></span></a>
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
                                            <a href="#" id="decrease-letter-spacing" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.decrease-letter-spacing" style="display: inline-block;" data-udraw="letterSpaceIncrease"><span>-</span></a>
                                            <a href="#" id="increase-letter-spacing" class="btn btn-default designer-toolbar-btn" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.increase-letter-spacing" style="display: inline-block;" data-udraw="letterSpaceDecrease"><span>+</span></a>
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
            </div>-->

            <!--shadows modal-->
            <div class="modal toolbox-modal" id="shadows-modal" style="top:375px;" data-udraw="shadowModal">
                <div class="modal-dialog modal-md" style="margin: 0px auto 0px auto;">
                    <div class="modal-content">
                        <div class="modal-header toolbox-header">
                            <span data-i18n="[html]header_label.shadow-box-header"></span>
                            <div class="modal-header-btn-container" style="float:right;">
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
        </div>
    </div>

    <!-- START OF DIALOGS -->
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

    <!-- Progress Bar Dialog -->
    <div class="modal" id="progress-bar-modal" data-udraw="progressModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
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
                    <a href="#" class="btn btn-default btn-sm" data-udraw="apparelGraphicsCollection"><span data-i18n="[html]button_label.apparelGraphics"></span></a>
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
                                        <a href="#" class="btn btn-success" id="wizard-create-btn"><span data-i18n="[html]wizard.create-btn"></span></a>
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

                            <div id="disable-designer-functions-div" data-udraw="disableFunctionsContainer" style="display:none;">
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
    <div class="modal" id="crop-modal"  data-udraw="cropModal">
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
                        <input class="replace-image-upload-btn" style="height: 45px; width:175px; display: block; position: absolute; right: 0px; left:20px; top: 16px; font-family: Arial; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;" type="file" name="files[]" multiple />

                        <a href="#" class="btn btn-default" style="width:175px;">
                            <i class="fa fa-upload" style="font-size:1.5em"></i>&nbsp; <span data-i18n="[html]common_label.upload-image"></span>
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

    <!-- Get Info Dialog -->
    <div class="modal" id="info-form-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 data-i18n="[html]dialog.info-form-header"></h4>
                </div>
                <div class="modal-body">
                    <div id="info-form-body-div">
                        <div id="input-firstName" class="input-field-container">
                            <span class="input-label-span" data-i18n="[html]dialog.firstName"></span>
                            <input type="text" class="form-input-field" id="firstName-input-text" />
                        </div>
                        <div id="input-lastName" class="input-field-container">
                            <span class="input-label-span" data-i18n="[html]dialog.lastName"></span>
                            <input type="text" class="form-input-field" id="lastName-input-text" />
                        </div>
                        <div id="input-addressLine1" class="input-field-container">
                            <span class="input-label-span" data-i18n="[html]dialog.addressLine1"></span>
                            <input type="text" class="form-input-field" id="addressLine1-input-text" />
                        </div>
                        <div id="input-addressLine2" class="input-field-container">
                            <span class="input-label-span" data-i18n="[html]dialog.addressLine2"></span>
                            <input type="text" class="form-input-field" id="addressLine2-input-text" />
                        </div>
                        <div id="input-companyPhone" class="input-field-container">
                            <span class="input-label-span" data-i18n="[html]dialog.companyPhone"></span>
                            <input type="text" class="form-input-field" id="companyPhone-input-text" />
                        </div>
                        <div id="input-cellPhone" class="input-field-container">
                            <span class="input-label-span" data-i18n="[html]dialog.cellPhone"></span>
                            <input type="text" class="form-input-field" id="cellPhone-input-text" />
                        </div>
                        <div id="input-emailAddress" class="input-field-container">
                            <span class="input-label-span" data-i18n="[html]dialog.emailAddress"></span>
                            <input type="text" class="form-input-field" id="emailAddress-input-text" />
                        </div>
                        <div id="input-jobTitle" class="input-field-container">
                            <span class="input-label-span" data-i18n="[html]dialog.jobTitle"></span>
                            <input type="text" class="form-input-field" id="jobTitle-input-text" />
                        </div>
                        <div id="input-companyLogo" class="input-field-container">
                            <span class="input-label-span" data-i18n="[html]dialog.companyLogo" style="padding-bottom: 5px;"></span>
                            <div style="padding-top: 5px; display: inline-block"><span data-i18n="[html]dialog.selected-file"></span><span id="display-companyLogo"></span></div>
                            <form id="trigger-companyLogo-upload" method="get" action="">
                                <div id="trigger-companyLogo-upload-btn" class="btn btn-default" style="padding-top: 5px; width: 150px; height: 35px;">
                                    <i class="fa fa-upload icon"></i>&nbsp; <span data-i18n="[html]common_label.upload-image"></span>
                                    <input id="companyLogo-upload-btn" type="file" name="files[]" accept="image/*" style="opacity: 0; margin-top: -20px;" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-danger" data-dismiss="modal" id="apply-info-btn"><span data-i18n="[html]common_label.apply"></span></a>
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
                        <div id="fb-root"></div><div class="fb-login-button" scope="user_photos" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" onlogin="javascript: RacadDesigner.Facebook.OnLoginLogout()"></div>
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
</div>