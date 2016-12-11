<?php

/** 
 * @Entity
 * @Table(name="fredouil.message")
 *
 * @OneToOne(targetEntity="post")
 * @JoinColumn(name="post", referencedColumnName="id")
 *
 * @OneToOne(targetEntity="utilisateur")
 * @JoinColumn(name="parent", referencedColumnName="id")
 * 
 * @OneToOne(targetEntity="utilisateur")
 * @JoinColumn(name="emetteur", referencedColumnName="id")
 *
 * @ManyToOne(targetEntity="utilisateur")
 * @JoinColumn(name="destinataire", referencedColumnName="id")
 *
 */
class message {

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="integer") */ 
	public $emetteur;
        
    /** @Column(type="integer") */ 
	public $destinataire;
        
    /** @Column(type="integer") */ 
	public $parent;
		
	/** @Column(type="integer") */ 
	public $post;
        
    /** @Column(type="integer") */ 
	public $aime;
	
}

?>