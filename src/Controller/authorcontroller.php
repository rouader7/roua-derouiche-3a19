<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface; 
use App\Entity\Author; 

class authorcontroller extends AbstractController
{
    
    
     #[Route('/author/{name}', name:'show_author')]
     
    
    public function showAuthor( $name): Response
    {

        return $this->render('show.html.twig', [
            'name' => $name,
        ]);
    }
    
    #[Route('/authors', name: 'list_authors')]
    public function listAuthors(EntityManagerInterface $em): Response
    {
        // Définir la liste des auteurs
        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
        );

        $author = $em->getRepository(Author::class)->findAll(); 

        return $this->render('list.html.twig', [
            'authors' => $author,
            'nom' => "rouad"
        ]);
    }
}




