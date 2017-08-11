<?php

include_once(UDRAW_PLUGIN_DIR . '/designer/designer-header-init.php');
$udrawSettings = new uDrawSettings();
$_udraw_settings = $udrawSettings->get_settings();
$load_frontend_navigation = true;

?>
<script>
    window.carousel_override = true;
</script>
<div id="designer-wrapper">
    <div id="udraw-bootstrap" data-udraw="uDrawBootstrap" style="display:none;">
        <?php include_once(UDRAW_PLUGIN_DIR . '/designer/bootstrap-fullscreen/designer-template-wrapper.php'); ?>

        <div id="udraw-preview-ui" style="display:none; padding-left:30px;">
            <div class="row" style="padding-bottom:15px;">
                <button class="btn button btn-primary" id="udraw-preview-back-to-design-btn"><strong>&nbsp;Back to Update Design</strong></button>
                <button class="btn button btn-primary" id="udraw-preview-add-to-cart-btn"><strong>Approve &amp; Add to Cart&nbsp;></strong></button>
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
    <?php echo $_udraw_settings['udraw_designer_css_hook']; ?>
    div#designer-wrapper {
        left: 0px;
        position: fixed;
        top: -9999px;
        padding-top: 5%;
        background: #fff;
    }
    @media only screen and (min-height: 980px) {
        div#designer-wrapper {
            padding-top: 15%;
        }
    }
</style>

<script>
    jQuery(document).ready(function () {
        jQuery('div.entry-summary form.cart div.quantity input').css('width', '5em');
        <?php echo $_udraw_settings['udraw_designer_js_hook']; ?>
    });

    __load_extra_functions = function () {
        jQuery('#udraw-options-page-design-btn').fadeIn();
        jQuery('#udraw-options-page-design-btn').click(function(){ RacadDesigner.update_pages_section_height(); });
    }
</script>
