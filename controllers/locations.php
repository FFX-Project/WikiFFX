<?php
class locations extends controller {

	function index() {
		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->layout='admin';
		}elseif ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 0){
			$this->layout="log";
		}else{
			$this->layout='default';
		}
		$d=array();
		$this->loadModel('location');

		$d['locs'] = $this->location->getAll();
		$d['titre'] = "Liste des localisation";

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
		$this->loadModel('location');
		$d['loc'] = $this->location->getDetail($id);
		$d['locmtr'] = $this->location->getAllMonstre($id);


		foreach ($d['locmtr'] as $mtr)
		{
			$d['loc']->monstres[$mtr->Id_Page] = $mtr->Nom_Page;
		}


		$this->set($d);

		$this->render('view');

	}

	function adminIndex() {

		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('location');

			$d['locs'] =$this->location->getAll();
			$d['titre'] ="Administration locations";


			$this->set($d);

			$this->layout='admin';
			//on rend la vue --> index
			$this->render('adminIndex');
		}
		else {
			echo '<img src="https://media1.tenor.com/images/01e14f3bdd80e2048bb87b7e22c9faad/tenor.gif?itemid=15977955">';
		}
	}

	function adminEdit($id=null) {

		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('location');
			$this->layout='admin';
			if(!empty($_POST)) {
				//on est en insert ou update et on affiche la liste
				//si fichier à télécharger renseigné
				if(!empty($_FILES['fichier']['name']))
				{
					//on vérifie les extensions autorisées
					$tabext=array('jpg','png','jpeg','webp');
					$extension=pathinfo($_FILES['fichier']['name'],PATHINFO_EXTENSION);
					if (in_array(strtolower($extension),$tabext))
					{
						if(isset($_FILES['fichier']['error']) && UPLOAD_ERR_OK===$_FILES['fichier']['error'])
						{
							if (empty($_POST['id'])) {
								$nomimage=$this->location->getTable().'_'.$this->location->getNewId().'.'.$extension;
							} else {
								//update
								$nomimage=$this->location->getTable().'_'.$_POST['id'].'.'.$extension;
								$l=$this->location->getImage($_POST['id']);
								unlink('./webroot/img/'.$l->Image_Page);
							}
							//on télécharge le fichier avec move_uploaded_file
							if(move_uploaded_file($_FILES['fichier']['tmp_name'],'./webroot/img/'.$nomimage))
							{
								//on renseigne $_POST image pour le save
								$_POST['Image_Page']=$nomimage;
								echo "Upload réussi";
							}
							else{
								echo "Problème lors du téléchargement";
							}
						}
					}
				}
				unset($_POST['fichier']);
				print_r($_POST);
				$from = "page";
				$Nid = "Id_Page";
				if (empty($_POST['id'])) {
					$this->location->addLoc($_POST,$from,$Nid);
				} else {
					$this->location->save($_POST,$from,$Nid);
				}
				$this->Session->setFlash("Votre mise à jour a bien été prise en compte");
				$d['locs']=$this->location->getAll();
				$d['titre'] ="Administration des locations";
				$this->set($d);
				//on rend la vue --> adminindex
				$this->render('adminIndex');
			} else {
				$d=array();

				if(!empty($id)) {
					//on remplit form
					//on récupère les données via id
					$d['loc'] =$this->location->getDetail($id);
					$d['titre'] ="Administration des locations";
				}
				$this->set($d);
				//on rend la vue --> adminedit
				$this->render('adminEdit');
			}

		}
	}

	function adminDelete($id) {
		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('location');
			$l = $this->location->getImage($id);
			if (!$this->location->deleteLoc($id)) {
					echo "C PAS BON";
			} else {
			unlink('./webroot/img/'.$l->Image_Page);
			echo "bravo";
			$this->layout='admin';
			}
		$d['locs'] = $this->location->getAll();
		$d['titre'] ="Liste des locations";
		$this->set($d);
		$this->render('adminIndex');
		}
	}
}
?>
