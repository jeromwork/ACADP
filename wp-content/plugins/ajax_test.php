<?php
// Silence is golden.
/*
Plugin Name:ajax_test
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.7.1
Author URI: http://ma.tt/
*/

add_action( 'wp_ajax_hello', 'say_hello' );
add_action( 'wp_ajax_nopriv_hello', 'say_hello' );
function say_hello() {
    
    
    if( !empty( $_GET['name'] )){$name = esc_attr( $_GET['name'] );}
    else if( !empty( $_POST['name'] )){$name = esc_attr( $_POST['name'] );}
    else{$name = 'пользователь';}

	
	echo "Привет, $name!";
	wp_die();
}
//add_action( 'wp_enqueue_scripts', 'my_assets' );
function my_assets() {
   print_r(plugins_url( 'custom.js', __FILE__ ));
	wp_enqueue_script( 'custom', plugins_url( 'js/custom.js', __FILE__ ), array( 'jquery' ) );
	
	wp_localize_script( 'custom', 'myPlugin', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'name'    => wp_get_current_user()->display_name
	) );
}

