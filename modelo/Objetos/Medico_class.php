<?php
include_once("modelo/Objetos/Pessoa_class.php");
class Medico extends Pessoa{
    private $idMedico;
    private $crm;
    private $especialidade;

    public function __construct($usuario=null, $nome, $cpf, $crm, $esp){
        parent::__construct($usuario, $nome, $cpf);
        $this->crm = $crm;
        $this->especialidade = $esp;
    }

    public function getCrm(){
        return $this->crm;
    }

    public function setCrm($crm){
        $this->crm = $crm;
        return $this;
    }

    public function getEspecialidade(){
        return $this->especialidade;
    }

    public function setEspecialidade($especialidade){
        $this->especialidade = $especialidade;
        return $this;
    }

    public function getIdMedico(){
        return $this->idMedico;
    }

    public function setIdMedico($idMedico){
        $this->idMedico = $idMedico;
        return $this;
    }
}