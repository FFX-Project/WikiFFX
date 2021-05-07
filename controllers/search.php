<?php
class search extends controller {

	function index() {
		if ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 1){
			$this->layout='admin';
		}elseif ($this->Session->isLogged() && $_SESSION['compte']->Droit_Compte == 0){
			$this->layout="log";
		}else{
			$this->layout='default';
		}
		$d=array();
		$this->loadModel('research');

		$d['resultat'] = $this->research->getRecherche($_POST['q']);

		$this->set($d);

		$this->render('index');
	}


}
?>