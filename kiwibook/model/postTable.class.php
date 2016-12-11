<?php

/* Classe Outils en lien avec l'entité post
	composée de méthodes statiques
*/

class postTable {
private static $_instance = null;
public $postRepository;
public $em;
private function __construct(){
        $this->em = dbconnection::getInstance()->getEntityManager() ;
        $this->postRepository = $this->em->getRepository('post');
}

public function getInstance() {
    if(is_null(self::$_instance)) {
        self::$_instance = new postTable();  
    }
        return self::$_instance;
}
public function getPostByID($ID)
{return $this->postRepository->findOneById($ID);}

// public function getPostByIDDesc($ID)
// {return $this->postRepository->findBy($ID, ['id' => 'DESC']);}
}
?>