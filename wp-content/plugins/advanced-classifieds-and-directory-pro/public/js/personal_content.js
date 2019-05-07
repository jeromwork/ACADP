"use strict";
jQuery(document).ready(function(){

   // $(".prepare_forms").on('acadp_prepare_html_complite', function () {  
    $("body").on("acadp_prepare_html_complite", function(){

        

        //нужно вывести список грузов пользователя
        //для этого отправляем пост запрос и заменяем текущие данные на страницы присланными данными от сервера
        









        $(".personal_cargo").on("click", function(){

console.log('тест за тестом');

            jQuery.post(ACADP.ajaxurl, { action: 'get_content', }, function (response) {



                conteiner.html(response);
        
        
            });

            console.log('personal_cargo');
        });














    });
	

});