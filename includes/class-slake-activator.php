<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.linkedin.com/in/jasper-jardin-171465129/
 * @since      1.0.0
 *
 * @package    Slake
 * @subpackage Slake/Includes
 * @category   Slake/Slake_Activator
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

namespace Slake\Includes;

if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Slake
 * @subpackage Slake/Includes
 * @author     Jasper B. Jardin <jasper.jardin1994@gmail.com>
 */

class Slake_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

        add_image_size( 'slake_thumbnail', 550, 550, true );

        $options = array(
            // 'setting_name' => 'setting_default_value',
        );

        foreach ( $options as $key => $value ) {
            if ( get_option( $key ) == false ) {
                update_option( $key, $value );
            }
        }
        flush_rewrite_rules();
	}

}
