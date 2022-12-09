<?php

namespace App\Repository;

use App\Entity\Technologie;
use Doctrine\ORM\EntityRepository;

/**
 * @method Technologie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Technologie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Technologie[]    findAll()
 * @method Technologie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechnologieRepository extends EntityRepository
{

}