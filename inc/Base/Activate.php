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
        register_post_type('book', ['public' => true, 'label' => 'Book']);
        flush_rewrite_rules();
    }
}