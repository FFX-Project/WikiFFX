<?php
	class Model {

		public $id; //propriété
		public $table;
		public $conf="default";
		public $db;

		function __construct()
		{
            $conf = array(
					        'host' => 'localhost',
					        'database' => 'mvcslam5',
					        'login' => 'root',
					        'password' => ''
					  );
            try {
                   $this->db = new PDO('mysql:
                       host='.$conf['host'].';
                       dbname='.$conf['database'],
                       $conf['login'],
                       $conf['password']);
            }     catch (PDOException $e) {
                   print "Erreur !: ".$e->getMessage()."<br/>";
                die();
            }
        }

		function read($field=null) {

			if ($field==null) {
				$field="*";
			}

			$sql ="SELECT ".$field.' FROM '.$this->table.' WHERE id=:id';
			echo $sql;

			$stmt = $this->db->prepare($sql);

			if ($stmt->execute(array(':id'=> $this->id))) {
				$data = $stmt->fetch(PDO::FETCH_OBJ);
				//echo "<PRE>";
				//print_r($data);
				//echo "</PRE>";
				foreach ($data as $key=>$value){
					$this->$key = $value;
				}
				//return $data;
			}

			else {

				echo "<br>Erreur SQL";
			}
		}

		function save($data) {

			echo "save<br>";
			echo "<PRE>";
			print_r($data);
			echo "</PRE>";

			if (empty($data["id"])) {
				echo "save INSERT<br>";
				unset($data['id']);
				//la requete sql
				$sql="INSERT INTO ".$this->table." (";
				$values="";
					foreach ($data as $key => $value) {
						$sql.=$key.",";
						$values.=":".$key.", ";
					}

				//enleve la derniere virgule
				$sql = substr($sql, 0, -1);
				$values = substr($values, 0, -2);
				$sql.=") VALUES (".$values.")";


				echo $sql;

				//prepare sql
				$stmt = $this->db->prepare($sql);

				//execute sql
				if ($stmt->execute($data)) {
					echo "insert ok :".$this->db->lastInsertId();
					$this->id=$this->db->lastInsertId();
					} else {
						echo"erreur<br>";
					}



				} else {

				echo "Save UPDATE<br>";
				$this->id=$data['id'];
				unset($data['id']);

				$sql = "UPDATE ".$this->table." SET ";
					foreach ($data as $key => $value) {
						$sql.=$key."= :".$key.",";
					}

				$sql= substr($sql, 0, -1);
				$sql.= " WHERE id=".$this->id;

				echo $sql;

				$stmt = $this->db->prepare($sql);

				if ($stmt->execute($data)) {
					echo "mise a jour ok";
					} else {
						echo "<br> erreur SQL";
					}

				}

			}

			function findFirst($data) {
				//RETOURNE L42L2MENT COURANT DU TABLEAU
				//print_r($data);
				return current($this->find($data));
			}

			function delete($id)
			{

				$sql = "DELETE from ".$this->table." WHERE id=:id";

				echo $sql;

				$stmt = $this->db->prepare($sql);

				if ($stmt->execute(array(':id'=> $this->id))) {
					echo "suppression réussie";
					} else {
						echo "<br> erreur SQL";
					}

			}

			function find($data) {

				$field="*";
				$inner=" ";
				$condition="1=1";
				$order="id";
				$limit="";

				if (isset($data["field"])){
					$field=$data['field'];
				}
				if (isset($data["inner"])){
					$field=$data['inner'];
				}
				if (isset($data["condition"])){
					$condition=$data['condition'];
				}
				if (isset($data["order"])){
					$order=$data['order'];
				}
				if (isset($data["limit"])){
					$limit=$data['limit'];
				}

				$sql= 	'SELECT '.$field.
						' FROM '.$this->table.
						' '.$inner.
						' WHERE '.$condition.
						' ORDER BY '.$order.
						' '.$limit;

				echo $sql;

			$stmt = $this->db->prepare($sql);
			if ($stmt->execute()) {
				$data = $stmt->fetchAll(PDO::FETCH_OBJ);
				//echo "<PRE>";
				//print_r($data);
				//echo "</PRE>";
				return $data;
				}
				//return $data;


			else {

				echo "<br>Erreur SQL";
			}
		}
	}
?>
