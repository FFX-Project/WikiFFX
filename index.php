<?php
//index.php : dispatcher / routeur : pour aiguiller
define('WEBROOT', str_replace('index.php', '', $_SERVER['REQUEST_URI']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
//echo "WEBROOT:".WEBROOT.'<br>';
//echo "ROOT:".ROOT.'<br>';

require(ROOT.'config/conf.php');
require(ROOT.'core/model.php');
require(ROOT.'core/controller.php');
require(ROOT.'core/session.php');

$chemin = explode("/", WEBROOT);

define('WEBROOT2', $chemin[1]);

if (isset($_GET['p'])) {
//	echo "get p:".$_GET['p'].'<br>';
	$params = explode("/", $_GET['p']);
} else {
	$params = array("","");
}

//echo "<PRE>";
//print_r($params);
//echo "</PRE>";

$controller=$params[0];
if (empty($params[0])){
	$controller="accueil";
}else {
	$controller=$params[0];
}

//echo "controller:".$controller."<br>";



if (empty($params[1])) {
	$action="index";
}else {
	$action=$params[1];
}

//echo "action:".$action."<br>";

require(ROOT.'controllers/'.$controller.'.php');
//instanciation de mon controller
$controller = new $controller();



if(method_exists($controller, $action)) {
	//$controller->$action();
	unset($params[0]);
	unset($params[1]);

	call_user_func_array(array($controller, $action), $params);
} else {
	echo "erreur 404";
}
?>
