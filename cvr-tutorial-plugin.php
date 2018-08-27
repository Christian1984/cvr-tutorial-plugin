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

// composer autoload
$composer_autoload = join(DIRECTORY_SEPARATOR, array(dirname(__FILE__), 'vendor', 'autoload.php'));

if ($composer_autoload)
{
    require_once($composer_autoload);
}

// activation and deactivation code
function activate_cvr_tutorial_plugin()
{
    Inc\Base\Activate::activate();
}

function deactivate_cvr_tutorial_plugin()
{
    Inc\Base\Deactivate::deactivate();
}

//
// register activation and deactivation hooks
//
register_activation_hook(__FILE__, 'activate_cvr_tutorial_plugin');
register_deactivation_hook(__FILE__, 'deactivate_cvr_tutorial_plugin');

//
// register init action
// e.g. add_action('init', Inc\Base\Activate::custom_post_type);

//TODO

if (class_exists('Inc\\Init'))
{
    Inc\Init::register_services();
}

