<?php

include_once(UDRAW_PLUGIN_DIR . '/designer/designer-header-init.php');
$udrawSettings = new uDrawSettings();
$_udraw_settings = $udrawSettings->get_settings();
$load_frontend_navigation = true;

$displayOptionsFirst = get_post_meta($post->ID, '_udraw_display_options_page_first', true);

$_cart_item_key = '';
// uDraw param for cart item key value
if (isset($_GET['cart_item_key'])) { $_cart_item_key = $_GET['cart_item_key']; }
// support for other plugin that uses diff. name than uDraw
if (isset($_GET['tm_cart_item_key'])) { $_cart_item_key = $_GET['tm_cart_item_key']; }

?>

<div id="udraw-bootstrap" style="margin-top: 15px; margin-left: 15px;<?php if ($displayOptionsFirst) { echo "display:none;"; } ?>">
    <div style="float:right; margin-top:-38px">
        <?php if ( (wp_get_current_user()->ID > 0) && ($_udraw_settings['udraw_customer_saved_design_page_id'] > 1) ) { ?>
            <?php if (strlen($_cart_item_key) == 0) { ?>
            <a href="#" class="btn btn-primary btn-sm" id="udraw-save-later-design-btn"><i class="fa fa-floppy-o" style="font-size:2em;"></i>&nbsp;&nbsp;&nbsp;<span style="font-size:14pt;">Save Design</span></a>
            <?php } ?>
        <?php } ?>
        <?php            
            if ($displayOptionsFirst) {
                ?>
                <span class="udraw-top-buttons-span">
                    <a href="#" class="btn btn-default btn-sm" id="show-udraw-display-options-ui-btn"><i class="fa fa-chevron-left" style="font-size:1em;"></i><span style="font-size:14pt;">&nbsp;&nbsp;&nbsp;Back to Options</span></a>
                    <a href="#" class="btn btn-success btn-sm" onclick="javascript:__finalize_add_to_cart();"><span style="font-size:14pt;">Next&nbsp;&nbsp;&nbsp;</span><i class="fa fa-chevron-right" style="font-size:2em;"></i></a>
                </span>
                <?php
            } else {
                if ($_udraw_settings['improved_display_options']) {
                    ?>
                    <a href="#" class="btn btn-success btn-sm" id="udraw-next-step-1-btn"><span style="font-size:14pt;" id="udraw-next-step-1-btn-label">Next Step</span>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right" style="font-size:2em;"></i></a>
                    <?php
                }
                
                if (!$_udraw_settings['improved_display_options'] && $_udraw_settings['split_variations_2_step']) {
                    ?>
                    <a href="#" class="btn btn-default btn-sm" id="udraw-variations-step-0-btn" style="display:none;"><span style="font-size:14pt;" id="udraw-variations-step-0-btn-label"><i class="fa fa-chevron-left" style="font-size:1em;"></i>&nbsp;&nbsp;&nbsp;Back to Design</span></a>         
                    <a href="#" class="btn btn-success btn-sm" id="udraw-variations-step-1-btn"><span style="font-size:14pt;" id="udraw-variations-step-1-btn-label">Next Step</span>&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right" style="font-size:2em;"></i></a>
                    <?php
                }
            }
        ?>

    </div>

    <?php include_once(UDRAW_PLUGIN_DIR . '/designer/bootstrap-classic/designer-template-wrapper.php'); ?>

    <div id="udraw-preview-ui" style="display:none; padding-left:30px;">
        <div class="row" style="padding-bottom:15px;">
            <a href="#" class="btn btn-danger" id="udraw-preview-back-to-design-btn"><strong>Back to Design</strong></a>
            <a href="#" class="btn btn-success" id="udraw-preview-add-to-cart-btn"><strong>Approve &amp; Continue</strong></a>
        </div>
        <div class="row" id="udraw-preview-design-placeholer">
        </div>
    </div>
    
    <?php include_once(UDRAW_PLUGIN_DIR . '/designer/designer-template-dialogs.php'); ?>
</div>

<form method="POST" action="" name="udraw_save_later_form" id="udraw_save_later">
    <input type="hidden" name="udraw_save_product_data" value="" />
    <input type="hidden" name="udraw_save_product_preview" value="" />
    <input type="hidden" name="udraw_save_post_id" value="<?php echo $post->ID ?>" />
    <input type="hidden" name="udraw_save_access_key" value="<?php echo $_GET['udraw_access_key']; ?>" />
    <input type="hidden" name="udraw_is_saving_for_later" value="1" />
    <?php wp_nonce_field('save_udraw_customer_design'); ?>
</form>

<style>
    .darkroom-container div ul li button {
        font-size: 1.7em;
    }
    
    #udraw-bootstrap btn {
        text-transform: none;
    }

    #racad-designer {
        display: none;
        padding: 10px !important;
    }
</style>

<?php include_once(UDRAW_PLUGIN_DIR . '/designer/designer-template-script.php'); ?>
