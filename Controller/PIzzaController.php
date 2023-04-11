<?php
// src/Controller/CategoryController.php
namespace App\Controller;

// ...
use App\Entity\Pizza;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class PIzzaController extends AbstractController
{
    #[Route('/pizza', name: 'create_pizza')]
    public function createPizza(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $pizza1 = new Pizza();
        $pizza1->setType('Bonjur');
        $pizza1->setIngredients('Salami, Ham, Kip, Gehakt, Chorizo, Spekjes, Bacon, Shoarma, Pulled pork');
        $pizza1->setPrice(29.99);
        $pizza1->setSize("Groot");
        $pizza2 = new Pizza();
        $pizza2->setType('La Pizzarea');
        $pizza2->setIngredients('Salami, Ham, Kip, Gehakt, Chorizo, Spekjes, Bacon, Shoarma, Pulled pork');
        $pizza2->setPrice(39.99);
        $pizza2->setSize("Groot");
        $pizza3 = new Pizza();
        $pizza3->setType('Vela');
        $pizza3->setIngredients('Salami, Ham, Kip, Gehakt, Chorizo, Spekjes, Bacon, Shoarma, Pulled pork');
        $pizza3->setPrice(49.99);
        $pizza3->setSize("Groot");


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($pizza1);
        $entityManager->persist($pizza2);
        $entityManager->persist($pizza3);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product;');
    }
}