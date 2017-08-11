<!-- Designer Top Navigation -->
<div id="designer-menu" data-udraw="designerMenu">
    <!-- File -->
    <div class="btn-group" id="file-group" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.menu">
        <button id="file-btn" class="btn btn-primary btn-sm dropdown-toggle designer-menu-btn" type="button" data-toggle="dropdown">
            <i class="fa fa-file-text-o"></i>&nbsp;<span>uDraw</span>&nbsp;<span class="caret"></span>
        </button>
        <ul id="file-dropdown" class="dropdown-menu" role="menu">
            <li role="presentation">
                <a role="menuitem" href="#" id="udraw-save-design-btn"><i class="fa fa-floppy-o"></i>&nbsp;<span data-i18n="[html]common_label.save"></span></a>
            </li>
            <!--load up a save-->
            <li role="presentation">
                <a role="menuitem" href="#" id="load-design-btn" data-udraw="loadButton"><i class="fa fa-folder-open-o"></i>&nbsp;<span data-i18n="[html]menu_label.open-xml"></span></a>
                <div id="file-selector" hidden><input type="file" name="uploadFile" id="uploadFile" data-udraw="loadFile" /></div>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="document-properties-btn" data-udraw="settingsButton"><i class="fa fa-wrench"></i>&nbsp;<span data-i18n="[html]menu_label.settings"></span></a>
            </li>
        </ul>
    </div>
    <!-- END FILE -->
    <!-- Pages and Layers-->
    <div class="btn-group" id="pages-layers-group" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.view">
        <button id="page-btn" class="btn btn-primary btn-sm dropdown-toggle designer-menu-btn" type="button" data-toggle="dropdown">
            <i class="fa fa-list"></i>&nbsp;<span data-i18n="[html]menu_label.view"></span>&nbsp;<span class="caret"></span>
        </button>
        <ul class="dropdown-menu" id="viewdrop-down" role="menu">
            <li role="presentation">
                <a role="menuitem" href="#" id="dropdown-pages-link" data-udraw="togglePages"><i class="fa fa-file-text-o"></i>&nbsp;<span data-i18n="[html]common_label.pages"></span></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="dropdown-layers-link" data-udraw="toggleLayers"><i class="fa fa-bars"></i>&nbsp;<span data-i18n="[html]common_label.layers"></span></a>
            </li>
            <?php if ($_udraw_settings['designer_disable_image_filters']) { ?>
            <li role="presentation">
                <a role="menuitem" href="#" id="dropdown-image-properties-link" data-udraw="toggleImageFilters"><i class="fa fa-image"></i>&nbsp;<span data-i18n="[html]menu_label.image-properties"></span></a>
            </li>
            <?php } ?>
            <li role="presentation">
                <a role="menuitem" href="#" id="dropdown-show-boundingbox" data-udraw="boundingBox"><i class="fa fa-square-o"></i>&nbsp;<span data-i18n="[html]menu_label.bounding-box"></span></a>
            </li>
            <?php if ($_udraw_settings['udraw_designer_enable_threed']) { ?>
            <li role="presentation">
                <a role="menuitem" href="#" id="dropdown-threed-settings-link" data-udraw="toggleThreedSettings"><i class="fa fa-cube"></i>&nbsp;<span data-i18n="[html]menu_label.threed-box"></span></a>
            </li>
            <?php } ?>
            <li role="presentation">
                <a role="menuitem" href="#" id="dropdown-ruler-link" data-udraw="toggleRuler"><img src="<?php echo UDRAW_DESIGNER_IMG_PATH; ?>ruler.png" style="margin-top: -3px;" />&nbsp;<span data-i18n="[html]menu_label.ruler"></span></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="dropdown-snap-to-grid-link" data-udraw="snapToGrid">
                <input type="checkbox" id="snap-to-grid-checkbox" data-udraw="snapCheckbox">&nbsp;<span data-i18n="[html]menu_label.snap-to-grid"></span>
                </a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="dropdown-display-grid-link" data-udraw="toggleGridLines">
                <input type="checkbox" id="toggle-grid-checkbox" data-udraw="gridCheckbox">&nbsp;<span data-i18n="[html]menu_label.toggle-grid"></span>
                </a>
            </li>
        </ul>
    </div>
    <!-- End Pages and layers-->
    <!-- Templates -->
    <div class="btn-group" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.templates">
        <button id="template-menu" class="btn btn-primary btn-sm dropdown-toggle designer-menu-btn" type="button" data-toggle="dropdown">
            <i class=""></i>&nbsp;<span data-i18n="[html]menu_label.templates"></span>&nbsp;<span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li role="presentation"><a role="menuitem" href="#" id="private-template-browser-btn" data-udraw="browsePrivateTemplate"><i class="fa fa-file"></i>&nbsp;<span data-i18n="[html]menu_label.private-templates"></span></a></li>
            <?php if (uDraw::is_udraw_okay()) { ?>
                <li role="presentation"><a role="menuitem" href="#" id="template-browser-btn" data-udraw="browseTemplate"><i class="fa fa-file"></i>&nbsp;<span data-i18n="[html]menu_label.udraw-templates"></span></a></li>
            <?php } ?>
        </ul>
    </div>
    <!-- END Templates -->
    <!--Tutorials-->
    <div class="btn-group" id="tutorials-group" style="display:none;">
        <button id="tutorials-btn" class="btn btn-primary btn-sm dropdown-toggle designer-menu-btn" type="button" data-toggle="dropdown">
            <i class=""></i>&nbsp;<span data-i18n="[html]menu_label.tutorials"></span>&nbsp;<span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li role="presentation" style="background-color: lightgoldenrodyellow">
                <a role="menuitem" href="#" id="begin-designer-tour" type="button"><i class="fa fa-edit"></i>&nbsp;<span>uDraw Designer Tour</span></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="begin-brochure-tour" type="button"><i class="fa fa-columns"></i>&nbsp;<span>Create a Brochure</span></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="begin-card-tour" type="button"><i class="fa fa-newspaper-o"></i>&nbsp;<span>Create a Business Card</span></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="begin-envelope-tour" type="button"><i class="fa fa-envelope-o"></i>&nbsp;<span>Create an Envelope</span></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="begin-flyer-tour" type="button"><i class="fa fa-file-text-o"></i>&nbsp;<span>Create a Flyer</span></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="begin-greetcard-tour" type="button"><i class="fa fa-columns"></i>&nbsp;<span>Create a Greetings Card</span></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="begin-letter-tour" type="button"><i class="fa fa-file-text-o"></i>&nbsp;<span>Create a Letter head</span></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="begin-postcard-tour" type="button"><i class="fa fa-square-o"></i>&nbsp;<span>Create a Postcard</span></a>
            </li>
            <li role="presentation">
                <a role="menuitem" href="#" id="begin-banner-tour" type="button"><i class="fa fa-flag-o"></i>&nbsp;<span>Create a Banner</span></a>
            </li>
        </ul>
    </div>
    <!--END Tutorials-->
    <!--Zoom Control-->
    <div id="zoom-container" style="width:220px" data-udraw="zoomContainer">
        <span id="scale-canvas-slider-label" data-i18n="[html]text.zoom" style="width: 100px" data-udraw="zoomDisplay"></span>
        <div id="scale-canvas-slider" data-toggle="tooltip-top" data-i18n="[data-original-title]tooltip.zoom-bar" data-udraw="zoomLevel"></div>
    </div>
    <!--End Zoom Control-->
    <!-- Version Number -->
    <div id="version-number-container" data-udraw="versionContainer">
        <button id="full-screen" type="button" class="btn btn-success btn-sm"><i id="full-screen-icon" class="fa fa-expand"></i>&nbsp;<span data-i18n="[html]button_label.full-screen"></span></button>
        <span class="small" id="racad-designer-version" data-udraw="designerVersion"></span>
    </div>
    <!-- END Version Number -->
    <!-- END Menu Bar-->       
</div>