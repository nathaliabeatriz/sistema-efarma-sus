<?php 
    $nomeModulo = "Cadastro de Medicamento";
    include_once("visao/Modulos/cabecalho.php");
?>

<script>
    $(document).ready(function() {
        const msg = "<?php echo isset($status) ? $status : ''; ?>"

        if(msg != ''){
            alert(msg);
        }
    });
</script>

<h2>Preencha os campos para cadastrar o medicamento:</h2>

<form action="medicamento.php?fun=cadastrar" method="POST">
    <div>
        <label for="nome">Nome do medicamento:</label>
        <input type="text" id="nome" name="nome" required>
    </div>
    <div>
        <label for="num">Número de registro:</label>
        <input type="text" id="num" name="num" required>
    </div>
    <div>
        <label for="indicacao">Indicação terapêutica:</label>
        <input type="text" id="indicacao" name="indicacao" required>
    </div>
    <div>
        <label for="forma">Forma de apresentação (comprimido, solução injetável, etc):</label>
        <input type="text" id="forma" name="forma" required>
    </div>
    <input type="submit" name="cadastrar" value="Cadastrar">
</form>

<?php include_once("visao/Modulos/rodape.php"); ?>