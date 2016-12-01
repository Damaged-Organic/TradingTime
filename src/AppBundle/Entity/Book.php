<?php
// src/AppBundle/Entity/Book.php
namespace AppBundle\Entity;

use DateTime;

use Symfony\Component\Validator\Constraints as Assert,
    Symfony\Component\HttpFoundation\File\File;

use Doctrine\ORM\Mapping as ORM;

use Vich\UploaderBundle\Mapping\Annotation as Vich;

use AppBundle\Entity\Utility\DoctrineMapping\IdMapper,
    AppBundle\Entity\Utility\DoctrineMapping\SlugMapper,
    AppBundle\Entity\Utility\DoctrineMapping\PaymentMapper;

/**
 * @ORM\Table(name="books")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\BookRepository")
 *
 * @Vich\Uploadable
 */
class Book
{
    const WEB_COVER_PATH       = "/uploads/books/covers/";
    const WEB_PDF_PREVIEW_PATH = "/uploads/books/pdf_previews/";

    use IdMapper, SlugMapper, PaymentMapper;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $title;

    /**
     * @Assert\File(
     *     maxSize="2M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg", "image/gif"}
     * )
     *
     * @Vich\UploadableField(mapping="book_cover", fileNameProperty="coverName")
     */
    protected $coverFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $coverName;

    /**
     * @ORM\Column(type="smallint", nullable=false)
     */
    protected $year;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $rawContent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $contentFormatter;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $awardYear;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $awardTitle;

    /**
     * @Assert\File(
     *     maxSize="10M",
     *     mimeTypes={"application/pdf"}
     * )
     *
     * @Vich\UploadableField(mapping="book_pdf_preview", fileNameProperty="pdfPreviewName")
     */
    protected $pdfPreviewFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $pdfPreviewName;

    /**
     * @ORM\Column(type="string", length=3, nullable=false)
     */
    protected $code;

    /**
     * @ORM\Column(type="string", length=1, nullable=false)
     */
    protected $sign;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=false)
     */
    protected $price;

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
     * Vich set $coverFile
     */
    public function setCoverFile($coverFile = NULL)
    {
        $this->coverFile = $coverFile;

        if( $coverFile instanceof File )
            $this->updatedAt = new DateTime;
    }

    /**
     * Vich get $coverFile
     */
    public function getCoverFile()
    {
        return $this->coverFile;
    }

    /**
     * Vich get coverPath
     */
    public function getCoverPath()
    {
        return ( $this->coverName )
            ? self::WEB_COVER_PATH.$this->coverName
            : FALSE;
    }

    /**
     * Vich set $pdfPreviewFile
     */
    public function setPdfPreviewFile($pdfPreviewFile = NULL)
    {
        $this->pdfPreviewFile = $pdfPreviewFile;

        if( $pdfPreviewFile instanceof File )
            $this->updatedAt = new DateTime;
    }

    /**
     * Vich get $pdfPreviewFile
     */
    public function getPdfPreviewFile()
    {
        return $this->pdfPreviewFile;
    }

    /**
     * Vich get pdfPreviewPath
     */
    public function getPdfPreviewPath()
    {
        return ( $this->pdfPreviewName )
            ? self::WEB_PDF_PREVIEW_PATH.$this->pdfPreviewName
            : FALSE;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
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
     * Set coverName
     *
     * @param string $coverName
     * @return Book
     */
    public function setCoverName($coverName)
    {
        $this->coverName = $coverName;

        return $this;
    }

    /**
     * Get coverName
     *
     * @return string 
     */
    public function getCoverName()
    {
        return $this->coverName;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return Book
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Book
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

    /**
     * Set rawContent
     *
     * @param string $rawContent
     * @return Book
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
     * @return Book
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

    /**
     * Set awardYear
     *
     * @param integer $awardYear
     * @return Book
     */
    public function setAwardYear($awardYear)
    {
        $this->awardYear = $awardYear;

        return $this;
    }

    /**
     * Get awardYear
     *
     * @return integer 
     */
    public function getAwardYear()
    {
        return $this->awardYear;
    }

    /**
     * Set awardTitle
     *
     * @param string $awardTitle
     * @return Book
     */
    public function setAwardTitle($awardTitle)
    {
        $this->awardTitle = $awardTitle;

        return $this;
    }

    /**
     * Get awardTitle
     *
     * @return string 
     */
    public function getAwardTitle()
    {
        return $this->awardTitle;
    }

    /**
     * Set pdfPreviewName
     *
     * @param string $pdfPreviewName
     * @return Book
     */
    public function setPdfPreviewName($pdfPreviewName)
    {
        $this->pdfPreviewName = $pdfPreviewName;

        return $this;
    }

    /**
     * Get pdfPreviewName
     *
     * @return string 
     */
    public function getPdfPreviewName()
    {
        return $this->pdfPreviewName;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return BookPrice
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set sign
     *
     * @param string $sign
     * @return BookPrice
     */
    public function setSign($sign)
    {
        $this->sign = $sign;

        return $this;
    }

    /**
     * Get sign
     *
     * @return string
     */
    public function getSign()
    {
        return $this->sign;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Book
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Book
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
}