<?php
class comptes extends controller {

	var $models = array("compte");

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
				echo "Identifiant ou mot de passe incorrect";
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


	function logout() {
		unset($_SESSION['compte']);
		$this->layout='default';
		$this->render('index');
	}
}
?>
