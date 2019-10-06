<?php

namespace App\Repository;

use App\Entity\Person;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Person|null find($id, $lockMode = null, $lockVersion = null)
 * @method Person|null findOneBy(array $criteria, array $orderBy = null)
 * @method Person[]    findAll()
 * @method Person[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Person::class);
    }

    /**
     * @param Person $person
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function addPerson(Person $person)
    {
        $eM = $this->getEntityManager();
        $eM->persist($person);
        $eM->flush();
    }

    /**
     * @return Query
     */
    public function getFindAllPersonsQuery()
    {
        /** @var QueryBuilder $qB */
        $qB = $this->createQueryBuilder('p');

        return $qB

            ->orderBy('p.id', 'ASC')

            ->getQuery()
            ;
    }
}
