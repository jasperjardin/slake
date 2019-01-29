<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.linkedin.com/in/jasper-jardin-171465129/
 * @since      1.0.0
 *
 * @package    Slake
 * @subpackage Slake/Includes
 * @category   Slake/Slake_i18n
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

namespace Slake\Includes;

if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Slake
 * @subpackage Slake/Includes
 * @author     Jasper B. Jardin <jasper.jardin1994@gmail.com>
 */

class Slake_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'slake',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
