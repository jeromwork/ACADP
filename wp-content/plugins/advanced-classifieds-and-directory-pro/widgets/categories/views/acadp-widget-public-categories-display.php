<?php

/**
 * This template displays the public-facing aspects of the widget.
 */
?>

<div class="acadp acadp-widget-categories">
	<?php if( 'dropdown' == $query_args['template'] ) : ?>
    	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        	<select class="form-control" name="acadp_categories" onchange="this.form.submit()">
							<option value=""><?php _e( 'Select a Category', 'advanced-classifieds-and-directory-pro' ); ?></option>
            	<?php echo $categories; ?>
            </select>
        </form>
    <?php else :
		echo $categories;
	endif; ?>
</div>