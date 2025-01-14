<?php
include_once("modelo/Objetos/Pessoa_class.php");
class Servidor extends Pessoa{
    private $idServidor;
    private $tipoServidor;
    
    public function __construct($usuario=null, $nome, $cpf, $tipo){
        parent::__construct($usuario, $nome, $cpf);
        $this->tipoServidor = $tipo;
    }

    public function getTipoServidor(){
        return $this->tipoServidor;
    }
 
    public function setTipoServidor($tipoServidor){
        $this->tipoServidor = $tipoServidor;
        return $this;
    }

    public function getIdServidor(){
        return $this->idServidor;
    }

    public function setIdServidor($idServidor){
        $this->idServidor = $idServidor;
        return $this;
    }
}