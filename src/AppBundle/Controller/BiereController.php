<?php
/**
 * Created by PhpStorm.
 * User: nico_
 * Date: 22/04/2017
 * Time: 17:11
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Nelmio\ApiDocBundle\Annotation\Post;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Biere;
use AppBundle\Entity\Pays;
use AppBundle\Entity\Ville;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class BiereController extends Controller
{
    /**
     * @Route("/api/biere/all")
     * @Method("GET")
     * @ApiDoc(
     * resource="/api/biere/all",
     * section = "Biere",
     * description="Get full biere list",
     * statusCodes={
     *     200="Successful",
     *     403="Validation errors"
     *   },
     * )
     *
     */
    public function getAllBiers()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Ville');

        $query = $repository->createQueryBuilder('p')
            ->getQuery();


        // find *all* bier
        $products = $query->getResult;


        return new JsonResponse($products);

    }


    /**
     * @Route("/api/biere",)
     * @Method("GET")
     * @ApiDoc(
     *  section = "Biere",
     *  resource="/api/biere",
     *  description="Return 1 Bier",
     *  parameters={
     *     {"name"="biere", "dataType"="int", "required"=true, "description"="Biere ID"}
     *   },
     *  output="AppBundle\Entity\Biere"
     * )
     */
    public function getBierById(Request $request)
    {

        $biereId = $request->query->get('biere');


        $repository = $this->getDoctrine()->getRepository('AppBundle:Biere');

        $querybuilder = $repository->createQueryBuilder('u')
            ->select('u.ville_id')
            ->from('Biere', 'u')
            ->where('u.id = ?'.$biereId);


        $query = $querybuilder
            ->getQuery();

        // find *all* bier
        $bieres = $query->getResult;




        return new JsonResponse($bieres);

    }

    /**
     * @Route("/api/biere/city",)
     * @Method("GET")
     * @ApiDoc(
     *  section = "Biere",
     *  resource="/api/biere/city",
     *  description="Return Bier city",
     *  parameters={
     *     {"name"="biere", "dataType"="int", "required"=true, "description"="Biere ID"}
     *   },
     *  output="AppBundle\Entity\City"
     * )
     */
    public function getBierCity(Request $request)
    {

        $biereId = $request->query->get('biere');
        $repository = $this->getDoctrine()->getRepository('AppBundle:Biere');

        $querybuilder = $repository->createQueryBuilder('u')
            ->select('u.ville_id')
            ->from('Biere', 'u')
            ->where('u.id = ?'.$biereId);


        $query = $querybuilder
            ->getQuery();

        // find *all* bier
        $cityid = $query->getResult;


        $repository2 = $this->getDoctrine()->getRepository('AppBundle:Biere');

        $querybuilder2 = $repository2->createQueryBuilder('v')
            ->select('v')
            ->from('Biere', 'v')
            ->where('v.id = ?'.$cityid);


        $query2 = $querybuilder2
            ->getQuery();


        // find *all* bier
        $city = $query2->getResult;

        return new JsonResponse($city);

    }

    /**
     * @Route("/api/biere/country",)
     * @Method("GET")
     * @ApiDoc(
     *  section = "Biere",
     *  resource="/api/biere/country",
     *  description="Return Bier city",
     *  parameters={
     *     {"name"="biere", "dataType"="int", "required"=true, "description"="Biere ID"}
     *   },
     *  output="AppBundle\Entity\Pays"
     * )
     */
    public function getBierCountry(Request $request)
    {

        $biereId = $request->query->get('biere');
        $repository = $this->getDoctrine()->getRepository('AppBundle:Biere');

        $querybuilder = $repository->createQueryBuilder('u')
            ->select('u.pays_id')
            ->from('Biere', 'u')
            ->where('u.id = ?'.$biereId);


        $query = $querybuilder
            ->getQuery();

        // find *all* bier
        $paysId = $query->getResult;


        $repository2 = $this->getDoctrine()->getRepository('AppBundle:Pays');

        $querybuilder2 = $repository2->createQueryBuilder('v')
            ->select('v')
            ->from('Biere', 'v')
            ->where('v.id = ?'.$paysId);


        $query2 = $querybuilder2
            ->getQuery();


        // find *all* bier
        $pays = $query2->getResult;

        return new JsonResponse($pays);

    }
}