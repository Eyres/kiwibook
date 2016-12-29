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
     * @ManyToOne(targetEntity="utilisateur")
     * @JoinColumn(nullable=false, name="emetteur", referencedColumnName="id")
     */
    public $emetteur;

    /**
     * @ManyToOne(targetEntity="utilisateur")
     * @JoinColumn(nullable=false, name="destinataire", referencedColumnName="id")
     */
    public $destinataire;

    /**
     * @OneToOne(targetEntity="utilisateur")
     * @JoinColumn(nullable=true, name="parent", referencedColumnName="id")
     */
	public $parent;

    /**
     * @OneToOne(targetEntity="post")
     * @JoinColumn(nullable=false, name="post", referencedColumnName="id")
     */
	public $post;

    /**
     * @Column(type="integer")
     */
	public $aime;
	
}

?>