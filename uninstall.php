<?php

/**
 * This file bundles the cleanup routines on uninstall
 * @package CvrTutorialPlugin
 */

 // security check
if (!defined('ABSPATH'))
{
    die('Direct file access is restricted! Thanks for stopping by :-)');
}

// clear database stored data
$books = get_posts(array('post_type' => 'book', 'numberposts' => -1));

foreach ($books as $book)
{
    wp_delete_post($book->ID, true);
}