<?php
	if(isset($_GET["fun"])){
		$fun = $_GET["fun"];
	
		if($fun == "cadastrar"){
			include_once("controle/CadastrarUsuario_class.php");
			if(isset($_GET["tipo"])){
				$tipo = $_GET["tipo"];
				$pag = new CadastrarUsuario($tipo);
			}
            else $pag = new CadastrarUsuario();

        } elseif($fun == "login"){
			include_once("controle/LoginUsuario_class.php");
			$pag = new LoginUsuario();

		} elseif($fun == "logout"){
			include_once("controle/LogoutUsuario_class.php");
			$pag = new LogoutUsuario();

		} elseif($fun == "access"){
			include_once("controle/ProtectAccess_class.php");
			$pag = new ProtectAccess();
			if($pag){
				include_once("visao/paginaInicial.php");
			}
		}
    }
	else {
		include_once("index.php");		
    }
?>
