<?php

/**
 * This template displays the listing form.
 */
?>
<div id="acadp_form_track_modal_transport">
<div class="modal fade" id="acadp_form_track_modal" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form action="#" method="post" id="acadp_form_cargo" class="form-vertical" role="form">
			<div class="modal-content modal-screen">
				<div class="modal-header">
					<h4 class="modal-title">Добавить машину</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">


					<div class="row">



					
					<div class="panel panel-default col-sm-12 col-xl-12 m-b-30">
						<div class="panel-heading"><?php _e('Listing details', 'advanced-classifieds-and-directory-pro'); ?></div>

						<div class="panel-body">
							<div class="form-group">
								<label class="control-label" for="acadp-title"><?php _e('Title', 'advanced-classifieds-and-directory-pro'); ?><span class="acadp-star">*</span></label>
								<input type="text" name="title" id="acadp-title" class="form-control" value="" required />
							</div>

							<div id="acadp-custom-fields-listings" data-post_id="">
								<?php do_action('wp_ajax_acadp_public_custom_fields_form_ajax', 0, $category); ?>
							</div>

							<div class="form-group">
								<label class="control-label" for="description"><?php _e('Description', 'advanced-classifieds-and-directory-pro'); ?></label>
								<?php
								$post_content = ($post_id > 0) ? $post->post_content : '';

								if (is_admin()) { // Fix for Gutenberg
									$editor = 'textarea';
								}

								if ('textarea' == $editor) {
									printf('<textarea name="%s" class="form-control" rows="8">%s</textarea>', 'description', $post_content);
								} else {
									wp_editor(
										$post_content,
										'description',
										array(
											'media_buttons' => false,
											'quicktags'     => true,
											'editor_height' => 200
										)
									);
								}
								?>
							</div>
						</div>
					</div>
					
						<!-- Your price -->
						<div class="panel panel-default col-sm-12 col-xl-12 m-b-30">
							<div class="panel-heading"><?php printf('%s [%s]', __("Your price", 'advanced-classifieds-and-directory-pro'), acadp_get_currency()); ?></div>

							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label" for="acadp-price"><?php _e('How much do you want it to be listed for?', 'advanced-classifieds-and-directory-pro'); ?></label>
											<input type="text" name="price" id="acadp-price" class="form-control" value="" />
										</div>
									</div>

									<div class="col-md-6">
										<p class="help-block"><?php _e('You can adjust your price anytime you like, even after your listing is published.', 'advanced-classifieds-and-directory-pro'); ?></p>
									</div>
								</div>
							</div>
						</div>
				
					</div>
					<?php wp_nonce_field( 'acadp_save_listing', 'acadp_crud_nonce' ); ?>
					<!-- Hook for developers to add new fields -->
					<?php do_action('acadp_listing_form_fields'); ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Отмена</button>
					<button type="button" class="btn btn-primary waves-effect waves-light save-form" data-dismiss="modal">Сохранить</button>
				</div>
			</div>
		</form>



		
	</div>
</div>
							</div>