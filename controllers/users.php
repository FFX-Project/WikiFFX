<?php 
class users extends controller {
	
	function login() {
		
		$this->loadModel('user');
		
		if(!empty($_POST)){
			$user = $this->user->getUser($_POST["login"],$_POST["password"]);
			// echo "<PRE>";
			// print_r($user); 
			// echo "</PRE>";
			if (!empty($user)) {
				$this->Session->setFlash("connexion ok","success");
				$this->Session->write('User',$user);
			} else {
				$this->Session->setFlash("Problème d'identification!","danger");
			}
		}
		
		//$this->set($d);
		
		if ($this->Session->isLogged()) {
			$this->layout='admin';
			$this->render('loginok');
			
		} else {
			$this->render('login');
		}
		
	}


	function logout() {
		unset($_SESSION['User']);
		$this->layout='default';
		$this->render('login');
	}
}
?>