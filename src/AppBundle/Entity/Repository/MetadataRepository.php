<?php
// src/AppBundle/Entity/Repository/MetadataRepository.php
namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository,
    Doctrine\ORM\Query;

class MetadataRepository extends EntityRepository
{
    public function findOneByRoute($route)
    {
        $query = $this->createQueryBuilder('metadata')
            ->select('metadata')
            ->where('metadata.route = :route')
            ->setParameter(':route', $route)
            ->getQuery();

        return $query->getSingleResult();
    }
}
