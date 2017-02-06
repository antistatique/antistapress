<?php
/*
Plugin Name:  Register Theme Directory
Plugin URI:   https://roots.io/bedrock/
Description:  Register default theme directory, you can delete it if unnecessary
Version:      1.0.0
Author:       Roots
Author URI:   https://roots.io/
License:      MIT License
*/

if (!defined('WP_DEFAULT_THEME')) {
    register_theme_directory(ABSPATH . 'wp-content/themes');
}
