<?php 
class categorys extends controller {
	
	function index() {
		
		//echo "méthode index de la classe category";
		$d=array();
		// $d['cat'] = array (
			// "nom"=>"berline",
			// "ordre"=>"4"
		// );
		$this->loadModel('category');
		
		$d['cats'] =$this->category->getLast();
		$d['titre'] ="Liste des 6 dernières catégories";
		
		
		$this->set($d);
		
		//on rend la vue --> index
		$this->render('index');
	}
	
	function adminIndex() {
		
		if ($this->Session->isLogged()){
			$this->loadModel('category');
			
			$d['cats'] =$this->category->getLast(999);
			$d['titre'] ="Administration catégories";
			
			
			$this->set($d);
			
			$this->layout='admin';
			//on rend la vue --> index
			$this->render('adminIndex');
		}
	}
	
	function adminEdit($id=null) {
		
		if ($this->Session->isLogged()){
			$this->loadModel('category');
			
			$this->layout='admin';
			if(!empty($_POST)) {
				//on est en insert ou update et on affiche la liste
				$this->category->save($_POST);
				$this->Session->setFlash("Votre mise à jour a bien été prise en compte");
				$d['cats']=$this->category->getLast();
				$d['titre'] ="Administration catégories";
				$this->set($d);
				//on rend la vue --> adminindex
				$this->render('adminIndex');
			} else {
				$d=array();
				//on remplit le formualire et on l'affiche
				//si id renseigné
				if(!empty($id)) {
					//on remplit form 
					//on récupère les données de mon id
					$d['cat'] =$this->category->getCat($id);
					// echo "<PRE>";
					// print_r($d['cat']); 
					// echo "</PRE>";
				}
				$this->set($d);
				//on rend la vue --> adminedit
				$this->render('adminedit');
			}
			
		}
	}
	
	function adminDelete($id) {
		
		if ($this->Session->isLogged()){
			$this->loadModel('category');
			
			if (!$this->category->deleteCat($id)) {
				$this->Session->setFlash("Suppression impossible! il y a des vehicules dans cette catégorie","danger");
			} else {
				$this->Session->setFlash("Suppression effectuée","success");
			}
			$d['cats'] =$this->category->getLast(999);
			$d['titre'] ="Administration catégories";
			
			
			$this->set($d);
			
			$this->layout='admin';
			//on rend la vue --> index
			$this->render('adminIndex');
		}
	}
	
}
?>