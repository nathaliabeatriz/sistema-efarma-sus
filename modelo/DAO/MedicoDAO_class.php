<?php
	include_once("modelo/ConnectionFactory_class.php");
	include_once("modelo/Objetos/Medico_class.php"); 
	
	class MedicoDAO{
	
		public $con = null; 
		
		public function __construct(){
			$conF = new ConnectionFactory();
			$this->con = $conF->getConnection();
		}
        
		public function cadastrar($medico){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO medico(cpf, nome, crm, especialidade, idUsuario)
					VALUES (:cpf, :nome, :crm, :especialidade, :idUsuario)");
					$stmt->bindValue(":cpf", $medico->getCpf());
					$stmt->bindValue(":nome", $medico->getNome());
					$stmt->bindValue(":crm", $medico->getCrm());
					$stmt->bindValue(":especialidade", $medico->getEspecialidade());
					$stmt->bindValue(":idUsuario", $medico->getUsuario()->getIdUsuario());
					
					$stmt->execute(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}

		public function getMedicoByUserId($id){
            try{
                $dados = $this->con->query("SELECT * FROM medico WHERE idUsuario = " . $id);

                $lista = array();

                foreach($dados as $linha){
                    $m = new Medico(null, $linha["nome"], $linha["cpf"], $linha["crm"], $linha["especialidade"]);
                    $m->setIdMedico($linha["idMedico"]);
					return $m;
                }

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }

		public function getMedico($id){
            try{
                $dados = $this->con->query("SELECT * FROM medico WHERE idMedico = " . $id);

                foreach($dados as $linha){
                    $m = new Medico(null, $linha["nome"], $linha["cpf"], $linha["crm"], $linha["especialidade"]);
                    $m->setIdMedico($linha["idMedico"]);
					return $m;
                }

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }
    }
?>