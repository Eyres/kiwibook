<?php

/* Classe Outils en lien avec l'entité chat
	composée de méthodes statiques
*/

class chatTable
{
    public $em;
    public $chatsRepository;

    public function __construct()
    {
        $this->em = dbconnection::getInstance()->getEntityManager();
        $this->chatsRepository = $this->em->getRepository('chat');
    }

    /**
     * Permet de retourner toutes les entrées de la table chat
     * @author Estelle Corsetti
     * @return array Ensemble d'objet de type chat
     */
    public function getChats()
    {
        return $this->chatsRepository->findAll();
    }

    /**
     * Permet de récupérer le dernier message posté sur le chat
     * @author Estelle Corsetti
     * @return array Un objet de type chat
     */
    public function getLastChats()
    {
        return $this->chatsRepository->findBy([], ['id' => 'DESC']);
    }


}

?>
