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
 * @category   Slake/Slake_Questions_Selector_Metaboxes
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

final class Slake_Questions_Selector_Metaboxes {

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
        $post_type = 'bd-questionnaires';

        add_meta_box(
            'slake_questions_selector_field',
            esc_html__('Questions Selector', 'slake'),
            array( $this, 'questions_selector_field'),
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
    public function questions_selector_field( $post ) {
        $helper = new \Slake\Includes\Slake_Helper();
        $args = array(
            'post_type' => 'bd-questions',
        );

        $questions = $helper->get_wp_query( $args );

        // Make sure the form request comes from WordPress
        wp_nonce_field( basename( __FILE__ ), 'slake_questions_nonce' );

        $orders_set = array();
        $question_list = array();
        $questions_reorder = array();
        $questions_merged = '';
        $questions_sorted = array();
        $ids = get_post_meta( $post->ID, 'slake_questions_meta_key', true );

        if ( is_array( $ids ) ) {
            $ids = $ids['slake_questions_selector'];
        }

        $orders = get_post_meta( $post->ID, 'slake_questions_order_meta_key', true );

        if ( !is_array( $orders ) ) {
            $orders = explode(",", $orders);
        }


        // if ( empty( $order ) || empty( $order[0] ) ) {
        if ( empty( $orders ) || empty( $orders[0] ) ) {
            $orders = $ids;
        }

        if ( is_array( $orders ) ) {
            foreach ($orders as $order) {
                $orders_set[$order] = $order;
            }
        }

        foreach ($questions->posts as $question) {
            $post_id = $question->ID;
            $question_list[$post_id] = $question;
        }

        foreach ($orders_set as $order) {
            foreach ($question_list as $id => $question) {
                if ($order == $id) {
                    $questions_reorder[$order] = $question;
                }
            }
        }

        $questions_merged = array_merge($questions_reorder, $question_list);
        foreach ($questions_merged as $question) {
            $post_id = $question->ID;
            // $questions_sorted[$post_id] = $question;
            $questions_sorted[$post_id] = $question;
        }

        ob_start();

            $output = '<label class="screen-reader-text" for="slake_questions_selector">' . esc_html__( 'Select Questions', 'slake' ) . '</label>';

            $output .= '<select name="slake_questions_selector[]" multiple="multiple" data-tags="true" id="slake_questions_selector" class="slake_select2 sortable postbox">';

                // $output .= '<option value="">' . esc_html__( '— None —', 'slake' ) . '</option>';

                foreach ( $questions_sorted as $question) {
                    $post_id = $question->ID;
                    $title   = get_the_title( $post_id );

                    if ( in_array( $post_id, $orders_set ) ) {
                        $output .= '<option value="' . esc_attr( $post_id ) . '" data-order="' . esc_attr( $post_id ) . '" ' . selected( $post_id, $post_id, false ) . '>' . esc_html( $title ) . '</option>';
                    } else {
                        $output .= '<option value="' . esc_attr( $post_id ) . '">' . esc_html( $title ) . '</option>';
                    }

                }

            $output .= '</select>';

            if ( is_array( $orders ) ) {
                $output .= '<input type="hidden" name="slake_questions_order" id="slake_questions_order" class="slake_select2_order" value="' . esc_attr( implode( ',', $orders ) ) . '" >';
            } else {
                $output .= '<input type="hidden" name="slake_questions_order" id="slake_questions_order" class="slake_select2_order" value="' . esc_attr( $orders ) . '" >';
            }

        $output .= '<p class="howto">' . esc_html__( 'Select questions for the questionnaire', 'slake' ) . '</p>';
        $output .= ob_get_clean();

        echo $output;
    }

    /**
	 * Save the data on Metaboxes.
	 *
	 * @since    1.0.0
	 */
    public function save_metaboxes($post_id) {
        $sanitized_question_nonce = filter_input( INPUT_POST, 'slake_questions_nonce', FILTER_SANITIZE_STRING );
        $filtered_data_order      = filter_input( INPUT_POST, 'slake_questions_order', FILTER_SANITIZE_STRING );
        $filtered_data            = array();

        $question = 'slake_questions_selector';

        $filters      = [
            $question => [
                'filter' => FILTER_SANITIZE_NUMBER_INT,
                'flags'  => FILTER_FORCE_ARRAY,
            ],
        ];

        $filtered_data = filter_input_array( INPUT_POST, $filters );
        $sanitized_question = $filtered_data;

        if ( empty( $filtered_data_order ) ) {
            $filtered_data_order = $sanitized_question;
        }

        // verify taxonomies meta box nonce
    	if ( !isset( $sanitized_question_nonce ) || !wp_verify_nonce( $sanitized_question_nonce, basename( __FILE__ ) ) ){
    		return;
    	}
        if ( array_key_exists( 'slake_questions_selector', $_POST ) ) {
            update_post_meta( $post_id, 'slake_questions_meta_key', $sanitized_question );
        }
        if ( array_key_exists( 'slake_questions_order', $_POST ) ) {
            update_post_meta( $post_id, 'slake_questions_order_meta_key', $filtered_data_order );
        }

    }

}

new \Slake\Includes\Slake_Questions_Selector_Metaboxes();
