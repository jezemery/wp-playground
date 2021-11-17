<?php

namespace WPSKL\Wordpress;

class ManifestManager
{
    protected array $manifestFiles;

    public function __construct()
    {
        $this->loadManifest();

        if ($GLOBALS['pagenow'] !== 'wp-login.php' && !is_admin()) {
            add_action('wp_head', [$this, 'localizeScript']);
            add_action('init', [$this, 'preload']);
        }

    }


    /**
     * Preload function to load main css & js files from asset manifest file
     */
    public function preload(): void
    {
        if (!is_iterable($this->manifestFiles)) return;

        foreach ($this->manifestFiles as $name => $file) {
            // Skip editor styles from preload
            if (strpos($name, 'editor') !== false || strpos($name, '.map')) continue;

            $filename = get_template_directory_uri() . "/assets/dist/$file";

            if (strpos($file, '.js')) {
                wp_enqueue_script($name, $filename, [], null, true);
                header("Link: <$filename>;as=script;rel=preload", false);
            }

            if (strpos($file, '.css')) {
                wp_enqueue_style($name, $filename);
                header("Link: <$filename>;as=style;rel=preload", false);
            }
        }
    }

    /**
     * Loads asset manifest file array into array property
     */
    public function loadManifest(): void
    {
        $manifest_path = get_template_directory() . '/assets/dist/assets-manifest.json';

        if (file_exists($manifest_path)) {
            try {
                $this->manifestFiles = json_decode(
                    file_get_contents($manifest_path),
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                );
            } catch (\JsonException $e) {
            }
        }
    }

    /**
     * Injects variables in head to ensure they will be available to any assets
     * that have been pre-loaded via
     */
    public function localizeScript(): void
    {
        $object = [
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce()
        ];
        $script = 'var wp_ajax = ' . wp_json_encode($object) . ';';
        echo "<script>$script</script>";
    }
}
