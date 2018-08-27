<?php
/**
 * @package CvrTutorialPlugin
 */

namespace Inc\Pages;

if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    private $settings;

    function __construct()
    {
        parent::__construct();
        $this->settings = new SettingsApi();
    }

    function register()
    {
        $pages = array(
            array(
                'page_title' => 'CVR Tutorial Plugin',
                'menu_title' => 'CVR Tutorial',
                'capability' => 'manage_options',
                'menu_slug' => 'cvr_tutorial_plugin',
                'callback' => function() { echo '<h1>CVR Tutorial Plugin H1</h1>'; },
                'icon_url' => 'dashicons-sos',
                'position' => 110,
            )
        );

        $this->settings
            ->addPages($pages)
            ->register();

        error_log("plugin_action_links_{$this->plugin_basename}");
        add_filter("plugin_action_links_{$this->plugin_basename}", array($this, 'settings_link'));
    }

    function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=cvr_tutorial_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}