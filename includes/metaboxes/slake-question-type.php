<?php

/**
 * This class is executes questions metaboxes for the bd-questionnaire.
 *
 * This class defines all code necessary to initialize the questions metaboxes for the bd-questionnaire.
 *
 * @link       https://www.linkedin.com/in/jasper-jardin-171465129/
 * @since      1.0.0
 *
 * @package    Slake
 * @subpackage Slake/Includes
 * @category   Slake/Slake_Questions_Type_Metaboxes
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

namespace Slake\Includes;

if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * This class is executes questions metaboxes for the bd-questionnaire.
 *
 * This class defines all code necessary to initialize the questions metaboxes for the bd-questionnaire.
 *
 * @since      1.0.0
 * @package    Slake
 * @subpackage Slake/Includes
 * @author     Jasper B. Jardin <jasper.jardin1994@gmail.com>
 */

final class Slake_Questions_Type_Metaboxes {

	/**
	 * Runs and includes the files that contains metabox.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post', array( $this, 'save_metaboxes' ) );
	}

    /**
	 * Registers and add the Metaboxes.
	 *
     * @param post $post The post object
     * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
	 * @since    1.0.0
	 */
    public function add_meta_box() {
        $post_type = 'bd-questions';

        add_meta_box(
            'slake_questions_selector_field',
            esc_html__('Questions Type', 'slake'),
            array( $this, 'questions_type_selector'),
            $post_type,
            'side',
            'high'
        );
    }

    /**
	 * Fetch the list of questions.
	 *
	 * @since    1.0.0
	 */
    public function questions_type_selector( $post ) {
        $helper = new \Slake\Includes\Slake_Helper();

        $allowed_types = array(
            'text',
            'email',
            'number',
            'yes or no'
        );

        // Make sure the form request comes from WordPress
        wp_nonce_field( basename( __FILE__ ), 'slake_question_type_nonce' );

        $selected_type = get_post_meta( $post->ID, 'slake_question_type_meta_key', true );
        $is_required   = get_post_meta( $post->ID, 'slake_question_required_meta_key', true );

        ob_start();

            $output = '<label class="screen-reader-text" for="slake_question_type_selector">' . esc_html__( 'Select Questions', 'slake' ) . '</label>';

            $output .= '<select name="slake_question_type_selector" id="slake_question_type_selector" class="slake_select2 postbox">';

                // $output .= '<option value="">' . esc_html__( '— None —', 'slake' ) . '</option>';

                foreach ( $allowed_types as $type ) {

                    $output .= '<option value="' . esc_attr( $type ) . '" data-order="' . esc_attr( $type ) . '" ' . selected( $type, $selected_type, false ) . '>' . esc_html( $type ) . '</option>';

                }

            $output .= '</select>';
            
            $output .= '<p class="howto">' . esc_html__( 'Select questions type', 'slake' ) . '</p>';

            $output .= '<label class="selectit">';
                $output .= '<input name="slake_question_required" id="slake_question_required" type="checkbox" class="regular-text code" value="1" ' . checked( 1, $is_required, false ) . '>';
                $output .= __( 'required', 'slake' );
            $output .= '</label>';

        $output .= ob_get_clean();

        echo $output;
    }

    /**
	 * Save the data on Metaboxes.
	 *
	 * @since    1.0.0
	 */
    public function save_metaboxes($post_id) {
        $sanitized_question_nonce = filter_input( INPUT_POST, 'slake_question_type_nonce', FILTER_SANITIZE_STRING );
        $sanitized_question_type  = filter_input( INPUT_POST, 'slake_question_type_selector', FILTER_SANITIZE_STRING );
        $sanitized_question_req   = filter_input( INPUT_POST, 'slake_question_required', FILTER_SANITIZE_NUMBER_INT );

        // verify taxonomies meta box nonce
    	if ( !isset( $sanitized_question_nonce ) || !wp_verify_nonce( $sanitized_question_nonce, basename( __FILE__ ) ) ){
    		return;
    	}
        if ( array_key_exists( 'slake_question_type_selector', $_POST ) ) {
            update_post_meta( $post_id, 'slake_question_type_meta_key', $sanitized_question_type );
        }
        if ( array_key_exists( 'slake_question_required', $_POST ) ) {
            update_post_meta( $post_id, 'slake_question_required_meta_key', $sanitized_question_req );
        }

    }

}

new \Slake\Includes\Slake_Questions_Type_Metaboxes();
