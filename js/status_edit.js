$(document).ready(function(){
    add_status_edit_function();
    $('.status_edit_block').hide();
});

function add_status_edit_function(){
    $('.status_edit').each(function(){
        console.log('Edit added to each status button.');
        var btn = this;
        $(btn).click(function(){
                add_cancel_edit_function(btn.id);
                status_edit_show(btn.id);
        })
    })
}

function status_edit_show(_status_id){
    console.log(_status_id + 'edit clicked');
    var edit_id = _status_id.replace('status_edit', '');
    var edit_block = '#status_edit_show_'+edit_id;
    var status_block = '#hide_'+edit_id;

    $(status_block).addClass('hidden');
    $(edit_block).removeClass('hidden');
}

function add_cancel_edit_function(id){
    var edit_id = id.replace('status_edit', '');
    var edit_block = '#status_edit_show_'+edit_id;
    var status_block = '#hide_'+edit_id;
    var cancel = '#cancel'+edit_id;

    $(cancel).click(function(){
        $(status_block).removeClass('hidden');
        $(edit_block).addClass('hidden');
    });
}