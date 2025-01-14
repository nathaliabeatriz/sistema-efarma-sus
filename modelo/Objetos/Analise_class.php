<?php
    class Analise{
        private $idAnalise;
        private $solicitacao;
        private $analisador;
        private $dataAnalise;
        private $estadoAnterior;
        private $novoEstado;
        private $comentarios;

        public function getIdAnalise(){
            return $this->idAnalise;
        }

        public function setIdAnalise($idAnalise){
            $this->idAnalise = $idAnalise;
            return $this;
        }

        public function getSolicitacao(){
            return $this->solicitacao;
        }

        public function setSolicitacao($solicitacao){
            $this->solicitacao = $solicitacao;
            return $this;
        }

        public function getAnalisador(){
            return $this->analisador;
        }

        public function setAnalisador($analisador){
            $this->analisador = $analisador;
            return $this;
        }

        public function getDataAnalise(){
            return $this->dataAnalise;
        }

        public function setDataAnalise($dataAnalise){
            $this->dataAnalise = $dataAnalise;
            return $this;
        }

        public function getEstadoAnterior(){
            return $this->estadoAnterior;
        }

        public function setEstadoAnterior($estadoAnterior){
            $this->estadoAnterior = $estadoAnterior;
            return $this;
        }

        public function getNovoEstado(){
            return $this->novoEstado;
        }

        public function setNovoEstado($novoEstado){
            $this->novoEstado = $novoEstado;
            return $this;
        }

        public function getComentarios(){
            return $this->comentarios;
        }

        public function setComentarios($comentarios){
            $this->comentarios = $comentarios;
            return $this;
        }
    }
?>