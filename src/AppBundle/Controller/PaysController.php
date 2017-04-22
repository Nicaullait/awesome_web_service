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

class PaysController  extends Controller
{
    /**
     * @Route("/api/country/all")
     * @Method("GET")
     * @ApiDoc(
     * resource="/api/country/all",
     * section = "City",
     * description="Get full city list",
     * statusCodes={
     *     200="Successful",
     *     403="Validation errors"
     *   },
     * )
     *
     */
    public function getAllCountry()
    {

        $repository = $this->getDoctrine()->getRepository('AppBundle:Pays');
        $country  = $repository->findAll();
        return new JsonResponse($country);

    }


    /**
     * @Route("/api/country",)
     * @Method("GET")
     * @ApiDoc(
     *  section = "City",
     *  resource="/api/city",
     *  description="Return 1 Country",
     *  parameters={
     *     {"name"="country", "dataType"="int", "required"=true, "description"="country ID"}
     *   },
     *  output="AppBundle\Entity\Ville"
     * )
     */
    public function getCountryById(Request $request)
    {

        $countryid = $request->query->get('country');
        $repository = $this->getDoctrine()->getRepository('AppBundle:Pays');
        $country  = $repository->findOneBy(array('id' => $countryid));
        return new JsonResponse($country);

    }

    /**
     * @Route("/api/country/biers",)
     * @Method("GET")
     * @ApiDoc(
     *  section = "City",
     *  resource="/api/city/biers",
     *  description="Return all biers for 1 country",
     *  parameters={
     *     {"name"="country", "dataType"="int", "required"=true, "description"="Country ID"}
     *   },
     *  output="AppBundle\Entity\Biere"
     * )
     */
    public function getCountryBiers(Request $request)
    {

        $countryid = $request->query->get('country');
        $repository = $this->getDoctrine()->getRepository('AppBundle:Pays');
        $country  = $repository->findOneBy(array('id' => $countryid));

        $repository = $this->getDoctrine()->getRepository('AppBundle:Biere');
        $biers  = $repository->findBy(array('pays' => $country));
        return new JsonResponse($biers);

    }


}