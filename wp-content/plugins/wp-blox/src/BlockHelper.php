<?php

declare(strict_types=1);

namespace WPBLOX;

/**
 *
 */
class BlockHelper implements BlockInterface
{

    /**
     * @var array|mixed
     */
    public array $manifest = [
        'version' => 0,
        'dependencies' => []
    ];

    /**
     * @var string
     */
    public string $blockName;
    /**
     * @var string
     */
    public string $blockNamespace = 'wp-blox/';

    /**
     * @param PluginConfig $config
     * @param string $dir
     */
    public function __construct(PluginConfig $config, string $dir = '')
    {
        if (file_exists($dir . '/dist/block.dist.asset.php')) {
            $this->manifest = include($dir . '/dist/block.dist.asset.php');
        }

        add_action(
            'init',
            fn() => $this->registerBlock($this->getBlockName(true), [
                'render_callback' => [$this, 'renderCallback']
            ])
        );

        add_action('enqueue_block_assets', [$this, 'loadFrontendScripts']);
        add_action('enqueue_block_assets', [$this, 'loadFrontendStyles']);
        add_action('enqueue_block_editor_assets', function () use ($dir) {
            $this->loadEditorFiles($dir);
        });

        register_activation_hook($config->plugin_path, [$this, 'activated']);
    }

    /**
     * Register custom block with Gutenberg
     *
     * @param string $fqn
     * @param array|null $extraArgs
     * @return void
     */
    public function registerBlock(string $fqn, array $extraArgs = null): void
    {
        $nameItems = explode('/', $fqn);

        $args = [
            'api_version' => 2,
            'editor_script' => end($nameItems),
        ];

        if (null !== $extraArgs) {
            $args = array_merge($extraArgs, $args);
        }

        register_block_type($fqn, $args);
    }

    /**
     * Get block name for Gutenberg placement
     *
     * @param boolean $FQN
     * @return string
     */
    public function getBlockName(bool $FQN = false): string
    {
        return $FQN === true ? $this->blockNamespace . $this->blockName : $this->blockName;
    }

    /**
     * @param string $blockName
     * @return void
     */
    public function setBlockName(string $blockName): void
    {
        $this->blockName = $blockName;
    }

    /**
     * @param $dir
     * @return void
     */
    public function loadEditorFiles($dir): void
    {
        wp_register_script(
            $this->getBlockName(),
            $this->getDistPath($dir, 'block.dist.js'),
            $this->manifest['dependencies'],
            $this->manifest['version']);
    }

    /**
     * Get the URI for a file
     *
     * @param string $dir
     * @param string $filename
     * @return string
     */
    public function getDistPath(string $dir, string $filename): string
    {
        $dir = array_filter(explode('/', $dir));
        return plugin_dir_url(__FILE__) . 'Blocks/' . end($dir) . '/dist/' . $filename;
    }

    /**
     * Only load view related files IF the block appears on the page
     *
     * @param string $blockName
     * @param BlockStyle ...$styles
     * @return void
     */
    public function conditionallyLoadStyles(string $blockName, BlockStyle ...$styles): void
    {
        if (is_iterable($styles) && is_singular() && has_block($blockName, get_the_ID())) {
            foreach ($styles as $style) {
                wp_enqueue_style(
                    $style->getName(),
                    $style->getUri(),
                    $style->getDependencies(),
                    false
                );
            }
        }
    }

    /**
     * Only load view related files IF the block appears on the page
     *
     * @param string $blockName
     * @param BlockScript ...$scripts
     * @return void
     */
    public function conditionallyLoadScripts(string $blockName, BlockScript ...$scripts): void
    {
        if (is_iterable($scripts) && is_singular() && has_block($blockName, get_the_ID())) {
            foreach ($scripts as $script) {
                wp_enqueue_script(
                    $script->getName(),
                    $script->getUri(),
                    $script->getDependencies(),
                    false,
                    true
                );
            }
        }
    }

    public function loadFrontendScripts(): void
    {
        // TODO: Implement loadFrontendScripts() method.
    }

    public function loadFrontendStyles(): void
    {
        // TODO: Implement loadFrontendScripts() method.
    }
}
