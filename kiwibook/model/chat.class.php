<?php

/**
 * @Entity
 * @Table(name="fredouil.chat")
 *
 * @author
 */
class chat
{

    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;

    /**
     * @ManyToOne(targetEntity="utilisateur")
     * @JoinColumn(nullable=false, name="emetteur", referencedColumnName="id")
     */
    protected $emetteur;

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
     * @return chat
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
     * @return chat
     */
    public function setEmetteur($emetteur)
    {
        $this->emetteur = $emetteur;

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
     * @return chat
     */
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }
}

?>