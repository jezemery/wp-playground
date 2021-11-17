<?php

declare(strict_types=1);

namespace WPSKL\Wordpress;

/**
 * Class Images
 * @package WPSKL\WordPress
 */
class ImageManager
{
    /**
     * Images constructor.
     */
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'customImageSizes']);
    }

    /**
     * Define the custom image sizes used throughout the designs
     *
     * Multiply all sizes by 2 to cater for high-res
     */
    public function customImageSizes(): void
    {
        $this->addImageSize('banner', 1440);
        $this->addImageSize('thumbnail', 320);
    }

    /**
     * @param      $slug
     * @param      $width
     * @param int $height
     * @param bool $crop
     */
    public function addImageSize($slug, $width, int $height = 0, bool $crop = false): void
    {
        add_image_size($slug . '-xl', $width * 2, $height * 2, $crop);
        add_image_size($slug . '-lg', $width, $height, $crop);
        add_image_size($slug . '-md', $width / 2, $height / 2, $crop);
        add_image_size($slug . '-sm', $width / 4, $height / 3, $crop);
    }
}
