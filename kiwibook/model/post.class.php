<?php

/** 
 * @Entity
 * @Table(name="fredouil.post")
 */
class post implements JsonSerializable{

	/** @Id @Column(type="integer") @GeneratedValue */
	protected $id;

    /** @Column(type="string", length=2000) */
	protected $texte;

    /** @Column(type="datetime") */
	protected $date;

    /** @Column(type="string", length=200) */
	protected $image;


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
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * @param mixed $texte
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
			
}

?>