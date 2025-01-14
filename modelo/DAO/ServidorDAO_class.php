<?php
	include_once("modelo/ConnectionFactory_class.php");
	include_once("modelo/Objetos/Servidor_class.php"); 
	
	class ServidorDAO{
	
		public $con = null; 
		
		public function __construct(){
			$conF = new ConnectionFactory();
			$this->con = $conF->getConnection();
		}
        
		public function cadastrar($servidor){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO servidor(cpf, nome, tipoServidor, idUsuario)
					VALUES (:cpf, :nome, :tipoServidor, :idUsuario)");
					$stmt->bindValue(":cpf", $servidor->getCpf());
					$stmt->bindValue(":nome", $servidor->getNome());
					$stmt->bindValue(":tipoServidor", $servidor->getTipoServidor());
					$stmt->bindValue(":idUsuario", $servidor->getUsuario()->getIdUsuario());
					
					$stmt->execute(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}

		public function getServidorByUserId($id){
            try{
                $dados = $this->con->query("SELECT * FROM servidor WHERE idUsuario = " . $id);

                foreach($dados as $linha){
                    $s = new Servidor(null, $linha["nome"], $linha["cpf"], $linha["tipoServidor"]);
                    $s->setIdServidor($linha["idServidor"]);
					return $s;
                }

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }

		public function getServidor($id){
            try{
                $dados = $this->con->query("SELECT * FROM servidor WHERE idServidor = " . $id);

                $lista = array();

                foreach($dados as $linha){
                    $s = new Servidor(null, $linha["nome"], $linha["cpf"], $linha["tipoServidor"]);
                    $s->setIdServidor($linha["idServidor"]);
					return $s;
                }

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }
    }
?>