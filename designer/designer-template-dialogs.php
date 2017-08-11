        <!-- Public Template Browser Dialog -->
        <div class="modal" id="browse-templates-modal">
            <div class="modal-dialog" style="width:1000px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2><span data-i18n="[html]header_label.templates-header"></span></h2>
                    </div>
                    <div class="modal-body" style="min-height: 520px; max-height: 520px; overflow: auto;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2" id="templates-category-list" style="margin-left: 0px; width:250px; display: inline-block;">
                                </div>
                                <div id="templates-category-content" class="col-md-8" style="display: inline-block;">
                                    <h4 id="templates-category-title"><span data-i18n="[html]header_label.items"></span></h4>
                                    <div id="templates-container-list">

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
        <div class="modal" id="browse-private-templates-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2><span data-i18n="[html]header_label.templates-header"></span></h2>
                    </div>
                    <div class="modal-body" style="min-height:520px; max-height: 520px; overflow:auto;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-2" id="private-templates-category-list" style="margin-left: 0px; width:250px; display: inline-block;">
                                    <h4 id="private-templates-category-list-container"><span data-i18n="[html]common_label.category"></span></h4>
                                    stuff
                                </div>
                                <div id="private-templates-category-content" class="col-md-10" style="display:inline-block;">
                                    <h4 id="private-templates-container-title"><span data-i18n="[html]header_label.items"></span></h4>
                                    <div id="private-templates-container-list">
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

        <!-- Progress Bar Dialog -->
        <div class="modal" id="progress-bar-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
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
        <div class="modal" id="local-images-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large;"><span data-i18n="[html]header_label.image-header"></span></strong>
                        <div style="padding-top:10px;">
                            <ol class="breadcrumb" id="local-images-folder-list"></ol>
                        </div>
                    </div>
                    <div class="modal-body" style="max-height: 400px; overflow:auto;">
                        <div id="local-images-list">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.close"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Clipart Collection Dialog -->
        <div class="modal" id="clipart-collection-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large;"><span data-i18n="[html]header_label.image-header"></span></strong>
                        <div style="padding-top:10px;">
                            <a href="#" id="racad-clipart-collection" class="btn btn-default"><span data-i18n="[html]button_label.udraw-clipart"></span></a>
                            <a href="#" id="openclipart-clipart-collection" class="btn btn-default"><span data-i18n="[html]button_label.open-clipart"></span></a>
                            <div id="search-openclipart-container" style="float: right; display: none;">
                                <input type="text" id="search-openclipart-input" data-i18n="[placeholder]text.search-by-word" />
                                <a href="#" id="search-openclipart-input-btn" class="btn btn-default"><span data-i18n="[html]button_label.search"></span></a>
                            </div>
                        </div>
                        <div style="padding-top:10px;">
                            <ol class="breadcrumb" id="clipart-collection-folder-list"></ol>
                        </div>
                    </div>
                    <div class="modal-body" style="max-height: 400px; overflow:auto;">
                        <div id="clipart-collection-list">

                        </div>
                        <div id="openclipart-collection-div" style="display: none">
                            <div id="openclipart-collection-list">
                            </div>
                            <div id="openclipart-page-selection-container">
                                <a href="#" id="previous-openclipart-page" class="btn btn-default"><span data-i18n="[html]common_label.previous"></span></a>
                                <a href="#" id="next-openclipart-page" class="btn btn-default"><span data-i18n="[html]common_label.next"></span></a>
                                <span data-i18n="[html]text_label.clipart-page"></span>
                                <select id="select-openclipart-page"></select>
                                <a href="#" id="go-to-selected-openclipart-page" class="btn btn-default"><span data-i18n="[html]common_label.go"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.close"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!--Private  Clipart Collection Dialog -->
        <div class="modal" id="private-clipart-collection-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large;"><span data-i18n="[html]header_label.image-header"></span></strong>
                        <div style="padding-top:10px;">
                            <ol class="breadcrumb" id="private-clipart-collection-folder-list"></ol>
                        </div>
                    </div>
                    <div class="modal-body" style="max-height: 400px; overflow:auto;">
                        <div id="private-clipart-collection-list">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.close"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- QR Code Dialog -->
        <div class="modal" id="qrcode-modal">
            <div class="modal-dialog modal-md" style="width: 600px;">
                <div class="modal-content">
                    <div class="modal-body" style="max-height: 400px; overflow:auto;">
                        <span class="col-md-8">
                            <input type="text" class="form-control" tabindex="1" id="qrcode-value-txtbox" value="http://somedomain" />
                        </span>
                        <span class="col-md-2">
                            <input type="hidden" id="qrcode-colour-picker" value="#000000" />
                        </span>
                        <span class="col-md-2">
                            <a href="#" class="btn btn-success btn-sm" id="qrcode-refresh-btn"><i class="fa fa-refresh"></i>&nbsp;<span data-i18n="[html]common_label.refresh"></span></a>
                        </span>
                        <br />
                        <div id="qrcode-preview" style="padding-top:25px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.cancel"></span></a>
                        <a href="#" class="btn btn-success" tabindex="3" id="qrcode-add-btn"><span data-i18n="[html]common_label.add"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wizard Dialog -->
        <div class="modal" id="wizard-modal">
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
                                        <div id="wizard-bc-options">
                                            <input type="radio" name="product-size" value="3.5,2,bc,2.5" checked="checked" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.2x3"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.horizontal"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="2,3.5,bc,1.85" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.2x3"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.vertical"></span></strong>
                                        </div>
                                        <div id="wizard-brochure-options" style="display:none;">
                                            <input type="radio" name="product-size" value="11,8.5,brochure,0.8" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.11x8-5"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.letter"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="14,8.5,brochure,0.6" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.14x8-5"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.legal"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="17,11,brochure,0.5" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.17x11"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.tabloid"></span></strong>
                                        </div>
                                        <div id="wizard-envelope-options" style="display:none;">
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
                                        <div id="wizard-flyers-options" style="display:none;">
                                            <input type="radio" name="product-size" value="8.5,5.5,flyers,1.05" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.8-5x5-5"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="8.5,11,flyers,0.8" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.8-5x11"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="5.5,4,flyers,1.6" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.5-5x4"></span></strong>
                                            <br />
                                        </div>
                                        <div id="wizard-gc-options" style="display:none;">
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
                                        <div id="wizard-lh-options" style="display:none;">
                                            <input type="radio" name="product-size" value="8.5,11,lh,0.8" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.8-5x11"></span>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.standard"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="8.5,14,lh,0.65" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.8-5x14"></span></strong>
                                            <br />
                                            <input type="radio" name="product-size" value="11,17,lh,0.5" /><strong>&nbsp;<span class="product-size-span" data-i18n="[html]wizard.11x17"></span></strong>
                                            <br />
                                        </div>
                                        <div id="wizard-postcard-options" style="display:none;">
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
                                        <div id="wizard-custom-options" style="display:none;">
                                            <label class="col-md-2 control-label" style="margin-top:5px;"><span data-i18n="[html]wizard.custom-width"></span></label>
                                            <span class="col-md-10">
                                                <span class="input-group">
                                                    <input type="text" class="form-control" tabindex="1" id="wizard-custom-width" value="3.5" />
                                                    <span class="input-group-addon"><span data-i18n="[html]wizard.custom-inch"></span></span>
                                                </span>
                                            </span>

                                            <label class="col-md-2 control-label" style="margin-top:5px;"><span data-i18n="[html]wizard.custom-height"></span></label>
                                            <span class="col-md-10" style="margin-top: 2px;">
                                                <span class="input-group">
                                                    <input type="text" class="form-control" tabindex="1" id="wizard-custom-height" value="2" />
                                                    <span class="input-group-addon"><span data-i18n="[html]wizard.custom-inch"></span></span>
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
                                                <input type="text" class="form-control" tabindex="1" id="wizard-bleed-area" value="0" />
                                                <span class="input-group-addon"><span data-i18n="[html]wizard.custom-inch"></span></span>
                                            </div>
                                        </div>
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
        <div class="modal" id="document-properties-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong style="font-size:large;"><span data-i18n="[html]menu_label.settings"></span></strong>
                    </div>
                    <div class="modal-body">
                        <div id="document-properties-div">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label"><span data-i18n="[html]text_label.settings-width"></span></label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <input class="form-control" tabindex="1" id="document-width-input" />
                                            <span class="input-group-addon"><span data-i18n="[html]text_label.settings-inch"></span></span>
                                        </div>
                                    </div>

                                    <label class="col-sm-1 control-label"><span data-i18n="[html]text_label.settings-height"></span></label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <input class="form-control" tabindex="1" id="document-height-input" />
                                            <span class="input-group-addon"><span data-i18n="[html]text_label.settings-inch"></span></span>
                                        </div>
                                    </div>

                                    <label class="col-sm-1 control-label"><span data-i18n="[html]text_label.settings-bleed"></span></label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <input class="form-control" tabindex="1" id="document-bleed-area" value="0" />
                                            <span class="input-group-addon"><span data-i18n="[html]text_label.settings-inch"></span></span>
                                        </div>
                                    </div>

                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11" style="padding-top:15px;">
                                        <label>
                                            <input type="checkbox" id="show-grid-checkbox" /><span data-i18n="[html]text.settings-display-grid"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox col-sm-offset-1 checkbox col-sm-11">
                                        <label>
                                            <input type="checkbox" id="show-crop-marks" checked="checked" /><span data-i18n="[html]text.settings-display-crop"></span>
                                        </label>
                                    </div>

                                    <div id="security-settings-div" style="display:none;">
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
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal"><span data-i18n="[html]common_label.cancel"></span></a>
                        <a href="#" class="btn btn-success" tabindex="3" id="update-document-properties-btn"><span data-i18n="[html]common_label.update"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Crop Dialog -->
        <div class="modal" id="crop-modal">
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
                        <a href="#" class="btn btn-danger" data-dismiss="modal" id="A1"><span data-i18n="[html]common_label.cancel"></span></a>
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