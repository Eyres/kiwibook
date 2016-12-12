<?php

/** 
 * @Entity
 * @Table(name="fredouil.chat")
 *
 * @OneToOne(targetEntity="post")
 * @JoinColumn(name="post", referencedColumnName="id")
 *
 * @ManyToOne(targetEntity="utilisateur")
 * @JoinColumn(name="emetteur", referencedColumnName="id")
 * 
 */
class chat {

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="integer") */ 
	public $emetteur;
		
	/** @Column(type="integer") */ 
	public $post;
	
}

?>