$(document).ready(function(){

    $('#goal_create').addClass('create_goal_disable');
    $('#goal_create').attr('disabled', 'disabled');

    $('#goal_type').change(function(){
        if((($('#goal_type').val() != '' && $('#goal_type').val() != 'More') || $('#goal_more_type').val() != '') && $('#goal_name').val() != ''){
            if($('#goal_create').hasClass('create_goal_disable')){
                $('#goal_create').removeAttr('disabled');
                $('#goal_create').removeClass('create_goal_disable');
            }else{

            }
        }else{
            if($('#goal_create').hasClass('create_goal_disable')){

            }else{
                $('#goal_create').addClass('create_goal_disable');
                $('#goal_create').attr('disabled', 'disabled');
            }
        }
    });

    $('#goal_more_type').change(function(){
        if((($('#goal_type').val() != '' && $('#goal_type').val() != 'More') || $('#goal_more_type').val() != '') && $('#goal_name').val() != ''){
            if($('#goal_create').hasClass('create_goal_disable')){
                $('#goal_create').removeAttr('disabled');
                $('#goal_create').removeClass('create_goal_disable');
            }else{
            }
        }else{
            if($('#goal_create').hasClass('create_goal_disable')){

            }else{
                $('#goal_create').addClass('create_goal_disable');
                $('#goal_create').attr('disabled', 'disabled');
            }
        }
    });

    $('#goal_name').change(function(){
        if((($('#goal_type').val() != '' && $('#goal_type').val() != 'More') || $('#goal_more_type').val() != '') && $('#goal_name').val() != ''){
            if($('#goal_create').hasClass('create_goal_disable')){
                $('#goal_create').removeAttr('disabled');
                $('#goal_create').removeClass('create_goal_disable');
            }else{
            }
        }else{
            if($('#goal_create').hasClass('create_goal_disable')){

            }else{
                $('#goal_create').addClass('create_goal_disable');
                $('#goal_create').attr('disabled', 'disabled');
            }
        }
    });

});
