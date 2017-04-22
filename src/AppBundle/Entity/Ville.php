<?php

/**
 * Created by PhpStorm.
 * User: nico_
 * Date: 22/04/2017
 * Time: 13:05
 */
// src/AppBundle/Entity/Ville.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Console\Command\SchemaTool;

/**
 * @ORM\Entity
 * @ORM\Table(name="ville")
 */
class Ville
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
     * Many Ville have One Pays.
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumn(name="pays_id", referencedColumnName="id")
     */
    private $_pays;


    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $url_meteo;
}