<?php
/**
 * @package CvrTutorialPlugin
 */

namespace Inc\Base;

if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}

class Activate
{
    public static function activate()
    {
        error_log('activate');
        Activate::custom_post_type();
        flush_rewrite_rules();
    }

    public static function custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Book']);
    }
}