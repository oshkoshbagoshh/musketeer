<?php
// Theme functions go here
function musketeer_setup() {
    // Add theme support, register nav menus, etc.
}
add_action('after_setup_theme', 'musketeer_setup');

// Autoload Composer dependencies
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}
