<?php
/**
 * @package CvrTutorialPlugin
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}

class Enqueue extends BaseController
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
        wp_enqueue_style('mypluginstyle', "{$this->plugin_url}assets/mystyle.css");
        wp_enqueue_script('mypluginscript', "{$this->plugin_url}assets/myscript.js");
    }

    public  function wp_enqueue()
    {
        //enqueue all our scripts
        wp_enqueue_style('mypluginstyle', "{$this->plugin_url}assets/mystyle.css");
        wp_enqueue_script('mypluginscript', "{$this->plugin_url}assets/myscript.js");
    }
}