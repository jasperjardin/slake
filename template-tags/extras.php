<?php
/**
 * Holds functions which hooks to 3rd-party plugin.
 *
 * 1.0 - Function hooked to WordPress hooks.
 *      1.1 - slake_wc_artist_modify_title().
 * 2.0 - Function hooked to WooCommerce plugin hooks.
 */

/*------------------------------------------------------------------
 * 1.0 - Function hooked to WordPress hooks.
 *-------------------------------------------------------------------*/

/**
 * 1.1 - Function that change the Title field on WordPress Post Editor.
 */
function slake_wc_artist_modify_title( $title ){
     $screen = get_current_screen();

     if  ( 'wc-slake-artists' == $screen->post_type ) {
          $title = 'Enter artist name';
     }

     return $title;
}

add_filter( 'enter_title_here', 'slake_wc_artist_modify_title' );

/*------------------------------------------------------------------
 * 2.0 - Function hooked to WooCommerce plugin hooks.
 *-------------------------------------------------------------------*/

 function slake_woocommerce_before_single_product_summary(){
     $post  = slake_get_post();
     $id    = $post->ID;
     $artist_id = get_post_meta( $id, 'slake_artists_meta_key', true );
     $artist_obj = get_post( $artist_id );
     $artist_name   = get_the_title( $artist_id );
     $content = wp_strip_all_tags( $artist_obj->post_content );
     $profile_img = get_the_post_thumbnail_url( $artist_id, 'full' );

     echo '<div class="product-artist">';
         echo '<img src="' . esc_url( $profile_img ) . '">';
         echo '<h3>' . $artist_name . '</h3>';
         echo '<div>' . $content . '</div>';
     echo '</div>';
     ?>
     <style>
        .single-product .product-artist {
            width: 30%;
            display: inline-block;
            vertical-align: top;
        }
        .single-product div.product {
            width: 60%;
            display: inline-block;
            vertical-align: top;
        }
        .has-sidebar.woocommerce-page:not(.error404).single-product #primary {
            width: 100%;
        }
        .has-sidebar.woocommerce-page:not(.error404).single-product #secondary {
            display: none;
        }
    </style>

<?php
}

add_filter( 'woocommerce_after_main_content', 'slake_woocommerce_before_single_product_summary' );


function slake_array_sub_sort(array $values, array $keys){
    $keys = array_flip($keys);
    return array_merge(array_intersect_key($keys, $values), array_intersect_key($values, $keys));
}

function slake_array_combine($arr1 = array(),$arr2 = array()){
    if(is_array($arr1) && is_array($arr2)):
        $cntArr1 = count($arr1);
        $cntArr2 = count($arr2);
        $difference = max($cntArr1,$cntArr2) - min($cntArr1,$cntArr2);
        if($cntArr1 > $cntArr2):
            for ($i=1;$i<=$difference;$i++){
                $arr2[$cntArr2+$i] = $cntArr2 + 1;
            }
            return array_combine($arr1,$arr2);
        elseif($cntArr1 < $cntArr2):
            for ($i=1;$i<=$difference;$i++){
                $arr1[$cntArr1+$i] = count($arr1) + 1;
            }
            return array_combine($arr1,$arr2);
        else:
            return array_combine($arr1,$arr2);
        endif;
    endif;
}
