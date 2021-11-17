<?php
declare(strict_types=1);

namespace WPSKL\Wordpress;

use Walker_Nav_Menu;

/**
 * This is mostly a class taken from GitHub, I need to refactor everything to make it a little sane...
 * TODO:: CLEANUP & REFACTOR
 */
class BEMMenuWalker extends Walker_Nav_Menu
{

    /**
     * @param $css_class_prefix
     */
    public function __construct($css_class_prefix)
    {

        $this->css_class_prefix = $css_class_prefix;

        // Define menu item names appropriately

        $this->item_css_class_suffixes = [
            'list' => '__list',
            'item' => '__item',
            'link' => '__link',
            'parent_item' => '__item--parent',
            'active_item' => '__item--current',
            'parent_of_active_item' => '__item--parent--current',
            'ancestor_of_active_item' => '__item--ancestor-current',
            'sub_menu' => '__sub-list',
            'sub_menu_item' => '__sub-item',
            'sub_link' => '__sub-link',
        ];

    }

    /**
     * @param object $element
     * @param array $children_elements
     * @param int $max_depth
     * @param int $depth
     * @param array $args
     * @param string $output
     */
    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {

        $id_field = $this->db_fields['id'];

        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    /**
     * @param string $output
     * @param int $depth
     * @param array $args
     */
    public function start_lvl(&$output, $depth = 1, $args = [])
    {

        $real_depth = $depth + 1;

        $indent = str_repeat("\t", $real_depth);

        $prefix = $this->css_class_prefix;
        $suffix = $this->item_css_class_suffixes;

        $classes = [
            $prefix . $suffix['sub_menu'],
            $prefix . $suffix['sub_menu'] . '--level-' . $real_depth
        ];

        $class_names = implode(' ', $classes);

        $output .= "\n" . $indent . '<button class="' . $prefix . '__sub-trigger" data-action="subnav-toggle"><span class="icon icon--chevron-right">Open</span></button><ul class="' . $class_names . '">' . "\n";
    }

    /**
     * @param string $output
     * @param \WP_Post $item
     * @param int $depth
     * @param null $args
     * @param int $id
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {

        global $wp_query;

        $indent = ($depth > 0 ? str_repeat('    ', $depth) : ''); // code indent

        $prefix = $this->css_class_prefix;
        $suffix = $this->item_css_class_suffixes;

        // Item classes
        $item_classes = [
            'item_class' => $depth == 0 ? $prefix . $suffix['item'] : '',
            'parent_class' => is_array($args) ? $args['has_children'] ? $parent_class = $prefix . $suffix['parent_item'] : '' : '',
            'active_page_class' => is_iterable($item->classes) ? in_array('current-menu-item', $item->classes) ? $prefix . $suffix['active_item'] : '' : '',
            'active_parent_class' => is_iterable($item->classes) ? in_array('current-menu-parent', $item->classes) ? $prefix . $suffix['parent_of_active_item'] : '' : '',
            'active_ancestor_class' => is_iterable($item->classes) ? in_array('current-menu-ancestor', $item->classes) ? $prefix . $suffix['ancestor_of_active_item'] : '' : '',
            'depth_class' => $depth >= 1 ? $prefix . $suffix['sub_menu_item'] . ' ' . $prefix . $suffix['sub_menu_item'] . '--' . $depth : '',
            'item_id_class' => $prefix . '__item--' . $item->object_id,
            'user_class' => is_array($item->classes) ? $item->classes[0] !== '' ? $prefix . '__item--' . $item->classes[0] : '' : ''
        ];

        // convert array to string excluding any empty values
        $class_string = implode('  ', array_filter($item_classes));

        // Add the classes to the wrapping <li>
        $output .= $indent . '<li class="' . $class_string . '">';

        // Link classes
        $link_classes = [
            'item_link' => $depth === 0 ? $prefix . $suffix['link'] : '',
            'depth_class' => $depth >= 1 ? $prefix . $suffix['sub_link'] . '  ' . $prefix . $suffix['sub_link'] . '--' . $depth : '',
        ];

        $link_class_string = implode('  ', array_filter($link_classes));
        $link_class_output = 'class="' . $link_class_string . '"';

        // link attributes
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        // Create link markup
        $item_output = $args['before'];
        $item_output .= '<a' . $attributes . ' ' . $link_class_output . '>';
        $item_output .= $args['link_before'];
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= $args['link_after'];
        $item_output .= $args['after'];
        $item_output .= '</a>';

        // Filter <li>

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

}