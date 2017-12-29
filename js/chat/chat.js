function chat_change(auth_id, friend_id){
    $('#messagebox').val(' ');
    $('#new_message_area').html('');
    $('#user2').val(friend_id);

    var timestamp = $('#message_time').val();

    var token = $('#hidden_csrf_token').val();
    $.get('ajax/chat/ajax_chat.php', {
        task: 'get_chat_friend',
        auth_id: auth_id,
        friend_id: friend_id,
        token: token,
        timestamp: timestamp
    }).success(function(data){
        $('#message_area').html(data);
    }).error(function(){
        //alert('error');
    });
}

function input_message(auth_id){
    var friend_id = $('#user2').val();
    var message = $('#messagebox').val();

    var token = $('#hidden_csrf_token').val();

    var timestamp = $('#message_time').val();


    $.post('ajax/chat/ajax_chat.php', {
        task: 'input_message',
        auth_id: auth_id,
        friend_id: friend_id,
        message: message,
        token: token,
        timestamp: timestamp
    }).success(function(data){
        $('#new_message_area').prepend(data);
        $('#messagebox').val('');
    }).error(function(){
        //alert('error');
    });
}

$(function(){
    $("#chat_friend_search_input").keypress(function (e) {
        if (e.keyCode == 13) {
            var auth_id = $('#chat_friend_search_auth_id').val();
            var search = $('#chat_friend_search_input').val();

            var token = $('#hidden_csrf_token').val();

            if(search !== '' && auth_id !== ''){
                $.get('ajax/chat/ajax_chat.php', {
                    task: 'chat_friend_search',
                    auth_id: auth_id,
                    search: search,
                    token: token
                }).success(function(data){
                    $('#chat_avail').html(data);
                }).error(function(){
                   //alert('error');
                });
            }
        }
    });
});

function get_messages(){
    var auth_id = $('#chat_auth').val();
    var friend_id = $('#user2').val();

    var token = $('#hidden_csrf_token').val();
    var timestamp = $('#message_time').val();

    if(auth_id !== '' && friend_id !== ''){
        $.get('ajax/chat/ajax_chat.php', {
            task: 'get_chat_friend',
            auth_id: auth_id,
            friend_id: friend_id,
            token: token,
            timestamp: timestamp
        }).success(function(data){
            $('#message_area').html(data);
        }).error(function(){
            //alert('error');
        });
    }
}

function get_messages_new(){
    var auth_id = $('#chat_auth').val();
    var friend_id = $('#user2').val();

    var token = $('#hidden_csrf_token').val();
    var timestamp = $('#message_time').val();

    if(auth_id !== '' && friend_id !== ''){
        $.get('ajax/chat/ajax_chat.php', {
            task: 'get_chat_friend',
            auth_id: auth_id,
            friend_id: friend_id,
            token: token,
            timestamp: timestamp
        }).success(function(data){
            $('#new_message_area').html(data);
        }).error(function(){
            //alert('error');
        });
    }
}
window.setInterval("get_messages_new()", 5000);
