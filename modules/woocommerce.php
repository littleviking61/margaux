<?php 

require_once "woocommerce-functions.php";

function sv_remove_product_page_skus( $enabled ) {
    if ( ! is_admin() && is_product() ) {
        return false;
    }

    return $enabled;
}
add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );

// define the woocommerce_shop_loop_item_title callback 
function action_woocommerce_shop_loop_item_title( $woocommerce_template_loop_product_title, $int ) { ?>
	<h3 class="main-cat"><?= get_product_main_category() ?></h3>
	<?php
};          
// add the action
remove_action('woocommerce_shop_loop_item_title', 10); 
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

add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
    if ( $args->theme_location == 'top-menu') {
    		$active = get_the_ID() == 5 ? ' current-menu-item' : '';
        $items .= '<li class="panier'. $active .'"> '.do_shortcode( '[cart_button icon="panier" show_items="true"]').'</li>';
    }
    return $items;
}

/** woocommerce: change position of add-to-cart on single product **/
remove_action( 'woocommerce_single_product_summary', 
           'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 
        'woocommerce_template_single_add_to_cart', 45 );

// Automatically shortens WooCommerce product titles on the main shop, category, and tag pages
// to a set number of characters 
function check_alternatif_title( $title, $id ) {
  if ( get_post_type( $id ) === 'product' ) {
  	$alternatif_title = get_field('titre_alternatif',$id);
  	if(!empty($alternatif_title)) {
  		return $alternatif_title;
  	}else{
	    return $title;
  	}
  } else {
    return $title;
  }
}
add_filter( 'the_title', 'check_alternatif_title', 10, 2 );

// Change number related products
 
add_filter( 'woocommerce_output_related_products_args', 'bbloomer_change_number_related_products' );
 
function bbloomer_change_number_related_products( $args ) {
 
 $args['posts_per_page'] = 16; // # of related products
 $args['columns'] = 4; // # of columns per row
 return $args;
}