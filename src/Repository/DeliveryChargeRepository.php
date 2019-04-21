<?php

namespace App\Repository;

use App\Entity\DeliveryCharge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DeliveryCharge|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeliveryCharge|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeliveryCharge[]    findAll()
 * @method DeliveryCharge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeliveryChargeRepository extends ServiceEntityRepository
{
	public function __construct(RegistryInterface $registry)
	{
		parent::__construct($registry, DeliveryCharge::class);
	}

    // /**
    //  * @return DeliveryCharge[] Returns an array of DeliveryCharge objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DeliveryCharge
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
