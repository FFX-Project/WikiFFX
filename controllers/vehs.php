<?php
class vehs extends controller {

	var $models = array("veh");

	function index() {
	//	echo "function index";
		$d=array();
	//	$d['cat']=array("nom"=>"Berline", 'ordre'=>1);
	//	$this->category = $this->loadmodel('category');
		$d['vehs'] = $this->veh->getLast();
		$d['titre'] = "Liste des 6 dernières catégories";

		$this->set($d);
		//je rend la vue index
		$this->render('index');
	}

	function view($id){
	//	$this->category = $this->loadmodel('category');
		$d['cat'] = $this->category->getCat($id);
		$d['titre'] = "Détail catégories";

		$this->set($d);
		//je rend la vue view
		$this->render('view');
	}
}
?>
