<?php

namespace NanoSoup\Nemesis\ACF\Blocks;

/**
 * Interface BlockInterface
 * @package NanoSoup\Nemesis\ACF
 */
interface BlockInterface
{
    /**
     * BlockInterface constructor.
     */
    public function __construct();

    /**
     * Register the block with ACF
     *
     * @return mixed
     */
    public function registerBlock();

    /**
     * Render the block using HTML/Twig
     *
     * @param $block
     * @return mixed
     */
    public static function renderBlock($block);
}