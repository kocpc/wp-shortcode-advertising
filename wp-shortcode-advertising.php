<?php
/**
 * WP Shortcode Advertising
 *
 * Plugin Name: WP Shortcode Advertising
 * Description: A plugin that allow you to insert advertising via shortcode.
 * Author: Hiram Huang <me@hiram.tw>
 * Author URI: https://www.facebook.com/naxqihao
 * Version: 0.3.1
 * Text Domain: wp-shortcode-advertising
 * Domain Path: /languages
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @author      Hiram Huang <me@hiram.tw>
 * @package     wp-shortcode-advertising
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @link        Github Repo: https://github.com/chown9835/wp-shortcode-advertising
 * @since       0.1
 */

if( ! defined( 'ABSPATH' ) ) {
	die( 'SHAME ON YOU' );
}

/**
 * Define plugin information.
 * Part reference facebook-instant-articles-wp.
 */
define( 'SA_PLUGIN_VERSION', '0.3.1' );
define( 'SA_PLUGIN_PATH_FULL', __FILE__ );
define( 'SA_PLUGIN_BASE_FULL', dirname(__FILE__) );
define( 'SA_PLUGIN_PATH', plugin_basename( __FILE__ ) );
define( 'SA_PLUGIN_FILE_BASENAME', pathinfo( __FILE__, PATHINFO_FILENAME ) );
define( 'SA_PLUGIN_TEXT_DOMAIN', 'wp-shortcode-advertising' );

/**
 * Import plugin classes.
 */
require_once( SA_PLUGIN_BASE_FULL . '/settings/class-wp-shortcode-advertising-settings.php' );
require_once( SA_PLUGIN_BASE_FULL . '/includes/class-wp-shortcode-advertising-filter.php' );

/**
 * Initial plugin.
 */
WP_Shortcode_Advertising_Settings::init();
WP_Shortcode_Advertising_Filter::init();