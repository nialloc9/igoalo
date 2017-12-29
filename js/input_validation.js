function disable_if_empty(id, btn){
    var input_id = '#' + id;
    var button = '#' + btn;
    if($(input_id).val() == null || $(input_id).val() ==  '' || $(input_id).val() == 'Select Country' || $(input_id).val() == 'Select State' || $(input_id).val() == '-1'){
        $(button).attr('disabled', 'disabled');
        $(input_id).addClass('invalid_input')
    }else{
        $(button).removeAttr('disabled');
        $(input_id).removeClass('invalid_input');
    }
    $(input_id).change(function(){
        if($(input_id).val() == '' || $(input_id).val() ==  null || $(input_id).val() == 'Select Country' || $(input_id).val() == 'Select State' || $(input_id).val() == '-1'){
            $(button).attr('disabled', 'disabled');
            $(input_id).addClass('invalid_input');
        }else{
            $(button).removeAttr('disabled');
            $(input_id).removeClass('invalid_input');
        }
    });

    $(input_id).keyup(function(){
        if($(input_id).val() == '' || $(input_id).val() ==  null || $(input_id).val() == 'Select Country' || $(input_id).val() == 'Select State'  || $(input_id).val() == '-1'){
            $(button).attr('disabled', 'disabled');
        }else{
            $(button).removeAttr('disabled');
        }
    });

    if($(input_id).attr('checked') == false){
        $(button).attr("disabled","disabled");
        $(input_id).removeClass('valid_input');
        $(input_id).addClass('invalid_input');
    } else {
        $(button).removeAttr('disabled');
        $(input_id).removeClass('invalid_input');
        $(input_id).addClass('valid_input');
    }
}

function check_two_are_same(input1, input2, button){
    var ji = '#'+input1;
    var jx = '#'+input2;
    var btn = '#'+button;

    var i = $(ji).val();
    var x = $(jx).val();
    if((i !== x) || i =='' || x == ''){
        $(btn).attr("disabled","disabled");
        $(ji).removeClass('valid_input');
        $(jx).removeClass('valid_input');
        $(ji).addClass('invalid_input');
        $(jx).addClass('invalid_input');
    }else{
        $(ji).removeClass('invalid_input');
        $(jx).removeClass('invalid_input');
        $(ji).addClass('valid_input');
        $(jx).addClass('valid_input');
    }
}

function check_if_email_is_in_use(email_input, button, infobox){
    var je = '#'+email_input;
    var jb = '#'+button;
    var ji = '#'+infobox;

    var e = $(je).val();

    $.get('ajax/check_exists.php', {
        task: 'check_email',
        email: e
    }).success(function(data){
        if(data == 1){
            $(jb).attr("disabled","disabled");
            $(je).removeClass('valid_input');
            $(je).addClass('invalid_input');
            $(ji).removeClass('hidden');
        } else {
            $(ji).addClass('hidden');
            $(je).removeClass('invalid_input');
            $(je).addClass('valid_input');
        }
    }).error(function(){
        alert('check email error');
    });
}

function check_if_username_is_in_use(username_input, button, infobox){
    var ju = '#'+username_input;
    var jb = '#'+button;
    var ji = '#'+infobox;

    var u = $(ju).val();

    $.get('ajax/check_exists.php', {
        task: 'check_username',
        username: u
    }).success(function(data){
        if(data == 1){
            $(jb).attr("disabled","disabled");
            $(ju).removeClass('valid_input');
            $(ju).addClass('invalid_input');
            $(ji).text(' Username already exists.');
        } else {
            $(ji).text('');
            $(ju).removeClass('invalid_input');
            $(ju).addClass('valid_input');
        }
    }).error(function(){
        alert('check username error');
    })
}


function check_all(class_name, btn_id){
    var c = '.'+class_name;
    var btn = '#'+ btn_id;

    $(c).each(function(){
        if($(this).val() == '' || $(this).val() == null || $(this).val() == false || $(this).val() == '-1' || $(this).prop('checked') == false
            || $(this).val() == 'Select Country' || $(this).val() == 'Select State' || $(this).val() == 0){
            if(btn.attr('disabled') != 'disabled'){
                $(btn).attr('disabled', 'disabled');
            }
        }else{
            if(btn.attr('disabled') == 'disabled'){

                $(btn).removeAttr('disabled');
            }
        }
    });
}

function check_gender(male_id, female_id, btn_id){
    var m = '#'+male_id;
    var f = '#'+female_id;
    var btn = '#'+btn_id;

    if($(m).is(':checked') || $(f).is(':checked')){

    }else{
        $(btn).attr('disabled', 'disabled');
    }
}

function check_checkbox(checkbox_id, button_id){
    var c = '#'+checkbox_id;
    var btn = '#'+button_id;

    if($(c).prop('checked') !== 'agree'){
        $(btn).attr('disabled', 'disabled');
    }else{
        $(btn).removeAttr('disabled');
    }
}