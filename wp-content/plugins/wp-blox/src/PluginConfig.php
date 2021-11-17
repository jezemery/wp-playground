<?php

declare(strict_types=1);

namespace WPBLOX;

/**
 * @property mixed $plugin_path
 * @author Jez Emery <consulting@hiohzo.com>
 */
class PluginConfig
{
    /**
     * @var array
     */
    private array $config;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param $get
     * @return mixed
     */
    public function __get($get)
    {
        return $this->config[$get];
    }
}
