<?php

namespace memory\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ID
     * @ORM\Column(type="integer")
     */
    private $idJoueur;

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
