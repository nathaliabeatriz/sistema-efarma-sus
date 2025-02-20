<?php
	if(isset($_GET["fun"])){
		include_once("controle/ProtectAccess_class.php");
		$fun = $_GET["fun"];
	
		if($fun == "solicitar"){
			$access = new ProtectAccess("medico");
			if($access){
				include_once("controle/CadastrarSolicitacao_class.php");
            	$pag = new CadastrarSolicitacao();
			}
        }
		if($fun == "listar"){
			$access = new ProtectAccess();
			if($access){
				include_once("controle/ListarSolicitacao_class.php");
				if(isset($_GET["tipo"])){
					$tipo = $_GET["tipo"];
					$pag = new ListarSolicitacao($tipo);
				}
            	else $pag = new ListarSolicitacao();
			}
		}
		if($fun == "analisar"){
			$access = new ProtectAccess("servidor");
			if($access){
				include_once("controle/AnalisarSolicitacao_class.php");
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					$pag = new AnalisarSolicitacao($id);
				}
			}
		}
		if($fun == "acompanhar"){
			$access = new ProtectAccess("paciente", "medico");
			if($access){
				include_once("controle/AcompanharSolicitacao_class.php");
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					$pag = new AcompanharSolicitacao($id);
				}
			}
		}
    }
?>
