function add_char_remain_single(id, max, char_area_id){
    var jquery_id = '#'+id;
    var char_area_jquery_id = '#'+char_area_id;

    var current_count = $(jquery_id).val().length;

    var remaining = max - current_count;

    $(char_area_jquery_id).text(remaining);
}

function add_char_remain(class_name, replace, max, char_area_id){
    console.log('counter functionality added.');
    $('.'+class_name).each(function(){

        console.log('Counter functionality added');

        var goal = this;

        var goal_update_id = this.id;

        var goal_id = goal_update_id.replace(replace, '');

        var goal_about_textarea_jquery_id = '#'+goal_update_id;

        var goal_about_char_jquery_id = '#'+char_area_id+goal_id;

        var current_count = $(goal_about_textarea_jquery_id).val().length;

        var remaining = max - current_count;

        console.log('goal_input_jquery_id: '+goal_about_textarea_jquery_id);

        console.log('goal_char_jquery_id: '+goal_about_char_jquery_id);

        $(goal_about_char_jquery_id).text(remaining);
    });
}

