<?php

/**
 * @Entity
 * @Table(name="fredouil.chat")
 */
class chat
{

    /** @Id @Column(type="integer")
     * @GeneratedValue
     */
    public $id;

    /**
     * @ManyToOne(targetEntity="ifacebook\model\Utilisateur\Utilisateur")
     * @JoinColumn(nullable=false, name="emetteur", referencedColumnName="id")
     */
    public $emetteur;

    /**
     * @OneToOne(targetEntity="ifacebook\model\Post\Post")
     * @JoinColumn(nullable=false, name="post", referencedColumnName="id")
     */
    public $post;

}

?>