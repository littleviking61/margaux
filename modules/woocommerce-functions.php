<?php 

function get_product_category_name($cat_id) {
	// get name of the cat
	if( $term = get_term_by( 'id', $cat_id, 'product_cat' ) ){
	    return $term->name;
	}
}

function get_product_main_category($prod_terms, $getId) {
	if(empty($prod_terms)) {
		global $product;
		$prod_terms = $product->category_ids;
	}

	foreach ($prod_terms as $prod_term) {
    // gets an array of all parent category levels
    $product_parents = get_ancestors( $prod_term, 'product_cat' );  

   	if(count($product_parents) > 0) {
   		$last_parent_cat = array_slice($product_parents, -1, 1, true);
   		foreach($last_parent_cat as $last_parent_cat_value){
   		    // $last_parent_cat_value is the id of the most top level category, can be use whichever one like
   		    $main_cat_id = $last_parent_cat_value;
   		}
   	}else{
	    $main_cat_id = $prod_term;
   	}
	}

	if(!$getId){
		return get_product_category_name($main_cat_id);
	}else{
		return $main_cat_id;
	}
}

function woocommerce_template_loop_product_thumbnail() {
    echo '<div class="thumbnail">'.woocommerce_get_product_thumbnail().'</div>';
}

?>