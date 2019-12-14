<?php
// src/AppBundle/Entity/Utility/DoctrineMapping/IdMapper.php
namespace AppBundle\Entity\Utility\DoctrineMapping;

use Doctrine\ORM\Mapping as ORM;

trait IdMapper
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="bigint")
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
