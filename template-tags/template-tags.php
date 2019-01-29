<?php

/**
 * Fetch global $post variable.
 *
 * @link   https://codex.wordpress.org/Function_Reference/$post
 * @since  1.0.0
 */
function slake_get_post() {
    global $post;

    return $post;
}

/**
 * Fetch files from a directory.
 *
 * @link   https://codex.wordpress.org/Class_Reference/WP_Query
 * @since  1.0.0
 */
function slake_get_wp_query( $args = array() ) {

    $default_args = array(
        'post_type' => '',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'name',
    );

    $merged_args = array_merge( $default_args, $args );

    $query = new WP_Query( $merged_args );

    return $query;
}

/**
 * Retrieves a template part
 *
 * @since 1.0.0
 *
 * @param string $slug
 * @param string $name Optional. Default null
 *
 * @uses  slake_locate_template()
 * @uses  load_template()
 * @uses  get_template_part()
 */
function slake_get_template_part( $slug, $name = null, $load = true ) {
	// Execute code for this part
	do_action( 'get_template_part_' . $slug, $slug, $name );

	// Setup possible parts
	$templates = array();
	if ( isset( $name ) )
		$templates[] = $slug . '-' . $name . '.php';
	$templates[] = $slug . '.php';

	// Allow template parts to be filtered
	$templates = apply_filters( 'slake_get_template_part', $templates, $slug, $name );

	// Return the part that is found
	return slake_locate_template( $templates, $load, false );
}

/**
 * Retrieve the name of the highest priority template file that exists.
 *
 * Searches in the STYLESHEETPATH before TEMPLATEPATH so that themes which
 * inherit from a parent theme can just overload one file. If the template is
 * not found in either of those, it looks in the theme-compat folder last.
 *
 * @since 1.0.0
 *
 * @param string|array $template_names Template file(s) to search for, in order.
 * @param bool $load If true the template file will be loaded if it is found.
 * @param bool $require_once Whether to require_once or require. Default true.
 *                            Has no effect if $load is false.
 * @return string The template filename if one is located.
 */
function slake_locate_template( $template_names, $load = false, $require_once = true ) {
	// No file found yet
	$located = false;

	// Try to find a template file
	foreach ( (array) $template_names as $template_name ) {

		// Continue if template is empty
		if ( empty( $template_name ) )
			continue;

		// Trim off any slashes from the template name
		$template_name = ltrim( $template_name, '/' );

		// Check child theme first
		if ( file_exists( trailingslashit( get_stylesheet_directory() ) . 'templates/' . $template_name ) ) {
			$located = trailingslashit( get_stylesheet_directory() ) . 'templates/' . $template_name;
			break;

		// Check parent theme next
		} elseif ( file_exists( trailingslashit( get_template_directory() ) . 'templates/' . $template_name ) ) {
			$located = trailingslashit( get_template_directory() ) . 'templates/' . $template_name;
			break;

		// Check theme compatibility last
		} elseif ( file_exists( trailingslashit( slake_get_templates_dir() ) . $template_name ) ) {
			$located = trailingslashit( slake_get_templates_dir() ) . $template_name;
			break;
		}
	}

	if ( ( true == $load ) && ! empty( $located ) )
		load_template( $located, $require_once );

	return $located;
}

function slake_get_templates_dir() {
    $directory = plugin_dir_path( dirname( __FILE__ ) ) . '/templates';

    return $directory;

}

function slake_get_public_images($file) {
    if ( !empty( $file ) ) {
        $directory = plugin_dir_url( dirname( __FILE__ ) ) . 'public/images/' . $file;

        return $directory;
    }
    return;
}

function slake_questionnaire_field( $id ) {

    ob_start();

        $output .= '<div class="input-block form-group">';
            $output .= '<h3 class="form-title">Down to business...</h3>';
            $output .= '<div class="label"><strong>6 .</strong>Position *</div>';
                $output .= '<div class="input-control">';
                $output .= '<input type="text" class="form-control required" autocomplete="off">';
                
                $output .= '<input id="toggle-on-q7" class="toggle toggle-left" name="q7" value="yes" type="radio">';
                $output .= '<label for="toggle-on-q7" class="btn btn-q btn-q-y"><span>A</span> Yes</label>';
                $output .= '<input id="toggle-off-q7" class="toggle toggle-right" name="q7" value="no" type="radio">';
                $output .= '<label for="toggle-off-q7" class="btn btn-q btn-q-n"><span>B</span> No</label>';

            $output .= '</div>';
        $output .= '</div>';

    $output .= ob_get_clean();

    echo $output;
}


/**
 * Locate template.
 *
 * Locate the called template.
 * Search Order:
 * 1. /themes/theme/templates/$template_name
 * 2. /themes/theme/$template_name
 * 3. /plugins/slake/templates/$template_name.
 *
 * @since 1.0.0
 *
 * @param 	string 	$template_name			Template to load.
 * @param 	string 	$string $template_path	Path to templates.
 * @param 	string	$default_path			Default path to template files.
 * @return 	string 							Path to the template file.
 */
// function slake_locate_template( $template_name, $template_path = '', $default_path = '' ) {
// 	// Set variable to search in templates folder of theme.
// 	if ( ! $template_path ) :
// 		$template_path = 'templates/';
// 	endif;
// 	// Set default plugin templates path.
// 	if ( ! $default_path ) :
// 		$default_path = plugin_dir_path( __FILE__ ) . 'templates/'; // Path to the template folder
// 	endif;
// 	// Search template file in theme folder.
// 	$template = locate_template( array(
// 		$template_path . $template_name,
// 		$template_name
// 	) );
// 	// Get plugins template file.
// 	if ( ! $template ) :
// 		$template = $default_path . $template_name;
// 	endif;
// 	return apply_filters( 'slake_locate_template', $template, $template_name, $template_path, $default_path );
// }

/**
 * Get template.
 *
 * Search for the template and include the file.
 *
 * @since 1.0.0
 *
 * @see slake_locate_template()
 *
 * @param string 	$template_name			Template to load.
 * @param array 	$args					Args passed for the template file.
 * @param string 	$string $template_path	Path to templates.
 * @param string	$default_path			Default path to template files.
 */
// function slake_get_template( $template_name, $args = array(), $tempate_path = '', $default_path = '' ) {
// 	if ( is_array( $args ) && isset( $args ) ) :
// 		extract( $args );
// 	endif;
// 	$template_file = slake_locate_template( $template_name, $tempate_path, $default_path );
// 	if ( ! file_exists( $template_file ) ) :
// 		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $template_file ), '1.0.0' );
// 		return;
// 	endif;
// 	include $template_file;
// }


// add_filter( 'template_include', 'my_plugin_templates' );
// function my_plugin_templates( $template ) {
//     $post_types = array( 'bd-questionnaires' );
//
//     if ( is_post_type_archive( $post_types ) && file_exists( plugin_dir_path(__FILE__) . 'templates/archive-bd-questionnaires.php' ) ){
//         $template = plugin_dir_path(__FILE__) . 'templates/archive-bd-questionnaires.php';
//     }
//
//     if ( is_singular( $post_types ) && file_exists( plugin_dir_path(__FILE__) . 'templates/single-bd-questionnaires.php' ) ){
//         $template = plugin_dir_path(__FILE__) . 'templates/single-bd-questionnaires.php';
//     }
//     return $template;
// }
