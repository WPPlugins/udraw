<?php

if (!class_exists('uDrawConnect')) {
    class uDrawConnectOrderRequest {
        public $key;
        public $data;
        public $block_id;
        public $type;
        
        function __construct() {}
    }
    
    class uDrawConnectOrderResponse {
        public $key;
        public $type;
        public $pdf;
        public $pdfPages;
        public $preview;
        public $xml;
        public $block_id;
        public $isSuccess;
        
        function __construct() {}
    }
    
    class uDrawConnect {
        function __contsruct() {}
        
        public function init() {
            add_action('process_udraw_order', array(&$this, 'process_udraw_order'), 10, 2);
        }
        
        public function process_udraw_order($order_id, $build_files_only) {
            global $woocommerce;
            $uDrawUtil = new uDrawUtil();
            $GoEpower = new GoEpower();
            $uDrawPdfXMPie = new uDrawPdfXMPie();
            $udrawSettings = new uDrawSettings();
            $_udraw_settings = $udrawSettings->get_settings();            
            
            if (is_null($order_id)) { return; }
            
            // Store order data and keys.
            $uDrawOrdersRequest = array();
            
            // Get WooCommerce Order.
            $order = new WC_Order($order_id);
            $items = $order->get_items();
            $item_keys = array_keys($items);
            for ($x = 0; $x < count($item_keys); $x++) {
                if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                    $udraw_data = $items[$item_keys[$x]]['udraw_data'];                  
                } else {
                    $udraw_data = unserialize($items[$item_keys[$x]]['udraw_data']);                  
                }
                if (!$udraw_data) {
                    $fixed = preg_replace_callback(
                        '/s:([0-9]+):\"(.*?)\";/',
                        function ($matches) { return "s:".strlen($matches[2]).':"'.$matches[2].'";';     },
                        $items[$item_keys[$x]]['udraw_data']
                    );
                    $udraw_data = unserialize($fixed);                   
                }
                
                if (isset($udraw_data['udraw_pdf_block_product_data']) && strlen($udraw_data['udraw_pdf_block_product_data']) > 0) { 
                    if (is_null(json_decode($udraw_data['udraw_pdf_block_product_data']))) {
                        $udraw_data['udraw_pdf_block_product_data'] = uDraw::fixBlocksJSONValues($udraw_data['udraw_pdf_block_product_data']);
                    }
                } 

                // uDraw designer product.
                if (isset($udraw_data['udraw_product_data']) && strlen($udraw_data['udraw_product_data']) > 0) {
                    $uDrawOrder = new uDrawConnectOrderRequest();
                    $uDrawOrder->data = $udraw_data['udraw_product_data'];
                    if (strlen($udraw_data['udraw_product_data']) < 40) {
                        $uDrawOrder->data = file_get_contents(UDRAW_STORAGE_DIR . $udraw_data['udraw_product_data']);
                    }
                    $uDrawOrder->svg = $udraw_data['udraw_product_svg'];
                    $uDrawOrder->preview = $udraw_data['udraw_product_preview'];
                    $uDrawOrder->key = $item_keys[$x];
                    $uDrawOrder->type = 'designer';
                    
                    if (isset($udraw_data['udraw_options_uploaded_excel']) && strlen($udraw_data['udraw_options_uploaded_excel']) > 0) {
                        $excelObject = json_decode($udraw_data['udraw_options_uploaded_excel']);
                        $uDrawOrder->excelObject = $excelObject;
                        $uDrawOrder->type = 'designer_excel';
                        $uDrawOrder->base_file = $udraw_data['udraw_product_data'];
                    }
                    
                    array_push($uDrawOrdersRequest, $uDrawOrder);
                }
                
                // Price Matrix product and has a design attached to it.
                if (isset($udraw_data['udraw_price_matrix_design_data']) && strlen($udraw_data['udraw_price_matrix_design_data']) > 0) {
                    $uDrawOrder = new uDrawConnectOrderRequest();
                    $uDrawOrder->data = $udraw_data['udraw_price_matrix_design_data'];
                    $uDrawOrder->key = $item_keys[$x];
                    $uDrawOrder->type = 'designer';
                    array_push($uDrawOrdersRequest, $uDrawOrder);
                }
                
                // PDF product.
                if (isset($udraw_data['udraw_pdf_block_product_id']) && strlen($udraw_data['udraw_pdf_block_product_id']) > 0) {
                    $uDrawPDFBlocks = new uDrawPDFBlocks();
                    $uDrawOrder = new uDrawConnectOrderRequest();
                    $uDrawOrder->block_id = $udraw_data['udraw_pdf_block_product_id'];
                    $uDrawOrder->data = $udraw_data['udraw_pdf_block_product_data'];
                    $uDrawOrder->key = $item_keys[$x];
                    $uDrawOrder->type = 'blocks';
                    
                    // Reverse compatibility of older GoEpower implementations
                    if ($_udraw_settings["goepower_username"] === "") {
                        $block_data = $uDrawPDFBlocks->get_product($udraw_data['udraw_pdf_block_product_id']);
                        $uDrawOrder->block_id = $block_data['ProductID'];
                    }
                    
                    array_push($uDrawOrdersRequest, $uDrawOrder);                    
                }
                
                // XMPie product.
                if (isset($udraw_data['udraw_pdf_xmpie_product_id']) && strlen($udraw_data['udraw_pdf_xmpie_product_id']) > 0) {
                    $uDrawOrder = new uDrawConnectOrderRequest();
                    $uDrawOrder->block_id = $udraw_data['udraw_pdf_xmpie_product_id'];
                    $uDrawOrder->data = $udraw_data['udraw_pdf_xmpie_product_data'];
                    $uDrawOrder->key = $item_keys[$x];
                    $uDrawOrder->type = 'xmpie';
                    array_push($uDrawOrdersRequest, $uDrawOrder);
                }
            }
            
            // Store Response data
            $uDrawOrdersResponse = array();
            
            // Loop through uDraw Orders array to process the files accordingly.
            foreach ($uDrawOrdersRequest as $uDrawRequest) {
                $uDrawOrderResponse = new uDrawConnectOrderResponse();
                $activationKey = base64_encode(uDraw::get_udraw_activation_key() .'%%'. str_replace('.', '-', $_SERVER['HTTP_HOST']));
                
                // Process PDF Block Product
                if ($uDrawRequest->type == 'blocks') {
                    
                    if (strlen($uDrawRequest->block_id) > 10) {
                        $_auth_object = $GoEpower->get_auth_object();
                        $data = array(
                            "Token" => $_auth_object->Token,
                            "ProductUniqueID" => $uDrawRequest->block_id,
                            "CustomID" => $_auth_object->CustomID,
                            "isEpower" => "false",
                            "isProof" => false,
                            "Entries" => json_decode(html_entity_decode($uDrawRequest->data)),
                            "Size" => "480"
                        );
                        $response = $uDrawUtil->get_web_contents('https://pdflib.w2pstore.com/api/Preview', http_build_query($data));
                    } else {
                        $data = array(
                            'ProductID' => $uDrawRequest->block_id,
                            'Proof' => 'false',
                            'Entries' => html_entity_decode($uDrawRequest->data),
                            'Size' => '480'
                        );
                        
                        $response = $uDrawUtil->get_web_contents($GoEpower->get_api_url() . '/CS_Handlers/BlocksPreviewHandler.ashx', http_build_query($data));
                    }
                    
                    if (strlen($response) <= 200) {                        
                        // Response was good
                        $uDrawOrderResponse->key = $uDrawRequest->key;
                        $uDrawOrderResponse->isSuccess = true;                        
                        if (strlen($uDrawRequest->block_id) > 10) {
                            $uDrawOrderResponse->pdf = str_replace('"', '', $response);
                            $uDrawOrderResponse->preview = str_replace('"', '', $response) . '_1.png';
                        } else {
                            $uDrawOrderResponse->pdf = $GoEpower->get_api_url() . $response;
                            $uDrawOrderResponse->preview = $GoEpower->get_api_url() . $response . '.png';
                        }
                        $uDrawOrderResponse->block_id = $uDrawRequest->block_id;
                    } else {
                        // Failed Response
                        $uDrawOrderResponse->isSuccess = false;
                    }
                }
                
                // Process XMPie Product
                if ($uDrawRequest->type == 'xmpie') {
                    $response = null;
                    $xjobid = '';
                    $current_xmpie_attempt = 0;
                    $xmpie_max_retry = 60;
                    
                    while ($current_xmpie_attempt <= $xmpie_max_retry) {
                        $data = array(
                            'pun' => $uDrawPdfXMPie->get_product($uDrawRequest->block_id)['UniqueID'],
                            'action' => 'order',
                            'xjobid' => $xjobid,
                            'entries' => html_entity_decode($uDrawRequest->data),
                            'size' => -1
                        );
                        
                        $response = json_decode($uDrawUtil->get_web_contents($GoEpower->get_api_url() . '/CS_Handlers/Remote/XmpieRemoteHandler.ashx', http_build_query($data)));
                       
                        if (!is_null($response)) {
                            if ($response->status == "wait") {
                                $xjobid = $response->xjobid;
                                $current_xmpie_attempt++;
                                sleep(3);
                                continue;
                            } else if ($response->status == "success") {
                                // Response was good
                                $uDrawOrderResponse->key = $uDrawRequest->key;
                                $uDrawOrderResponse->isSuccess = true;
                                $uDrawOrderResponse->pdf = $response->src;
                                $uDrawOrderResponse->block_id = $uDrawRequest->block_id;
                                if (strlen($response) > 0) {
                                    $previewImage = uniqid('preview') . '.png';
                                    $uDrawConnect->__downloadFile(UDRAW_CONVERT_URL . 'type=png&key='. $activationKey . '&document='. $response->src, 
                                        UDRAW_TEMP_UPLOAD_DIR . $previewImage);                            
                                    if (is_file(UDRAW_TEMP_UPLOAD_DIR . $previewImage)) {
                                        $uDrawOrderResponse->preview = UDRAW_TEMP_UPLOAD_URL . $previewImage;
                                    }
                                }
                                break;
                            } else {
                                // Failed Response
                                $uDrawOrderResponse->isSuccess = false;
                                break;
                            }
                        } else {
                            // Failed Response
                            $uDrawOrderResponse->isSuccess = false;
                            break;
                        }
                    }
                    
                }
                
                if ($uDrawRequest->type == 'designer') {
                    $uDrawOrderResponse = $this->__to_pdf($uDrawRequest);
                }
                
                if ($uDrawRequest->type == 'designer_excel') {
                    //Generate the xml required from the excel file
                    $uDrawDesignHandler = new uDrawDesignHandler();
                    $xmlFiles = $uDrawDesignHandler->generate_excel_designs($uDrawRequest->excelObject, stripslashes($uDrawRequest->base_file));
                    $pdf_array = array();
                    $order_item_dir = UDRAW_ORDERS_DIR.'uDraw-Order-'.$order_id.'-'.$uDrawRequest->key;
                    //check if the target folder exists, if not, create it, if it does, empty it
                    if (!file_exists($order_item_dir)) {
                        wp_mkdir_p($order_item_dir);
                    }
                    $uDrawUtil = new uDrawUtil();
                    $uDrawUtil->empty_target_folder($order_item_dir);
                    
                    foreach ($xmlFiles as $file) {
                        $uDrawRequest->data = base64_encode(file_get_contents(str_replace('/', '\\', $file)));
                        $uDrawRequest->xmlFile = $file;
                        $uDrawRequest->order_id = $order_id;
                        $uDrawOrderResponse->key = $uDrawRequest->key;
                        $uDrawOrderResponse->type = $uDrawRequest->type;
                        $uDrawOrderResponse->xmlFile = $uDrawRequest->xmlFile;
                        $uDrawOrderResponse->order_id = $uDrawRequest->order_id;
                        $uDrawOrderResponse = $this->__to_pdf(json_encode($uDrawRequest));
                        array_push($pdf_array, (object)['directory'=>$uDrawOrderResponse->excel_pdf, 'name'=>str_replace(($order_item_dir.'/'),'',$uDrawOrderResponse->excel_pdf) ]);
                    }
                }
                
                // Add item to Response Array
                array_push($uDrawOrdersResponse, $uDrawOrderResponse);
            }
            
            $gp2_files = $this->update_order_meta($order_id, $uDrawOrdersResponse);
                
            if (!$build_files_only) {
                $this->update_thirdparty_systems($order_id, $gp2_files);
            }
        }
        
        public function __to_pdf($uDrawRequest) {
            $uDrawUtil = new uDrawUtil();
            $uDrawRequest = (gettype($uDrawRequest) == 'string') ? json_decode($uDrawRequest) : $uDrawRequest;
            $designXML = simplexml_load_string(base64_decode($uDrawRequest->data));
            $docWidth = (float)$designXML->attributes()->width / 72;
            $docHeight = (float)$designXML->attributes()->height / 72;
            $bleed = (float)$designXML->attributes()->bleedArea / 72;
            $activationKey = base64_encode(uDraw::get_udraw_activation_key() .'%%'. str_replace('.', '-', $_SERVER['HTTP_HOST']));
            $ratio = wc_get_order_item_meta($uDrawRequest->key, '_CanvasRatio', true);
            $pagesInfo = array();
            for ($x = 0; $x < count($designXML->page); $x++) {
                $pageInfo = new StdClass();
                $pageInfo->width = (float)$designXML->page[$x]->attributes()->width + ((float)$designXML->page[$x]->attributes()->bleed * 2);
                $pageInfo->height = (float)$designXML->page[$x]->attributes()->height + ((float)$designXML->page[$x]->attributes()->bleed * 2);
                $pageInfo->ratio = wc_get_order_item_meta($uDrawRequest->key, '_CanvasRatio', true);
                if (!is_null($ratio) || strlen($ratio) > 0) {
                    $ratioVal = intval($ratio);
                }
                if (!is_numeric($ratio)) { $ratio = 'none'; }

                if ($ratio == 'none') {
                    $designObj = json_decode(base64_decode($designXML->page->item[0]["json"]));
                    if ($designObj->racad_properties->settings->pdfRatio) {
                        if (is_numeric($designObj->racad_properties->settings->pdfRatio)) {
                            $ratioVal = floatval($designObj->racad_properties->settings->pdfRatio);
                            if ($ratioVal >= 1) {
                                $pageInfo->ratio = $ratioVal;
                            }
                         }
                    }
                }
                array_push($pagesInfo, $pageInfo);
            }
            $pdfPages = array();
            
            if (!is_null($ratio) || strlen($ratio) > 0) {
                $ratioVal = intval($ratio);
            }
            if (!is_numeric($ratio)) { $ratio = 'none'; }

            if ($ratio == 'none') {
                $designObj = json_decode(base64_decode($designXML->page->item[0]["json"]));
                if ($designObj->racad_properties->settings->pdfRatio) {
                    if (is_numeric($designObj->racad_properties->settings->pdfRatio)) {
                        $ratioVal = intval($designObj->racad_properties->settings->pdfRatio);
                        if ($ratioVal > 1) {
                            $ratio = $ratioVal;
                        }
                     }
                }
            }
            $session_udraw_id = uniqid('udraw_');
            $pdf_file = $session_udraw_id . '.pdf';
            $preview_file = $session_udraw_id . '.png';
            $xml_file = $session_udraw_id . '.xml';
            $jpg_file = $session_udraw_id . '.jpg';
            
            set_time_limit(0);
            $pdfContent = false;
            if ($uDrawRequest->type != 'designer_excel') {
                $data = array(
                    'document' => base64_decode($uDrawRequest->svg),
                    'width' => $docWidth + ($bleed * 2),
                    'height' => $docHeight + ($bleed * 2),
                    'action' => 'convert',
                    'type' => 'udrawsvg',
                    'display-json' => 't',
                    'pagesInfo' => json_encode($pagesInfo),
                    'ratio' => $ratio,
                    'key' => $activationKey
                ); 
                $pdf_response = json_decode($uDrawUtil->get_web_contents('https://udraw-server.w2pstore.com/convert.php', http_build_query($data)));
                $pdfContent = $pdf_response->pdf;
                if (isset($pdf_response->pdfPages)) {
                    $pdfPages = explode(",",$pdf_response->pdfPages);
                }
            } else {
                if (isset($uDrawRequest->xmlFile) && strlen($uDrawRequest->xmlFile) > 0) {
                    $data = array(
                        'key' => $activationKey,
                        'type' => 'xmlpdf',
                        'action' => 'convert',
                        'document' => $uDrawRequest->xmlFile
                    );
                    $pdfContent = $uDrawUtil->get_web_contents('https://udraw-server.w2pstore.com/convert.php', http_build_query($data));
                    $pdfContent = trim($pdfContent);
                }
            }
            

            // If $pdfContent is a boolean, that means response data is empty and is returning false.
            // In this case, our request has failed.
            $uDrawOrderResponse = new uDrawConnectOrderResponse();
            if (gettype($pdfContent) != "boolean" && $pdfContent != '') {
                if ($uDrawRequest->type == 'designer_excel') {
                    $order_item_dir = UDRAW_ORDERS_DIR.'uDraw-Order-'.$uDrawRequest->order_id.'-'.$uDrawRequest->key.'/';
                    $uDrawUtil->download_file($pdfContent, $order_item_dir . $pdf_file);
                    $uDrawOrderResponse->excel_pdf = $order_item_dir . $pdf_file;
                } else {
                    // Download the PDF Document.
                    sleep(10);
                    $uDrawUtil->download_file($pdfContent, UDRAW_TEMP_UPLOAD_DIR . $pdf_file);
                }
                // Write the Preview Image.
                $preview_dir = str_replace(UDRAW_TEMP_UPLOAD_URL, UDRAW_TEMP_UPLOAD_DIR, $uDrawRequest->preview);
                if (isset($uDrawRequest->preview) && !is_null($uDrawRequest->preview)) { $this->base64_to_image($preview_dir, UDRAW_TEMP_UPLOAD_DIR . $preview_file); }
                // Write the XML Design Data.
                file_put_contents(UDRAW_TEMP_UPLOAD_DIR . $xml_file, base64_decode($uDrawRequest->data));
                $uDrawOrderResponse->isSuccess = true;
                $uDrawOrderResponse->pdf = UDRAW_TEMP_UPLOAD_URL . $pdf_file;
                $uDrawOrderResponse->preview = UDRAW_TEMP_UPLOAD_URL . $preview_file;
                $uDrawOrderResponse->xml = UDRAW_TEMP_UPLOAD_URL . $xml_file;
                $uDrawOrderResponse->key = $uDrawRequest->key;
                $uDrawOrderResponse->type = $uDrawRequest->type;
                $uDrawOrderResponse->jpg = $this->png_to_jpg(UDRAW_TEMP_UPLOAD_DIR . $preview_file, UDRAW_TEMP_UPLOAD_DIR . $jpg_file, 100);
                $uDrawOrderResponse->pdfPages = $pdfPages;
            } else {
                $uDrawOrderResponse->isSuccess = false;
            }

            return $uDrawOrderResponse;
        }
        
        function png_to_jpg ($input_file, $output_file, $quality) {
            $image = imagecreatefrompng($input_file);
            imagejpeg($image, $output_file, $quality);
            imagedestroy($image);
            if (file_exists($output_file)) {
                return str_replace(UDRAW_TEMP_UPLOAD_DIR, UDRAW_TEMP_UPLOAD_URL, $output_file);
            } else {
                return false;
            }
        }
    
        //////////////////////////
        /// PRIVATE FUNCTIONS ////
        //////////////////////////
        
        private function base64_to_image($base64_string, $output_file) {
            $ifp = fopen($output_file, "wb");
            $data = explode(',', $base64_string);
            fwrite($ifp, base64_decode($data[1])); 
            fclose($ifp); 
            
            if (is_file($base64_string)) {
                $ifp = fopen($output_file, "wb");
                $data = file_get_contents($base64_string);
                fwrite($ifp, $data); 
                fclose($ifp);
            }

            return $output_file; 
        }
                
        private function update_order_meta($order_id, $uDrawOrdersResponse) {
            global $woocommerce;
            if (!is_dir(UDRAW_ORDERS_DIR) || is_dir(UDRAW_ORDERS_DIR) === '') {
                wp_mkdir_p(UDRAW_ORDERS_DIR);
            }
            $gp2_files = "";
            foreach ($uDrawOrdersResponse as $uDrawResponse) {
                if (is_null($uDrawResponse->key)) { continue; } // bad item, this really shouldn't happen.
                
                // Remove any existing pdf meta.
                wc_delete_order_item_meta($uDrawResponse->key, "_udraw_pdf_path");
                wc_delete_order_item_meta($uDrawResponse->key, "_udraw_pdf_xref");
                wc_delete_order_item_meta($uDrawResponse->key, "_udraw_pdf_pages");
                wc_delete_order_item_meta($uDrawResponse->key, "_udraw_product_jpg");
                wc_delete_order_item_meta($uDrawResponse->key, "_udraw_pdf_pages");
                wc_delete_order_item_meta($uDrawResponse->key, "_udraw_block_id");

                if ($uDrawResponse->type == 'designer') {
                    wc_delete_order_item_meta($uDrawResponse->key, "_udraw_xml_xref");
                }
                // Attempt to normalize the file name.
                $newFilename = "uDraw-Order-" . $order_id . "-" . $uDrawResponse->key . ".pdf";
                $newPreviewFile = "uDraw-Order-" . $order_id . "-" . $uDrawResponse->key . ".png";
                $newXMLFile = "uDraw-Order-" . $order_id . "-" . $uDrawResponse->key . ".xml";
                $newJPGFile = "uDraw-Order-" . $order_id . "-" . $uDrawResponse->key . ".jpg";                
                if (!is_dir(UDRAW_ORDERS_DIR)) { wp_mkdir_p(UDRAW_ORDERS_DIR); }
                if (is_dir(UDRAW_ORDERS_DIR)) {
                    // Download the processed files locally from the api servers.
                    
                    // Main Output PDF Document
                    $this->__downloadFile($uDrawResponse->pdf, UDRAW_ORDERS_DIR . $newFilename);
                    wc_add_order_item_meta($uDrawResponse->key, "_udraw_pdf_path", UDRAW_ORDERS_URL . $newFilename);
                    wc_add_order_item_meta($uDrawResponse->key, "_udraw_pdf_xref", UDRAW_ORDERS_URL . $newFilename);                    
                    
                    // Handle Pages ( if exists )
                    if (is_array($uDrawResponse->pdfPages)) {
                        if (count($uDrawResponse->pdfPages) > 0) {
                            $pdfPages = array();
                            for ($x = 0; $x < count($uDrawResponse->pdfPages); $x++) {
                                $this->__downloadFile($uDrawResponse->pdfPages[$x], UDRAW_ORDERS_DIR . $x .'-' . $newFilename);
                                array_push($pdfPages, UDRAW_ORDERS_URL . $x .'-' . $newFilename);
                            }
                            wc_add_order_item_meta($uDrawResponse->key, "_udraw_pdf_pages", $pdfPages);
                        }
                    }
                    
                    // Preview
                    if (isset($uDrawResponse->preview) && strlen($uDrawResponse->preview) > 0) {
                        $this->__downloadFile($uDrawResponse->preview, UDRAW_ORDERS_DIR . $newPreviewFile);
                    }
                    
                    // JPG Preview
                    if (isset($uDrawResponse->jpg) && strlen($uDrawResponse->jpg) > 0) {
                        $this->__downloadFile($uDrawResponse->jpg, UDRAW_ORDERS_DIR . $newJPGFile);
                        wc_add_order_item_meta($uDrawResponse->key, "_udraw_product_jpg", UDRAW_ORDERS_URL . $newJPGFile);
                    }
                    
                    // uDraw Designer
                    if ($uDrawResponse->type == 'designer') {
                        $this->__downloadFile($uDrawResponse->xml, UDRAW_ORDERS_DIR . $newXMLFile);
                        wc_add_order_item_meta($uDrawResponse->key, "_udraw_xml_xref", UDRAW_ORDERS_URL . $newXMLFile);
                    }
                    
                    // Product/Block Id
                    if (strlen($uDrawResponse->block_id) > 0) {
                        wc_add_order_item_meta($uDrawResponse->key, "_udraw_block_id", $uDrawResponse->block_id);
                    }
                    
                    // Create GoPrint2 String ( concatinated with all files )
                    $gp2_files .= basename($uDrawResponse->pdf) . '%' . UDRAW_ORDERS_URL . $newFilename . '@';
                }
            }
            
            return $gp2_files;
        }
        
        private function update_thirdparty_systems($order_id, $gp2_files) {
            // Init all required Classes and variables.
            global $woocommerce;   
            $goprint2 = new GoPrint2();
            $goepower = new GoEpower();
            $udrawSettings = new uDrawSettings();
            $uDrawUtil = new uDrawUtil();
            $_udraw_settings = $udrawSettings->get_settings();  
            
            //
            // Run the next part of code only if this is an order. If we are just re-building PDF no need to submit order info again.
            //            
            $order = new WC_Order($order_id);
            $taxes = new WC_Tax();
            $product_factory = new WC_Product_Factory();
            
            $order_taxes = $order->get_taxes();

            $order_tax_label_1 = "";
            $order_tax_label_2 = "";
            $order_tax_total_1; // used in case we have multiple taxes.
            $order_tax_total_2; // used in case we have multiple taxes.

            // Array which holds all items from order.
            $order_items_array = array();
            $order_total_price = number_format($order->get_total( ), 2);
            $order_subtotal_price = 0.00;

            if ($order->get_total_tax() > 0) {
                $order_total_taxes = number_format($order->get_total_tax( ), 2);
            } else {
                $order_total_taxes = "0.00";
            }            

            if ($order->get_total_shipping() > 0) {                
                $order_total_shipping = number_format($order->get_total_shipping(), 2);
            } else {
                $order_total_shipping = "0.00";
            }                        
            
            // Iterate through all items
            $order_items = $order->get_items();
            $order_item_keys = array_keys($order_items);      

            for ($x = 0; $x < count($order_item_keys); $x++) {
                $_item = $order_items[$order_item_keys[$x]];
                $_item_product = $product_factory->get_product($_item['product_id']);
                $_item_subtotal = number_format($order->get_line_subtotal($_item, false, false), 2);                
                $_item_total = number_format($order->get_line_total($_item, false, false), 2);

                $order_subtotal_price = $order_subtotal_price + $order->get_line_subtotal($_item, false, false);

                // If we have more than one type of tax for the order, we need to split up $order_total_taxes.
                // Otherwise we can just use the total taxes.
                if (count($order_taxes) > 0) {
                    $_item_taxes_keys = array_keys($order_taxes);

                    for ($y = 0; $y < count($_item_taxes_keys); $y++) {
                        $order_tax_label = $order_taxes[$_item_taxes_keys[$y]]["label"];
                        //$order_tax_percent = $order_taxes[$_item_taxes_keys[$y]]["tax_amount"] / 100;
                        //$order_tax_total = $order->get_line_subtotal($_item) * $order_tax_percent;
                        $order_tax_total = number_format($order_taxes[$_item_taxes_keys[$y]]["tax_amount"], 2);
                        if ($y == 0) {
                            $order_tax_label_1 = $order_tax_label;                          
                            $order_tax_total_1 = $order_tax_total;
                        } else if ($y == 1) {
                            $order_tax_label_2 = $order_tax_label;
                            $order_tax_total_2 = $order_tax_total;
                        } else {
                            // Too many taxes for GoEpower to Support.
                            continue;
                        }                        
                    }             
                }
                if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                    $udraw_data = $_item["udraw_data"];
                } else {
                    $udraw_data = unserialize($_item["udraw_data"]);
                }
                
                $_item_object = new StdClass;
                $_item_object->ProductID = (isset($_item["item_meta"]["_udraw_block_id"])) ? $_item["item_meta"]["_udraw_block_id"][0] : 0;
                $_item_object->ProductName = $_item["name"];                
                $_item_object->SKU = $_item_product->get_sku();
                $_item_object->ItemExternalID = $_item["product_id"];
                $_item_object->Quantity = $_item["qty"];
                $_item_object->Price = $_item_total;
                $_item_object->SetupPrice = 0.00;
                $_item_object->TotalPrice = $_item_total;
                $_item_object->DesignFileName = (isset($_item["item_meta"]["_udraw_xml_xref"])) ? $_item["item_meta"]["_udraw_xml_xref"][0] : NULL;
                $_item_object->PDFFileName = (isset($_item["item_meta"]["_udraw_pdf_xref"])) ? $_item["item_meta"]["_udraw_pdf_xref"][0] : NULL;
                $_item_object->PNGFileName = (isset($_item["item_meta"]["_udraw_preview_xref"])) ? $_item["item_meta"]["_udraw_preview_xref"][0] : NULL;
                $_item_object->Thumbnail = ""; // This gets auto genrated by GoEpower service.
                $_item_object->CustomID = 0;
                $_item_object->GoPrint2RouteEmail = get_post_meta($_item_object->ItemExternalID, '_udraw_goprint2_order_route_email', true);
                
                $udraw_product_type = "Designer";
                if (isset($udraw_data['udraw_pdf_block_product_id']) && strlen($udraw_data['udraw_pdf_block_product_id']) > 0) {
                    $udraw_product_type = "Blocks";
                } else if (is_null($_item_object->DesignFileName)) {
                    $udraw_product_type = "WooCommerce";
                }
                $_item_object->JobType = $udraw_product_type;

                $_datas = array();

                // Inject Price Matrix Selected Options ( if product contains the data )
                if (isset($udraw_data['udraw_price_matrix_selected_options']) && isset($udraw_data['udraw_price_matrix_qty']) ) {                
                    //Price matrix selected quantity
                    $_item_object->Quantity = $udraw_data['udraw_price_matrix_qty'];
                    if (isset($udraw_data['udraw_price_matrix_selected_options_object'])) {
                        $selected_options = json_decode(stripcslashes($udraw_data['udraw_price_matrix_selected_options_object']));
                        for ($x = 0; $x < count($selected_options); $x++) {
                            // Price matrix selected options
                            $_data = new StdClass;
                            $_data->FieldName = $selected_options[$x]->name;
                            $_data->FieldValue = $selected_options[$x]->value;
                            array_push($_datas, $_data);
                        }                        
                    } else {
                        $selected_options = json_decode(stripcslashes($udraw_data['udraw_price_matrix_selected_options']));                
                        foreach ($selected_options as $option => $value) {
                            // Price matrix selected options
                            $_data = new StdClass;
                            $_data->FieldName = $option;
                            $_data->FieldValue = $value[0];
                            array_push($_datas, $_data);
                        }
                    }
                } else {
                    if (isset($_item['variation_id'])) {
                        $_variation_product = $product_factory->get_product($_item['variation_id']);
                        if (isset($_variation_product) && gettype($_variation_product) == 'object') {
                            $_item_object->SKU = $_variation_product->get_sku();
                            if (is_array($_item['item_meta'])) {
                                $item_meta_keys = array_keys($_item['item_meta']);
                                for ($z = 0; $z < count($item_meta_keys); $z++) {
                                    if (substr($item_meta_keys[$z], 0, 1) != '_') {
                                        if ($item_meta_keys[$z] == 'udraw_data') { continue; }
                                        if (is_array($_item['item_meta'][$item_meta_keys[$z]])) {
                                            if (count($_item['item_meta'][$item_meta_keys[$z]]) > 0) {
                                                if (strlen($_item['item_meta'][$item_meta_keys[$z]][0]) > 0) {
                                                    $_data = new StdClass;
                                                    $_data->FieldName = wc_attribute_label( $item_meta_keys[$z] );
                                                    $_data->FieldValue = $_item['item_meta'][$item_meta_keys[$z]][0];
                                                    array_push($_datas, $_data);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }                    
                $_item_object->Datas = $_datas;
                
                array_push($order_items_array, $_item_object);
            }

            $countries = new WC_Countries();
            if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                $billing_country = $order->get_billing_country();
                $shipping_country = $order->get_shipping_country();
            } else {
                $billing_country = $order->billing_country;
                $shipping_country = $order->shipping_country;
            }
            $billing_country_name = $countries->countries[$billing_country];
            $shipping_country_name = $countries->countries[$shipping_country];
            
            if (0 === strpos($billing_country_name, 'United States (US)')) {
                $billing_country_name = 'USA';
                $shipping_country_name = 'USA';
            }
            
            do_action('udraw_send_thirdparty_order', $order, $order_items_array, $order_total_price, $order_total_shipping, $order_total_taxes);
            
            if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                $billing_first_name = $order->get_billing_first_name();
                $billing_last_name = $order->get_billing_last_name();
                $billing_company = $order->get_billing_company();
                $billing_address_1 = $order->get_billing_address_1();
                $billing_address_2 = $order->get_billing_address_2();
                $billing_city = $order->get_billing_city();
                $billing_state = $order->get_billing_state();
                $billing_country = $order->get_billing_country();
                $billing_postcode = $order->get_billing_postcode();
                $billing_phone = $order->get_billing_phone();
                $billing_email = $order->get_billing_email();
                
                $order_id = $order->get_id();
                
                $user_id = $order->get_customer_id();
            } else {
                $billing_first_name = $order->billing_first_name;
                $billing_last_name = $order->billing_last_name;
                $billing_company = $order->billing_company;
                $billing_address_1 = $order->billing_address_1;
                $billing_address_2 = $order->billing_address_2;
                $billing_city = $order->billing_city;
                $billing_state = $order->billing_state;
                $billing_country = $order->billing_country;
                $billing_postcode = $order->billing_postcode;
                $billing_phone = $order->billing_phone;
                $billing_email = $order->billing_email;
                
                $order_id = $order->id;
                
                $user_id = $order->user_id;
            }
            
            // Submit Order to GoPrint2
            if (strlen($_udraw_settings['goprint2_api_key']) > 1 && strlen($gp2_files) > 1 ) {                    
                if (isset($_udraw_settings['goprint2_send_file_after_order'])) {
                    if ($_udraw_settings['goprint2_send_file_after_order'] == "true") {                            
                        // We will first create/get customer
                        $gp2_customer_id = $goprint2->create_customer($_udraw_settings['goprint2_api_key'],
                                                                        $billing_first_name, $billing_last_name,
                                                                        $billing_company, $billing_address_1, $billing_address_2,
                                                                        $billing_city, $billing_state, $billing_country,
                                                                        $billing_postcode, $billing_phone, "", $billing_email);

                        // Now wen can submit the jobs to GoPrint2
                        $gp2_download_key = $goprint2->create_new_order($_udraw_settings['goprint2_api_key'], $gp2_customer_id, $gp2_files, "uDraw");
                        
                        // Send Email Notification.
                        $gp2_email_to = $goprint2->get_email_settings($_udraw_settings['goprint2_api_key']);
                        if (!is_null($gp2_email_to->Email)) {
                            $email_body = $uDrawUtil->get_web_contents("https://www.goprint2.com/common/view_ticket.aspx?DownloadId=". $gp2_download_key . "&From=store&AID=". $_udraw_settings['goprint2_api_key']);
                            $result = wp_mail($gp2_email_to->Email, "[Job Submitted] - ". $order_id, $email_body);   
                        }
                    }
                }
            }
                
            // Submit Order to GoEpower
            if ( strlen($_udraw_settings['goepower_api_key']) > 1 && strlen($_udraw_settings['goepower_producer_id']) > 0 &&
                strlen($_udraw_settings['goepower_company_id']) > 0 && $_udraw_settings['goepower_send_file_after_order']) {  
                // Create/Update Customer in Epower.
                $goepower_customer =
                $goepower->create_user($_udraw_settings['goepower_api_key'], $_udraw_settings['goepower_company_id'] . "_". $billing_email, $user_id,
                                        $_udraw_settings['goepower_producer_id'], $_udraw_settings['goepower_company_id'],
                                        $billing_first_name, $billing_last_name, $billing_company,
                                        $billing_address_1, $billing_address_2, "", $billing_city,
                                        $billing_state, $billing_postcode, $billing_country_name, "",
                                        $billing_email, "", "", "", "", "");
                
                if (!is_null($goepower_customer)) {
                    if (version_compare( $woocommerce->version, '3.0.0', ">=" )) {
                        $shipping_first_name = $order->get_shipping_first_name();
                        $shipping_last_name = $order->get_shipping_last_name();
                        $shipping_company = $order->get_shipping_company();
                        $shipping_address_1 = $order->get_shipping_address_1();
                        $shipping_address_2 = $order->get_shipping_address_2();
                        $shipping_city = $order->get_shipping_city();
                        $shipping_state = $order->get_shipping_state();
                        $shipping_postcode = $order->get_shipping_postcode();
                    } else {
                        $shipping_first_name = $order->shipping_first_name;
                        $shipping_last_name = $order->shipping_last_name;
                        $shipping_company = $order->shipping_company;
                        $shipping_address_1 = $order->shipping_address_1;
                        $shipping_address_2 = $order->shipping_address_2;
                        $shipping_city = $order->shipping_city;
                        $shipping_state = $order->shipping_state;
                        $shipping_postcode = $order->shipping_postcode;
                    }
                    // Submit order that we have created/updated user in GoEpower.
                    $goepower_order =
                    $goepower->create_order($_udraw_settings['goepower_api_key'], $_udraw_settings['goepower_producer_id'],
                                            $_udraw_settings['goepower_company_id'], $goepower_customer->Username, "",
                                            $_udraw_settings['goepower_additional_notify_email'], $order_id, $order->order_date, 'false',
                                            $shipping_first_name, $shipping_last_name, $shipping_company,
                                            $shipping_address_1, $shipping_address_2, "", $shipping_city,
                                            $shipping_state, $shipping_postcode, $shipping_country_name, "",
                                            $goepower_customer->Username, $order_items_array, number_format($order_subtotal_price, 2), 
                                            $order_total_shipping, $order_tax_label_1, $order_tax_label_2,
                                            number_format($order_tax_total_1, 2), number_format($order_tax_total_2, 2),
                                            $order_total_price);                    
                } else {
                    // Failed!!
                    // TODO: We should handle this condition ???
                }
            }
            
        }
        
        private function __getPostData($url, $data) {            
            $uDrawUtil = new uDrawUtil();
            return $uDrawUtil->get_web_contents($url, http_build_query($data));
        }
       
        public function __downloadFile($url, $path) {
            $uDrawUtil = new uDrawUtil();
            $uDrawUtil->download_file($url, $path);
        }
    }
}

?>