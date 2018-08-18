<?php
/**
 * @package CvrTutorialPlugin
 */

/*
Plugin Name:  CVR Tutorial Plugin
Plugin URI:   http://example.com/
Description:  This is a plugin sandbox to follow along Alicaddd's wp plugin tutorial
Version:      1.0
Author:       ChrisVomRhein
Author URI:   http://example.com/
License:      GPLv2
*/

/*
This program is free software; you can redistribute it and/or 
modify it under the terms of the GNU General Public License as 
published by the Free Software Foundation; either version 2 of 
the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the 
GNU General Public License for more details.

You should have received a copy of the GNU General Public 
License along with this program; if not, write to the 
Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, 
Boston, MA 02110-1301, USA.
*/

if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}

class CvrTutorialPlugin
{
    public $plugin_dir_folder;
    public $plugin;

    function __construct()
    {
        add_action('init', array('CvrTutorialPlugin', 'custom_post_type'));

        $this->plugin_dir_folder = untrailingslashit(plugin_dir_path(__FILE__));
        $this->plugin = plugin_basename(__FILE__);
    }

    static function custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Book']);
    }

    function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        add_action('admin_menu', array($this, 'add_admin_pages'));
        add_filter("plugin_action_links_{$this->plugin}", array($this, 'settings_link'));
    }

    function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=cvr_tutorial_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    function enqueue()
    {
        //enqueue all our scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
    }

    function add_admin_pages()
    {
        add_menu_page('CVR Tutorial Plugin', 'CVR Tutorial', 'manage_options', 'cvr_tutorial_plugin', array($this, 'admin_index'), 'dashicons-sos', 110);
    }

    function admin_index()
    {
        //require template
        require_once join(DIRECTORY_SEPARATOR, array($this->plugin_dir_folder, 'templates', 'admin.php'));
    }
}

// initialize  plugin main class
if (class_exists('CvrTutorialPlugin'))
{
    $cvrTutorialPlugin = new CvrTutorialPlugin();
    $cvrTutorialPlugin->register();

    //
    // register hooks
    //
    
    // activation
    require_once join(DIRECTORY_SEPARATOR, array($cvrTutorialPlugin->plugin_dir_folder, 'inc', 'cvr-tutorial-plugin-activate.php'));
    register_activation_hook(__FILE__, array('CvrTutorialPluginActivate', 'activate'));
    
    // deactivation
    require_once join(DIRECTORY_SEPARATOR, array($cvrTutorialPlugin->plugin_dir_folder, 'inc', 'cvr-tutorial-plugin-deactivate.php'));
    register_deactivation_hook(__FILE__, array('CvrTutorialPluginDeactivate', 'deactivate'));
}