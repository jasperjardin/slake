<?php
/**
 * Plugin Name:       Slake
 * Plugin URI:        https://github.com/jasperjardin/slake
 * Description:       A plugin boilerplate.
 * Version:           1.0.0
 * Author:            Jasper B. Jardin
 * Author URI:        https://www.linkedin.com/in/jasper-jardin-171465129/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       slake
 * Domain Path:       /languages
 *
 * @link              https://www.linkedin.com/in/jasper-jardin-171465129/
 * @since             1.0.0
 * @package           Slake
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
   exit;
}

/**
 * Currently plugin version.
 */
define( 'SLAKE_VERSION', '1.0.0' );

/**
 * Currently plugin abspath directory.
 */
define( 'SLAKE_ABSPATH', ABSPATH . PLUGINDIR . "\slake" );

/**
 * Currently plugin file abspath directory.
 */
define( 'SLAKE_DIR_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

define( 'SLAKE_TEMPLATE_PATH', SLAKE_DIR_PATH. '\templates' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-slake-activator.php
 */
function activate_slake() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-slake-activator.php';
	\Slake\Includes\Slake_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-slake-deactivator.php
 */
function deactivate_slake() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-slake-deactivator.php';
	\Slake\Includes\Slake_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_slake' );
register_deactivation_hook( __FILE__, 'deactivate_slake' );

/**
 * Holds the helper functions.
 */
require plugin_dir_path( __FILE__ ) . 'template-tags/template-tags.php';

/**
 * Holds the functions that hooks to 3rd-party plugin.
 */
require plugin_dir_path( __FILE__ ) . 'template-tags/extras.php';

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-slake.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_slake() {

	$plugin = new \Slake\Includes\Slake();
	$plugin->run();

}
run_slake();
