<?php

class mainController{

public static function helloWorld($request,$context){
    $context->mavariable="hello world";
        $context->message = null;
    return context::SUCCESS;
}

public static function index($request,$context){
        $context->message = null;
    return context::SUCCESS;
}

public static function login($request,$context){
    
    if(!empty($_POST['pseudo']) || !empty($_POST['password'])) {
        $utilisateurTable = utilisateurTable::getInstance();
        $user = $utilisateurTable->getUserByLoginAndPass($_POST['pseudo'],$_POST['password']);
        if($user){
            $context->message = "Bonjour ".$_POST['pseudo']."!";
            Context::setSessionAttribute('id', $user->id);
            $context->user = $user;;
            return context::SUCCESS;
        }
        else {   
            $context->message = "Vous n'avez pas été identifié";
            return context::ERROR;
            
        }
    }
    else {
        $context->message = "Premiere connexion";
        return context::ERROR;
    }
}

public static function logout($request,$context){
        session_destroy();
        $context->message = "Vous êtes bien déconnecté";
        return $context->jsonSerialize();
}
//TODO recuperer les messages de l'utilisateur courrant
public static function showMessage($request,$context){
        $messageTable = messageTable::getInstance();
        $chatTable = chatTable::getInstance();
        $utilisateurTable = utilisateurTable::getInstance();
        $postTable = postTable::getInstance();
        
        $messages = $messageTable->getLastMessages();
        $messagesList = array();
        foreach ($messages as $key=>$message) {
            $messagesList[$message->id] = array();
            $messagesList[$message->id]['message'] = $message;
            $messagesList[$message->id]['destinataire'] = $utilisateurTable->getUserByID($message->destinataire);
            $messagesList[$message->id]['emetteur'] = $utilisateurTable->getUserByID($message->emetteur);
            $messagesList[$message->id]['post'] = $postTable->getPostByID($message->post);
        }
        $context->messages = $messagesList;
        return Context::SUCCESS;
}

public static function showUsers($request,$context){
        $utilisateurTable = utilisateurTable::getInstance();
        $context->data = $utilisateurTable->getUsers();
        return Context::SUCCESS;
}

public static function showChats($request,$context){
        $chatTable = chatTable::getInstance();
        $utilisateurTable = utilisateurTable::getInstance();
        $postTable = postTable::getInstance();
        
        $chats = $chatTable->getLastChats();
        $chatsList = array();
        foreach ($chats as $key=>$chat) {
            $chatsList[$chat->id] = array();
            $chatsList[$chat->id]['emetteur'] = $utilisateurTable->getUserByID($chat->emetteur);
            $chatsList[$chat->id]['post'] = $postTable->getPostByID($chat->post);
        }
        $context->chats = $chatsList;
        return Context::SUCCESS;
}



}
