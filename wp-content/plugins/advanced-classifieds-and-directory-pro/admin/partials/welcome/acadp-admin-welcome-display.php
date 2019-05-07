<?php

/**
 * Welcome Page.
 *
 * @link       http://pluginsware.com/
 * @since      1.0.0
 *
 * @package    advanced-classifieds-and-directory-pro
 * @subpackage advanced-classifieds-and-directory-pro/admin/partials/welcome
 */
?>

<div id="acadp-welcome" class="wrap about-wrap full-width-layout acadp-welcome">

	<h1><?php printf( __( 'Welcome to "Advanced Classifieds & Directory Pro - %s"', 'advanced-classifieds-and-directory-pro' ), ACADP_VERSION_NUM ); ?></h1>
    
    <p class="about-text">
		<?php _e( 'Build any kind of directory site: classifieds, cars, bikes & other vehicles dealers site, pets, real estate portal, yellow pages, etc...', 'advanced-classifieds-and-directory-pro' ); ?>
    </p>
        
	<div class="wp-badge"><?php printf( __( 'Version %s', 'advanced-classifieds-and-directory-pro' ), ACADP_VERSION_NUM ); ?></div>
    
    <p class="about-description">
        <?php _e( 'To get started, watch our few seconds intro below.', 'automatic-youtube-gallery' ); ?>
    </p>

    <div class="headline-feature feature-video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/0ALU7FqfGAM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <p class="acadp-button-getting-started">
        <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=acadp_listings' ) ); ?>" class="button button-primary button-hero"><?php _e( 'Let\'s Get Started', 'advanced-classifieds-and-directory-pro' ); ?></a>
    </p>
    
    <p class="about-description"><?php _e( 'Need Help?', 'advanced-classifieds-and-directory-pro' ); ?></p>
    
    <div class="changelog">    
        <div class="two-col">
            <div class="col">
                <h3><?php _e( 'Phenomenal Support', 'advanced-classifieds-and-directory-pro' ); ?></h3>
                
                <p>
                    <?php printf( __( 'We do our best to provide the best support we can. If you encounter a problem or have a question, simply submit your question using our <a href="%s" target="_blank">support form</a>.', 'advanced-classifieds-and-directory-pro' ), 'https://wordpress.org/support/plugin/advanced-classifieds-and-directory-pro' ); ?>
                </p>
            </div>
            
            <div class="col">
                <h3><?php _e( 'Need Even Faster Support?', 'advanced-classifieds-and-directory-pro' ); ?></h3>
                
                <p>
                    <?php printf( __( 'Our <a href="%s" target="_blank">Priority Support</a> system is there for customers that need faster and/or more in-depth assistance.', 'advanced-classifieds-and-directory-pro' ), 'https://pluginsware.com/submit-a-ticket/' ); ?>
                </p>
            </div>                
        </div>
    </div>
	
</div>