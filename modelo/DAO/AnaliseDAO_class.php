<?php
	include_once("modelo/ConnectionFactory_class.php");
	include_once("modelo/Objetos/Analise_class.php"); 
    include_once("modelo/DAO/SolicitacaoDAO_class.php");
    include_once("modelo/DAO/ServidorDAO_class.php");
	
	class AnaliseDAO{
	
		public $con = null; 
		
		public function __construct(){
			$conF = new ConnectionFactory();
			$this->con = $conF->getConnection();
		}
        
		public function cadastrar($analise){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO analise(idSolicitacao, idServidor, dataAnalise, estadoAnterior, novoEstado, comentarios)
					VALUES (:idSolicitacao, :idServidor, :dataAnalise, :estadoAnterior, :novoEstado, :comentarios)");
					$stmt->bindValue(":idSolicitacao", $analise->getSolicitacao()->getIdSolicitacao());
					$stmt->bindValue(":idServidor", $analise->getAnalisador()->getIdServidor());
					$stmt->bindValue(":dataAnalise", $analise->getDataAnalise());
					$stmt->bindValue(":estadoAnterior", $analise->getEstadoAnterior());
					$stmt->bindValue(":novoEstado", $analise->getNovoEstado());
					$stmt->bindValue(":comentarios", $analise->getComentarios());
					
					$stmt->execute(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}

        public function getAnalises($id){
            try{
                $dados = $this->con->query("SELECT * FROM analise WHERE idSolicitacao = " . $id . " order by idAnalise DESC");

                $lista = array();

                $solDao = new SolicitacaoDAO();
                $servDao = new ServidorDAO();

                foreach($dados as $linha){
                    $a = new Analise();
                    $a->setIdAnalise($linha["idAnalise"]);
                    $a->setSolicitacao($solDao->getSolicitacao($linha["idSolicitacao"]));
                    $a->setAnalisador($servDao->getServidor($linha["idServidor"]));
                    $a->setDataAnalise(date("d/m/Y", strtotime($linha["dataAnalise"])));
                    $a->setEstadoAnterior($linha["estadoAnterior"]);
                    $a->setNovoEstado($linha["novoEstado"]);
                    $a->setComentarios($linha["comentarios"]);
                    $lista[] = $a;
                }

                return $lista;

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }
    }
?>