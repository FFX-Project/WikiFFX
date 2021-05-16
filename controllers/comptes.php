<?php
class comptes extends controller {

	var $models = array("compte");
//renvoie vers la vue index
	function index()
	{
		$this->loadModel('compte');
		$d = array();
		if(!empty($_POST))
		{
			$compte = $this->compte->getUser($_POST["login"],$_POST["password"]);
			// echo "<PRE>";
			// print_r($user);
			// echo "</PRE>";
			if (!empty($compte))
		  {
				$this->Session->setFlash("Connexion ok");
				$this->Session->write('compte', $compte);
				//echo "<PRE>";
				//print_r($_SESSION['compte']);
				//echo "</PRE>";
			} else
			{
				$this->Session->setFlash("Problème d'identifiant ou mot de passe", "danger");
			//	echo "Identifiant ou mot de passe incorrect";
			}
		}

   	if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1)
		{
			$this->layout='admin';
			//vue page accueil back office
			$this->render('loginok');
		} elseif ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 0)
		{
			$this->layout='log';
			$this->render('loginok');
		}else{
			$this->layout='default';
			$this->render('index');
		}

	}
//renvoie vers la vue inscription
	function inscription(){
		$this->layout='default';
		$this->render('inscription');
	}

	function InscriptionOk(){
		$this->loadModel('compte');
		//Si n'existe pas
		if(!$this->compte->IfPseudoExist($_POST['Pseudo_Compte'])){
			$this->layout='default';
			$tab = array("Pseudo_Compte"=>$_POST['Pseudo_Compte'], "Mdp_Compte"=>md5($_POST['Mdp_Compte']), "Email_Compte"=>$_POST['Email_Compte'], "Droit_Compte"=>0 );
			$this->compte->save($tab);
			$this->render('index');
		}//Si le pseudo existe
		else {
			$this->layout='default';
			$this->Session->setFlash("Nom de compte déjà pris !", "danger");
			$this->render('inscription');
		}
	}


	function logout() {
		unset($_SESSION['compte']);
		$this->layout='default';
		$this->render('index');
	}
}
?>
