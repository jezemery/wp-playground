<?php

declare(strict_types=1);

namespace WPBLOX;

use WPBLOX\Blocks\ContainerBlock\ContainerBlock;
use WPBLOX\Blocks\LocationListBlock\LocationListBlock;
use WPBLOX\Blocks\LocationMapBlock\LocationMapBlock;

/**
 * A small class to help with the management of blocks
 * These should be able to be migrated to the new site when it happens
 * I would suggest maintaining styles/js within each block for ease of use
 *
 * @author Jez Emery <consulting@hiohzo.com>
 */
class BlockManager
{
    /**
     * @var PluginConfig
     */
    public PluginConfig $config;

    /**
     * construct
     *
     * @param PluginConfig $config
     */
    public function __construct(PluginConfig $config)
    {
        $this->config = $config;
        add_filter('block_categories_all', [$this, 'add_block_category']);
    }

    /**
     *
     * @param array $categories Array of block categories.
     *
     * @return array
     */
    public function add_block_category(array $categories): array
    {
        $category_slugs = wp_list_pluck($categories, 'slug');
        return in_array('wp-blox', $category_slugs, true) ? $categories : array_merge(
            [
                [
                    'slug' => 'wp-blox',
                    'title' => __('wpblox', 'WP Blox'),
                    'icon' => null,
                ],
            ],
            $categories
        );
    }

    /**
     * run
     *
     * @return void
     */
    public function run(): void
    {
        new ContainerBlock($this->config);
    }
}
