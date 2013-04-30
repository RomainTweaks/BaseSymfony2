<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageController
 *
 * @author Gandiol.r
 */

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sdz\BlogBundle\Entity\Article;
use Sdz\BlogBundle\Entity\Image;

class ImageController extends Controller{
    
    public function modifierImageAction($id_article){
        $em = $this->getDoctrine()->getManager();
        
        //On récupère l'article
        $article = $em->getRepository('SdzBlogBundle:Article')->find($id_article);
        
        //On modifie l'url de l'image
        $article->getImage()->setUrl('test.png');
        $article->getImage()->setAlt('Not found');
        
        //On déclenche la modif
        $em->flush();
        
        return new Response('ok');
    }
}

?>
