<?php
/*
Plugin Name: WP Blox
Plugin URI: https://www.hiohzo.com/wp-blox/
Description: Custom block helpers and loaders.
Version: 1.0.0
Author: Jez Emery (Hiohzo)
Author URI: https://www.hiohzo.com/
RequiresPHP: 7.4
*/

use WPBLOX\BlockManager;
use WPBLOX\PluginConfig;

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once(__DIR__ . '/vendor/autoload.php');
}

$config = new PluginConfig([
    'plugin_path' => __FILE__
]);

(new BlockManager($config))->run();
