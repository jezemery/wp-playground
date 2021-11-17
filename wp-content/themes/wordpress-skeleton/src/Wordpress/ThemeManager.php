<?php

namespace WPSKL\Wordpress;

class ThemeManager
{
    public function __construct()
    {
        add_filter('upload_mimes', [__CLASS__, 'cc_mime_types']);
        add_filter('wp_check_filetype_and_ext', [__CLASS__, 'check_filetype'], 10, 4);
        add_action('after_setup_theme', [__CLASS__, 'addLogoSupport']);
        add_action('after_setup_theme', [__CLASS__, 'addMenuLocations']);
        add_action('admin_init', [__CLASS__, 'addThemeSettings']);
    }

    public static function addThemeSettings(): void
    {
        add_settings_section(
            'sample_page_setting_section',
            __('Custom settings', 'my-textdomain'),
            'my_setting_section_callback_function',
            'sample-page'
        );
    }

    function my_setting_section_callback_function()
    {
        echo '<p>Intro text for our settings section</p>';
    }

    /**
     * @param $mimes
     * @return array
     */
    public static function cc_mime_types($mimes): array
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    /**
     * @param $data
     * @param $file
     * @param $filename
     * @param $mimes
     * @return array
     */
    public static function check_filetype($data, $file, $filename, $mimes): array
    {
        $filetype = wp_check_filetype($filename, $mimes);

        return [
            'ext' => $filetype['ext'],
            'type' => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];

    }

    public static function addLogoSupport(): void
    {
        add_theme_support('custom-logo', [
            'height' => 35,
            'width' => 310,
            'flex-height' => true,
            'flex-width' => true,
        ]);
    }

    public static function getCustomLogo(): string
    {
        $blogName = get_bloginfo('name');
        $logo = '<h1>' . $blogName . '</h1>';

        if (has_custom_logo()) {
            $custom_logo_id = get_theme_mod('custom_logo');

            $logo = wp_get_attachment_image($custom_logo_id, 'full', false, [
                'alt' => $blogName,
                'width' => 320,
                'height' => 35,
                'loading' => false
            ]);
        }

        return $logo;
    }

    public static function addMenuLocations(): void
    {
        register_nav_menus([
            'header-menu' => 'Header Menu',
            'footer-sub-menu' => 'Footer Sub Menu'
        ]);
    }
}
