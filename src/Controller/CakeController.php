<?php

namespace App\Controller;

use App\Repository\CakeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cake;

class CakeController extends AbstractController
{
    /**
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    /**
     * @Route("/cake", name="cake")
     */
    public function createCake(EntityManagerInterface $entityManager): Response
    {
        $cake = new Cake();
        $cake->setName('Fondant au chocolat');
        $cake->setIsSweet(true);

        $entityManager->persist($cake);

        $entityManager->flush();

        return new Response('Saved new cake id '.$cake->getId());

        return $this->render('cake/index.html.twig', [
           'controller_name' => 'CakeController',
        ]);

    }

    public function getById(int $id, CakeRepository $cakeRepository):Response{
        $cake = $cakeRepository->find($id);

        return new Response('The cake n°'.$cake->getId().'is a '.$cake->getName());

        return $this->render('cake/index.html.twig', [
            'controller_name' => 'CakeController',
        ]);
    }
}
