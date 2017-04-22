<?php

/**
 * Created by PhpStorm.
 * User: nico_
 * Date: 22/04/2017
 * Time: 13:05
 */
// src/AppBundle/Entity/Pays.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity
 * @ORM\Table(name="pays")
 */
class Pays implements JsonSerializable
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
    private $url_flag;

    /**
     * @ORM\Column(type="string")
     */
    private $description;



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
    public function getUrlFlag()
    {
        return $this->url_flag;
    }

    /**
     * @param mixed $url_flag
     */
    public function setUrlFlag($url_flag)
    {
        $this->url_flag = $url_flag;
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
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */

        function jsonSerialize()
        {

            return [
                'pays' => [
                    'id' => $this->id,
                    'nom' => $this->nom,
                    'url_flag' => $this->url_flag,
                    'description' => $this->description,
                ]
            ];
        }

}

