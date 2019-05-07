<?php

/**
 * This template adds custom fields to the listing form.
 * В этом суб шаблоне происходит построение HTML разметки для дополнительных полей пользователя
 * Что бы доп поле корректно отобразилось нужно внести его тип в этот файл и обработать (создать)
 * 
 * 
 * 
 * 
 * 
 */
?>
<?php if ($acadp_query->have_posts()) : ?>
	<?php while ($acadp_query->have_posts()) : $acadp_query->the_post();
		$field_meta = get_post_meta($post->ID); ?>

		<?php

		if (isset($field_meta['only_search'][0]) && $field_meta['only_search'][0] == 1) {
			continue;
		}


		?>


		<div class="form-group">
			<?php


			if ($field_meta['type'][0] == 'hidden') {
				$value = $field_meta['default_value'][0];
				if (isset($post_meta[$post->ID])) {
					$value = $post_meta[$post->ID][0];
				}

				$required_label = $required_attr = '';
				printf(
					'<input type="hidden" id="acadp_%s" name="acadp_fields[%d]" class="form-control" placeholder="%s" value="%s"%s/>',
					esc_attr($field_meta['field_name'][0]),
					$post->ID,
					esc_attr($field_meta['placeholder'][0]),
					esc_attr($value),
					$required_attr
				);
				echo '</div>';
				continue;
			}


			$required_label = $required_attr = '';
			if (1 == $field_meta['required'][0]) {
				$required_label = '<span class="acadp-star">*</span>';

				if ('checkbox' == $field_meta['type'][0]) {
					$required_attr = ' class="acadp_fields_' . $post->ID . '" data-cb_required="acadp_fields_' . $post->ID . '"';
				} else {
					$required_attr = ' required';
				}
			}
			?>








			<label class="control-label">
				<?php the_title(); ?>
				<?php echo $required_label; ?>

			</label>

			<?php if (!empty($field_meta['instructions'][0])) : ?>
				<small class="help-block"><?php echo $field_meta['instructions'][0]; ?></small>
			<?php endif; ?>


			<?php
			$value = $field_meta['default_value'][0];
			if (isset($post_meta[$post->ID])) {
				$value = $post_meta[$post->ID][0];
			}

			switch ($field_meta['type'][0]) {
				case 'text':
					printf('<input type="text" name="acadp_fields[%d]" class="form-control" placeholder="%s" value="%s"%s/>', $post->ID, esc_attr($field_meta['placeholder'][0]), esc_attr($value), $required_attr);
					break;
				case 'textarea':
					printf('<textarea name="acadp_fields[%d]" class="form-control" rows="%d" placeholder="%s"%s>%s</textarea>', $post->ID, (int)$field_meta['rows'][0], esc_attr($field_meta['placeholder'][0]), $required_attr, esc_textarea($value));
					break;
				case 'select':
					$choices = $field_meta['choices'][0];
					$choices = explode("\n", trim($choices));

					printf('<select name="acadp_fields[%d]" class="form-control"%s>', $post->ID, $required_attr);
					if (!empty($field_meta['allow_null'][0])) {
						printf('<option value="">%s</option>', '- ' . __('Select an Option', 'advanced-classifieds-and-directory-pro') . ' -');
					}
					foreach ($choices as $choice) {
						if (strpos($choice, ':') !== false) {
							$_choice = explode(':', $choice);
							$_choice = array_map('trim', $_choice);

							$_value  = $_choice[0];
							$_label  = $_choice[1];
						} else {
							$_value  = trim($choice);
							$_label  = $_value;
						}

						$_selected = '';
						if (trim($value) == $_value) $_selected = ' selected="selected"';

						printf('<option value="%s"%s>%s</option>', $_value, $_selected, $_label);
					}
					echo '</select>';
					break;
				case 'checkbox':



					$optgroup = false;
					$choices = $field_meta['choices'][0];
					$choices = explode("\n", trim($choices));

					$values = explode("\n", $value);
					$values = array_map('trim', $values);

					printf('<select class="js-example-basic-multiple col-sm-12" name="acadp_fields[%d][]" multiple="multiple" data-s2_placeholder="%s"', $post->ID, $field_meta['instructions'][0]);
					foreach ($choices as $choice) {
						if ($choice == '') continue;

						//var_dump($json_attr);
						if (acadp_display_is_json_params($choice)) {
							//$json_attr = json_decode(htmlspecialchars_decode($choice, ENT_QUOTES));
							$json_attr = acadp_display_checkbox_to_json_parameters($choice);
							if (is_object($json_attr)) {
								foreach ($json_attr as $attr => $val) {
									echo ' ' . $attr . ' = "' . $val . '" ';
								}
							}
						}
					} /**/
			

			echo '>';



			foreach ($choices as $choice) {
				if ($choice == '') continue;
				if (acadp_display_is_json_params($choice)) {
					continue;
				}
				if (strpos($choice, ':') !== false) {
					$_choice = explode(':', $choice);
					$_choice = array_map('trim', $_choice);

					$_value  = $_choice[0];
					$_label  = $_choice[1];
				} else {
					$_value  = trim($choice);
					$_label  = $_value;
				}

				$_attr = '';
				if (in_array($_value, $values)) $_attr .= ' checked="checked"';
				$_attr .= $required_attr;
				//var_dump($_value);
				//var_dump($_label);
				//var_dump($_attr);
				//echo $_value;
				$is_group = acadp_display_checkbox_is_group($_value);
				if ($is_group == 2) { //если в item первые 3 символа <b> значит начало
					printf('<optgroup label="%s">', $_label);
					$optgroup = true;
				} else if ($is_group == 0) {
					printf('<option value="%s">%s</option>', $_value, $_label);
				} else if ($is_group == 1) { //если в item первые 3 символа <e> значит конец групппы
					print('</optgroup>');
					$optgroup = false;
				}
			}
			if ($optgroup) {
				print('</optgroup>');
			} //закрываем группу если цикл кончился 
			echo '</select>';


			break;
			case 'radio': $choices = $field_meta['choices'][0];
			$choices = explode("\n", trim($choices));

			foreach ($choices as $choice) {
				if (strpos($choice, ':') !== false) {
					$_choice = explode(':', $choice);
					$_choice = array_map('trim', $_choice);

					$_value  = $_choice[0];
					$_label  = $_choice[1];
				} else {
					$_value  = trim($choice);
					$_label  = $_value;
				}

				$_attr = '';
				if (trim($value) == $_value) $_attr .= ' checked="checked"';
				$_attr .= $required_attr;

				printf('<div class="radio"><label><input type="radio" name="acadp_fields[%d]" value="%s"%s>%s</label></div>', $post->ID, $_value, $_attr, $_label);
			}
			break;
			case 'url': printf('<input type="text" name="acadp_fields[%d]" class="form-control" placeholder="%s" value="%s"%s/>', $post->ID, esc_attr($field_meta['placeholder'][0]), esc_url($value), $required_attr);
			break;

			case 'numeric': printf(
				'<input type="number" step="%s" min="%s" max="%s"  id="acadp_%s" name="acadp_fields[%d]" class="form-control" placeholder="%s" value="%s"%s/>',
				esc_attr($field_meta['numeric_step'][0]),
				esc_attr($field_meta['numeric_min'][0]),
				esc_attr($field_meta['numeric_max'][0]),
				esc_attr($field_meta['field_name'][0]),
				$post->ID,
				esc_attr($field_meta['placeholder'][0]),
				esc_attr($value),
				$required_attr
			);
			break;
			}
			?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>