<?php
/**
 * @package CvrTutorialPlugin
 */

if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}

class CvrTutorialPluginActivate
{
    public static function activate()
    {
        error_log('activate');
        CvrTutorialPlugin::custom_post_type();
        flush_rewrite_rules();
    }
}