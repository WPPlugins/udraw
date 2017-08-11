<?php

include_once(UDRAW_PLUGIN_DIR . '/designer/designer-header-init.php');
$udrawSettings = new uDrawSettings();
$_udraw_settings = $udrawSettings->get_settings();
$load_frontend_navigation = true;

?>
<div id="designer-wrapper" style="min-height:0vh;">
    <div id="udraw-bootstrap" style="<?php if ($displayOptionsFirst) { echo "display:none;"; } ?>">
        <?php include_once(UDRAW_PLUGIN_DIR . '/designer/bootstrap-apparel/designer-template-wrapper.php'); ?>

        <div id="udraw-preview-ui" style="display:none; padding-left:30px;">
            <div class="row" style="padding-bottom:15px;">
                <a href="#" class="btn btn-danger" id="udraw-preview-back-to-design-btn"><strong>Back to Update Design</strong></a>
                <a href="#" class="btn btn-success" id="udraw-preview-add-to-cart-btn"><strong>Approve &amp; Add to Cart</strong></a>
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
    <input type="hidden" name="udraw_save_access_key" value="<?php echo $_GET['udraw_access_key']; ?>" />
    <input type="hidden" name="udraw_is_saving_for_later" value="1" />
    <?php wp_nonce_field('save_udraw_customer_design'); ?>
</form>

<?php include_once(UDRAW_PLUGIN_DIR . '/designer/designer-template-script.php'); ?>

<style type="text/css">
    <?php echo $_udraw_settings['udraw_designer_css_hook']; ?>
</style>

<script>
    jQuery(document).ready(function ($) {
        <?php echo $_udraw_settings['udraw_designer_js_hook']; ?>
        jQuery('div.entry-summary form.cart div.quantity input').css('width', '5em');
        $("#accordion").accordion({
            heightStyle: "content",
            collapsible: true,
            active: false,
            icons: { "header": "ui-icon-triangle-1-s", "activeHeader": "ui-icon-triangle-1-n" }
        });
        $('#udraw-design-now, #udraw-options-page-design-btn').click(function(){
            //Get chosen apparel quantity after clicking 'Design now' button and insert it into quantity number pickers in Designer
            $('div#rside').hide();
            $('div.relatedp').hide();
            $('#input-s-quantity').val($('#s_qty_input').val());
            $('#input-m-quantity').val($('#m_qty_input').val());
            $('#input-l-quantity').val($('#l_qty_input').val());
            $('#input-xl-quantity').val($('#xl_qty_input').val());
            $('#input-xxl-quantity').val($('#xxl_qty_input').val());
            //Hide quantity number picker in Designer if size was disabled
            if ($('#s_qty_input').css('display') == 'none') {
                $('#s-quantity-entry').children().css('display', 'none', 'cursor', 'default');
            }
            if ($('#m_qty_input').css('display') == 'none') {
                $('#m-quantity-entry').children().css('display', 'none', 'cursor', 'default');
            }
            if ($('#l_qty_input').css('display') == 'none') {
                $('#l-quantity-entry').children().css('display', 'none', 'cursor', 'default');
            }
            if ($('#xl_qty_input').css('display') == 'none') {
                $('#xl-quantity-entry').children().css('display', 'none', 'cursor', 'default');
            }
            if ($('#xxl_qty_input').css('display') == 'none') {
                $('#xxl-quantity-entry').children().css('display', 'none', 'cursor', 'default');
            }
        });
        $('#ua-ud-continue-btn').click(function(){
            if ($('div#rside').length > 0) {
                $('div#rside').show();
            }
            if ($('div.relatedp').length > 0 ) {
                $('div.relatedp').show();
            }
            $('#s_qty_input').val(parseInt($('#input-s-quantity').val()));
            $('#m_qty_input').val(parseInt($('#input-m-quantity').val()));
            $('#l_qty_input').val(parseInt($('#input-l-quantity').val()));
            $('#xl_qty_input').val(parseInt($('#input-xl-quantity').val()));
            $('#xxl_qty_input').val(parseInt($('#input-xxl-quantity').val()));
        });
        
        __load_extra_functions = function () {
            RacadDesigner.canvas.backgroundColor = 'rgba(0,0,0,0)';
            jQuery('#refresh-object-btn').click(function () {
                var toRemove = new Array();
                RacadDesigner.canvas.getObjects().forEach(function (object) {
                    if (object.type == 'bleed' || object.type == 'cropmarks' || object.type == 'grid' || object.hasOwnProperty('racad_properties') && (object.racad_properties.type == 'bounding_box' || object.racad_properties.isApparelBackground || object.racad_properties.graphicFile)) {
                        return;
                    }
                    toRemove.push(object);
                });
                for (var i = 0; i < toRemove.length; i++) {
                    var object = RacadDesigner.GetObjectById(toRemove[i].racad_properties._id);
                    object.remove();
                }
                RacadDesigner.ReloadObjects();
            });
            if (RacadDesigner.settings.language == 'he') {
                jQuery('#udraw-bootstrap').css({
                    'direction': 'rtl',
                    'text-align': 'right'
                });
                jQuery('#udraw-bootstrap').find('.input-group').addClass('right-input-group').removeClass('input-group');
                jQuery('#udraw-bootstrap').find('.input-group-addon').addClass('right-input-group-addon').removeClass('input-group-addon');
                jQuery('#udraw-bootstrap').find('.toolbox-modal').addClass('left-toolbox-modal').removeClass('toolbox-modal');
                jQuery('.modal-header-btn-container, #no-effect-text-btn, #hide-clip-image-container, #close-rotation-slider-btn, #close-rectangle-corner-rounder-btn, #close-scaling-slider-btn, [data-udraw="searchOpenClipartContainer"]').css('float', 'left');
                jQuery('#udraw-bootstrap .row').css('margin-right', '0px');
                jQuery('[data-udraw="versionContainer"], [data-udraw="qrPreviewContainer"], .modal .modal-header [data-dismiss="modal"]').css('float', 'left');
                jQuery('#settings-display-grid, #settings-display-crop, .restriction-span-class, .disable-span-class').css('margin-right', '20px');
                jQuery('#udraw-bootstrap .dropdown-menu').css('left', '-110px;');
                jQuery('#text-accordion-box, #quantity-accordion-box, #shirt-size-accordion-box').css('direction', 'ltr', 'text-align', 'left');
                jQuery('#text-accordion-box').find('.right-input-group').addClass('input-group').removeClass('right-input-group');
                jQuery('#text-accordion-box').find('.right-input-group-addon').addClass('input-group-addon').removeClass('right-input-group-addon');
                jQuery('#designer-pages-content, #apparel-bottom-container, [data-udraw="objectAlignContainer"], #apparel-tool-bar, [data-udraw="clipartFolderList"], [data-udraw="apparelGraphicsCategoryPath"]').css('direction', 'ltr');
                jQuery('#apparel-tool-bar').css('text-align', 'right');
                jQuery('#move-clip-image-right').css({
                    'margin-left': '0px',
                    'margin-right': '-73px'
                });
                jQuery('#move-clip-image-up').css({
                    'margin-left': '0px',
                    'margin-right': '30px'
                });
                jQuery('#move-clip-image-down').css({
                    'margin-left': '0px',
                    'margin-right': '30px'
                });
                jQuery('#move-clip-image-left').css({
                    'margin-left': '0px',
                    'margin-right': '55px'
                });
                RacadDesigner.designerElements.canvasContainer.css({
                    'padding-right' : '0px'
                });
                jQuery('#pricing-cart-div').css({
                    'margin-top': '0px',
                    'margin-left': '0px'
                });
                RacadDesigner.pagesContainer.container.css({
                    'margin-left': '0px',
                    'position': 'initial'
                });
            }
            jQuery('[data-udraw="canvasContainer"]').css('max-width', jQuery('#udraw-bootstrap').width() - jQuery('#accordion-resizer').width() - 25);
            jQuery('[data-udraw="canvasContainer"]').css('min-width', jQuery('#udraw-bootstrap').width() - jQuery('#accordion-resizer').width() - 25);
        
            if (typeof isUpdateCart != 'undefined') {
                if (isUpdateCart) {
                    jQuery('button#udraw-options-submit-form-btn').hide();
                }
            }
            RacadDesigner.ReloadObjects();
        }
    });
</script>
