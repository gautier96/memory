<?php
namespace memory\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Joueur
 *
 * @author gauti
 */


/**
 * @ORM\Entity
 * @ORM\Table(name="joueur")
 */
class Joueur {
    /**
     * @ORM\ID
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idJoueur;
    /**
     * @ORM\Column(type="string")
     */
    private $pseudo;
    
    function getIdJoueur() {
        return $this->idJoueur;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function setIdJoueur($idJoueur) {
        $this->idJoueur = $idJoueur;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }


}
