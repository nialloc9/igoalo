$(document).ready(function(){
    //Add char remain functionality
    $('#username_register').change(function(){
        add_char_remain_single('username_register', 30, 'char_username');
        check_if_username_is_in_use('username_register', 'register_submit', 'username_check');
    });
    $('#username_register').keyup(function(){
        add_char_remain_single('username_register', 30, 'char_username');
    });

    $('#password_register').change(function(){
        add_char_remain_single('password_register', 20, 'char_pass');
        check_two_are_same('password_register', 'password_register_again', 'register_submit');

        if($('#password_register').val() !== $('#password_register_again').val()  || ($('#password_register').val() == '' || $('#password_register_again').val() == '')){
            $('#password_info').removeClass('hidden');
        }else{
            $('#password_info').addClass('hidden');
        }
    });
    $('#password_register').keyup(function(){
        add_char_remain_single('password_register', 20, 'char_pass');
    });

    $('#password_register_again').change(function(){
        add_char_remain_single('password_register_again', 20, 'char_pass_again');
        check_two_are_same('password_register', 'password_register_again', 'register_submit');

        if($('#password_register').val() !== $('#password_register_again').val() || ($('#password_register').val() == '' || $('#password_register_again').val() == '')){
            $('#password_info').removeClass('hidden');
        }else{
            $('#password_info').addClass('hidden');
        }
    });
    $('#password_register_again').keyup(function(){
        add_char_remain_single('password_register_again', 20, 'char_pass_again');
    });

    $('#firstname').change(function(){
        add_char_remain_single('firstname', 40, 'char_first');
    });
    $('#firstname').keyup(function(){
        add_char_remain_single('firstname', 40, 'char_first');
    });

    $('#surname').change(function(){
        add_char_remain_single('surname', 40, 'char_sur');
    });
    $('#surname').keyup(function(){
        add_char_remain_single('surname', 40, 'char_sur');
    });

    $('#address').change(function(){
        add_char_remain_single('address', 100, 'char_add');
    });
    $('#address').keyup(function(){
        add_char_remain_single('address', 100, 'char_add');
    });

    $('#post').change(function(){
        add_char_remain_single('post', 15, 'char_post');
    });
    $('#post').keyup(function(){
        add_char_remain_single('post', 15, 'char_post');
    });

    $('#phone').change(function(){
        add_char_remain_single('phone', 30, 'char_phone');
    });
    $('#phone').keyup(function(){
        add_char_remain_single('phone', 30, 'char_phone');
    });

    $('#email').change(function(){
        check_if_email_is_in_use('email', 'register_submit', 'email_check');
    });

    $('#male').click(function(){
        $('#male').removeClass('required_input');
        $('#female').removeClass('required_input');
    });

    $('#female').click(function(){
        $('#male').removeClass('required_input');
        $('#female').removeClass('required_input');
    });

    $('#checkbox').click(function(){
        if($(this).prop('checked') == false){
            $('#register_submit').attr("disabled","disabled");
        } else {
            $('#register_submit').removeAttr('disabled');
        }
        check_gender('male', 'female', 'register_submit');
        check_all('required_input', 'register_submit');

    });

    //Datepicker
    function register_country(){
        populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down=
        var temp=$('#country_hidden').val();
        $("#country").val(temp);
        populateStates('country','state');


        var state=$('#state_hidden').val();
        $("#state").val(state);
    }

    populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down=
    check_all('required_input', 'register_submit');
});

//Adds in the set country as the set state and set country as country.
populateCountries("country_update", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down=
check_all('required_input', 'register_submit');
