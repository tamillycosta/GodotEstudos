$(function(){
    function checkWindowSize() {
        var windowSize = $(window).width();
        
        if (windowSize > 1380) {  // Desktop
            $('.bars').off('click').on('click', function() {
                var listaMenu = $('.side-menu');
                var header = $('.nav-adm');
                var mainContainer = $('.main-container');    

                if (listaMenu.is(':visible')) {
                    listaMenu.animate({ width: '0' }, 500, function() {
                        $(this).css('display','none');
                    });
                    header.animate({ width: '100%' }, 470);
                    mainContainer.animate({ width: '100%', marginLeft: 0 }, 500);
                   
                } else {
                    listaMenu.show().animate({ width: '15%' }, 500);
                    header.animate({ width: '85%' , marginLeft: '15%'}, 490);
                    mainContainer.animate({ width: '75%', marginLeft: '20%' }, 470);
                }
            });
        } else {  // Mobile
            $('.bars').off('click').on('click', function() {
                $('.side-menu-mobile ul').slideToggle();
                $('.bars i').toggleClass('fa-bars fa-xmark');
            });
        }
    }

    checkWindowSize();

    $(window).resize(function() {
        checkWindowSize();
    });
});
