<?php
// src/AppBundle/Entity/Repository/Fixed/SectionRepository.php
namespace AppBundle\Entity\Repository\Fixed;

use Doctrine\ORM\EntityRepository;

class SectionRepository extends EntityRepository
{
    public function findAll()
    {
        $query = $this->createQueryBuilder('section')
            ->select('section')
            ->getQuery();

        $transform = function($inputArray)
        {
            $outputArray = [];

            foreach($inputArray as $item) {
                $outputArray[$item->getStringId()] = $item;
            }

            return $outputArray;
        };

        return $transform($query->getResult());
    }

    public function findBySectionStringId($stringId)
    {
        $query = $this->createQueryBuilder('section')
            ->select('section')
            ->where('section.stringId = :stringId')
            ->setParameter('stringId', $stringId)
            ->getQuery();

        return $query->getSingleResult();
    }
}