<?php
    class Medicamento{
        private $idMed;
        private $nome;
        private $numRegistro;
        private $indicacao;
        private $forma;

        public function __construct($nome, $numRegistro, $indicacao, $forma){
            $this->nome = $nome;
            $this->numRegistro = $numRegistro;
            $this->indicacao = $indicacao;
            $this->forma = $forma;
        }
        
        public function getIdMed(){
            return $this->idMed;
        }

        public function setIdMed($idMed){
            $this->idMed = $idMed;
            return $this;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
            return $this;
        }

        public function getNumRegistro(){
            return $this->numRegistro;
        }

        public function setNumRegistro($numRegistro){
            $this->numRegistro = $numRegistro;
            return $this;
        }

        public function getIndicacao(){
            return $this->indicacao;
        }

        public function setIndicacao($indicacao){
            $this->indicacao = $indicacao;
            return $this;
        }

        public function getForma(){
            return $this->forma;
        }

        public function setForma($forma){
            $this->forma = $forma;
            return $this;
        }
    }
?>