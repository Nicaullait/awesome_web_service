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
use Symfony\Component\HttpFoundation\Request;
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
     * resource="/api/city/all",
     * section = "City",
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
        $city  = $repository->findAll();
        return new JsonResponse($city);

    }


    /**
     * @Route("/api/city",)
     * @Method("GET")
     * @ApiDoc(
     *  section = "City",
     *  resource="/api/city",
     *  description="Return 1 City",
     *  parameters={
     *     {"name"="city", "dataType"="int", "required"=true, "description"="City ID"}
     *   },
     *  output="AppBundle\Entity\Ville"
     * )
     */
    public function getCityById(Request $request)
    {

        $cityid = $request->query->get('city');
        $repository = $this->getDoctrine()->getRepository('AppBundle:City');
        $city  = $repository->findOneBy(array('id' => $cityid));
        return new JsonResponse($city);

    }

    /**
     * @Route("/api/city/biers",)
     * @Method("GET")
     * @ApiDoc(
     *  section = "City",
     *  resource="/api/city/biers",
     *  description="Return all biers for 1 city",
     *  parameters={
     *     {"name"="city", "dataType"="int", "required"=true, "description"="City ID"}
     *   },
     *  output="AppBundle\Entity\Biere"
     * )
     */
    public function getCityBiers(Request $request)
    {

        $cityid = $request->query->get('city');

        $repository = $this->getDoctrine()->getRepository('AppBundle:Ville');
        $city  = $repository->findOneBy(array('id' => $cityid));

        $repository = $this->getDoctrine()->getRepository('AppBundle:Biere');
        $biers  = $repository->findBy(array('ville' => $city));
        return new JsonResponse($biers);

    }


}