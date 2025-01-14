
$(document).ready(function() {
    $('#formLogin').on("submit", function(e) {
        e.preventDefault();
        const email = $('#email').val().trim();
        const senha = $('#senha').val().trim();
        const form = this

        $.ajax({
            url: 'usuario.php?fun=login&action=validar',
            method: 'POST',
            data: {email, senha},
            dataType: 'json',
            success: function(resposta) {
                alert(resposta.message);
                if(resposta.success) $(form).off("submit").submit();
            },
            error: function () {
                alert('Erro ao enviar os dados. Tente novamente.');
            }
        });
    })

    $('#formCad').on("submit", function(e) {
        
        e.preventDefault();
        const senha = $('#senha').val().trim();
        const email = $('#email').val().trim();
        const form = this

        $.ajax({
            url: 'usuario.php?fun=cadastrar&action=validar',
            method: 'POST',
            data: {email, senha},
            dataType: 'json',
            success: function(resposta) {
                alert(resposta.message);
                if(resposta.success) $(form).off("submit").submit();
            },
            error: function () {
                alert('Erro ao enviar os dados. Tente novamente.');
            }
        });
    })
});