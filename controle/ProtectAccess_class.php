<?php
    class ProtectAccess{
        public function __construct($tipoPermitido1 = null, $tipoPermitido2 = null){
            if(!isset($_SESSION)){
                session_start();
            }

            if(!isset($_SESSION['id'])){
                die("Você não pode acessar essa página pois não está logado. <p><a href=\"index.php\">Entrar</a></p>");
                return false;
            }
            elseif(($_SESSION['userType'] != $tipoPermitido1 && $_SESSION['userType'] != $tipoPermitido2) && $tipoPermitido1 != null){
                die("Você não pode acessar essa página. Tipo de usuário não permitido.<p><a href=\"usuario.php?fun=access\">Voltar para a página principal</a></p>");
                return false;
            }
            else return true;
        }
    }
?>