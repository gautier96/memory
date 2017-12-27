<?php

use memory\Entity\Choisir;
use memory\Entity\Partie;

//Récupère l'image la plus souvent tirée au sort par l'application dans la table choisir
function getMostFrequentImageChosen() {
    require(dirname(__FILE__) . '../../global.php');
    $qb = $entityManager->createQueryBuilder();
    //SELECT `numImage`, COUNT(`numImage`) as 'nbr' FROM `choisir` GROUP BY `numImage` ORDER BY `nbr` DESC LIMIT 1
    //SELECT numImage, numPartie, count(numImage) AS sclr_2 FROM choisir GROUP BY numImage, numPartie ORDER BY sclr_2 DESC LIMIT 1;
    $qb->select('u.numImage, count(u.numImage) as nbr')
            ->from(Choisir::class, 'u')
            ->groupBy('u.numImage')
            ->orderBy('nbr', 'DESC')
            ->setMaxResults(1);
    $query = $qb->getQuery();
    return $query->getResult();
}

//Récupère la l'id de la dernière partie dans la table partie
function getLastPartie(){
    require(dirname(__FILE__) . '../../global.php');
    $qb = $entityManager->createQueryBuilder();
    //SELECT MAX(`idPartie`) FROM `partie`
    $qb->select('MAX(u.idPartie) as idDernierePartie')
            ->from(Partie::class, 'u');
    $query = $qb->getQuery();
    return $query->getResult();
}

