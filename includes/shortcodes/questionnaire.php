<?php
/**
 * LearnDash Articles Shortcode
 *
 * @package Romad
 * @since 1.0.0
 */
add_shortcode( 'slake_questionnaire', 'slake_questionnaire' );

function slake_questionnaire( $atts ) {
    extract(
        shortcode_atts( array(
            'title'         => __( 'Bonus Articles', 'romad' ),
            'post_per_page' => '10',
            'order'         => 'DESC',
            'orderby'       => 'post_date',
            'columns'       => '3',
        ), $atts )
    );
    // Filter allowed columns.
    $allowed_columns = array( "1", "2", "3", "4" );

    if ( ! in_array( $columns, $allowed_columns, true ) ) {
    	$columns = 3;
    }

    $output       = '';
    $columns      = intval( $columns );
    $current_user = wp_get_current_user();
	$user_id      = $current_user->ID;
    $post_type    = 'post';


    $args = array(
        'post_type'      => $post_type,
        'posts_per_page' => $post_per_page,
        'order'          => $order,
        'orderby'        => $orderby,
    );

    $articles = new WP_Query( $args );

    ob_start();

        if ( $articles->have_posts() ) :

            if ( 'hide' !== $title) {
                $output .= '<div class="learndash-shortcode-title">';
                    $output .= '<h2 class="shortcode-title">' . esc_html( $title ) . '</h2>';
                    $output .= '<a class="see-all" href="'. esc_url( get_post_type_archive_link('post') ) .'">';
                        $output .= esc_html__( 'See All', 'romad' );
                    $output .= '</a>';
                $output .= '</div>';
            }

            $output .= '<div class="romad-articles-container shortcode learndash-shortcode">';
                while ( $articles->have_posts() ) : $articles->the_post();

                    $post_id    = $articles->post->ID;
                    $post_title = $articles->post->post_title;
                    $thumbnail  = get_the_post_thumbnail_url( $post_id );

                    if ( empty( $thumbnail ) ) {
                        $thumbnail = get_template_directory_uri() . '/assets/images/placeholder.jpg';
                    }

                    $course_args = array(
                        'id'      => $post_id,
                        'metakey' => $type_metakey,
                    );

                    $output .= '<div class="romad-articles learndash-itembox column-' . esc_attr( $columns ) . ' ' . esc_attr( $post_type . '-' . $post_id ) . '">';
                        $output .= '<div class="inner-box">';

                            $output .= '<div class="featured-image-container">';
                                $output .= '<img class="featured-image" src="' . esc_url( $thumbnail ) . '">';
                            $output .= '</div>';

                            $output .= '<div class="info-container">';
                                $output .= '<h4 class="info-title">';
                                    $output .= '<a href="' . esc_url( get_the_permalink( $post_id ) ). '" class="info-link">';
                                        $output .= esc_html($post_title);
                                    $output .= '</a>';
                                $output .= '</h4>';
                            $output .= '</div>';

                        $output .= '</div>';

                    $output .= '</div>';
                endwhile;
            $output .= '</div>';
            wp_reset_postdata();
        else :
            $output .= '<div class="alert alert-info">';
            $output .= '<p>' . esc_html__( 'There are no items found.', 'romad' ) . '</p>';
            $output .= '</div>';
            $output .= '<div class="clearfix"></div>';
        endif;
    $output .= ob_get_clean();
    return $output;
}
