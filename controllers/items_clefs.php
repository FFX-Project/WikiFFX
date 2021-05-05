<?php
class items_clefs extends controller {

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
		$loc=array();
		$this->loadModel('item_clef');
		$this->loadModel('location');

		$d['items_clefs'] = $this->item_clef->getAll();
		$d['location'] = $this->location->getAll();
		print_r("<PRE>");
		print_r($d['location']);
		print_r("</PRE>");
		print_r("<PRE>");
		print_r($d['items_clefs']);
		print_r("</PRE>");
		//$d['items_clefs']['0']->Id_Location = $d['location'][''];

		//$d['items_clefs']->bonjour = "oui";
		foreach($d['items_clefs'] as $i){
			foreach($d['location'] as $l){
				if($i->Id_Location == $l->Id_Page){
					$i->nom_location = $l->Nom_Page;
				}
			}

			//$id = $d['items_clefs'][$count]->Id_Location;
			//$d['items_clefs'][$count]->Id_Location = $this->location->getLoc($id);
			//print_r($d['items_clefs'][$count]->Id_Location);
		}
		print_r("<PRE>");
		print_r($d['items_clefs']);
		print_r("</PRE>");
		//var_dump($d);
		//$vars = get_object_vars($d['items_clefs']);
		//print_r($d['items_clefs']['0']->Id_Location);
		//print_r($vars);

		//foreach($d as $i){
		//print_r($d['items_clefs']);
		//$count = $count + 1;
		//}

		$d['titre'] ="Liste des items clefs";

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
		$d['titre'] = $d['loc']->Nom_Page;
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
	}

	function adminEdit($id=null) {

		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('location');
			$this->layout='admin';
			if(!empty($_POST)) {
				//on est en insert ou update et on affiche la liste
				//print_r($_FILES);
				//print_r($_POST);
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
							$nomimage=$_POST['Nom_Page'].'.'.$extension;
							if (empty($_POST['id'])) {
								//on est en ajout
							} else {
								//on est en modif
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
				//print_r($_POST);
				//$nom = $_POST['Nom_Page'];
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
					//on récupère les données de mon id
					$d['loc'] =$this->location->getDetail($id);
					$d['titre'] ="Administration des locations";
					// echo "<PRE>";
					// print_r($d['loc']);
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
			$this->loadModel('location');
			if (!$this->location->deleteLoc($id)) {
					echo "C PAS BON";
			} else {
			echo "bravo";
			}
		$d['locs'] = $this->location->getAll();
		$d['titre'] ="Liste des locations";
		$this->set($d);
		$this->render('adminIndex');
		}
	}
	}
	?>
