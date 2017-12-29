$(document).ready(function(){
    setInterval(function(){
        check_user_notification();
        check_chat_notification();
    },5000);
});

function check_user_notification(){
    var auth = $('#auth_id').val();
    var token = $('#hidden_csrf_token').val();
    $.get('ajax/notifications_controller.php', {
        task: 'check_user_notification',
        auth_id: auth,
        token: token
    }).success(function(data){
        if(data == 1){ //Checks if the ajax call returned true
            if(!$('#user_not_icon').hasClass('#user_not_icon')){
                $('#user_not_icon').addClass('user_has_notifcation');
                if(!$('#header_icon_bar').hasClass('header_icon_bar_red') && !$('#header_icon_bar_button').hasClass('header_icon_bar_red_border')){
                    $('#header_icon_bar').addClass('header_icon_bar_red');
                    $('#header_icon_bar2').addClass('header_icon_bar_red');
                    $('#header_icon_bar3').addClass('header_icon_bar_red');
                    $('#header_icon_bar_button').addClass('header_icon_bar_red_border');
                    beep();
                }
            }
        }else{
            if($('#user_not_icon').hasClass('#user_not_icon')){
                $('#user_not_icon').removeClass('user_has_notifcation');
                if($('#header_icon_bar').hasClass('header_icon_bar_red') && $('#header_icon_bar_button').hasClass('header_icon_bar_red_border')){
                    $('#header_icon_bar').removeClass('header_icon_bar_red');
                    $('#header_icon_bar2').removeClass('header_icon_bar_red');
                    $('#header_icon_bar3').removeClass('header_icon_bar_red');
                    $('#header_icon_bar_button').removeClass('header_icon_bar_red_border');
                }
            }
        }
    }).error(function(){
       //Error message here
       //console.log('Error occured when getting user notifications in check_user_notification.js');
    });
}

function check_chat_notification(){
    var auth = $('#auth_id').val();
    var token = $('#hidden_csrf_token').val();
    $.get('ajax/notifications_controller.php', {
        task: 'check_chat_notification',
        auth_id: auth,
        token: token
    }).success(function(data){
        if(data == 1){ //Checks if the ajax call returned true
            if(!$('#chat_icon').hasClass('user_has_notifcation')){
                $('#chat_icon').addClass('user_has_notifcation');
                if(!$('#header_icon_bar').hasClass('header_icon_bar_red') && !$('#header_icon_bar_button').hasClass('header_icon_bar_red_border')){
                    $('#header_icon_bar').addClass('header_icon_bar_red');
                    $('#header_icon_bar2').addClass('header_icon_bar_red');
                    $('#header_icon_bar3').addClass('header_icon_bar_red');
                    $('#header_icon_bar_button').addClass('header_icon_bar_red_border');
                }
                beep();
            }
        }else{
            if($('#chat_icon').hasClass('user_has_notifcation')){
                $('#chat_icon').removeClass('user_has_notifcation');
                if($('#header_icon_bar').hasClass('header_icon_bar_red') && $('#header_icon_bar_button').hasClass('header_icon_bar_red_border')){
                    $('#header_icon_bar').removeClass('header_icon_bar_red');
                    $('#header_icon_bar2').removeClass('header_icon_bar_red');
                    $('#header_icon_bar3').removeClass('header_icon_bar_red');
                    $('#header_icon_bar_button').removeClass('header_icon_bar_red_border');
                }
            }
        }
    }).error(function(){
        //Error message here
        //console.log('Error occured when getting chat notifications in check_user_notification.js');
    });
}

function beep() {
    var snd = new Audio("sounds/notification_sound.ogg");
    snd.play();
}
