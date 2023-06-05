<?php 
/*
 * Plugin Name: Cami Appointment Scheduler
 * Plugin URI: 
 * Description: A scheduling tool for services websites. 
 * Version: 0.0.1
 * Author: Nordov
 * Author URI: https://nordov.dev
 */

add_action('admin_menu', 'function_create_menu');
// Create WordPress admin menu
function function_create_menu(){

//The icon in Base64 format
$icon_base64 = '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="#000000" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M36.66,54.45H8.84A2.5,2.5,0,0,1,6.35,52V12.12A2.49,2.49,0,0,1,8.84,9.63H48.68a2.49,2.49,0,0,1,2.49,2.49v22.4"></path><line x1="6.35" y1="20.63" x2="51.17" y2="20.63"></line><line x1="16.46" y1="9.63" x2="16.46" y2="4.63"></line><line x1="40.42" y1="9.63" x2="40.42" y2="4.63"></line><circle cx="45.22" cy="45.44" r="12.43"></circle><polyline points="45.22 36.7 45.22 45.82 49.57 49.16"></polyline></g></svg>';

$page_title = 'Appointment Schedule';
$menu_title = 'Appointments';
$icon_data_uri = 'data:image/svg+xml;base64,' . base64_encode( $icon_base64 );
$position   = '20';
$capability = 'manage_options';
$menu_slug  = 'camiApp';
$function   = 'test_page';

add_menu_page(
    $page_title,
    $menu_title,
    $capability,
    $menu_slug,
    $function,
    $icon_data_uri,
    $position
);

}

function enqueue_cami_scheduler_react() {
    // wp_enqueue_style('cami-scheduler-react', plugin_dir_url(__FILE__) . 'my-plugin-react/build/static/css/main.css');
    wp_enqueue_script('cami-scheduler-react', plugin_dir_url(__FILE__) . './build/index.js', array( 'wp-element' ), '1.0', true);
}
add_action('admin_enqueue_scripts', 'enqueue_cami_scheduler_react');

// Create WordPress plugin page
function test_page()
{
?>
    <h1>Cami Appointment Scheduler</h1>

    <div id="jobplace">
    <h2>Loading...</h2>
    </div>

<?php
}

?>