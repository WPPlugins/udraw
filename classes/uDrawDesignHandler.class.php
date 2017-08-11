<?php
/**
 * DesignHandler for uDraw Designer
 *
 * This will handle all server requests from uDraw Designer.
 *
 * @version 1.0
 * @author Amram Bentolila
 */

if (!class_exists('uDrawDesignHandler')) {
    class uDrawDesignHandler extends uDrawAjaxBase {
        
        function __construct() { }
        
        function init_actions() {
            add_action( 'wp_ajax_udraw_designer_local_fonts_list', array(&$this,'local_fonts_list') );
            add_action( 'wp_ajax_udraw_designer_local_fonts_css', array(&$this,'local_fonts_css') );
            add_action( 'wp_ajax_udraw_designer_local_fonts_css_base64', array(&$this,'local_fonts_css_base64') );
            add_action( 'wp_ajax_udraw_designer_remove_font', array(&$this,'remove_font') );
            add_action( 'wp_ajax_udraw_designer_upload', array(&$this,'upload') );
            add_action( 'wp_ajax_udraw_designer_save', array(&$this,'save') );
            add_action( 'wp_ajax_udraw_designer_save_page_data', array(&$this,'save_page_data') );
            add_action( 'wp_ajax_udraw_designer_compile_design_data', array(&$this,'compile_design_data') );
            add_action( 'wp_ajax_udraw_designer_finalize', array(&$this,'finalize') );
            add_action( 'wp_ajax_udraw_designer_export_pdf', array(&$this,'export_pdf') );
            add_action( 'wp_ajax_udraw_designer_rebuild_order_pdf', array(&$this,'rebuild_pdf') );
            add_action( 'wp_ajax_udraw_designer_asset', array(&$this,'asset') );
            add_action( 'wp_ajax_udraw_designer_local_images', array(&$this,'local_images') );
            add_action( 'wp_ajax_udraw_designer_remove_image', array(&$this,'remove_image') );
            add_action( 'wp_ajax_udraw_designer_local_patterns', array(&$this,'local_patterns') );
            add_action( 'wp_ajax_udraw_designer_upload_patterns', array(&$this,'upload_patterns') );
            add_action( 'wp_ajax_udraw_designer_convert_pdf', array(&$this, 'convert_pdf') );
            add_action( 'wp_ajax_udraw_designer_generate_structure_file', array(&$this, 'generate_structure_file') );
            add_action( 'wp_ajax_udraw_designer_structure_file_upload', array(&$this, 'structure_file_upload') );
            add_action( 'wp_ajax_udraw_designer_read_excel_file', array(&$this, 'read_excel_file') );
            add_action( 'wp_ajax_udraw_generate_excel_designs', array(&$this, 'generate_excel_designs') );
            add_action( 'wp_ajax_udraw_convert_xml_to_pdf', array(&$this, 'convert_xml_to_pdf') );
            add_action( 'wp_ajax_udraw_empty_target_folder', array(&$this, 'empty_target_folder') );
            add_action( 'wp_ajax_udraw_download_pdf_from_server', array(&$this, 'download_pdf_from_server') );
            add_action( 'wp_ajax_udraw_package_excel_designs', array(&$this, 'package_excel_designs') );
            add_action( 'wp_ajax_udraw_designer_create_translation_file', array(&$this, 'create_translation_file') );
            add_action( 'wp_ajax_udraw_designer_retrieve_translation_file_contents', array(&$this, 'retrieve_translation_file_contents') );
            add_action( 'wp_ajax_udraw_designer_edit_translation_file', array(&$this, 'edit_translation_file') );
            add_action( 'wp_ajax_udraw_designer_update_translation_files', array(&$this, 'update_translation_files') );
            //Instagram
            add_action( 'wp_ajax_udraw_designer_authenticate_instagram', array(&$this, 'authenticate_instagram') );
            add_action( 'wp_ajax_udraw_designer_retrieve_instagram', array(&$this, 'retrieve_instagram') );
            //Flickr
            add_action( 'wp_ajax_udraw_designer_authenticate_flickr', array(&$this, 'authenticate_flickr') );
            add_action( 'wp_ajax_udraw_designer_flickr_access_token', array(&$this, 'flickr_access_token') );
            add_action( 'wp_ajax_udraw_designer_flickr_get', array(&$this, 'flickr_get') );
            //Creating xml
            add_action( 'wp_ajax_udraw_designer_create_product_xml_pages', array(&$this, 'create_product_xml_pages') );
            add_action( 'wp_ajax_udraw_designer_retrieve_page_xml_files', array(&$this, 'retrieve_page_xml_files') );
            add_action( 'wp_ajax_udraw_designer_retrieve_merged_xml', array(&$this, 'retrieve_merged_xml') );
            add_action( 'wp_ajax_udraw_designer_create_page_xml', array(&$this, 'create_page_xml') );
            add_action( 'wp_ajax_udraw_designer_create_merged_xml', array(&$this, 'create_merged_xml') );
            add_action( 'wp_ajax_udraw_designer_remove_xml_files', array(&$this, 'remove_xml_files') );
            
            add_action( 'wp_ajax_nopriv_udraw_designer_local_fonts_list', array(&$this,'local_fonts_list') );
            add_action( 'wp_ajax_nopriv_udraw_designer_local_fonts_css', array(&$this,'local_fonts_css') );
            add_action( 'wp_ajax_nopriv_udraw_designer_local_fonts_css_base64', array(&$this,'local_fonts_css_base64') );
            add_action( 'wp_ajax_nopriv_udraw_designer_upload', array(&$this,'upload') );
            add_action( 'wp_ajax_nopriv_udraw_designer_save', array(&$this,'save') );
            add_action( 'wp_ajax_nopriv_udraw_designer_save_page_data', array(&$this,'save_page_data') );
            add_action( 'wp_ajax_nopriv_udraw_designer_compile_design_data', array(&$this,'compile_design_data') );
            add_action( 'wp_ajax_nopriv_udraw_designer_export_pdf', array(&$this,'export_pdf') );
            add_action( 'wp_ajax_nopriv_udraw_designer_asset', array(&$this,'asset') );
            add_action( 'wp_ajax_nopriv_udraw_designer_local_images', array(&$this,'local_images') );
            add_action( 'wp_ajax_nopriv_udraw_designer_remove_image', array(&$this,'remove_image') );
            add_action( 'wp_ajax_nopriv_udraw_designer_local_patterns', array(&$this,'local_patterns') );
            add_action( 'wp_ajax_nopriv_udraw_designer_upload_patterns', array(&$this,'upload_patterns') );
            add_action( 'wp_ajax_nopriv_udraw_designer_convert_pdf', array(&$this, 'convert_pdf') );
            add_action( 'wp_ajax_nopriv_udraw_designer_generate_structure_file', array(&$this, 'generate_structure_file') );
            add_action( 'wp_ajax_nopriv_udraw_designer_structure_file_upload', array(&$this, 'structure_file_upload') );
            add_action( 'wp_ajax_nopriv_udraw_designer_read_excel_file', array(&$this, 'read_excel_file') );
            add_action( 'wp_ajax_nopriv_udraw_generate_excel_designs', array(&$this, 'generate_excel_designs') );
            add_action( 'wp_ajax_nopriv_udraw_convert_xml_to_pdf', array(&$this, 'convert_xml_to_pdf') );
            //Instagram
            add_action( 'wp_ajax_nopriv_udraw_designer_authenticate_instagram', array(&$this, 'authenticate_instagram') );
            add_action( 'wp_ajax_nopriv_udraw_designer_retrieve_instagram', array(&$this, 'retrieve_instagram') );
            //Flickr
            add_action( 'wp_ajax_nopriv_udraw_designer_authenticate_flickr', array(&$this, 'authenticate_flickr') );
            add_action( 'wp_ajax_nopriv_udraw_designer_flickr_access_token', array(&$this, 'flickr_access_token') );
            add_action( 'wp_ajax_nopriv_udraw_designer_flickr_get', array(&$this, 'flickr_get') );
            //Creating xml
            add_action( 'wp_ajax_nopriv_udraw_designer_create_product_xml_pages', array(&$this, 'create_product_xml_pages') );
            add_action( 'wp_ajax_nopriv_udraw_designer_retrieve_page_xml_files', array(&$this, 'retrieve_page_xml_files') );
            add_action( 'wp_ajax_nopriv_udraw_designer_retrieve_merged_xml', array(&$this, 'retrieve_merged_xml') );
            add_action( 'wp_ajax_nopriv_udraw_designer_create_page_xml', array(&$this, 'create_page_xml') );
            add_action( 'wp_ajax_nopriv_udraw_designer_create_merged_xml', array(&$this, 'create_merged_xml') );
            add_action( 'wp_ajax_nopriv_udraw_designer_remove_xml_files', array(&$this, 'remove_xml_files') );
        }
        
        function local_fonts_list() {
            $this->sendResponse($this->__process_fonts());
        }
        
        function local_fonts_css() 
        {
            $localFonts = $this->__process_fonts();
            if (gettype($localFonts) == 'string') { return $this->sendResponse(""); }
            
            $css = "";
            foreach ($localFonts as $fonts) {
                $css .= "@font-face { " . PHP_EOL;
                $css .= "font-family: '". $fonts->name ."';". PHP_EOL;
                $css .= "font-style: normal;". PHP_EOL;
                $css .= "font-weight: 400;". PHP_EOL;
                $css .= "src: url('". $fonts->path ."') format('woff');". PHP_EOL;
                $css .= "}". PHP_EOL;
            }
            
            header('Content-Type: text/css');
            echo $css;
            wp_die();
        }
        
        function local_fonts_css_base64()
        {
            $localFonts = $this->__process_fonts();
            if (gettype($localFonts) == 'string') { return $this->sendResponse(""); }
            
            $css = "";
            foreach ($localFonts as $fonts) {
                $base64Font = fread(fopen($fonts->sysPath, "r"), $fonts->fileSize);
                $css .= "@font-face { " . PHP_EOL;
                $css .= "font-family: '". $fonts->name ."';". PHP_EOL;
                $css .= "src: url('data:application/font-woff;charset=utf-8;base64,".  base64_encode($base64Font) ."') format('woff');". PHP_EOL;
                $css .= "}". PHP_EOL;
            }
            
            header('Content-Type: text/css');
            echo $css;
            wp_die();
        }
        
        function remove_font() {
            if (isset($_REQUEST['font_name'])) {    
                if (file_exists(UDRAW_FONTS_DIR . $_REQUEST['font_name'] . ".woff") || file_exists(UDRAW_FONTS_DIR . $_REQUEST['font_name'] . ".WOFF") ) {
                    if (current_user_can('delete_udraw_fonts')) {
                        if (file_exists(UDRAW_FONTS_DIR . $_REQUEST['font_name'] . ".woff")) {
                            unlink(UDRAW_FONTS_DIR . $_REQUEST['font_name'] . ".woff");
                            return $this->sendResponse(true);
                        } else {
                            unlink(UDRAW_FONTS_DIR . $_REQUEST['font_name'] . ".WOFF");
                            return $this->sendResponse(true);
                        }                        
                    }
                }
            }
            
            return $this->sendResponse(false);
        }
        
        function upload() {
            $assetPath = $_REQUEST['assetPath'];
            $this->__process_upload($assetPath);
            wp_die();
        }
        
        function save() {
            $this->__process_save(false);
            wp_die();
        }
        
        function finalize() {
            $this->__process_save(true);
            wp_die();
        }
        
        function export_pdf() {
            $uDrawUtil = new uDrawUtil();
            $uDraw = new uDraw();
            
            $assetPath = $_REQUEST['assetPath'];
            if (strlen($assetPath) == 0) { echo "false"; return;}
            $assetDir = $uDraw->get_physical_path($assetPath);
            
            $assetBaseURL = $this->getBaseURL();
            
            // Convert Width/Height pixels to Inches.
            $width = $_REQUEST['w'] / 72;
            $height = $_REQUEST['h'] / 72;
            $ratio = 1;
            if (isset($_REQUEST['ratio'])) {
                $ratio = $_REQUEST['ratio'];
            }
            
            $pdf_file = uniqid('udraw_') . '.pdf';
            
            $data = array(
                'document' => $_REQUEST['design'],
                'width' => $width,
                'height' => $height,
                'action' => 'convert',
                'type' => 'udrawsvg',
                'ratio' => $ratio,
                'pagesInfo' => $_REQUEST['pagesInfo']
            );            

            $pdfContent = $uDrawUtil->get_web_contents('https://udraw-server.w2pstore.com/convert.php', http_build_query($data));
            file_put_contents($assetDir . '/'. $pdf_file, $pdfContent);
            
            echo json_encode($assetBaseURL . $assetPath . '/'. $pdf_file);
            
            wp_die();
        }
        
        function rebuild_pdf() {
            $uDraw = new uDraw();
            if (isset($_REQUEST['order_id'])) {
                $uDraw->generate_pdf_from_order($_REQUEST['order_id'], true);
            }
            echo json_encode('okay');
            
            wp_die();
        }
        
        function asset() {
            $extension = "";
            $contentType = "";
            $asset = stripslashes($_REQUEST['asset']);
            $assetPathInfo = pathinfo($asset);
            $assetFile = basename($asset);
            $isExternalRequest = false;
            
            // Facebook Params
            $oe = ""; $__gda__ = "";
            if (isset($_REQUEST['oe'])) { $oe = $_REQUEST['oe']; }
            if (isset($_REQUEST['__gda__'])) { $__gda__ = $_REQUEST['__gda__']; }

            if ($this->endsWith(strtolower($asset), "jpg")) { $extension = "jpg"; $contentType = "image/jpeg"; }
            if ($this->endsWith(strtolower($asset), "jpeg")) { $extension = "jpg"; $contentType = "image/jpeg"; }                
            if ($this->endsWith(strtolower($asset), "png")) { $extension = "png"; $contentType = "image/png"; }
            if ($this->endsWith(strtolower($asset), "svg")) { $extension = "svg"; $contentType = "image/svg+xml"; }
            if ($this->endsWith(strtolower($asset), "gif")) { $extension = "gif"; $contentType = "image/gif"; }
            if ($this->endsWith(strtolower($asset), "xml")) { $extension = "xml"; $contentType = "application/xml"; }
            if ($this->endsWith(strtolower($asset), "eps")) { $extension = "eps"; $contentType = "application/eps"; }
            if ($this->endsWith(strtolower($asset), "pdf")) { $extension = "pdf"; $contentType = "application/pdf"; }
            if ($this->endsWith(strtolower($asset), "ps")) { $extension = "ps"; $contentType = "application/ps"; }
            if ($this->endsWith(strtolower($asset), "tiff")) { $extension = "tiff"; $contentType = "application/tiff"; }                                  
            if (strpos($asset, '?') !== false && $contentType == "") {
                $isExternalRequest = true;
                $extension = "jpg"; $contentType = "application/octet-stream";
            }            
            
            // Return nothing if content type isn't found. We only want to accept certain type of files.
            if ($contentType == "") { echo "invalid"; return; }            
            
            if (!$this->startsWith(strtolower($asset), "http")) {
                $protocol = UDRAW_SYSTEM_WEB_PROTOCOL;                
                $assetFile = rawurldecode($assetFile);
                while ( (strpos($assetFile, '%25') !== false) || (strpos($assetFile, '%2F') !== false) ) {
                    $assetFile = rawurldecode($assetFile);
                }

                $dirname = $assetPathInfo['dirname'];
                if ($dirname === '.') { $dirname = ""; }
                
                $asset = $protocol . $_SERVER['HTTP_HOST'] . $dirname . '/'. $assetFile;
            } else {
                $asset = rawurldecode($asset);
                while ( (strpos($asset, '%25') !== false) || (strpos($asset, '%2F') !== false) ) {
                    $asset = rawurldecode($asset);
                }
            }                       
            // Facebook params
            if ($oe != null)
            {
                // Adding the parameters back into the url so that the image can be downloaded
                $asset .= "&oe=" . $oe;
            }
            
            // Facebook Param
            if ($__gda__ != null)
            {
                $asset .= "&__gda__=" . $__gda__;
            }

            if (!$isExternalRequest) {
                // Stript name out of url
                $assetParts = explode('/', $asset);
                $assetFile = $assetParts[count($assetParts)-1];
                $asset = str_replace($assetFile, '',$asset);

                // URL encode name
                $is_encoded = preg_match('~%[0-9A-F]{2}~i', $assetFile);
                if (!$is_encoded) {
                    $assetFile = urlencode($assetFile);
                }

                // Inject URL encoded name back to asset.
                $asset = $asset . $assetFile;
            }
                                                
            // Create tempfile
            $tmp_fp = tmpfile();
            
            // Download asset and store to tempfile pointer
            $uDrawUtil = new uDrawUtil();
            $local_asset = $_SERVER['DOCUMENT_ROOT'] . parse_url($asset)['path'];
            if (is_file($local_asset)) { 
                // Update URL incase this asset was moved from server to server.
                $asset = UDRAW_SYSTEM_WEB_PROTOCOL . $_SERVER['HTTP_HOST'] . parse_url($asset)['path'];
            }
            
            $tmp_fp = $uDrawUtil->download_file_with_pointer($asset, $tmp_fp);
           
            // Send tempfile out to browser and close the pointer which removes the tempfile.
            ob_end_clean();
            $tmp_fp_stat = fstat($tmp_fp);
            // put pointer back at the start
            ob_end_clean();
            if (count(ob_get_status(true)) > 0 ) {
                ob_clean(); // Clean (erase) the output buffer
            }
            rewind($tmp_fp);
            header('Content-Type: '. $contentType);
            header("Content-Length: " . $tmp_fp_stat['size']);
            fpassthru($tmp_fp);
            fclose($tmp_fp);
            
            wp_die();
        }
        
        function local_images() {
            $localImagePath = $_REQUEST['localImagePath'];
            $this->__process_images($localImagePath, true);
            wp_die();
        }
        
        function remove_image() {
            ob_end_clean();
            ob_end_clean();
            if (count(ob_get_status(true)) > 0 ) {
                ob_clean(); // Clean (erase) the output buffer
            }
            $uDraw = new uDraw();
            $file = stripslashes($uDraw->get_physical_path(substr($_REQUEST['filePath'], 1, strlen($_REQUEST['filePath']))));
            $_asset_path = "_UNSET_";
            if (is_user_logged_in()) {
                $_asset_path = UDRAW_STORAGE_DIR . wp_get_current_user()->user_login . '/assets/';
            } else {
                if (!session_id()) {
                    session_start();
                }
                $_asset_path = UDRAW_STORAGE_DIR .'_'. session_id() .'_/assets/';
            }

            if (strpos($file, $_asset_path) !== false) {
                if (is_file($file)) {
                    $ext = strtolower( pathinfo($file, PATHINFO_EXTENSION) );
                    if ($ext == 'svg' || $ext == 'png' || $ext == 'pdf' || $ext == 'jpeg' || $ext == 'tif' || $ext == 'jpg' || $ext == 'gif') {
                        unlink($file);
                        $this->sendResponse(true);
                    }
                }
            }
                        
            $this->sendResponse(false);
        }
        
        function local_patterns() {
            $localPatternsPath = $_REQUEST['localPatternsPath'];
            $this->__process_images($localPatternsPath, false);
            wp_die();
        }
        
        function upload_patterns() {
            $patternPath = $_REQUEST['patternPath'];
            $this->__process_upload($patternPath);
            wp_die();
        }
        
        function extract_images_from_design($outputDir, $outputPath, $docname, $xmlStr) {
            // Extract Images from the design and store on file system.
            if (!file_exists($outputDir . '/' . $docname)) {
                wp_mkdir_p($outputDir . '/' . $docname);
            }
            $xmlPreviews = explode('preview="', $xmlStr);
            for ($x = 0; $x < count($xmlPreviews); $x++) {
                if ($this->startsWith($xmlPreviews[$x], "data:image")) {
                    $imgString = substr($xmlPreviews[$x], 0,strpos($xmlPreviews[$x],'"'));
                    $imgData = substr($imgString, strpos($xmlPreviews[$x], ',') + 1);
                    
                    // Now that we have our image data, we'll write it to disk.
                    $page_preview_handle = fopen($outputDir . '/' . $docname . '/' . $x . '.png', "w");
                    fwrite($page_preview_handle, base64_decode($imgData));
                    fclose($page_preview_handle);
                    $xmlStr = str_replace($imgString, $outputPath . '/' . $docname . '/' . $x . '.png', $xmlStr);
                }
            }
            
            return $xmlStr;
        }
        
        function save_page_data() {
            $uDraw = new uDraw();
            try {
                $outputPath = $_REQUEST['outputPath'];
                if (strlen($outputPath) == 0) { echo "false"; return;}
                $outputDir = $uDraw->get_physical_path($outputPath);
                
                $assetPath = $_REQUEST['assetPath'];
                if (strlen($assetPath) == 0) { echo "false"; return;}
                $assetDir = $uDraw->get_physical_path($assetPath);

                $docname = basename($_REQUEST['document'], '.xml'); 
                if (strlen($docname) == 0) { echo "false"; return; }
                
                // Make sure both folders exists.
                if (gettype($assetDir) == 'boolean' || gettype($outputDir) == 'boolean') {
                    echo $this->__generate_callBack("invalid", "invalid", "invalid", "missing folders");
                    return;
                }
                
                // Check to see if page number and data was sent in request.
                if ( !strlen($_REQUEST['pageNo']) > 0 || !strlen($_REQUEST['pageData']) > 0 )  {
                    echo $this->__generate_callBack("invalid", "invalid", "invalid", "No Docs Found");
                }
                
                $pageNo = $_REQUEST['pageNo'];
                $xml = $docname . '_' . $pageNo;                
                
                // Save Page Data
                $xml_handle = fopen($outputDir . '/' . $xml, "w");
                fwrite($xml_handle, base64_decode($_REQUEST['pageData']));
                fclose($xml_handle);
                
                echo "{\"response\": \"ok\"}";
            }
            catch (Exception $e) {
                echo $this->__generate_callBack("invalid", "invalid", "invalid", $e->getMessage());
            } 
            wp_die();
        }
        
        function compile_design_data() {
            $uDraw = new uDraw();
            try {
                $outputPath = $_REQUEST['outputPath'];
                if (strlen($outputPath) == 0) { echo "false"; return;}
                $outputDir = $uDraw->get_physical_path($outputPath);
                
                $assetPath = $_REQUEST['assetPath'];
                if (strlen($assetPath) == 0) { echo "false"; return;}
                $assetDir = $uDraw->get_physical_path($assetPath);
                
                $docname = basename($_REQUEST['document'], '.xml'); 
                if (strlen($docname) == 0) { echo "false"; return; }
                
                // Make sure both folders exists.
                if (gettype($assetDir) == 'boolean' || gettype($outputDir) == 'boolean') {
                    echo $this->__generate_callBack("invalid", "invalid", "invalid", "missing folders");
                    return;
                }
                
                // Check to see xml and preview was sent in request.
                if ( !strlen($_REQUEST['canvasData']) > 0 || !strlen($_REQUEST['previewDoc']) > 0 || !strlen($_REQUEST['pageCount']) > 0 )  {
                    echo $this->__generate_callBack("invalid", "invalid", "invalid", "No Docs Found");
                }                                
                
                $xml = $docname . '.xml';
                $preview = $docname . '.png';
                $pageCount = intval($_REQUEST['pageCount']);
                
                $xmlStr = base64_decode($_REQUEST['canvasData']);
                // compile the design.
                $files_to_delete = [];
                for ($x = 1; $x <= $pageCount; $x++) {
                    if (is_file($outputDir . '/'. $docname .'_'. $x)) {
                        array_push($files_to_delete, $outputDir . '/'. $docname .'_'. $x);
                        $handle = fopen($outputDir . '/'. $docname .'_'. $x, "r") or die("Couldn't get handle");
                        if ($handle) {
                            while (!feof($handle)) {
                                $xmlStr .= fgets($handle, 4096);
                                // Process buffer here..
                            }
                            fclose($handle);
                        }
                    }
                }
                $xmlStr .= '</canvas>';
                // clean up, clean up, everyone do their share! :)
                for ($z = 0; $z < count($files_to_delete); $z++) {
                    if (is_file($files_to_delete[$z])) {
                        unlink($files_to_delete[$z]);
                    }
                }
                
                // Extract Images from the design and store on file system.
                if (!file_exists($outputDir . '/' . $docname)) {
                    mkdir($outputDir . '/' . $docname);
                }
                $xmlPreviews = explode('preview="', $xmlStr);
                for ($x = 0; $x < count($xmlPreviews); $x++) {
                    if ($this->startsWith($xmlPreviews[$x], "data:image")) {
                        $imgString = substr($xmlPreviews[$x], 0,strpos($xmlPreviews[$x],'"'));
                        $imgData = substr($imgString, strpos($xmlPreviews[$x], ',') + 1);
                        
                        // Now that we have our image data, we'll write it to disk.
                        $page_preview_handle = fopen($outputDir . '/' . $docname . '/' . $x . '.png', "w");
                        fwrite($page_preview_handle, base64_decode($imgData));
                        fclose($page_preview_handle);
                        $xmlStr = str_replace($imgString, $outputPath . '/' . $docname . '/' . $x . '.png', $xmlStr);
                    }
                }
                
                // Save XML Document
                $xml_handle = fopen($outputDir . '/' . $xml, "w");
                fwrite($xml_handle, $xmlStr);
                fclose($xml_handle);
                
                // Save Preview Image
                $preview_handle = fopen($outputDir . '/' . $preview, "w");
                fwrite($preview_handle, base64_decode($_REQUEST['previewDoc']));
                fclose($preview_handle);                
                
                echo $this->__generate_callBack("-", $xml, $preview, "-");
            }
            catch (Exception $e) {
                echo $this->__generate_callBack("invalid", "invalid", "invalid", $e->getMessage());
            }
            
            wp_die();
        }
        
        function convert_pdf($key = '', $type = '', $pdf_action = '', $file = '', $pageNo = 1) {
            if (isset($_REQUEST['key']) && isset($_REQUEST['type']) && isset($_REQUEST['action']) && isset($_REQUEST['document'])) {
                $key = $_REQUEST['key'];
                $type = $_REQUEST['type'];
                $pdf_action = $_REQUEST['pdf_action'];
                $file = $_REQUEST['document'];
            }
            $pageNo = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1;

            $uDrawUtil = new uDrawUtil();
            
            if ( ($type == 'png' || $type == 'pdfbw') && $pdf_action == 'convert') {
                $preview_file = uniqid('udraw_') . '.png';
                if ($type == 'pdfbw') {
                    $preview_file = uniqid('udraw_') . '.pdf';
                }
                $uDrawUtil->download_file(UDRAW_CONVERT_URL."key=".$key."&type=".$type."&action=".$pdf_action."&document=".urlencode($file).'&page='.$pageNo,UDRAW_TEMP_UPLOAD_DIR . $preview_file);
                echo UDRAW_TEMP_UPLOAD_URL . $preview_file;
                wp_die();
            } else {
                $output = $uDrawUtil->get_web_contents(UDRAW_CONVERT_URL."key=".$key."&type=".$type."&action=".$pdf_action."&document=".urlencode($file).'&page='.$pageNo);
                
                return $this->sendResponse($output);
            }
        }
        
        function generate_structure_file ($pages = '') {
            if (isset($_REQUEST['pages'])) {
                $pages = json_decode(stripslashes($_REQUEST['pages']));
            } else {
                return $this->sendResponse('fail'); 
            }
            //require PHPexcel
            require_once(UDRAW_PLUGIN_DIR. '/assets/PHPExcel/Classes/PHPExcel.php');
            $excelObj = new PHPExcel();
            $excelObj->getProperties()
                            ->setCreator('user')
                            ->setLastModifiedBy('user')
                            ->setTitle('uDraw Structure Form')
                            ->setSubject('uDraw Structure Form')
                            ->setDescription('uDraw Structure Form')
                            ->setKeywords('uDraw')
                            ->setCategory('uDrawDesigner');
            $excelObj->setActiveSheetIndex(0);
            $worksheet = $excelObj->getActiveSheet();
            $worksheet->setTitle("Instructions");
            $worksheet->SetCellValueByColumnAndRow(0, 1, "1) Download the excel file. Please note that if there are other necessary files, such image files, these will need to be zipped with the excel file later for uploading. You may upload only the excel file if no other files need to be included.");
            $worksheet->SetCellValueByColumnAndRow(0, 2, "We recommend that a new folder is created to store all necessary files in. Please ensure that the excel file will found upon opening the zip file.");
            $worksheet->SetCellValueByColumnAndRow(0, 3, "2) Fill out the file with necessary information, starting with the column immediately to the right of the labels. Each entry will require its own column, and will generate its own design file.");
            $worksheet->SetCellValueByColumnAndRow(0, 4, "Each label will declare what type of design element it is referring to (text / image).");
            $worksheet->SetCellValueByColumnAndRow(0, 5, "Example: ");
            $worksheet->SetCellValueByColumnAndRow(0, 6, "First-name (text) ");
            $worksheet->SetCellValueByColumnAndRow(1, 6, "First entry");
            $worksheet->SetCellValueByColumnAndRow(2, 6, "Second entry");
            $worksheet->SetCellValueByColumnAndRow(0, 7, "Two design files will now be generated when the order is placed: One for 'first entry' and one for 'second entry'.");
            $worksheet->SetCellValueByColumnAndRow(0, 8, "3) If a label is referring to an image, please include the path to the image in the zipped file. Please remove any spaces from the file name, as it may cause errors.");
            $worksheet->SetCellValueByColumnAndRow(0, 9, "Example: ");
            $worksheet->SetCellValueByColumnAndRow(0, 10, "Photo (image) ");
            $worksheet->SetCellValueByColumnAndRow(1, 10, "photo.jpg");
            $worksheet->SetCellValueByColumnAndRow(2, 10, "myImage.png");
            $worksheet->SetCellValueByColumnAndRow(0, 12, "If the images are located in a sub-folder, please include that in the path.");
            $worksheet->SetCellValueByColumnAndRow(0, 13, "Example: ");
            $worksheet->SetCellValueByColumnAndRow(0, 14, "Photo (image) ");
            $worksheet->SetCellValueByColumnAndRow(1, 14, "images/photo.jpg");
            $worksheet->SetCellValueByColumnAndRow(2, 14, "images/myImage.png");
            $worksheet->SetCellValueByColumnAndRow(0, 15, "The following file types are accepted for images: JPEG, PNG, GIF, SVG.");
            $worksheet->SetCellValueByColumnAndRow(0, 16, "4) Each page in the design has its own page in the excel file for labels. Be sure to check through all pages to make sure all entries are filled in.");
            $worksheet->SetCellValueByColumnAndRow(0, 17, "5) After the file have been uploaded, you may preview, modify, and approve the design by clicking the 'Preview' button. Information from the first entry will be automatically filled in for previewing purposes.");
            $worksheet->SetCellValueByColumnAndRow(0, 18, "You may add or modify design elements as you see fit. We don't recommend removing any labelled elements, as it will not appear in any of the entries.");
            $worksheet->SetCellValueByColumnAndRow(0, 19, "6) You may re-upload the file if modifications needed to be made to the excel file or extra images need to be included / removed.");
            $worksheet->SetCellValueByColumnAndRow(0, 20, "Re-uploading a new file will overwrite the pre-existing file.");
            $worksheet->SetCellValueByColumnAndRow(0, 21, "DISCLAIMER: This excel file should not be modified in any way other than entering information, nor should an extra excel file be included. We cannot guarentee that the design files generated from this file will be correct if the structure of this file have been tempered with.");
            $styleArray = array(
                'font' => array(
                    'italic' => true
                )
            );
            $worksheet->getStyle('B6')->applyFromArray($styleArray);
            $worksheet->getStyle('C6')->applyFromArray($styleArray);
            $worksheet->getColumnDimension('A')->setWidth(20);
            $worksheet->getColumnDimension('B')->setWidth(20);
            $worksheet->getColumnDimension('C')->setWidth(20);
            
            for ($i = 0; $i < count($pages); $i++) {
                $rowNum = 1;
                $worksheet = $excelObj->createSheet($i);
                $worksheet->setTitle("Page " . ($i + 1));
                for ($j = 0; $j < count($pages[$i]); $j++) {
                    if ($pages[$i][$j]->isAssigned) {
                        $worksheet->SetCellValueByColumnAndRow(0, $rowNum, $pages[$i][$j]->name . ' ('. $pages[$i][$j]->type .')');
                        $worksheet->getColumnDimension('A')->setWidth(20);
                        $rowNum++;
                    }
                }
            }
            
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="udraw-structure-form.xlsx"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($excelObj, 'Excel2007');
            $objWriter->save('php://output');
            exit;
        }
        
        function structure_file_upload () {
            $uDrawUpload = new uDrawUpload();
            $files = array();
            $fileObj = new stdClass();
            
            $_session_id = uniqid();
            $_upload_session_id = 'excel_'.uniqid();
            if (isset($_REQUEST['session']) && isset($_REQUEST['uploadsession'])) {
                $_session_id = $_REQUEST['session'];
                $_upload_session_id = $_REQUEST['uploadsession'];
            }

            // Set both upload folders and url location.
            $upload_dir = UDRAW_TEMP_UPLOAD_DIR . $_session_id . "/" . $_upload_session_id . "/";
            $upload_url = UDRAW_TEMP_UPLOAD_URL . $_session_id . "/" . $_upload_session_id . "/";

            // Create directory if doesn't exist.
            if (!is_dir($upload_dir)) {
                wp_mkdir_p($upload_dir);
            }
            
            // Check file exstension
            $fileName = pathinfo($_FILES['structureFile']['name'], PATHINFO_FILENAME);
            $fileExt = strtolower(pathinfo($_FILES['structureFile']['name'], PATHINFO_EXTENSION));
            
            // New Filename
            $newFile = rand(1, 32) .'_'. str_replace(' ','', $fileName) . '.' . $fileExt;
            $fileObj->name = $newFile;
            
            $validExt = array (
                '7z' => 'application/x-7z-compressed', 'rar' => 'application/x-rar-compressed', 'zip|zipx' => 'application/x-zip-compressed', 'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'csv' => 'text/csv'
            );
            
            $uploaded_files = $uDrawUpload->handle_upload($_FILES['structureFile'], $upload_dir, $upload_url, $validExt);
            
            if (is_array($uploaded_files)) {
                if ( !key_exists('error', $uploaded_files[0]) ) {
                    if($fileExt == "7z" | $fileExt == "rar" | $fileExt == "zip") {
                        $zipDir = $upload_dir . DIRECTORY_SEPARATOR;
                        $zipFile = $uploaded_files[0]["file"];
                        if (file_exists($zipFile)) {
                            $zip = new ZipArchive;
                            $res = $zip->open($zipFile);
                            if ($res === TRUE) {
                                // extract it to the path we determined above
                                if (!is_dir($zipDir)) {
                                    wp_mkdir_p($zipDir);
                                }
                                $zip->extractTo($zipDir);

                                $zip->close();
                                $scanned_directory = $this->dirToArray($zipDir,$upload_url);
                                
                                foreach ($scanned_directory as $key => $value){
                                    if(is_array($value)){
                                        foreach($value as $key2 => $val){
                                            if (is_array($val)) {
                                                foreach($val as $key3 => $val3){
                                                    if($key3==0){
                                                        $fileObj = new stdClass();
                                                        $fileObj->name = basename($val3);
                                                    }
                                                    else if ($key3 == 1) {
                                                        $fileObj->url = $val3;
                                                        $files[] = $fileObj;
                                                    }
                                                }
                                            } else {
                                                if ($key2==0) {
                                                    $fileObj = new stdClass();
                                                    $fileObj->name = basename($val);
                                                } else if($key2==1){
                                                    $fileObj->url = $val;
                                                    $files[] = $fileObj;
                                                }
                                            }
                                        }
                                    }

                                }
                            }
                            unlink($zipFile);
                        }
                    } else {
                        $fileObj->name = basename($uploaded_files[0]['file']);
                        $fileObj->size = filesize($uploaded_files[0]['file']);
                        $fileObj->url = $uploaded_files[0]['url'];
                    }
                } else {
                    $fileObj->error = "Upload Failed";
                }
            } else {
                $fileObj->error = "Upload Failed";
            }
            
            array_push($files, $fileObj);
            $files['uploadSessionID'] = $_upload_session_id;
            echo json_encode($files);
            wp_die();
        }
        
        function read_excel_file ($excel = '', $preview = false) {
            //excel->filename, excel->path, excel->sessionID
            if (isset($_REQUEST['excel'])) {
                $excel = json_decode(stripslashes($_REQUEST['excel']));
            }
            if (isset($_REQUEST['preview'])) {
                $preview = $_REQUEST['preview'];
            }
            $response = $this->__read_excel_file($excel, $preview);
            return $this->sendResponse($response);
        }
        
        function generate_excel_designs ($excel = '', $designdata = '') {
            if (isset($_REQUEST['excel'])) {
                $excel = json_decode(stripslashes($_REQUEST['excel']));
            }
            if (isset($_REQUEST['designdata'])) {
                $designdata = $_REQUEST['designdata'];
            }
            $xmlFiles = array();
            //$excelData = pages->columns->rows
            $designURL = UDRAW_STORAGE_URL . $designdata;
            $designDIR = UDRAW_STORAGE_DIR . $designdata;
            $xml = '';
            if (file_exists($designDIR)) {
                $excelEntries = $this->__get_excel_entries($excel);
                if (!file_exists(UDRAW_STORAGE_DIR . '_designs_/' . $excel->sessionID . '_xml')) {
                    wp_mkdir_p(UDRAW_STORAGE_DIR . '_designs_/' . $excel->sessionID . '_xml');
                }
                //Loop through the entries of the excel file; get fresh xml file contents each time as we will be editing it and saving it as a new file.
                for ($currentEntry = 0; $currentEntry < count($excelEntries); $currentEntry++) {
                    //Open the xml file
                    $xml = simplexml_load_string(base64_decode(file_get_contents($designDIR)));
                    for ($i = 0; $i < count($xml->page); $i++) {
                        $pageObjects =  json_decode(base64_decode($xml->page[$i]->item[0]["json"]));
                        $currentEntryPage = $excelEntries[$currentEntry][$i];
                        //Loop through objects on current page and find the labellled ones
                        for ($j = 0; $j < count($pageObjects->objects); $j++) {
                            if (isset($pageObjects->objects[$j]->racad_properties) && isset($pageObjects->objects[$j]->racad_properties->isLabelled)) {
                                if ($pageObjects->objects[$j]->racad_properties->isLabelled) {
                                    $currentObject = $pageObjects->objects[$j];
                                    $label = $pageObjects->objects[$j]->racad_properties->isLabelled;
                                    
                                    for ($k = 0; $k < count($currentEntryPage); $k++) {
                                        $currentItem = $currentEntryPage[$k];
                                        if (!is_null($currentItem->label)) {
                                            $currentLabel = (strpos($currentItem->label, '(text)') !== false) ? str_replace(' (text)', '', $currentItem->label) : str_replace(' (image)', '', $currentItem->label);
                                            //Find the object in pageJSON data with this label
                                            if ($currentLabel === $label) {
                                                if ($currentObject->type == 'text' || $currentObject->type == 'i-text' || $currentObject->type == 'textbox') {
                                                    $currentObject->text = $currentItem->value;
                                                } else if ($currentObject->type == 'image') {
                                                    $currentObject->src = $currentItem->value;
                                                    $currentObject->racad_properties->isPlaceHolder = false;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $xml->page[$i]->item[0]["json"] = base64_encode(stripcslashes(json_encode($pageObjects)));
                    }
                    $design_file = UDRAW_STORAGE_DIR . '_designs_/' . $excel->sessionID . '_xml/' . $excel->sessionID . '_entry_'.($currentEntry + 1).'.xml';
                    $design_file_url = UDRAW_STORAGE_URL . '_designs_/' . $excel->sessionID . '_xml/' . $excel->sessionID . '_entry_'.($currentEntry + 1).'.xml';
                    //Create the new xml file
                    file_put_contents($design_file, $xml->asXML());
                    array_push($xmlFiles, $design_file);
                }
            }
            return $this->sendResponse($xmlFiles);
        }
        
        public function convert_xml_to_pdf ($data = '', $item_key = 0, $order_id = 0) {
            $uDrawConnect = new uDrawConnect();
            if (isset($_REQUEST['data']) && isset($_REQUEST['item_key']) && isset($_REQUEST['order_id'])) {
                $data = $_REQUEST['data'];
                $item_key = $_REQUEST['item_key'];
                $order_id = $_REQUEST['order_id'];
            }
            if (!file_exists(UDRAW_ORDERS_DIR . 'uDraw-Order-'.$order_id.'-'.$item_key)) {
                wp_mkdir_p(UDRAW_ORDERS_DIR . 'uDraw-Order-'.$order_id.'-'.$item_key);
            }
            $object = (object)array (
                'data' => base64_encode(file_get_contents($data)),
                'key' => $item_key, //item_key == unique item id in order
                'type' => 'designer_excel',
                'preview' => null,
                'xmlFile' => $data,
                'order_id' => $order_id
            );
            $response = $uDrawConnect->__to_pdf(json_encode($object));
            return $this->sendResponse($response);
        }
        
        public function empty_target_folder ($target_dir = '') {
            $uDrawUtil = new uDrawUtil();
            if (!isset($_REQUEST['target_dir'])) { return $this->sendResponse(false); }
            $target_dir = $_REQUEST['target_dir'];
            clearstatcache();
            if (!file_exists($target_dir)) { return $this->sendResponse(true); }
            $uDrawUtil->empty_target_folder($target_dir);
            return $this->sendResponse(true);
        }
        
        public function download_pdf_from_server ($url = '', $destination = '') {
            if (isset($_REQUEST['target_url']) && isset($_REQUEST['destination'])) {
                $url = $_REQUEST['target_url'];
                $destination = json_decode(stripslashes($_REQUEST['destination']));
            }
            $uDrawUtil = new uDrawUtil();
            if (!file_exists($destination->directory)) {
                wp_mkdir_p($destination->directory);
            }
            $des = $destination->directory . $destination->name;
            return $this->sendResponse($uDrawUtil->download_file($url, $des));
        }
        
        public function package_excel_designs($target_dir = '', $destination = '', $overwrite = false) {
            if (isset($_REQUEST['target_dir'])) {
                $target_dir = base64_decode($_REQUEST['target_dir']);
            }
            if (isset($_REQUEST['destination'])) {
                $destination = $_REQUEST['destination'];
            }
            if (isset($_REQUEST['overwrite'])) {
                $overwrite = $_REQUEST['overwrite'];
            }
            //Create an array to store file information in
            $dataArray = array();
            $files = glob($target_dir . '*'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    array_push($dataArray, (object)['directory'=>$file, 'name'=>str_replace($target_dir, '', $file)] );
                }
            }
            $uDrawUtil = new uDrawUtil();
            $this->sendResponse($uDrawUtil->create_zip_file($dataArray, $destination, $overwrite));
        }
        
        public function create_translation_file ($language = '', $display_name = '') {
            if (isset($_REQUEST['language'])) {
                $language = $_REQUEST['language'];
            }
            if (isset($_REQUEST['display_name'])) {
                $display_name = $_REQUEST['display_name'];
            } else {
                $display_name = $language;
            }
            $file_dir = $this->__get_translation_file_location($language)['directory'];
            $file_url = $this->__get_translation_file_location($language)['url'];
            //Using English file as base
            $base_file_dir = $this->__get_translation_file_location('en')['directory'];
            $base_file_contents = $this->__read_translation_file($base_file_dir);
            //Check that this file does not exist first
            if ((!file_exists($file_dir) || file_exists($file_dir) == '') && strlen($language) > 0) {
                $tr = new Stichoza\GoogleTranslate\TranslateClient('en', $language);
                $hasLanguageName = false;
                foreach($base_file_contents as $category=>$categoryValues) {
                    if (gettype($categoryValues) == 'object') {
                        $labelArray = array();
                        $textArray = array();
                        foreach($categoryValues as $key=>$value) {
                            array_push($labelArray, $key);
                            array_push($textArray, $value);
                            if ($key == 'languageName') {
                                $hasLanguageName = true;
                            }
                        }
                        $translatedArray = $tr->translate($textArray);
                        foreach($categoryValues as $key=>$value) {
                            for ($i = 0; $i < count($labelArray); $i++) {
                                if ($key == $labelArray[$i]) {
                                    $newValue = $translatedArray[$i];
                                    $base_file_contents->$category->$key = htmlspecialchars($newValue);
                                }
                            }
                            if ($key == 'languageName') {
                                $hasLanguageName = true;
                            }
                        }
                    } else if (gettype($categoryValues) == 'string') {
                        $newValue = $tr->translate($categoryValues);
                        $base_file_contents->$categoryValues = htmlspecialchars($newValue);
                        if ($categoryValues == 'languageName') {
                            $hasLanguageName = true;
                        }
                    }
                }
                if (!$hasLanguageName) { $base_file_contents->languageName = $display_name; }
                file_put_contents($file_dir, json_encode($base_file_contents));
                $response = $file_url;
            } else {
                $response = false;
            }
            return $this->sendResponse($response);
        }
        
        public function retrieve_translation_file_contents ($language = '') {
            if (isset($_REQUEST['language'])) {
                $language = $_REQUEST['language'];
            }
            $file_dir = $this->__get_translation_file_location($language)['directory'];
            $file_url = $this->__get_translation_file_location($language)['url'];
            return $this->sendResponse($this->__read_translation_file($file_dir));
        }
        
        public function edit_translation_file ($language = '', $editedContents = '') {
            if (isset($_REQUEST['language']) && isset($_REQUEST['file_contents'])) {
                $language = $_REQUEST['language'];
                $editedContents = json_decode(stripcslashes($_REQUEST['file_contents']));
            }
            $file_dir = $this->__get_translation_file_location($language)['directory'];
            $file_url = $this->__get_translation_file_location($language)['url'];
            
            if (!file_exists($file_dir) || file_exists($file_dir) == '') {
                return $this->sendResponse(false);
            }
            foreach($editedContents as $category=>$categoryValues) {
                if (gettype($categoryValues) == 'object') {
                    foreach($categoryValues as $key=>$value) {
                        $newValue = urldecode($value);
                        $editedContents->$category->$key = $newValue;
                    }
                } else if (gettype($categoryValues) == 'string') {
                    $newValue = urldecode($categoryValues);
                    $editedContents->$categoryValues = $newValue;
                }
            }
            file_put_contents($file_dir, json_encode($editedContents));
            return $this->sendResponse($editedContents);
        }
        
        public function update_translation_files () {
            //Get English file
            $base_file_dir = $this->__get_translation_file_location('en')['directory'];
            $base_file_contents = $this->__read_translation_file($base_file_dir);
            //Get all locale files
            $localeDirectory = dir(UDRAW_PLUGIN_DIR.'/designer/includes/locales/');
            $languageDirectory = dir(UDRAW_LANGUAGES_DIR);
            $availableLanguages = array();
            while(false !== $entry = $localeDirectory->read()) {
                if ($entry != '.' && $entry != '..') {
                    $currentLanguage = str_replace(array('udraw-', '.txt'), '', $entry);
                    array_push($availableLanguages, $currentLanguage);
                }
            }
            while(false !== $entry = $languageDirectory->read()) {
                if ($entry != '.' && $entry != '..') {
                    $currentLanguage = str_replace(array('udraw-', '.txt'), '', $entry);
                    array_push($availableLanguages, $currentLanguage);
                }
            }
            foreach ($availableLanguages as $language) {
                $tr = new Stichoza\GoogleTranslate\TranslateClient('en', $language);
                if ($language != 'en') {
                    $current_file_dir = $this->__get_translation_file_location($language)['directory'];
                    $current_file_contents = $this->__read_translation_file($current_file_dir);
                    $needsUpdate = false;
                    //Loop through the base file and check if all tags exist in the translated file, if not, create it and translate the value
                    foreach($base_file_contents as $category=>$categoryValues) {
                        if (gettype($base_file_contents->$category) == 'object') {
                            if (!property_exists($current_file_contents, $category) || property_exists($current_file_contents, $category) == '') {
                                $current_file_contents->$category = new stdClass();
                            }
                            $labelArray = array();
                            $textArray = array();
                            foreach($categoryValues as $key=>$value) {
                                if (!property_exists($current_file_contents->$category, $key) || property_exists($current_file_contents->$category, $key) == '') {
                                    $needsUpdate = true;
                                    array_push($labelArray, $key);
                                    array_push($textArray, $value);
                                }
                            }
                            $translatedArray = $tr->translate($textArray);
                            foreach($categoryValues as $key=>$value) {
                                for ($i = 0; $i < count($labelArray); $i++) {
                                    if ($key == $labelArray[$i]) {
                                        $newValue = $translatedArray[$i];
                                        $current_file_contents->$category->$key = htmlspecialchars($newValue);
                                    }
                                }
                            }
                        } else if (gettype($base_file_contents->$category) == 'string') {
                            if (!property_exists($current_file_contents, $category) || property_exists($current_file_contents, $category) == '') {
                                if ($category == 'languageName') {
                                    $current_file_contents->$category = $language;
                                } else {
                                    $current_file_contents->$category = htmlspecialchars($tr->translate($base_file_contents->$category));
                                }
                            }
                        }
                    }
                    if ($needsUpdate) {
                        file_put_contents($current_file_dir, json_encode($current_file_contents));
                    }
                }
            }
            return $this->sendResponse(true);
        }
        
        public function authenticate_instagram() {
            echo "<script>var access_token = location.hash.replace('#access_token=','');</script>";
            return $this->sendResponse(true);
        }
		
        public function retrieve_instagram() {
            $access_token = (isset($_REQUEST['access_token'])) ? $_REQUEST['access_token'] : '';
            $term = (isset($_REQUEST['term'])) ? $_REQUEST['term'] : '';
            //If there is a search term
            if (strlen($term) > 0) {
                $data = json_decode(file_get_contents('https://api.instagram.com/v1/tags/'.$term.'/media/recent?access_token='.$access_token));
            } else {
                $data = json_decode(file_get_contents('https://api.instagram.com/v1/users/self/media/recent?access_token='.$access_token));
            }
            
            return $this->sendResponse($data);
        }
        
        public function authenticate_flickr() {
            $uDrawSettings = new uDrawSettings();
            $udraw_settings = $uDrawSettings->get_settings();
            //Destroy previous sessions, and start a new one
            if (version_compare(PHP_VERSION, '5.4.0', '<')) {
                if(session_id() !== '') {
                    session_destroy();
                }
            } else {
                if (session_status() !== PHP_SESSION_NONE) {
                    session_destroy();
                }
            }
            session_start();
            $api_key = $udraw_settings['designer_flickr_client_id'];
            $secret = $udraw_settings['designer_flickr_secret_id'];
            $timestamp = time();
            $signature_method = 'HMAC-SHA1';
            $nonce = bin2hex(mt_rand());
            $version = '1.0';
            $callback_url = admin_url('admin-ajax.php') . '?action=udraw_designer_flickr_access_token';

            $secret_key = $secret . '&';

            $oAuth_params = array(
                'oauth_callback' => $callback_url,
                'oauth_consumer_key' => $api_key,
                'oauth_nonce' => $nonce,
                'oauth_signature_method' => $signature_method,
                'oauth_timestamp' => $timestamp,
                'oauth_version' => $version
            );

            $sign_string = base64_encode(hash_hmac('sha1', 'GET&http%3A%2F%2Fwww.flickr.com%2Fservices%2Foauth%2Frequest_token&' . urlencode(http_build_query($oAuth_params)), $secret_key, true));

            $oAuth_params['oauth_signature'] = $sign_string;

            $oauth_callback_string = file_get_contents('http://www.flickr.com/services/oauth/request_token?' . http_build_query($oAuth_params));
            $oauth_callback_array = explode('&', $oauth_callback_string);
            $oauth_token = '';
            $oauth_token_secret = '';
            for ($i = 0; $i < count($oauth_callback_array); $i++) {
                $oauth_callback_array[$i] = explode('=', $oauth_callback_array[$i]);
                if ($oauth_callback_array[$i][0] === "oauth_token") {
                    $oauth_token = $oauth_callback_array[$i][1];
                }
                if ($oauth_callback_array[$i][0] === "oauth_token_secret") {
                    $oauth_token_secret = $oauth_callback_array[$i][1];
                }
            }
            $_SESSION['oauth_token_secret'] = $oauth_token_secret;
            echo json_encode('https://www.flickr.com/services/oauth/authorize?oauth_token=' . $oauth_token . '&perms=read');
        }

        public function flickr_access_token($oauth_token = '', $oauth_verifier = '', $oauth_token_secret = '') {
            $uDrawSettings = new uDrawSettings();
            $udraw_settings = $uDrawSettings->get_settings();
            if (version_compare(PHP_VERSION, '5.4.0', '<')) {
                if(session_id() == '') {
                    session_start();
                }
            } else {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
            }
            if (isset($_GET['oauth_token'])) {
                $oauth_token = $_GET['oauth_token'];
            }
            if (isset($_GET['oauth_verifier'])) {
                $oauth_verifier = $_GET['oauth_verifier'];
            }
            if (isset($_SESSION['oauth_token_secret'])) {
                $oauth_token_secret = $_SESSION['oauth_token_secret'];
            }
            $api_key = $udraw_settings['designer_flickr_client_id'];
            $secret = $udraw_settings['designer_flickr_secret_id'];
            $timestamp = time();
            $signature_method = 'HMAC-SHA1';
            $nonce = bin2hex(mt_rand());
            $version = '1.0';
            $secret_key = $secret . '&' . $oauth_token_secret;
            $oAuth_params = array(
                'oauth_consumer_key' => $api_key,
                'oauth_nonce' => $nonce,
                'oauth_signature_method' => $signature_method,
                'oauth_timestamp' => $timestamp,
                'oauth_token' => $oauth_token,
                'oauth_verifier' => $oauth_verifier,
                'oauth_version' => $version
            );
            $sign_string = base64_encode(hash_hmac('sha1', 'GET&http%3A%2F%2Fwww.flickr.com%2Fservices%2Foauth%2Faccess_token&' . urlencode(http_build_query($oAuth_params)), $secret_key, true));
            $oAuth_params['oauth_signature'] = $sign_string;
            $user_string = file_get_contents('http://www.flickr.com/services/oauth/access_token?' . http_build_query($oAuth_params));
            $user_array = explode('&', $user_string);
            for ($i = 0; $i < count($user_array); $i++) {
                $user_array[$i] = explode('=', $user_array[$i]);
            }
            //echo json_encode($user_array);
            echo '<script>var auth_string = ' . json_encode($user_array) . '; </script>';
            echo '<span style="font-size: 2em; color: green;">Thank you for logging in.</span>';
        }

        public function flickr_get ($oauth_token = '', $oauth_token_secret = '', $method = '', $user_id = '', $photoset_id = '') {
            $uDrawSettings = new uDrawSettings();
            $udraw_settings = $uDrawSettings->get_settings();
            if (isset($_REQUEST['oauth_token'])) {
                $oauth_token = $_REQUEST['oauth_token'];
            }
            if (isset($_REQUEST['oauth_token_secret'])) {
                $oauth_token_secret = $_REQUEST['oauth_token_secret'];
            }
            if (isset($_REQUEST['method'])) {
                $method = $_REQUEST['method'];
            }
            if (isset($_REQUEST['user_id'])) {
                $user_id = $_REQUEST['user_id'];
            }
            if (isset($_REQUEST['photoset_id'])) {
                $photoset_id = $_REQUEST['photoset_id'];
            }
            $api_key = $udraw_settings['designer_flickr_client_id'];
            $secret = $udraw_settings['designer_flickr_secret_id'];
            $timestamp = time();
            $signature_method = 'HMAC-SHA1';
            $nonce = bin2hex(mt_rand());
            $version = '1.0';

            $secret_key = $secret . '&' . $oauth_token_secret;

            $oAuth_params = array(
                'format' => 'json',
                'method' => $method,
                'nojsoncallback' => 1,
                'oauth_consumer_key' => $api_key
            );
            if (strlen($photoset_id) > 0) { $oAuth_params['photoset_id'] = $photoset_id; }
            $oAuth_params['oauth_nonce'] = $nonce;
            $oAuth_params['oauth_signature_method'] = $signature_method;
            $oAuth_params['oauth_timestamp'] = $timestamp;
            $oAuth_params['oauth_token'] = $oauth_token;
            if (strlen($user_id) > 0) { $oAuth_params['user_id'] = $user_id; }
            //$oAuth_params['user_id'] = '66956608@N06'; //Official Flickr account's user_id
            $oAuth_params['oauth_version'] = $version;

            $sign_string = base64_encode(hash_hmac('sha1', 'GET&https%3A%2F%2Fapi.flickr.com%2Fservices%2Frest&' . urlencode(http_build_query($oAuth_params)), $secret_key, true));

            $oAuth_params['oauth_signature'] = $sign_string;

            echo json_encode(file_get_contents('https://api.flickr.com/services/rest?' . http_build_query($oAuth_params)));
        }
        
        public function create_product_xml_pages ($path_url = '', $xml_array = array()) {
            if (isset($_REQUEST['folder_path']) && isset($_REQUEST['xml_array'])) {
                $path_url = $_REQUEST['folder_path'];
                $xml_array = $_REQUEST['xml_array'];
            } else {
                return $this->sendResponse(false);
            }
            $path = str_replace(UDRAW_STORAGE_URL, UDRAW_STORAGE_DIR, $path_url);
            //Clean out the folder before adding in new files
            array_map('unlink', glob($path . '*'));
            
            $file_array = array();
            for ($i = 0; $i < count($xml_array); $i++) {
                $result = file_put_contents($path . $i . '.xml', base64_decode($xml_array[$i]));
                if ($result) {
                    array_push($file_array, $path_url . $i . '.xml');
                }
            } 
            return $this->sendResponse($file_array);
        }
        
        public function retrieve_page_xml_files ($path_url = '') {
            if (isset($_REQUEST['folder_path'])) {
                $path_url = $_REQUEST['folder_path'];
            }
            $path = str_replace(UDRAW_STORAGE_URL, UDRAW_STORAGE_DIR, $path_url);
            $files_found = glob($path . '*');
            for ($i = 0; $i < count($files_found); $i++) {
                $files_found[$i] = str_replace(UDRAW_STORAGE_DIR, UDRAW_STORAGE_URL, $files_found[$i]);
            }
            return $this->sendResponse($files_found);
        }
        
        public function retrieve_merged_xml ($path_url = '', $canvas_header = '') {
            if (isset($_REQUEST['folder_path']) && isset($_REQUEST['canvas_header'])) {
                $path_url = $_REQUEST['folder_path'];
                $canvas_header = base64_decode($_REQUEST['canvas_header']);
            } else {
                return $this->sendResponse(false);
            }
            $path = str_replace(UDRAW_STORAGE_URL, UDRAW_STORAGE_DIR, $path_url);
            $files_found = glob($path . '*');
            if (count($files_found) > 0) {
                if (!in_array($path . 'design.xml', $files_found)) {
                    $string = $canvas_header;
                    for ($i = 0; $i < count($files_found); $i++) {
                        $string .= file_get_contents($path . $i . '.xml');
                    }
                    $string .= '</canvas>';
                    $result = file_put_contents($path . 'design.xml', $string);
                }
                if (file_exists($path . 'design.xml')) {
                    $xml = file_get_contents($path . 'design.xml');
                    return $this->sendResponse($xml);
                } else {
                    return $this->sendResponse(false);
                }
            }
            return $this->sendResponse(false);
        }
        
        public function create_page_xml ($path_url = '', $xml = '', $page_no = 0) {
            if (isset($_REQUEST['folder_path']) && isset($_REQUEST['xml']) && isset($_REQUEST['page_no'])) {
                $path_url = $_REQUEST['folder_path'];
                $xml = base64_decode($_REQUEST['xml']);
                $page_no = $_REQUEST['page_no'];
            }
            $path = str_replace(UDRAW_STORAGE_URL, UDRAW_STORAGE_DIR, $path_url);
            $result = file_put_contents($path . $page_no . '.xml', $xml);
            if ($result) {
                return $this->sendResponse($path_url . $page_no . '.xml');
            } else {
                return $this->sendResponse(false);
            }
        }
        
        public function create_merged_xml ($path_url = '', $canvas_header = '', $cart_path_url = '') {
            if (isset($_REQUEST['folder_path']) && isset($_REQUEST['canvas_header'])) {
                $path_url = $_REQUEST['folder_path'];
                $canvas_header = base64_decode($_REQUEST['canvas_header']);
            } else {
                return $this->sendResponse(false);
            }
            if (isset($_REQUEST['cart_folder_path'])) {
                $cart_path_url = $_REQUEST['cart_folder_path'];
            } else {
                $cart_path_url = $path_url;
            }
            $path = str_replace(UDRAW_STORAGE_URL, UDRAW_STORAGE_DIR, $path_url);
            $cart_path = str_replace(UDRAW_STORAGE_URL, UDRAW_STORAGE_DIR, $cart_path_url);
            $files_found = glob($path . '*');
            if (count($files_found) > 0) {
                $string = $canvas_header;
                for ($i = 0; $i < count($files_found); $i++) {
                    $string .= file_get_contents($path . $i . '.xml');
                }
                $string .= '</canvas>';
                $result = file_put_contents($cart_path . 'design.xml', $string);
                if ($result) {
                    //Remove page xml files
                    array_map('unlink', glob($path . '*'));
                    return $this->sendResponse($cart_path_url . 'design.xml');
                } else {
                    return $this->sendResponse(false);
                }
            }
            return $this->sendResponse(false);
        }
        
        public function remove_xml_files ($path_url = '') {
            if (isset($_REQUEST['folder_path'])) {
                $path_url = $_REQUEST['folder_path'];
            } else {
                return $this->sendResponse(false);
            }
            $path = str_replace(UDRAW_STORAGE_URL, UDRAW_STORAGE_DIR, $path_url);
            array_map('unlink', glob($path . '*'));
            return $this->sendResponse(true);
        }
        
        //////////////////////////////////////
        // Private Methods                  //
        //////////////////////////////////////
        
        private function __process_upload($assetPath) {
            $uDraw = new uDraw();
            $uDrawUpload = new uDrawUpload();
            
            if (strlen($assetPath) == 0) { echo "false"; return;}

            $assetDir = $uDraw->get_physical_path($assetPath);
            
            $assetBaseURL = $this->getBaseURL();
            
            // Check file exstension
            $fileName = pathinfo($_FILES['files']['name'][0], PATHINFO_FILENAME);
            $fileExt = strtolower(pathinfo($_FILES['files']['name'][0], PATHINFO_EXTENSION));
            
            // New Filename
            $newFile = rand(1, 32) .'_'. str_replace(' ','', $fileName) . '.' . $fileExt;
            
            $accepted_file_list = ['pdf', 'eps', 'jpg', 'jpeg', 'png', 'gif', 'svg'];
            $accepted_file_list = apply_filters('udraw_designer_accepted_image_file_types', $accepted_file_list);
            for ($f = count($accepted_file_list); $f > 0; $f--) {
                //Check that nothing malicious was added
                if (!in_array($accepted_file_list[$f], ['pdf', 'eps', 'jpg', 'jpeg', 'png', 'gif', 'svg'])) {
                    unset($accepted_file_list[$f]);
                }
            }
            // See if we can convert the file before dismissing it.
            if (($fileExt == 'pdf' || $fileExt == 'eps') && in_array($fileExt, $accepted_file_list)) {
                if (strlen(uDraw::get_udraw_activation_key()) > 0) {
                    // Save EPS/PDF locally to the sysetm.
                    $uploaded_files = $uDrawUpload->handle_upload($_FILES['files'], $assetDir, $assetBaseURL . $assetPath, array('pdf' => 'application/pdf', 'eps' => 'application/postscript') );
                    
                    if (is_array($uploaded_files)) {
                        if ( !key_exists('error', $uploaded_files[0]) ) {
                            // Pass the PDF document to remote converting server and convert to SVG document.
                            $activationKey = base64_encode(uDraw::get_udraw_activation_key() .'%%'. str_replace('.', '-', $_SERVER['HTTP_HOST']));
                            $convert_path = 'https://udraw-server.w2pstore.com/convert.php';
                            //$convert_path = 'http://localhost:1111/convert.php';
                            
                            //$this->downloadFile($convert_path . '?action=convert&type='. $fileExt. '&key='. $activationKey . '&document='. $uploaded_files[0]['url'], $assetDir . '/'. $newFile .'.svg');
                            $uDrawUtil = new uDrawUtil();
                            $url_array = json_decode($uDrawUtil->get_web_contents($convert_path . '?action=convert&type='. $fileExt. '&key='. $activationKey . '&document='. $uploaded_files[0]['url'] . '&version=' . $uDraw->udraw_version));
                            //error_log($convert_path . '?action=convert&type='. $fileExt. '&key='. $activationKey . '&document='. $uploaded_files[0]['url'] /*. '&version=' . $uDraw->udraw_version*/);
                            //error_log(print_r($uDrawUtil->get_web_contents($convert_path . '?action=convert&type='. $fileExt. '&key='. $activationKey . '&document='. $uploaded_files[0]['url'] /*. '&version=' . $uDraw->udraw_version*/), true));
                            $new_file_array = array();
                            
                            for ($i = 0; $i < count($url_array); $i++) {
                                $new_file = $newFile . '_page_' . ($i + 1) . '.svg';
                                $this->downloadFile($url_array[$i], $assetDir . '/'. $new_file);
                                array_push($new_file_array, $new_file);
                            }
                            
                            // Once new SVG document is saved, we can remove the uploaded PDF document.
                            unlink($uploaded_files[0]['file']);
                            
                            // return back the new SVG file name.
                            echo json_encode($new_file_array);
                            wp_die();
                        }
                    }   
                }
            } else {
                if ($fileExt != 'jpg' && $fileExt != 'jpeg' && $fileExt != 'png' && $fileExt != 'gif' && $fileExt != 'svg') {
                    echo "false"; wp_die();
                } else if (in_array($fileExt, $accepted_file_list)) {                    
                    $uploaded_files = $uDrawUpload->handle_upload($_FILES['files'], $assetDir, $assetBaseURL . $assetPath);
                    if (is_array($uploaded_files)) {
                        if ( !key_exists('error', $uploaded_files[0]) ) {
                            // move file to a more unique name.
                            rename($uploaded_files[0]['file'], $assetDir . '/' . $newFile);
                            
                            // Try to look and detect malformed SVG documents that can mark the design "dirty".
                            if ($fileExt == 'svg') {
                                $handle = fopen($assetDir . '/'. $newFile, 'r');
                                $isMalformed = false;
                                while (($buffer = fgets($handle)) !== false) {
                                    if ( strpos($buffer, "<foreignObject") !== false ) {
                                        $isMalformed = true;
                                        break; 
                                    }
                                }
                                fclose($handle);
                                
                                if ($isMalformed) {
                                    $svg_file = file_get_contents($assetDir . '/'. $newFile);
                                    
                                    if ( strpos($svg_file, "<foreignObject") !== false ) {
                                        // remove foreignObject from SVG
                                        $start = "<foreignObject";
                                        $end = "foreignObject>";
                                        $start_idx = strpos($svg_file, $start);
                                        $end_idx = strpos($svg_file, $end, $start_idx+strlen($start));
                                        $svg_file = substr_replace($svg_file,'', $start_idx, $end_idx-$start_idx+strlen($end));
                                    }
                                    
                                    sleep(1);
                                    unlink($assetDir . '/'. $newFile);
                                    $newFile = '/udraw_'. $newFile;
                                    file_put_contents($assetDir . $newFile, $svg_file);
                                }
                            }
                            
                            // return new name.
                            echo $newFile; wp_die();                          
                        }
                    }
                }
            }
            
            // default return false.
            echo "false"; wp_die();            
        }
        
        private function __process_images($localImagePath, $includeDir) {
            $uDraw = new uDraw();
            if (strlen($localImagePath) == 0) { echo "false"; return; }
            $localImageDir = $uDraw->get_physical_path($localImagePath);
            
            $response = array();
            
            if ($includeDir) {
                // Directories in top level.
                $directories = glob($localImageDir . '/*', GLOB_ONLYDIR);
                foreach($directories as $directory) {
                    $_rel_dir_path = str_replace(str_replace('\\\\','\\',get_home_path()),"",$directory);
                    $_rel_dir_path = $uDraw->get_virtual_path() . $_rel_dir_path;
                    $_rel_dir_path = str_replace("\\","/",$_rel_dir_path);                
                    $_item = new uDrawHandler_LocalImages("folder", basename($_rel_dir_path), "", $_rel_dir_path);
                    
                    array_push($response, $_item);
                }
            }
            
            // files in top level
            $files = glob($localImageDir . '/*.{png,jpg,jpeg,gif,pdf,eps,svg,tiff,tif}', GLOB_BRACE);
            usort($files, function($a,$b){
              return filemtime($b) - filemtime($a);
            });
            foreach($files as $file) {
                $_rel_file_path = str_replace(str_replace('\\\\','\\',get_home_path()),"",$file);
                $_rel_file_path = $uDraw->get_virtual_path() . $_rel_file_path;
                $_rel_file_path = str_replace("\\","/",$_rel_file_path);
                $_item = new uDrawHandler_LocalImages("file", basename($_rel_file_path), ".".pathinfo($file, PATHINFO_EXTENSION), $_rel_file_path);
                
                array_push($response, $_item);
            }
            
			echo json_encode($response);
        }
        
        /**
         * Returns String if empty or array of woff fonts based on path.
         * 
         * @return array|string
         */
        private function __process_fonts() 
        {
            $uDraw = new uDraw();
            $localFontPath = $_REQUEST['localFontPath'];
            if (strlen($localFontPath) == 0) { return ""; }
            $fontDir = $uDraw->get_physical_path($localFontPath);
            
            $fontFiles = glob($fontDir . "/*.woff");
            $fontList = array();
            foreach($fontFiles as $fonts) {
                $_name = basename($fonts, '.woff');
                $_path = $localFontPath . basename($fonts);
                
                $uDrawHandlerLocalFonts = new uDrawHandler_LocalFonts($_name, $_path, $fonts, filesize($fonts));
                array_push($fontList, $uDrawHandlerLocalFonts);
            }
            
            return $fontList;
        }
        
        /**
         * Saves the uDraw designer files to the filesystem.
         * 
         * @param boolean $includePDF 
         * @return void
         */        
        private function __process_save($includePDF) {
            $uDraw = new uDraw();
            try {                
                $outputPath = $_REQUEST['outputPath'];
                if (strlen($outputPath) == 0) { echo "false"; return;}
                $outputDir = $uDraw->get_physical_path($outputPath);
                
                $assetPath = $_REQUEST['assetPath'];
                if (strlen($assetPath) == 0) { echo "false"; return;}
                $assetDir = $uDraw->get_physical_path($assetPath);
                
                // Make sure both folders exists.
                if (gettype($assetDir) == 'boolean' || gettype($outputDir) == 'boolean') {
                    echo $this->__generate_callBack("invalid", "invalid", "invalid", "missing folders");
                    return;
                }
                
                // Check to see xml and preview was sent in request.
                if ( !strlen($_REQUEST['xmlDoc']) > 0 || !strlen($_REQUEST['previewDoc']) > 0 )  {
                    echo $this->__generate_callBack("invalid", "invalid", "invalid", "No Docs Found");
                }
                
                if ($includePDF) {
                    if (!strlen($_REQUEST['pdfDoc']) > 0) {
                        echo $this->__generate_callBack("invalid", "invalid", "invalid", "No PDF Found");
                    }
                }
                
                $docname = uniqid();
                if (strlen($_REQUEST['document']) > 0) {
                    if (strpos($_REQUEST['document'], '.xml') > 0) {
                        $docname = basename($_REQUEST['document'], '.xml'); 
                    }
                }
                
                $xml = $docname . '.xml';
                $preview = $docname . '.png';
                $pdf = $docname . '.pdf';
                
                // Extract Images from the design and store on file system.
                $xmlStr = $this->extract_images_from_design($outputDir, $outputPath, $docname, base64_decode($_REQUEST['xmlDoc']));
                // Save XML Document
                $xml_handle = fopen($outputDir . '/' . $xml, "w");
                fwrite($xml_handle, $xmlStr);
                fclose($xml_handle);
                
                // Save Preview Image
                $preview_handle = fopen($outputDir . '/' . $preview, "w");
                fwrite($preview_handle, base64_decode($_REQUEST['previewDoc']));
                fclose($preview_handle);
                
                if ($includePDF) {
                    // Save PDF Document
                    $pdf_handle = fopen($outputDir . '/' . $pdf, "w");
                    fwrite($pdf_handle, base64_decode($_REQUEST['pdfDoc']));
                    fclose($pdf_handle);
                }
                
                if ($includePDF) {
                    echo $this->__generate_callBack($pdf, $xml, $preview, "-");
                } else {
                    echo $this->__generate_callBack("-", $xml, $preview, "-");
                }
            }
            catch (Exception $e) {
                echo $this->__generate_callBack("invalid", "invalid", "invalid", $e->getMessage());
            }            
        }
        
        private function __generate_callBack($name, $xml, $preview, $error) {
            return "{\"PDFdocument\": \"" . $name . "\", \"XMLDocument\": \"" . $xml . "\", \"Preview\": \"" . $preview . "\", \"errorMessage\": \"" . $error . "\"}";
        }
        
        private function dirToArray($dir, $urlpath, $isDir=false) { 
            
            $result = array(); 
            
            $cdir = scandir($dir); 
            foreach ($cdir as $key => $value) 
            { 
                if (!in_array($value,array(".",".."))) 
                { 
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
                    { 
                        $result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value, $urlpath . $value.DIRECTORY_SEPARATOR,true);
                    } 
                    else 
                    { 
                        $item= array();
                        $item[] = $value;
                        $item[] = $urlpath.$value;
                        
                        $result[]= $item;
                        //$result[] = $value;
                    } 
                } 
            } 
            
            return $result; 
        }
        
        private function scan_directory($dir) { 
   
           $result = array(); 

           $cdir = scandir($dir); 
           foreach ($cdir as $key => $value) 
           { 
              if (!in_array($value,array(".",".."))) 
              { 
                 if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
                 { 
                    $result[$value] = scan_directory($dir . DIRECTORY_SEPARATOR . $value); 
                 } 
                 else 
                 { 
                    $result[] = $value; 
                 } 
              } 
           } 

           return $result; 
        }
        
        private function  __get_excel_object ($file) {
            require_once(UDRAW_PLUGIN_DIR. '/assets/PHPExcel/Classes/PHPExcel.php');
            $inputFileType = PHPExcel_IOFactory::identify($file);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objReader->setReadDataOnly(false);
            $objPHPExcel = $objReader->load($file);
            return $objPHPExcel;
        }
        
        private function __read_excel_file ($excel, $preview) {
            //excel->filename, excel->path, excel->sessionID
            //$file = directory path
            $file = str_replace(UDRAW_TEMP_UPLOAD_URL, UDRAW_TEMP_UPLOAD_DIR, $excel->path);
            $filename = $excel->filename;
            $sessionID = $excel->sessionID;
            $uploadSessionID = $excel->uploadSessionID;
            $objPHPExcel = $this->__get_excel_object($file);
            
            $totalSheets = $objPHPExcel->getSheetCount();

            $excelArray = array();
            $rootfolder = str_replace(array(UDRAW_TEMP_UPLOAD_DIR, $filename, $sessionID), '', $file);

            for ($i = 0; $i < $totalSheets; $i++) {
                $objWorksheet = $objPHPExcel->setActiveSheetIndex($i);
                $sheetName = $objPHPExcel->getActiveSheet()->getTitle();
                if ($sheetName != 'Instructions') {
                    $sheetArray = array();
                    $highestRow = $objWorksheet->getHighestRow();
                    $highestColumnString = $objWorksheet->getHighestColumn();
                    $highestColumn = PHPExcel_Cell::columnIndexFromString($highestColumnString);
                    if ($preview === 'true') {
                        for ($row = 1; $row <= $highestRow; $row++) {
                            $cell = $objWorksheet->getCellByColumnAndRow(1, $row);
                            $cellValue = (string)$cell->getValue();
                            if (PHPExcel_Shared_Date::isDateTime($cell)) {
                                $cellValue = PHPExcel_Shared_Date::ExcelToPHPObject($cell->getValue())->format('d-M-Y H:i:s');
                            }
                            $cellTitle = $objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
                            if (strpos($cellTitle, "(image)") !== false) {
                                $cellValue = UDRAW_TEMP_UPLOAD_URL . $sessionID .$rootfolder. $cellValue;
                            }
                            array_push($sheetArray, (object)array('label'=>$cellTitle, 'value'=>$cellValue));
                        }
                        array_push($excelArray, $sheetArray);
                    } else {
                        for ($column = 1; $column < $highestColumn; $column++) {
                            $columnArray = array();
                            for ($row = 1; $row <= $highestRow; $row++) {
                                $cell = $objWorksheet->getCellByColumnAndRow(1, $row);
                                $cellValue = (string)$cell->getValue();
                                if (PHPExcel_Shared_Date::isDateTime($cell)) {
                                    $cellValue = PHPExcel_Shared_Date::ExcelToPHPObject($cell->getValue())->format('d-M-Y H:i:s');
                                }
                                $cellTitle = $objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
                                if (strpos($cellTitle, "(image)") !== false) {
                                    $cellValue = UDRAW_TEMP_UPLOAD_URL . $sessionID .$rootfolder. $cellValue;
                                }
                                array_push($columnArray, (object)array('label'=>$cellTitle, 'value'=>$cellValue));
                            }
                            array_push($sheetArray, $columnArray);
                        }
                        array_push($excelArray, $sheetArray);
                    }
                }
            }
            return $excelArray;
        }
        
        private function __get_excel_entry_numbers($excel) {
            //excel->filename, excel->path, excel->sessionID
            //$file = directory path
            $file = str_replace(UDRAW_TEMP_UPLOAD_URL, UDRAW_TEMP_UPLOAD_DIR, $excel->path);
            $filename = $excel->filename;
            $sessionID = $excel->sessionID;
            $uploadSessionID = $excel->uploadSessionID;
            $objPHPExcel = $this->__get_excel_object($file);
            $totalSheets = $objPHPExcel->getSheetCount();

            $rootfolder = str_replace(array(UDRAW_TEMP_UPLOAD_DIR, $filename, $sessionID), '', $file);
            $columnArray = array();
            for ($i = 0; $i < $totalSheets; $i++) {
                $objWorksheet = $objPHPExcel->setActiveSheetIndex($i);
                $sheetName = $objPHPExcel->getActiveSheet()->getTitle();
                if ($sheetName != 'Instructions') {
                    $sheetArray = array();
                    $highestRow = $objWorksheet->getHighestRow();
                    $highestColumnString = $objWorksheet->getHighestColumn();
                    $highestColumn = PHPExcel_Cell::columnIndexFromString($highestColumnString);
                    array_push($columnArray, $highestColumn);
                }
            }
            return max($columnArray);
        }
        
        private function __get_excel_sheet_numbers($excel) {
            //excel->filename, excel->path, excel->sessionID
            //$file = directory path
            $file = str_replace(UDRAW_TEMP_UPLOAD_URL, UDRAW_TEMP_UPLOAD_DIR, $excel->path);
            $filename = $excel->filename;
            $sessionID = $excel->sessionID;
            $uploadSessionID = $excel->uploadSessionID;
            $objPHPExcel = $this->__get_excel_object($file);
            $totalSheets = $objPHPExcel->getSheetCount();
            return $totalSheets;
        }
        
        private function __get_excel_entries ($excel) {
            $file = str_replace(UDRAW_TEMP_UPLOAD_URL, UDRAW_TEMP_UPLOAD_DIR, $excel->path);
            $filename = $excel->filename;
            $sessionID = $excel->sessionID;
            $uploadSessionID = $excel->uploadSessionID;
            $rootfolder = str_replace(array(UDRAW_TEMP_UPLOAD_DIR, $filename, $sessionID), '', $file);
            $objPHPExcel = $this->__get_excel_object($file);
            
            $numberOfEntries = $this->__get_excel_entry_numbers($excel);
            $totalSheets = $this->__get_excel_sheet_numbers($excel);
            
            $dataArray = array();
            for ($currentColumn = 0; $currentColumn < $numberOfEntries - 1; $currentColumn++) {
                $entryArray = array();
                //totalSheets - 1 for correct around of template pages
                for ($currentSheet = 0; $currentSheet < $totalSheets - 1; $currentSheet++) {
                    $sheetArray = array();
                    $objWorksheet = $objPHPExcel->setActiveSheetIndex($currentSheet);
                    $sheetName = $objPHPExcel->getActiveSheet()->getTitle();
                    if ($sheetName != 'Instructions') {
                        $sheetArray = array();
                        $highestRow = $objWorksheet->getHighestRow();
                        for ($row = 1; $row <= $highestRow; $row++) {
                            $cellValue = (string)$objWorksheet->getCellByColumnAndRow($currentColumn + 1, $row)->getValue();
                            $cellTitle = $objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
                            if (strpos($cellTitle, "(image)") !== false) {
                                $cellValue = UDRAW_TEMP_UPLOAD_URL . $sessionID .$rootfolder. $cellValue;
                            }
                            array_push($sheetArray, (object)array('label'=>$cellTitle, 'value'=>$cellValue));
                        }
                        array_push($entryArray, $sheetArray);
                    }
                }
                array_push($dataArray, $entryArray);
            }
            return $dataArray;
        }
        
        private function remove_utf8_bom($text) {
            $bom = pack('H*','EFBBBF');
            $text = preg_replace("/^$bom/", '', $text);
            return $text;
        }
        
        private function __read_translation_file($file) {
            return json_decode($this->remove_utf8_bom(file_get_contents($file)));
        }
        private function __get_translation_file_location($language) {
            $file_dir = (file_exists(UDRAW_PLUGIN_DIR.'/designer/includes/locales/udraw-'.$language.'.txt')) ? UDRAW_PLUGIN_DIR.'/designer/includes/locales/udraw-'.$language.'.txt' : UDRAW_LANGUAGES_DIR.'udraw-'.$language.'.txt';
            $file_url = (file_exists(UDRAW_PLUGIN_DIR.'/designer/includes/locales/udraw-'.$language.'.txt')) ? UDRAW_PLUGIN_URL.'/designer/includes/locales/udraw-'.$language.'.txt' : UDRAW_LANGUAGES_URL.'udraw-'.$language.'.txt';
            return array('directory'=>$file_dir, 'url'=>$file_url);
        }
    }
    
    class uDrawHandler_LocalFonts {
        public $name;
        public $path;
        public $sysPath;
        public $fileSize;
        
        public function __construct($_name, $_path, $_sysPath, $_fileSize) {
            $this->name = $_name;
            $this->path = $_path;
            $this->sysPath = $_sysPath;
            $this->fileSize = $_fileSize;
        }
    }
    
    class uDrawHandler_LocalImages {
        public $type;
        public $name;
        public $extension;
        public $path;
        
        public function __construct($_type, $_name, $_extension, $_path) {
            $this->type = $_type;
            $this->name = $_name;
            $this->extension = $_extension;
            $this->path = $_path;
        }
    }
}
?>
