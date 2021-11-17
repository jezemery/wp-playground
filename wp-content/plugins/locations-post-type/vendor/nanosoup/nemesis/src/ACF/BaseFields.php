<?php

namespace NanoSoup\Nemesis\ACF;

/**
 * Class BaseFields
 * @package NanoSoup\Nemesis\ACF
 */
class BaseFields
{

    /**
     * Basic Text field
     * @param $prefix
     * @param string $label
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function text($prefix, $label = 'Title', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_text_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'text',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
        ];
    }

    /**
     * Basic Textarea field
     * @param $prefix
     * @param string $label
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function textarea($prefix, $label = 'Content', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_textarea_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'textarea',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
        ];
    }

    /**
     * Basic Number field
     * @param $prefix
     * @param string $label
     * @param string $step
     * @param string $min
     * @param string $max
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function number($prefix, $label = 'Number', $step = '', $min = '', $max = '', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_number_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'number',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'step' => $step,
            'min' => $min,
            'max' => $max,
        ];
    }

    /**
     * Basic Email field
     * @param $prefix
     * @param string $label
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function email($prefix, $label = 'Email', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_email_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'email',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
        ];
    }

    /**
     * Basic URL field
     * @param $prefix
     * @param string $label
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function url($prefix, $label = 'URL', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_url_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'url',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
        ];
    }

    /**
     * Basic Password field
     * @param $prefix
     * @param string $label
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function password($prefix, $label = 'Password', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_password_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'password',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
        ];
    }

    /**
     * Basic Image field
     * @param $prefix
     * @param string $label
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function image($prefix, $label = 'Image', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_image_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'image',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'return_format' => 'ID',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => 0,
            'min_height' => 0,
            'max_width' => 0,
            'max_height' => 0,
        ];
    }

    /**
     * Basic WYSIWYG content area
     * @param $prefix
     * @param string $label
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function wysiwyg($prefix, $label = 'Main content', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_main_content_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'wysiwyg',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
            'delay' => 1,
        ];
    }

    /**
     * Basic File field
     * @param $prefix
     * @param string $label
     * @param string $mimeTypes
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function file($prefix, $label = 'File', $mimeTypes = '', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_file_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'file',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'return_format' => 'ID',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_size' => 0,
            'max_size' => 0,
            'mime_types' => $mimeTypes,
        ];
    }

    /**
     * Basic Gallery field
     * @param $prefix
     * @param string $label
     * @param string $mimeTypes
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function gallery($prefix, $label = 'Gallery', $mimeTypes = '', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_gallery_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'gallery',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min' => 0,
            'max' => 0,
            'min_size' => 0,
            'max_size' => 0,
            'mime_types' => $mimeTypes,
        ];
    }

    /**
     * Basic Select field
     * @param $prefix
     * @param string $label
     * @param array $choices
     * @param int $multiple
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function select($prefix, $label = 'Choices', $choices = [], $multiple = 0, $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_select_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'select',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'choices' => $choices,
            'multiple' => $multiple,
            'ui' => $multiple ? 1 : 0,
            'ajax' => $multiple ? 1 : 0,
            'allow_null' => !$required,
        ];
    }

    /**
     * Basic Checkbox field
     * @param $prefix
     * @param string $label
     * @param array $choices
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function checkbox($prefix, $label = 'Choices', $choices = [], $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_checkbox_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'checkbox',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'choices' => $choices,
            'layout' => 0,
        ];
    }

    /**
     * Basic Radio field
     * @param $prefix
     * @param string $label
     * @param array $choices
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function radio($prefix, $label = 'Choices', $choices = [], $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_radio_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'radio',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'choices' => $choices,
            'layout' => 0,
        ];
    }

    /**
     * True/False Choice field
     * @param $prefix
     * @param string $label
     * @param int|string $message
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function choice($prefix, $label = 'Choice', $message = 0, $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_choice_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'true_false',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'message' => $message,
            'ui' => 1,
        ];
    }

    /**
     * Button Group field
     * @param $prefix
     * @param string $label
     * @param array $choices
     * @param string $return
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function buttonGroup($prefix, $label = 'Button Group', $choices = [], $return = 'array', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_button_group_' . $this->generateUniquePrefix($prefix, $label),
            'label' => 'Button group',
            'name' => $this->generateName($label),
            'type' => 'button_group',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'choices' => $choices,
            'default_value' => $defaultValue,
            'return_format' => $return,
        ];
    }

    /**
     * Basic Post field
     * @param $prefix
     * @param string $label
     * @param int $multiple
     * @param string $return
     * @param mixed $postType
     * @param mixed $taxonomy
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function post($prefix, $label = 'Post', $multiple = 0, $postType = '', $taxonomy = '', $return = 'object', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_post_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'post_object',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'multiple' => $multiple,
            'post_type' => $postType,
            'taxonomy' => $taxonomy,
            'return_format' => $return,
            'allow_null' => !$required,
        ];
    }

    /**
     * Basic Page Link field
     * @param $prefix
     * @param string $label
     * @param int $multiple
     * @param mixed $post_type
     * @param mixed $taxonomy
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function link($prefix, $label = 'Link', $multiple = 0, $post_type = '', $taxonomy = '', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_link_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'page_link',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'multiple' => $multiple,
            'post_type' => $post_type,
            'taxonomy' => $taxonomy,
            'allow_null' => !$required,
        ];
    }

    /**
     * Basic Relationship field
     * @param $prefix
     * @param string $label
     * @param int $multiple
     * @param mixed $postType
     * @param mixed $taxonomy
     * @param string $return
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function relationship($prefix, $label = 'Relationship', $multiple = 0, $postType = '', $taxonomy = '', $return = 'object', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_relationship_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'relationship',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'multiple' => $multiple,
            'post_type' => $postType,
            'taxonomy' => $taxonomy,
            'return_format' => $return,
            'add_term' => 0,
            'allow_null' => !$required,
        ];
    }

    /**
     * Basic Taxonomy field
     * @param $prefix
     * @param string $label
     * @param int $multiple
     * @param string $return
     * @param mixed $fieldType
     * @param mixed $taxonomy
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function taxonomy($prefix, $label = 'Taxonomy', $multiple = 0, $fieldType = 'select', $taxonomy = '', $return = 'object', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_taxonomy_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'taxonomy',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'multiple' => $multiple,
            'field_type' => $fieldType,
            'taxonomy' => $taxonomy,
            'return_format' => $return,
            'add_term' => 0,
            'allow_null' => !$required,
        ];
    }

    /**
     * User field
     * @param $prefix
     * @param string $label
     * @param array $roles
     * @param int $multiple
     * @param string $return
     * @param int $conditions
     * @param string $instructions
     * @param int $required
     * @return array
     */
    public function user($prefix, $label = 'User', $roles = [], $multiple = 0, $return = 'array', $conditions = 0, $instructions = '', $required = 0)
    {
        return [
            'key' => 'field_user_' . $this->generateUniquePrefix($prefix, $label),
            'label' => 'User',
            'name' => $this->generateName($label),
            'type' => 'user',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'role' => $roles,
            'multiple' => $multiple,
            'return_format' => $return,
            'allow_null' => !$required,
        ];
    }

    /**
     * Google Map field
     * @param $prefix
     * @param string $label
     * @param int $zoom
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function map($prefix, $label = 'Map', $zoom = 16, $conditions = 0, $instructions = 'Centralise the map over the location (at any convenient zoom level).', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_map_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'google_map',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'zoom' => $zoom,
        ];
    }

    /**
     * Date Picker field
     * @param $prefix
     * @param string $label
     * @param string $displayFormat
     * @param string $returnFormat
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function date($prefix, $label = 'Date', $displayFormat = 'd/m/Y', $returnFormat = 'd/m/Y', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_date_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'date_picker',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'display_format' => $displayFormat,
            'return_format' => $returnFormat,
        ];
    }

    /**
     * Time Picker field
     * @param $prefix
     * @param string $label
     * @param string $displayFormat
     * @param string $returnFormat
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function time($prefix, $label = 'Time', $displayFormat = 'g:i a', $returnFormat = 'g:i a', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_time_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'time_picker',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'display_format' => $displayFormat,
            'return_format' => $returnFormat,
        ];
    }

    /**
     * Date Time Picker field
     * @param $prefix
     * @param string $label
     * @param string $displayFormat
     * @param string $returnFormat
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function datetime($prefix, $label = 'Date Time', $displayFormat = 'd/m/Y g:i a', $returnFormat = 'd/m/Y g:i a', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_date_time_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'date_time_picker',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
            'display_format' => $displayFormat,
            'return_format' => $returnFormat,
        ];
    }

    /**
     * @param $prefix
     * @param string $label
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function colour($prefix, $label = 'Colour', $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_colour_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'color_picker',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
        ];
    }

    /**
     * Message field
     * @param $prefix
     * @param string $label
     * @param string $message
     * @param int $conditions
     * @param string $instructions
     * @return array
     */
    public function message($prefix, $label = 'Message', $message = '', $conditions = 0, $instructions = '')
    {
        return [
            'key' => 'field_message_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'name' => $this->generateName($label),
            'type' => 'message',
            'instructions' => $instructions,
            'conditional_logic' => $conditions,
            'message' => $message,
            'new_lines' => 'wpautop',
            'esc_html' => 0
        ];
    }

    /**
     * Tab field
     * @param $prefix
     * @param $label
     * @param int $conditions
     * @param string $instructions
     * @param string $defaultValue
     * @param int $required
     * @return array
     */
    public function addTab($prefix, $label, $conditions = 0, $instructions = '', $defaultValue = '', $required = 0)
    {
        return [
            'key' => 'field_' . $this->generateUniquePrefix($prefix, $label),
            'label' => $label,
            'type' => 'tab',
            'instructions' => $instructions,
            'required' => $required,
            'conditional_logic' => $conditions,
            'default_value' => $defaultValue,
        ];
    }

    /**
     * Generate name field from label
     * @param $label
     * @return string
     */
    public function generateName($label)
    {
        $label = preg_replace('/[^A-Za-z0-9]+/', '_', $label);
        return strtolower($label);
    }

    /**
     * Generate a unique prefix
     * @param $prefix
     * @param $label
     * @return string
     */
    public function generateUniquePrefix($prefix, $label)
    {
        return md5($prefix . strtolower(str_replace(' ', '_', $label)));
    }
}
