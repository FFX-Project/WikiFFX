<?php
class controller {
	var $vars = array();
	var $layout = "default";

	function __construct() {
		//chargement de tous nos modèles en mémoire
		if (isset($this->models)) {
			foreach ($this->models as $m) {
				$this->loadmodel($m);
			}
		}
		$this->Session = new Session();
	}

	 	function loadmodel($name) {
		require (ROOT."models/".strtolower($name).".php");
		//$this->name = new $name();
		//return new $name();
		$this->$name = new $name();
	}

	function render($filename) {

		extract($this->vars);

		ob_start();
		require(ROOT.'views/'.get_class($this).'/'. $filename.'.php');
		$content_for_layout = ob_get_clean();
		require(ROOT.'views/layout/'.$this->layout.'.php');
	}

	function set($d) {
		$this->vars = array_merge($this->vars, $d);
	}



}
?>
