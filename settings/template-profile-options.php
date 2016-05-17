<?php
/**
 * WP Shortcode Advertising
 * 
 * @since 0.1
 */
?>
<h2><?php _e( 'Advertising Code', 'wp-shortcode-advertising' ); ?></h2>
<table class="form-table">
<tr>
    <th>
        <label><?php _e( 'Default Advertising', 'wp-shortcode-advertising' ); ?></label>
    </th>
    <td>
        <textarea name="wpsa-default-advertising-code" rows="5" cols="30"></textarea>
    </td>
</tr>
<tr>
    <th>
        <label><?php _e( 'Mobile Advertising', 'wp-shortcode-advertising' ); ?></label>
    </th>
    <td>
        <textarea name="wpsa-default-advertising-code-mobile" rows="5" cols="30" placeholder="<?php _e( '(Optional) If you fill in this field, mobile device will load this advertising code.', 'wp-shortcode-advertising'); ?>"></textarea>
    </td>
</tr>
</table>