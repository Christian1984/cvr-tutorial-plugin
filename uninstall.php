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

/*
// WARNING! Accessing the db through $wpdb is very mighty and really dangerous!!!
global $wpdb;
$wpdb->prefix;
$wpdb->query("DELETE FROM " . $wpdb->prefix . "_posts WHERE post_type = 'book'");
//or
$wpdb->query("DELETE FROM {$wpdb->posts} WHERE post_type = 'book'");

$wpdb->query("DELETE FROM " . $wpdb->prefix . "_postmeta WHERE post_id NOT IN (SELECT id FROM " . $wpdb->prefix . "_posts)")
//or
$wpdb->query("DELETE FROM {$wpdb->postmeta} WHERE post_id NOT IN (SELECT id FROM {$wpdb->posts})")
*/