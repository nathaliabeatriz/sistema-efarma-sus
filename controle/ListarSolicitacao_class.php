<?php
    include_once("modelo/DAO/SolicitacaoDAO_class.php");
    include_once("modelo/DAO/ServidorDAO_class.php");
    include_once("modelo/DAO/PacienteDAO_class.php");
    include_once("modelo/DAO/MedicoDAO_class.php");
    include_once("modelo/Objetos/Solicitacao_class.php");
    class ListarSolicitacao{
        public function __construct($tipo = null){
            if($tipo == "analisar"){
                $solDao = new SolicitacaoDAO();
                $servDao = new ServidorDAO();
                $servidor = $servDao->getServidorByUserId($_SESSION['id']);
                $lista = $solDao->getSolicitacoes($servidor->getTipoServidor());
                include_once("visao/Modulos/analiseSolicitacoes.php");
            }
            elseif($tipo == "acompanhar"){
                $solDao = new SolicitacaoDAO();
                $userType = $_SESSION['userType'];
                if($userType == "paciente"){
                    $pDao = new PacienteDAO();
                    $p = $pDao->getPacienteByUserId($_SESSION['id']);
                    $id = $p->getIdPaciente();
                }
                elseif($userType == "medico"){
                    $mDao = new MedicoDAO();
                    $m = $mDao->getMedicoByUserId($_SESSION['id']);
                    $id = $m->getIdMedico();
                }
                $lista = $solDao->getSolicitacoes($userType, $id);
                include_once("visao/Modulos/acompanhamento.php");
            }
        }
    }
?>