<?php
// src/AppBundle/Entity/Repository/Fixed/WebinarRepository.php
namespace AppBundle\Entity\Repository\Fixed;

use DateTime;

use Doctrine\ORM\EntityRepository;

class WebinarRepository extends EntityRepository
{
    public function findAll()
    {
        $query = $this->createQueryBuilder('webinar')
            ->select('webinar')
            ->where('webinar.datetime >= :now')
            ->andWhere('webinar.isActive = :isActive')
            ->setParameters([
                'now'      => new DateTime("NOW"),
                'isActive' => TRUE
            ])
            ->getQuery();

        return $query->getResult();
    }
}