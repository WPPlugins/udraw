<?php
$uDraw = new uDraw();
$templateId = $uDraw->get_udraw_template_ids($post->ID);

if (count($templateId) > 1) {
    $uDrawTemplate = new uDrawTemplates();
    $templates = implode(",", $templateId);
    $multiTemplates = $uDrawTemplate->get_templates_id($templates);
?>
<style>
    .template_display_item{
        display:inline-block;
        border: 1px solid #C193EC;
        margin-bottom: 10px;
        margin-right: 10px;
    }
    .template_display_item img {
    -webkit-transition: all 0.5s ease; /* Safari and Chrome */
    -moz-transition: all 0.5s ease; /* Firefox */
    -ms-transition: all 0.5s ease; /* IE 9 */
    -o-transition: all 0.5s ease; /* Opera */
    transition: all 0.5s ease;
    }

    .template_display_item:hover img {
        -webkit-transform:scale(1.15); /* Safari and Chrome */
        -moz-transform:scale(1.15); /* Firefox */
        -ms-transform:scale(1.15); /* IE 9 */
        -o-transform:scale(1.15); /* Opera */
         transform:scale(1.15);
    }
    div.multi_template_container{
        display:none;
        z-index: 9999;
        position: fixed;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        padding: 10%;
        background: rgba(0,0,0,0.5);
    }
</style>
<div class="multi_template_container">
    <div>
        <span style="font-size: 20px; color: #fff;"><?php _e('Please select a template', 'udraw'); ?></span>
    </div>
    <?php if ($displayOptionsFirst) { ?>
    <button id="multi_template_display_btn" type="button" class="button btn-primary" style="display:none;" >Back to Options</button>
    <?php } ?>
    <div id="multi_template_display" class="row" style="margin-top: 15px;" >
        <?php foreach($multiTemplates as $template) { ?>
        <div class="col-md-4 template_display_item">
            <a href="#" class="udraw_multitemplate" onclick="displayDesigner('<?= $template->design ?>')"><img style="max-width:300px" src="<?= $template->preview ?>"/></a>
        </div>
        <?php } ?>
    </div>
</div>
<?php      
}
?>