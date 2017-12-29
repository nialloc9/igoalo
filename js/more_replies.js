$(document).ready(function(){
    add_reply_more_function();
});

function add_reply_more_function(){
    $('.reply_more').each(function(){
        var more_id = this.id;
        var j_more_id = '#'+more_id;
        var status_id = more_id.replace('more_', '');


        $(j_more_id).click(function(){
            var count = parseInt($('#reply_count').val());
            var current_count = parseInt($('#current_reply_count').val());
            var new_count = current_count +5;
            $('#current_reply_count').val(new_count);
            if(current_count >= count){
                $(j_more_id).hide();
            }else{
                more_click(status_id, current_count);
            }
        });
    });
}

function more_click(id, current_count){
    var token = $('#hidden_csrf_token').val();
    $.get('ajax/ajax_resources/ajax_more_replies_controller.php', {
        task: 'get_replies',
        status_id: id,
        start: current_count,
        token: token

    }).error(function(){
    }).success(function(data){
        var reply_area = '#reply_area'+id;
        $(reply_area).append(data);
        add_status_edit_function();
        add_delete_function();
    });
    add_reply_more_function();
}