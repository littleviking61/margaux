<?php 

require_once "woocommerce-functions.php";

// define the woocommerce_shop_loop_item_title callback 
function action_woocommerce_shop_loop_item_title( $woocommerce_template_loop_product_title, $int ) { ?>
	<h3 class="main-cat"><?= get_product_main_category() ?></h3>
	<?php
}; 
         
// add the action 
add_action( 'woocommerce_shop_loop_item_title', 'action_woocommerce_shop_loop_item_title', 0 ); 