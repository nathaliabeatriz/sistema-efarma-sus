<?php
	include_once("modelo/ConnectionFactory_class.php");
	include_once("modelo/Objetos/Medicamento_class.php"); 
	
	class MedicamentoDAO{
	
		public $con = null; 
		
		public function __construct(){
			$conF = new ConnectionFactory();
			$this->con = $conF->getConnection();
		}
        
		public function cadastrar($medicamento){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO medicamento(nome, numRegistro, indicacao, forma)
					VALUES (:nome, :numRegistro, :indicacao, :forma)");
					$stmt->bindValue(":nome", $medicamento->getNome());
					$stmt->bindValue(":numRegistro", $medicamento->getNumRegistro());
					$stmt->bindValue(":indicacao", $medicamento->getIndicacao());
					$stmt->bindValue(":forma", $medicamento->getForma());
					
					$stmt->execute(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}

        public function getMedicamentos($nome = null){
            try{
                if($nome == null){
                    $dados = $this->con->query("SELECT * FROM medicamento");
                } else{
                    $dados = $this->con->query("SELECT * FROM medicamento WHERE nome LIKE '" . $nome . "%'");
                }

                $lista = array();

                foreach($dados as $linha){
                    $m = new Medicamento($linha["nome"], $linha["numRegistro"], $linha["indicacao"], $linha["forma"]);
                    $m->setIdMed($linha["idMed"]);
                    $lista[] = $m;
                }

                return $lista;

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }

		public function getMedicamento($id){
            try{
                $dados = $this->con->query("SELECT * FROM medicamento WHERE idMed = " . $id);

                foreach($dados as $linha){
                    $m = new Medicamento($linha["nome"], $linha["numRegistro"], $linha["indicacao"], $linha["forma"]);
                    $m->setIdMed($linha["idMed"]);
					return $m;
                }

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }
    }
?>