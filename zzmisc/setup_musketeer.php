#!/usr/bin/env php
<?php

// Set the theme name
$themeName = 'Musketeer';
$themeSlug = strtolower($themeName);

// Define the directory structure
$directories = [
    '',
    'assets',
    'assets/css',
    'assets/js',
    'assets/images',
    'inc',
    'template-parts',
    'template-parts/content',
    'template-parts/header',
    'template-parts/footer',
];

// Define the files to be created
$files = [
    'style.css' => "/*
Theme Name: {$themeName}
Theme URI: http://example.com/musketeer-theme/
Author: Your Name
Author URI: http://example.com
Description: A custom theme for a digital advertising consulting agency.
Version: 1.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: {$themeSlug}
Tags: digital-advertising, consulting, responsive-layout
*/",
    'functions.php' => "<?php
// Theme functions go here
function {$themeSlug}_setup() {
    // Add theme support, register nav menus, etc.
}
add_action('after_setup_theme', '{$themeSlug}_setup');

// Autoload Composer dependencies
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}
",
    'index.php' => "<?php get_header(); ?>
<main id='primary' class='site-main'>
    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', get_post_type());
        endwhile;
        the_posts_navigation();
    else :
        get_template_part('template-parts/content', 'none');
    endif;
    ?>
</main>
<?php get_footer(); ?>",
    'header.php' => "<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset='<?php bloginfo('charset'); ?>'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id='masthead' class='site-header'>
    <!-- Add your header content here -->
</header>",
    'footer.php' => "    <footer id='colophon' class='site-footer'>
        <!-- Add your footer content here -->
    </footer>
    <?php wp_footer(); ?>
</body>
</html>",
    'sidebar.php' => "<?php
if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>
<aside id='secondary' class='widget-area'>
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>",
    'template-parts/content/content.php' => "<article id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
    <header class='entry-header'>
        <?php the_title('<h1 class=\"entry-title\">', '</h1>'); ?>
    </header>
    <div class='entry-content'>
        <?php the_content(); ?>
    </div>
</article>",
    'assets/css/style.css' => "/* Main theme styles */",
    'assets/js/main.js' => "// Main theme JavaScript",
    'composer.json' => '{
    "name": "your-vendor-name/musketeer",
    "description": "A custom WordPress theme for a digital advertising consulting agency",
    "type": "wordpress-theme",
    "license": "GPL-2.0-or-later",
    "require": {
        "php": ">=7.4"
    },
    "require-dev": {
        "squizlabs/php_codesniffer": "^3.5",
        "wp-coding-standards/wpcs": "^2.3"
    },
    "scripts": {
        "phpcs": "phpcs --standard=WordPress",
        "phpcbf": "phpcbf --standard=WordPress"
    }
}',
    '.gitignore' => "/vendor/
node_modules/
.DS_Store",
];

// Create directories
foreach ($directories as $dir) {
    $path = __DIR__ . "/{$themeSlug}/{$dir}";
    if (!is_dir($path) && !mkdir($path, 0755, true)) {
        die("Failed to create directory: {$path}\n");
    }
}

// Create files
foreach ($files as $file => $content) {
    $path = __DIR__ . "/{$themeSlug}/{$file}";
    if (file_put_contents($path, $content) === false) {
        die("Failed to create file: {$path}\n");
    }
}

// Initialize Git repository
$gitInit = shell_exec("cd {$themeSlug} && git init");
echo "Git repository initialized.\n";

// Initialize Composer
$composerInit = shell_exec("cd {$themeSlug} && composer install");
echo "Composer dependencies installed.\n";

echo "Musketeer theme structure created successfully with Git and Composer!\n";