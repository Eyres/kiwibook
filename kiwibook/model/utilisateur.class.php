<?php

/**
 * @Entity
 * @Table(name="fredouil.utilisateur")
 */
class utilisateur
{

    /** @Id @Column(type="integer")
     * @GeneratedValue
     */
    public $id;

    /**
     * @Column(type="string", length=45)
     * @var string $identifiant
     */
    public $identifiant;

    /**
     * @Column(type="string", length=45)
     * @var string $pass
     */
    public $pass;

    /**
     * @Column(type="string", length=45)
     * @var string $nom
     */
    public $nom;

    /**
     * @Column(type="string", length=45)
     * @var string $prenom
     */
    public $prenom;

    /**
     * @Column(type="string", length=100)
     * @var string $statut
     */
    public $statut;

    /**
     * @Column(type="string", length=200)
     * @var string $avatar
     */
    public $avatar;

    /**
     * @Column(type="datetime")
     * @var \DateTime $date_de_naissance
     */
    public $date_de_naissance;

}

?>
