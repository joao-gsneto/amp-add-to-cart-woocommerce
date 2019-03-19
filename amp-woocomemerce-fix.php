<?php

/**
 * @package Amp_Woocommerce_Fix
 * @version 0.1
 */
/*
Plugin Name: Amp Woocommerce Fix
Plugin URI: http://www.joaoneto.blog.br/
Description: Fix Add to Cart Woocommerce no AMP
Author: Joao Neto
Version: 0.1
Author URI: http://www.joaoneto.blog.br
*/

function _amp_fix_add_to_cart_hide_button() {
    echo 1;exit;
    echo ' button.single_add_to_cart_button.button.alt {
        display: none;
    } ';
}

function _amp_fix_add_to_cart() {
    global $product;

    //print_r($product);

    echo '<a class="single_add_to_cart_button button alt user-valid valid" href="?add-to-cart='. $product->get_id() . '">Adicionar ao carrinho</a>';
    echo '<style amp-custom>button.single_add_to_cart_button.button.alt {
        display: none;
    }</style>';

}


add_action( 'wp', function(){
    add_action( 'amp_post_template_css', '_amp_fix_add_to_cart_hide_button' );

if ( false !== apply_filters( 'amp_is_enabled', true ) ) {
    if( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
        add_action( 'woocommerce_after_add_to_cart_button', '_amp_fix_add_to_cart', 10, 3 );
    }

    return;
   
}}, 10, 3 );