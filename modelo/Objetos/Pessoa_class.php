<?php
include_once("Usuario_class.php");

abstract class Pessoa{
    private $cpf;
    private $nome;
    private $usuario;

    public function __construct($usuario=null, $nome, $cpf){
        $this->usuario = $usuario;
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
        return $this;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
        return $this;
    }
}