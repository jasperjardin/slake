<?php

/**
 * This class is executes all the plugin metaboxes.
 *
 * This class defines all code necessary to initialize the metaboxes of the plugin.
 *
 * @link       https://www.linkedin.com/in/jasper-jardin-171465129/
 * @since      1.0.0
 *
 * @package    Slake
 * @subpackage Slake/Includes
 * @category   Slake/Slake_MetaBoxes
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

namespace Slake\Includes;

if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * This class is executes all the plugin metaboxes.
 *
 * This class defines all code necessary to initialize the metaboxes of the plugin.
 *
 * @since      1.0.0
 * @package    Slake
 * @subpackage Slake/Includes
 * @author     Jasper B. Jardin <jasper.jardin1994@gmail.com>
 */

class Slake_MetaBoxes {

	/**
	 * Runs and includes the files that contains metabox.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->register_metaboxes();
	}

    /**
	 * Registers the Metaboxes.
	 *
	 * @since    1.0.0
	 */
    public function register_metaboxes() {
        $helper = new \Slake\Includes\Slake_Helper();

        $directory = plugin_dir_path( dirname( __FILE__ ) ) . '/includes/metaboxes';
        $files = apply_filters( 'slake_filter_metaboxes_files', $helper->get_dir_files( $directory ) );

        foreach ( $files as $file ) {
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/metaboxes/' . $file;
        }

    }

}
