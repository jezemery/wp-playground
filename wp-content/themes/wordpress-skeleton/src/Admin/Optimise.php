<?php

namespace WPSKL\Admin;

use NanoSoup\Zeus\Wordpress\OptimiseWP;

/**
 *
 */
class Optimise extends OptimiseWP
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct();

        add_action('wp_enqueue_scripts', [__CLASS__, 'removeBlockLibraryCss']);
    }

    /**
     *
     */
    public static function removeBlockLibraryCss(): void
    {
        wp_dequeue_style('wp-block-library');
    }
}
