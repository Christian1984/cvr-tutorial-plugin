<?php
/**
 * @package CvrTutorialPlugin
 */

namespace Inc\Base;

if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}

class Deactivate
{
    public static function deactivate()
    {
        //TODO
        flush_rewrite_rules();
    }
}