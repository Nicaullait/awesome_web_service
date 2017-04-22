<?php

/**
 * Created by PhpStorm.
 * User: nico_
 * Date: 22/04/2017
 * Time: 13:05
 */
// src/AppBundle/Entity/Biere.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;


/**
 * @ORM\Entity
 * @ORM\Table(name="biere")
 */
class Biere implements JsonSerializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $description;


    /**
     * Many Biere have One Pays.
     * @ORM\ManyToOne(targetEntity="Pays", fetch="EAGER")
     * @ORM\JoinColumn(name="pays_id", referencedColumnName="id")
     */
    private $pays;

    /**
     * Many Biere have One Ville.
     * @ORM\ManyToOne(targetEntity="Ville", fetch="EAGER")
     * @ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $url_image;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getUrlImage()
    {
        return $this->url_image;
    }

    /**
     * @param mixed $url_image
     */
    public function setUrlImage($url_image)
    {
        $this->url_image = $url_image;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return  [
                'id' => $this->id,
                'nom' => $this->nom,
                'description' => $this->description,
                //'pays' => $this->pays,
                //'ville' => $this->ville,
                'url_image' => $this->url_image,
        ];
    }
}