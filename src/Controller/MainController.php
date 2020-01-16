<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $menu_categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('main/index.html.twig', [
            'menu_categories'=>$menu_categories 
        ]);
        
    }
    
    public function navCat(){
        $menu_categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('navigation.html.twig', [
            'menu_categories'=>$menu_categories 
        ]);
    }
    
  
}
