$(function () {
    urlAtual = window.location.href;   
    if(urlAtual == 'http://localhost/Web-Page-PHP-/'){
       urlLocal = 'http://localhost/Web-Page-PHP-/emailApi.php';
       formAtual = '#form-email';
    }else if(urlAtual == 'http://localhost/Web-Page-PHP-/Contato'){
        urlLocal = 'http://localhost/Web-Page-PHP-/contatoApi.php';
        formAtual = '#form-contato';
    }

    $(formAtual).on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        $.ajax({
            beforeSend:function(){
                $('.loader').fadeIn(2000);
            },
            url: urlLocal,
            type: "POST",
            data: form.serialize(),
           
        }).done(function(data){
           if(data.sucesso){
            $('.loader').fadeOut(2000);
            $('.alert').fadeIn(2000);
           }
          else if(data.erro){
            $('.loader').fadeOut(2000);
            $('.alert').fadeIn(2000);
          }
          $('.alert').fadeOut(2000);
           
        });
    });

    
});