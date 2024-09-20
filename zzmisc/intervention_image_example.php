<?php
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Custom function to resize and watermark images
 *
 * @param string $image_path Path to the original image
 * @param int $width Desired width of the resized image
 * @param int $height Desired height of the resized image
 * @param string $watermark_text Text to use as watermark
 * @return string Path to the modified image
 */
function musketeer_resize_and_watermark($image_path, $width, $height, $watermark_text) {
    // Make sure the uploads directory exists
    $upload_dir = wp_upload_dir();
    $output_dir = $upload_dir['basedir'] . '/musketeer-processed/';
    if (!file_exists($output_dir)) {
        wp_mkdir_p($output_dir);
    }

    // Generate a unique filename for the processed image
    $filename = basename($image_path);
    $output_filename = 'musketeer_' . time() . '_' . $filename;
    $output_path = $output_dir . $output_filename;

    // Process the image
    $img = Image::make($image_path);
    
    // Resize the image
    $img->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });

    // Add watermark
    $img->text($watermark_text, $img->width() - 10, $img->height() - 10, function($font) {
        $font->file(get_template_directory() . '/assets/fonts/OpenSans-Regular.ttf');
        $font->size(24);
        $font->color('#ffffff');
        $font->align('right');
        $font->valign('bottom');
    });

    // Save the processed image
    $img->save($output_path);

    return $upload_dir['baseurl'] . '/musketeer-processed/' . $output_filename;
}

/**
 * Example usage in a theme template or function
 */
function musketeer_display_processed_image($attachment_id) {
    $image_path = get_attached_file($attachment_id);
    $processed_image_url = musketeer_resize_and_watermark($image_path, 800, 600, 'Musketeer Theme');

    echo '<img src="' . esc_url($processed_image_url) . '" alt="Processed Image">';
}