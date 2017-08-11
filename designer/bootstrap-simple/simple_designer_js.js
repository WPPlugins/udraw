(function ($) {
    RacadDesigner.mobile = {
        resizeDesigner: function () {
            fabric.Object.prototype.cornerSize = 12;
            jQuery('h5[data-i18n="[html]text.or"]').parent().css('padding', 0);
            jQuery('.jQimage-upload-btn').parent().css('margin-top', '-5px');
            jQuery('.inner-image-container').css('height', '40%');
            jQuery('#images-list .element-btn').css('padding', '3px');
        }
    }

    RacadDesigner.updateModalSideBar = function () {
        return;
    }
    
    RacadDesigner.togglePages = function () {
        return;
    }

    RacadDesigner.moveFloatToolbar = function (object) {
        var coords = RacadDesigner.canvas.getAbsoluteCoords(object, jQuery('.float-toolbar'));
        var objectBoundingbox = object.getBoundingRect();
        jQuery('.float-toolbar').css('left', coords.left + ((jQuery('.float-toolbar').width() / 2) - (objectBoundingbox.width / 2)));
        jQuery('.float-toolbar').css('top', coords.top + objectBoundingbox.height + 15);
    }
    RacadDesigner.canvas.on("object:selected", function (object) {
        var activeObject = object.target;
        if ((activeObject && activeObject.hasOwnProperty('racad_properties') && activeObject.racad_properties.isLabelled) || activeObject.type == 'group'){
            $('[data-udraw="textArea"]').hide();
        } else {
            $('[data-udraw="textArea"]').show();
        }
        jQuery('[data-udraw="designerColourContainer"]').show();
        if (activeObject.type == 'i-text' || activeObject.type == 'text' || activeObject.type == 'group' || activeObject.type == 'textbox') {
            jQuery('#text-toolbox').show()
        } else {
            jQuery('#text-toolbox').hide();
        }
        if (activeObject.type == 'image') {
            jQuery('[data-udraw="replaceImage"]').show();
            jQuery('[data-udraw="designerColourContainer"]').hide();
        } else {
            jQuery('[data-udraw="replaceImage"]').hide();
        }
        if (activeObject.type == 'path-group') {
            jQuery('[data-udraw="designerColourContainer"]').hide();
        }
        if (activeObject.type === 'text' || activeObject.type === 'i-text' || activeObject.type === 'textbox') {
            jQuery('li.element-btn a.text').trigger('click');
        } else {
            jQuery('li.element-btn a.layers').trigger('click');
        }
        
        RacadDesigner.moveFloatToolbar(activeObject);
        jQuery('.float-toolbar').show();
    });
    RacadDesigner.canvas.on("object:modified", function (object) {
        var activeObject = object.target;
        RacadDesigner.moveFloatToolbar(activeObject);
    });
    RacadDesigner.canvas.on("object:added", function (object) {
        var activeObject = object.target;
        RacadDesigner.moveFloatToolbar(activeObject);
        jQuery('.float-toolbar').show();
    });
    RacadDesigner.canvas.on("object:moving", function (object) {
        var activeObject = object.target;
        RacadDesigner.moveFloatToolbar(activeObject);
    });
    RacadDesigner.canvas.on("object:rotating", function (object) {
        var activeObject = object.target;
        RacadDesigner.moveFloatToolbar(activeObject);
    });
    RacadDesigner.canvas.on("object:scaling", function (object) {
        var activeObject = object.target;
        RacadDesigner.moveFloatToolbar(activeObject);
    });
    RacadDesigner.canvas.on("selection:cleared", function (object) {
        jQuery('.float-toolbar').hide();
    });

    var oldupdateuielements = RacadDesigner.UpdateUIElements;
    RacadDesigner.UpdateUIElements = function () {
        oldupdateuielements();
        var activeObject = RacadDesigner.canvas.getActiveObject();
        var activeGroup = RacadDesigner.canvas.getActiveGroup();
        if (activeObject) {
            if (activeObject.type == 'i-text' || activeObject.type == 'text' || activeObject.type == 'textbox' || (activeObject.type == 'group' && activeObject.hasOwnProperty('racad_properties') && activeObject.racad_properties.isAdvancedText) || activeGroup) {
                RacadDesigner.Text.UpdateFontStylesUI();
            }
        }
    }
    jQuery('#copy-paste-btn').click(function () {
        RacadDesigner.copyObject();
        RacadDesigner.pasteObject();
    });
    jQuery('[data-udraw="toolboxClose"]').click(function () {
        jQuery(this).parent().modal('hide');
    });
    var oldAlignObjects = RacadDesigner.Align.AlignObjects;
    RacadDesigner.Align.AlignObjects = function (alignment) {
        oldAlignObjects(alignment);
        var object = RacadDesigner.canvas.getActiveObject();
        if (RacadDesigner.canvas.getActiveGroup()) {
            object =  RacadDesigner.canvas.getActiveGroup();
        }
        if (object != null) {
            RacadDesigner.moveFloatToolbar(object);
        }
    }
    jQuery('#udraw-bootstrap').on('udraw-image-collection-loaded', function (event) {
        var subDirectory = event.subDirectory;
        var categoryContainer = event.categoryContainer;
        if (categoryContainer == '[data-udraw="uDrawClipartFolderContainer"]' && subDirectory.length > 0) {
            jQuery('[data-udraw="uDrawClipartFolderContainer"]').hide();
        }
    });
    jQuery('[data-udraw="layerLabelsModal"]').on("focus", "textarea.labelLayersInput", function () {
        jQuery('[data-udraw="textArea"').hide();
        var label_name = jQuery(this).attr('id').replace('-input', '');
        var labelled_objects = new Array();
        RacadDesigner.canvas.getObjects().forEach(function(object){
            if (object.hasOwnProperty('racad_properties') && object.racad_properties.isLabelled == label_name) {
                labelled_objects.push(object);
            }
        });
        if (labelled_objects.length > 0) {
            var top_array = new Array();
            for (var i = 0; i < labelled_objects.length; i++) {
                top_array.push(labelled_objects[i].top);
            }
            var lowest_top = Math.max.apply(null, top_array);
            var lowest_object = labelled_objects[0];
            for (var j = 0; j < labelled_objects.length; j++) {
                if (labelled_objects[j].top == lowest_top) {
                    lowest_object = labelled_objects[j];
                    break;
                }
            }
            RacadDesigner.moveFloatToolbar(lowest_object);
            jQuery('.float-toolbar').show();
        }
    })
    RacadDesigner.changeDisplayOrientation = function (direction) {
        if (direction == 'rtl') {
            $('div[data-udraw="uDrawBootstrap"]').css({
                'direction': direction,
                'text-align': 'right'
            });
            $('#udraw-bootstrap .input-group input.form-control:first-child').css({
                'border-top-left-radius': 0,
                'border-bottom-left-radius': 0,
                'border-top-right-radius': '4px',
                'border-bottom-right-radius': '4px'
            });
            $('#udraw-bootstrap span.input-group-addon:last-child').css({
                'border-top-left-radius': '4px',
                'border-bottom-left-radius': '4px',
                'border-top-right-radius': 0,
                'border-bottom-right-radius': 0,
                'border-right': 0,
                'border-left': '1px solid #ccc'
            });
            $('#udraw-bootstrap .modal').css('text-align', 'right');
            $('[data-udraw="versionContainer"], .modal-header-btn-container').css('float', 'left');
            $('.dropdown-menu').css('text-align', 'right');
            $('ul.left-dropdown').each(function(){
                $(this).removeClass('left-dropdown').addClass('right-dropdown');
            });
            $('input[name="product-size"]').next().css('unicode-bidi', 'bidi-override');
            $('.dropdown-menu:not(.right-dropdown)').css('right', 0);
        }
    }
    RacadDesigner.center_designer = function($) {
        var table_width = $('[data-udraw="canvasWrapper"] table').width();
        var container_width = $('[data-udraw="canvasContainer"]').width();
        var margin = (container_width - table_width) / 2;
        if (margin < 0) { margin = 0; }
        $('[data-udraw="canvasWrapper"]').css('margin-left', margin + 'px');
    }
    jQuery('[data-udraw="uDrawBootstrap"]').on('udraw-canvas-scaled', function(){
        RacadDesigner.center_designer(jQuery);
    });
    $('li.element-btn').on('click', function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        var _type = $('a', this).attr('class');
        $('div.elements-container').children().each(function(){
            $(this).removeClass('active');
            if ($(this).hasClass(_type)) {
                $(this).addClass('active');
            }
        });
    });
    
    $(window).resize(function(){
        if ($('div.element-panel').is(':visible')) {
            $('[data-udraw="canvasContainer"]').css('width', 'calc(99% - ' + $('div.element-panel').width() + 'px)');
            RacadDesigner.center_designer($);
        }
    }).trigger('resize');
    $('button#udraw-options-page-design-btn').on('click', function(){
        $(window).trigger('resize');
    });
    $('[data-udraw="uDrawBootstrap"]').on('udraw-loaded-design', function(){
        $(window).trigger('resize'); 
    });
})(window.jQuery);