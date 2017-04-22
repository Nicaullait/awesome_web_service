<?php
/**
 * Created by PhpStorm.
 * User: nico_
 * Date: 21/04/2017
 * Time: 23:14
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Nelmio\ApiDocBundle\Annotation\Post;
use AppBundle\Entity\Biere;
use AppBundle\Entity\Pays;
use AppBundle\Entity\Ville;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;



class DefaultController extends Controller{

    /**
     * @Route("/api/generate")
     *
     * @ApiDoc(
     *
     * resource="/api/generate",
     * description="Create a bier sample",
     * statusCodes={
     *     200="Successful",
     *     403="Validation errors"
     *   },
     * )
     *
     */
    public function createAction()
    {

        $pays = new Pays();
        $pays->setNom('France');
        $pays->setDescription('La biere occupe une place importante dans la culture francaise. En effet la consomation moyenne est de 30L par an par habitant. Ce qui place la france 26eme consommateur de biere dans le monde');
        $pays->setUrlFlag('http://choualbox.com/Img/1401649343486.jpg');


        $ville = new Ville();
        $ville->setNom('Limoges');
        $ville->setDescription('Les bars et pub dans lesquels il est possible de consommer de la biere ne se comptent plus a Limoges. la ville possede aussi sa fabriquation artisanale de Biere');
        $ville->setPays($pays);
        $ville->setUrlMeteo("33514");

        $brune = new Biere();
        $brune->setNom('Michard Brune');
        $brune->setDescription('Malgre son goût reconnaissable de cafe, ce n’est pas une stout. Sa rondeur et sa douceur l’apparentent plus à une biere de type belge.Malt torrefie.');
        $brune->setPays($pays);
        $brune->setVille($ville);
        $brune->setUrlImage('http://www.bieres-michard.com/site/wp-content/uploads/2016/01/MICHARD_LOGO_PANTONE.png');


        $blonde = new Biere();
        $blonde->setNom('Michard Blonde');
        $blonde->setDescription('Houblonnee à souhait
Biere legere, fine et gustative,
ayant subi deux
houblonnages avec la
variete aromatique Saaz.
Malt pâle.');
        $blonde->setPays($pays);
        $blonde->setVille($ville);
        $blonde->setUrlImage('http://www.bieres-michard.com/site/wp-content/uploads/2016/01/MICHARD_LOGO_PANTONE.png');

        $ambree = new Biere();
        $ambree->setNom('Michard Ambree');
        $ambree->setDescription('Biere au malt grille.
Son goût inimitable ne lui
confere aucune similitude avec d’autres. Houblon
aromatique allemand.
Malt torrefie.');
        $ambree->setPays($pays);
        $ambree->setVille($ville);
        $ambree->setUrlImage('http://www.bieres-michard.com/site/wp-content/uploads/2016/01/MICHARD_LOGO_PANTONE.png');


        $blanche = new Biere();
        $blanche->setNom('Michard Blanche');
        $blanche->setDescription('Au malt de ble (45%)
et d’orge (55%). Brassee selon une recette belge (Louvain). Tres leger houblonnage (Styrie) et souche de levure differente.
Malt pâle et malt de ble');
        $blanche->setPays($pays);
        $blanche->setVille($ville);
        $blanche->setUrlImage('http://www.bieres-michard.com/site/wp-content/uploads/2016/01/MICHARD_LOGO_PANTONE.png');


        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($pays);
        $em->persist($ville);
        $em->persist($brune);
        $em->persist($blonde);
        $em->persist($blanche);
        $em->persist($ambree);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$brune->getId());
    }


}
