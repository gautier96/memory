<?php

require_once(dirname(__FILE__) . '../../global.php');

use memory\Entity\Partie;

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