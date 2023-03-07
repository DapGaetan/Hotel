<?php

namespace App\Controller;

use App\Entity\Suite;
use App\Form\SuiteType;
use App\Repository\SuiteRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SuiteController extends AbstractController
{
    #[Route('/suite', name: 'suite.index' , methods: ['GET'])]
    public function index(SuiteRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {

        $suites = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            12
        );

        return $this->render('pages/suite/index.html.twig', [
            'suites' => $suites
        ]);
    }

    #[Route('/suite/nouveau', 'suite.new', methods: ['GET', 'POST'])]
    public function new(Request $request,
    EntityManagerInterface $manager
    ): Response
    {
        $suite = new Suite();
        $form = $this->createForm(SuiteType::class, $suite);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $suite = $form->getData();

            $manager->persist($suite);
            $manager->flush();

            $this->addFlash('success','La suite a etait ajouter a la liste des suites');


            return $this->redirectToRoute("suite.index");
        }

        return $this->render('pages/suite/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/suite/edition/{id}', 'suite.edit', methods: ['GET', 'POST'])]
    public function edit(SuiteRepository $repository, int $id,Request $request, EntityManagerInterface $manager) : Response
    {
        $suite = $repository->findOneBy(["id" => $id]);
        $form = $this->createForm(SuiteType::class, $suite);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $suite = $form->getData();

            $manager->persist($suite);
            $manager->flush();

            $this->addFlash('success','La suite a etait modifier');


            return $this->redirectToRoute("suite.index");
        }

        return $this->render('pages/suite/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/ingredient/suppression/{id}', 'suite.delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $manager, Suite $suite) : Response
    {
        if (!$suite) {
            $this->addFlash('warning','La suite n\'éxiste pas ou n\'a pas était trouver');
        };

        $manager->remove($suite);
        $manager->flush();

        $this->addFlash('success','La suite a etait supprimer');

        return $this->redirectToRoute('suite.index');
    }
}
