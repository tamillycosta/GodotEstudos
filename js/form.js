$(function () {
    $('#form-contato').on('submit', function (e) {
        e.preventDefault();

        var form = $(this);
        $.ajax({
            url: "http://localhost/Web-Page-PHP-/contatoApi.php",
            type: "POST",
            data: form.serialize(),
            success: function (response) {
                try {
                    if (response.sucesso) {
                        alert("Contato enviado com sucesso!");
                    } else if (response.erro) {
                        alert("Erro: " + response.erro);
                    }
                } catch (error) {
                    console.error("Erro ao analisar resposta JSON:", error);
                    alert("Erro ao processar a resposta do servidor.");
                }
            },
            error: function () {
                alert("Erro ao fazer a requisição AJAX.");
            }
        });
    });



    $('#form-email').on('submit', function (e){
        e.preventDefault();

        var form = $(this);
        $.ajax({
            url: "http://localhost/Web-Page-PHP-/emailApi.php",
            type: "POST",
            data: form.serialize(),
            
            success: function (response) {
                try {
                    if (response.sucesso) {
                        alert("Contato enviado com sucesso!");
                    } else if (response.erro) {
                        alert("Erro: " + response.erro);
                    }
                } catch (error) {
                    console.error("Erro ao analisar resposta JSON:", error);
                    alert("Erro ao processar a resposta do servidor.");
                }
            },
            error: function () {
                alert("Erro ao fazer a requisição AJAX.");
            }
        });
    });
    
});