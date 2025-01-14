<?php
    class Solicitacao{
        private $idSolicitacao;
        private $paciente;
        private $medico;
        private $medicamento;
        private $estadoSolicitacao;
        private $dataSolicitacao;

        public function getIdSolicitacao(){
            return $this->idSolicitacao;
        }

        public function setIdSolicitacao($idSolicitacao){
            $this->idSolicitacao = $idSolicitacao;
            return $this;
        }
 
        public function getPaciente(){
            return $this->paciente;
        }

        public function setPaciente($paciente){
            $this->paciente = $paciente;
            return $this;
        }

        public function getMedico(){
            return $this->medico;
        }

        public function setMedico($medico){
            $this->medico = $medico;
            return $this;
        }

        public function getMedicamento(){
            return $this->medicamento;
        }

        public function setMedicamento($medicamento){
            $this->medicamento = $medicamento;
            return $this;
        }

        public function getEstadoSolicitacao(){
            return $this->estadoSolicitacao;
        }

        public function setEstadoSolicitacao($estadoSolicitacao){
            $this->estadoSolicitacao = $estadoSolicitacao;
            return $this;
        }

        public function setDataSolicitacao($dataSolicitacao){
            $this->dataSolicitacao = $dataSolicitacao;
            return $this;
        }

        public function getDataSolicitacao(){
            return $this->dataSolicitacao;
        }

        public function modificarEstado($novoEstado){
            $this->estadoSolicitacao = $novoEstado;
            //notificar paciente
        }
    }
?>