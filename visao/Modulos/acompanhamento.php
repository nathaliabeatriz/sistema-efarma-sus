<?php 
    $nomeModulo = "Acompanhamento de Solicitações";
    include_once("visao/Modulos/cabecalho.php");
?>

<h2>Solicitações</h2>
<table border="1px" class="tabela">
    <tr>
        <th>ID</th>
        <th>Paciente</th>
        <th>Medicamento</th>
        <th>Medico</th>
        <th>Estado</th>
    </tr>

    <?php
        foreach($lista as $s){
            echo "<tr>";
            echo "<td><a href='solicitacao.php?fun=acompanhar&id=" . $s->getIdSolicitacao() . "'>" . $s->getIdSolicitacao() . "</a></td>";
            echo "<td>" . $s->getPaciente()->getNome() . "</td>";
            echo "<td>" . $s->getMedicamento()->getNome() . "</td>";
            echo "<td>" . $s->getMedico()->getNome() . "</td>";
            echo "<td>" . $s->getEstadoSolicitacao() . "</td></tr>";
        }
    ?>
</table>

<?php include_once("visao/Modulos/rodape.php"); ?>