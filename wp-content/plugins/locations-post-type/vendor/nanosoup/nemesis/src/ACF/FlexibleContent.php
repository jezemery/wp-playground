<?php

namespace NanoSoup\Nemesis\ACF;

/**
 * Class FlexibleContent
 * @package NanoSoup\Nemesis\ACF
 */
class FlexibleContent extends BaseFields
{
    /**
     * FlexibleContent init.
     *
     * Pass through the prefix of the field group along with the
     * min and max number of layouts
     *
     * @param $args
     * @return array
     */
    public function init($args)
    {
        $defaults = [
            'prefix' => 'ss_acf',
            'min' => 1,
            'max' => 5
        ];

        $settings = array_merge($defaults, $args['settings']);

        $layouts = [];

        foreach ($args['layouts'] as $key => $value) {
            $layouts[$settings['prefix'] . $value] = $this->$value($settings['prefix']);
        }

        return [
            'key' => $settings['prefix'] . 'field_flexible_content',
            'label' => $settings['label'],
            'name' => 'flexible_content',
            'type' => 'flexible_content',
            'layouts' => $layouts,
            'button_label' => 'Add Element',
            'min' => $settings['min'],
            'max' => $settings['max'],
            'layout' => 'block',
            'collapsed' => 'true',
        ];

    }
}