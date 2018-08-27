<?php
/**
 * @package CvrTutorialPlugin
 */

namespace Inc\Base;

if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}

class Enqueue
{
    function register()
    {
        // enqueue backend scripts
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));

        // enqueue frontend scripts
        // add_action('wp_enqueue_scripts', array($this, 'wp_enqueue'));
    }

    public  function admin_enqueue()
    {
        //enqueue all our scripts
        wp_enqueue_style('mypluginstyle', PLUGIN_URL . '/assets/mystyle.css');
        wp_enqueue_script('mypluginscript', PLUGIN_URL . '/assets/myscript.js');
    }

    public  function wp_enqueue()
    {
        //enqueue all our scripts
        wp_enqueue_style('mypluginstyle', PLUGIN_URL . '/assets/mystyle.css');
        wp_enqueue_script('mypluginscript', PLUGIN_URL . '/assets/myscript.js');
    }
}