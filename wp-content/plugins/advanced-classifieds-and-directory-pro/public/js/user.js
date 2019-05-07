"use strict";


$(document).ready(function () {


    $("body").on("acadp_prepare_html_complite", function () {
        //alert('fwesdf');
        //$("#acadp_form_cargo").on("click", ".save-form", acadp_form_cargo_save);


        /*chat box scroll
        var a = $(window).height() - 80;
        
        if ($(".main-friend-list").length > 0) {
            $(".main-friend-list").slimScroll({
                height: a,
                allowPageScroll: false,
                wheelStep: 5,
                color: '#1b8bf9'
            });

        }
*/

        // search
        $("#search-friends").on("keyup", function () {
            var g = $(this).val().toLowerCase();
            $(".userlist-box .media-body .chat-header").each(function () {
                var s = $(this).text().toLowerCase();
                $(this).closest('.userlist-box')[s.indexOf(g) !== -1 ? 'show' : 'hide']();
            });
        });




        // open chat box
        $('.displayChatbox').on('click', function () {
            var my_val = $('.pcoded').attr('vertical-placement');
            if (my_val == 'right') {
                var options = {
                    direction: 'left'
                };
            } else {
                var options = {
                    direction: 'right'
                };
            }
            $('.showChat').toggle('slide', options, 500);
        });


        //open friend chat
        $('.userlist-box').on('click', function () {
            var my_val = $('.pcoded').attr('vertical-placement');
            if (my_val == 'right') {
                var options = {
                    direction: 'left'
                };
            } else {
                var options = {
                    direction: 'right'
                };
            }
            $('.showChat_inner').toggle('slide', options, 500);
        });
        //back to main chatbar
        $('.back_chatBox').on('click', function () {
            var my_val = $('.pcoded').attr('vertical-placement');
            if (my_val == 'right') {
                var options = {
                    direction: 'left'
                };
            } else {
                var options = {
                    direction: 'right'
                };
            }
            $('.showChat_inner').toggle('slide', options, 500);
            $('.showChat').css('display', 'block');
        });
    
        $('.acadp_login_register').on('click', function () {
            console.log( $('#acadp_user_login_form'));
            event.preventDefault();
            $('#acadp_user_login_form').modal('toggle')
    
        });
//console.log( $('#acadp_register_form #acadp_email'));
        $('#acadp_register_form #acadp_email').on('change', function () {
            
            event.preventDefault();
            $('#acadp_register_form #acadp_username').val($('#acadp_register_form #acadp_email').val());
            //$('#acadp_user_login_form').modal('toggle')
    
        });
    
    
    
    
    
    
    
    
    
    
    });


});