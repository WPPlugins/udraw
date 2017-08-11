<?php

if (!class_exists('uDrawPDFBlocks')) {
    class uDrawPDFBlocks {
        
        function __contsruct() { }
        
        function init() {
            add_action( 'wp_ajax_udraw_pdf_block_blob_upload', array(&$this,'handle_ajax_upload_blob') );
            add_action( 'wp_ajax_udraw_pdf_block_get_templates', array(&$this, 'handle_ajax_get_templates') );
            
            add_action( 'wp_ajax_nopriv_udraw_pdf_block_blob_upload', array(&$this,'handle_ajax_upload_blob') );
        }
        
        function get_company_products() {
            $goEpower = new GoEpower();
            return $goEpower->get_company_products_by_type("blocks");
        }
        
        function get_product($product_id) {
            $all_products = $this->get_company_products();
            for ($x = 0; $x < count($all_products); $x++) {
                if ($all_products[$x]['ProductID'] == $product_id || $all_products[$x]['UniqueID'] == $product_id) {
                    return $all_products[$x];
                }
            }
            return null;
        }
        
        function handle_ajax_get_templates() {
            if (isset($_REQUEST['block-template-id'])) {    
                $block_template = $this->get_product($_REQUEST['block-template-id']);
                
                if (!is_null($block_template)) {
                    echo json_encode($block_template);
                } else {
                    echo json_encode(false);
                }                
            }
            wp_die();
        }
        public static function is_pdf_block_product($product_id) {
            if (get_post_meta($product_id, '_udraw_product', true) == 'true') {
                if (get_post_meta($product_id, '_udraw_block_template_id', true) > 0) {
                    return true;
                }
            }
            
            return false;
        } 
        
        function handle_ajax_upload_blob() 
        {
            // Saving Blob Image.
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $_REQUEST['imageData']));
            $image_name = uniqid('uatemp_') . '.png';
            file_put_contents(UDRAW_TEMP_UPLOAD_DIR . $image_name, $data);
            echo UDRAW_TEMP_UPLOAD_URL . $image_name;
            wp_die();
        }

    }
}

?>