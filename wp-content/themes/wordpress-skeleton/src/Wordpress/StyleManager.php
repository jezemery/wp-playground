<?php

namespace WPSKL\Wordpress;

/**
 *
 */
class StyleManager
{
    /**
     *
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueStyles']);

    }

    /**
     *
     */
    public function enqueueStyles(): void
    {

    }
}
