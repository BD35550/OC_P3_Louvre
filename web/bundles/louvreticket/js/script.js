$(document).ready(function(){
    $('.checkbox-help').on('click', function () {
        if($(this).prop("checked")){
            var nb = $(this).data('help-number');
            $("#help-"+nb).removeClass("hide");
        }
        else {
            var nb = $(this).data('help-number');
            $("#help-"+nb).addClass("hide");
        }
    })
});

