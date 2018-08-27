<?php
/**
 * @package CvrTutorialPlugin
 */

namespace Inc\Base;

if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}

class BaseController
{
    public $plugin_path;
    public $plugin_url;
    public $plugin_basename;

    function __construct()
    {
        $this->plugin_path = untrailingslashit(plugin_dir_path(dirname(__FILE__, 2)));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
        $this->plugin_basename = plugin_basename(dirname(__FILE__, 3)) . '/cvr-tutorial-plugin.php';
    }
}