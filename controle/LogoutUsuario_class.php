<?php
    class LogoutUsuario{
        public function __construct(){
            if(!isset($_SESSION)){
                session_start();
            }
            session_destroy();
            header("Location: index.php");
        }
    }
?>