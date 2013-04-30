<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticleController
 *
 * @author Gandiol.r
 */

// src/Sdz/BlogBundle/Controller/ArticleController.php //
namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sdz\BlogBundle\Entity\Article;
use Sdz\BlogBundle\Entity\Image;
use Sdz\BlogBundle\Entity\Commentaire;
use Sdz\BlogBundle\Entity\ArticleCompetence;
use Sdz\BlogBundle\Form\ArticleType;

class ArticleController extends Controller{
    
  public function indexAction($page = 1)
  {
    // On ne sait pas combien de pages il y a
    // Mais on sait qu'une page doit être supérieure ou égale à 1
    if( $page < 1 )
    {
      // On déclenche une exception NotFoundHttpException
      // Cela va afficher la page d'erreur 404 (on pourra personnaliser cette page plus tard d'ailleurs)
      throw $this->createNotFoundException('Page inexistante (page = '.$page.')');
    }
 
    // Ici, on récupérera la liste des articles, puis on la passera au template
    $articles = $this->getDoctrine()->getManager()
                    ->getRepository('SdzBlogBundle:Article')
                    ->findAll();
    // Mais pour l'instant, on ne fait qu'appeler le template
    return $this->render('SdzBlogBundle:Article:index.html.twig', array(
        'articles' => $articles,
    ));
  }
  
  public function voirAction(Article $article)
  {
    // Ici, on récupérera l'article correspondant à l'id $id
     $em = $this->getDoctrine()
                ->getManager();
    
    //On récupère sa liste de compétences
    $liste_articleCompetences = $em->getRepository('SdzBlogBundle:ArticleCompetence')
                                ->findByArticle($article->getId());
    
    return $this->render('SdzBlogBundle:Article:voir.html.twig', array(
      'article' => $article,
      // Pas besoin de passer les commentaires à la vue, on pourra y accéder via {{ article.commentaires }}
      // 'liste_commentaires'   => $article->getCommentaires()
      'liste_articleCompetences' => $liste_articleCompetences,
    ));
  }
   
  public function ajouterAction()
  {
    $article = new Article();
    
    //On génère le formulaire
    $form = $this->createForm(new ArticleType, $article);
    
    // La gestion d'un formulaire est particulière, mais l'idée est la suivante :
    if( $this->get('request')->getMethod() == 'POST' )
    {
        //On lie l'objet avec les valeurs du formulaire
        $form->bind($this->get('request'));
        
        //On valide les valeurs du formulaire
        if($form->isValid()){
            //On enregistre l'objet en BDD
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($article);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'Article bien enregistré');
        }
        // Puis on redirige vers la page de visualisation de cet article
      return $this->redirect( $this->generateUrl('Sdzblog_voir', array('slug' => $article->getSlug())) );
    }
    
    return $this->render('SdzBlogBundle:Article:ajouter.html.twig', array(
        'form' => $form->createView(),
    ));
  }
  
  public function modifierAction(Article $article){
      
    $formBuilder = $this->createFormBuilder($article);
    
    //Ajout des champs
    $formBuilder
            ->add('date', 'date')
            ->add('titre', 'text')
            ->add('contenu', 'textarea')
            ->add('auteur', 'text')
            ->add('publication', 'checkbox', array('required' => false));
    
    //On génère le formulaire
    $form = $formBuilder->getForm();
    
    // La gestion d'un formulaire est particulière, mais l'idée est la suivante :
    if( $this->get('request')->getMethod() == 'POST' )
    {
        //On lie l'objet avec les valeurs du formulaire
        $form->bind($this->get('request'));
        
        //On valide les valeurs du formulaire
        if($form->isValid()){
            //On enregistre l'objet en BDD
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($article);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'Article bien enregistré');
        }
        // Puis on redirige vers la page de visualisation de cet article
      return $this->redirect( $this->generateUrl('Sdzblog_voir', array('slug' => $article->getSlug())) );
    }
    
    $em = $this->getDoctrine()
              ->getEntityManager();
     
     return $this->render('SdzBlogBundle:Article:modifier.html.twig', array(
         'article' => $article,
         'form' => $form->createView(),
     ));
  }


  public function supprimerAction(Article $article)
  {
    // Ici, on récupérera l'article correspondant à $id
      $em = $this->getDoctrine()
              ->getEntityManager();
    // Ici, on gérera la suppression de l'article en question
     
     if ($this->get('request')->getMethod() == 'POST') {
      // Si la requête est en POST, on supprimera l'article
       
      $this->get('session')->getFlashBag()->add('info', 'Article bien supprimé');
 
      // Puis on redirige vers l'accueil
      return $this->redirect( $this->generateUrl('sdzblog_accueil'), array(
       'article' => $article,   
      ));
    }
      
    return $this->render('SdzBlogBundle:Article:supprimer.html.twig');
  }
  
  public function menuAction($nombre){
      $liste = $this->getDoctrine()
              ->getManager()
              ->getRepository('SdzBlogBundle:Article')
              ->findBy(
                array(),
                array('date' => 'asc'), 
                $nombre,
                0
              );
      
      return $this->render('SdzBlogBundle:Article:menuArticle.html.twig', array(
          'liste_articles' => $liste,
      ));
  }
}
