<?php
global $woocommerce;
if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
    $product_id = $product->get_id();
} else {
    $product_id = $product->id;
}

$uDraw = new uDraw();


$current_user = wp_get_current_user();
if ( !($current_user instanceof WP_User) )
    return;            

$loop = $uDraw->get_udraw_private_templates($current_user->ID);
            
woocommerce_product_loop_start();
woocommerce_product_subcategories();
?>
    <style>
        ul.products li.product {
            width: 21%;
        }
    </style>
<?php            
while ( $loop->have_posts() ) : $loop->the_post();
    $product = get_product();
    if (get_post_meta($product_id, '_udraw_is_private_product', true) == "yes") {
        require(UDRAW_PLUGIN_DIR . '/templates/frontend/uDraw-private-product.php');
    }
endwhile;
woocommerce_product_loop_end();         
wp_reset_query();                        

?>