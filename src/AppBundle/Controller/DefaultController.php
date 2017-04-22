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
     * @Route("/api/biere")
     *
     * @ApiDoc(
     * resource="/api/biere",
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
        $pays->setDescription('La bière occupe une place importante dans la culture française. En effet la consomation moyenne est de 30L par an par habitant. Ce qui place la france 26ème consommateur de biere dans le monde');
        $pays->setUrlFlag('http://choualbox.com/Img/1401649343486.jpg');


        $ville = new Ville();
        $ville->setNom('Limoges');
        $ville->setDescription('Les bars et pub dans lesquels il est possible de consommer de la bière ne se comptent plus a Limoges. la ville possède aussi sa fabriquation artisanale de Bière');
        $ville->setPays($pays);
        $ville->setUrlMeteo("33514");

        $brune = new Biere();
        $brune->setNom('Michard Brune');
        $brune->setDescrption('Malgrè son goût reconnaissable de café, ce n’est pas une stout. Sa rondeur et sa douceur l’apparentent plus àune bière de type belge.Malt torréfié.');
        $brune->setPays($pays);
        $brune->setVille($ville);
        $brune->setPays($pays);
        $brune->setUrlImage('http://www.bieres-michard.com/site/wp-content/uploads/2016/01/MICHARD_LOGO_PANTONE.png');


        $blonde = new Biere();
        $blonde->setNom('Michard Blonde');
        $blonde->setDescrption('Houblonnée à souhait
Bière légère, fine et gustative,
ayant subi deux
houblonnages avec la
variété aromatique Saaz.
Malt pâle.');
        $blonde->setPays($pays);
        $blonde->setVille($ville);
        $blonde->setPays($pays);
        $blonde->setUrlImage('http://www.bieres-michard.com/site/wp-content/uploads/2016/01/MICHARD_LOGO_PANTONE.png');

        $ambree = new Biere();
        $ambree->setNom('Michard Ambrée');
        $ambree->setDescrption('Bière au malt grillé.
Son goût inimitable ne lui
confère aucune similitude avec d’autres. Houblon
aromatique allemand.
Malt torréfié.');
        $ambree->setPays($pays);
        $ambree->setVille($ville);
        $ambree->setPays($pays);
        $ambree->setUrlImage('http://www.bieres-michard.com/site/wp-content/uploads/2016/01/MICHARD_LOGO_PANTONE.png');


        $blanche = new Biere();
        $blanche->setNom('Michard Blanche');
        $blanche->setDescrption('Au malt de blé (45%)
et d’orge (55%). Brassée selon une recette belge (Louvain). Très léger houblonnage (Styrie) et souche de levure différente.
Malt pâle et malt de blé');
        $blanche->setPays($pays);
        $blanche->setVille($ville);
        $blanche->setPays($pays);
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
