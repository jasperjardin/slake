<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/jasper-jardin-171465129/
 * @since      1.0.0
 *
 * @package    Slake
 * @subpackage Slake/Publics
 * @category   Slake/Slake_Public
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

namespace Slake\Publics;

if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Slake
 * @subpackage Slake/public
 * @author     Jasper B. Jardin <jasper.jardin1994@gmail.com>
 */
class Slake_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        $this->register_templates;
        add_filter('single_template', array( $this, 'register_single_templates' ) );
        add_filter('archive_template', array( $this, 'register_archive_templates' ) );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Slake_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slake_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/slake-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Slake_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slake_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/slake-public.js', array( 'jquery' ), $this->version, true );

	}

    /**
	 * Registers the Templates.
	 *
	 * @since    1.0.0
	 */
    public function register_single_templates($template) {
        global $post;

        $helper = new \Slake\Includes\Slake_Helper();
        $directory = plugin_dir_path( dirname( __FILE__ ) ) . '/templates';

        if ($post->post_type == 'bd-questionnaires' && $template !== locate_template(array('single-bd-questionnaires.php'))){
            /* This is a "movie" post
            * AND a 'single movie template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory
            */
            return $directory . '/single-bd-questionnaires.php';

        }

        return $template;
    }

    /**
	 * Registers the Templates.
	 *
	 * @since    1.0.0
	 */
    public function register_archive_templates($template) {
        global $post;

        $helper = new \Slake\Includes\Slake_Helper();
        $directory = plugin_dir_path( dirname( __FILE__ ) ) . '/templates';
        $theme_dir = get_template_directory();

        if ($post->post_type == 'bd-questionnaires' && $template !== locate_template(array('archive-bd-questionnaires.php'))){
            /* This is a "movie" post
            * AND a 'single movie template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory
            */

            return $directory . '/archive-bd-questionnaires.php';
        }

        return $template;
    }

}
