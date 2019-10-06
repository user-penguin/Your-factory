<?php

namespace App\Controller;

use App\CreatePersonType;
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

    /**
     * @return Response
     */
    public function addPerson()
    {
        $form = $this->createForm(CreatePersonType::class);

        return $this->render('InformationLayer/create_person.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}