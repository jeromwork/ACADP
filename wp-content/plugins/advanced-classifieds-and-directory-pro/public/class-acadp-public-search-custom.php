<?php

/**
 * Здесь идет добавление условий для запроса в БД
 * Проверяются дополнительные поля
 * Если  от клиента пришел id доп поля
 * Включаем это поле в запрос к БД
 * 
 * 
 * 
 * 
 */
?>
<?

class ACADP_Public_Search_Custom {

//$args = array();
//add_filter( 'acadp-custom-filds-search', 'add_text_to_content');
public function hand_custom_fields_search($args){
	$cf =  $_GET['cf'];

	foreach( $cf as $key => $values ) {
			$key = trim($key);
		if( is_array( $values ) ) {
		
			if( count( $values ) > 1 ) {
			
				$sub_meta_queries = array();
				
				foreach( $values as $value ) {
					$sub_meta_queries[] = array(
						'key'		=> $key,
						'value'		=> sanitize_text_field( $value ),
						'compare'	=> 'LIKE'
					);
				}
				
				$meta_queries[] = array_merge( array( 'relation' => 'OR' ), $sub_meta_queries );
			
			} else {
			
				$meta_queries[] = array(
					'key'		=> $key,
					'value'		=> sanitize_text_field( $values[0] ),
					'compare'	=> 'LIKE'
				);
			
			}
				
		} else {


			//$d = get_post_meta( 49);
			$meta_key = get_post_meta( $key );					

			if($meta_key['type'][0] == 'search_number_from'){$operator = '>=';
			
				$meta_queries[] = array(
					'key'		=> $meta_key['cell_search'][0],
					'type'    => 'DECIMAL',
					'value'		=> (float) $values ,
					'compare'	=> $operator
				);
			
			
			
			}
			
			else if($meta_key['type'][0] == 'search_number_to'){$operator = '<=';
			
				$meta_queries[] = array(
					'key'		=> $meta_key['cell_search'][0],
					'type'    => 'DECIMAL',
					'value'		=> (float) $values ,
					'compare'	=> $operator
				);
			
			
			
			}
			//else if ($meta_key['type'] == 'search_number_to')

			//$operator = ( 'text' == $meta_key || 'textarea' == $meta_key || 'url' == $meta_key ) ? 'LIKE' : '=';
			
			
		}
		
	}
	$count_meta_queries = count( $meta_queries );
		if( $count_meta_queries ) {
			$args['meta_query'] = ( $count_meta_queries > 1 ) ? array_merge( array( 'relation' => 'AND' ), $meta_queries ) : $meta_queries;
		}//$out = $args . "<p>При копировании статьи, ставьте обратную ссылку, пожалуйста!</p>";
	return $args;
}
}