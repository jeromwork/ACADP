<?php

/**
 * Custom Fields
 *
 * @package       advanced-classifieds-and-directory-pro
 * @subpackage    advanced-classifieds-and-directory-pro/admin
 * @copyright     Copyright (c) 2015, PluginsWare
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since         1.0.0
 */

// Exit if accessed directly
if( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * ACADP_Admin_Fields Class
 *
 * @since    1.0.0
 * @access   public
 */
class ACADP_Admin_Fields_Custom {
	
//add_action( 'acadp-admin-filds-custom', 'hand_custom_filds_admin', 10, 2 );
public function hand_custom_filds_admin($post_id, $post){


    $s = $_POST;
   // exit;
    $field_cell_search = (int)$_POST['cell_search'];
    update_post_meta( $post_id, 'cell_search', $field_cell_search );


    $field_only_search = (int) $_POST['only_search'];
    update_post_meta( $post_id, 'only_search', $field_only_search );

    $field_numeric_min = (float) $_POST['numeric_min'];
    update_post_meta( $post_id, 'numeric_min', $field_numeric_min );

    $field_numeric_max = (float) $_POST['numeric_max'];
    update_post_meta( $post_id, 'numeric_max', $field_numeric_max );

    $field_numeric_step = (float) $_POST['numeric_step'];
    update_post_meta( $post_id, 'numeric_step', $field_numeric_step );


    $field_field_name = sanitize_text_field($_POST['field_name']);
    update_post_meta( $post_id, 'field_name', $field_field_name );

}

}
?>