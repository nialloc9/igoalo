function upload_image(input_id){
    $(input_id).click();
    $(input_id).change(function(){
        if($(input_id).val() !== ''){
            var pic_name = input_id + '_name';
            $(pic_name).text($(input_id).val());
        }
    });
}

function validate_email(email)
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

$(document).ready(function(){
    //Add char remain functionality
    $('#username_update').change(function(){
        add_char_remain_single('username_update', 30, 'char_username');
        check_if_username_is_in_use('username_register', '', 'user_about_update_char');
    });
    $('#username_update').keyup(function(){
        add_char_remain_single('username_update', 30, 'user_about_update_char');
    });

    $('#password_new').change(function(){
        add_char_remain_single('password_new', 20, 'password_area_char_remaining');
        check_two_are_same('password_new', 'password_new_again', '#');
    });
    $('#password_new').keyup(function(){
        add_char_remain_single('password_new', 20, 'password_area_char_remaining');
    });

    $('#password_new_again').change(function(){
        add_char_remain_single('password_new_again', 20, 'password_area_char_remaining');
        check_two_are_same('password_new', 'password_new_again', '');
    });
    $('#password_new_again').keyup(function(){
        add_char_remain_single('password_new_again', 20, 'password_area_char_remaining');
    });

    $('#firstname_update').change(function(){
        add_char_remain_single('firstname_update', 40, 'first_last_age_char_remaining');
    });
    $('#firstname_update').keyup(function(){
        add_char_remain_single('firstname_update', 40, 'first_last_age_char_remaining');
    });

    $('#surname_update').change(function(){
        add_char_remain_single('surname_update', 40, 'first_last_age_char_remaining');
    });
    $('#surname_update').keyup(function(){
        add_char_remain_single('surname_update', 40, 'first_last_age_char_remaining');
    });

    $('#address_update').change(function(){
        add_char_remain_single('address_update', 100, 'first_last_age_char_remaining');
    });
    $('#address_update').keyup(function(){
        add_char_remain_single('address_update', 100, 'first_last_age_char_remaining');
    });

    $('#post_update').change(function(){
        add_char_remain_single('post_update', 15, 'first_last_age_char_remaining');
    });
    $('#post_update').keyup(function(){
        add_char_remain_single('post_update', 15, 'first_last_age_char_remaining');
    });

    $('#phone_update').change(function(){
        add_char_remain_single('phone_update', 30, 'first_last_age_char_remaining');
    });
    $('#phone_update').keyup(function(){
        add_char_remain_single('phone_update', 30, 'first_last_age_char_remaining');
    });

    $('#email_update').change(function(){
        add_char_remain_single('email_update', 100, 'first_last_age_char_remaining');
        check_if_email_is_in_use('email_update', '', 'email_update');
    });
    $('#email_update').keyup(function(){
        add_char_remain_single('email_update', 100, 'first_last_age_char_remaining');
    });

    $(function() {
        $('#state').removeClass('invalid_input');
        populateCountries("country_update", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down=
        var temp=$('#country_edit_hidden').val();
        $("#country_update").val(temp);
        populateStates('country_update','state');
    });

    $(function() {
        var state=$('#state_edit_hidden').val();
        $("#state").val(state);
    });
});


//Adds in the set country as the set state and set country as country.
populateCountries("country_update", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down=

