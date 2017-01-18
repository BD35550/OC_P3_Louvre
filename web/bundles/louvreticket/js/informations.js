$(document).ready(function() {

    function toggleTriangle(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('rotate-180');
    }
    $('#accordion').on('hide.bs.collapse', toggleTriangle);
    $('#accordion').on('show.bs.collapse', toggleTriangle);

    /*$('.datepicker2').datepicker({
        inline: true,
        dateFormat: 'dd/mm/yy',
        numberOfMonths: 1,
        onChangeMonthYear: function () {
            $('.datepicker2').attr('disabled', 'disabled');
        },
        onClose: function () {
            $('.datepicker2').removeAttr('disabled');
        }
    });*/
    $(".datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        selectOtherMonths: true,
        yearRange: '1916:2016',
        minDate: "-100y",
        maxDate: "+0y +0d",
        dateFormat: 'dd/mm/yy',
        numberOfMonths: 1,
        onChangeMonthYear: function () {
            $('.datepicker2').attr('disabled', 'disabled');
        },
        onClose: function () {
            $('.datepicker2').removeAttr('disabled');
        }
    });

});