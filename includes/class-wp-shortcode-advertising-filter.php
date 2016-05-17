<?php
/**
 * WP Shortcode Advertising
 * Filting shortcode covert to advertising code.
 * 
 * @author  Hiram Huang <me@hiram.tw>
 * @package wp-shortcode-advertising
 * @since   0.1
 */

class WP_Shortcode_Advertising_Filter {
    
    /**
     * Initiator.
     * 
     * @since 0.1
     */
    public static function init() {
        // Register shortcode when WordPress initial.
        add_action( 'init', array( 'WP_Shortcode_Advertising_Filter', 'register_advertising_shortcode' ) );
    }
    
    /**
     * Register advertising shortcode.
     * 
     * @since 0.1
     */
    public static function register_advertising_shortcode() {
        add_shortcode( 'insert-ad', array( 'WP_Shortcode_Advertising_Filter', 'advertising_code_render' ) );
    }
    
    /**
     * Advertising code render.
     * 
     * @since 0.1
     */
    public static function advertising_code_render() {
        // Only rendering advertising in post and page.
        if( ! is_single() && ! is_page() ) {
            return false;
        }
        
        // Get author id and advertising code
        $post_id = get_the_ID();
        $post_author_id = get_post_field( 'post_author', $post_id );
        $advertising_code = [
            'default' => get_the_author_meta( 'wpsa-default', $post_author_id ),
            'mobile' => get_the_author_meta( 'wpsa-default-mobile', $post_author_id )
            ];
        
        // Rendering mobile advertising code if available.
        if( $advertising_code['mobile'] && wp_is_mobile() ) {
            return $advertising_code['mobile'];
        } else {
            return $advertising_code['default'];
        }
    }
}