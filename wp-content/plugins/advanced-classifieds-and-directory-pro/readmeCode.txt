Что бы вывести дополнительные поля на странице фронтенда, есть такая последовательность



1. (public\partials\user\acadp-public-edit-listing-display.php)  
    <?php do_action( 'wp_ajax_acadp_public_custom_fields_listings', $post_id, $category ); ?>
2. (public\partials\user\acadp-public-edit-listing-display.php)
    $this->loader->add_action( 'wp_ajax_acadp_public_custom_fields_listings', $plugin_public_user, 'ajax_callback_custom_fields', 10, 2 );
3. (public\class-acadp-public-user.php)
    public function ajax_callback_custom_fields( $post_id = 0, $term_id = 0 ) 
4. (public\partials\user\acadp-public-custom-fields-display.php)

Еще надо записать последовательность добавления новых типов полей в админке

Отвечает за отображение полей в админке суб шаблон
acadp-admin-field-details-display.php

В нем вызывается 
$types = acadp_get_custom_field_types(); 
из файла 
wp-content\plugins\advanced-classifieds-and-directory-pro\includes\functions-acadp-general.php
В этой функции есть массив в котором можно как раз внести необходимый тип поля


 в файле wp-content\plugins\advanced-classifieds-and-directory-pro\admin\class-acadp-admin-fields.php
 Нужно продумать хук который будет добавлять сохранение сторонних полей
 в другом файле
 Что бы можно было расширять типы полей не ломая и не изменяя исходного кода




 Регистрация экшенов и фильтров в используемых класса происходит централизованно.
 Связки хук - метод записаны в классе class ACADP в файле 
 wp-content\plugins\advanced-classifieds-and-directory-pro\includes\class-acadp.php



 Далее указанные связки прогоняются через класс class ACADP_Loader где окончательно привязываются к хукам в методе RUN

Так что все экшены желательно регистрировать в классе АКДП


Охх
что бы добавить новый вид поля ( к примеру есть поля Address, hidden, numeric)
а)Нужно добавить ключ поля в массив в файл functions-acadp-general.php, в функции  acadp_get_custom_field_types()
//б) Добавить обработчик сохранения в БД в классе ACADP_Admin_Fields_Custom метод function hand_custom_filds_admin()
в) добавить разметку для админа в файле acadp-admin-field-details-display.php
г) добавить обработку этого типа в файл acadp-public-custom-fields-display.php






















Как работает пост загрузка форм
форма добавления груза
(как и другие формы, присылаются одним пост запросом)
Сначала присылается пустая форма, без учета редактирования готовых грузов

