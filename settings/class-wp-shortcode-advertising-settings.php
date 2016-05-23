<?php
/**
 * WP Shortcode Advertising
 * 
 * @author 	Hiram Huang <me@hiram.tw>
 * @package wp-shortode-advertising
 * @since 	0.1
 */

class WP_Shortcode_Advertising_Settings {
    
    const SA_PLUGIN_SETTINGS_SLUG = 'wp-shortcode-advertising-settings';
    
    /**
     * Initiator.
     * 
     * @since 0.1
     */
    public static function init() {
        // Initial administration menu.
        // add_action( 'admin_menu', array( 'WP_Shortcode_Advertising_Settings', 'menu_items' ) );
        
        // Register TinyMCE shortcode insert button when admin init.
        add_action( 'admin_init', array( 'WP_Shortcode_Advertising_Settings', 'tinymce_shortcode_insert_button' ) );
        
        // Insert field to profile options page.
        add_action( 'show_user_profile', array( 'WP_Shortcode_Advertising_Settings', 'render_extra_profile_options' ) );
		add_action( 'edit_user_profile', array( 'WP_Shortcode_Advertising_Settings', 'render_extra_profile_options' ) );

		// Receive profile options update data.
		add_action( 'personal_options_update', array( 'WP_Shortcode_Advertising_Settings', 'update_extra_profile_options' ) );
		add_action( 'edit_user_profile_update', array( 'WP_Shortcode_Advertising_Settings', 'update_extra_profile_options' ) );
		
        // Insert setting link to plugin list.
        add_filter( 'plugin_action_links_' . SA_PLUGIN_PATH, array( 'WP_Shortcode_Advertising_Settings', 'add_settings_link_to_plugin_actions' ) );
        
        // Load languages
        add_action( 'plugins_loaded', array( 'WP_Shortcode_Advertising_Settings', 'load_textdomain' ) );
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
	 * Creates the option page.
	 * This function refer from facebook-instant-articles-wp.
	 *
	 * @since 0.1
	 */
	public static function menu_items() {
		add_options_page(
			__( 'WP Shortcode Advertising Settings', 'wp-shortcode-advertising' ),
			__( 'Shortcode AD', 'wp-shortcode-advertising' ),
			'manage_options',
			self::SA_PLUGIN_SETTINGS_SLUG,
			array( 'WP_Shortcode_Advertising_Settings', 'render_settings_page' )
		);
	}
	
	/**
	 * Render WP Shortcode Advertising option page.
	 * 
	 * @since 0.1
	 */
	public static function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html( 'You do not have sufficient permissions to access this page.' ) );
		}

		settings_errors();
	}
	
	/**
	 * Render extra profile options.
	 * 
	 * @param object WP_User
	 * @since 0.1
	 */
	public static function render_extra_profile_options( $user ) {
		// Check user can edit post and page, prove author permission.
		if ( ! current_user_can( 'edit_posts' ) || ! current_user_can( 'edit_pages' ) ) {
			return false;
		}
		
		$current_advertising = [
			'default' => $user->get( 'wpsa-default' ),
			'mobile' => $user->get( 'wpsa-default-mobile' ),
			'tablet' => $user->get( 'wpsa-default-tablet' )
			];

		include_once( dirname( __FILE__ ) . '/template-profile-options.php' );
	}
	
	/**
	 * Update extra profile options.
	 * 
	 * @param int $user_id User's ID.
	 * @since 0.1
	 */
	public static function update_extra_profile_options( $user_id ) {
		// Check user has author permission.
		if ( ! current_user_can( 'edit_posts' ) || ! current_user_can( 'edit_pages' ) ) {
			return false;
		}
		
		// Update user meta with advertising code.
		if( $_POST['wpsa-default-advertising-code'] ) {
			update_user_meta( absint( $user_id ), 'wpsa-default', $_POST['wpsa-default-advertising-code'] );
		} else {
			delete_user_meta( absint( $user_id ), 'wpsa-default-default' );
		}
		if( $_POST['wpsa-default-advertising-code-mobile'] ) {
			update_user_meta( absint( $user_id ), 'wpsa-default-mobile', $_POST['wpsa-default-advertising-code-mobile'] );
		} else {
			delete_user_meta( absint( $user_id ), 'wpsa-default-mobile' );
		}
		if( $_POST['wpsa-default-advertising-code-tablet'] ) {
			update_user_meta( absint( $user_id ), 'wpsa-default-tablet', $_POST['wpsa-default-advertising-code-tablet'] );
		} else {
			delete_user_meta( absint( $user_id ), 'wpsa-default-tablet' );
		}
	}
	
	/**
	 * TinyMCE shortcode insert button.
	 * 
	 * @since 0.1
	 */
	public static function tinymce_shortcode_insert_button() {
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
			add_filter( 'mce_buttons_2', array( 'WP_Shortcode_Advertising_Settings', 'register_tinymce_shortcode_insert_button' ) );
			add_filter( 'mce_external_plugins', array( 'WP_Shortcode_Advertising_Settings', 'insert_tinymce_script_into_list' ) );
		}
	}

	/**
	 * Register shortcode insert button to TinyMCE.
	 * 
	 * @param array $buttons Current TinyMCE buttons.
	 * @since 0.1
	 */
	public static function register_tinymce_shortcode_insert_button( $buttons ) {
		array_push( $buttons, 'wpsa-shortcode' );
		return $buttons;
	}
	
	/**
	 * Add script into TinyMCE plugin list.
	 * 
	 * @param array $plugins Plugin list.
	 * @since 0.1
	 */
	 public static function insert_tinymce_script_into_list( $plugins ) {
	 	$plugins['wpsa_shortcode'] = plugins_url( 'js/tinymce.js', SA_PLUGIN_PATH_FULL );
	 	return $plugins;
	 }
	 
	 /**
	  * Load languages
	  * 
	  * @since 0.3
	  */
	 public static function load_textdomain() {
	 	load_plugin_textdomain( 'wp-shortcode-advertising', false, SA_PLUGIN_FILE_BASENAME . '/languages' );
	 }
}