<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends AbstractController
{
    /**
     * @return Response
     */
    public function index()
    {
        return $this->render('InformationLayer/index.html.twig');
    }

    public function addPerson()
    {

    }
}