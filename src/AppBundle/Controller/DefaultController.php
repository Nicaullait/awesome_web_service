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
     * resource="/api/number",
     * description="Sends a contact email",
     * input={
     *   "class"="Acme\Bundle\ApiBundle\Form\ContactType", "paramType" = "query"
     * },
     * statusCodes={
     *     200="Successful",
     *     403="Validation errors"
     *   },
     * )
     * @ParamConverter("contact", class="Acme\Bundle\ApiBundle\Model\Contact",
     *                            converter="fos_rest.request_body")
     *
     *
     */
    public function createAction()
    {

        $pays = new Biere();
        $pays->setName('Keyboard');
        $pays->setPrice(19.99);
        $pays->setDescription('Ergonomic and stylish!');


        $biere = new Biere();
        $biere->setName('Keyboard');
        $biere->setPrice(19.99);
        $biere->setDescription('Ergonomic and stylish!');

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($biere);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$biere->getId());
    }


}
