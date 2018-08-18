<?php
/**
 * @package CvrTutorialPlugin
 */

namespace Inc;

if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}

final class Init
{
    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return array(
            Pages\Admin::class,
            Base\Enqueue::class
        );
    }

    /**
     * Loop through all classes, instatiate them
     * and call the register() method
     * @return void
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class)
        {
            $service = self::instantiate($class);
            if (method_exists($service, 'register'))
            {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     * @param class $class class from services array
     * @return class instance new instance of the class
     * 
     */
    private static function instantiate($class)
    {
        return new $class();
    }
}

/*use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Pages\Admin;

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

    function activate()
    {
        Activate::activate();
        CvrTutorialPlugin::custom_post_type();
    }

    function register()
    {
        Admin::init();
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
    register_activation_hook(__FILE__, array($cvrTutorialPlugin, 'activate'));
    
    // deactivation
    register_deactivation_hook(__FILE__, array('Inc\Base\Deactivate', 'deactivate'));
}*/