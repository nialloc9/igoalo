$(document).ready(function(){
    add_like_function();
    add_unlike_function();
});

function add_like_function(){
    $('.like_button').each(function(){
        var like_btn = this;

        $(like_btn).click(function(){
            console.log('Like button clicked');
            like(like_btn.id);
            $(like_btn).hide();
        })
    });
}

function like(id){

    var likeable_id = id.replace('like_button_','');
    var user_id = $('#like_user_id').val();
    var type_id = '#'+'status_type'+likeable_id;
    var type = $(type_id).val();

    var token = $('#hidden_csrf_token').val();
    $.post('ajax/ajax_like.php', {
        task: 'like',
        id: likeable_id,
        user_id: user_id,
        type: type,
        token: token

    }).success(function(data){
        //Console log the data and change the value of the likes counter +1
        var like_counter = '#'+'likes_input'+likeable_id;
        var like_display = '#'+'like_counter'+likeable_id;
        var likes = $(like_counter).val();
        var new_likes = parseInt(likes);
        new_likes += 1;

        $(like_display).text(new_likes);

        //Change to word like or likes
        var like_likes = '#'+'like_likes'+likeable_id;

        if(new_likes == 1){
            $(like_likes).text(' like');
        }else{
            $(like_likes).text(' likes');
        }
    }).error(function(){
        console.log('error liking');
    })
}


function add_unlike_function(){
    //Add unlike functionality
    $('.unlike_button').each(function(){
        var unlike_btn = this;

        $(unlike_btn).click(function(){
            console.log('Unike button clicked');
            unlike(unlike_btn.id);
            $(unlike_btn).hide();
        })
    });
}

function unlike(id){
    //Get only the id of the status
    var unlikeable_id = id.replace('unlike_button_','');

    var token = $('#hidden_csrf_token').val();

    $.post('ajax/ajax_unlike.php', {
        task: 'unlike',
        id: unlikeable_id,
        token: token

    }).success(function(data){
        //Console log the data and change the value of the likes counter -1
        console.log(data);
        var like_counter = '#'+'likes_input'+unlikeable_id;
        var like_display = '#'+'like_counter'+unlikeable_id;
        var likes = $(like_counter).val();
        var new_likes = parseInt(likes); //Change from a string to an interger
        new_likes -= 1;

        $(like_display).text(new_likes);

        //Change to word like or likes
        var like_likes = '#'+'like_likes'+unlikeable_id;

        if(new_likes == 1){
            $(like_likes).text(' like');
        }else{
            $(like_likes).text(' likes');
        }
    }).error(function(){
        console.log('error unliking');
    })
}