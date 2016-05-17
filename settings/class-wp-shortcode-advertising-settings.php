<?php
/**
 * WP Shortcode Advertising
 * 
 * @package wp-shortode-advertising
 * @since 0.1
 */

class WP_Shortcode_Advertising_Settings {
    
    const SA_PLUGIN_SETTINGS_SLUG = 'wp-shortcode-advertising-settings';
    
    /**
     * Initiator.
     * 
     * @since 0.1
     */
    public static function init() {
        // Initial administration meun.
        add_action( 'admin_menu', array( 'WP_Shortcode_Advertising_Settings', 'menu_items' ) );
        
        // Insert setting link to plugin list.
        add_filter( 'plugin_action_links_' . SA_PLUGIN_PATH, array( 'WP_Shortcode_Advertising_Settings', 'add_settings_link_to_plugin_actions' ) );
    }
    
    /**
	 * Gets the URL/path for this page.
	 * This function refer from facebook-instant-articles-wp.
	 * 
	 * @since 0.1
	 */
	public static function get_href_to_settings_page() {
		return menu_page_url( self::SA_PLUGIN_SETTINGS_SLUG, false );
	}
    
    /**
	 * Creates an anchor element.
	 * This function refer from facebook-instant-articles-wp.
	 *
	 * @param array $links The links will be added to anchor.
	 * @since 0.1
	 */
	public static function add_settings_link_to_plugin_actions( $links ) {
		$link_text = __( 'Settings' );
		$settings_href = self::get_href_to_settings_page();
		$settings_link = '<a href="' . esc_url( $settings_href ) . '">' . $link_text . '</a>';
		array_push( $links, $settings_link );
		return $links;
	}
	
	/**
	 * Creates the menu items for FB Instant Article in WordPress side menu.
	 * This function refer from facebook-instant-articles-wp.
	 *
	 * @since 0.1
	 */
	public static function menu_items() {
		add_menu_page(
			__( 'WP Shortcode Advertising Settings', 'wp-shortcode-advertising' ),
			__( 'Shortcode AD', 'wp-shortcode-advertising' ),
			'manage_options',
			self::SA_PLUGIN_SETTINGS_SLUG
		);
	}
}