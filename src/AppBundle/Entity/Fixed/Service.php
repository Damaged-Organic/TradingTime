<?php
// src/AppBundle/Entity/Fixed/Service.php
namespace AppBundle\Entity\Fixed;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\Utility\DoctrineMapping\IdMapper;

/**
 * @ORM\Table(name="fixed_services")
 * @ORM\Entity()
 */
class Service
{
    use IdMapper;

    /**
     * @ORM\Column(type="string", length=128, nullable=false)
     */
    protected $iconName;

    /**
     * @ORM\Column(type="string", length=63, nullable=false)
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=127, nullable=false)
     */
    protected $subtitle;

    /**
     * Set iconName
     *
     * @param string $iconName
     * @return Service
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
     * Set title
     *
     * @param string $title
     * @return Service
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set subtitle
     *
     * @param string $subtitle
     * @return Service
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string 
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }
}
