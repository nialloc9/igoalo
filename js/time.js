function get_time(){
    var currentTime = new Date();
    hour = currentTime.getHours();
    min  = currentTime.getMinutes();
    sec  = currentTime.getSeconds();

    if(hour < 10){
        var hour = '0'+hour;
    }

    if(min < 10){
        var min = '0' + min;
    }

    if(sec < 10){
        var sec = '0' + sec;
    }



    var date = new Date();
    currentDate = date.getDate();     // Get current date
    month       = date.getMonth() + 1; // current month
    year        = date.getFullYear();

    if(currentDate < 10){
        var currentDate = '0' + currentDate;
    }

    if(month < 10){
        var month = '0' + month;
    }

    var time_stamp = year + "-" + month + "-" + currentDate + " " + hour + ":" + min + ":" + sec;

    $(".timestamp").each(function(){
        $(this).val(time_stamp);
    });
}

$(document).ready(function(){
    get_time();
    setInterval(function(){
        get_time();
    },5000);
});

