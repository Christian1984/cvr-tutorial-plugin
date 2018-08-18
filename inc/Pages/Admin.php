<?php
/**
 * @package CvrTutorialPlugin
 */

namespace Inc\Pages;

if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}

class Admin
{
    function register()
    {
        add_action('admin_menu', array($this, 'add_admin_pages'));
        add_filter('plugin_action_links_' . PLUGIN_BASENAME, array($this, 'settings_link'));
    }

    function add_admin_pages()
    {
        add_menu_page('CVR Tutorial Plugin', 'CVR Tutorial', 'manage_options', 'cvr_tutorial_plugin', array($this, 'admin_index'), 'dashicons-sos', 110);
    }

    public function admin_index()
    {
        require_once(join(DIRECTORY_SEPARATOR, array(PLUGIN_PATH, 'templates', 'admin.php')));
    }

    function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=cvr_tutorial_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}