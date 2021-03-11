<?php
class vehicule extends Model {
	
	var $table = "vehicule";
	
	function getAll($num=99){
		return $this->find(array(
			"order"=> 'prix DESC',
			"limit"=> 'LIMIT '. $num
		));
	}
	
	function getDetail($id){
		return $this->findFirst(array(
			"fields"=> '	vehicule.*, 
							categorie.name as nomcateg, 
							libcouleur, metal,image, 
							libelle as libmarque  ',
			"condition"=> 'vehicule.id ='.$id,
			"inner"=> '	INNER JOIN	categorie ON vehicule.categorie = categorie.id
						INNER JOIN	marque ON vehicule.marque = marque.id
						INNER JOIN	couleur ON vehicule.couleur = couleur.id'
		));
	}
	
	function deleteVeh($id){
		$this->id=$id;
		return $this->delete();
	}
	
	function getImage($id){
		return $this->findFirst(array("fields"=>'vehicule.image',"condition"=>'vehicule.id='.$id));
	}
}
?>