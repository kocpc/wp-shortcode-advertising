<?php
/**
 * WP Shortcode Advertising
 * 
 * @author  Hiram Huang <me@hiram.tw>
 * @package wp-shortcode-advertising
 * @since   0.1
 */
 
/**
 * If file is opened directly, return 403 error
 */
if( ! function_exists ('add_action') ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
?>
<h2><?php _e( 'Advertising Code', SA_PLUGIN_TEXT_DOMAIN ); ?></h2>
<table class="form-table">
<tr>
    <th>
        <label><?php _e( 'Default Advertising', SA_PLUGIN_TEXT_DOMAIN ); ?></label>
    </th>
    <td>
        <textarea name="wpsa-default-advertising-code" rows="8" cols="30"><?php echo esc_html( $current_advertising['default'] ); ?></textarea>
    </td>
</tr>
<tr>
    <th>
        <label><?php _e( 'Mobile Advertising', SA_PLUGIN_TEXT_DOMAIN ); ?></label>
    </th>
    <td>
        <textarea name="wpsa-default-advertising-code-mobile" rows="8" cols="30" placeholder="<?php _e( '(Optional) If you fill in this field, mobile device will load this advertising code.', SA_PLUGIN_TEXT_DOMAIN ); ?>"><?php echo esc_html( $current_advertising['mobile'] ); ?></textarea>
    </td>
</tr>
<tr>
    <th>
        <label><?php _e( 'Tablet Advertising', SA_PLUGIN_TEXT_DOMAIN ); ?></label>
    </th>
    <td>
        <textarea name="wpsa-default-advertising-code-tablet" rows="8" cols="30" placeholder="<?php _e( '(Optional) If you fill in this field, tablet device will load this advertising code.', SA_PLUGIN_TEXT_DOMAIN ); ?>"><?php echo esc_html( $current_advertising['tablet'] ); ?></textarea>
    </td>
</tr>
</table>