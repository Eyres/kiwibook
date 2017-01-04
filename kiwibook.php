<?php

//nom de l'application
$nameApp = "kiwibook";

// Inclusion des classes et librairies
require_once 'lib/core.php';
require_once $nameApp.'/controller/mainController.php';
require_once $nameApp.'/controller/ajaxController.php';


//action par défaut
$action = "index";

if(key_exists("action", $_REQUEST))
	$action =  $_REQUEST['action'];

session_start();

$context = context::getInstance();
$context->init($nameApp);

$view=$context->executeAction($action, $_REQUEST);

if($view===false){
	echo "Une grave erreur s'est produite, il est probable que l'action ".$action." n'existe pas...";
	die;
} elseif($view != context::NONE) {
	$template_view = $nameApp."/view/".$action."/".$action.$view.".php";
	include($nameApp."/view/".$context->getLayout().".php");
} else {
	echo $view;
}
?>
