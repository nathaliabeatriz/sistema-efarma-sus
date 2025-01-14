<?php 
    $nomeModulo = "Solicitação de Medicamento";
    include_once("visao/Modulos/cabecalho.php");
?>
<script>
    $(document).ready(function() {
        const msg = "<?php echo isset($status) ? $status : ''; ?>"

        if(msg != ''){
            alert(msg);
        }

        $('#buscaMed').on('input', function() {
            const termo = $(this).val();

            $.ajax({
                url: 'solicitacao.php?fun=solicitar&busca=med',
                method: 'GET',
                data: { med : termo },
                success: function(data) {
                    $('#opcoesMed').html(data);
                }
            });
        });

        $('#buscaPac').on('input', function() {
            const termo = $(this).val();

            $.ajax({
                url: 'solicitacao.php?fun=solicitar&busca=pac',
                method: 'GET',
                data: { pac : termo },
                success: function(data) {
                    $('#opcoesPac').html(data);
                }
            });
        });
    });

</script>

<h2>Solicitação de medicamento</h2>

<div id="solicitacao">
    <form action="solicitacao.php?fun=solicitar" method="POST" enctype="multipart/form-data">
        <div>
            <p>Digite o nome do medicamento no campo de busca abaixo e selecione o correspondente:</p>
        </div>
        <div>
            <input type="text" id="buscaMed" placeholder="Digite para buscar...">
            <select id="opcoesMed" name="opcoesMed" required>
                <option value="" disabled selected>Selecionar</option>
            </select>
        </div>
        <div>
            <p>Digite o nome do paciente no campo de busca abaixo e selecione o correspondente:</p>
        </div>
        <div>
            <input type="text" id="buscaPac" placeholder="Digite para buscar...">
            <select id="opcoesPac" name="opcoesPac" required>
                <option value="" disabled selected>Selecionar</option>
            </select>
        </div>
        <div>
            <p>Faça o download do requerimento <b><a href="arquivos/download/modelo.pdf" target="_blank">aqui</a></b>, preencha-o e envie no campo especificado:</p>
        </div>
        <div>
            <label for="arquivo">Selecione um arquivo para upload:</label>
            <input type="file" name="arquivo" id="arquivo" required>
        </div>
        <input type="submit" name="solicitar" value="Solicitar">
    </form>
</div>

<?php include_once("visao/Modulos/rodape.php"); ?>