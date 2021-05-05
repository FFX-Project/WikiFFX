<?php
class monstres extends controller {

	function index() {
		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->layout='admin';
		}elseif ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 0){
			$this->layout="log";
		}else{
			$this->layout='default';
		}
		//echo "méthode index de la classe category";
		$d=array();
		// $d['cat'] = array (
			// "nom"=>"berline",
			// "ordre"=>"4"
		// );
		$this->loadModel('monstre');

		$d['mtrs'] = $this->monstre->getAll();
		$d['titre'] ="Liste des monstres";


		$this->set($d);

		//on rend la vue --> index
		$this->render('index');
	}

	function view($id) {
		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->layout='admin';
		}elseif ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 0){
			$this->layout="log";
		}else{
			$this->layout='default';
		}
		//echo "id monstre".$id;
		$this->loadModel('monstre');

		$d['mtr'] = $this->monstre->getDetail($id);
		$d['mtrelem'] = $this->monstre->getDetailElementaire($id);

		foreach ($d['mtrelem'] as $ele)
		{
			$nom = $ele->Nom_Elementaire;
			$d['mtr']->$nom = $ele->Nom_Variante;
		}

		$this->set($d);	

		$this->render('view');

	}

	function adminIndex() {

		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('vehicule');

			$d['vehs'] =$this->vehicule->getAll(999);
			$d['titre'] ="Administration Vehicules";


			$this->set($d);

			$this->layout='admin';
			//on rend la vue --> index
			$this->render('adminIndex');
		}
	}

	function adminEdit($id=null) {

			if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('vehicule');
			$this->loadModel('category');

			$this->layout='admin';
			if(!empty($_POST)) {
				//on est en insert ou update et on affiche la liste
				//print_r($_FILES);
				//si fichier à télécharger renseigné
				if(!empty($_FILES['fichier']['name']))
				{
					//on vérifie les extensions autorisées
					$tabext=array('jpg','png','jpeg');
					$extension=pathinfo($_FILES['fichier']['name'],PATHINFO_EXTENSION);
					if (in_array(strtolower($extension),$tabext))
					{
						if(isset($_FILES['fichier']['error']) && UPLOAD_ERR_OK===$_FILES['fichier']['error'])
						{
							$nomimage=$_POST['name'].'.'.$extension;
							if (empty($_POST['id'])) {
								//on est en ajout
							} else {
								//on est en modif
								$v=$this->vehicule->getImage($_POST['id']);
								unlink('./webroot/img/'.$v->image);
							}
							//on télécharge le fichier avec move_uploaded_file
							if(move_uploaded_file($_FILES['fichier']['tmp_name'],'./webroot/img/'.$nomimage))
							{
								//on renseigne $_POST image pour le save
								$_POST['image']=$nomimage;
								echo "Upload réussi";
							}
							else{
								echo "Problème lors du téléchargement";
							}
						}
					}
				}
				unset($_POST['fichier']);
				$this->vehicule->save($_POST);
				$this->Session->setFlash("Votre mise à jour a bien été prise en compte");
				$d['vehs']=$this->vehicule->getAll(999);
				$d['titre'] ="Administration des Vehicules";
				$this->set($d);
				//on rend la vue --> adminindex
				$this->render('adminIndex');
			} else {
				$d=array();
				//on remplit le formualire et on l'affiche
				//si id renseigné
				$d['cats'] =$this->category->getLast(999);

				if(!empty($id)) {
					//on remplit form
					//on récupère les données de mon id
					$d['veh'] =$this->vehicule->getDetail($id);
					$d['titre'] ="Administration des vehicules";
					// echo "<PRE>";
					// print_r($d['cat']);
					// echo "</PRE>";
				}
				$this->set($d);
				//on rend la vue --> adminedit
				$this->render('adminEdit');
			}

		}
	}

	function adminDelete($id) {

			if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('vehicule');

			if (!$this->vehicule->deleteVeh($id)) {

			} else {
				$this->Session->setFlash("Suppression effectuée","success");
			}
			$d['vehs'] =$this->vehicule->getLast(999);
			$d['titre'] ="Administration Vehicules";


			$this->set($d);

			$this->layout='admin';
			//on rend la vue --> index
			$this->render('adminIndex');
		}
	}
}
?>
