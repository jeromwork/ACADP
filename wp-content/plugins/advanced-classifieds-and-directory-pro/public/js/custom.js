jQuery(document).ready(function () {
    //console.log($(".page-body"));
    var conteiner = $(".page-body");
    jQuery.post(ACADP.ajaxurl, { action: 'get_content', }, function (response) {



        conteiner.html(response);


    });
    

    jQuery.post(ACADP.ajaxurl, { action: 'get_prepare_html', }, function (response) {

        var $prepare_forms = $("#prepare_forms");
    var prepare_user_menu = $("#acadp_user_menu");
        var $prepare_html = $(response);


       


        
      //  console.log($prepare_html.filter("#acadp_user_menu_transport"));
        //console.log($(response).filter("#acadp_user_menu_prepare"));
        //Теперь разбрасываем присланные значения по заранее заготовленным точкам html

        $("#acadp_user_menu").html($prepare_html.filter("#acadp_user_menu_transport").children());//вставляем без транспортного дива
        //$("#acadp_user_menu").html($prepare_html.filter("#acadp_user_menu_transport").children());

        $prepare_forms.append($prepare_html.filter("#acadp_call_transport").children());
        $prepare_forms.append($prepare_html.filter("#acadp_form_cargo_modal_tranport").children());
        $prepare_forms.append($prepare_html.filter("#acadp_find_cargo_transport").children());
        $prepare_forms.append($prepare_html.filter("#acadp_form_track_modal_transport").children());
        $prepare_forms.append($prepare_html.filter("#acadp_user_login_form_transport").children());
console.log($prepare_html.filter("#acadp_user_login_form_transport").children());


        $("body").trigger("acadp_prepare_html_complite");

    });




    //должны получить от сервера список удочек с обновленными данными  (количество найденных объевлений)
    //сделать запрос на общее количество найденных объявлений для всех удочек
    //загрузить формы поиска и другие модальные формы которые зависят от компонента а не от шаблона

    function as2() {
        event.preventDefault();

        /*
ПРАВИЛА В ШАБЛОНЕ

необходим один контейнер на одно сортировочное правило класс '.acadp-sort'
Контейнеры с таким классом не должны быть вложенные

Необходимо иметь пункты выбора с классами 'dosort select-orderby  active' либо без active
В этом же пункте выбора должны быть атрибуты data-sort-name="orderby" и data-sort="price-asc"
Какой тег будет содержать указанный выше набор атрибутов неважно



Имя обработчкика ajax задается при инициализации объекта data  
var data = {  action: 'get_content' };





    обходим все элементы определенного класса - acadp-sort - 
    это должен быть объект контейнер в котором может быть только один набор сортировки (к примеру по цене)
    Потом ищем первый элемент с классом active - это будет элемент с текущим выбором
    Поиск всех таких элементов ведется без учета элемента на котором был клик
    
    
    навешивается обработчик клика на каждый элемент внутри тега класса .page-body
    у которого есть класс .dosort
    
    При клике на данный элемент смотрим есть ли у него класс .active
    Если такого класса нет значит запускаем все остальные действия
    
    находим все элементы класса acadp-sort 
    Дальше в цикле обходим каждый элемент
    
    
    
    
            */


        //console.log(conteiner);
        var sort_elements = $('.acadp-sort');
        if (!$(this).hasClass("active")) {
            var data = { action: 'get_content' };
            data[$(this).data("sort-name")] = $(this).data("sort");
            for (var i = 0; i < sort_elements.length; i++) {
                if ($(sort_elements[i])[0] != $(this).closest('.acadp-sort')[0]) {
                    var sa = $(sort_elements[i]).find(".dosort.active");
                    data[sa.data("sort-name")] = sa.data("sort");
                }
            }





            conteiner.hide(400);
            jQuery.post(ACADP.ajaxurl, data, function (response) {


                conteiner.html(response);
                conteiner.show(400);
                //alert('Получено с сервера: ' + response);
            });


        }


        return;
    };


    function a4() {
        event.preventDefault();

        //conteiner
        //var select_view = $(this).data('sort')
        //console.log();  
        // alert('lasjdfljasdl');
        var curitem = $(this);
        if (!curitem.hasClass("active")) {
            //если нет класса active значит мы должны найти все элементы в текущем наборе и 
            //удалить если есть класс active у других элементов
            //а текущему добавить этот класс
            var items = curitem.closest('.acadp-sort').find(".dosort");
            for (var i = 0; i < items.length; i++) {

                $(items[i]).removeClass('active');
            }
            curitem.addClass('active');
            //теперь надо поменять вид отображения


            var acadp_conteiner = $(".acadp-body");
            //console.log(acadp_conteiner);
            for (var c = 0; c < acadp_conteiner.length; c++) {

                // $(acadp_conteiner[c]).removeClass('active');
                $(acadp_conteiner[c]).hide();
                if ($(acadp_conteiner[c]).hasClass('acadp-view-' + curitem.data('sort'))) {
                    // $(acadp_conteiner[c]).addClass('active');
                    $(acadp_conteiner[c]).show();
                }




            }
            // acadp_conteiner.find('acadp-view-' + curitem.data('sort'));


            //console.log();
        }



    };



    //триггер который сработает при загрузке форм с сервера








    //делаем привязку к событию через добавление обработчика к динамическим данным загруженным позже
    conteiner.on("click", ".acadp-sort-item", as2);
    conteiner.on("click", ".acadp-sort-item-js", a4);





    $("#acadp_call_href").click(function () {
        console.log('acadp_call_href');
        event.preventDefault();
        $('#acadp_call').modal('toggle')

        //alert( "Handler for .click() called." );
    });
    $(".acadp_track_add").click(function () {
        event.preventDefault();
        $('#acadp_track').modal('toggle')

        //alert( "Handler for .click() called." );
    });


    $(".acadp_add_cargo").click(function () {
        event.preventDefault();

        $('#acadp_form_cargo_modal').modal('toggle')


    });
    $(".acadp_add_track").click(function () {
        event.preventDefault();

        $('#acadp_form_track_modal').modal('toggle')


    });


    $("#searchcargomodal").click(function () {
        event.preventDefault();
        $('#acadp_find_cargo').modal('toggle')

        //alert( "Handler for .click() called." );
    });





    function acadp_form_cargo_save() {

        var data_form = {};

        $.each($('#acadp_form_cargo').serializeArray(), function () {
            if (this.value) { data_form[this.name] = this.value; }
        });
        data_form['action'] = 'acadp_crud';
        console.log(data_form);



        $.post(ACADP.ajaxurl, data_form, function (response) {

            $(".alert").alert()
            return;
            conteiner.html(response);


        });
    }




    $("body").on("acadp_prepare_html_complite", function () {
        //alert('fwesdf');
        $("#acadp_form_cargo").on("click", ".save-form", acadp_form_cargo_save);
    });



});