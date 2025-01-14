<?php include_once("visao/CadastroUsuario/cabecalho.php")?>

<p>Escolha o tipo de usuário:</p>
<form class="formTipo" action="usuario.php?fun=cadastrar" method="POST" enctype="multipart/form-data">

    <div class="tiposUsuario">
        <label>
            <input type="radio" name="tipo" value="paciente" required>
            <img src="visao/img/icons/icon_paciente.png" alt="Ícone de paciente">
            <span>Paciente</span>
        </label>
        <label>
            <input type="radio" name="tipo" value="medico" required>
            <img src="visao/img/icons/icon_medico.png" alt="Ícone de médico">
            <span>Médico</span>
        </label>
        <label>
            <input type="radio" name="tipo" value="servidor" required>
            <img src="visao/img/icons/icon_servidor.png" alt="Ícone de servidor">
            <span>Servidor</span>
        </label>
    </div>
    <input class="btn" type="submit" name="prosseguir" value="Prosseguir >>">
</form>

<script>
    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.checked = false;
    });
</script>

<?php include_once("rodape.php")?>