<?php

/* Classe Outils en lien avec l'entité message
	composée de méthodes statiques
*/

class messageTable {
private static $_instance = null;
public $em;
public $messageRepository;
private function __construct(){
        $this->em = dbconnection::getInstance()->getEntityManager() ;
        $this->messageRepository = $this->em->getRepository('message');
}

public static function getInstance() {

if(is_null(self::$_instance)) {
    self::$_instance = new messageTable();  
}
    return self::$_instance;
}

public function getMessagesByDestinataire($user)
{return $this->messageRepository->findByDestinataire($user->id);}

public function getMessagesByParent($user)
{return $this->messageRepository->findByParent($user->id);}

public function getMessagesByEmetteur($user)
{return $this->messageRepository->findByEmetteur($user->id);}

public function getMessages()
{return $this->messageRepository->findAll();}

public function getLastMessages()
{return $this->messageRepository->findAll([],['id' => 'DESC']);}

}

?>