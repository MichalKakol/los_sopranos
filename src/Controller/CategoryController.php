<?php
// src/Controller/CategoryController.php
namespace App\Controller;

// ...
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'create_category')]
    public function createCategory(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $category = new Category();
        $category->setType('Vlees');
        $category2 = new Category();
        $category2->setType('Vege');
        $category3 = new Category();
        $category3->setType('Andere');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($category);
        $entityManager->persist($category2);
        $entityManager->persist($category3);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product;');
    }
}
