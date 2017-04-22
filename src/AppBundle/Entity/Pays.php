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

/**
 * @ORM\Entity
 * @ORM\Table(name="pays")
 */
class Pays
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
}

