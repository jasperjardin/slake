<?php

/**
 * This class is executes all the plugin shortcodes.
 *
 * This class defines all code necessary to initialize the shortcodes of the plugin.
 *
 * @link       https://www.linkedin.com/in/jasper-jardin-171465129/
 * @since      1.0.0
 *
 * @package    Slake
 * @subpackage Slake/Includes
 * @category   Slake/Slake_Shortcodes
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

namespace Slake\Includes;

if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * This class is executes all the plugin shortcodes.
 *
 * This class defines all code necessary to initialize the shortcodes of the plugin.
 *
 * @since      1.0.0
 * @package    Slake
 * @subpackage Slake/Includes
 * @author     Jasper B. Jardin <jasper.jardin1994@gmail.com>
 */

class Slake_Shortcodes {

    /**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Slake_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Set the hooks for the Custom Post Types.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
        $this->loader = $loader;
		$this->name = $name;
		$this->version = $version;
		add_action( 'init', array( $this, 'register_shortcodes' ) );
	}

    /**
	 * Registers the shortcodes.
	 *
	 * @since    1.0.0
	 */
    public function register_shortcodes() {
        $helper = new \Slake\Includes\Slake_Helper();

        $directory = plugin_dir_path( dirname( __FILE__ ) ) . '/includes/shortcodes';
        $files = apply_filters( 'slake_filter_shortcodes_files', $helper->get_dir_files( $directory ) );

        foreach ( $files as $file ) {
            if ( 'sample-shortcodes.php' !== $file ) {
                require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/shortcodes/' . $file;
            }
        }

    }

}
