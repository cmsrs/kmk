<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Person;
use App\Repository\PersonRepository;


class PersonController extends AbstractController
{

    /**
     * @Route("/api/persons/{nationalityId}", name="person", methods={"GET"})
     */
    public function index(PersonRepository $personRepository, $nationalityId): Response
    {
        $persons = $personRepository->getItemsByNationalityId($nationalityId);
        return $this->json([ 'status' => 'ok',  'data' => $persons]);
    }
}
