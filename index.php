<?php
/**
 * WP Swift: Prevent WordPress Empty Search
 *
 * @package   Prevent_Empty_Search
 * @author    Gary Swift
 * @license   GPL-2.0+
 * @link      https://github.com/GarySwift
 * @copyright 2017 WP Swift
 *
 * @wordpress-plugin
 * Plugin Name:       WP Swift: Prevent WordPress Empty Search
 * Plugin URI:        https://github.com/wp-swift-wordpress-plugins/wp-swift-prevent-empty-search
 * Description:       Prevent users doing an empty WordPress search.
 * Version:           1.0.0
 * Author:            Gary Swift
 * Author URI:        https://github.com/GarySwift
 * Text Domain:       wp-swift-prevent-empty-search
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Halt the main query in the case of an empty search 
 */
add_filter( 'posts_search', function( $search, \WP_Query $q )
{
    if( ! is_admin() && empty( $search ) && $q->is_search() && $q->is_main_query() )
        $search .=" AND 0=1 ";

    return $search;
}, 10, 2 );