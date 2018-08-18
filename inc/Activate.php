<?php
/**
 * @package CvrTutorialPlugin
 */

namespace Inc;

/*if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}*/

class Activate
{
    public static function activate()
    {
        error_log('activate');
        flush_rewrite_rules();
    }
}