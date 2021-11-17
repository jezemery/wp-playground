<?php

namespace NanoSoup\Nemesis\PostTypes;

/**
 * Class PostTypes
 * @package NanoSoup\Nemesis\PostTypes
 */
class PostTypes
{
    /**
     * @param $name
     * @param $singular
     * @param $multiple
     * @param $slug
     * @param $args
     */
    public function registerPostType($name, $singular, $multiple, $slug, $args = [])
    {
        $defaults = [
            'labels' => [
                'name' => $multiple,
                'singular_name' => $singular,
                'add_new' => 'Add New',
                'add_new_item' => 'Add New ' . $singular,
                'edit_item' => 'Edit ' . $singular,
                'new_item' => 'New ' . $singular,
                'view_item' => 'View ' . $singular,
                'view_items' => 'View ' . $multiple,
                'search_items' => 'Search ' . $multiple,
                'not_found' => 'No ' . $multiple . ' found',
                'not_found_in_trash' => 'No ' . $multiple . ' found in Trash',
                'parent_item_colon' => 'Parent ' . $singular . ':',
                'all_items' => 'All ' . $multiple,
                'archives' => $singular . ' Archives',
                'attributes' => $singular . ' Attributes',
                'insert_into_item' => 'Insert into ' . $singular,
                'uploaded_to_this_item' => 'Uploaded to this ' . $singular,
                'featured_image' => 'Featured Image',
                'set_featured_image' => 'Set featured image',
                'remove_featured_image' => 'Remove featured image',
                'use_featured_image' => 'Use as featured image',
                'menu_name' => $multiple,
                'filter_items_list' => 'Filter ' . $multiple .' list',
                'items_list_navigation' => 'Current' . $singular,
                'items_list' => $multiple . ' list',
                'name_admin_bar' => $singular,
                'item_published' => $singular . ' published',
                'item_published_privately' => $singular . ' published privately',
                'item_reverted_to_draft' => $singular . ' reverted to draft',
                'item_scheduled' => $singular . ' scheduled',
                'item_updated' => $singular . ' updated',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'hierarchical' => false,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-palmtree',
            'supports' => [
                'title',
                'editor',
                'author',
                'thumbnail',
                'revisions',
                'page-attributes',
            ],
            'has_archive' => true,
            'rewrite' => [
                'slug' => $slug,
                'with_front' => false,
                'feeds' => false,
                'pages' => true,
            ],
        ];
        $args = array_merge($defaults, $args);

        register_post_type($name, $args);
    }

    /**
     * @param $name
     * @param $singular
     * @param $multiple
     * @param $slug
     * @param $postTypes
     * @param $args
     */
    public function registerCustomTaxonomy($name, $singular, $multiple, $slug, $postTypes = [], $args = [])
    {
        $defaults = [
            'labels' => [
                'name' => $multiple,
                'singular_name' => $singular,
                'menu_name' => $singular,
                'all_items' => 'All ' . $singular,
                'edit_item' => 'Edit ' . $singular,
                'view_item' => 'View ' . $singular,
                'update_item' => 'Update ' . $singular,
                'add_new_item' => 'Add New ' . $singular,
                'new_item_name' => 'New ' . $singular,
                'parent_item' => 'Parent ' . $singular,
                'parent_item_colon' => 'Parent ' . $singular . ':',
                'search_items' => 'Search ' . $singular,
                'popular_items' => 'Popular ' . $singular,
                'separate_items_with_commas' => 'Separate ' . $singular . ' with commas',
                'add_or_remove_items' => 'Add or remove ' . $singular,
                'choose_from_most_used' => 'Choose from the most used ' . $singular,
                'not_found' => 'No ' . $singular . ' found',
                'back_to_items' => 'Back to ' . $multiple,
            ],
            'show_ui' => true,
            'show_in_rest' => true,
            'hierarchical' => true,
            'rewrite' => [
                'slug' => $slug,
                'with_front' => false,
                'hierarchical' => true,
            ],
        ];
        $args = array_merge($defaults, $args);

        register_taxonomy($name, $postTypes, $args);
    }
}
