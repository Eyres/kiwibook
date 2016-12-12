<?php

/* Classe Outils en lien avec l'entité utilisateur
	composée de méthodes statiques

*/

class utilisateurTable
{
    private static $_instance = null;
    public $utilisateurRepository;
    public $em;

// @author simon vivier
    private function __construct()
    {
        $this->em = dbconnection::getInstance()->getEntityManager();
        $this->utilisateurRepository = $this->em->getRepository('utilisateur');
    }

// @author simon vivier
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new utilisateurTable();
        }

        return self::$_instance;
    }

// @author simon vivier
    public function getUserByLoginAndPass($login, $pass)
    {
        return $this->utilisateurRepository->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass)));
    }

// @author simon vivier
    public function getUsers()
    {
        return $this->utilisateurRepository->findAll();
    }

// @author simon vivier
    public function getUserByID($ID)
    {
        return $this->utilisateurRepository->findOneById($ID);
    }

    public function update($user)
    {
        $this->em->merge($user);
        $this->em->flush();
    }
}

?>
