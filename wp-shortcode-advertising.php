<?php
/**
 * WP Shortcode Advertising
 *
 * Plugin Name: WP Shortcode Advertising
 * Description: A plugin that allow you to insert advertising via shortcode.
 * Author: Hiram Huang
 * Author URI: https://www.facebook.com/naxqihao
 * Version: 0.1
 * Text Domain: wp-shortcode-advertising
 * Domain Path: /languages
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 *
 * @package		wp-shortcode-advertising
 * @since		0.1
 */

if( ! defined( 'ABSPATH' ) ) {
	die( 'SHAME ON YOU' );
}

/**
 * Define plugin information.
 * Part refer from facebook-instant-articles-wp.
 */
define( 'SA_PLUGIN_VERSION', '0.1' );
define( 'SA_PLUGIN_PATH_FULL', __FILE__ );
define( 'SA_PLUGIN_PATH', plugin_basename( __FILE__ ) );
define( 'SA_PLUGIN_FILE_BASENAME', pathinfo( __FILE__, PATHINFO_FILENAME ) );
define( 'SA_PLUGIN_TEXT_DOMAIN', 'wp-shortcode-advertising' );

/**
 * Import plugin classes.
 */
require_once( dirname( __FILE__ ) . '/settings/class-wp-shortcode-advertising-settings.php' );

/**
 * Initial plugin.
 */
WP_Shortcode_Advertising_Settings::init();