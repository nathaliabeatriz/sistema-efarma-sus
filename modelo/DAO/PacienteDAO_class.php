<?php
	include_once("modelo/ConnectionFactory_class.php");
	include_once("modelo/Objetos/Paciente_class.php"); 
	
	class PacienteDAO{
	
		public $con = null; 
		
		public function __construct(){
			$conF = new ConnectionFactory();
			$this->con = $conF->getConnection();
		}
        
		public function cadastrar($paciente){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO paciente(cpf, nome, dataNascimento, idUsuario)
					VALUES (:cpf, :nome, :dataNascimento, :idUsuario)");
					$stmt->bindValue(":cpf", $paciente->getCpf());
					$stmt->bindValue(":nome", $paciente->getNome());
					$stmt->bindValue(":dataNascimento", $paciente->getDataNascimento());
					$stmt->bindValue(":idUsuario", $paciente->getUsuario()->getIdUsuario());
					
					$stmt->execute(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}

		public function getPacientes($nome = null){
            try{
                if($nome == null){
                    $dados = $this->con->query("SELECT * FROM paciente");
                } else{
                    $dados = $this->con->query("SELECT * FROM paciente WHERE nome LIKE '" . $nome . "%'");
                }

                $lista = array();

                foreach($dados as $linha){
                    $p = new Paciente(null, $linha["nome"], $linha["cpf"], $linha["dataNascimento"]);
                    $p->setIdPaciente($linha["idPaciente"]);
                    $lista[] = $p;
                }

                return $lista;

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }

		public function getPaciente($id){
            try{
                $dados = $this->con->query("SELECT * FROM paciente WHERE idPaciente = " . $id);

                $lista = array();

                foreach($dados as $linha){
                    $p = new Paciente(null, $linha["nome"], $linha["cpf"], date("d/m/Y", strtotime($linha["dataNascimento"])));
                    $p->setIdPaciente($linha["idPaciente"]);
					return $p;
                }

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }

		public function getPacienteByUserId($id){
            try{
                $dados = $this->con->query("SELECT * FROM paciente WHERE idUsuario = " . $id);

                foreach($dados as $linha){
                    $p = new Paciente(null, $linha["nome"], $linha["cpf"], $linha["dataNascimento"]);
                    $p->setIdPaciente($linha["idPaciente"]);
					return $p;
                }

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }
    }
?>