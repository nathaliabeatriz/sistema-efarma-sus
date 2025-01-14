<?php
    include_once("modelo/DAO/SolicitacaoDAO_class.php");
    include_once("modelo/DAO/RequerimentoDAO_class.php");
    include_once("modelo/DAO/ServidorDAO_class.php");
    include_once("modelo/DAO/AnaliseDAO_class.php");
    include_once("modelo/Objetos/Analise_class.php");
    include_once("modelo/Objetos/Solicitacao_class.php");
    include_once("modelo/Objetos/Requerimento_class.php");
    include_once("controle/FazerUpload_class.php");

    class AcompanharSolicitacao{
        public function __construct($id){
            if(isset($_POST['reenviar'])){
                $upload = new FazerUpload();
                $pdfPath = $upload->getPdfPath();
                $sDao = new SolicitacaoDAO();
                $s = $sDao->getSolicitacao($id);

                $r = new Requerimento($pdfPath, $s);
                $rDao = new RequerimentoDAO();
                $rDao->cadastrar($r);

                $s->setEstadoSolicitacao("Aguardando deferimento");
                $s->setDataSolicitacao(date("Y-m-d"));
                $sDao->alterar($s);

                $aDao = new AnaliseDAO();
                $lista = $aDao->getAnalises($id);

                $status = "Requerimento reenviado! Aguarde nova análise!";
                include_once("visao/Modulos/acompanharSolicitacao.php");
            } 
            else{
                $sDao = new SolicitacaoDAO();
                $s = $sDao->getSolicitacao($id);
                $aDao = new AnaliseDAO();

                $rDao = new RequerimentoDAO();
                $r = $rDao->getRequerimentoBySolicitacaoId($id);
                
                $lista = $aDao->getAnalises($id);
                include_once("visao/Modulos/acompanharSolicitacao.php");
            }
        }
    }
?>