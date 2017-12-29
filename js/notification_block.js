$(document).ready(function(){
    $('._not').each(function(){
        var not_id = this.id;

        //Get holder id's
        var group_id_holder = '#group_id_'+not_id;
        var auth_id_holder = '#auth_id_'+not_id;
        var mf_id_holder = '#mf_id_'+not_id;
        var not_time_holder = '#not_time_'+not_id;

        //Get button id's
        var accept_friend_btn = '#accept_friend_icon_'+not_id;
        var reject_friend_btn = '#reject_friend_icon_'+not_id;
        var accept_member_btn = '#accept_member_icon_'+not_id;
        var reject_member_btn = '#reject_member_icon_'+not_id;
        var not_post_btn = '#post_hide_'+not_id;

        //Get holder values
        var group_id = $(group_id_holder).val();
        var auth_id = $(auth_id_holder).val();
        var mf_id = $(mf_id_holder).val();
        var not_time = $(not_time_holder).val();

        var token = $('#hidden_csrf_token').val();

        $(accept_friend_btn).click(function(){
            $.post('ajax/notifications_controller.php',{
                task: 'accept_friend',
                group_id: group_id,
                auth_id: auth_id,
                mf_id: mf_id,
                not_time: not_time,
                not_id: not_id,
                token: token
            }).error(function(){
                console.log('error accepting friend');
            }).success(function(){
                var jquery_not_id = '#'+not_id;
                $(jquery_not_id).hide();
            })
        });

        $(reject_friend_btn).click(function(){
            $.post('ajax/notifications_controller.php',{
                task: 'reject_friend',
                group_id: group_id,
                auth_id: auth_id,
                mf_id: mf_id,
                not_time: not_time,
                not_id: not_id,
                token: token
            }).error(function(){
                console.log('error accepting friend');
            }).success(function(){
                var jquery_not_id = '#'+not_id;
                $(jquery_not_id).hide();
            })
        });

        $(accept_member_btn).click(function(){
            $.post('ajax/notifications_controller.php',{
                task: 'accept_member',
                group_id: group_id,
                mf_id: mf_id,
                not_time: not_time,
                not_id: not_id,
                token: token
            }).error(function(){
                console.log('error accepting member');
            }).success(function(){
                var jquery_not_id = '#'+not_id;
                $(jquery_not_id).hide();
            })
        });

        $(reject_member_btn).click(function(){
            $.post('ajax/notifications_controller.php',{
                task: 'reject_member',
                group_id: group_id,
                mf_id: mf_id,
                not_time: not_time,
                not_id: not_id,
                token: token
            }).error(function(){
                console.log('error rejecting member');
            }).success(function(data){
                var jquery_not_id = '#'+not_id;
                $(jquery_not_id).hide();
            })
        });

        $(not_post_btn).click(function(){
            $.post('ajax/notifications_controller.php',{
                task: 'hide_post',
                not_id: not_id,
                token: token
            }).error(function(){
                console.log('error hiding');
            }).success(function(){
                var jquery_not_id = '#'+not_id;
                $(jquery_not_id).hide();
            })
        });
    });
});
