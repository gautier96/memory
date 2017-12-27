<?php

require_once(dirname(__FILE__) . '../../global.php');
require_once (dirname(__FILE__). '/entitysController.php');

use memory\Entity\Partie;
use memory\Entity\Image;
use memory\Entity\Choisir;
use memory\Entity\Joueur;

//Attention à toujours démarrer la session après l'appel des classes sinon elle ne pourra pas recupérer correctemeent les tableaux d'objets passés en session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Je récupère l'id de la derniere partie
$idDernierePartie = getLastPartie();
//Je lui ajoute 1 afin qu'il corresponde à l'id de la nouvelle partie
$idDernierePartie = $idDernierePartie[0]['idDernierePartie']+1;

//J'enregistre la partie
$entityManager->getRepository(Partie::class);
$nbrTour = $_GET["nbrTour"];
$joueur = $_SESSION["joueur"][0];
$partie = new Partie();
$partie->setNbCoups($nbrTour);
$partie->setIdJoueur($joueur->getIdJoueur());
$partie->setIdPartie($idDernierePartie);
try {
    $entityManager->persist($partie);
    $entityManager->flush();
    echo "success";
} catch (Exception $ex) {
    echo $ex->getMessage();
}
//J'enregistre les images de la partie dans choisir
$imagesChoisies = $_SESSION["imagesChoisies"];

////Je récupère toutes les parties A VIRER
//$daoPartie = $entityManager->getRepository(Partie::class);
//$mesParties = $daoPartie->findAll();
////Je ne garde que la derniere
//$maDernierePartie = $mesParties[count($mesParties) - 1];// A VIRER



//J'enregistre la partie
$entityManager->getRepository(Choisir::class);
foreach ($imagesChoisies as $image) {
    $choisir = new Choisir();
    $choisir->setNumImage($image->getIdImage());
    $choisir->setNumPartie($idDernierePartie);
    try {
        $entityManager->persist($choisir);
        $entityManager->flush();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
