<?php
class research extends Model {

	var $table = "page";

	function getRecherche($recherche){
		return $this->find(array(
			"condition" => "page.Nom_Page LIKE '%".$recherche."%'",
			"order" => 'page.Id_Page ASC',
		));
	}

	function getMonstre($id){
		return $this->findFirst(array(
			"fields" => 'monstre.Id_Page',
			"inner" => 'INNER JOIN monstre ON page.Id_Page = monstre.Id_Page',
			"order" => 'monstre.Id_Page ASC',
			"condition" => 'monstre.Id_Page ='.$id
		));
	}

	function getLocation($id){
		return $this->findFirst(array(
			"fields" => 'location.Id_Page',
			"inner" => 'INNER JOIN location ON page.Id_Page = location.Id_Page',
			"order" => 'location.Id_Page ASC',
			"condition" => 'location.Id_Page ='.$id
		));
	}

	function getItemClef($id){
		return $this->findFirst(array(
			"fields" => 'item_clef.Id_Page',
			"inner" => 'INNER JOIN item_clef ON page.Id_Page = item_clef.Id_Page',
			"order" => 'item_clef.Id_Page ASC',
			"condition" => 'item_clef.Id_Page ='.$id
		));
	}
}