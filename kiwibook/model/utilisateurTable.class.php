<?php

/* Classe Outils en lien avec l'entité utilisateur
	composée de méthodes statiques
*/

/**
 * Class utilisateurTable
 *
 * * @author Simon vivier
 */
class utilisateurTable
{
    public $utilisateurRepository;
    public $em;

// @author simon vivier
    public function __construct()
    {
        $this->em = dbconnection::getInstance()->getEntityManager();
        $this->utilisateurRepository = $this->em->getRepository('utilisateur');
    }

// @author simon vivier
    public function getUserByLoginAndPass($login, $pass)
    {
        return $this->utilisateurRepository->findOneBy(['identifiant' => $login, 'pass' => sha1($pass)]);
    }

// @author simon vivier
    public function getUsers($limit = 10, $offset = 0)
    {
        return $this->utilisateurRepository->findBy([], ['id' => 'DESC'], $limit, $offset);
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
