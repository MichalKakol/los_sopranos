<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")   // 1/3 ROUTE - annotations route ant it's name for changing multiple links if needed
     */
    public function homepage(EntityManagerInterface $entityManager):Response // 2/3 CONTROLLER - execute controller function
    {
        $categories = $entityManager->getRepository(Category::class)->findAll();
        return $this->render('basic/home.html.twig', ['categories' => $categories, ]); // 3/3 RESPONSE - return a response
    }
    #[Route('/category/{id}', name: 'category_show')]
    public function showCategory(EntityManagerInterface $entityManager, int $id): Response
    {
        $category = $entityManager->getRepository(Category::class)->find($id);

        return new Response('Category: '.$category->getType());
    }
}