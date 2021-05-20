<?php
class controller
{
	var $vars = array();
	var $layout = "default";
	
	function __construct()
	{
		$this->Session = new Session();
	}
	
	function render ($filename)
	{
		//on fait passer nos données à la vue
		extract($this->vars);
		//je démarre la mise en mémoire tampon
		ob_start();
		
		require(ROOT.'views/'.get_class($this).'/'.$filename.'.php');
		$content_for_layout = ob_get_clean();
		require(ROOT.'views/layout/'.$this->layout.'.php');
	}
	
	
	function set ($d)
	{
		//on fusionne nos données venant du (modèle/la classe fille) 
		//avec les données de la classe mère ($vars)
		$this->vars = array_merge($this->vars, $d);	
	}

	function loadModel($name)
	{
		//chargement du model
		require (ROOT."models/".$name.".php");
		//on cree une propriété "à la volée" contenant l'objet instancié model
		$this->$name = new $name();
	}
}
?>