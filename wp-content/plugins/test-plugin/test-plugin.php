<?php
/*
Plugin Name: Test plugin
Plugin URI: https://github.com/usmon/
Description: Test Plugin from Usmon Zaripov
Author: Usmon Zaripov
*/

/**
 * Run register
 */
add_action('init', 'tp_fn_init');

/**
 * Register archive for stocks
 */
add_shortcode( 'tp_stocks_archive', 'tp_fn_stocks_archive');

/**
 * Register short code of random content
 */
add_shortcode( 'tp_random_fact', 'tp_fn_random_fact');

/**
 * Init plugin
 *
 * @return void
 */
function tp_fn_init()
{
    register_post_type('stocks', [
        'labels' => array(
            'name' => __( 'Stocks' ),
            'singular_name' => __( 'Stock' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'stocks'),
        'show_ui' => true,
        'show_in_rest' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
    ]);
}

/**
 * Stocks archive short code callback
 *
 * @return false|string
 */
function tp_fn_stocks_archive()
{
    wp_enqueue_script( 'tp-script', plugin_dir_url( __FILE__ ) . 'resources/tp_front.js', array( 'jquery' ), '1.0', true );
    $args = tp_fn_stock_query();
    ob_start();
    include dirname(__FILE__).DIRECTORY_SEPARATOR.'parts/archive-stocks.php';

    return ob_get_clean();
}

function tp_fn_stock_query()
{
    $meta_query = [];
    if ($_GET['stock_type']) {
        $meta_query[] = [
            'key' => 'stock',
            'value' => $_GET['stock_type'],
            'compare' => '=',
        ];
    }

    $args = [
        'post_type' => 'stocks',
        'posts_per_page' => 10,
        'meta_query' => $meta_query
    ];

    return $args;
}

/**
 * Short code callback for random content
 *
 * @return mixed|string
 */
function tp_fn_random_fact()
{
    $fact = '';
    $url = 'https://catfact.ninja/fact';
    $args = array(
        'method' => 'GET',
        'timeout' => 10,
    );

    $response = wp_remote_request($url, $args);

    if (is_wp_error($response)) {
        $fact = 'Failed request to: '.$url;
    } else {
        $body = wp_remote_retrieve_body($response);
        $code = wp_remote_retrieve_response_code($response); // Get the response code
        if ($code === 200) {
            $data = json_decode($body);
            $fact = $data->fact;
        }
    }

    return $fact;
}
