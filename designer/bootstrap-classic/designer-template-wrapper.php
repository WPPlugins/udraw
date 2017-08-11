<?php 
    $udrawSettings = new uDrawSettings();
    $_udraw_settings = $udrawSettings->get_settings();
?>

<div id="udraw-main-designer-ui" style="min-height:530px;">
        <div style="width:100%; padding-left: 5px;">
            <!-- Designer Top Navigation -->
            <div style="padding-left:10px; padding-top:5px;">
                <div class="panel panel-default" style="margin-bottom: 3px;" id="racad-desinger-top-toolbar-main">
                    <div class="panel-heading" style="padding-top: 3px; padding-bottom: 0px; min-height:36px;">
                        <?php if(isset($_GET['cart_item_key']) && !$_udraw_settings['split_variations_2_step'] ) { ?>
                            <a href="#" class="btn btn-success btn-sm" id="udraw-update-design-btn" style="width:90px;"><i class="fa fa-floppy-o" style="font-size:2em;"></i><br /><?php _e('Update Now', 'udraw') ?></a>
                        <?php } else { ?>
                            <a href="#" class="btn btn-success btn-sm" id="udraw-save-design-btn" style="width:0px; display:none;"><i class="fa fa-shopping-cart" style="font-size:2em;"></i><br /><?php _e('Add To Cart', 'udraw') ?></a>
                        <?php } ?>
                        <a href="#" class="btn btn-primary btn-sm" onclick='javascript: RacadDesigner.Text.AddTextFromDesigner()' style="width: 90px; padding: 3px 10px; margin-top: -29px;"><i class="fa fa-font"></i>&nbsp;<span data-i18n="[html]common_label.text"></span></a>            
                        <div class="btn-group" id="multiple-image-btn-group" style="position: absolute; margin-left: -94px; margin-top: 27px; ">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" style="width: 90px; padding: 3px 10px;">
                                <i class="fa fa-picture-o"></i>&nbsp;<span data-i18n="[html]common_label.image"></span>&nbsp;<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li style="padding-left:20px;">
                                    <input class="jQimage-upload-btn" style="height: 45px; display: block; position: absolute; right: 0px; top: 0px; font-family: Arial; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;" type="file" name="files[]" multiple />                        
                                    <i class="fa fa-upload" style="font-size:1.5em"></i>&nbsp; <span data-i18n="[html]common_label.upload-image"></span>                       
                                </li>
                                <li class="divider"></li>

                                <?php if (is_user_logged_in()) { ?>
                                <li>
                                    <a href="#" id="local-images-nav-btn">
                                        <i class="fa fa-briefcase" style="font-size:1.5em"></i>&nbsp; <span data-i18n="[html]common_label.local-storage"></span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <?php } ?>

                                <?php if (!$_udraw_settings['designer_disable_global_clipart']) { ?>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" id="clipart-collection-nav-btn">
                                        <i class="fa fa-picture-o" style="font-size:1.5em"></i>&nbsp; <span data-i18n="[html]common_label.clipart-collection"></span>
                                    </a>
                                </li>
                                <?php } ?>

                                <?php if ($_udraw_settings['designer_enable_local_clipart']) { ?>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" id="private-clipart-collection-nav-btn">
                                        <i class="fa fa-picture-o" style="font-size:1.5em"></i>Local&nbsp; <span data-i18n="[html]common_label.clipart-collection"></span>
                                    </a>
                                </li>
                                <?php } ?>
                                
                            </ul>
                        </div>
                        <?php if (!$_udraw_settings['designer_disable_qrqode']) { ?>
                           <a href="#" class="btn btn-primary btn-sm" id="qrcode-toolbar-btn" style="width: 90px; padding: 3px 10px; margin-top: -29px;"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>qr-code-icon.png" style="width:16px; height:16px;" />&nbsp;<span data-i18n="[html]common_label.QRcode"></span></a>
                        <?php } ?>

                        <?php if (!$_udraw_settings['designer_disable_shapes']) { ?>
                            <div class="btn-group" id="multiple-shapes-btn-group" style="position: absolute; margin-left: -94px; margin-top: 27px; ">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" style="width: 90px; padding: 3px 10px;">
                                    <i class="fa fa-circle-o"></i>&nbsp; <span data-i18n="[html]common_label.shapes"></span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#" onclick='javascript: RacadDesigner.Shapes.AddCircle();' id="shapes-circle-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>circle-icon.png" style="width:24px; height:24px;" />&nbsp;<span data-i18n="[html]menu_label.circle-shape"></span></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" onclick='javascript: RacadDesigner.Shapes.AddRectangle();' id="shapes-sqaure-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>square-icon.png" style="width:24px; height:24px;" />&nbsp;<span data-i18n="[html]menu_label.rect-shape"></span></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" onclick='javascript: RacadDesigner.Shapes.AddTriangle();' id="shapes-triangle-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>triangle-icon.png" style="width:24px; height:24px;" />&nbsp;<span data-i18n="[html]menu_label.triangle-shape"></span></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#" onclick='javascript: RacadDesigner.Shapes.AddLine();' id="shapes-line-add-btn"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH ?>line-icon.png" style="width:24px; height:24px;" />&nbsp;<span data-i18n="[html]menu_label.line-shape"></span></a>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>

                        <a href="#" class="btn btn-primary btn-sm" id="canvas-background-btn" style="width: 90px; padding: 3px 10px; margin-top: -29px;"><span data-i18n="[html]menu_label.background"></span></a>
                        <a href="#" class="btn btn-default btn-sm" id="dropdown-pages-link" style="width: 90px; padding: 3px 10px; margin-top: -29px;"><span data-i18n="[html]common_label.pages"></span></a>
                        <a href="#" class="btn btn-default btn-sm" id="dropdown-layers-link" style="margin-left: -94px; margin-top: 27px; width: 90px; padding: 3px 10px;"><span data-i18n="[html]common_label.layers"></span></a>
                        
                        <?php
                        $uDraw = new uDraw();
                        if (!isset($isBlankCanvas)) {
                            // Default to load in original template design.
                            $table_name = $_udraw_settings['udraw_db_udraw_templates'];
                            $templateId = $uDraw->get_udraw_template_ids($post->ID);
                            $tags = "";
                            if (count($templateId) > 0) {
                                $tags = $wpdb->get_var("SELECT tags FROM $table_name WHERE id = '". $templateId[0] ."'");
                            }
                            
                            if (strlen($tags) > 1) {
                                ?>
                                    <a href="#" class="btn btn-info btn-sm" id="private-template-browser-btn" style="width: 120px;padding: 8px 12px;margin-top: -2px;height: 50px;">&nbsp;BROWSE <br /> DESIGNS</a>                                                
                                <?php
                            }
                        }
                        ?>
                        
                        
                        <a href="#" class="btn btn-warning btn-sm" id="canvas-undo-btn" style="margin-top: 21px;"><i class="fa fa-undo"></i>&nbsp;<span data-i18n="[html]nav.undo"></span></a>

                        <!--
                        <span style="border: 0; color: #f6931f; font-weight: bold; margin-top:8px;margin-left: 130px;" id="scale-canvas-slider-label">Zoom</span>
                        <div id="scale-canvas-slider" style="margin-top: -21px; width: 100px; margin-left: 867px;"></div>
                        -->
                        <div style="display: inline-block; margin-top: 0px; padding-left:5px;">
                            <div style="color: #f6931f; width: 150px;" id="scale-canvas-slider-label"><span data-i18n="[html]text.zoom"></span></div>
                            <div id="scale-canvas-slider" style="width: 100px;"></div>
                            
                        </div>
                        <input type="checkbox" id="zoom-multiplier"/> 2x Zoom

                        <span class="small" style="position: relative;float: right;margin-top: 5px;color: #999999;" id="racad-designer-version"></span>
                    </div>
                </div>
            </div>
            <?php include_once(UDRAW_PLUGIN_DIR . '/designer/bootstrap-classic/designer-template.php'); ?>                
        </div>           
    </div>