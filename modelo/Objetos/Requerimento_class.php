<?php
    class Requerimento{
        private $idRequerimento;
        private $pdfPath;
        private $solicitacao;

        public function __construct($pdfPath, $solicitacao){
            $this->pdfPath = $pdfPath;
            $this->solicitacao = $solicitacao;
        }

        public function getIdRequerimento(){
            return $this->idRequerimento;
        }

        public function setIdRequerimento($idRequerimento){
            $this->idRequerimento = $idRequerimento;
            return $this;
        }

        public function getPdfPath(){
            return $this->pdfPath;
        }

        public function setPdfPath($pdfPath){
            $this->pdfPath = $pdfPath;
            return $this;
        }
 
        public function getSolicitacao(){
            return $this->solicitacao;
        }

        public function setSolicitacao($solicitacao){
            $this->solicitacao = $solicitacao;
            return $this;
        }
    }
?>