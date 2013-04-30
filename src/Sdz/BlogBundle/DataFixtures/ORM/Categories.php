<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categories
 *
 * @author Gandiol.r
 */
// src/Sdz/BlogBundle/DataFixtures/ORM/Categories.php
 
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Categorie;

class Categories implements FixtureInterface{
   //Dans l'argument de la methode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager) {
        //Liste des noms de catégorie à ajouter
        $noms = array(
            'Symfony2',
            'Doctrine2',
            'Tutoriel',
            'Evènement',
        );
        
        foreach ($noms as $i => $nom){
            //On créer la catégorie
            $liste_categories[$i] = new Categorie();
            $liste_categories[$i]->setNom($nom);
            
            //On la persiste
            $manager->persist($liste_categories[$i]);
        }
        
        $manager->flush();
    }    
}

?>
