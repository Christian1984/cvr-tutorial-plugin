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
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public  function enqueue()
    {
        //enqueue all our scripts
        wp_enqueue_style('mypluginstyle', PLUGIN_URL . '/assets/mystyle.css');
        wp_enqueue_script('mypluginscript', PLUGIN_URL . '/assets/myscript.js');
    }
}