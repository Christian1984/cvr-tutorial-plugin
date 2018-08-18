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
    public function __construct()
    {
        add_action('init', array($this, 'custom_post_type'));
    }

    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function activate()
    {
        // This is a backup for the registration above, in case the constructor and init already ran
        $this->custom_post_type();
        flush_rewrite_rules();
    }

    public function deactivate()
    {
        flush_rewrite_rules();
    }

    public function enqueue()
    {
        //enqueue all our scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
    }

    public function custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Book']);
    }
}

// initialize  plugin main class
if (class_exists('CvrTutorialPlugin'))
{
    $cvrTutorialPlugin = new CvrTutorialPlugin();
    $cvrTutorialPlugin->register();
}

//
// register hooks
//

// activation
register_activation_hook(__FILE__, array($cvrTutorialPlugin, 'activate'));

// deactivation
register_deactivation_hook(__FILE__, array($cvrTutorialPlugin, 'deactivate'));