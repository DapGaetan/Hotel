<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\HotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HotelController extends AbstractController
{
    #[Route('/hotel', name: 'hotel.index' , methods: ['GET'])]
    public function index(
        HotelRepository $repository,
        PaginatorInterface $paginator,
        Request $request
        ): Response {
        $hotels = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            12
        );

        return $this->render('pages/hotel/index.html.twig', [
            'hotels' => $hotels,
        ]);
    }
}
