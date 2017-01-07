<?php


class mainController
{

    public static function index($request, $context)
    {
        return context::SUCCESS;
    }

    public static function login($request, $context)
    {
        if (!empty($_REQUEST['pseudo']) || !empty($_REQUEST['password'])) {
            $login = $_REQUEST['pseudo'];
            $pass = $_REQUEST['password'];

            $em = new utilisateurTable();
            $user = $em->getUserByLoginAndPass($login, $pass);
            if (false === $user) {
                $context->notification = 'Veuillez vérifier votre mot de passe et votre identifiant.';

                return Context::ERROR;
            }

            Context::setSessionAttribute('id', $user->getId());

            $context->redirect('?action=index');
        }

        return Context::SUCCESS;
    }

    public static function mur($request, $context)
    {
        if ($context::getSessionAttribute('id')) {
            $messageTable = new messageTable();

            $context->__set('message', $messageTable->getMessages(10, 0));

            return Context::SUCCESS;
        }
    }

    public static function amis($request, $context)
    {
        if ($context::getSessionAttribute('id')) {
            $amisTable = new utilisateurTable();

            $context->__set('amis', $amisTable->getUsers(10, 0));

            return Context::SUCCESS;
        }
    }

    public static function profil($request, $context)
    {
        if ($context->getSessionAttribute('id')) {
            $utilisateurTable = new utilisateurTable();
            if (array_key_exists('id', $request)) {
                $context->data = $utilisateurTable->getUserByID($request['id']);
                $context->userId = $request['id'];
            } else {
                $context->data = $utilisateurTable->getUserByID($context->getSessionAttribute('id'));
                $context->userId = $context->getSessionAttribute('id');
            }

            return Context::SUCCESS;
        }
    }

    public static function editProfil($request, $context)
    {
        if ($context->getSessionAttribute('id')) {

            if (array_key_exists('statut', $request) && $_FILES !== null) {
                $utilisateurTable = new utilisateurTable();
                $user = $utilisateurTable->getUserByID($context->getSessionAttribute('id'));

                if ($_REQUEST['statut'] !== '') {
                    $user->setStatut($_REQUEST['statut']);
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
                        move_uploaded_file(
                            $_FILES['avatar']['tmp_name'],
                            $folder.$_FILES['avatar']['name'].$tmp.'.'.$extensionUpload
                        );
                        $user->avatar = $image;
                    }
                }
                $utilisateurTable->update($user);
                $context->redirect('?action=profil');
            }
        }
        return Context::SUCCESS;
    }

}
