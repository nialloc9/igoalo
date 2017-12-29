function goal_type_update(){
    $('.goal_update_type').each(function(){
        console.log('goal update type functionality added to each dropdown');

        var goal = this;

        var goal_update_id = this.id;

        var goal_id = goal_update_id.replace('goal_update_type', '');

        var goal_type_dropdown_jquery_id = '#'+goal_update_id;

        var goal_type_more_input_jquery_id = '#goal_update_more_type'+goal_id;

        console.log('goal_type_dropdown_jquery_id: '+goal_type_dropdown_jquery_id);

        console.log('goal_type_more_input_jquery_id: '+goal_type_more_input_jquery_id);

        $(goal_type_dropdown_jquery_id).change(function(){
            if($(goal_type_dropdown_jquery_id).val() !== 'More'){
                console.log($(goal_type_dropdown_jquery_id).val());
                $(goal_type_more_input_jquery_id).hide();
            }else{
                console.log($(goal_type_dropdown_jquery_id).val());
                $(goal_type_more_input_jquery_id).show();
            }
        });
    });
}

function goal_per_slider_update(){
    $('.goal_update_per_completed').each(function(){

        var goal_slider = this;

        var goal_slider_update_id = this.id;

        var goal_slider_id = goal_slider_update_id.replace('goal_update_per_completed', '');

        var goal_slider_jquery_id = '#'+goal_slider_update_id;

        var goal_slider_number = '#goal_update_per_value'+goal_slider_id;

        console.log('goal_type_dropdown_jquery_id: '+goal_slider_jquery_id);

        console.log('goal_type_more_input_jquery_id: '+ goal_slider_number);

        $(goal_slider_jquery_id).change(function(){
            if($(goal_slider_jquery_id).val() !== 'More'){
                console.log($(goal_slider_jquery_id).val());
                $(goal_slider_number).text($(goal_slider_jquery_id).val());
            }else{
                console.log($(goal_slider_jquery_id).val());
                $(goal_slider_number).show($(goal_slider_jquery_id).val());
            }
        });
    });
}

$(document).ready(function(){
    goal_type_update();

    goal_per_slider_update();

    //Update goal about char remaining
    $('.goal_update_about').change(function(){
        add_char_remain('goal_update_about', 'goal_update_about', 150, 'goal_update_about_char');
    });
    $('.goal_update_about').keyup(function(){
        add_char_remain('goal_update_about', 'goal_update_about', 150, 'goal_update_about_char');
    });

    //Update goal name char remaining
    $('.goal_update_name').change(function(){
        add_char_remain('goal_update_name', 'goal_update_name', 20, 'goal_update_name_char_remaining');
    });
    $('.goal_update_name').keyup(function(){
        add_char_remain('goal_update_name', 'goal_update_name', 20, 'goal_update_name_char_remaining');
    });

    //Update goal 10% char remaining
    $('.goal_update_10').change(function(){
        add_char_remain('goal_update_10', 'goal_update_10', 250, 'goal_update_per_char');
    });
    $('.goal_update_10').keyup(function(){
        add_char_remain('goal_update_10', 'goal_update_10', 250, 'goal_update_per_char');
    });

    //Update goal 20% char remaining
    $('.goal_update_20').change(function(){
        add_char_remain('goal_update_20', 'goal_update_20', 250, 'goal_update_per_char');
    });
    $('.goal_update_20').keyup(function(){
        add_char_remain('goal_update_20', 'goal_update_20', 250, 'goal_update_per_char');
    });

    //Update goal 30% char remaining
    $('.goal_update_30').change(function(){
        add_char_remain('goal_update_30', 'goal_update_30', 250, 'goal_update_per_char');
    });
    $('.goal_update_30').keyup(function(){
        add_char_remain('goal_update_30', 'goal_update_30', 250, 'goal_update_per_char');
    });

    //Update goal 40% char remaining
    $('.goal_update_40').change(function(){
        add_char_remain('goal_update_40', 'goal_update_40', 250, 'goal_update_per_char');
    });
    $('.goal_update_40').keyup(function(){
        add_char_remain('goal_update_40', 'goal_update_40', 250, 'goal_update_per_char');
    });

    //Update goal 50% char remaining
    $('.goal_update_50').change(function(){
        add_char_remain('goal_update_50', 'goal_update_50', 250, 'goal_update_per_char');
    });
    $('.goal_update_50').keyup(function(){
        add_char_remain('goal_update_50', 'goal_update_50', 250, 'goal_update_per_char');
    });

    //Update goal 60% char remaining
    $('.goal_update_60').change(function(){
        add_char_remain('goal_update_60', 'goal_update_60', 250, 'goal_update_per_char');
    });
    $('.goal_update_60').keyup(function(){
        add_char_remain('goal_update_60', 'goal_update_60', 250, 'goal_update_per_char');
    });

    //Update goal 70% char remaining
    $('.goal_update_70').change(function(){
        add_char_remain('goal_update_70', 'goal_update_70', 250, 'goal_update_per_char');
    });
    $('.goal_update_70').keyup(function(){
        add_char_remain('goal_update_70', 'goal_update_70', 250, 'goal_update_per_char');
    });

    //Update goal 80% char remaining
    $('.goal_update_80').change(function(){
        add_char_remain('goal_update_80', 'goal_update_80', 250, 'goal_update_per_char');
    });
    $('.goal_update_80').keyup(function(){
        add_char_remain('goal_update_80', 'goal_update_80', 250, 'goal_update_per_char');
    });

    //Update goal 90% char remaining
    $('.goal_update_90').change(function(){
        add_char_remain('goal_update_90', 'goal_update_90', 250, 'goal_update_per_char');
    });
    $('.goal_update_90').keyup(function(){
        add_char_remain('goal_update_90', 'goal_update_90', 250, 'goal_update_per_char');
    });

    //Update goal 100% char remaining
    $('.goal_update_100').change(function(){
        add_char_remain('goal_update_100', 'goal_update_100', 250, 'goal_update_per_char');
    });
    $('.goal_update_100').keyup(function(){
        add_char_remain('goal_update_100', 'goal_update_100', 250, 'goal_update_per_char');
    });
});
