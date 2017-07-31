$(function(){

    $('button').click(function(){
        $('.sidebar').toggleClass('fliph');
    });

    $('h3').first().addClass('active').next().show();

    $('h3').click(function(){
        if(!$(this).hasClass('active')){
            $('.content').slideUp('fast');
            $('h3').removeClass('active');
            $(this).addClass('active').next().slideDown('slow');
        }
    });



});


