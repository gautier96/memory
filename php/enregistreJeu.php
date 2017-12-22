<?php

require_once(dirname(__FILE__) . '../../global.php');

use memory\Entity\Partie;
use memory\Entity\Image;
use \memory\Entity\Choisir;

//Attention à toujours démarrer la session après l'appel des classes sinon elle ne pourra pas recupérer correctemeent les tableaux d'objets passés en session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//J'enregistre la partie
$entityManager->getRepository(Partie::class);
$nbrTour = $_GET["nbrTour"];
$partie = new Partie();
$partie->setNbCoups($nbrTour);
try {
    $entityManager->persist($partie);
    $entityManager->flush();
    echo "success";
} catch (Exception $ex) {
    echo $ex->getMessage();
}
//J'enregistre les images de la partie dans choisir
$imagesChoisies = $_SESSION["imagesChoisies"];
//Je récupère toutes les parties
$daoPartie = $entityManager->getRepository(Partie::class);
$mesParties = $daoPartie->findAll();
//Je ne garde que la derniere
$maDernierePartie = $mesParties[count($mesParties) - 1];
//J'enregistre la partie
$entityManager->getRepository(Choisir::class);
foreach ($imagesChoisies as $image) {
    $choisir = new Choisir();
    $choisir->setNumImage($image->getIdImage());
    $choisir->setNumPartie($maDernierePartie->getIdPartie());
    try {
        $entityManager->persist($choisir);
        $entityManager->flush();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
