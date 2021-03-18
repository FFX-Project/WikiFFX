<?php
	//définir une classe
	class Model {
		//propriétés de la classe
		public $id;
		public $table;
		public $conf='default';
		public $db;

		function __construct(){
			//on fait appel à notre configuration bdd
			$conf= conf::$databases[$this->conf];
			try {
				$this->db = new PDO('mysql:
				host='.$conf['host'].';
				dbname='.$conf['database'].';',
				$conf['login'],
				$conf['password']);

			} catch (PDOException $e) {
				print "Erreur !: " . $e->getMessage() . "<br/>";
				die();
			}
		}

		//read : lecture d'une table par la clé primaire --> renvoie une seule ligne
		function read($fields=null) {
			if ($fields==null){
				$fields="*";
			}
			/* Exécute une requête préparée en passant un tableau de valeurs */
			$sql = 'SELECT '.$fields .' FROM '.$this->table.' WHERE id_Page = :id';
			echo $sql;
			//préparation PDO
			$sth = $this->db->prepare($sql);
			//chargement du résultat de la requete SQL en mémoire dans un curseur
			if ($sth->execute(array(':id' => $this->id))) {
				$data = $sth->fetch(PDO::FETCH_OBJ);
				echo "<PRE>";
				print_r($data);
				echo "</PRE>";
				foreach ($data as $key=>$value) {
					//on peut créer "à la volée" les propriété de la classe
					$this->$key = $value;
				}
				//return $data;
			} else {
				echo "<br /> erreur SQL";
			}
		}

		//save : insertion ou une modification d'une ligne dans BDD
		function save($data) {
			//on vérifie si id existe
			if (empty($data["id"])){
				//echo "insert";
				unset($data['id']);
				// echo "<PRE>";
				// print_r($data);
				// echo "</PRE>";
				//construction requete SQL
				$sql="INSERT INTO ".$this->table."(";
				$values="";
				foreach ($data as $key => $value) {
					$sql.=$key.",";
					$values.=":".$key.",";
				}
				//enleve la denriere virgule
				$sql = substr($sql, 0, -1);
				$values = substr($values, 0, -1);
				$sql.=") VALUES (".$values.")";

				//echo $sql;
				//préparation SQL
				$sth = $this->db->prepare($sql);

				//exécution SQL
				if ($sth->execute($data)) {
					echo "insertion ok id :".$this->db->lastInsertId();
					$this->id=$this->db->lastInsertId();
				} else {
					echo "<br /> erreur SQL";
				}

			} else {
				echo "update";
				// echo "<PRE>";
				// print_r($data);
				// echo "</PRE>";
				$this->id=$data['id'];
				unset($data['id']);
				//construction requete SQL
				$sql="UPDATE ".$this->table." SET ";
				//$values="";
				foreach ($data as $key => $value) {
					$sql.=$key."= :".$key.",";
				}
				//enleve la denriere virgule
				$sql = substr($sql, 0, -1);
				$sql.=" WHERE id=".$this->id;

				echo $sql;
				//préparation SQL
				$sth = $this->db->prepare($sql);

				//exécution SQL
				if ($sth->execute($data)) {
					echo "mise à jour ok ";
				} else {
					echo "<br /> erreur SQL";
				}

			}
		}

		//find : lecture d'une ou plusieurs table --> renvoie plusieurs lignes
		function find($data) {

			$fields="*";
			$inner=" ";
			$condition="1=1";
			$order="id";
			$limit=" ";

			if (isset($data["fields"])){
				$fields=$data["fields"];
			}
			if (isset($data["inner"])){
				$inner=$data["inner"];
			}
			if (isset($data["condition"])){
				$condition=$data["condition"];
			}
			if (isset($data["order"])){
				$order=$data["order"];
			}
			if (isset($data["limit"])){
				$limit=$data["limit"];
			}

			/* Exécute une requête préparée en passant un tableau de valeurs */
			$sql =	' SELECT '.$fields .
					' FROM '.$this->table.
					' '.$inner.
					' WHERE '.$condition.
					' ORDER BY '.$order.
					' '.$limit;
			//echo $sql;
			//préparation PDO
			$sth = $this->db->prepare($sql);
			//chargement du résultat de la requete SQL en mémoire dans un curseur
			if ($sth->execute()) {
				$d = $sth->fetchAll(PDO::FETCH_OBJ);
				// echo "<PRE>";
				// print_r($d);
				// echo "</PRE>";
				return $d;
			} else {
				echo "<br /> erreur SQL";
			}
		}

		//findfirst : lecture du premier enreg d'un find
		function findFirst($data) {
			 //retourne l'élément courant du tableau
			 //print_r($data);
			 return current($this->find($data));
		}

		//delete : on supprime une seule ligne sur clé primaire
		function delete() {
			/* Exécute une requête préparée en passant un tableau de valeurs */
			$sql = 'DELETE FROM '.$this->table.' WHERE id = :id';
			echo $sql;
			//préparation PDO
			$sth = $this->db->prepare($sql);
			//chargement du résultat de la requete SQL en mémoire dans un curseur
			if ($sth->execute(array(':id' => $this->id))) {
				//suppr ok
				return true;
			} else {
				//echo "<br /> erreur SQL";
				return false;
			}
		}

	}
?>
