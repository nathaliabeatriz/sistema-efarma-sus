<?php
    include_once("modelo/DAO/SolicitacaoDAO_class.php");
    include_once("modelo/DAO/RequerimentoDAO_class.php");
    include_once("modelo/DAO/ServidorDAO_class.php");
    include_once("modelo/DAO/AnaliseDAO_class.php");
    include_once("modelo/Objetos/Analise_class.php");
    include_once("modelo/Objetos/Solicitacao_class.php");

    class AnalisarSolicitacao{
        public function __construct($id){
            if(isset($_POST['enviar'])){
                $aDao = new AnaliseDAO();
                $sDao = new SolicitacaoDAO();
                $servDao = new ServidorDAO();
                $a = new Analise();
                $s = $sDao->getSolicitacao($id);
                $a->setSolicitacao($s);
                $a->setAnalisador($servDao->getServidorByUserId($_SESSION['id']));
                $a->setDataAnalise(date("Y-m-d"));
                $a->setEstadoAnterior($sDao->getSolicitacao($id)->getEstadoSolicitacao());
                if($_POST['estados'] == "Indeferida") $a->setNovoEstado($_POST['estados']);
                else{
                    $serv = $servDao->getServidorByUserId($_SESSION['id']);
                    if($serv->getTipoServidor() == "Municipal"){
                        $a->setNovoEstado("Aguardando análise CEAF");
                    } elseif($serv->getTipoServidor() == "CEAF"){
                        $a->setNovoEstado("Deferida");
                    }
                }
                if($_POST['comentario'] == null) $a->setComentarios("Sem comentários");
                else $a->setComentarios($_POST['comentario']);

                $aDao->cadastrar($a);
                $s->modificarEstado($a->getNovoEstado());
                $sDao->alterar($s);
                header("Location: solicitacao.php?fun=listar&tipo=analisar");
            } 
            else{
                $sDao = new SolicitacaoDAO();
                $s = $sDao->getSolicitacao($id);
                $rDao = new RequerimentoDAO();
                $r = $rDao->getRequerimentoBySolicitacaoId($id);
                
                include_once("visao/Modulos/analisarSolicitacao.php");
            }
        }
    }
?>