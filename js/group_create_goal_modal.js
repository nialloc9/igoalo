function goal_about_countdown() {
    console.log('1');
    // 150 is the max message length
    var remaining = 150 - $('#group_goal_about').val().length;
    $('#group_goal_about_char').text(remaining);
}

function goal_per_countdown(){
    var per = $('#group_goal_per_completed').val();

    console.log('Group: '+per);
    $('#group_goal_per_value').text(per);
}

jQuery(document).ready(function() {
    $('#group_goal_type').change(function(){
        if($('#group_goal_type').val() == 'More'){
            $('#group_goal_type_more_input').removeClass('hidden');
        }else{
            $('#group_goal_type_more_input').addClass('hidden');
        }
    });

    //Character counter functionality for goal name.
    $('#group_goal_name').change(function(){
        add_char_remain_single('group_goal_name', 20, 'group_goal_name_char');
    });
    $('#group_goal_name').keyup(function(){
        add_char_remain_single('group_goal_name', 20, 'group_goal_name_char');
    });

    //Character counter functionality for goal about.
    goal_about_countdown();
    $('#group_goal_about').change(goal_about_countdown);
    $('#group_goal_about').keyup(goal_about_countdown);


    //Goal percentage completed countdown. When you slide the slider it will change the number below.
    goal_per_countdown();
    
    $('#group_goal_per_completed').change(goal_per_countdown);

    //Show more text box if user clicks more when creating a new goal.
    new_goal_type_more_hide_show();

    //Goal 10% char remaining
    $('#group_goal_10').change(function(){
        add_char_remain_single('group_goal_10', 20, 'group_goal_update_per_char');
    });
    $('#group_goal_10').keyup(function(){
        add_char_remain_single('group_goal_10', 20, 'group_goal_update_per_char');
    });

    //Goal 20% char remaining
    $('#group_goal_20').change(function(){
        add_char_remain_single('group_goal_20', 20, 'group_goal_update_per_char');
    });
    $('#group_goal_20').keyup(function(){
        add_char_remain_single('group_goal_20', 20, 'group_goal_update_per_char');
    });

    //Goal 30% char remaining
    $('#group_goal_30').change(function(){
        add_char_remain_single('group_goal_30', 20, 'group_goal_update_per_char');
    });
    $('#group_goal_30').keyup(function(){
        add_char_remain_single('group_goal_30', 20, 'group_goal_update_per_char');
    });

    //Goal 40% char remaining
    $('#group_goal_40').change(function(){
        add_char_remain_single('group_goal_40', 20, 'group_goal_update_per_char');
    });
    $('#group_goal_40').keyup(function(){
        add_char_remain_single('group_goal_40', 20, 'group_goal_update_per_char');
    });

    //Goal 50% char remaining
    $('#group_goal_50').change(function(){
        add_char_remain_single('group_goal_50', 20, 'group_goal_update_per_char');
    });
    $('#group_goal_50').keyup(function(){
        add_char_remain_single('group_goal_50', 20, 'group_goal_update_per_char');
    });

    //Goal 60% char remaining
    $('#group_goal_60').change(function(){
        add_char_remain_single('group_goal_60', 20, 'group_goal_update_per_char');
    });
    $('#group_goal_60').keyup(function(){
        add_char_remain_single('group_goal_60', 20, 'group_goal_update_per_char');
    });

    //Goal 70% char remaining
    $('#group_goal_70').change(function(){
        add_char_remain_single('group_goal_70', 20, 'group_goal_update_per_char');
    });
    $('#group_goal_70').keyup(function(){
        add_char_remain_single('group_goal_70', 20, 'group_goal_update_per_char');
    });

    //Goal 80% char remaining
    $('#group_goal_80').change(function(){
        add_char_remain_single('group_goal_80', 20, 'group_goal_update_per_char');
    });
    $('#group_goal_80').keyup(function(){
        add_char_remain_single('group_goal_80', 20, 'group_goal_update_per_char');
    });

    //Goal 90% char remaining
    $('#group_goal_90').change(function(){
        add_char_remain_single('group_goal_90', 20, 'group_goal_update_per_char');
    });
    $('#group_goal_90').keyup(function(){
        add_char_remain_single('group_goal_90', 20, 'group_goal_update_per_char');
    });

    //Goal 100% char remaining
    $('#group_goal_100').change(function(){
        add_char_remain_single('group_goal_100', 20, 'group_goal_update_per_char');
    });
    $('#group_goal_100').keyup(function(){
        add_char_remain_single('group_goal_100', 20, 'group_goal_update_per_char');
    });
});