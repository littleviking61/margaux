<?php 

require_once "woocommerce-functions.php";


// define the woocommerce_shop_loop_item_title callback 
function action_woocommerce_shop_loop_item_title( $woocommerce_template_loop_product_title, $int ) { ?>
	<h3 class="main-cat"><?= get_product_main_category() ?></h3>
	<?php
};          
// add the action 
add_action( 'woocommerce_shop_loop_item_title', 'action_woocommerce_shop_loop_item_title', 0 ); 

/* change breadcrumb delimiter */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_change_breadcrumb_delimiter' );
function jk_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &gt; ';
	return $defaults;
}

/* remove tab and add description in product directly */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
function woocommerce_template_product_description() {
  woocommerce_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );

add_action( 'woocommerce_single_product_summary', 'social_share_buttons', 90 );


function woocommerce_template_product_additional() {
  woocommerce_get_template( 'single-product/tabs/additional-information.php' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_additional', 20 );

/* remove single product sidebar */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/* remove related if upsell exist */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'related_upsell_products', 15 );
function related_upsell_products() {
	global $product;
	if ( isset( $product ) && is_product() ) {
		$upsells = $product->get_upsells();
		if ( sizeof( $upsells ) > 0 ) {
			woocommerce_upsell_display();
		} else {
			woocommerce_upsell_display();
			woocommerce_output_related_products();
		}
	}
}

function wws_wooremove_prodimg( $html, $post_id ) {
return get_the_post_thumbnail( $post_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
}
add_filter('woocommerce_single_product_image_html', 'wws_wooremove_prodimg', 10, 2);

/* adding share bar */
function share_for_woocommerce() {

	?>
    	<div class="social-product-share">Partager sur <i class="icon-facebook"></i><i class="icon-pinterest"></i><?= show_share_buttons() ?></div>
    	<?php
}
// add_action( 'woocommerce_share', 'share_for_woocommerce' );