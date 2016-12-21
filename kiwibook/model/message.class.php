<?php

/** 
 * @Entity
 * @Table(name="fredouil.message")
 *
 */
class message {

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

    /**
     * @ManyToOne(targetEntity="ifacebook\model\Utilisateur\Utilisateur")
     * @JoinColumn(nullable=false, name="emetteur", referencedColumnName="id")
     */
    public $emetteur;

    /**
     * @ManyToOne(targetEntity="ifacebook\model\Utilisateur\Utilisateur")
     * @JoinColumn(nullable=false, name="destinataire", referencedColumnName="id")
     * @var Utilisateur $destinataire
     */
    public $destinataire;

    /**
     * @OneToOne(targetEntity="ifacebook\model\Utilisateur\Utilisateur")
     * @JoinColumn(nullable=true, name="parent", referencedColumnName="id")
     * @var Utilisateur $parent
     */
	public $parent;

    /**
     * @OneToOne(targetEntity="ifacebook\model\Post\Post")
     * @JoinColumn(nullable=false, name="post", referencedColumnName="id")
     * @var Post $post
     */
	public $post;

    /**
     * @Column(type="integer")
     * @var int $aime
     */
	public $aime;
	
}

?>