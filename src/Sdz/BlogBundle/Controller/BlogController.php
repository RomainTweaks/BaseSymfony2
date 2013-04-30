<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlogController
 *
 * @author Gandiol.r
 */

// src/Sdz/BlogBundle/Controller/BlogController.php //
namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sdz\BlogBundle\Entity\Article;
use Sdz\BlogBundle\Entity\Image;
use Sdz\BlogBundle\Entity\Commentaire;
use Sdz\BlogBundle\Entity\ArticleCompetence;

class BlogController extends Controller{
    
    public function indexAction($page = 1)
  {
    // Ici, on récupérera la liste des articles, puis on la passera au template
    $articles = $this->getDoctrine()
            ->getManager()
            ->getRepository('SdzBlogBundle:Article')
            ->getArticles(3, $page);
    
    if(ceil(count($articles)/3) == 0){
        $nbrpage = 1;
    }
    else{
        $nbrpage = ceil(count($articles)/3);
    }
    
    // Mais pour l'instant, on ne fait qu'appeler le template
    return $this->render('SdzBlogBundle:Blog:index.html.twig', array(
        'articles' => $articles,
        'page' => $page,
        'nbrPage' => $nbrpage,
    ));
  }
}


