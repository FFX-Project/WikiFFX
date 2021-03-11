<?php
class categorys extends controller {

	var $models = array("category");

	function index() {
	//	echo "function index";
		$d=array();
	//	$d['cat']=array("nom"=>"Berline", 'ordre'=>1);
	//	$this->category = $this->loadmodel('category');
		$d['cats'] = $this->category->getLast();
		$d['titre'] = "Liste des 6 dernières catégories";

		$this->set($d);
		//je rend la vue index
		$this->render('index');
	}

	function admincateg() {
	//	echo "function index";
		$d=array();
	//	$d['cat']=array("nom"=>"Berline", 'ordre'=>1);
	//	$this->category = $this->loadmodel('category');
	if($this->Session->isLogged()) {
			$d['cats'] = $this->category->getLast();
			$d['titre'] = "administration des catégories";
			$this->set($d);
			$this->layout='admin';
			//je rend la vue index
			$this->render('admincateg');
		}
	}

	function view($id){
	//	$this->category = $this->loadmodel('category');
		$d['cat'] = $this->category->getCat($id);
		$d['titre'] = "Détail catégories";

		$this->set($d);
		//je rend la vue view
		$this->render('view');
	}

	function AdminDelete($id){
		if($this->Session->IsLogged())
		{
			if(!$this->category->delete($id))
			{
			$this->Session->setFlash("Suppression impossible ! il y a des véhicules dans cette categ","danger");
			}
			else
			{
				$this->Session->setFlash("Suppression effectuée","success");
			}
 		}
	}

	function adminEdit($id=null) {

	}
}
?>
