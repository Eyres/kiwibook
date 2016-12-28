<?php


class mainController{

public static function login($request,$context){
    if (array_key_exists('form', $request)) {
        $login = $request['form']['login'];
        $pass = $request['form']['pass'];
        //Recup l'utilisateur avec get...
        $em = new utilisateurTable();
        $user = $em->getUserByLoginAndPass($login,$pass);
        if (false === $user) {
            $context->notification = 'Veuillez vérifier votre mot de passe et votre identifiant.' ;

            return Context::ERROR;
        }
        Context::setSessionAttribute('id', $user->getId());

        $context->redirect('?action=index');
    }
    return Context::SUCCESS;
}

public static function index($request,$context){
	return context::SUCCESS;
}

}
