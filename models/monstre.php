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
			"fields"=> 'elementaire.Nom_Elementaire, varianteelem.Nom_Variante',
			"inner"=> 'INNER JOIN ont ON monstre.Id_Page = ont.Id_Page INNER JOIN elementaire ON ont.Id_Elementaire = elementaire.Id_Elementaire INNER JOIN varianteelem ON ont.Id_Variante = varianteelem.Id_Variante',
			"order"=> 'ont.Id_Elementaire ASC',
			"condition"=> 'monstre.Id_Page ='.$id
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
