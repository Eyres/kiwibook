<?php

/**
 * @Entity
 * @Table(name="fredouil.utilisateur")
 */
class utilisateur implements JsonSerializable
{

    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;

    /** @Column(type="string", length=45) */
    protected $identifiant;

    /** @Column(type="string", length=45) */
    protected $pass;

    /** @Column(type="string", length=45) */
    protected $nom;

    /** @Column(type="string", length=45) */
    protected $prenom;

    /** @Column(type="string", length=100) */
    protected $statut;

    /** @Column(type="string", length=200) */
    protected $avatar;

    /** @Column(type="datetime") */
    protected $date_de_naissance;

    public function jsonSerialize()
    {
        return json_encode(get_object_vars($this));
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return utilisateur
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * @param mixed $identifiant
     * @return utilisateur
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     * @return utilisateur
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     * @return utilisateur
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     * @return utilisateur
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateDeNaissance()
    {
        return $this->date_de_naissance;
    }

    /**
     * @param mixed $date_de_naissance
     * @return utilisateur
     */
    public function setDateDeNaissance($date_de_naissance)
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

}

?>
