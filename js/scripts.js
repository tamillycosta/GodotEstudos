
$(function(){
    $(document).ready(function() {
        // Alternativa para botões móveis e abre menu do responsivo 
        $('.botao-mobile').on('click', function() {
            var listaMenu = $('nav.mobile ul');
            var icone = $('.botao-mobile i'); 
    
            listaMenu.slideToggle('open'); 
            icone.toggleClass('fa-bars fa-xmark');
        });

        
        // faz rolagem de tela dos elementos servico e depoimento 
            $('div.elemento').each(function() {
                var targetId = $(this).data('target'); 
                if ($('#' + targetId).length > 0) {
                    var targetElement = $('#' + targetId);
                    var divScroll = $(targetElement).offset().top;
                    $('html,body').animate({'scrollTop':divScroll-20},   2000);
                   
                } 
            });
    });
        
});




