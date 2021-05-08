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
		if (!empty($_GET['q']))
		{
			$d['resultat'] = $this->research->getRecherche($_GET['q']);
			foreach ($d['resultat'] as $r) {
				if ($this->research->getMonstre($r->Id_Page)) {
					$r->Type = "monstre";
				}
				else if ($this->research->getLocation($r->Id_Page)) {
					$r->Type = "location";
				}
				else if ($this->research->getItemClef($r->Id_Page)) {
					$r->Type = "item";
				}
			}
			if (count($d['resultat'])==0)
			{
				$d['titre'] = "Aucun résultat 😟";
			}
			else
			{
				$d['titre'] = count($d['resultat'])." résultat(s)";
			}
		}
		else
		{
			$d['titre'] = "Merci de faire une vraie recherche";
			$d['error'] = "https://media1.tenor.com/images/25de98179b16facea5deafd6b1867e98/tenor.gif";
		}

		$this->set($d);

		$this->render('index');
	}


}
?>