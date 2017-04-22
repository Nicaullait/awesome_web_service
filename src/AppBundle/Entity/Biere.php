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

/**
 * @ORM\Entity
 * @ORM\Table(name="biere")
 */
class Biere
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
    private $descrption;


    /**
     * Many Biere have One Pays.
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumn(name="pays_id", referencedColumnName="id")
     */
    private $pays;

    /**
     * Many Biere have One Ville.
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $url_image;
}