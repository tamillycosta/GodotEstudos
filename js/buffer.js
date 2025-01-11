$(function() {
    var hasAnimated = false; // Flag para garantir que a animação ocorra apenas uma vez

    // Esconde os elementos visualmente, mas mantém a altura com `visibility: hidden`
    $('.box-especialidade').css('visibility', 'hidden');

    $(window).on('scroll', function() {
        $('.especialidades').each(function() {
            var sectionTop = $(this).offset().top;
            var scrollTop = $(window).scrollTop();
            var windowHeight = $(window).height();

            if (!hasAnimated && scrollTop + windowHeight >= sectionTop + 50) {
                hasAnimated = true; // Marca como já animado
                EspecialidadesAnimate();
            }
        });
    });

    function EspecialidadesAnimate() {
        $('.box-especialidade').each(function(index) {
         
            $(this).delay(index * 1000).queue(function(next) {
                $(this).css('visibility', 'visible').hide().fadeIn(1000); // Mostra o elemento com fade
                next();
            });
        });
    }
});
