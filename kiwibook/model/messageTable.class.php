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
        return $this->messageRepository->findByDestinataire($user->getId());
    }

    public function getMessagesByParent($user)
    {
        return $this->messageRepository->findByParent($user->getId());
    }

    public function getMessagesByEmetteur($user)
    {
        return $this->messageRepository->findByEmetteur($user->getId());
    }

    public function getMessages($limit = 10, $offset = 0)
    {
        return $this->messageRepository->findBy([], ['id' => 'DESC'], $limit, $offset);
    }
}

?>
