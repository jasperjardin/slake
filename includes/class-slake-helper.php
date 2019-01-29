<?php

/**
 * Define the helper functionalities.
 *
 * @link       https://www.linkedin.com/in/jasper-jardin-171465129/
 * @since      1.0.0
 *
 * @package    Slake
 * @subpackage Slake/Includes
 * @category   Slake/Slake_Helper
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

namespace Slake\Includes;

if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
  * Define the helper functionalities.
 *
 * This class defines all code necessary template tags or helpers for the plugin.
 *
 * @since      1.0.0
 * @package    Slake
 * @subpackage Slake/Includes
 * @author     Jasper B. Jardin <jasper.jardin1994@gmail.com>
 */

class Slake_Helper {

	/**
	 * Use to fetch files inside a directory.
	 *
	 * @link   https://codex.wordpress.org/Class_Reference/WP_Query
	 * @since  1.0.0
	 */
     public function get_wp_query( $args = array() ) {

         $default_args = array(
             'post_type' => '',
             'posts_per_page' => -1,
             'order' => 'ASC',
             'orderby' => 'name',
         );

         $merged_args = array_merge( $default_args, $args );

         $query = new \WP_Query( $merged_args );

         return $query;
     }

	/**
	 * Use to fetch files inside a directory.
	 *
	 * @since  1.0.0
	 */
     public function get_dir_files( $directory = '' ) {
         if ( ! empty( $directory ) ) {
             $filelist = array();

             if ( is_dir( $directory ) ) {
                 if ( $dh = opendir( $directory ) ) {
                     while ( false !== ( $file = readdir( $dh ) ) ) {
                         if ( !is_dir( $file ) ) {
                             $filelist[] = $file;
                         }
                     }
                     closedir($dh);
                 }
             }
             return $filelist;
         }
         return;
     }

}
