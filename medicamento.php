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

        // } elseif($fun == "listar"){
			
		// 	include_once("controle/ListarCurso_class.php");
		// 	$pag = new ListarCurso();
			
		// }elseif($fun == "alterar"){
			
		// 	include_once("controle/AlterarCurso_class.php");
		// 	$pag = new AlterarCurso();
			
		// } elseif($fun == "excluir"){
			
		// 	include_once("controle/ExcluirCurso_class.php");
		// 	$pag = new ExcluirCurso();
			
		// }  elseif($fun == "exibir") {
		// 	include_once("controle/ExibirCurso_class.php");
		// 	$pag = new ExibirCurso();
			
		// } else {
		// 	include_once("controle/ListarCurso_class.php");
		// 	$pag = new ListarCurso();			
		// }
    }
	// }else {
	// 	include_once("controle/ListarCurso_class.php");
	// 	$pag = new ListarCurso();		
    // }
?>
