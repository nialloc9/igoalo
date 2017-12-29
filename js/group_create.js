function group_create_type_dropdown(){
    console.log('Group type more create functionality added.');
    $('#group_create_type').change(function(){
        if($('#group_create_type').val() == 'More'){
            $('#g_type_more').removeClass('hidden');
        }else{
            $('#g_type_more').addClass('hidden');
        }
    })
}

function create_country_and_state(){
    populateCountries("group_create_country", "group_create_state"); // first parameter is id of country drop-down and second parameter is id of state drop-down=
    var temp=$('#group_create_country_hidden').val();
    $("#country").val(temp);
    populateStates('group_create_country','group_create_state');
}

$(document).ready(function(){
    //Dropdown type
    group_create_type_dropdown();

    //Group name char remaining
    $('#group_create_name').change(function(){
        add_char_remain_single('group_create_name', 40, 'group_name_char');
    });

    $('#group_create_name').keyup(function(){
        add_char_remain_single('group_create_name', 40, 'group_name_char');
    });

    //Group group_create_city_town_village char remaining
    $('#group_create_city_town_village').change(function(){
        add_char_remain_single('group_create_city_town_village', 255, 'group_city_town_village_char');
    });

    $('#group_create_city_town_village').keyup(function(){
        add_char_remain_single('group_create_city_town_village', 255, 'group_city_town_village_char');
    });

    //Group create state and country
    create_country_and_state();

});
