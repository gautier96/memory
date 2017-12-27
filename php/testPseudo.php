<?php
require_once(dirname(__FILE__) . '../../global.php');

use memory\Entity\Joueur;

//Verifie si la session a été démarrée et la démarre si réponse = non
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pseudo = $_GET["pseudo"];
$daoJoueur = $entityManager->getRepository(Joueur::class);
//je test si le pseudo entré existe en bdd
$joueur = $daoJoueur->findByPseudo($pseudo);
if ($joueur != null) {
    $_SESSION["joueur"] = $joueur;
    echo "success";
} else {
    //Sinon on l'y ajoute en BDD
    $entityManager->getRepository(Joueur::class);
    $joueurNew = new Joueur();
    $joueurNew->setPseudo($pseudo);
    try {
        $entityManager->persist($joueurNew);
        $entityManager->flush();
        $joueur = $daoJoueur->findByPseudo($pseudo);
        $_SESSION["joueur"] = $joueur;
        echo "success";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}



