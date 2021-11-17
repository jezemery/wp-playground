<?php
/*
Plugin Name: Location Post Types
Plugin URI: https://www.apex8.co.uk/
Description: Custom post type for Locations
Version: 1.0.0
Author: Jez Emery (Apex8)
Author URI: https://www.apex8.co.uk/
*/

use NanoSoup\Nemesis\PostTypes\PostTypes;

require_once __DIR__ . '/vendor/autoload.php';

add_action('init', 'create_posttype_locations');

register_activation_hook(__FILE__, 'location_post_type_activate');

/**
 * Activate the plugin.
 */
function location_post_type_activate()
{
    flush_rewrite_rules();
}

function create_posttype_locations()
{
    if (!function_exists('register_post_type')) {
        return false;
    }

    (new PostTypes())->registerPostType('location', 'Location', 'Locations', 'location', [
        'hierarchical' => true,
        'menu_icon' => 'dashicons-location'
    ]);
}
