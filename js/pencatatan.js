// $('#date').daterangepicker();

// $('#date').daterangepicker({
//     "singleDatePicker": true,
//     "showDropdowns": true,
//     "locale": {
//         "format": "MMMM - YYYY",
//         "separator": " - ",
//         "applyLabel": "Apply",
//         "cancelLabel": "Cancel",
//         "fromLabel": "From",
//         "toLabel": "To",
//         "customRangeLabel": "Custom",
//         "weekLabel": "W",
//         "daysOfWeek": [
//             "Su",
//             "Mo",
//             "Tu",
//             "We",
//             "Th",
//             "Fr",
//             "Sa"
//         ],
//         "monthNames": [
//             "January",
//             "February",
//             "March",
//             "April",
//             "May",
//             "June",
//             "July",
//             "August",
//             "September",
//             "October",
//             "November",
//             "December"
//         ],
//         "firstDay": 1,
//         "minDate": '06/01/2013',
//         "maxDate": '06/30/2015',
//     },
//     // "startDate": "04/05/2022",
//     // "endDate": "04/11/2022"
// }, function(start, end, label) {
//   console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
// });

$(function () {
    $('.date-picker').datepicker(
        {
            dateFormat: "MM - yy",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            onClose: function (dateText, inst) {


                function isDonePressed() {
                    return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
                }

                if (isDonePressed()) {
                    var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, month, 1)).trigger('change');

                    $('.date-picker').focusout()//Added to remove focus from datepicker input box on selecting date
                }
            },
            beforeShow: function (input, inst) {

                inst.dpDiv.addClass('month_year_datepicker')

                if ((datestr = $(this).val()).length > 0) {
                    year = datestr.substring(datestr.length - 4, datestr.length);
                    month = datestr.substring(0, 2);
                    $(this).datepicker('option', 'defaultDate', new Date(year, month - 1, 1));
                    $(this).datepicker('setDate', new Date(year, month - 1, 1));
                    $(".ui-datepicker-calendar").hide();
                }
            }
        })
});