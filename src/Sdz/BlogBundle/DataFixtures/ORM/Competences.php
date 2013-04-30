<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Competences
 *
 * @author Gandiol.r
 */
namespace Sdz\BlogBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sdz\BlogBundle\Entity\Competence;

class Competences implements FixtureInterface{
    public function load(ObjectManager $manager) {
       // Liste des noms de compétences à ajouter
    $noms = array('Doctrine', 'Formulaire', 'Twig', 'PHP', 'Symfony2', 'Git', 'Composer', 'Yii');
 
    foreach($noms as $i => $nom)
    {
      // On crée la compétence
      $liste_competences[$i] = new Competence();
      $liste_competences[$i]->setNom($nom);
 
      // On la persiste
      $manager->persist($liste_competences[$i]);
    }                           
 
    // On déclenche l'enregistrement
    $manager->flush(); 
    }
}

?>
