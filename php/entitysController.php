<?php

use memory\Entity\Choisir;

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
