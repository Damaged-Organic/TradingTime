<?php
// src/AppBundle/Entity/Static/Biography.php
namespace AppBundle\Entity\Fixed;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\Utility\DoctrineMapping\IdMapper;

/**
 * @ORM\Table(name="fixed_biography")
 * @ORM\Entity()
 */
class Biography
{
    use IdMapper;

    /**
     * @ORM\Column(type="string", length=128, nullable=false)
     */
    protected $iconName;

    /**
     * @ORM\Column(type="string", length=511, nullable=false)
     */
    protected $description;

    /**
     * Set iconName
     *
     * @param string $iconName
     * @return Biography
     */
    public function setIconName($iconName)
    {
        $this->iconName = $iconName;

        return $this;
    }

    /**
     * Get iconName
     *
     * @return string 
     */
    public function getIconName()
    {
        return $this->iconName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Biography
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}