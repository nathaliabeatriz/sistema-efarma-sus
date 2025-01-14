<?php
	include_once("modelo/ConnectionFactory_class.php");
	include_once("modelo/Objetos/Solicitacao_class.php"); 
    include_once("modelo/DAO/PacienteDAO_class.php");
    include_once("modelo/DAO/MedicoDAO_class.php");
    include_once("modelo/DAO/MedicamentoDAO_class.php");
	
	class SolicitacaoDAO{
	
		public $con = null; 
		
		public function __construct(){
			$conF = new ConnectionFactory();
			$this->con = $conF->getConnection();
		}
        
		public function cadastrar($solicitacao){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO solicitacao(idPaciente, idMedico, idMedicamento, estadoSolicitacao, dataSolicitacao)
					VALUES (:idPaciente, :idMedico, :idMedicamento, :estadoSolicitacao, :dataSolicitacao)");
					$stmt->bindValue(":idPaciente", $solicitacao->getPaciente()->getIdPaciente());
					$stmt->bindValue(":idMedico", $solicitacao->getMedico()->getIdMedico());
					$stmt->bindValue(":idMedicamento", $solicitacao->getMedicamento()->getIdMed());
					$stmt->bindValue(":estadoSolicitacao", $solicitacao->getEstadoSolicitacao());
					$stmt->bindValue(":dataSolicitacao", $solicitacao->getDataSolicitacao());
					
					$stmt->execute(); 
                    return $this->con->lastInsertId();
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}

        public function getSolicitacao($id){
            try{
                $dados = $this->con->query("SELECT * FROM solicitacao WHERE idSolicitacao = " . $id);

                $pDao = new PacienteDAO();
                $medicoDao = new MedicoDAO();
                $medicamentoDao = new MedicamentoDAO();
                foreach($dados as $linha){
                    $s = new Solicitacao();
                    $s->setPaciente($pDao->getPaciente($linha["idPaciente"]));
                    $s->setMedicamento($medicamentoDao->getMedicamento($linha["idMedicamento"]));
                    $s->setMedico($medicoDao->getMedico($linha["idMedico"]));
                    $s->setIdSolicitacao($linha["idSolicitacao"]);
                    $s->setEstadoSolicitacao($linha["estadoSolicitacao"]);
                    $s->setDataSolicitacao(date("d/m/Y", strtotime($linha["dataSolicitacao"])));
					return $s;
                }

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }

        public function getSolicitacoes($tipo, $id = null){
            try{
                if($tipo == "Municipal"){
                    $dados = $this->con->query("SELECT * FROM solicitacao WHERE estadoSolicitacao = 'Aguardando deferimento' order by dataSolicitacao");
                } elseif($tipo == "CEAF"){
                    $dados = $this->con->query("SELECT * FROM solicitacao WHERE estadoSolicitacao = 'Aguardando análise CEAF' order by dataSolicitacao");
                } elseif($tipo == "paciente"){
                    $dados = $this->con->query("SELECT * FROM solicitacao WHERE idPaciente = " . $id);
                } elseif($tipo == "medico"){
                    $dados = $this->con->query("SELECT * FROM solicitacao WHERE idMedico = " . $id);
                }

                $lista = array();
                $pDao = new PacienteDAO();
                $medicoDao = new MedicoDAO();
                $medicamentoDao = new MedicamentoDAO();
                foreach($dados as $linha){
                    $s = new Solicitacao();
                    $s->setPaciente($pDao->getPaciente($linha["idPaciente"]));
                    $s->setMedicamento($medicamentoDao->getMedicamento($linha["idMedicamento"]));
                    $s->setMedico($medicoDao->getMedico($linha["idMedico"]));
                    $s->setIdSolicitacao($linha["idSolicitacao"]);
                    $s->setEstadoSolicitacao($linha["estadoSolicitacao"]);
                    $s->setDataSolicitacao(date("d/m/Y", strtotime($linha["dataSolicitacao"])));
					$lista[] = $s;
                }

                return $lista;

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }

		public function alterar($solicitacao){
			try{
				$stmt = $this->con->prepare(
					"UPDATE solicitacao SET estadoSolicitacao=:estadoSolicitacao WHERE idSolicitacao=:idSolicitacao");
					
					$stmt->bindValue(":estadoSolicitacao", $solicitacao->getEstadoSolicitacao());
					$stmt->bindValue(":idSolicitacao", $solicitacao->getIdSolicitacao());
					
					$this->con->beginTransaction();
					$stmt->execute(); 
					$this->con->commit(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
    }
?>