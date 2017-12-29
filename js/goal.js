function goal_name_countdown() {
    // 140 is the max message length
    var remaining = 20 - $('#goal_name').val().length;
    $('#goal_name_char').text(remaining);
}

function goal_about_countdown() {
    // 150 is the max message length
    var remaining = 150 - $('#goal_about').val().length;
    $('#goal_about_char').text(remaining);
}

function goal_per_countdown(){
    var per = $('#goal_per_completed').val();

    $('#goal_per_value').text(per);
}

function new_goal_type_more_hide_show(){
    $('#goal_type').change(function(){
        if($('#goal_type').val() == 'More'){
            $('#type_more').removeClass('hidden');
        }else{
            $('#type_more').addClass('hidden');
        }
    });
}



function add_goal_next(){
    $('.goal_next_button').each(function(){

        var update_btn = this;

        var update_btn_id = this.id;

        var update_btn_id_jquery = '#'+this.id;

        var id = update_btn_id.replace('goal_next', '');

        var per_input_hidden_id = 'goal_per_input_hidden'+id;

        var per_time_input_hidden_id = 'goal_time_per_input_hidden'+id;

        var per_time_input_hidden_id_jquery = '#'+per_time_input_hidden_id;

        var per_input_hidden_id_jquery = '#'+per_input_hidden_id;

        var per = parseInt($(per_input_hidden_id_jquery).val());

        var time = $(per_time_input_hidden_id_jquery).val();

        var progress_id = 'progress'+id;

        var progress_id_jquery = '#progress'+id;

        var token_id = '#goal_per_input_token' + id;

        var token = $(token_id).val();


        if(per < 100){
            var update_per_plus_10 = per + 10;
            var per_update = per + 20;

            $(update_btn_id_jquery).click(function(){

                $(update_btn_id_jquery).hide();

                $(progress_id_jquery).text(update_per_plus_10);

                $(progress_id_jquery).width(update_per_plus_10+'%');

                goal_next(id, update_per_plus_10, time, token);
            });
        }
    });
}

function goal_next(goal_id, per, time, token){
    if(goal_id > 0 && (per >= 0 && per <= 100)){
        if(per == 100){
            completed = 1;
        }else{
            completed = 0;
        }

        $.post('ajax/goal_per_update.php', {
            task: 'goal_per_update',
            per: per,
            id: goal_id,
            completed: completed,
            time: time,
            token: token
        }).success(function(data){
        }).error(function(data){
        });
    }
}

jQuery(document).ready(function() {
    //Character counter functionality for goal name.
    goal_name_countdown();
    $('#goal_name').change(goal_name_countdown);
    $('#goal_name').keyup(goal_name_countdown);

    //Character counter functionality for goal about.
    goal_about_countdown();
    $('#goal_about').change(goal_about_countdown);
    $('#goal_about').keyup(goal_about_countdown);

    $('.goal_update_about').change(function(){
        add_char_remain('goal_update_about', 'goal_update_about', 150, 'goal_update_about_char');
    });
    $('.goal_update_about').keyup(function(){
        add_char_remain('goal_update_about', 'goal_update_about', 150, 'goal_update_about_char');
    });
    

    //Goal percentage completed countdown. When you slide the slider it will change the number below.
    goal_per_countdown();
    $('#goal_per_completed').change(goal_per_countdown);

    //Show more text box if user clicks more when creating a new goal.
    new_goal_type_more_hide_show();

    //Change the percent completed if the user clicks the button.
    add_goal_next();
    
    //Goal 10% char remaining
    $('#goal_10').change(function(){
        add_char_remain_single('goal_10', 250, 'goal_update_per_char');
    });
    $('#goal_10').keyup(function(){
        add_char_remain_single('goal_10', 250, 'goal_update_per_char');
    });

    //Goal 20% char remaining
    $('#goal_20').change(function(){
        add_char_remain_single('goal_20', 250, 'goal_update_per_char');
    });
    $('#goal_20').keyup(function(){
        add_char_remain_single('goal_20', 250, 'goal_update_per_char');
    });

    //Goal 30% char remaining
    $('#goal_30').change(function(){
        add_char_remain_single('goal_30', 250, 'goal_update_per_char');
    });
    $('#goal_30').keyup(function(){
        add_char_remain_single('goal_30', 250, 'goal_update_per_char');
    });

    //Goal 40% char remaining
    $('#goal_40').change(function(){
        add_char_remain_single('goal_40', 250, 'goal_update_per_char');
    });
    $('#goal_40').keyup(function(){
        add_char_remain_single('goal_40', 250, 'goal_update_per_char');
    });

    //Goal 50% char remaining
    $('#goal_50').change(function(){
        add_char_remain_single('goal_50', 250, 'goal_update_per_char');
    });
    $('#goal_50').keyup(function(){
        add_char_remain_single('goal_50', 250, 'goal_update_per_char');
    });

    //Goal 60% char remaining
    $('#goal_60').change(function(){
        add_char_remain_single('goal_60', 250, 'goal_update_per_char');
    });
    $('#goal_60').keyup(function(){
        add_char_remain_single('goal_60', 250, 'goal_update_per_char');
    });

    //Goal 70% char remaining
    $('#goal_70').change(function(){
        add_char_remain_single('goal_70', 250, 'goal_update_per_char');
    });
    $('#goal_70').keyup(function(){
        add_char_remain_single('goal_70', 250, 'goal_update_per_char');
    });

    //Goal 80% char remaining
    $('#goal_80').change(function(){
        add_char_remain_single('goal_80', 250, 'goal_update_per_char');
    });
    $('#goal_80').keyup(function(){
        add_char_remain_single('goal_80', 250, 'goal_update_per_char');
    });

    //Goal 90% char remaining
    $('#goal_90').change(function(){
        add_char_remain_single('goal_90', 250, 'goal_update_per_char');
    });
    $('#goal_90').keyup(function(){
        add_char_remain_single('goal_90', 250, 'goal_update_per_char');
    });

    //Goal 100% char remaining
    $('#goal_100').change(function(){
        add_char_remain_single('goal_100', 250, 'goal_update_per_char');
    });
    $('#goal_100').keyup(function(){
        add_char_remain_single('goal_100', 250, 'goal_update_per_char');
    });
});