<?php

if (!class_exists('uDrawCustomerDesigns')) {
    class uDrawCustomerDesigns extends uDrawAjaxBase {                
        
        function __contsruct() { }
        
        public function init_actions() {
            add_action( 'wp_ajax_udraw_update_customer_design', array(&$this,'update_customer_design') );
            add_action( 'wp_ajax_udraw_duplicate_customer_design', array(&$this,'duplicate_customer_design') );
            add_action( 'wp_ajax_udraw_remove_customer_design', array(&$this,'remove_customer_design') );
        }
        
        function update_customer_design($access_key = "", $name = "My Design") {            
            global $wpdb;
            
            if (isset($_REQUEST['access_key'])) {
                $access_key = $_REQUEST['access_key'];
            }
            
            if (isset($_REQUEST['name'])) {
                $name = $_REQUEST['name'];
            }
            
            $response = $wpdb->update($this->udraw_customer_designs_table, array(
                'name' => $name),  
            array(
                'access_key' => $access_key
            ));
            
            $this->sendResponse($response);
        }
        
        function duplicate_customer_design($access_key = "") { 
            global $wpdb;
            $uDraw = $this->uDraw;
            
            if (isset($_REQUEST['access_key'])) {
                $access_key = $_REQUEST['access_key'];
            }
            
            $customer_design = $uDraw::get_udraw_customer_design($access_key);
            
            if (isset($customer_design['post_id'])) {
                $dt = new DateTime();
                // insert new design
                $response = $wpdb->insert($this->udraw_customer_designs_table, array(
                    'post_id' => $customer_design['post_id'],
                    'customer_id' => wp_get_current_user()->ID,
                    'preview_data' => $customer_design['preview_data'],
                    'design_data' => $customer_design['design_data'],
                    'create_date' => $dt->format('Y-m-d H:i:s'),
                    'access_key' => uniqid('udraw_'),
                    'name' => $customer_design['name'] . ' Copy'
                ));
                $this->sendResponse($response);
            } else {
                $this->sendResponse(false);
            } 
        }
        
        function remove_customer_design($access_key = "") {
            global $wpdb;
            
            if (isset($_REQUEST['access_key'])) {
                $access_key = $_REQUEST['access_key'];
            }
            
            if (isset($_REQUEST['customer_id'])) {
                $customer_id = $_REQUEST['customer_id'];
            }
            
            $wpdb->delete( $this->udraw_customer_designs_table, 
                array(
                'access_key' => $access_key, 
                'customer_id' => $customer_id
                )
            );
        }
    }
}

?>