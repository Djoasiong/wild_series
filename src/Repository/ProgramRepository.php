<?php

namespace App\Repository;

use App\Entity\Actor;
use App\Entity\Program;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Program|null find($id, $lockMode = null, $lockVersion = null)
 * @method Program|null findOneBy(array $criteria, array $orderBy = null)
 * @method Program[]    findAll()
 * @method Program[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgramRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Program::class);
    }

    // /**
    //  * @return Program[] Returns an array of Program objects
    //  */

    public function findLikeName(string $name)
{
    $queryBuilder = $this->createQueryBuilder('p')
        ->join('p.actors', 'a')
        ->where('p.title LIKE :name')
        ->orWhere('a.name LIKE :name')
        ->setParameter('name', '%' . $name . '%')
        ->orderBy('p.title', 'ASC')
        ->getQuery();

    return $queryBuilder->getResult();
}

    // public function findOneBySomeField($value): ?Program
    // {
    //     return $this->createQueryBuilder('p')
    //         ->andWhere('p.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getOneOrNullResult()
    //     ;
    // }

}
