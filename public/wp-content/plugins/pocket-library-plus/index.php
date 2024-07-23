<?php
/*
 * Plugin Name:       Pocket Library Plus
 * Description:       A plugin that extends Pocket Library functionality
 * Version:           1.0.0
 * Requires at least: 6.5.5
 * Requires PHP:      8.0
 * Author:            Bartosz Zajączkowski
 * Text Domain:       pocket-library-plus
 * Domain Path:       /languages
 */

if (!function_exists('add_action')) {
    echo "You shouldn't be here. This is my swamp";
    exit;
}

//  Setup
define('PLP_PLUGIN_DIR', plugin_dir_path(__FILE__));

//  Include
$rootFiles = glob(PLP_PLUGIN_DIR . 'includes/*.php');
$subDirectoryFiles = glob(PLP_PLUGIN_DIR . "includes/**/*.php");
$allFiles = array_merge($rootFiles, $subDirectoryFiles);

foreach($allFiles as $filename) {
    include_once($filename);
}

//  Hooks
add_action('init', 'plp_register_blocks');
