<?php

/**
 * Listings Page [acadp_listings]
 *
 * @package       advanced-classifieds-and-directory-pro
 * @subpackage    advanced-classifieds-and-directory-pro/public
 * @copyright     Copyright (c) 2015, PluginsWare
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since         1.0.0
 */
 
// Exit if accessed directly
if( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * ACADP_Public_Listings Class
 *
 * @since    1.0.0
 * @access   public
 */
class ACADP_Public_Prepare_Html_Ajax {

	/**
	 * Get things going.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function __construct() {
		//add_shortcode( "acadp_listings_ajax", array( $this, "get_content" ) );

	}
	

	public function get_prepare_html( $atts) {
	
		


		if( ! is_user_logged_in() ) {	
				//echo 'Необходимо зарегестрироваться';

				ob_start();
				include( acadp_get_template( "registration/acadp-public-nologin-ajax-display.php" ) );
				include( acadp_get_template( "registration/acadp-public-login-reg-form-ajax-display.php" ) );
				wp_die();
				return ob_get_clean();

				
			wp_die();
			return ;//acadp_login_form();	/??????????????		
		}		
		
	
		
			
			ob_start();

			include( acadp_get_template( "registration/acadp-public-accaunt-menu-ajax-display.php" ) );



			include( acadp_get_template( "user/acadp-public-ajax-form-cargo-display.php" ) );
			include( acadp_get_template( "user/acadp-public-ajax-form-truck-display.php" ) );
			include( acadp_get_template( "user/acadp-public-ajax-form-call-display.php" ) );
			include( acadp_get_template( "user/acadp-public-ajax-form-find-cargo-display.php" ) );
			wp_die();
			return ob_get_clean();
				
		
		
		return '<span>'.__( 'No Results Found.', 'advanced-classifieds-and-directory-pro' ).'</span>';
		
	



	}



	public function add_custom_scripts() {
		//print_r('ljhgjhgkjhgkjhg');
		
		
	}


}
