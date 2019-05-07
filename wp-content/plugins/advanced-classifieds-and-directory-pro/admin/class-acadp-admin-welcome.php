<?php

/**
 * Welcome Page.
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
 * ACADP_Admin_Welcome Class
 *
 * @since    1.6.1
 * @access   public
 */
class ACADP_Admin_Welcome {
	
	/**
	 * Add welcome page sub menu.
	 *
	 * @since    1.6.1
	 */
	public function add_welcome_page_menu() {
	
		add_dashboard_page(
			__( 'Welcome - Advanced Classifieds and Directory Pro', 'advanced-classifieds-and-directory-pro' ),
			__( 'Welcome - Advanced Classifieds and Directory Pro', 'advanced-classifieds-and-directory-pro' ),
			'manage_acadp_options',
			'acadp_welcome',
			array( $this, 'display_welcome_content' )
		);

		// Now remove the menu so plugins that allow customizing the admin menu don't show this
		remove_submenu_page( 'index.php', 'acadp_welcome' );
	
	}
	
	/**
	 * Display welcome page content.
	 *
	 * @since    1.6.1
	 */
	public function display_welcome_content() {		
		require_once ACADP_PLUGIN_DIR . 'admin/partials/welcome/acadp-admin-welcome-display.php';		
	}
	
}
