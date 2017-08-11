<?php 
$udrawSettings = new uDrawSettings();
$_udraw_settings = $udrawSettings->get_settings();
$_activation_key = uDraw::get_udraw_activation_key();
?>

<div id="prompt-pdf-conversion" style="display: none;">
    <div id="prompt-pdf-conversion-content">
        <p>Would you like to convert your uploaded PDF into a uDraw Design? You will be able to edit on top of your PDF.</p>
    </div>
    <div id="converting-pdf" style="display: none; text-align: center;">
        <i class="fa fa-5x fa-spinner fa-pulse"></i>
    </div>
    <div id="prompt-pdf-conversion-footer">
        <a href="#" class="button" style="background:#D31515" id="not-converting-pdf-btn"><span>No</span></a>
        <a href="#" class="button" style="background:#008000" id="convert-pdf-btn"><span>Yes</span></a>
    </div>
</div>
<div id="pdf-conversion-error" style="display: none;">
    <p>Sorry, we were not able to convert your uploaded PDF file.</p>
</div>

<style>
    .udraw-uploaded-files-list a:hover {
        text-decoration: none;
    }
    .udraw-progress-bar { 
		height: 19px;
		position: relative;
		margin: 10px 0 0 0;
		background: #555;
		-moz-border-radius: 25px;
		-webkit-border-radius: 25px;
		border-radius: 25px;
		padding: 5px;
		-webkit-box-shadow: inset 0 -1px 1px rgba(255,255,255,0.3);
		-moz-box-shadow   : inset 0 -1px 1px rgba(255,255,255,0.3);
		box-shadow        : inset 0 -1px 1px rgba(255,255,255,0.3);
	}
	.udraw-progress-bar > span {
		display: block;
		height: 100%;
			-webkit-border-top-right-radius: 8px;
		-webkit-border-bottom-right-radius: 8px;
			    -moz-border-radius-topright: 8px;
			-moz-border-radius-bottomright: 8px;
			        border-top-right-radius: 8px;
			    border-bottom-right-radius: 8px;
			-webkit-border-top-left-radius: 20px;
			-webkit-border-bottom-left-radius: 20px;
			    -moz-border-radius-topleft: 20px;
			    -moz-border-radius-bottomleft: 20px;
			        border-top-left-radius: 20px;
			        border-bottom-left-radius: 20px;
		background-color: rgb(43,194,83);
		background-image: -webkit-gradient(
			linear,
			left bottom,
			left top,
			color-stop(0, rgb(43,194,83)),
			color-stop(1, rgb(84,240,84))
			);
		background-image: -moz-linear-gradient(
			center bottom,
			rgb(43,194,83) 37%,
			rgb(84,240,84) 69%
			);
		-webkit-box-shadow: 
			inset 0 2px 9px  rgba(255,255,255,0.3),
			inset 0 -2px 6px rgba(0,0,0,0.4);
		-moz-box-shadow: 
			inset 0 2px 9px  rgba(255,255,255,0.3),
			inset 0 -2px 6px rgba(0,0,0,0.4);
		box-shadow: 
			inset 0 2px 9px  rgba(255,255,255,0.3),
			inset 0 -2px 6px rgba(0,0,0,0.4);
		position: relative;
		overflow: hidden;
	}
	.udraw-progress-bar > span:after, .udraw-progress-bar-animate > span > span {
		content: "";
		position: absolute;
		top: 0; left: 0; bottom: 0; right: 0;
		background-image: 
			-webkit-gradient(linear, 0 0, 100% 100%, 
			    color-stop(.25, rgba(255, 255, 255, .2)), 
			    color-stop(.25, transparent), color-stop(.5, transparent), 
			    color-stop(.5, rgba(255, 255, 255, .2)), 
			    color-stop(.75, rgba(255, 255, 255, .2)), 
			    color-stop(.75, transparent), to(transparent)
			);
		background-image: 
			-moz-linear-gradient(
				-45deg, 
			    rgba(255, 255, 255, .2) 25%, 
			    transparent 25%, 
			    transparent 50%, 
			    rgba(255, 255, 255, .2) 50%, 
			    rgba(255, 255, 255, .2) 75%, 
			    transparent 75%, 
			    transparent
			);
		z-index: 1;
		-webkit-background-size: 50px 50px;
		-moz-background-size: 50px 50px;
		-webkit-animation: move 2s linear infinite;
			-webkit-border-top-right-radius: 8px;
		-webkit-border-bottom-right-radius: 8px;
			    -moz-border-radius-topright: 8px;
			-moz-border-radius-bottomright: 8px;
			        border-top-right-radius: 8px;
			    border-bottom-right-radius: 8px;
			-webkit-border-top-left-radius: 20px;
			-webkit-border-bottom-left-radius: 20px;
			    -moz-border-radius-topleft: 20px;
			    -moz-border-radius-bottomleft: 20px;
			        border-top-left-radius: 20px;
			        border-bottom-left-radius: 20px;
		overflow: hidden;
	}
		
	.animate > span:after {
		display: none;
	}
		
	@-webkit-keyframes move {
		0% {
		    background-position: 0 0;
		}
		100% {
		    background-position: 50px 50px;
		}
	}
</style>

<script>
    jQuery('.udraw-product form.cart').first().append('<input type="hidden" name="udraw_options_uploaded_excel" value="" />');
    var uploadedFiles = [];
    var sessionID = '<?php echo uniqid() ?>';
    
    function __display_full_screen_ui(partial) {
        // Update the UI to go Fullscreen mode
        /*jQuery('.single-product-image').removeClass("span6");
        jQuery('.single-product-image').css({ "min-width": "1048px" });

        jQuery('.product_title').css('padding-left', '18px').css('margin', '0px');
        jQuery('.summary').css('float', 'none').css('padding-left', '15px');        
        jQuery('#primary, #main').css("width", "100%");
        jQuery('.entry-summary').removeClass("col-lg-6 col-md-5 col-sm-12");
        jQuery('.summary-before').removeClass("col-lg-6 col-md-7 col-sm-12");
        jQuery('.price').hide();
        jQuery('.images').hide();
        jQuery('.description').hide();
        jQuery('.product-info').hide();

        if (typeof partial === 'undefined') {
            jQuery('.entry-summary').hide();
            jQuery('#product-tab').hide();
            jQuery('.related').hide();
        }*/
        if (typeof window.designerAction == 'undefined') {
            window.designerAction = '';
        }
    }

    function __restore_options_ui() {
        // Remove full screen mode if going back to options
        jQuery('.single-product-image').addClass("span6");
        jQuery('.single-product-image').css({ "min-width": "" });

        jQuery('.product_title').css('padding-left', '').css('margin', '');
        jQuery('.summary').css('float', '').css('padding-left', '');        
        jQuery('#primary, #main').css("width", "");
        jQuery('.entry-summary').addClass("col-lg-6 col-md-5 col-sm-12");
        jQuery('.summary-before').addClass("col-lg-6 col-md-7 col-sm-12");
        jQuery('.price').show();
        jQuery('.images').show();
        jQuery('.description').show();
        jQuery('.product-info').show();

        jQuery('.entry-summary').show();
        jQuery('#product-tab').show();
        jQuery('.related').show();
    }
    
    function removeUploadedFile(fileName) {
        for (var i = 0; i < uploadedFiles.length; i++) {
            if (fileName === uploadedFiles[i].name) {
                uploadedFiles.splice(i, 1);
                if (typeof RacadDesigner === 'object') {
                    jQuery('table.upload_table tr:nth-child('+(i+2)+') td:nth-child(2)').empty();
                    if (uploadedFiles.length < RacadDesigner.pages.length) {
                        enable_upload_button();
                    }
                } else {
                    jQuery('.udraw-uploaded-files-list').empty();
                    for (var x = 0; x < uploadedFiles.length; x++) {
                        jQuery('.udraw-uploaded-files-list').append(append_file_upload_list(uploadedFiles[x]));
                    }
                }
                jQuery('input[name="udraw_options_uploaded_files"]').val(JSON.stringify(uploadedFiles));
                if (uploadedFiles.length === 0) {
                    jQuery('#udraw-options-page-upload-btn, tr.udraw_action_row, #udraw-options-page-design-btn').show();
                    jQuery('#udraw-options-submit-form-btn').hide();
                }

                jQuery('#udraw-price-matrix-ui').trigger({
                    type: 'file-upload-remove',
                    uploaded_files: uploadedFiles
                });
                return;
            }
        }
    }
    
    function append_file_upload_list(file_object, sortable) {
        var file_name = file_object.name;
        var file_url = file_object.url;
        var _icon = jQuery('<i></i>').addClass('fa fa-times-circle').css({
            'color': 'red',
            'font-size': '1.5em'
        });
        var _remove = jQuery('<a></a>').attr({
            'href': '#',
            'onclick': 'javascript: removeUploadedFile("'+ file_name +'"); return false;'
        }).addClass('remove_btn').append(_icon);
        var _span = jQuery('<span></span>').html(file_name);
        var _strong = jQuery('<strong></strong>').html('Uploaded:&nbsp;');
        if (sortable) {
            _strong = jQuery('<div></div>').addClass('list_handler').append('<i class="fa fa-arrows-v"></i>');
        }
        var _content_div = jQuery('<div></div>').addClass('content_div').append(_span, _remove);
        var _label = jQuery('<label></label>').css({
            'font-size': '10pt',
            'display': 'initial'
        }).append(_strong,_content_div);
        var _div = jQuery('<div></div>').addClass('filename_div').append(_label).attr('data-filename',file_name);
        return _div;
    }
    
    function build_upload_table (callback) {
        var row_array = new Array();
        var name_header = jQuery('<th></th>').html('<?php _e(' ', 'udraw') ?>');
        var file_header = jQuery('<th></th>').html('<?php _e('File Attached', 'udraw') ?>');
        var header_row = jQuery('<tr></tr>').append(name_header, file_header);
        row_array.push(header_row);
        if (RacadDesigner.hasOwnProperty('pages') && RacadDesigner.pages.length > 0) {
            for (var i = 0; i < RacadDesigner.pages.length; i++) {
                var file_column = jQuery('<td></td>');
                var name_column = jQuery('<td></td>').html(RacadDesigner.pages[i].label);
                var _row = jQuery('<tr></tr>').append(name_column, file_column);
                row_array.push(_row);
            }
        }
        var _tbody = jQuery('<tbody></tbody>').append(row_array);
        if (typeof callback === 'function') {
            callback(_tbody);
        }
    }
    
    function disable_upload_button() {
        jQuery('#udraw-options-page-upload-btn').prop('disabled', true).addClass('disabled').attr('title','Maximum number of files uploaded. Please remove a file to enable button.');
    }

    function enable_upload_button() {
        jQuery('#udraw-options-page-upload-btn').prop('disabled', false).removeClass('disabled').removeAttr('title');
    }
    
    function initialize_sortable() {
        jQuery('table.upload_table').sortable({
            'axis':'y',
            'cancel':'remove_btn',
            'items': 'div.filename_div',
            'cursor' : 'move',
            'stop' : function(event, ui) {
                var file_array = new Array();
                var div_array = jQuery('div.filename_div');
                for (var i = 0; i < div_array.length; i++) {
                    jQuery(div_array[i]).appendTo('table.upload_table tr:nth-child('+(i+2)+') td:nth-child(2)');
                    for (var x = 0; x < uploadedFiles.length; x++) {
                        if (jQuery(div_array[i]).attr('data-filename') === uploadedFiles[x].name) {
                            var _file = jQuery.extend(true, {}, uploadedFiles[x]);
                            file_array.push(_file);
                        }
                    }
                }
                uploadedFiles = file_array;
                jQuery('input[name="udraw_options_uploaded_files"]').val(JSON.stringify(uploadedFiles));
            }
        })
    }

    jQuery(document).ready(function () {
        //Create a file upload table if has template
        if (typeof RacadDesigner === 'object') {
            jQuery('[data-udraw="uDrawBootstrap"]').on('udraw-loaded-design', function(){
                build_upload_table(function(_tbody){
                    var _table = jQuery('<table></table>').addClass('upload_table').append(_tbody);
                    jQuery('.udraw-uploaded-files-list').append(_table);
                    <?php if (strlen($_cart_item_key) > 0) { ?>
                        if (RacadDesigner.hasOwnProperty('pages') && RacadDesigner.pages.length > 0) {
                            for (var i = 0; i < RacadDesigner.pages.length; i++) {
                                if (typeof uploadedFiles[i] !== 'undefined') {
                                    var file_column = jQuery('table.upload_table tr:nth-child('+(i+2)+') td:nth-child(2)');
                                    file_column.html(append_file_upload_list(uploadedFiles[i], true));
                                }
                            }
                            initialize_sortable();
                            if (uploadedFiles.length >= RacadDesigner.pages.length) {
                                disable_upload_button();
                            }
                        }
                    <?php } ?>
                });
            });
        }
        
        <?php if (strlen($_cart_item_key) > 0) { ?>
        jQuery('#udraw-options-submit-form-btn').show();
        jQuery('#udraw-options-submit-form-btn').html('Update Cart');
        jQuery('input[name="udraw_product_cart_item_key"]').val('<?php echo $_cart_item_key; ?>');
        <?php if (isset($is_upload_product) || (isset($is_upload_product_update) && $is_upload_product_update)) { ?>
        jQuery('input[name="udraw_options_uploaded_files"]').val('<?php echo $cart_item['udraw_data']['udraw_options_uploaded_files']; ?>');
        uploadedFiles = ('<?php echo $cart_item['udraw_data']['udraw_options_uploaded_files']; ?>'.length > 0 ) ? JSON.parse('<?php echo $cart_item['udraw_data']['udraw_options_uploaded_files']; ?>') : {};
        jQuery('input[name="udraw_options_converted_pdf"]').val('<?php echo $cart_item['udraw_data']['udraw_options_converted_pdf']; ?>');
        
        if (typeof RacadDesigner !== 'object') {
            for (var x = 0; x < uploadedFiles.length; x++) {
                jQuery('.udraw-uploaded-files-list').append(append_file_upload_list(uploadedFiles[x]));
            }
        }
        if (uploadedFiles.length > 0 || ('<?php echo $_cart_item_key ?>').length === 0) {
            jQuery('.udraw-uploaded-files-list').show();
            jQuery('#udraw-options-file-upload-progress').show();
            jQuery('.udraw-progress-bar').hide();
        }
        <?php } ?>
        jQuery('input[name="udraw_options_uploaded_excel"]').val('<?php echo $cart_item['udraw_data']['udraw_options_uploaded_excel']; ?>');
        <?php } ?>
        
        jQuery('#fileupload').fileupload({
            url:  '<?php echo admin_url( 'admin-ajax.php' ) . '?action=udraw_price_matrix_upload&session=' ?>' + sessionID,
            dataType: 'json',
            done: function (e, data) {
                var percentage = (data.loaded / data.total) * 100;
                jQuery('.udraw-progress-bar > span').attr('style', 'width: '+ percentage +'%');

                var upload_failed = false;
                for (var x = 0; x < data.result.length; x++) {
                    if (typeof data.result[x].error == 'string') {
                        var _valid_extension_names = '';
                        <?php
                        if (isset($valid_extensions)) {
                            if (strlen($valid_extensions) > 0) {
                                echo '_valid_extension_names="'. $valid_extensions .'";';
                            }
                        }
                        ?>
                        var _errorMessage = 'Upload Failed, Invalid File Type.';
                        if (_valid_extension_names.length > 0) {
                            var _valid_extensions_arr = _valid_extension_names.split(',');
                            _errorMessage = 'Upload Faied, Invalid File Type.\n\nAllow File Type(s) Are: ';
                            for (var z = 0; z < _valid_extensions_arr.length; z++) {
                                if (z == _valid_extensions_arr.length-1) {
                                    _errorMessage += _valid_extensions_arr[z];
                                } else {
                                    _errorMessage += _valid_extensions_arr[z] + ', ';
                                }                                
                            }
                        }
                        alert(_errorMessage);
                        upload_failed = true;
                        break;
                    }
                    var _item = new Object();
                    _item.name = data.result[x].name;
                    _item.url = data.result[x].url;
                    if (typeof RacadDesigner === 'object') {
                        if (uploadedFiles.length >= RacadDesigner.pages.length) {
                            break;
                        }
                    }
                    uploadedFiles.push(_item);
                }

                if (upload_failed) {
                    jQuery('.udraw_action_row').first().show();
                    return;
                }

                var post_process = false;
                var disable_post_process = false;
                <?php 
                if (isset($disable_price_matrix_size_check)) { 
                    if ($disable_price_matrix_size_check) {
                        echo 'disable_post_process = true;';
                    }
                }
                ?>
                if (!disable_post_process) {
                    if (typeof udraw_post_file_upload == 'function') {
                        post_process = udraw_post_file_upload(uploadedFiles);
                    }
                }
                if (!post_process) {
                    jQuery('.udraw-uploaded-files-list').empty();
                    if (typeof RacadDesigner === 'object') {
                        build_upload_table(function(_tbody){
                            var _table = jQuery('<table></table>').addClass('upload_table').append(_tbody);
                            jQuery('.udraw-uploaded-files-list').append(_table);
                            initialize_sortable();
                        });
                    }
                }

                for (var x = 0; x < uploadedFiles.length; x++) {
                    if (!post_process) {
                        if (typeof RacadDesigner === 'object') {
                            if (RacadDesigner.hasOwnProperty('pages') && RacadDesigner.pages.length > 0) {
                                for (var i = 0; i < RacadDesigner.pages.length; i++) {
                                    if (typeof uploadedFiles[i] !== 'undefined') {
                                        var file_column = jQuery('table.upload_table tr:nth-child('+(i+2)+') td:nth-child(2)');
                                        file_column.html(append_file_upload_list(uploadedFiles[i], true));
                                    }
                                }
                            }
                        } else {
                            jQuery('.udraw-uploaded-files-list').append(append_file_upload_list(uploadedFiles[x]));
                        }
                    }
                }

                jQuery('input[name="udraw_options_uploaded_files"]').val(JSON.stringify(uploadedFiles));

                if (!post_process) {
                    jQuery('#udraw-options-submit-form-btn').show();
                    jQuery('#upload-successful-span').show();
                }
                
                if (typeof convertPDF != 'undefined' && convertPDF == 'yes') {
                    if (uploadedFiles.length == 1) {
                        var index = new Array();
                        var name = uploadedFiles[0].name;
                        var url = uploadedFiles[0].url;
                        for (var i = 0; i < name.length; i++ ) {
                            if (name[i] == '.') {
                                index.push(i);
                            }
                        }
                        var extension = name.substring(index[index.length - 1]);
                        if (extension.toLowerCase() == '.pdf') {
                            jQuery('#prompt-pdf-conversion').show();
                            jQuery('.udraw-uploaded-files-list').hide();
                            jQuery('#convert-pdf-btn').click(function(){
                                jQuery('#prompt-pdf-conversion-content, #prompt-pdf-conversion-footer').hide();
                                jQuery('#converting-pdf').show();
                                var activationKey = '<?php echo $_activation_key ?>';
                                var file = url;
                                if (activationKey.length == 0) {
                                    jQuery('#pdf-conversion-error').show();
                                    jQuery('#prompt-pdf-conversion').hide();
                                    return;
                                }
                                RacadDesigner.util.convertPDFtoDesign(file, activationKey, function(){
                                    jQuery('input[name="udraw_options_converted_pdf"]').val(true);
                                    jQuery('#prompt-pdf-conversion').hide();
                                    jQuery('#udraw-options-page-upload-btn').hide();
                                    jQuery('tr.udraw_action_row').fadeIn();
                                    jQuery('#udraw-options-page-design-btn').show();
                                    jQuery('#udraw-options-file-upload-progress span').empty();
                                    //Now resize the template so that it fits inside the designer if it is too big
                                    jQuery('#udraw-options-page-design-btn').on('click',function(){
                                        jQuery.when(jQuery('[data-udraw="canvasWrapper"]').is(':visible')).then(function(){
                                            var wrapper_width = jQuery('[data-udraw="canvasWrapper"]').width();
                                            var wrapper_height = jQuery('[data-udraw="canvasWrapper"]').height();
                                            var doc_width = RacadDesigner.documentSize.width;
                                            var doc_height = RacadDesigner.documentSize.height;
                                            if (doc_width > wrapper_width || doc_height > wrapper_height) {
                                                var _zoom = Math.min((wrapper_width / doc_width),(wrapper_height / doc_height));
                                                RacadDesigner.ForceZoom(_zoom);
                                            }
                                        });
                                    });
                                }, function(){
                                    jQuery('#pdf-conversion-error').show();
                                    jQuery('#prompt-pdf-conversion').hide();
                                    jQuery('tr.udraw_action_row').fadeIn();
                                    jQuery('input[name="udraw_options_converted_pdf"]').val(false);
                                    jQuery('#udraw-options-page-design-btn').hide();
                                    jQuery('.udraw-uploaded-files-list').show();
                                    jQuery('#udraw-options-page-upload-btn').show();
                                });
                            });
                            jQuery('#not-converting-pdf-btn').click(function(){
                                jQuery('input[name="udraw_options_converted_pdf"]').val(false);
                                RacadDesigner.settings.designFile = '';
                                jQuery('#prompt-pdf-conversion').hide();
                                jQuery('#udraw-options-page-design-btn').hide();
                                jQuery('tr.udraw_action_row').show();
                                jQuery('.udraw-uploaded-files-list').show();
                                jQuery('#udraw-options-file-upload-progress span').empty();
                            })
                        }
                    } else {
                        jQuery('#prompt-pdf-conversion').hide();
                    }
                }
                
                if (typeof RacadDesigner === 'object') {
                    if (uploadedFiles.length >= RacadDesigner.pages.length) {
                        disable_upload_button();
                    }
                }

                jQuery('#udraw-price-matrix-ui').trigger({
                    type: 'file-upload-completed',
                    uploaded_files: uploadedFiles
                });

            },
            start: function (e) {
                jQuery('tr.udraw_action_row.design_row').fadeOut();
                jQuery('#udraw-options-file-upload-progress').show();
                jQuery('.udraw-progress-bar > span').css('width', '0%');
                jQuery('.udraw-progress-bar').show();
            },
            send: function (e, data) {
                jQuery('#udraw-options-file-upload-progress').show();
            },
            progressall: function (e, data) {
                var percentage = (data.loaded / data.total) * 100;
                jQuery('.udraw-progress-bar > span').animate({ width: percentage +'%' }, 500);
            },
            stop: function (e, data) {
                jQuery('.udraw-progress-bar').hide();
                if (uploadedFiles.length > 1) {
                    jQuery('.udraw-uploaded-files-list').show();
                    jQuery('tr.udraw_action_row').fadeIn();
                    jQuery('#udraw-options-page-design-btn').hide();
                }
            }
        }).prop('disabled', !jQuery.support.fileInput)
            .parent().addClass(jQuery.support.fileInput ? undefined : 'disabled');

        jQuery('#udraw-structure-file-upload').fileupload({
            url: '<?php echo admin_url( 'admin-ajax.php' ) . '?action=udraw_designer_structure_file_upload&session=' ?>' + sessionID + '&uploadsession=excel_<?php echo uniqid(); ?>',
            dataType: 'json',
            done: function (e, data) {
                var percentage = (data.loaded / data.total) * 100;
                jQuery('.udraw-progress-bar > span').attr('style', 'width: '+ percentage +'%');
                var excelPath = '';
                var excelName = '';
                for (var i in data.result) {
                    if (data.result[i].name != null && data.result[i].name != undefined) {
                        if (data.result[i].name.indexOf('.xlsx') > -1) {
                            excelPath = data.result[i].url;
                            excelName = data.result[i].name;
                            break;
                        }
                    }
                }
                excelPath = excelPath.replace(/\\/g, '/');
                var excel = new Object();
                excel.filename = excelName;
                excel.path = excelPath;
                excel.sessionID = sessionID;
                excel.uploadSessionID = data.result['uploadSessionID'];
                jQuery('input[name="udraw_options_uploaded_excel"]').val(JSON.stringify(excel));
                jQuery.ajax({
                    url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
                    data: {
                        action: 'udraw_designer_read_excel_file',
                        excel: JSON.stringify(excel),
                        preview: true
                    },
                    dataType: 'json',
                    success: function (response) {
                        //Load in entry #1
                        RacadDesigner.util.loadExcelPageData(response, 0, function(){
                            RacadDesigner.SwitchToPageById(RacadDesigner.pages[0].id,function(){
                                enableDesignNowButton();
                                jQuery('#udraw-design-online-span').html('Preview now');
                                update_excel_cart_quantity('price matrix', false, function(){
                                    return;
                                });
                            });
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            },
            start: function (e) {
                jQuery('#udraw-options-file-upload-progress').show();
                jQuery('.udraw-progress-bar > span').css('width', '0%');
                jQuery('.udraw-progress-bar').show();
                disableDesignNowButton();
            },
            send: function (e, data) {
                jQuery('#udraw-options-file-upload-progress').show();
            },
            progressall: function (e, data) {
                var percentage = (data.loaded / data.total) * 100;
                jQuery('.udraw-progress-bar > span').animate({ width: percentage +'%' }, 500);
            },
            stop: function (e, data) {
                jQuery('.udraw-progress-bar').hide();
            }
        });
    });

    <?php if ( ($_udraw_settings['show_customer_preview_before_adding_to_cart']) && (strlen($_cart_item_key) == 0) ) { ?>
    jQuery('#udraw-options-submit-form-btn').on('click', function (evt) {
        window.onbeforeunload = function (e) { };

        evt.preventDefault();
        jQuery('.variations_form').hide();
        jQuery('#udraw-options-actions-btn-table').hide();

        // Update the UI to go Fullscreen mode
        __display_full_screen_ui(true);
        
        if (uploadedFiles.length > 0) {
            if (uploadedFiles[0].url.endsWith('.pdf')) {
                jQuery('#udraw-preview-upload-placeholer').html("<iframe src='<?php echo wp_make_link_relative(UDRAW_PLUGIN_URL) ?>/assets/pdfjs/web/viewer.php?ps=no&file=" + uploadedFiles[0].url + "' style='width:100%; min-height: 475px;' allowfullscreen webkitallowfullscreen></iframe>");
                jQuery('#udraw-upload-preview-div').show();
                evt.preventDefault();
                return false;
            } else {
                if (uploadedFiles[0].url.endsWith('.jpeg') || uploadedFiles[0].url.endsWith('.jpg') || uploadedFiles[0].url.endsWith('.gif') || uploadedFiles[0].url.endsWith('.png')) {
                    jQuery('#udraw-preview-upload-placeholer').html('<img src="' + uploadedFiles[0].url + '" style="max-width:100%; box-shadow: rgba(0,0,0,0.5) 0 0 10px;" />');

                    jQuery('#udraw-upload-preview-div').show();
                    evt.preventDefault();
                    return false;
                } else {
                    jQuery('.variations_form').first().submit();
                }
            }
        } else {
            jQuery('.variations_form').first().submit();
        }
    });

    <?php } ?>

    jQuery('#udraw-preview-back-to-options-btn').click(function () {
        jQuery('.variations_form').show();
        jQuery('#udraw-options-actions-btn-table').show();
        jQuery('#udraw-preview-upload-placeholer').empty();
        jQuery('#udraw-upload-preview-div').hide();
        
        __restore_options_ui();
    });

    jQuery('#udraw-preview-approve-btn').click(function () {
        if (jQuery('.variations_form').length > 0) {
            jQuery('.variations_form').first().submit();
        } else {
            jQuery('.cart').submit();
        }        
    });

    jQuery('#udraw-options-page-design-btn').click(function () {
        // Update the UI to go Fullscreen mode
        __display_full_screen_ui();


        <?php if (isset($isBlockProduct) && $isBlockProduct) { ?>
        jQuery('#pdf-block-product-ui').fadeIn();
        jQuery('.product').fadeOut();
        <?php } else { ?>
            

        //check for multi templates and shows the selection
            if (typeof templateCount != 'undefined' && templateCount > 1) {
                //jQuery('#udraw-design-now').hide();
                //jQuery('#udraw-bootstrap').hide();
                //jQuery('.images').hide();
                jQuery('#multi_template_display').show();
                //jQuery('.summary.entry-summary').hide();
                jQuery('#multi_template_display_btn').show();
            } else {
                // Show the designer
                //jQuery('#udraw-display-options-ui').fadeOut();
                jQuery('#udraw-bootstrap').fadeIn();
                jQuery('html,body').animate({ scrollTop: jQuery('#udraw-bootstrap').offset().top - 120 }, 700);

                //jQuery('#multi_template_display').hide();
                //jQuery('#multi_template_display_btn').hide();
        }
        <?php } ?>
    });

    jQuery('#udraw-options-page-upload-btn').click(function () {
        jQuery('#pdf-conversion-error').hide();
        jQuery('#fileupload').click();
    });
    
    jQuery('#udraw-generate-structure-file-btn').click(function(){
        jQuery('#structure-file-container').show();
        jQuery(this).hide();
        var pagesArray = new Array();
        for (var i =0; i < RacadDesigner.pages.length; i++) {
            pagesArray.push(JSON.parse(RacadDesigner.pages[i].JSON).racad_properties.layerVariables);
        }
        jQuery('#udraw-structure-form-input input[name="pages"]').val(JSON.stringify(pagesArray));
    });
    
    jQuery('#udraw-upload-structure-file-btn').click(function(){
        jQuery('#udraw-structure-file-upload').trigger('click');
    });
    
    if (typeof String.prototype.endsWith !== 'function') {
        String.prototype.endsWith = function (suffix) {
            return this.indexOf(suffix, this.length - suffix.length) !== -1;
        };
    }
</script>
<style>
    table.upload_table {
        border: 1px solid #ccc;
        width: 100%;
    }
    table.upload_table th, table.upload_table td {
        padding: 5px;
        vertical-align: middle;
    }
    table.upload_table tr:not(:last-child) th, table.upload_table tr:not(:last-child) td {
        border-bottom: 1px solid #ccc;
    }
    table.upload_table th:not(:last-child), table.upload_table td:not(:last-child) {
        border-right: 1px solid #ccc;
        width: 25%;
    }
    table.upload_table th:last-child, table.upload_table td:last-child {
        width: 70%;
    }
    #udraw-options-page-upload-btn.disabled {
        pointer-events: none;
        cursor: no-drop;
        background: #ccc;
    }
    div.filename_div {
        width: 100%;
        border: 1px solid #ccc;
    }
    div.filename_div div.list_handler {
        background: #eee;
        padding: 5px;
        display: inline-block;
        vertical-align: top;
    }
    a.remove_btn {
        margin: 5px;
    }
    div.filename_div div.content_div {
        width: 90%;
        display: inline-block;
    }
</style>