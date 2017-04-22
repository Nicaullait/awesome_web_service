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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;



class DefaultController extends Controller
{
    /**
     * @Route("/api/number")
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
    public function numberAction(Contact $contact)
    {
        $number = mt_rand(0, 100);

        return $this->render('number.html.twig', array(
            'number' => $number,
        ));
    }

    /**
     * @Route("/api/contact")
     *
     * @ApiDoc(
     * resource="/api/contact",
     * description="Sends a contact email",
     * input={
     *   "class"="Acme\Bundle\ApiBundle\Form\ContactType",
     * },
     * statusCodes={
     *     200="Successful",
     *     403="Validation errors"
     *   },
     * )
     * @ParamConverter("contact", class="Acme\Bundle\ApiBundle\Model\Contact",
     *                            converter="fos_rest.request_body")
     *
     */
    public function postContactAction(Request $request, Contact $contact)
    {}

}
