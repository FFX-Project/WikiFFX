<?php
class users extends controller {

	var $models = array("user");

	function index() {
		$d=array();
		if(!empty($_POST))
		{
				$user = $this->user->getUser($_POST['login'], $_POST['password']);
				//si login et mdp ok
				if(!empty($user)) {
					$this->Session->setFlash("Connexion ok");
					$this->Session->write("User", $user);
					//echo "<PRE>";
					//print_r($_SESSION['User']);
					//echo "</PRE>";
				} else {
					$this->Session->setFlash("Identifiant ou mot de passe incorrect", "danger");
				}
		}

		$this->set($d);
		//si login et mot de passe ok (si isLogged retourne vrai)
		if($this->Session->isLogged()){
			$this->layout='admin';
			//vue page d'accueil back office
			$this->render('loginok');
		}else {
			//Vue formulaire vierge
			$this->render('index');
		}
	}

	function loginok($id){
	//	$this->category = $this->loadmodel('category');
		$d['user'] = $this->user->getlogin($id);
		$d['titre'] = "Détail catégories";

		$this->set($d);
		//je rend la vue view
		$this->render('view');
	}

	function logout(){
		unset($_SESSION['User']);
		$this->layout='default';
		$this->render('index');
	}
}
?>
