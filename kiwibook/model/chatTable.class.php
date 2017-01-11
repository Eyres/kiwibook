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
     * @param null $limit
     * @return array Un objet de type chat
     */
    public function getLastChats($limit = null)
    {
        return $this->chatsRepository->findBy([], ['id' => 'DESC'], $limit);
    }

    /**
     * @param $chat
     */
    public function create($chat)
    {
        $this->em->persist($chat);
        $this->em->flush();
    }
}

?>
