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

class VilleController extends Controller
{
    /**
     * @Route("/api/city/all")
     * @Method("GET")
     * @ApiDoc(
     * resource="/api/biere/all",
     * section = "Biere",
     * description="Get full city list",
     * statusCodes={
     *     200="Successful",
     *     403="Validation errors"
     *   },
     * )
     *
     */
    public function getAllCity()
    {

        $repository = $this->getDoctrine()->getRepository('AppBundle:Ville');

        $biere  = $repository->findAll();

        return new JsonResponse($biere);

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

        $querybuilder = $repository->createQueryBuilder('u');

        $querybuilder ->where('u.id = :biereid')
            ->setParameter('biereid', $biereId)
            ->setMaxResults(1);

        $query = $querybuilder
            ->getQuery();

        // find *all* bier
        $bieres = $query->getArrayResult();

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
     *  output="AppBundle\Entity\Ville"
     * )
     */
    public function getBierCity(Request $request)
    {

        $biereId = $request->query->get('biere');

        $repository = $this->getDoctrine()->getRepository('AppBundle:Biere');

        $biere  = $repository->findOneBy(array('id' => $biereId));

        $city = $biere->getVille();

        return new JsonResponse($city);

    }

    /**
     * @Route("/api/biere/pays",)
     * @Method("GET")
     * @ApiDoc(
     *  section = "Biere",
     *  resource="/api/biere/pays",
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

        $biere  = $repository->findOneBy(array('id' => $biereId));

        $pays = $biere->getPays();

        return new JsonResponse($pays);;

    }
}