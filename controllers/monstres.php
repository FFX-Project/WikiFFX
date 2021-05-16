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
		$d=array();

		$this->loadModel('monstre');

		$d['mtrs'] = $this->monstre->getAll();
		$d['titre'] = "Liste des monstres";

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
		$this->loadModel('monstre');
		$this->loadModel('commentary');
		$this->loadModel('compte');

		$d['mtr'] = $this->monstre->getDetail($id);
		$d['mtrelem'] = $this->monstre->getDetailElementaire($id);
		$d['mtrlieu'] = $this->monstre->getDetailLieux($id);
		$d['commentaires'] = $this->commentary->getPageCommentaire($id);

		foreach ($d['commentaires'] as $comm)
		{
			$pseudo = $this->compte->getPseudo($comm->Id_Compte);
			$comm->pseudo = $pseudo->Pseudo_Compte;
		}

		foreach ($d['mtrelem'] as $ele)
		{
			$nom = $ele->Nom_Elementaire;
			$d['mtr']->$nom = $ele->Nom_Variante;
		}

		foreach ($d['mtrlieu'] as $lieu)
		{
			$d['mtr']->lieux[$lieu->Id_Page] = $lieu->Nom_Page;
		}

		$this->set($d);

		$this->render('view');

	}

	function adminIndex() {

		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->layout='admin';

			$this->loadModel("monstre");

			$d=array();
			$d['mtrs'] = $this->monstre->getAll();

			$d['titre'] ="Administration monstres";

			$this->set($d);


			$this->layout='admin';
			//on rend la vue --> adminIndex
			$this->render('adminIndex');
		}
	}

	function adminEdit($id=null) {

		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('monstre');
			$this->loadModel('location');
			$this->loadModel('varianteelem');

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
								//add
								$nomimage=$this->monstre->getTable().'_'.$this->monstre->getNewId().'.'.$extension;
							} else {
								//update
								$nomimage=$this->monstre->getTable().'_'.$_POST['id'].'.'.$extension;
								$mtr=$this->monstre->getImage($_POST['id']);
								unlink('./webroot/img/'.$mtr->Image_Page);
							}
							//on télécharge le fichier avec move_uploaded_file
							if(move_uploaded_file($_FILES['fichier']['tmp_name'],'./webroot/img/'.$nomimage))
							{
								//on renseigne $_POST image pour le save
								$_POST['Image_Page']=$nomimage;
								$this->Session->setFlash("Upload réussi", "success");
							}
							else{
								$this->Session->setFlash("Un problème est survenu", "danger");
							}
						}
					}
				}
				unset($_POST['fichier']);
				$from = "page";
				$Nid = "Id_Page";
				if (empty($_POST['id'])) {
					$this->monstre->addMtr($_POST,$from,$Nid);
				} else {
					$this->monstre->UpdateMtr($_POST,$from,$Nid);
				}
				$this->Session->setFlash("Votre mise à jour a bien été prise en compte");
				$d['mtrs'] = $this->monstre->getAll();
				$d['titre'] ="Administration des monstres";
				$this->set($d);
				//on rend la vue --> adminindex
				$this->render('adminIndex');
			} else {
				$d=array();
					$d['location'] = $this->location->getAll();
					$d['elems'] = $this->varianteelem->getAll();
				if(!empty($id)) {
					//on remplit form
					//on récupère les données de mon id
					$d['mtr'] = $this->monstre->getDetail($id);
					$d['mtrelem'] = $this->monstre->getDetailElementaire($id);
					$d['mtrlieu'] = $this->monstre->getDetailLieux($id);
					foreach ($d['mtrelem'] as $ele)
					{
						$nom = $ele->Nom_Elementaire;
						$d['mtr']->$nom = $ele->Nom_Variante;
					}

					foreach ($d['mtrlieu'] as $lieu)
					{
						$d['mtr']->lieux[$lieu->Id_Page] = $lieu->Nom_Page;
					}
				}
				$this->set($d);
				//on rend la vue --> adminedit
				$this->render('adminEdit');
			}

		}
	}

	function adminDelete($id) {
		//on vérifié les droits
		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('monstre');
			// on récupere l'image
			$mtr = $this->monstre->getImage($id);
			if (!$this->monstre->deleteMtr($id)) {
				$this->Session->setFlash("Suppression impossible", "danger");
			} else {
				//On éfface l'image du monstre dans webroot
			unlink('./webroot/img/'.$mtr->Image_Page);
		  $this->Session->setFlash("Suppression réussi", "success");
			$d['titre'] ="Administration des monstres";
			$this->layout='admin';
			}
			$d['mtrs'] = $this->monstre->getAll();

			$d['titre'] ="Administration monstres";

			$this->set($d);
	 	 $this->render('adminIndex');
		}
	}

	function adminGestionLoc($id){
		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->layout='admin';

			$this->loadModel("monstre");

			$d=array();
			$d['mtr'] = $this->monstre->getDetail($id);
			$d['mtrlieu'] = $this->monstre->getDetailLieux($id);
			$d['titre'] ="Administration des locations des monstres";

			$this->set($d);


			$this->layout='admin';
			//on rend la vue --> index
			$this->render('adminGestionLoc');
		}
	}
//on récupere l'id de la view à afficher
	function adminDeleteLoc($id){
		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->loadModel('monstre');
			//on récupére l'id a delete
			$id2 = $_GET['id2'];
			if (!$this->monstre->deleteLocMtr($id, $id2)) {
				$this->Session->setFlash("Suppression impossible", "danger");
			} else {
			  $this->Session->setFlash("Suppression réussi", "success");
				$d['titre'] ="Administration des locations des monstres";
				$this->layout='admin';
			}
			$d['mtr'] = $this->monstre->getDetail($id);
			$d['mtrlieu'] = $this->monstre->getDetailLieux($id);

			$this->set($d);
	 	 $this->render('adminGestionLoc');
		}
	}
//Cette fonction a pour but de lier les monstres avec certaines location.
	function adminAddLoc($id=null){
			if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			if(empty($_POST)){
			$this->loadModel('monstre');
			$this->loadModel('location');
			$this->layout="admin";
			$d=array();
			$d['locs'] = $this->location->getAll();
			$d['mtr'] = $this->monstre->getDetail($id);
			$d['mtrlieu'] = $this->monstre->getDetailLieux($id);

			foreach ($d['mtrlieu'] as $lieu)
			{
				$d['mtr']->lieux[$lieu->Id_Page] = $lieu->Nom_Page;
			}

			$this->set($d);
			//on rend la vue --> adminedit
			$this->render('adminAddLoc');
		}else{
			$this->layout='admin';
			$this->loadModel("monstre");
			//Appel de la fonction pour ajouter une location à un monstre
			$from = "a";
			$this->monstre->addLocMtr($_POST, $from);
			$d=array();
			$d['mtr'] = $this->monstre->getDetail($id);
			$d['mtrlieu'] = $this->monstre->getDetailLieux($id);
			$d['titre'] ="Administration des locations des monstres";

			$this->set($d);


			$this->layout='admin';
			//on rend la vue --> index
			$this->render('adminGestionLoc');
			}
		}
	}
//Ajout d'un commentaire
	function addCom($id){
		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->layout='admin';
		}elseif ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 0){
			$this->layout="log";
		}else{
			$this->layout='default';
		}

		$this->loadModel('monstre');
		$this->loadModel('commentary');
		$this->loadModel('compte');
		$d = array();
		$date = $this->commentary->getDateNow();
		$add = array("Text_Commentaire"=>$_POST['Text_Commentaire'],"Date_Commentaire"=>$date[0]->Date, "Id_Page"=>$id, "Id_Compte"=>$_SESSION['compte']->Id_Compte);

		/*echo "<pre>";
		print_r($add);
		echo "</pre>";*/

		$this->commentary->save($add);
		$d['mtr'] = $this->monstre->getDetail($id);
		$d['mtrelem'] = $this->monstre->getDetailElementaire($id);
		$d['mtrlieu'] = $this->monstre->getDetailLieux($id);
		$d['commentaires'] = $this->commentary->getPageCommentaire($id);

		foreach ($d['commentaires'] as $comm)
		{
			$pseudo = $this->compte->getPseudo($comm->Id_Compte);
			$comm->pseudo = $pseudo->Pseudo_Compte;
		}

		foreach ($d['mtrelem'] as $ele)
		{
			$nom = $ele->Nom_Elementaire;
			$d['mtr']->$nom = $ele->Nom_Variante;
		}

		foreach ($d['mtrlieu'] as $lieu)
		{
			$d['mtr']->lieux[$lieu->Id_Page] = $lieu->Nom_Page;
		}

		$this->set($d);

		$this->render('view');
	}
//Efface un commentaire choisi
	function delCom($id){
		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->layout='admin';
		}elseif ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 0){
			$this->layout="log";
		}else{
			$this->layout='default';
		}

		$this->loadModel('monstre');
		$this->loadModel('commentary');
		$this->loadModel('compte');
		$d = array();
		$idD = $_GET['idD'];
		//echo ($idD);
		//echo ($id);
		if (!$this->commentary->deleteCom($idD)) {
				$this->Session->setFlash("Suppression impossible", "danger");
		} else
		{
			$this->Session->setFlash("Suppression réussi", "success");
		}
		$d['mtr'] = $this->monstre->getDetail($id);
		$d['mtrelem'] = $this->monstre->getDetailElementaire($id);
		$d['mtrlieu'] = $this->monstre->getDetailLieux($id);
		$d['commentaires'] = $this->commentary->getPageCommentaire($id);

		foreach ($d['commentaires'] as $comm)
		{
			$pseudo = $this->compte->getPseudo($comm->Id_Compte);
			$comm->pseudo = $pseudo->Pseudo_Compte;
		}

		foreach ($d['mtrelem'] as $ele)
		{
			$nom = $ele->Nom_Elementaire;
			$d['mtr']->$nom = $ele->Nom_Variante;
		}

		foreach ($d['mtrlieu'] as $lieu)
		{
			$d['mtr']->lieux[$lieu->Id_Page] = $lieu->Nom_Page;
		}

		$this->set($d);

		$this->render('view');
	}
}
?>
