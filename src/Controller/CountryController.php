<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Country;
use App\Repository\CountryRepository;


class CountryController extends AbstractController
{

    /**
     * @Route("/api/countries", name="countries", methods={"GET"})
     */
    public function index(CountryRepository $countryRepository): Response
    {
        $country = $countryRepository->getCountryAndCountPerson();
        return $this->json([ 'status' => 'ok',  'data' => $country]);
    }


}
