<?php include_once("visao/CadastroUsuario/cabecalho.php")?>
<p>Preencha seus dados!</p>
<form id="formCad" class="formCad" action="usuario.php?fun=cadastrar&action=enviar&tipo=medico" method="POST">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome" required>
    </div>
    <div>
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" required>
    </div>
    <div>
        <label for="crm">CRM:</label>
        <input type="text" id="crm" name="crm" placeholder="Digite o CRM" required>
    </div>
    <div>
        <label for="espec">Especialidade:</label>
        <input type="text" id="espec" name="espec" placeholder="Digite a especialidade" required>
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