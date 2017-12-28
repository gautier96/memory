<?php

namespace memory\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * Description of Partie
 *
 * @author gauti
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="partie")
 */
class Partie {

    /**
     * @ORM\ID
     * @ORM\Column(type="integer")
     */
    private $idPartie;
    
    
    /**
     * @ManyToOne(targetEntity="Joueur")
     * @JoinColumn(name="idJoueurP", referencedColumnName="idJoueur")
     */
   
    private $idJoueurP;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbCoups;
    
    function setIdPartie($idPartie) {
        $this->idPartie = $idPartie;
    }
    
    function getIdJoueur() {
        return $this->idJoueur;
    }

    function setIdJoueur($idJoueur) {
        $this->idJoueur = $idJoueur;
    }

    function getIdPartie() {
        return $this->idPartie;
    }

    function getNbCoups() {
        return $this->nbCoups;
    }

    function setNbCoups($nbCoups) {
        $this->nbCoups = $nbCoups;
    }

}
