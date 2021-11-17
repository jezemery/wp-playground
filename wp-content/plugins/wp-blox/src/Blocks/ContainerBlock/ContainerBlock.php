<?php

declare(strict_types=1);

namespace WPBLOX\Blocks\ContainerBlock;

use WPBLOX\BlockHelper;
use WPBLOX\BlockScript;
use WPBLOX\BlockStyle;
use WPBLOX\PluginConfig;

/**
 * Location Map Block
 */
class ContainerBlock extends BlockHelper
{

    /**
     * Set up all actions and hooks for block
     */
    public function __construct(PluginConfig $config, string $dir = '')
    {
        parent::__construct($config, __DIR__);
        $this->setBlockName('container');
    }

    public function activated()
    {

    }

    /**
     *
     */
    public function loadFrontendStyles(): void
    {
        $this->conditionallyLoadStyles(
            $this->getBlockName(true),
            (new BlockStyle('container-block'))->setUri($this->getDistPath(__DIR__, 'block.dist.css'))
        );
    }
}
