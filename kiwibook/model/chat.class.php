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
     * @ManyToOne(targetEntity="utilisateur")
     * @JoinColumn(nullable=false, name="emetteur", referencedColumnName="id")
     */
    public $emetteur;

    /**
     * @OneToOne(targetEntity="post")
     * @JoinColumn(nullable=false, name="post", referencedColumnName="id")
     */
    public $post;

}

?>