$(document).ready(function(){
    //This will fire once the page has been fully loaded.
    $('#status_post').click(function(){
        status_post_click();
    });
});

function status_post_click(){
    //Text within the textarea which the user has entered.
    var _status = $('#status_body').val(); //Text that the user enters.
    var _user_id = $('#post_user_id').val();
    var _parent_id = $('#parent_id').val();
    var _status_image = $('#status_image').val();
    var _status_video = $('#status_video').val();
    var _attachment = $('#attachment').val();
    var _page_id = $('#page_id').val();
    var _token = $('#hidden_csrf_token').val();
    var _posted_at = $('#post_time').val();

    if(_status.length >0 || _status_image > 0 || _status_video > 0 || _attachment > 0 && _userId != null && _token == '1'){

        $.post('ajax/status_insert.php',
            {
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
            }
        ).error(
            function() {
                alert('error.. please try again');
                console.log('Error');
            })
            .success(
            function(data) {
                //Success
                //Task: Insert html into teh ul/li
                $('#status_body').val(' ');
                user_status_insert($.parseJSON(data));
            }
        );
    }else{
        //Text are was empty let's put a a border of red on it.
        $('#status_body').addClass('has-error');
        $('#status_insert_wrapper').text('Post cannot be empty!');
    }
    //Remove the text from the textarea, ready for another comment
    $('#status_post').val('');
}

function user_status_insert(data){
    var t = '';
    var type = 1;
    var token = $('#status_token').val();
    var reply_user_id = $('#post_user_id').val();
    var reply_page_id = $('#page_id').val();
    var reply_posted_at = $('#post_time').val();

    //This will appear when edit is clicked and dissapear when cancel is clicked.
    t+= '<div id="status_edit_show_'+data.status_id+'" class="media col-sm-9 status-container hidden">';
    t+= '<div class="status-image-wrapper">';
    t+= '<a class="pull-left" href="profile_template_user.php">';
    t+= '<img class="media-object img-rounded status-image" alt="'+data.username+'" src="'+data.profile_image+'">';
    t+= '</a>';
    t+= '</div>';
    t+= '<a class="pull-left" href="profile_template_user.php">';
    t+= '<div class="media-body status_body">';
    t+= '<form action="#" method="post">';
    t+= '</a><br><br>';
    t+= '<h4 class="media-heading"><a href="profile_template_user.php">'+data.username+'</a></h4>';
    t+= '<p id="status_body"><textarea name="status_body_edit" class="form-control" rows="5">'+data.status+'</textarea></p>';
    if((data.image !== null) && (data.image !== 'undefined')  && (data.image !== '')){
        t+= '<p id="status_body"><input type="file" name="status_image_edit" value="'+data.image+'"><br><a>Remove</a></p>';

        var type = 2;
    }

    if((data.video !== null) && (data.video !== 'undefined') && (data.video !== '')){
        t+= '<p id="status_body"><input type="file" name="status_video_edit" value="'+data.video+'"><br><a>Remove</a></p>';

        var type = 3;
    }

    if((data.attachment !== null) && (data.attachment !== 'undefined') && (data.attachment !== '')){
        t+= '<p id="status_body"><input type="file" name="status_attachment_edit" value="'+data.attachment+'"><br><a>Remove</a></p>';

        var type = 4;
    }
    t+= '<ul class="list-inline">';
    t+= '<input type="hidden" id="status_type'+data.status_id+'" name="status_type_edit" value="'+type+'"/>';
    t+= '<input type="hidden" name="status_id_edit" value="'+data.status_id+'"/>';
    t+= '<input type="hidden" name="status_token" id="status_token_edit'+data.status_id+'" value="'+token+'"/>';
    t+= '<li class="status_edit_cancel btn"><input id="cancel'+data.status_id+'" type="button" value="Cancel" class="btn btn-default"/></li>';
    t+= '<li class="status_edit_cancel btn"><input type="submit" value="Update" class="btn btn-primary"/></li>';
    t+= '</ul>';
    t+= '</form>';
    t+= '</div>';
    t+= '</div>';


    //This will appear when status is made. It will dissapear when edit is clicked.
    t+= '<div id="hide_'+data.status_id+'" class="media col-sm-9 status-container">';
    t+= '<div class="status-image-wrapper">';
    t+= '<a class="pull-left" href="profile_template_user.php">';
    t+= '<img class="media-object img-rounded status-image" alt="'+data.username+'" src="'+data.profile_image+'">';
    t+= '</a>';
    t+= '</div>';
    t+= '<div class="media-body status_body">';
    t+= '<h4 class="media-heading"><a href="profile_template_user.php">'+data.username+'</a></h4>';
    t+= '<p id="status_body">'+data.status+'</p>';
    t+= '<ul class="list-inline">';
    t+= '<li id="status_time" class="btn"><a>'+data.created_at+'</a></li>';
    t+= '<li class="status_edit btn" id="status_edit'+data.status_id+'"><a>Edit</a></li>';
    t+= '<li class="status_delete btn" id="'+data.status_id+'"><a>Delete</a></li>';
    t+= '<li id="likes">0 likes</li>';
    t+= '</ul>';
    t+= '</div>';
    t+= '<form role="form" action="#" method="post">';
    t+= '<div class="form-group">';
    t+= '<textarea name="ajax_reply_status" class="form-control" rows="2" placeholder="Reply to this status"></textarea>';
    t+= '<span class="help-block"></span>';
    t+= '</div>';
    t+= '<input type="hidden" name="ajax_reply_token" value="'+token+'"/>';
    t+= '<input type="hidden" name="ajax_reply_status_parent_id" value="'+data.status_id+'"/>';
    t+= '<input type="hidden" name="ajax_reply_status_user_id" value="'+reply_user_id+'"/>';
    t+= '<input type="hidden" name="ajax_reply_status_page_id" value="'+reply_page_id+'"/>';
    t+= '<input type="hidden" name="ajax_reply_status_posted_at" value="'+reply_posted_at+'"/>';
    t+= '<input type="submit" value="Reply" class="btn btn-default btn-sm">';
    t+= '</form>';
    t+= '</div>';
    t+= '</div>';

    $('#status_insert_wrapper').prepend(t);


    add_delete_function();
    add_status_edit_function();

}