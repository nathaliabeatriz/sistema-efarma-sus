<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['id'])){
        header("Location: usuario.php?fun=access");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="visao/css/style-login-cad.css">
    <script src="visao/script/jquery-3.7.1.js"></script>
</head>
<body class="index">
    <script src="visao/script/validacao.js"></script>
    <div class="background">
        <div class="geral">
            <img src="visao/img/logo/logo.png" alt="Logo do software e-Farma SUS">
            <div>
                <p>Seja bem-vindo(a) ao sistema e-Farma SUS! Prossiga realizando seu login e, caso não possua uma conta, realize seu cadastro.</p>
            </div>
                <form id="formLogin" action="usuario.php?fun=login&action=acessar" method="POST">
                    <div>
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>
                    </div>
                    <div>
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                    </div>
                    <div class="btns">
                        <input class="btn login" id="login" type="submit" name="entrar" value="Entrar">
                        <a class="btn cadastrar" href="usuario.php?fun=cadastrar">Cadastrar</a>
                    </div>
                </form>
        </div>
    </div>
</body>
</html>