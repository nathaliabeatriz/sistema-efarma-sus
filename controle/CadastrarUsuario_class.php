<?php
    include_once("modelo/Objetos/Usuario_class.php");
    include_once("modelo/DAO/UsuarioDAO_class.php");

    class CadastrarUsuario{
        public function __construct($tipo = null){
            if(isset($_POST["prosseguir"])){
                $tipoUser = $_POST["tipo"];
               
                if($tipoUser == "paciente"){
                    include_once("visao/CadastroUsuario/formCadastroPaciente.php");
                } elseif($tipoUser == "medico"){
                    include_once("visao/CadastroUsuario/formCadastroMedico.php");
                } elseif($tipoUser == "servidor"){
                    include_once("visao/CadastroUsuario/formCadastroServidor.php");
                }
               
            } elseif(isset($_GET['action']) && $_GET['action'] == "validar"){
                $u = new Usuario($_POST["email"], $_POST["senha"], $tipo);
                $uDao = new UsuarioDAO();

                $verif = $uDao->usuarioExistente($u);

                if ($verif == true) {
                    echo json_encode(['success' => false, 'message' => 'Esse email já foi cadastrado!']);
                } else {
                    echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso! Agora realize seu login!']);
                }
            } 
            
            elseif(isset($_GET['action']) && $_GET['action'] == "enviar" && $tipo != null){
                $u = new Usuario($_POST["email"], $_POST["senha"], $tipo);
                $uDao = new UsuarioDAO();

                $userId = $uDao->cadastrar($u);
                $u->setIdUsuario($userId);

                if($tipo == "paciente"){
                    include_once("modelo/Objetos/Paciente_class.php");
                    include_once("modelo/DAO/PacienteDAO_class.php");
                    $p = new Paciente($u, $_POST["nome"], $_POST["cpf"], $_POST["dataNasc"]);
                    $pDao = new PacienteDAO();
                    $pDao->cadastrar($p);
                }
                elseif($tipo == "medico"){
                    include_once("modelo/Objetos/Medico_class.php");
                    include_once("modelo/DAO/MedicoDAO_class.php");
                    $m = new Medico($u, $_POST["nome"], $_POST["cpf"], $_POST["crm"], $_POST["espec"]);
                    $mDao = new MedicoDAO();
                    $mDao->cadastrar($m);
                }
                elseif($tipo == "servidor"){
                    include_once("modelo/Objetos/Servidor_class.php");
                    include_once("modelo/DAO/ServidorDAO_class.php");
                    $s = new Servidor($u, $_POST["nome"], $_POST["cpf"], $_POST["tipoServidor"]);
                    $sDao = new ServidorDAO();
                    $sDao->cadastrar($s);
                }

                header("Location: index.php");
            }
            else{
                include_once("visao/CadastroUsuario/formTipoUsuario.php");
            }
        }
    }
?>