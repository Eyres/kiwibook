<?php

/** 
 * @Entity
 * @Table(name="fredouil.post")
 */
class post {

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

    /**
     * @Column(type="string", length=2000)
     * @var string $texte
     */
	public $texte;

    /**
     * @Column(type="datetime")
     * @var \DateTime $date
     */
	public $date;

    /**
     * @Column(type="string", length=200)
     * @var string $image
     */
	public $image;
			
}

?>