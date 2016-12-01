<?php
// src/AppBundle/Entity/Fixed/Section.php
namespace AppBundle\Entity\Fixed;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Entity\Utility\DoctrineMapping\IdMapper;

/**
 * @ORM\Table(name="fixed_sections")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\Fixed\SectionRepository")
 */
class Section
{
    use IdMapper;

    /**
     * @ORM\Column(type="string", length=63, nullable=false)
     */
    protected $stringId;

    /**
     * @ORM\Column(type="string", length=63, nullable=false)
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=127, nullable=false)
     */
    protected $subtitle;

    /**
     * @ORM\Column(type="string", length=511, nullable=true)
     */
    protected $shortDescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $fullDescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $rawContent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $contentFormatter;

    /**
     * Set stringId
     *
     * @param string $stringId
     * @return Section
     */
    public function setStringId($stringId)
    {
        $this->stringId = $stringId;

        return $this;
    }

    /**
     * Get stringId
     *
     * @return string
     */
    public function getStringId()
    {
        return $this->stringId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Section
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
     * @return Section
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

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Section
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set fullDescription
     *
     * @param string $fullDescription
     * @return Section
     */
    public function setFullDescription($fullDescription)
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    /**
     * Get fullDescription
     *
     * @return string 
     */
    public function getFullDescription()
    {
        return $this->fullDescription;
    }

    /**
     * Set rawContent
     *
     * @param string $rawContent
     * @return Section
     */
    public function setRawContent($rawContent)
    {
        $this->rawContent = $rawContent;

        return $this;
    }

    /**
     * Get rawContent
     *
     * @return string
     */
    public function getRawContent()
    {
        return $this->rawContent;
    }

    /**
     * Set contentFormatter
     *
     * @param string $contentFormatter
     * @return Section
     */
    public function setContentFormatter($contentFormatter)
    {
        $this->contentFormatter = $contentFormatter;
    }

    /**
     * Get contentFormatter
     *
     * @return string
     */
    public function getContentFormatter()
    {
        return $this->contentFormatter;
    }
}
