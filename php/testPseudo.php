<?php

//Verifie si la session a été démarrée et la démarre si réponse = non
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once(dirname(__FILE__) . '../../global.php');

use memory\Entity\Joueur;

$pseudo = $_GET["pseudo"];
$daoJoueur = $entityManager->getRepository(Joueur::class);
//je test si le pseudo entré existe en bdd
if (count($daoJoueur->findByPseudo($pseudo)) == 1) {
    $_SESSION["joueur"] = $pseudo;
    echo "success";
} else {
    //Sinon on l'y ajoute
    $entityManager->getRepository(Joueur::class);

    $joueur = new Joueur();
    $joueur->setPseudo($pseudo);
    try {
        $entityManager->persist($joueur);
        $entityManager->flush();
        $_SESSION["joueur"] = $pseudo;
        echo "success";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}



