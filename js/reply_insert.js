$(document).ready(function(){
       reply_post_click();
});

function reply_post_click(){
    $('.reply_btn').each(function(){
        console.log('Reply function added to each reply status.')
        var btn = this;


        $(btn).click(function(){
           reply_insert(btn.id);
        });
    });
}

$('.status_delete').each(function(){
    console.log('delete added to each status button.');
    var btn = this;
    $(btn).click(function(){
        if(confirm('Are you sure you want to delete this?')){
            status_delete(btn.id);
        }
    })
});
function reply_insert(id){
    var reply_id = id.replace('reply_btn', '');

    var status = '#reply'+reply_id;
    var user_id = '#post_user_id'+reply_id;
    var parent_id = '#parent_id'+reply_id;
    var status_image = '#status_image'+reply_id;
    var status_video = '#status_video'+reply_id;
    var attachment = '#attachment'+reply_id;
    var page_id = '#page_id'+reply_id;

    var posted_at = '#post_time'+reply_id;

    var _status = $(status).val(); //Text that the user enters.
    var _user_id = $(user_id).val();
    var _parent_id = $(parent_id).val();
    var _status_image = $(status_image).val();
    var _status_video = $(status_video).val();
    var _attachment = $(attachment).val();
    var _page_id = $(page_id).val();
    var _token = $('#hidden_csrf_token').val();
    var _posted_at = $(posted_at).val();


    $(id).click(
        $.post('ajax/status_insert.php', {
            task: 'status_insert',
            user_id: _user_id,
            status: _status,
            video: _status_video,
            image: _status_image,
            attachment: _attachment,
            parent_id: _parent_id,
            page_id: _page_id,
            created_at: _posted_at,
            token: _token
        }).error(function(){
            console.log('Error..');
        }).success(function(data){
            insert_reply_status($.parseJSON(data));
        })
    )
}

function insert_reply_status(data){
    var post_area =  '#reply_insert_wrapper'+data.parent_id+'';

    var t = '';
    var type = 1;

    //This will appear when edit is clicked and dissapear when cancel is clicked.
    t += '<div id="status_edit_show_'+data.status_id+'" class="media col-sm-9 status-container hidden reply_status">';
    t += '<div class="status-image-wrapper">';
    t += '<a class="pull-left" href="profile_template_user.php">';
    t += '<img class="media-object img-rounded replyblock_image" alt="<?php echo $user->username; ?>" src="'+data.profile_image+'">';
    t += '</a>';
    t += '</div>';
    t += '<a class="pull-left" href="'+data.profile_image+'">';
    t += '</a><br><br>';
    t += '<div class="media-body">';
    t += '<form action="#" method="post">';
    t += '<h4 class="media-heading"><a href="profile_template_user.php">'+data.username+'</a></h4>';
    t += '<p id="status_body"><textarea name="status_body_edit" class="form-control" rows="5">'+data.status+'</textarea></p>';

    if((data.image !== null) && (data.image !== 'undefined')  && (data.image !== '')){
        t+= '<p id="status_body"><input type="file" name="status_image_edit" value="'+data.image+'"><br><a>Remove</a></p>';

        type = 2;
    }

    if((data.video !== null) && (data.video !== 'undefined') && (data.video !== '')){
        t+= '<p id="status_body"><input type="file" name="status_video_edit" value="'+data.video+'"><br><a>Remove</a></p>';

        type = 3;
    }

    if((data.attachment !== null) && (data.attachment !== 'undefined') && (data.attachment !== '')){
        t+= '<p id="status_body"><input type="file" name="status_attachment_edit" value="'+data.attachment+'"><br><a>Remove</a></p>';

        type = 4;
    }

    t += '<ul class="list-inline">';
    t += '<input type="hidden" id="'+data.status_id+'" name="status_type_edit" value="'+type+'"/>';
    t += '<input type="hidden" name="status_id_edit" value="'+data.status_id+'"/>';
    t += '<li class="status_edit_cancel btn"><input id="cancel'+data.status_id+'" type="button" value="Cancel" class="btn btn-default"/></li>';
    t += '<li class="status_edit_cancel btn"><input type="submit" value="Update" class="btn btn-primary"/></li>';
    t += '</ul>';
    t += '</form>';
    t += '</div>';
    t += '</div>';
    t += '</br>';

    //This will appear when reply is made. It will dissapear when edit is clicked.
    t+= '<div class="media replyblock_container" id="hide_'+data.status_id+'">';
    t+= '<div class="replyblock_image_wrapper">';
    t+= '<a class="pull-left" href="profile_template_user.php">';
    t+= '<img class="media-object img-rounded replyblock_image" alt="'+data.username+'" src="'+data.profile_image+'">';
    t+= '</a>';
    t+= '</div>';
    t+= '<div class="media-body">';
    t+= '<h4 class="media-heading"><a href="profile_template_user.php">'+data.username+'</a></h4>';
    t+= '<p id="status_body">'+data.status+'</p>';
    t+= '<ul class="list-inline">';
    t+= '<li id="status_time" class="btn"><a>'+data.created_at+'</a></li><br>';
    t+= '<li class="status_edit btn" id="status_edit'+data.status_id+'"><a>Edit</a></li>';
    t+= '<li class="status_delete btn" id="'+data.status_id+'"><a>Delete</a></li>';
    t+= '<li><p class="like_counter" id="like_counter'+data.status_id+'">0 likes</p></li>';
    t+= '</ul>';
    t+= '</div>';
    t+= '</div>';

    $(post_area).prepend(t);
    add_delete_function();
    add_status_edit_function();
}

