
var $ = jQuery.noConflict();
$(document).ready(function(){
 ymaps.ready(init);
});


function init() {
    // Стоимость за километр.
    var DELIVERY_TARIFF = 20,
    // Минимальная стоимость.
        MINIMUM_COST = 500;
var long = 55.7522200;
var lat = 37.6155600;
        if($('#acadp_blong').val()!='' && $('#acadp_elong').val()!=''){
            long = (Number($('#acadp_blong').val())+Number($('#acadp_elong').val()))/2;
            }
        if($('#acadp_blat').val()!='' && $('#acadp_elat').val()!=''){
            lat = (Number($('#acadp_blong').val())+Number($('#acadp_elong').val()))/2;
            }

        
        myMap = new ymaps.Map('map', {
            center: [long, lat],
            zoom: 5,
            controls: []
        });
    // Создадим панель маршрутизации.
        routePanelControl = new ymaps.control.RoutePanel({
            options: {
                // Добавим заголовок панели.
                showHeader: true,
                title: 'Расчёт доставки'
            }
        });
        zoomControl = new ymaps.control.ZoomControl({
            options: {
                size: 'small',
                float: 'none',
                position: {
                    bottom: 145,
                    right: 10
                }
            }
        });
    // Пользователь сможет построить только автомобильный маршрут.
    /*routePanelControl.routePanel.options.set({
         fromEnabled: false,
        from: "Москва",
        types: {auto: true}
    });*/

var from_way = '', to_way = '';
    // Если вы хотите задать неизменяемую точку "откуда", раскомментируйте код ниже.
if($('#acadp_bdescription').val()!=''){//если уже есть значения долготы и широты, значит сразу строим путь
    from_way = $('#acadp_bdescription').val();
    }
if($('#acadp_edescription').val()!=''){//если уже есть значения долготы и широты, значит сразу строим путь
    to_way = $('#acadp_edescription').val();
    }
    
    routePanelControl.routePanel.state.set({
       
        from: from_way,
        to: to_way,
        type: "auto"
     });/*
    routePanelControl.state.set({
        fromEnabled: false,
        from: "Москва",
        to: "Санкт-Петербург",
        type: "auto"
    });*/
    myMap.controls.add(routePanelControl).add(zoomControl);

    // Получим ссылку на маршрут.
    routePanelControl.routePanel.getRouteAsync().then(function (route) {

        // Зададим максимально допустимое число маршрутов, возвращаемых мультимаршрутизатором.
        route.model.setParams({results: 1}, true);

        // Повесим обработчик на событие построения маршрута.
        route.model.events.add('requestsuccess', function () {

            var activeRoute = route.getActiveRoute();
            if (activeRoute) {

                var waypoints = route.properties.get("waypoints");
                var country = waypoints[0].geocoderMetaData.Address.Components[0].name;
                var land = waypoints[0].geocoderMetaData.Address.Components[2].name;
               var description = waypoints[0].description;
               var address = waypoints[0].address;
               // var area = waypoints[0].geocoderMetaData.Address.Components[3].name;
                //var street = waypoints[0].geocoderMetaData.Address.Components[4].name;
                //var house = waypoints[0].geocoderMetaData.Address.Components[5].name;



                $('#acadp_bdescription').val(waypoints[0].address);
                for(var i = 0; i < waypoints[0].geocoderMetaData.Address.Components.length; i++){
                    if(waypoints[0].geocoderMetaData.Address.Components[i].kind == 'street'){        $('#acadp_bdescription').val(waypoints[0].description);    }
                    }

                $('#acadp_blat').val(waypoints[0].coordinates[0]);
                $('#acadp_blong').val(waypoints[0].coordinates[1]);
                $('#acadp_bcountry').val(waypoints[0].geocoderMetaData.Address.Components[0].name);
                $('#acadp_bland').val(waypoints[0].geocoderMetaData.Address.Components[2].name);
                $('#acadp_baddress').val(waypoints[0].address);


                $('#acadp_edescription').val(waypoints[1].address);
                for(var i = 0; i < waypoints[1].geocoderMetaData.Address.Components.length; i++){
                    if(waypoints[1].geocoderMetaData.Address.Components[i].kind == 'street'){        $('#acadp_edescription').val(waypoints[1].description);    }
                    }
                $('#acadp_elat').val(waypoints[1].coordinates[0]);
                $('#acadp_elong').val(waypoints[1].coordinates[1]);
                $('#acadp_ecountry').val(waypoints[1].geocoderMetaData.Address.Components[0].name);
                $('#acadp_eland').val(waypoints[1].geocoderMetaData.Address.Components[2].name);
                $('#acadp_eaddress').val(waypoints[1].address);
                $('#acadp_road_length').val(route.getActiveRoute().properties.get("distance").value);



                var length = route.getActiveRoute().properties.get("distance"),
                // Вычислим стоимость доставки.
                    price = calculate(Math.round(length.value / 1000)),
                // Создадим макет содержимого балуна маршрута.
                    balloonContentLayout = ymaps.templateLayoutFactory.createClass(
                        '<span>Расстояние: ' + length.text + '.</span><br/>'
                        //'<span style="font-weight: bold; font-style: italic">Стоимость доставки: ' + price + ' р.</span>'
                        );
                // Зададим этот макет для содержимого балуна.
                route.options.set('routeBalloonContentLayout', balloonContentLayout);
                // Откроем балун.
                activeRoute.balloon.open();
            }
        });

    });
    // Функция, вычисляющая стоимость доставки.
    function calculate(routeLength) {
        return Math.max(routeLength * DELIVERY_TARIFF, MINIMUM_COST);
    }
}