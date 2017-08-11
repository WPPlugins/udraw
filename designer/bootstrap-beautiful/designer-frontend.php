<?php

include_once(UDRAW_PLUGIN_DIR . '/designer/designer-header-init.php');
$udrawSettings = new uDrawSettings();
$_udraw_settings = $udrawSettings->get_settings();
$load_frontend_navigation = true;

?>
<div id="designer-wrapper">
    <div id="udraw-bootstrap" data-udraw="uDrawBootstrap" style="display:none;">
        <?php include_once(UDRAW_PLUGIN_DIR . '/designer/bootstrap-beautiful/designer-template-wrapper.php'); ?>

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
    <input type="hidden" name="udraw_save_access_key" value="<?php if (isset($_GET['udraw_access_key'])) { echo $_GET['udraw_access_key']; } ?>" />
    <input type="hidden" name="udraw_is_saving_for_later" value="1" />
    <?php wp_nonce_field('save_udraw_customer_design'); ?>
</form>
<?php include_once(UDRAW_PLUGIN_DIR . '/designer/multi-udraw-templates.php'); ?>

<style>
    .darkroom-container div ul li button {
        font-size: 1.7em;
    }
    
    #udraw-bootstrap btn {
        text-transform: none;
    }
</style>

<?php include_once(UDRAW_PLUGIN_DIR . '/designer/designer-template-script.php'); ?>

<style type="text/css">
    @media only screen and (max-width: 767px) {
        body div#wrapper {
            overflow: auto;
        }
    }
    <?php echo $_udraw_settings['udraw_designer_css_hook']; ?>
</style>

<?php if ($_udraw_settings['designer_skin_theme'] == 'sleekBlack') { ?>
<style type="text/css">
    #udraw-bootstrap div#udraw-main-designer-ui [data-udraw="designerMenu"] form > span, #udraw-bootstrap div#udraw-main-designer-ui [data-udraw="designerMenu"] [data-udraw="zoomDisplay"], #udraw-bootstrap div#udraw-main-designer-ui [data-udraw="designerMenu"] [data-udraw="versionContainer"] > span, #udraw-bootstrap div#udraw-main-designer-ui [data-udraw="designerMenu"] [data-udraw="fontHeightContainer"] span, #udraw-bootstrap div#udraw-main-designer-ui [data-udraw="designerFooter"] [data-udraw="pagesContainer"] label {
        color: #E1E1E1;
    }
    #udraw-bootstrap div#udraw-main-designer-ui div.designer-body {
        background: linear-gradient(#383838, #C0C0C0, #383838);
        background: -webkit-linear-gradient(#383838, #C0C0C0, #383838); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#383838, #C0C0C0, #383838); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#383838, #C0C0C0, #383838); /* For Firefox 3.6 to 15 */
    }
    #udraw-bootstrap div#udraw-main-designer-ui [data-udraw="designerMenu"], #udraw-bootstrap div#udraw-main-designer-ui div .button-shadow {
        background: linear-gradient(#9F9F9F, #000000);
        background: -webkit-linear-gradient(#9F9F9F, #000000); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#9F9F9F, #000000); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#9F9F9F, #000000); /* For Firefox 3.6 to 15 */
    }
    #udraw-bootstrap div#udraw-main-designer-ui .designer-side-toolbar {
        background: linear-gradient(#000000, #9F9F9F, #000000);
        background: -webkit-linear-gradient(#000000, #9F9F9F, #000000); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#000000, #9F9F9F, #000000); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#000000, #9F9F9F, #000000); /* For Firefox 3.6 to 15 */
    }
    #udraw-bootstrap div#udraw-main-designer-ui [data-udraw="designerFooter"] {
        background: linear-gradient(#000000, #9F9F9F);
        background: -webkit-linear-gradient(#000000, #9F9F9F); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#000000, #9F9F9F); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#000000, #9F9F9F); /* For Firefox 3.6 to 15 */
    }
    #udraw-bootstrap div#udraw-main-designer-ui div .button-shadow {
        color: #E1E1E1;
        border-top: 1px solid #E1E1E1;
        border-left: 1px solid #E1E1E1;
        border-bottom: 1px solid #000000;
        border-right: 1px solid #000000;
    }
    #udraw-bootstrap div#udraw-main-designer-ui div .button-shadow.active {
        color: #E1E1E1;
        background-image: none;
        border-bottom: 1px solid #E1E1E1;
        border-right: 1px solid #E1E1E1;
        border-top: 1px solid #000000;
        border-left: 1px solid #000000;
    }
</style>
<?php } else if ($_udraw_settings['designer_skin_theme'] == 'icyBlue') { ?>
<style type="text/css">
    #udraw-bootstrap div#udraw-main-designer-ui div.designer-body {
        background: linear-gradient(#D1E9FF, #EAF5FF, #D1E9FF);
        background: -webkit-linear-gradient(#D1E9FF, #EAF5FF, #D1E9FF); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#D1E9FF, #EAF5FF, #D1E9FF); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#D1E9FF, #EAF5FF, #D1E9FF); /* For Firefox 3.6 to 15 */
    }
    #udraw-bootstrap div#udraw-main-designer-ui [data-udraw="designerMenu"], #udraw-bootstrap div#udraw-main-designer-ui div .button-shadow {
        background: linear-gradient(#EAF5FF, #B5DCFF);
        background: -webkit-linear-gradient(#EAF5FF, #B5DCFF); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#EAF5FF, #B5DCFF); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#EAF5FF, #B5DCFF); /* For Firefox 3.6 to 15 */
    }
    #udraw-bootstrap div#udraw-main-designer-ui .designer-side-toolbar {
        background: linear-gradient(#B5DCFF, #EAF5FF, #B5DCFF);
        background: -webkit-linear-gradient(#B5DCFF, #EAF5FF, #B5DCFF); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#B5DCFF, #EAF5FF, #B5DCFF); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#B5DCFF, #EAF5FF, #B5DCFF); /* For Firefox 3.6 to 15 */
    }
    #udraw-bootstrap div#udraw-main-designer-ui [data-udraw="designerFooter"] {
        background: linear-gradient(#B5DCFF, #EAF5FF);
        background: -webkit-linear-gradient(#B5DCFF, #EAF5FF); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#B5DCFF, #EAF5FF); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#B5DCFF, #EAF5FF); /* For Firefox 3.6 to 15 */
    }
    #udraw-bootstrap div#udraw-main-designer-ui div .button-shadow {
        border-top: 1px solid #EAF5FF;
        border-left: 1px solid #EAF5FF;
        border-bottom: 1px solid #B5DCFF;
        border-right: 1px solid #B5DCFF;
    }
    #udraw-bootstrap div#udraw-main-designer-ui div .button-shadow.active {
        background-image: none;
        border-bottom: 1px solid #EAF5FF;
        border-right: 1px solid #EAF5FF;
        border-top: 1px solid #B5DCFF;
        border-left: 1px solid #B5DCFF;
    }
</style>
<?php } ?>

<script>
    jQuery(document).ready(function () {
        <?php echo $_udraw_settings['udraw_designer_js_hook']; ?>
        jQuery('div.entry-summary form.cart div.quantity input').css('width', '5em');
       __load_extra_functions = function(){
           jQuery(window).resize(function () {
                RacadDesigner.Ruler.drawRuler();
            });
            var oldDrawRuler = RacadDesigner.Ruler.drawRuler;
            RacadDesigner.Ruler.drawRuler = function () {
                oldDrawRuler();
                //calculate padding needed: (canvas-container width/2) - (canvas width/2)
                var paddingWidth = (jQuery('[data-udraw="canvasContainer"]').width() / 2) - (jQuery('[data-udraw="canvasWrapper"]').width() / 2);
                if (RacadDesigner.settings.displayOrientation == 'ltr') {
                    jQuery('#top-ruler-container').css('padding-left', 27);
                    jQuery('#side-ruler-container').css('padding-left', 0);
                    jQuery('#racad-designer').css('padding-left', 2);
                    if (paddingWidth >= 27) {
                        jQuery('#top-ruler-container').css('padding-left', paddingWidth);
                        jQuery('#side-ruler-container').css('padding-left', paddingWidth - 27);
                        jQuery('[data-udraw="canvasWrapper"]').css('padding-left', 27);
                    }
                } else if (RacadDesigner.settings.displayOrientation == 'rtl') {
                    jQuery('#top-ruler-container').css('padding-right', 27);
                    jQuery('#side-ruler-container').css('padding-right', 0);
                    jQuery('#racad-designer').css('padding-right', 2);
                    if (paddingWidth >= 27) {
                        jQuery('#top-ruler-container').css('padding-right', paddingWidth);
                        jQuery('#side-ruler-container').css('padding-right', paddingWidth - 27);
                        jQuery('[data-udraw="canvasWrapper"]').css('padding-right', 27);
                    }
                }
            }
            jQuery('[data-udraw="canvasContainer"]').css('height', '100%');
            jQuery('#designer-wrapper').height(jQuery('#udraw-main-designer-ui').height());
           jQuery('#udraw-design-now, #udraw-options-page-design-btn').fadeIn();
        }
    });
</script>
