$(document).ready(function(){

    $(".filter-button").click(function(){

        $('.btn-primary').addClass('btn-default');
        $('.btn-primary').removeClass('btn-primary');

        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            $('.filter').show('1000');

            $(this).removeClass('btn-default');
            $(this).addClass('btn-primary');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');

            $(this).removeClass('btn-default');
            $(this).addClass('btn-primary');
        }
    });

});