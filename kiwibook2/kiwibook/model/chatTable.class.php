<?php

/* Classe Outils en lien avec l'entité chat
	composée de méthodes statiques
*/

class chatTable
{
    private static $_instance = null;
    public $em;
    public $chatsRepository;

    private function __construct()
    {
        $this->em = dbconnection::getInstance()->getEntityManager();
        $this->chatsRepository = $this->em->getRepository('chat');
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new chatTable();
        }

        return self::$_instance;
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
