<?php
    include_once("modelo/Objetos/Medicamento_class.php");
    include_once("modelo/DAO/MedicamentoDAO_class.php");

    class CadastrarMedicamento{
        public function __construct(){
            if(isset($_POST["cadastrar"])){
                $m = new Medicamento($_POST["nome"], $_POST["num"], $_POST["indicacao"], $_POST["forma"]);
                $dao = new MedicamentoDAO();
                $dao->cadastrar($m);
                
                $status = "Medicamento cadastrado!";
                include_once("visao/Modulos/cadastroMedicamento.php");
                
            } else{
                include_once("visao/Modulos/cadastroMedicamento.php");
            }
        }
    }
?>