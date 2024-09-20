<?php
// Theme functions go here
function musketeer_setup() {
    // Add theme support, register nav menus, etc.
}
add_action('after_setup_theme', 'musketeer_setup');

// Enqueue scripts and styles
function musketeer_enqueue_assets() {
    $asset_file = include(get_template_directory() . '/build/main.asset.php');
    
    wp_enqueue_style('musketeer-style', get_template_directory_uri() . '/build/main.css', array(), $asset_file['version']);
    
    wp_enqueue_script('musketeer-script', get_template_directory_uri() . '/build/main.js', $asset_file['dependencies'], $asset_file['version'], true);
}
add_action('wp_enqueue_scripts', 'musketeer_enqueue_assets');

// Autoload Composer dependencies
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}
