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
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idPartie;
    /**
     * @ORM\Column(type="integer")
     */
    private $nbCoups;
    
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
