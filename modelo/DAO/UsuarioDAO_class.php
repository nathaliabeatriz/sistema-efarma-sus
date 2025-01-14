<?php
	include_once("modelo/ConnectionFactory_class.php");
	include_once("modelo/Objetos/Usuario_class.php"); 
	
	class UsuarioDAO{
	
		public $con = null; 
		
		public function __construct(){
			$conF = new ConnectionFactory();
			$this->con = $conF->getConnection();
		}
        
		public function cadastrar($usuario){
			try{
				$stmt = $this->con->prepare(
					"INSERT INTO usuario(email, senha, tipoUsuario)
					VALUES (:email, :senha, :tipoUsuario)");
					$stmt->bindValue(":email", $usuario->getEmail());
					$stmt->bindValue(":senha", $usuario->getSenha());
					$stmt->bindValue(":tipoUsuario", $usuario->getTipoUsuario());
					
					$stmt->execute(); 
                    return $this->con->lastInsertId();
			}
			catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}

		public function login($email, $senha){
			try{
				$stmt = $this->con->query("SELECT * FROM usuario WHERE email = '" . $email . "' AND senha = '" . $senha . "' LIMIT 1");
				$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$quantidade = $stmt->rowCount();

				if($quantidade == 1){
					$u = new Usuario($user[0]["email"], $user[0]["senha"], $user[0]["tipoUsuario"]);
					$u->setIdUsuario($user[0]["idUsuario"]);
				} else $u = null;
				
				return $u;

			} catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}

		public function usuarioExistente($u){
			try{
				$stmt = $this->con->query("SELECT * FROM usuario WHERE email = '" . $u->getEmail() . "'");
				$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$quantidade = $stmt->rowCount();

				if($quantidade == 0) return false;
				else return true;

			} catch(PDOException $ex){
				echo "Erro: " . $ex->getMessage();
			}
		}
    }
?>