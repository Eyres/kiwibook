<?php

/* Classe Outils en lien avec l'entité message
	composée de méthodes statiques
*/

class messageTable
{
    public $em;
    public $messageRepository;

    public function __construct()
    {
        $this->em = dbconnection::getInstance()->getEntityManager();
        $this->messageRepository = $this->em->getRepository('message');
    }

    public function getMessagesByDestinataire($user)
    {
        return $this->messageRepository->findByDestinataire($user->id);
    }

    public function getMessagesByParent($user)
    {
        return $this->messageRepository->findByParent($user->id);
    }

    public function getMessagesByEmetteur($user)
    {
        return $this->messageRepository->findByEmetteur($user->id);
    }

    public function getMessages()
    {
        return $this->messageRepository->findAll();
    }

    //todo mettre une limit pour pas charger toutes la bdd et faire une pagination pour la page..
    public function getLastMessages()
    {
        return $this->messageRepository->findAll([], ['id' => 'DESC']);
    }

}

?>
