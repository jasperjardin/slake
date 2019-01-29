<?php
/**
 * This file is part of the Plugin Package.
 *
 * (c) Jasper B. Jardin <jasper.jardin1994@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package Slake
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Callback function for 'slake_style_form' setting
 *
 * @return void
 */
function slake_style_form() {
    $value = wp_kses_post( get_option( 'slake_style' ) );

    echo '<label for="slake_style">';
        echo '<textarea name="slake_style" id="slake_style" class="large-text" rows="3" placeholder="' . esc_attr( 'Write your message here...', 'slake') . '">' . esc_attr( $value ) . '</textarea>';
    echo '</label>';
    echo '<p class="description">' . esc_html__('Description for the setting.', 'slake') . ' </p>';
	return;
}
