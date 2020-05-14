<?php 

	class User extends Conexion{
	
		private $name;
		private $userName;
		private $lastName;
		private $pass;

		/* Registro de Usuarios */
		public function regUser($data){

			$this->name = $data['name'];
			$this->lastName = $data['lastName'];
			$this->userName = $data['userName'];
			$this->pass = $data['pass'];

			try {
				
				$query = $this->connect()->prepare('SELECT * FROM login WHERE userName = :userName');
				$query->execute(['userName' => $this->userName]);

				if($query->rowCount() === 1) {
					return false;
				} else {
					$password = password_hash($this->pass, PASSWORD_DEFAULT);
					$insert = $this->connect()->prepare('INSERT INTO login (name, lastName, userName, pass) VALUES (:name, :lastName, :userName, :pass)');
					$insert->bindParam(':name', $this->name, PDO::PARAM_STR);
					$insert->bindParam(':lastName', $this->lastName, PDO::PARAM_STR);
					$insert->bindParam(':userName', $this->userName, PDO::PARAM_STR);
					$insert->bindParam(':pass', $password, PDO::PARAM_STR);
					$pdo = $insert->execute();
					return $pdo;

				}

			} catch (PDOException $e) {
				
				echo 'Error al Registrar Usuario ' . $e->getMessage();
				echo '<br /> <br />';
				echo 'Error en la línea -> ' . $e->getLine(); 

			}

		}

		/* Verificar si el usuario existe */

		public function userExists($user, $pass) {

			$query = $this->connect()->prepare('SELECT * FROM login WHERE userName = :user LIMIT 1');
			$query->execute(['user' => $user]);
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$passVerify = password_verify($pass, $row['pass']);

				if($query->rowCount()) {
					if($passVerify){

						return true;

					} else {

						return false;

					}

				} else {
					echo 'hash no coincide';
				}	

		}

		public function setUser($user) {

			$query = $this->connect()->prepare('SELECT * FROM login WHERE userName = :user');
			$query->execute(['user' => $user]);

			foreach ($query as $currentCount) {
				
				$this->name = $currentCount['name'];
				$this->userName = $currentCount['userName'];
				$this->lastName = $currentCount['lastName'];

			}

		}

		public function getName() {

			return $this->name;

		}

		public function getLastName() {
			return $this->lastName;
		}

	}

 ?>