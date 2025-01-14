<?php 
    $nomeModulo = "Análise de Solicitações";
    include_once("visao/Modulos/cabecalho.php");
?>

<h2>Solicitações pendentes de análise</h2>
<table border="1px" class="tabela">
    <tr>
        <th>ID</th>
        <th>Paciente</th>
        <th>Medicamento</th>
        <th>Data</th>
    </tr>

    <?php
        foreach($lista as $s){
            echo "<tr>";
            echo "<td><a href='solicitacao.php?fun=analisar&id=" . $s->getIdSolicitacao() . "'>" . $s->getIdSolicitacao() . "</a></td>";
            echo "<td>" . $s->getPaciente()->getNome() . "</td>";
            echo "<td>" . $s->getMedicamento()->getNome() . "</td>";
            echo "<td>" . $s->getDataSolicitacao() . "</td></tr>";
        }
    ?>
</table>

<?php include_once("visao/Modulos/rodape.php"); ?>