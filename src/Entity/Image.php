<?php
namespace memory\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Image
 *
 * @author gauti
 */


/**
 * @ORM\Entity
 * @ORM\Table(name="image")
 */
class Image {
    /**
     * @ORM\ID
     * @ORM\Column(type="integer")
     */
    private $idImage;
    /**
     * @ORM\Column(type="string")
     */
    private $chemin;
    
    function getIdImage() {
        return $this->idImage;
    }

    function getChemin() {
        return $this->chemin;
    }

    function setIdImage($idImage) {
        $this->idImage = $idImage;
    }

    function setChemin($chemin) {
        $this->chemin = $chemin;
    }


}
