<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Team;
use App\Repository\TeamRepository;

class TeamController extends AbstractController
{
    /**
     * @Route("/api/teams/{countryId}", name="team", methods={"GET"})
     */
    public function index(TeamRepository $teamRepository, $countryId = null): Response
    {
        $teams = $teamRepository->getAllItemsByCountryId($countryId);
        return $this->json([ 'status' => 'ok',  'data' => $teams]);
    }

}
