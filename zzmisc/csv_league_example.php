<?php

use League\Csv\Reader;

function musketeer_import_settings_from_csv($csv_path) {
    $csv = Reader::createFromPath($csv_path, 'r');
    $csv->setHeaderOffset(0);

    $settings = [];
    foreach ($csv as $record) {
        $settings[$record['option_name']] = $record['option_value'];
    }

    return $settings;
}

// Usage in your theme
$imported_settings = musketeer_import_settings_from_csv(get_template_directory() . '/data/initial_settings.csv');

foreach ($imported_settings as $option_name => $option_value) {
    update_option($option_name, $option_value);
}