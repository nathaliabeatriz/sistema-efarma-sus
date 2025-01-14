<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="visao/css/style-modulos.css">
</head>
<body class="inicio">
    <header>
        <a href="index.php" class="logo"><img class="logo" src="visao/img/logo/logo.png" alt="Logo do software e-Farma SUS"></a>
        <a id="sair" href="usuario.php?fun=logout">Logout</a>
    </header>
    <h2>Módulos</h2>
    <?php
        if(isset($_SESSION['userType'])){
            $userType = $_SESSION['userType'];
            if($userType == "paciente"){
                include_once("visao/Modulos/blocos/acompanhamento.php");
            } elseif($userType == "medico"){
                include_once("visao/Modulos/blocos/solicitacao.php");
                include_once("visao/Modulos/blocos/acompanhamento.php");
            } elseif($userType == "servidor"){
                include_once("visao/Modulos/blocos/analise.php");
                include_once("visao/Modulos/blocos/cadastroMedicamento.php");
            }
        }
    ?>
</body>
</html>