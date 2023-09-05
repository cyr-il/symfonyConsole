<?php

namespace App\Repository;

use App\Entity\CommandConsole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CommandConsole>
 *
 * @method CommandConsole|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommandConsole|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommandConsole[]    findAll()
 * @method CommandConsole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandConsoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommandConsole::class);
    }

    public function save(CommandConsole $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CommandConsole $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CommandConsole[] Returns an array of CommandConsole objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

   public function findOneBySomeField($value): ?CommandConsole
   {
       return $this->createQueryBuilder('c')
           ->andWhere('c.command = :val')
           ->setParameter('val', $value)
           ->getQuery()
           ->getOneOrNullResult()
       ;
   }
}
