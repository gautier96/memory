<?php

namespace memory\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Choisir
 *
 * @author gauti
 */


/**
 * @ORM\Entity
 * @ORM\Table(name="choisir")
 */
class Choisir {
    /**
     * @ORM\ID
     * @ORM\Column(type="integer")
     */
    private $numImage;
    /**
     * @ORM\ID
     * @ORM\Column(type="integer")
     */
    private $numPartie;
    
    function getNumImage() {
        return $this->numImage;
    }

    function getNumPartie() {
        return $this->numPartie;
    }

    function setNumImage($numImage) {
        $this->numImage = $numImage;
    }

    function setNumPartie($numPartie) {
        $this->numPartie = $numPartie;
    }


}
