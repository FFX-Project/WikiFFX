<?php
class research extends Model {

	var $table = "page";

	function getRecherche($recherche){
		return $this->find(array(
			"condition"=>"page.Nom_Page LIKE '%".$recherche."%'",
			"order"=> 'page.id_Page ASC',
		));
	}
}