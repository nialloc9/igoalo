var date = new Date();

var current_hour = date.getHours();

var current_min = date.getMinutes();

var current_sec = date.getSeconds();

var current_day = date.getDay();

var current_year = date.getFullYear();

var current_time = current_hour + ':' + current_min + ':' +current_sec;





/*Character countdown*/
function char_remain() {
    function updateCountdown() {
        // 150 is the max message length
        var remaining = 150 - jQuery('.char_remaining').val().length;
        jQuery('.countdown').text(remaining);
    }

    jQuery(document).ready(function ($) {
        updateCountdown();
        $('.char_remaining').change(updateCountdown);
        $('.char_remaining').keyup(updateCountdown);
    });


    /*Goal 10% Character countdown*/
    function updateCountdown_10per() {
        // 250 is the max message length
        var remaining = 250 - jQuery('.char_10per_remaining').val().length;
        jQuery('.10per_countdown').text(remaining);
    }

    jQuery(document).ready(function ($) {
        updateCountdown_10per();
        $('.char_10per_remaining').change(updateCountdown_10per);
        $('.char_10per_remaining').keyup(updateCountdown_10per);
    });

    /*Goal 20% Character countdown*/
    function updateCountdown_20per() {
        // 250 is the max message length
        var remaining = 250 - jQuery('.char_20per_remaining').val().length;
        jQuery('.20per_countdown').text(remaining);
    }

    jQuery(document).ready(function ($) {
        updateCountdown_20per();
        $('.char_20per_remaining').change(updateCountdown_20per);
        $('.char_20per_remaining').keyup(updateCountdown_20per);
    });


    /*Goal 30% Character countdown*/
    function updateCountdown_30per() {
        // 350 is the max message length
        var remaining = 250 - jQuery('.char_30per_remaining').val().length;
        jQuery('.30per_countdown').text(remaining);
    }

    jQuery(document).ready(function ($) {
        updateCountdown_30per();
        $('.char_30per_remaining').change(updateCountdown_30per);
        $('.char_30per_remaining').keyup(updateCountdown_30per);
    });

    /*Goal 40% Character countdown*/
    function updateCountdown_40per() {
        // 450 is the max message length
        var remaining = 250 - jQuery('.char_40per_remaining').val().length;
        jQuery('.40per_countdown').text(remaining);
    }

    jQuery(document).ready(function ($) {
        updateCountdown_40per();
        $('.char_40per_remaining').change(updateCountdown_40per);
        $('.char_40per_remaining').keyup(updateCountdown_40per);
    });

    /*Goal 50% Character countdown*/
    function updateCountdown_50per() {
        // 550 is the max message length
        var remaining = 250 - jQuery('.char_50per_remaining').val().length;
        jQuery('.50per_countdown').text(remaining);
    }

    jQuery(document).ready(function ($) {
        updateCountdown_50per();
        $('.char_50per_remaining').change(updateCountdown_50per);
        $('.char_50per_remaining').keyup(updateCountdown_50per);
    });

    /*Goal 60% Character countdown*/
    function updateCountdown_60per() {
        // 650 is the max message length
        var remaining = 250 - jQuery('.char_60per_remaining').val().length;
        jQuery('.60per_countdown').text(remaining);
    }

    jQuery(document).ready(function ($) {
        updateCountdown_60per();
        $('.char_60per_remaining').change(updateCountdown_60per);
        $('.char_60per_remaining').keyup(updateCountdown_60per);
    });

    /*Goal 70% Character countdown*/
    function updateCountdown_70per() {
        // 750 is the max message length
        var remaining = 250 - jQuery('.char_70per_remaining').val().length;
        jQuery('.70per_countdown').text(remaining);
    }

    jQuery(document).ready(function ($) {
        updateCountdown_70per();
        $('.char_70per_remaining').change(updateCountdown_70per);
        $('.char_70per_remaining').keyup(updateCountdown_70per);
    });

    /*Goal 80% Character countdown*/
    function updateCountdown_80per() {
        // 850 is the max message length
        var remaining = 250 - jQuery('.char_80per_remaining').val().length;
        jQuery('.80per_countdown').text(remaining);
    }

    jQuery(document).ready(function ($) {
        updateCountdown_80per();
        $('.char_80per_remaining').change(updateCountdown_80per);
        $('.char_80per_remaining').keyup(updateCountdown_80per);
    });

    /*Goal 90% Character countdown*/
    function updateCountdown_90per() {
        // 950 is the max message length
        var remaining = 250 - jQuery('.char_90per_remaining').val().length;
        jQuery('.90per_countdown').text(remaining);
    }

    jQuery(document).ready(function ($) {
        updateCountdown_90per();
        $('.char_90per_remaining').change(updateCountdown_90per);
        $('.char_90per_remaining').keyup(updateCountdown_90per);
    });

    /*Goal 100% Character countdown*/
    function updateCountdown_100per() {
        // 1050 is the max message length
        var remaining = 250 - jQuery('.char_100per_remaining').val().length;
        jQuery('.100per_countdown').text(remaining);
    }

    jQuery(document).ready(function ($) {
        updateCountdown_100per();
        $('.char_100per_remaining').change(updateCountdown_100per);
        $('.char_100per_remaining').keyup(updateCountdown_100per);
    });
}