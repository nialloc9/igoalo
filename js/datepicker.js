$(document).ready(function(){

    $( "#date" ).datepicker({
        inline: true,
        dateFormat:'dd/mm/yy',
        changeYear: true,
        changeMonth: true,
        yearRange: "-150:+0"
    });

    // Hover states on the static widgets
    $( "#dialog-link, #icons li" ).hover(
        function() {
            $( this ).addClass( "ui-state-hover" );
        },
        function() {
            $( this ).removeClass( "ui-state-hover" );
        }
    );

    $('#date').change(function(){
        var dob = $('#date').val();
        $('#age_show').text(dob);
    });
});