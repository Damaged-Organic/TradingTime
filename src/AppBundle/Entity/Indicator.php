<?php
// src/AppBundle/Entity/Indicator.php
namespace AppBundle\Entity;

use DateTime;

use Symfony\Component\Validator\Constraints as Assert,
    Symfony\Component\HttpFoundation\File\File;

use Doctrine\ORM\Mapping as ORM;

use Vich\UploaderBundle\Mapping\Annotation as Vich;

use AppBundle\Entity\Utility\DoctrineMapping\IdMapper;

/**
 * @ORM\Table(name="indicators")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\IndicatorRepository")
 *
 * @Vich\Uploadable
 */
class Indicator
{
    const WEB_PDF_GUIDE_PATH = "/uploads/indicators/pdf_guides/";

    use IdMapper;

    /**
     * @ORM\Column(type="string", length=127, nullable=false)
     */
    protected $title;

    /**
     * @Assert\File(
     *     maxSize="5M",
     *     mimeTypes={"application/pdf"}
     * )
     *
     * @Vich\UploadableField(mapping="indicator_pdf_guide", fileNameProperty="pdfGuideName")
     */
    protected $pdfGuideFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $pdfGuideName;

    /**
     * @ORM\Column(type="string", length=511, nullable=true)
     */
    protected $videoLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $videoId;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * To string
     */
    public function __toString()
    {
        return ( $this->title ) ? $this->title : "";
    }

    /**
     * Vich set $pdfGuideFile
     */
    public function setPdfGuideFile($pdfGuideFile = NULL)
    {
        $this->pdfGuideFile = $pdfGuideFile;

        if( $pdfGuideFile instanceof File )
            $this->updatedAt = new DateTime;
    }

    /**
     * Vich get $pdfGuideFile
     */
    public function getPdfGuideFile()
    {
        return $this->pdfGuideFile;
    }

    /**
     * Vich get pdfGuidePath
     */
    public function getPdfGuidePath()
    {
        return ( $this->pdfGuideName )
            ? self::WEB_PDF_GUIDE_PATH.$this->pdfGuideName
            : FALSE;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Indicator
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
     * Set pdfGuideName
     *
     * @param string $pdfGuideName
     * @return Indicator
     */
    public function setPdfGuideName($pdfGuideName)
    {
        $this->pdfGuideName = $pdfGuideName;

        return $this;
    }

    /**
     * Get pdfGuideName
     *
     * @return string 
     */
    public function getPdfGuideName()
    {
        return $this->pdfGuideName;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Indicator
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set videoLink
     *
     * @param string $videoLink
     * @return Indicator
     */
    public function setVideoLink($videoLink)
    {
        $this->videoLink = $videoLink;

        $this->setVideoId($this->videoLink);

        return $this;
    }

    /**
     * Get videoLink
     *
     * @return string
     */
    public function getVideoLink()
    {
        return $this->videoLink;
    }

    /**
     * Set videoId
     *
     * @param string $videoId
     * @return Indicator
     */
    public function setVideoId($videoLink)
    {
        $this->videoId = ( preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoLink, $match) )
            ? $match[1]
            : NULL;

        return $this;
    }

    /**
     * Get videoId
     *
     * @return string
     */
    public function getVideoId()
    {
        return $this->videoId;
    }
}