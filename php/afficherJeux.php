<?php
require_once(dirname(__FILE__) . '../../global.php');
require_once (dirname(__FILE__). '/entitysController.php');

use memory\Entity\Choisir;
use memory\Entity\Image;
use memory\Entity\Partie;
use memory\Entity\ChoisirController;

//Verifie si la session a été démarrée et la démarre si réponse = non
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$daoImage = $entityManager->getRepository(Image::class);
//Je recupère toutes mes images
$mesImages = $daoImage->findAll();
for($i = 0; $i < count($mesImages); $i++){
    if($mesImages[$i]->getIdImage() == 15){
        unset($mesImages[$i]);
    }
}
//Je mélange mes images
//var_dump($mesImages);
shuffle($mesImages);
//var_dump($mesImages);
//Je créer un tableau de 16 images
$tab16Images = [];
//Un tableau pour stocker les images choisies
$_SESSION["imagesChoisies"] = [];
//Je remplis mon tableau avec 8 images chacune y étant deux fois = 16 images
$indice1 = 0;
$indice2 = 1;
for ($i = 0; $i < 8; $i++) {
        $tab16Images[$indice1] = $mesImages[$i];
        $tab16Images[$indice2] = $mesImages[$i];
        $_SESSION["imagesChoisies"][$i] = $mesImages[$i];
        $indice1 = $indice1+2;
        $indice2 = $indice2+2;
}
//Je mélange mon $tab16Images
//var_dump($tab16Images);
shuffle($tab16Images);
//var_dump($tab16Images);
//Interface web
$cmptIndice = 0;
echo "<div>";
echo "<table>";
for($row = 0; $row < 4; $row++){
    echo "<tr>";
    for($cell = 0; $cell < 4; $cell++){
        echo "<td>";
        echo '<input type="checkbox" id="'.$cmptIndice.'check" name="image" value="'.$tab16Images[$cmptIndice]->getChemin().'" onClick="retournEtCheck(\''.$cmptIndice.'\')" style="display: none" />';
        echo '<label for="'.$cmptIndice.'check"><img id="'.$cmptIndice.'" src="'.$daoImage->find(15)->getChemin().'"  /></label>';
        echo '<label for="'.$cmptIndice.'check"><img id="'.$cmptIndice.'cache" src="'.$tab16Images[$cmptIndice]->getChemin().'"  style="display: none"/></label>';
        //echo '<img onClick="retournEtCheck(\''.$cmptIndice.'\')" id="'.$cmptIndice.'" src="'.$daoImage->find(15)->getChemin().'" >';
        //echo '<img onClick="retournEtCheck(\''.$cmptIndice.'\')" id="'.$cmptIndice.'cache" src="'.$tab16Images[$cmptIndice]->getChemin().'" style="display: none">';
        $cmptIndice++;
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "</div>";
echo 'Nombre de tour <input id="nbrTour" type="texte" value="0" readonly><br>';
$imageLaPlusSouventTiree = getMostFrequentImageChosen();
echo 'La carte la plus souvent tirées est la carte numéro : ';
echo $imageLaPlusSouventTiree[0]['numImage'];
echo ' tirée ';
echo $imageLaPlusSouventTiree[0]['nbr'];
echo ' fois <br>';
$meilleur = getLeMeilleurJoueur();
echo 'Le meilleur joueur est : '.$meilleur[0]['pseudo'];
echo ' avec seulement '.$meilleur[0]['minNbCoup'].' coups necessaires pour finir une manche.';