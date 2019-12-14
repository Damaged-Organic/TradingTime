<?php
// src/AppBundle/Entity/Repository/Fixed/PricingRepository.php
namespace AppBundle\Entity\Repository\Fixed;

use Doctrine\ORM\EntityRepository;

class PricingRepository extends EntityRepository
{
    public function findAll()
    {
        $query = $this->createQueryBuilder('pricing')
            ->select('pricing')
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
}