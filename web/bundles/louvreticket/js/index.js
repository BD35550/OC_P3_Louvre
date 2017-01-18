$(document).ready(function() {

    $('.datepicker').datepicker({
        inline: true,
        dateFormat: 'dd/mm/yy',
        numberOfMonths: 1,
        onChangeMonthYear: function () {
            $('.datepicker').attr('disabled', 'disabled');
        },
        onClose: function () {
            $('.datepicker').removeAttr('disabled');
        }
    });

    $(".ticketNumber").TouchSpin({
        verticalbuttons: true,
        verticalupclass: 'glyphicon glyphicon-plus',
        verticaldownclass: 'glyphicon glyphicon-minus',
        min: 1,
        max: 25
    });

    $('[checked="checked"]').parent().addClass('active');
    $('.radio-inline').button();
});

