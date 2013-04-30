<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MailerAntispam
 *
 * @author Gandiol.r
 */
namespace Sdz\BlogBundle\Services\Antispam;

class MailerAntispam {
    protected $mailer;
    protected $locale;
    protected $nbForSapm;
    
    public function __construct(\Swift_Mailer $mailer, $local, $nbForSpam){
        $this->mailer    = $mailer;
        $this->locale    = $locale;
        $this->nbForSapm = (int)$nbForSpam;
    }
    /**
     * Vérifie si le text est un spam ou non
     * 
     * @param string $text le text à analyser
     */
    public function isSpam($text){
        return ($this->countLinks($text) + $this->countMails($text)) >= $this->nbForSapm;
    }
    
    /**
     * Comptes les URLs de $text
     * 
     * @param string $text
     */
    private function countLinks($text){
        preg_match_all(
                '#(http|https|ftp)://([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/?#i', 
                $text,
                $matches
        );
        
        return count($matches[0]);
    }
    
    /**
     * comptes les emails dans $text
     * 
     * @param string $text 
     */
    private function countMails($text){
        preg_match_all(
                '#[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}#i', 
                $text, 
                $matches
        );
        
        return count($matches[0]);
    }
}

?>
