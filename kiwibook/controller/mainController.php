<?php

class mainController
{
    public static function index($request, $context)
    {
        $context->message = null;

        return context::SUCCESS;
    }

    public static function login($request, $context)
    {

        if (!empty($_POST['pseudo']) || !empty($_POST['password'])) {
            $utilisateurTable = utilisateurTable::getInstance();
            $user = $utilisateurTable->getUserByLoginAndPass($_POST['pseudo'], $_POST['password']);
            if ($user) {
                $context->message = "Bonjour ".$_POST['pseudo']."!";
                Context::setSessionAttribute('id', $user->id);
                $context->user = $user;;

                return context::SUCCESS;
            } else {
                $context->message = "Vous n'avez pas été identifié";

                return context::ERROR;

            }
        } else {
            $context->message = "Premiere connexion";

            return context::ERROR;
        }
    }

    public static function logout($request, $context)
    {
        session_destroy();
        $context->message = "Vous êtes bien déconnecté";

        return $context->jsonSerialize();
    }

//TODO recuperer les messages de l'utilisateur courrant
    public static function showMessage($request, $context)
    {
        $messageTable = messageTable::getInstance();
        $chatTable = chatTable::getInstance();
        $utilisateurTable = utilisateurTable::getInstance();
        $postTable = postTable::getInstance();

        $messages = $messageTable->getLastMessages();
        $messagesList = array();
        foreach ($messages as $key => $message) {
            $messagesList[$message->id] = array();
            $messagesList[$message->id]['message'] = $message;
            $messagesList[$message->id]['destinataire'] = $utilisateurTable->getUserByID($message->destinataire);
            $messagesList[$message->id]['emetteur'] = $utilisateurTable->getUserByID($message->emetteur);
            $messagesList[$message->id]['post'] = $postTable->getPostByID($message->post);
        }
        $context->messages = $messagesList;

        return Context::SUCCESS;
    }

    public static function showUsers($request, $context)
    {
        $utilisateurTable = utilisateurTable::getInstance();
        $context->data = $utilisateurTable->getUsers();

        return Context::SUCCESS;
    }

    public static function showChats($request, $context)
    {
        $chatTable = chatTable::getInstance();
        $utilisateurTable = utilisateurTable::getInstance();
        $postTable = postTable::getInstance();

        $chats = $chatTable->getLastChats();
        $chatsList = array();
        foreach ($chats as $key => $chat) {
            $chatsList[$chat->id] = array();
            $chatsList[$chat->id]['emetteur'] = $utilisateurTable->getUserByID($chat->emetteur);
            $chatsList[$chat->id]['post'] = $postTable->getPostByID($chat->post);
        }
        $context->chats = $chatsList;

        return Context::SUCCESS;
    }

    public static function profil($request, $context)
    {
        if (array_key_exists('id', $request)) {
            $utilisateurTable = utilisateurTable::getInstance();
            $context->data = $utilisateurTable->getUserByID($request['id']);
            $context->userId = $request['id'];
        } else {
            $utilisateurTable = utilisateurTable::getInstance();
            $context->data = $utilisateurTable->getUserByID(Context::getSessionAttribute('id'));
            $context->userId = Context::getSessionAttribute('id');
        }

        return Context::SUCCESS;
    }

    public static function editProfil($request, $context)
    {
        if (array_key_exists('statut', $request) && $_FILES !== null) {
            $utilisateurTable = utilisateurTable::getInstance();
            $user = $utilisateurTable->getUserByID($context::getSessionAttribute('id'));
            if ($request['statut'] !== '') {
                $user->statut = $request['statut'];
            }
            if ($_FILES['avatar']['error'] === 0 && $_FILES['avatar']['name'] !== "") {
                $image = 'https://pedago.univ-avignon.fr/~uapv1401701/kiwibook/image/'.$_FILES['avatar']['name'];
                $folder = 'image/';
                $tmp = time();
                $infosFichier = pathinfo($_FILES['avatar']['name']);
                $extensionUpload = $infosFichier['extension'];
                $extensionsAutorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extensionUpload, $extensionsAutorisees)) {
                    $image .= $_FILES['avatar']['name'].$tmp.'.'.$extensionUpload;
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $folder.$_FILES['avatar']['name'].$tmp.'.'.$extensionUpload);
                    $user->avatar = $image;
                }
            }
            $utilisateurTable->update($user);
        }

        return Context::SUCCESS;
    }

}
