<?php
/**
 * @package CvrTutorialPlugin
 */

namespace Inc;

/*if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}*/

class Deactivate
{
    public static function deactivate()
    {
        error_log('deactivate');
        flush_rewrite_rules();
    }
}