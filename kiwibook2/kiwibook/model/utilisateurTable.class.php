<?php

/* Classe Outils en lien avec l'entité utilisateur
	composée de méthodes statiques
*/

class utilisateurTable
{
	protected $utilisateurRepository;
	protected $em;

	/**
	 * @return \Doctrine\ORM\EntityManager|null
	 */
	public function getEm()
	{
		return $this->em;
	}

	/**
	 * @param \Doctrine\ORM\EntityManager|null $em
	 * @return utilisateurTable
	 */
	public function setEm($em)
	{
		$this->em = $em;

		return $this;
	}

	/**
	 * @return \Doctrine\ORM\EntityRepository
	 */
	public function getUtilisateurRepository()
	{
		return $this->utilisateurRepository;
	}

	/**
	 * @param \Doctrine\ORM\EntityRepository $utilisateurRepository
	 * @return utilisateurTable
	 */
	public function setUtilisateurRepository($utilisateurRepository)
	{
		$this->utilisateurRepository = $utilisateurRepository;

		return $this;
	}

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
