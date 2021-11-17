<?php

namespace NanoSoup\Nemesis\ACF;

/**
 * Class Group
 * @package NanoSoup\Nemesis\ACF
 */
class Group extends BaseFields
{
    /**
     * Group init
     *
     * @param $args
     * @return array
     */
    public function init($args)
    {
        $defaults = [
            'label' => '',
            'prefix' => 'ss_acf',
            'conditions' => ''
        ];

        $settings = array_merge($defaults, $args['settings']);

        return [
            'key' => $this->generateUniquePrefix($settings['prefix'], $settings['label']) . 'field_group',
            'label' => $settings['label'],
            'name' => $this->generateName($settings['label']),
            'type' => 'group',
            'sub_fields' => $args['elements'],
            'layout' => 'block',
            'collapsed' => 'true',
            'conditions' => $settings['conditions']
        ];
    }
}
