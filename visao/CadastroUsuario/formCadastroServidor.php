<?php include_once("visao/CadastroUsuario/cabecalho.php")?>
<p>Preencha seus dados!</p>
<form id="formCad" class="formCad" action="usuario.php?fun=cadastrar&action=enviar&tipo=servidor" method="POST">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
    </div>
    <div>
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" required>
    </div>
    <div>
        <p>Tipo de servidor:</p>
        <label class="labelRadio"><input type="radio" name="tipoServidor" value="Municipal" required>Municipal</label>
        <label class="labelRadio"><input type="radio" name="tipoServidor" value="CEAF" required>CEAF</label>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
    </div>
    <div>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
    </div>
    <input class="btn" type="submit" name="enviar" value="Enviar">
    
</form>
<?php include_once("visao/CadastroUsuario/rodape.php")?>