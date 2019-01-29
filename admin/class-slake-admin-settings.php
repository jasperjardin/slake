<?php
/**
 * The admin-specific settings functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/jasper-jardin-171465129/
 * @since      1.0.0
 *
 * @package    Slake
 * @subpackage Slake/Admin
 * @category   Slake/Slake_Admin_Settings
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

namespace Slake\Admin;

if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * Contains and handles the settings field for the plugin.
 *
 * @package    Slake
 * @subpackage Slake/admin
 * @author     Jasper B. Jardin <jasper.jardin1994@gmail.com>
 */

class Slake_Admin_Settings {

    /**
     * Reference settings class constructor
     */
	public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'settings_menu' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

    /**
     * Display 'Plugins' link under 'Settings'
     *
     * @return void
     */
    public function settings_menu()
    {
        add_options_page(
            esc_html__( 'Slake Settings', 'slake' ),
            esc_html__( 'Slake Settings', 'slake' ),
			'manage_options', 'slake_settings',
			array( $this, 'settings_page' )
		);
        return;
    }

    /**
     * Registers all settings related to the plugin.
     *
     * @return void
     */
    public function register_settings()
    {
        // Register archive slug section.
        add_settings_section(
            'slake-general-settings-section',
            esc_html__('Slake General', 'slake'),
            array( $this, 'general_settings_callback' ),
            'slake-settings-section'
        );
        add_settings_section(
            'slake-general-settings-section1',
            esc_html__('Slake General1', 'slake'),
            array( $this, 'general_settings_callback' ),
            'slake-settings-section'
        );

        // Register the fields.
        $fields = array(
            array(
                'id' => 'slake_style',
                'label' => esc_html__( 'Slake Style', 'slake' ),
                'callback' => 'slake_style_form',
                'section' => 'slake-settings-section',
                'group' => 'slake-general-settings-section',
            ),
            array(
                'id' => 'slake_style1',
                'label' => esc_html__( 'Slake Style1', 'slake' ),
                'callback' => 'slake_style_form',
                'section' => 'slake-settings-section',
                'group' => 'slake-general-settings-section1',
            ),
        );
        foreach ( $fields as $field ) {
            add_settings_field(
                $field['id'],
                $field['label'],
                $field['callback'],
                $field['section'],
                $field['group']
            );

            register_setting( 'slake-settings-group', $field['id'] );

            $file = str_replace( '_', '-', $field['callback'] );
            include_once trailingslashit( SLAKE_DIR_PATH ) .
            'admin/settings-fields/field-' . sanitize_title( $file ) . '.php';
        }
        return;
    }

    /**
     * Callback function for the first Section.
     *
     * @return void
     */
    public function general_settings_callback()
    {
        echo esc_html_e(
            'All general settings for the plugin.', 'slake'
        );
        return;
    }

    /**
     * Renders the 'wrapper' for our options pages.
     *
     * @return void
     */
    public function settings_page()
    { ?>

        <div class="wrap">
            <h2>
                <?php esc_html_e('Slake Settings', 'slake'); ?>
            </h2>

             <?php settings_errors(); ?>

             <h3 class="nav-tab-wrapper">
                 <a href="#" class="nav-tab"><?php esc_html_e('Display Options', 'slake'); ?></a>
                 <a href="#" class="nav-tab"><?php esc_html_e('Social Options', 'slake'); ?></a>
             </h3>

             <form id="slake-settings-form" action="options.php" method="POST">
                <?php settings_fields('slake-settings-group'); ?>
                <?php do_settings_sections('slake-settings-section'); ?>
                <?php submit_button(); ?>
             </form>
        </div>

    <?php }
}
