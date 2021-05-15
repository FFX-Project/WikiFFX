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
		$d=array();
		$this->loadModel('item_clef');
		$this->loadModel('location');

		$d['items_clefs'] = $this->item_clef->getAll();
		$d['location'] = $this->location->getAll();

		foreach($d['items_clefs'] as $i){
			foreach($d['location'] as $l){
				if($i->Id_Location == $l->Id_Page){
					//ajout du nom de la location dans l'objet items_clefs
					$i->nom_location = $l->Nom_Page;
				}
			}
		}
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
		$this->loadModel('item_clef');
		$this->loadModel('location');
		$this->loadModel('commentary');
		$this->loadModel('compte');
		$d['item_clef'] = $this->item_clef->getDetail($id);
		$d['location'] = $this->location->getAll();
		$d['commentaires'] = $this->commentary->getPageCommentaire($id);

		foreach ($d['commentaires'] as $comm)
		{
			$pseudo = $this->compte->getPseudo($comm->Id_Compte);
			$comm->pseudo = $pseudo->Pseudo_Compte;
		}

		foreach($d['location'] as $l){
			if($d['item_clef']->Id_Location == $l->Id_Page){
				//ajout du nom de la location dans l'objet items_clefs
				$d['item_clef']->nom_location = $l->Nom_Page;
			}
		}

		$d['titre'] = $d['item_clef']->Nom_Page;
		$this->set($d);

		$this->render('view');

	}

	function adminIndex() {

		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->layout='admin';

			$d=array();
			$this->loadModel('item_clef');
			$this->loadModel('location');

			$d['items_clefs'] = $this->item_clef->getAll();
			$d['location'] = $this->location->getAll();

			foreach($d['items_clefs'] as $i){
				foreach($d['location'] as $l){
					if($i->Id_Location == $l->Id_Page){
						//ajout du nom de la location dans l'objet items_clefs
						$i->nom_location = $l->Nom_Page;
					}
				}
			}
			$d['titre'] ="Administration items clefs";

			$this->set($d);


			$this->layout='admin';
			//on rend la vue --> index
			$this->render('adminIndex');
		}
	}

	function adminEdit($id=null) {

		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('item_clef');
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
							$nomimage=$this->item_clef->getTable().'_'.$_POST['id'].'.'.$extension;
							if (empty($_POST['id'])) {
								//add
								$nomimage=$this->item_clef->getTable().'_'.$this->item_clef->getNewId().'.'.$extension;
							} else {
								//update
								$nomimage=$this->item_clef->getTable().'_'.$_POST['id'].'.'.$extension;
								$ic=$this->item_clef->getImage($_POST['id']);
								unlink('./webroot/img/'.$ic->Image_Page);
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
				$from = "page";
				$Nid = "Id_Page";
				if (empty($_POST['id'])) {
					$this->item_clef->addIC($_POST,$from,$Nid);
				} else {
					$this->item_clef->UpdateIC($_POST,$from,$Nid);
				}
				$this->Session->setFlash("Votre mise à jour a bien été prise en compte");
				$d['items_clefs'] = $this->item_clef->getAll();
				$d['location'] = $this->location->getAll();

				foreach($d['items_clefs'] as $i){
					foreach($d['location'] as $l){
						if($i->Id_Location == $l->Id_Page){
							//ajout du nom de la location dans l'objet items_clefs
							$i->nom_location = $l->Nom_Page;
						}
					}
				}
				$d['titre'] ="Administration des monstres";
				$this->set($d);
				//on rend la vue --> adminindex
				$this->render('adminIndex');
			} else {
				$d=array();
					$d['location'] = $this->location->getAll();
				if(!empty($id)) {
					//on remplit form
					//on récupère les données de mon id
					$d['item_clef'] = $this->item_clef->getDetail($id);

						foreach($d['location'] as $l){
							if($d['item_clef']->Id_Location == $l->Id_Page){
								//ajout du nom de la location dans l'objet items_clefs
								$d['item_clef']->nom_location = $l->Nom_Page;
							}
						}
					$d['titre'] ="Administration des items_clefs";
				}
				$this->set($d);
				//on rend la vue --> adminedit
				$this->render('adminEdit');
			}

		}
	}

	function adminDelete($id) {
		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('item_clef');
			$this->loadModel('location');
			$ic = $this->item_clef->getImage($id);
			if (!$this->item_clef->deleteIC($id)) {
					echo "C PAS BON";
			} else {
			unlink('./webroot/img/'.$ic->Image_Page);
			echo "bravo";
			$d['titre'] ="Administration items clefs";
			$this->layout='admin';
			}
			$d['items_clefs'] = $this->item_clef->getAll();
			$d['location'] = $this->location->getAll();

			foreach($d['items_clefs'] as $i){
				foreach($d['location'] as $l){
					if($i->Id_Location == $l->Id_Page){
						//ajout du nom de la location dans l'objet items_clefs
						$i->nom_location = $l->Nom_Page;
					}
				}
			}
		 $this->set($d);
	 	 $this->render('adminIndex');
		}
	 }

	 function addCom($id){
		 if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			 $this->layout='admin';
		 }elseif ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 0){
			 $this->layout="log";
		 }else{
			 $this->layout='default';
		 }
		$this->loadModel('item_clef');
 		$this->loadModel('location');
 		$this->loadModel('commentary');
 		$this->loadModel('compte');
		$d = array();
		$date = $this->commentary->getDateNow();
		$add = array("Text_Commentaire"=>$_POST['Text_Commentaire'],"Date_Commentaire"=>$date[0]->Date, "Id_Page"=>$id, "Id_Compte"=>$_SESSION['compte']->Id_Compte);
		$this->commentary->save($add);
		$d['item_clef'] = $this->item_clef->getDetail($id);
		$d['location'] = $this->location->getAll();
		$d['commentaires'] = $this->commentary->getPageCommentaire($id);

		foreach ($d['commentaires'] as $comm)
		{
			$pseudo = $this->compte->getPseudo($comm->Id_Compte);
			$comm->pseudo = $pseudo->Pseudo_Compte;
		}

		foreach($d['location'] as $l){
			if($d['item_clef']->Id_Location == $l->Id_Page){
				//ajout du nom de la location dans l'objet items_clefs
				$d['item_clef']->nom_location = $l->Nom_Page;
			}
		}

		$d['titre'] = $d['item_clef']->Nom_Page;
		$this->set($d);

		$this->render('view');

	}

	 function delCom($id){
		 if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			 $this->layout='admin';
		 }elseif ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 0){
			 $this->layout="log";
		 }else{
			 $this->layout='default';
		 }


		 $this->loadModel('item_clef');
		 $this->loadModel('location');
		 $this->loadModel('commentary');
		 $this->loadModel('compte');
		 $d = array();
		 //on récupére l'id a delete
		 $idD = $_GET['idD'];
		 if (!$this->commentary->deleteCom($idD)) {
				 echo "C PAS BON";
		 } else
		 {
			 echo "bravo";
		 }

		$d['item_clef'] = $this->item_clef->getDetail($id);
 		$d['location'] = $this->location->getAll();
 		$d['commentaires'] = $this->commentary->getPageCommentaire($id);

 		foreach ($d['commentaires'] as $comm)
 		{
 			$pseudo = $this->compte->getPseudo($comm->Id_Compte);
 			$comm->pseudo = $pseudo->Pseudo_Compte;
 		}

 		foreach($d['location'] as $l){
 			if($d['item_clef']->Id_Location == $l->Id_Page){
 				//ajout du nom de la location dans l'objet items_clefs
 				$d['item_clef']->nom_location = $l->Nom_Page;
 			}
 		}

 		$d['titre'] = $d['item_clef']->Nom_Page;
 		$this->set($d);

 		$this->render('view');

 	}
	}
	?>
