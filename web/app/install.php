<?php
/**
 *
 * Install WordPress without "Hello world!" and other default content
 *
 * This function overrides the standard wp_install_defaults() in 
 * wp-admin/includes/upgrade.php. Leaving the function empty causes WordPress 
 * to install without the default post, page, links, categories, etc.
 *
 * Save this file as install.php inside your wp-content directory before beginning installation
 * 
 * Also available in https://github.com/dlh01/dave-wpstarterkit
 *
 * @link http://lists.automattic.com/pipermail/wp-hackers/2012-April/042932.html
 * @link http://wpbits.wordpress.com/2007/08/10/automating-wordpress-customizations-the-installphp-way/
 *
 */
function wp_install_defaults() { }
?>