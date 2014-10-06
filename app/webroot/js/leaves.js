$(function() {

    $('#LeaveRule4Value').click(function(){
        if ($('#LeaveRule4Value').prop('checked')) {
            $('#rule_4').show();
        } else {
            $('#rule_4').hide();
        }
    });

    $('#LeaveRule6Value').click(function(){
        if ($('#LeaveRule6Value').prop('checked')) {
            $('#rule_6').show();
        } else {
            $('#rule_6').hide();
        }
    });

    $('#LeaveRule7Value').click(function(){
        if ($('#LeaveRule7Value').prop('checked')) {
            $('#rule_7').show();
        } else {
            $('#rule_7').hide();
        }
    });

    $('#HolidayStart').datepicker({
        constrainInput: true,   // prevent letters in the input field
        autoSize: true,         // automatically resize the input field
        firstDay: 1 // Start with Monday
    });

    $('#HolidayEnd').datepicker({
        constrainInput: true,   // prevent letters in the input field
        autoSize: true,         // automatically resize the input field
        firstDay: 1 // Start with Monday
    });

    $('#LeaveStart').datepicker({
        constrainInput: true,   // prevent letters in the input field
        minDate: new Date(),    // prevent selection of date older than today
        autoSize: true,         // automatically resize the input field
        firstDay: 1 // Start with Monday
    });

    $('#LeaveEnd').datepicker({
        constrainInput: true,   // prevent letters in the input field
        minDate: new Date(),    // prevent selection of date older than today
        autoSize: true,         // automatically resize the input field
        firstDay: 1 // Start with Monday
    });

});