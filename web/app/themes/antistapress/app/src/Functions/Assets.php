<?php

namespace App\Functions;

class Assets
{
    /**
     * @param   string  $filename   The filename relative to the assets folder.
     * @return  string  $filepath   The complete filepath leading to the provided filename
     */
    private static function asset_path($filename)
    {
        return get_template_directory_uri() . '/build/' . $filename;
    }

    /**
     * En-queue required assets
     *
     * @param  string  $filter   The name of the filter to hook into
     * @param  integer $priority The priority to attach the filter with
     */
    public static function load($filter = 'wp_enqueue_scripts', $priority = 10)
    {
        // Register the filter
        add_filter($filter, function ($paths) {
            wp_deregister_script('jquery');
            wp_enqueue_style('main', Assets::asset_path('css/base.css'), [], false, null);
            wp_enqueue_style('vendors', Assets::asset_path('css/vendors.min.css'), [], false, null);
            wp_enqueue_script('jquery.cdn', '//code.jquery.com/jquery-2.2.4.min.js', [], null, true);
            wp_enqueue_script('vendors', Assets::asset_path('js/vendors.min.js'), [], null, true);
            wp_enqueue_script('bundle', Assets::asset_path('js/vendors.bundle.js'), [], null, true);
            wp_enqueue_script('app', Assets::asset_path('js/app.bundle.js'), [], null, true);
        });
    }
}
