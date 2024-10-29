<?php
/*
Plugin Name: WooCommerce to Laravel Integration
Description: Sends WooCommerce product details to Laravel via API.
Version: 1.0
Author: Your Name
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_action('woocommerce_update_product', 'send_product_to_laravel', 10, 1);

function send_product_to_laravel($product_id) {
    // Prevent duplicate sends by checking a transient
    if (get_transient('product_sent_to_laravel_' . $product_id)) {
        return; // Exit if the product was already sent recently
    }

    $product = wc_get_product($product_id);
    $data = [
        'name' => $product->get_name(),
        'price' => $product->get_price(),
        'quantity' => $product->get_stock_quantity()
    ];

    $response = wp_remote_post('http://localhost:8000/api/products', [
        'method' => 'POST',
        'headers' => [
            'Content-Type' => 'application/json'
        ],
        'body' => json_encode($data)
    ]);

    if (is_wp_error($response)) {
        error_log('Error sending product data to Laravel: ' . $response->get_error_message());
    } else {
        $response_body = wp_remote_retrieve_body($response);
        $decoded_response = json_decode($response_body, true);
        if ($decoded_response && isset($decoded_response['message'])) {
            error_log('Product sent to Laravel successfully: ' . $decoded_response['message']);
            // Set a transient to prevent duplicate sending
            set_transient('product_sent_to_laravel_' . $product_id, true, 60); // Expires after 60 seconds
        } else {
            error_log('Unexpected response from Laravel');
        }
    }
}


add_action('admin_enqueue_scripts', 'sync_stock_levels_script');

function sync_stock_levels_script() {
    wp_enqueue_script('sync-stock-levels', plugin_dir_url(__FILE__) . 'sync-stock-levels.js', array('jquery'), null, true);
    wp_localize_script('sync-stock-levels', 'syncData', [
        'apiUrl' => 'http://localhost:8000/api/product-stock-levels',
        'nonce' => wp_create_nonce('wp_rest')
    ]);
}
