<?php

use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

function musketeer_extract_colors_from_image($image_path) {
    $palette = Palette::fromFilename($image_path);
    $extractor = new ColorExtractor($palette);
    
    // Extract 5 most prominent colors
    $colors = $extractor->extract(5);
    
    return array_map(function($color) {
        return Color::fromIntToHex($color);
    }, $colors);
}

// Usage in your theme
$featured_image_id = get_post_thumbnail_id();
$featured_image_path = get_attached_file($featured_image_id);
$color_palette = musketeer_extract_colors_from_image($featured_image_path);

// Now you can use $color_palette in your theme, e.g., to set dynamic CSS variables