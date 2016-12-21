<?php

//nom de l'application
$nameApp = "kiwibook";

// Inclusion des classes et librairies
require_once 'lib/core.php';
require_once $nameApp.'/controller/mainController.php';


//action par défaut
$action = "index";

if(key_exists("action", $_REQUEST))
	$action =  $_REQUEST['action'];

session_start();

$context = context::getInstance();
$context->init($nameApp);
$menu_view = $nameApp."/view/fixedView/menu.php";
$notif_view = $nameApp."/view/fixedView/notifBar.php";
$chat_view = $nameApp."/view/fixedView/chat.php";

$view = $context->executeAction($action, $_REQUEST); 

//traitement des erreurs de bases, reste a traiter les erreurs d'inclusion
if($view===false){
	echo "Une grave erreur s'est produite, il est probable que l'action ".$action." n'existe pas...";
	die;
}

//inclusion du layout qui va lui meme inclure le template view
elseif($view!=context::NONE){

	$template_view=$nameApp."/view/".$action."/".$action.$view.".php";
	include($nameApp."/view/".$context->getLayout().".php");
}
else{
    echo $view;
}

?>