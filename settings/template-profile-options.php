<?php
/**
 * WP Shortcode Advertising
 * 
 * @author  Hiram Huang <me@hiram.tw>
 * @package wp-shortcode-advertising
 * @since   0.1
 */
?>
<h2><?php _e( 'Advertising Code', 'wp-shortcode-advertising' ); ?></h2>
<table class="form-table">
<tr>
    <th>
        <label><?php _e( 'Default Advertising', 'wp-shortcode-advertising' ); ?></label>
    </th>
    <td>
        <textarea name="wpsa-default-advertising-code" rows="8" cols="30"><?php echo esc_html( $current_advertising['default'] ); ?></textarea>
    </td>
</tr>
<tr>
    <th>
        <label><?php _e( 'Mobile Advertising', 'wp-shortcode-advertising' ); ?></label>
    </th>
    <td>
        <textarea name="wpsa-default-advertising-code-mobile" rows="8" cols="30" placeholder="<?php _e( '(Optional) If you fill in this field, mobile device will load this advertising code.', 'wp-shortcode-advertising'); ?>"><?php echo esc_html( $current_advertising['mobile'] ); ?></textarea>
    </td>
</tr>
<tr>
    <th>
        <label><?php _e( 'Tablet Advertising', 'wp-shortcode-advertising' ); ?></label>
    </th>
    <td>
        <textarea name="wpsa-default-advertising-code-tablet" rows="8" cols="30" placeholder="<?php _e( '(Optional) If you fill in this field, tablet device will load this advertising code.', 'wp-shortcode-advertising'); ?>"><?php echo esc_html( $current_advertising['tablet'] ); ?></textarea>
    </td>
</tr>
</table>