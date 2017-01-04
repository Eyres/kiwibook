<?php

/** 
 * @Entity
 * @Table(name="fredouil.message")
 *
 */
class message {

	/** @Id @Column(type="integer") @GeneratedValue */
	protected $id;

    /** @Column(type="integer") */
    protected $aime;

    /**
     * @ManyToOne(targetEntity="utilisateur")
     * @JoinColumn(nullable=false, name="emetteur", referencedColumnName="id")
     */
    protected $emetteur;

    /**
     * @ManyToOne(targetEntity="utilisateur")
     * @JoinColumn(nullable=false, name="destinataire", referencedColumnName="id")
     */
    protected $destinataire;

    /**
     * @OneToOne(targetEntity="utilisateur")
     * @JoinColumn(nullable=true, name="parent", referencedColumnName="id")
     */
	protected $parent;

    /**
     * @OneToOne(targetEntity="post")
     * @JoinColumn(nullable=false, name="post", referencedColumnName="id")
     */
	protected $post;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return message
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmetteur()
    {
        return $this->emetteur;
    }

    /**
     * @param mixed $emetteur
     * @return message
     */
    public function setEmetteur($emetteur)
    {
        $this->emetteur = $emetteur;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * @param mixed $destinataire
     * @return message
     */
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     * @return message
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     * @return message
     */
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAime()
    {
        return $this->aime;
    }

    /**
     * @param mixed $aime
     * @return message
     */
    public function setAime($aime)
    {
        $this->aime = $aime;

        return $this;
    }
	
}

?>