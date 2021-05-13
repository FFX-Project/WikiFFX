<?php
class monstre extends Model {

	var $table = "monstre";

	function getAll($num=99){
		return $this->find(array(
			"inner"=> 'INNER JOIN page ON monstre.Id_Page = page.Id_Page',
			"order"=> 'page.id_Page ASC',
			"limit"=> 'LIMIT '. $num
		));
	}

	function getDetail($id){
		return $this->findFirst(array(
			"inner"=> 'INNER JOIN page ON monstre.Id_Page = page.Id_Page',
			"order"=> 'page.id_Page ASC',
			"condition"=> 'monstre.Id_Page ='.$id
		));
	}

	function getDetailElementaire($id){
		return $this->find(array(
			"fields" => 'elementaire.Nom_Elementaire, varianteelem.Nom_Variante',
			"inner" => 'INNER JOIN ont ON monstre.Id_Page = ont.Id_Page INNER JOIN elementaire ON ont.Id_Elementaire = elementaire.Id_Elementaire INNER JOIN varianteelem ON ont.Id_Variante = varianteelem.Id_Variante',
			"order" => 'ont.Id_Elementaire ASC',
			"condition" => 'monstre.Id_Page ='.$id
		));
	}

	function getDetailLieux($id){
		return $this->find(array(
			"fields" => 'page.Id_Page, page.Nom_Page',
			"inner" => 'INNER JOIN a ON monstre.Id_Page = a.Id_Page INNER JOIN location ON a.Id_Page_1 = location.Id_Page INNER JOIN page ON location.Id_Page = page.Id_Page',
			"order" => 'page.id_Page ASC',
			"condition" => 'monstre.Id_Page ='.$id
		));
	}

	function deleteMtr($id){
		$this->id=$id;
		$this->delete(array("IdDel"=>"Id_Page", "from"=>"ont"));
		$this->delete(array("IdDel"=>"Id_Page", "from"=>"a"));
		$this->delete(array("IdDel"=>"Id_Page"));
		return $this->delete(array("from"=>"Page","IdDel"=>"Id_Page"));
	}

	function deleteLocMtr($id, $id2){
		$this->id=$id;
		$this->id2 = $id2;
		return $this->deleteGestLoc(array("IdDel"=>"Id_Page", "from"=>"a", "and"=>"Id_Page_1"));
	}

	function getImage($id){
		return $this->findFirst(array("fields"=>'Page.Image_Page', "from"=>'Page',"condition"=>'Id_Page='.$id));
	}

	function getTable(){
		return $this->table;
	}

	function addMtr($data,$from=null, $Nid=null){
		//Si la talbe n'est pas celle de la classe appeller
		if($from == null){
			$from ="".$this->table."";
		}
		//Permet de modifier l'id des updates si elle ne ce nomme pas id.
		if($Nid == null) {
			$Nid = "Id_Monstre";
		}
		//initialise le remplissage de la table PAGE
		if(empty($data['Image_Page'])){
			$tab = [
				'id' => $data['id'],
				'Nom_Page' => $data['Nom_Page'],
				'Description_Page' => $data['Description_Page'],
			];
		} else {
				$tab = [
					'id' => $data['id'],
					'Nom_Page' => $data['Nom_Page'],
					'Description_Page' => $data['Description_Page'],
					'Image_Page' => $data['Image_Page'],
				];
			}
		$this->save($tab,$from,$Nid);
		unset($data['Nom_Page']);
		unset($data['Description_Page']);
		unset($data['Image_Page']);
		$data['Id_Page'] = $this->id;
		$tab = [
			'Id_Page' => $data['Id_Page'],
			'Hp_Monstre' => $data['Hp_Monstre'],
			'Accuracy_Monstre' => $data['Accuracy_Monstre'],
			'Chance_Monstre' => $data['Chance_Monstre'],
			'Defence_Monstre' => $data['Defence_Monstre'],
			'DefenceMagique_Monstre' => $data['DefenceMagique_Monstre'],
			'Agi_Monstre' => $data['Agi_Monstre'],
			'Esquive_Monstre' => $data['Esquive_Monstre'],
			'Mp_Monstre' => $data['Mp_Monstre'],
			'Force_Monstre' => $data['Force_Monstre'],
			'Magie_Monstre' => $data['Magie_Monstre'],
			'Overkill_Monstre' => $data['Overkill_Monstre'],
			'Gil_Monstre' => $data['Gil_Monstre'],
			'XP_Monstre' => $data['XP_Monstre'],
		];
		$this->addContenu($tab);
		unset($data['Hp_Monstre']);
		unset($data['Accuracy_Monstre']);
		unset($data['Chance_Monstre']);
		unset($data['Defence_Monstre']);
		unset($data['DefenceMagique_Monstre']);
		unset($data['Agi_Monstre']);
		unset($data['Esquive_Monstre']);
		unset($data['Mp_Monstre']);
		unset($data['Force_Monstre']);
		unset($data['Magie_Monstre']);
		unset($data['Overkill_Monstre']);
		unset($data['Gil_Monstre']);
		unset($data['XP_Monstre']);
		$from = "ont";
		$tab = [
			'Id_Page' => $data['Id_Page'],
			'Id_Elementaire' => 1,
			'Id_Variante' => $data['Feu'],
		];
		$this->addContenu($tab,$from);
		unset($data['Feu']);
		$tab = [
			'Id_Page' => $data['Id_Page'],
			'Id_Elementaire' => 2,
			'Id_Variante' => $data['Glace'],
		];
		$this->addContenu($tab,$from);
		unset($data['Glace']);
		$tab = [
			'Id_Page' => $data['Id_Page'],
			'Id_Elementaire' => 3,
			'Id_Variante' => $data['Foudre'],
		];
		$this->addContenu($tab,$from);
		unset($data['Foudre']);
		$tab = [
			'Id_Page' => $data['Id_Page'],
			'Id_Elementaire' => 4,
			'Id_Variante' => $data['Eau'],
		];
		$this->addContenu($tab,$from);
		unset($data['Eau']);;
		$tab = $data['Id_Location'];
		$from = "a";
		for ($i=0; $i < count($tab); $i++) {
			print($tab[$i]);
			$tab² = [
				'Id_Page' => $data['Id_Page'],
				'Id_Page_1' => $tab[$i]
			];
			$this->addContenu($tab²,$from);
		}

	}
//Permet de mettre à jour les items clefs, Recupere le $data avec toutes les données puis les scinde pour chaque tables.
	function UpdateMtr($data,$from=null, $Nid=null){
		if($from == null){
			$from ="".$this->table."";
		}
		//Permet de modifier l'id des updates si elle ne ce nomme pas id.
		if($Nid == null) {
			$Nid = "id";
		}
		//vérifie si l'image doit être mis à jour ou non
	if(empty($data['Image_Page'])){
		$tab = [
			'id' => $data['id'],
			'Nom_Page' => $data['Nom_Page'],
			'Description_Page' => $data['Description_Page'],
		];
	} else {
			$tab = [
				'id' => $data['id'],
				'Nom_Page' => $data['Nom_Page'],
				'Description_Page' => $data['Description_Page'],
				'Image_Page' => $data['Image_Page'],
			];
		}
		$this->save($tab,$from,$Nid);
		unset($data['Nom_Page']);
		unset($data['Description_Page']);
		unset($data['Image_Page']);
		$from = "ont";
		$tab = [
			'id' => $data['id'],
			'Id_Elementaire' => 1,
			'Id_Variante' => $data['Feu'],
		];
		$this->UpdateElem($tab,$from,$Nid);
		unset($data['Feu']);
		$tab = [
			'id' => $data['id'],
			'Id_Elementaire' => 2,
			'Id_Variante' => $data['Glace'],
		];
		$this->UpdateElem($tab,$from,$Nid);
		unset($data['Glace']);
		$tab = [
			'id' => $data['id'],
			'Id_Elementaire' => 3,
			'Id_Variante' => $data['Foudre'],
		];
		$this->UpdateElem($tab,$from,$Nid);
		unset($data['Foudre']);
		$tab = [
			'id' => $data['id'],
			'Id_Elementaire' => 4,
			'Id_Variante' => $data['Eau'],
		];
		$this->UpdateElem($tab,$from,$Nid);
		unset($data['Eau']);
		$this->save($data,null,$Nid);
	}

	function addLocMtr($data, $from){
		return $this->addContenu($data,$from);
	}
	//recupére le dernier id dans la table page + 1
	function getNewId(){
		$d = $this->getMaxId();
		$id = $d[0]->idMax + 1;
		return $id;
	}
}
?>
