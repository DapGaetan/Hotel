<?php

namespace App\Controller;

use App\Repository\SuiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuiteController extends AbstractController
{
    #[Route('/suite', name: 'app_suite')]
    public function index(SuiteRepository $repository): Response
    {
        $suites = $repository->findAll();

        return $this->render('pages/suite/index.html.twig', [
            'suites' => $suites
        ]);
    }
}
