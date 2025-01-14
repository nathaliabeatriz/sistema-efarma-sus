<?php
class Usuario{
    private $idUsuario;
    private $email;
    private $tipoUsuario;
    private $senha;

    public function __construct($email=null, $senha=null, $tipoUsuario=null){
        $this->email = $email;    
        $this->senha = $senha;    
        $this->tipoUsuario = $tipoUsuario;    
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getTipoUsuario(){
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
        return $this;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
        return $this;
    }

    public function __toString(){
        return "ID: {$this->idUsuario}, Tipo: {$this->tipoUsuario}, E-mail: {$this->email}, Senha: {$this->senha}";
    }
}