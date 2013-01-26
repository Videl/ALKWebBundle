<?php

namespace ALK\WebBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Translatable;


//@Gedmo\TranslationEntity(class="ALK\WebBundle\Entity\Translation\ArticleTranslation")
/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ALK\WebBundle\Entity\ArticleRepository")
 * 
 */
class Article /*implements Translatable*/
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Gedmo\Translatable
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Body", type="text")
     * @Gedmo\Translatable
     */
    private $Body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="datetime")
     */
    private $Date;

     /**
     * @ORM\OneToMany(
     *     targetEntity="Translation\ArticleTranslation",
     *  mappedBy="object",
     *  cascade={"persist", "remove"}
     * )
     * 
     */
    private $translations;
// @Assert\Valid(deep = true)


    public function __construct()
    {
        $this->Date = new \Datetime();
        $this->translations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Article
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
     * Set Body
     *
     * @param string $body
     * @return Article
     */
    public function setBody($body)
    {
        $this->Body = $body;
    
        return $this;
    }

    /**
     * Get Body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->Body;
    }

    /**
     * Set Date
     *
     * @param \DateTime $date
     * @return Article
     */
    public function setDate($date)
    {
        $this->Date = $date;
    
        return $this;
    }

    /**
     * Get Date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->Date;
    }


    /**
     * Set translations
     *
     * @param ArrayCollection $translations
     * @return Product
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;
        return $this;
    }

    /**
     * Get translations
     *
     * @return ArrayCollection
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * Add translation
     *
     * @param ProductTranslation
     */
    public function addTranslation($translation)
    {
        if ($translation->getContent()) {
            $translation->setObject($this);
            $this->translations->add($translation);
        }
    }

    /**
     * Remove translation
     *
     * @param ProductTranslation
     */
    public function removeTranslation($translation)
    {
        $this->translations->removeElement($translation);
    }

}
