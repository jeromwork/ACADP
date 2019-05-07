<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://pluginsware.com/
 * @since             1.0.0
 * @package           advanced-classifieds-and-directory-pro
 *
 * @wordpress-plugin
 * Plugin Name:       Advanced Classifieds and Directory Pro
 * Plugin URI:        https://pluginsware.com/
 * Description:       Provides an ability to build any kind of business directory site: classifieds, cars, bikes, boats and other vehicles dealers site, pets, real estate portal, wedding site, yellow pages, etc...
 * Version:           1.6.3
 * Author:            PluginsWare
 * Author URI:        https://pluginsware.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       advanced-classifieds-and-directory-pro
 * Domain Path:       /languages
 */

// Exit if accessed directly
if( ! defined( 'WPINC' ) ) {
	die;
}

// The unique identifier of this plugin
if( ! defined( 'ACADP_PLUGIN_NAME' ) ) {
    define( 'ACADP_PLUGIN_NAME', 'advanced-classifieds-and-directory-pro' );
}

// The current version of the plugin
if( ! defined( 'ACADP_VERSION_NUM' ) ) {
    define( 'ACADP_VERSION_NUM', '1.6.3' );
}

// Path to the plugin directory
if( ! defined( 'ACADP_PLUGIN_DIR' ) ) {
    define( 'ACADP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// URL of the plugin
if( ! defined( 'ACADP_PLUGIN_URL' ) ) {
    define( 'ACADP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! function_exists( 'acadp_fs' ) ) {

    // Create a helper function for easy SDK access
    function acadp_fs() {

        global $acadp_fs;

        if ( ! isset( $acadp_fs ) ) {

            // Activate multisite network integration
            if ( ! defined( 'WP_FS__PRODUCT_2877_MULTISITE' ) ) {
                define( 'WP_FS__PRODUCT_2877_MULTISITE', true );
            }

            // Include Freemius SDK
            require_once dirname( __FILE__ ) . '/freemius/start.php';

            $acadp_fs = fs_dynamic_init( array(
                'id'                  => '2877',
                'slug'                => 'advanced-classifieds-and-directory-pro',
                'type'                => 'plugin',
                'public_key'          => 'pk_459968d11a1de798088f855a5e5d0',
                'is_premium'          => false,
                'has_addons'          => true,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'edit.php?post_type=acadp_listings',
                    'first-path'     => 'index.php?page=acadp_welcome',
                    'support'        => false,
                ),
            ) );
        }

        return $acadp_fs;
    }

    // Init Freemius
    acadp_fs();

    // Signal that SDK was initiated
    do_action( 'acadp_fs_loaded' );

}

// The code that runs during plugin activation
function activate_acadp() {

	require_once ACADP_PLUGIN_DIR . 'includes/class-acadp-activator.php';
	ACADP_Activator::activate();
	
}

// The code that runs during plugin deactivation
function deactivate_acadp() {

	require_once ACADP_PLUGIN_DIR . 'includes/class-acadp-deactivator.php';
	ACADP_Deactivator::deactivate();
	
}

register_activation_hook( __FILE__, 'activate_acadp' );
register_deactivation_hook( __FILE__, 'deactivate_acadp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require ACADP_PLUGIN_DIR . 'includes/class-acadp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_acadp() {
//print_r('we are here!');
	$plugin = new ACADP();
	$plugin->run();

}
run_acadp();

/**
 * Plugin uninstall cleanup.
 *
 * @since    1.6.1
 */
function acadp_fs_uninstall_cleanup() {

    global $wpdb;

    // Delete All the Custom Post Types
    $acadp_post_types = array( 'acadp_listings', 'acadp_fields', 'acadp_payments' );

    foreach( $acadp_post_types as $post_type ) {

        $items = get_posts( array( 'post_type' => $post_type, 'post_status' => 'any', 'numberposts' => -1, 'fields' => 'ids' ) );
        
        if( $items ) {
            foreach( $items as $item ) {
                // Delete attachments (only if applicable)
                if( 'acadp_listings' == $post_type ) {
                    $images = get_post_meta( $item, 'images', true );
                    
                    if( ! empty( $images ) ) {
                    
                        foreach( $images as $image ) {
                            wp_delete_attachment( $image, true );
                        }
                    
                    }
                }
                
                // Delete the actual post
                wp_delete_post( $item, true );
            }
        }
                
    }

    // Delete All the Terms & Taxonomies
    $acadp_taxonomies = array( 'acadp_categories', 'acadp_locations' );

    foreach( $acadp_taxonomies as $taxonomy ) {

        $terms = $wpdb->get_results( $wpdb->prepare( "SELECT t.*, tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy IN ('%s') ORDER BY t.name ASC", $taxonomy ) );
        
        // Delete Terms
        if( $terms ) {
            foreach( $terms as $term ) {
                $wpdb->delete( $wpdb->term_taxonomy, array( 'term_taxonomy_id' => $term->term_taxonomy_id ) );
                $wpdb->delete( $wpdb->terms, array( 'term_id' => $term->term_id ) );
            }
        }
        
        // Delete Taxonomies
        $wpdb->delete( $wpdb->term_taxonomy, array( 'taxonomy' => $taxonomy ), array( '%s' ) );

    }

    // Delete the Plugin Pages
    if( $acadp_created_pages = get_option( 'acadp_page_settings' ) ) {

        foreach( $acadp_created_pages as $page => $id ) {

            if( $id > 0 ) {
                wp_delete_post( $id, true );
            }
        
        }

    }

    // Delete all the Plugin Options
    $acadp_settings = array(
        'acadp_general_settings',
        'acadp_listings_settings',
        'acadp_locations_settings',
        'acadp_categories_settings',
        'acadp_registration_settings',
        'acadp_currency_settings',
        'acadp_page_settings',
        'acadp_featured_listing_settings',						
        'acadp_gateway_settings',
        'acadp_gateway_offline_settings',
        'acadp_email_settings',
        'acadp_email_template_listing_submitted',
        'acadp_email_template_listing_published',
        'acadp_email_template_listing_renewal',
        'acadp_email_template_listing_expired',	
        'acadp_email_template_renewal_reminder',
        'acadp_email_template_order_created',
        'acadp_email_template_order_created_offline',
        'acadp_email_template_order_completed',
        'acadp_email_template_listing_contact',
        'acadp_permalink_settings',
        'acadp_socialshare_settings',	
        'acadp_map_settings',
        'acadp_recaptcha_settings',
        'acadp_terms_of_agreement'
    );

    foreach( $acadp_settings as $settings ) {
        delete_option( $settings );
    }

    delete_option( 'acadp_categories_children' );
    delete_option( 'acadp_locations_children' );
    delete_option( 'acadp_admin_notice_dismissed' );
    delete_option( 'acadp_version' );

    // Delete Capabilities
    $roles = new ACADP_Roles;
    $roles->remove_caps();

}

acadp_fs()->add_action( 'after_uninstall', 'acadp_fs_uninstall_cleanup' );
function acdp(){
//echo 'sdfjlsglkdfjks;g';
    //echo do_shortcode( '[acadp_listings]' );


};