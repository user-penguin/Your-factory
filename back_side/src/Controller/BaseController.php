<?php

namespace App\Controller;

use App\Type\CreatePersonType;
use App\Entity\Person;
use App\Repository\PersonRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @param PersonRepository $personRepo
     * @return Response
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function addPerson(Request $request, PersonRepository $personRepo)
    {
        $person = new Person();
        $form = $this->createForm(CreatePersonType::class, $person);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $person = $form->getData();
            $personRepo->addPerson($person);
            return $this->render('InformationLayer/index.html.twig');
        }

        return $this->render('InformationLayer/create_person.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @param PersonRepository $personRepos
     * @param PaginatorInterface $knp
     * @return Response
     */
    public function viewAll(Request $request, PersonRepository $personRepos, PaginatorInterface $knp)
    {
        $recordLimit = 10;
         $pagination = $knp->paginate(
            $personRepos->getFindAllPersonsQuery(),
            $request->query->getInt('page', 1),
            $recordLimit
        );

        return $this->render('InformationLayer/all_persons.html.twig', [
            'pagination' => $pagination,
        ]);
    }

}