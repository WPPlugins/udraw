<?php     
    global $post, $wpdb, $woocommerce, $product;
    $udrawSettings = new uDrawSettings();
    $uDrawUtil = new uDrawUtil();
    $_udraw_settings = $udrawSettings->get_settings();
    $table_name = $_udraw_settings['udraw_db_udraw_customer_designs'];

    function startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
    }
    
    // Save Design Post Back. Only if Saved Page is defined.
    if ($_udraw_settings['udraw_customer_saved_design_page_id'] > 1) {
        if (isset($_POST['udraw_is_saving_for_later'])) {
            $nonce = $_REQUEST['_wpnonce'];
            if( !wp_verify_nonce( $nonce, 'save_udraw_customer_design' )) {
                wp_die('security check failed');
            } else {
                $dt = new DateTime();
                
                $_output_path = UDRAW_STORAGE_DIR . wp_get_current_user()->user_login . '/output/';
                if (!file_exists($_output_path)) {
                    wp_mkdir_p($_output_path);
                }
                $udraw_product_data_file = uniqid() . '_usdf';
                file_put_contents($_output_path . $udraw_product_data_file, $_POST['udraw_save_product_data']);

                $preview_url = $_POST['udraw_save_product_preview'];
                if (startsWith($_POST['udraw_save_product_preview'], 'http')) {
                    $preview_file = uniqid('udraw_') . '.png';
                    $uDrawUtil->download_file($_POST['udraw_save_product_preview'], $_output_path . $preview_file);
                    $preview_url = UDRAW_STORAGE_URL . wp_get_current_user()->user_login . '/output/' . $preview_file; 
                }
                
                if (strlen($_POST['udraw_save_access_key']) > 1) {
                    // update design            
                    $wpdb->update($table_name, array(
                        'post_id' => $post->ID,
                        'customer_id' => wp_get_current_user()->ID,
                        'preview_data' => $preview_url,
                        'design_data' => wp_get_current_user()->user_login . '/output/' . $udraw_product_data_file,
                        'modify_date' => $dt->format('Y-m-d H:i:s')),
                        array(
                            'access_key' => $_POST['udraw_save_access_key']
                        ));
                } else {
                    // insert new design
                    $wpdb->insert($table_name, array(
                        'post_id' => $post->ID,
                        'customer_id' => wp_get_current_user()->ID,
                        'preview_data' => $preview_url,
                        'design_data' => wp_get_current_user()->user_login . '/output/' . $udraw_product_data_file,
                        'create_date' => $dt->format('Y-m-d H:i:s'),
                        'access_key' => uniqid('udraw_'),
                        'name' => $post->post_title
                    ));           
                    
                }

                // redirct after update/insert to 'my saved designs page'
                $pages = get_pages();
                foreach ($pages as $page) {
                    if ($page->ID == $_udraw_settings['udraw_customer_saved_design_page_id']) {
                        // redirct to saved design page.
?>
                        <script>
                            window.location.replace("<?php echo get_permalink($page->ID); ?>");
                        </script>
                    <?php                    
                        exit;
                    }
                }
            }
        }
    }
    
    // Remove Saved Design checkdate
    if (isset($_GET['udraw_remove_template'])) {
        if (isset($_GET['udraw_access_key'])) {
            $wpdb->delete( $table_name, array( 'access_key' => $_GET['udraw_access_key'] ) );
            
            // redirct after removing template.
            $pages = get_pages();
            foreach ($pages as $page) {
                if ($page->ID == $_udraw_settings['udraw_customer_saved_design_page_id']) {
                    // redirct to saved design page.
                    ?>
                        <script>
                            window.location.replace("<?php echo get_permalink($page->ID); ?>");
                        </script>
                    <?php                    
                    exit;
                }
            }            
        }
    }
?>

