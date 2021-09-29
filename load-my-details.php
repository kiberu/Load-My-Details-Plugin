<?php
/**
 * Load My Details
 *
 * @package           KashaInterview
 * @author            Kiberu Sharif
 * @copyright         2019 Kiberu Sharif
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Load My Details
 * Description:       Plugin Assume that posts are orders, and users are customers and the user ordering has userId 1.
 * Version:           1.0.0
 * Author:            Kiberu Sharif
 * Author URI:        https://twitter.com/sharifkiberu
 * Text Domain:       load-my-details
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */


/**
 * Define plugin constants
 */
define( "LMD_PATH",  plugin_dir_path( __FILE__ ) ) ;
define( "LMD_URL",  plugin_dir_url( __FILE__ ) ) ;
define( "LMD_SLUG", 'lmd' );

/**
 * Include plugin class instance file
 */
include_once( plugin_dir_path( __FILE__ ) . '/classes/LoadMyDetails.php' );

?>