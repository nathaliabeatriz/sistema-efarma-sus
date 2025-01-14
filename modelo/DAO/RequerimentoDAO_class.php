<?php
	include_once("modelo/ConnectionFactory_class.php");
	include_once("modelo/Objetos/Requerimento_class.php"); 
	
	class RequerimentoDAO{
	
		public $con = null; 
		
		public function __construct(){
			$conF = new ConnectionFactory();
			$this->con = $conF->getConnection();
		}
        
		public function cadastrar($requerimento){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO requerimento(pdfPath, idSolicitacao)
					VALUES (:pdfPath, :idSolicitacao)");
					$stmt->bindValue(":pdfPath", $requerimento->getPdfPath());
					$stmt->bindValue(":idSolicitacao", $requerimento->getSolicitacao()->getIdSolicitacao());
					
					$stmt->execute(); 
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}

        public function getRequerimentoBySolicitacaoId($id){
            try{
                $dados = $this->con->query("SELECT * FROM requerimento WHERE idSolicitacao = " . $id . " order by idRequerimento DESC LIMIT 1");

                foreach($dados as $linha){
                    $r = new Requerimento($linha["pdfPath"], $linha["idSolicitacao"]);
                    $r->setIdRequerimento($linha["idRequerimento"]);
					return $r;
                }

            } catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }
    }
?>