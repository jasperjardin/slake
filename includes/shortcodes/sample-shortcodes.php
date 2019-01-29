<?php

/**
 * This class is executes all the Questionnaire shortcodes.
 *
 * This class defines all code necessary to initialize the Questionnaire shortcode.
 *
 * @link       https://www.linkedin.com/in/jasper-jardin-171465129/
 * @since      1.0.0
 *
 * @package    Slake
 * @subpackage Slake/Includes
 * @category   Slake/Slake_Questionnaire
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

namespace Slake\Includes;

if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * This class is executes all the Questionnaire shortcodes.
 *
 * This class defines all code necessary to initialize the Questionnaire shortcode.
 *
 * @since      1.0.0
 * @package    Slake
 * @subpackage Slake/Includes
 * @author     Jasper B. Jardin <jasper.jardin1994@gmail.com>
 */

class Slake_Questionnaire {

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Set the hooks for the Custom Post Types.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
        add_shortcode( 'slake_questionnaire', array( $this, 'register_shortcode' ) );
		add_action( 'init', array( $this, 'register_shortcodes' ) );
	}

    /**
	 * Registers the shortcode.
	 *
	 * @since    1.0.0
	 */
    public function register_shortcode() {
        $atts = shortcode_atts(
			array(
                'categories' => '',
                'posts_per_page' => 10,
				'columns' => 3,
				'enable_search' => 'yes',
				'show_category' => 'yes',
			), $atts, 'reference_loop'
		);
		return $this->display( $atts );
    }

}

new \Slake\Includes\Slake_Questionnaire();
