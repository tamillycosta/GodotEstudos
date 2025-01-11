$(function(){

    var slideAtual = 0;
    var delay = 3;
    var maxSlide = $('.banner-sigle').length - 1;
   
    initSlider();
    
    changeSlide();

    function initSlider(){
        $('.banner-sigle').hide();
        $('.banner-sigle').eq(0).show();
        for(i = 0; i < maxSlide+1; i++){
            var content = $('.flip-menu').html();
            if(i == 0){
                content += '<span class="active-slide"></span>';
            }
           else{
            content += '<span></span>';
           }
            $('.flip-menu').html(content);
        }
    }
    
    function changeSpan(slideAtual){
        $('body').on('click', '.flip-menu span',function(){
            var spanAtual = $(this);
            $('.banner-sigle').eq(slideAtual).stop().fadeOut(2000);
            slideAtual = spanAtual.index();
            $('.flip-menu span').removeClass('active-slide');
            spanAtual.addClass('active-slide');

            $('.banner-sigle').eq(spanAtual.index()).stop().fadeIn(2000);
        }
)}

    function changeSlide(){
        setInterval(function(){
        $('.banner-sigle').eq(slideAtual).stop().fadeOut(2000);
        slideAtual ++
        if(slideAtual > maxSlide){
            slideAtual = 0;
        }    
        $('.banner-sigle').eq(slideAtual).stop().fadeIn(2000);
         //mudando o flip-menu de acordo com o slide atual
         $('.flip-menu span').removeClass('active-slide');
         $('.flip-menu span').eq(slideAtual).addClass('active-slide');
        },delay * 1000);
       changeSpan(slideAtual);
}

});