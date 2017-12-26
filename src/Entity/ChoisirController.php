<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace memory\Entity;
require_once(dirname(__FILE__) . '../../../global.php');


use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\EntityRepository;

/**
 * Description of ChoisirController
 *
 * @author gauti
 */
class ChoisirController extends EntityRepository{

    public function getImagePlusFrequente() {
//        SELECT `value`,
//        COUNT(`value`) AS `value_occurrence`
//        FROM `my_table`
//        GROUP BY `value`
//        ORDER BY `value_occurrence` DESC
//        LIMIT 1;
        // On récupère l'EntityManager
        $dql = "SELECT numImage count(numImage) as value_occurrence FROM Image groupBy numImage orderBy value_occurrence DESC";
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults(1);
        return $query->getResult();
//        $em = EntityManager();
//        $qb = $em->createQueryBuilder();
//        $qb->select('count(numImage) as value_occurrence')
//                ->from('Image', 'numImage')
//                ->groupBy('numImage')
//                ->orderBy('value_occurrence', 'DESC')
//                ->setMaxResults(1);
//        $query = $qb->getQuery();
//        $result = $query->getResult();
//        return $result;
    }

}
