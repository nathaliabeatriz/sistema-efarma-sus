<?php
	if(isset($_GET["fun"])){
		$fun = $_GET["fun"];
	
		if($fun == "cadastrar"){
			include_once("controle/ProtectAccess_class.php");
			$access = new ProtectAccess("servidor");
			if($access){
				include_once("controle/CadastrarMedicamento_class.php");
            	$pag = new CadastrarMedicamento();
			}
        }
    }
?>
