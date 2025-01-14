<?php
include_once("modelo/Objetos/Pessoa_class.php");
class Paciente extends Pessoa{
    private $idPaciente;
    private $dataNascimento;

    public function __construct($usuario=null, $nome, $cpf, $dataNasc){
        parent::__construct($usuario, $nome, $cpf);
        $this->dataNascimento = $dataNasc;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    public function getIdPaciente(){
        return $this->idPaciente;
    }

    public function setIdPaciente($idPaciente){
        $this->idPaciente = $idPaciente;
        return $this;
    }
}