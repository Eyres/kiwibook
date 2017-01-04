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

}
