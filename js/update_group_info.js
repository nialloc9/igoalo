function upload_image(input_id){
    $(input_id).click();
    $(input_id).change(function(){
        if($(input_id).val() !== ''){
            var pic_name = input_id + '_name';
            $(pic_name).text($(input_id).val());
        }
    });
}

function group_update_type_dropdown(){
    console.log('Group update type more create functionality added.');
    $('#group_update_type').change(function(){
        if($('#group_update_type').val() == 'More'){
            $('#g_update_type_more').removeClass('hidden');
        }else{
            $('#g_update_type_more').addClass('hidden');
        }
    })
}

//Group update state and country
function update_state_and_country() {
    populateCountries("group_update_country", "group_update_state"); // first parameter is id of country drop-down and second parameter is id of state drop-down=
    var temp=$('#group_update_country_edit_hidden').val();
    var state_temp = $('#group_state_edit_hidden').val();
    $("#group_update_country").val(temp);
    populateStates('group_update_country','group_update_state');
    $("#group_update_state").val(state_temp);
}

function add_char_remain_single(id, max, char_area_id){
    var jquery_id = '#'+id;
    var char_area_jquery_id = '#'+char_area_id;

    var current_count = $(jquery_id).val().length;

    var remaining = max - current_count;

    $(char_area_jquery_id).text(remaining);
}

//Char remaining functions
$('#group_update_name').change(function(){
    add_char_remain_single('group_update_name', 40, 'group_info_update_char');
});

$('#group_update_name').keyup(function(){
    add_char_remain_single('group_update_name', 40, 'group_info_update_char');
});

$('#group_update_type_more').change(function(){
    add_char_remain_single('group_update_type_more', 20, 'group_info_update_char');
});

$('#group_update_type_more').keyup(function(){
    add_char_remain_single('group_update_type_more', 20, 'group_info_update_char');
});

$('#group_update_about').change(function(){
    add_char_remain_single('group_update_about', 250, 'group_info_update_char');
});

$('#group_update_about').keyup(function(){
    add_char_remain_single('group_update_about', 250, 'group_info_update_char');
});



$(document).ready(function(){
    //Update type more
    group_update_type_dropdown();

    update_state_and_country();
});

