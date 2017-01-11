<?php

/* Classe Outils en lien avec l'entité post
	composée de méthodes statiques
*/

class postTable
{
    public $postRepository;
    public $em;

    public function __construct()
    {
        $this->em = dbconnection::getInstance()->getEntityManager();
        $this->postRepository = $this->em->getRepository('post');
    }

    public function getPostByID($ID)
    {
        return $this->postRepository->findOneById($ID);
    }

    public function create($post)
    {
        $this->em->persist($post);
        $this->em->flush();
    }

// public function getPostByIDDesc($ID)
// {return $this->postRepository->findBy($ID, ['id' => 'DESC']);}
}

?>