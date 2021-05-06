<?php
class item_clef extends Model {

	var $table = "item_clef";

	function getAll($num=999){
		return $this->find(array(
			"inner"=> 'INNER JOIN page ON item_clef.Id_Page = page.Id_Page',
			"order"=> 'page.id_Page ASC',
			"limit"=> 'LIMIT '. $num
		));
	}

	function deleteLoc($id){
		$this->id=$id;
		$this->delete(array("IdDel"=>"Id_Page"));
		return $this->delete(array("from"=>"page","IdDel"=>"Id_Page"));
	}

	function getImage($id){
		return $this->findFirst(array("fields"=>'page.Image_Page', "from"=>'page',"condition"=>'Id_Page='.$id));
	}

	function getDetail($id){
		return $this->findFirst(array("condition"=>"Id_Page=".$id,	"from"=> "page", "order"=> "Id_Page"));
	}

	function getId($nom){
		return $this->findFirst(array("condition"=>"Nom_Page='".$nom."'", "fields"=>"Id_Page", "from"=>"page", "order"=> "Id_Page"));
	}

	function addIC($data,$from=null, $Nid=null){
		//Si la talbe n'est pas celle de la classe appeller
		if($from == null){
			$from ="".$this->table."";
		}
		//Permet de modifier l'id des updates si elle ne ce nomme pas id.
		if($Nid == null) {
			$Nid = "id";
		}
		//initialise le remplissage de la table PAGE
		$tab = [
			'Nom_Page' => $data['Nom_Page'],
			'Description_Page' => $data['Description_Page'],
			'Image_Page' => $data['Image_Page'],
		];
		$this->save($tab,$from,$Nid);
		//enleve les éléments inutiles, car déjà insert dans la page table, garde uniquement le reste
		unset($data['Nom_Page']);
		unset($data['Description_Page']);
		unset($data['Image_Page']);
		//on récupère l'id du insert de page
		$data['Id_Page'] = $this->id;
		//print_r($data);
		$this->addContenu($data);
	}
}
?>
