$(document).ready(function(){
    add_delete_function();
});

function add_delete_function(){
    console.log('add delete function added.');
    $('.status_delete').each(function(){
        console.log('delete added to each status button.');
        var btn = this;
        $(btn).click(function(){
            console.log('clicked.' + btn.id);
            if(confirm('Are you sure you want to delete this?')){
                status_delete(btn.id);
            }
        })
    })
}

function status_delete(_status_id){
    var token = $('#hidden_csrf_token').val();
    $.post('ajax/status_delete.php', {
        task: 'status_delete',
        status_id: _status_id,
        token: token

    }).success(function(data){
        $('#hide_' + _status_id).hide();
        console.log(data);
       $('#_' + _status_id).detach();
    });
}