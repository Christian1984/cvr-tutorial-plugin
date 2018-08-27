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
        //TODO
        flush_rewrite_rules();
    }
}