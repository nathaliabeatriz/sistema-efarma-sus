<?php 
    $nomeModulo = "Análise de Solicitações";
    include_once("visao/Modulos/cabecalho.php");
?>

<h2>Análise de solicitação</h2>
<form action="solicitacao.php?fun=analisar&id=<?php echo $s->getIdSolicitacao() ?>" method="POST">
    <div>
        <ul>
            <li>Paciente: <b><?php echo $s->getPaciente()->getNome() ?></b></li>
            <li>Médico Solicitante: <b><?php echo $s->getMedico()->getNome() ?></b></li>
            <li>Medicamento: <b><?php echo $s->getMedicamento()->getNome() ?></b></li>
            <li>Data da solicitação: <b><?php echo $s->getDataSolicitacao() ?></b></li>
        </ul>
    </div>
    <div>
        <p>Faça o download <b><a href="<?php echo $r->getPdfPath() ?>">deste requerimento</a></b> e modifique o estado da solicitação adicionando comentários caso seja indeferida!</p>
    </div>
    <div>
        <select name="estados" id="estados" required>
            <option value="" disabled selected>Selecionar</option>
            <option value="Deferida">Solicitação deferida</option>
            <option value="Indeferida">Solicitação indeferida</option>
        </select>
    </div>
    <div>
        <label for="comentario">Comentários</label>
        <textarea name="comentario" id="comentario"></textarea>
    </div>
    <input type="submit" name="enviar" value="Enviar">
</form>
<?php include_once("visao/Modulos/rodape.php"); ?>