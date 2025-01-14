<?php
$nomeModulo = "Análise de Solicitações";
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

<h2>Acompanhar solicitação</h2>
<div class="acompanhar">
    <ul>
        <li>Paciente: <b><?php echo $s->getPaciente()->getNome() ?></b></li>
        <li>Médico Solicitante: <b><?php echo $s->getMedico()->getNome() ?></b></li>
        <li>Medicamento: <b><?php echo $s->getMedicamento()->getNome() ?></b></li>
        <li>Data da solicitação: <b><?php echo $s->getDataSolicitacao() ?></b></li>
    </ul>
    <div>
        <p>Faça o download <b><a href="<?php echo $r->getPdfPath() ?>">do requerimento</a></b> da solicitação!</p>
    </div>
    <div class="historico">
        <h3>Histórico de análise da solicitação</h3></br>
        <table class="tabela">
            <tr>
                <th>Data de análise</th>
                <th>Analisador</th>
                <th>Servidor</th>
                <th>Estado da solicitação</th>
                <th>Comentários</th>
            </tr>
            <?php
            if ($s->getEstadoSolicitacao() == "Aguardando deferimento") {
                echo "<p>Aguarde até a solicitação ser analisada!</p></br>";
            }
            foreach ($lista as $a) {
                echo "<tr>";
                echo "<td>" . $a->getDataAnalise() . "</td>";
                echo "<td>" . $a->getAnalisador()->getNome() . "</td>";
                echo "<td>" . $a->getAnalisador()->getTipoServidor() . "</td>";
                echo "<td>" . $a->getNovoEstado() . "</td>";
                echo "<td>" . $a->getComentarios() . "</td></tr>";
            }
            ?>
        </table>
    </div>
    <div class="editar">
        <?php
        if ($_SESSION['userType'] == "medico" && $s->getEstadoSolicitacao() == "Indeferida") {
            echo "<form action = 'solicitacao.php?fun=acompanhar&id=" . $s->getIdSolicitacao() . "' method = 'POST' enctype='multipart/form-data'>";
            echo "<p>A solicitação está indeferida, reenvie o requerimento no campo abaixo seguindo as modificações solicitadas! </p>";
            echo "<div>
                        <label for='arquivo'>Selecione um arquivo para upload:</label>
                        <input type='file' name='arquivo' id='arquivo' required></div>";
            echo "<input type='submit' name='reenviar' value='Reenviar'></form>";
        } else if($_SESSION['userType'] == "paciente" && $s->getEstadoSolicitacao() == "Indeferida"){
            echo "<p>A solicitação do medicamento foi indeferida. Procure o médico solicitante para realizar a edição do requerimento.</p>";
        }
        ?>
    </div>
</div>

<?php include_once("visao/Modulos/rodape.php"); ?>