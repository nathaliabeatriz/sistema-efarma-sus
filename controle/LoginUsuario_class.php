<?php
    include_once("modelo/DAO/UsuarioDAO_class.php");
    include_once("modelo/Objetos/Usuario_class.php");

    class LoginUsuario{
        public function __construct(){
            if($_GET['action'] == "validar"){
				$email = $_POST['email'];
                $senha = $_POST['senha'];

                $dao = new UsuarioDAO();
                $user = $dao->login($email, $senha);

                if ($user == null) {
                    echo json_encode(['success' => false, 'message' => 'Usuário ou senha inválidos.']);
                } else {
                    echo json_encode(['success' => true, 'message' => 'Login realizado com sucesso!']);
                }
			}
            elseif($_GET['action'] == "acessar"){
                $dao = new UsuarioDAO();
                $user = $dao->login($_POST["email"], $_POST["senha"]);
                
                if($user != null){
                    if(!isset($_SESSION)){
                        session_start();
                    }
                    $_SESSION['id'] = $user->getIdUsuario();
                    $_SESSION['userType'] = $user->getTipoUsuario();
                    header("Location: usuario.php?fun=login");
                }
                
            } else{
                header("Location: usuario.php?fun=access");
            }
        }
    }
?>