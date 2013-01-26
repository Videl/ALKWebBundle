<?php

namespace ALK\WebBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Translatable;


/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ALK\WebBundle\Entity\ArticleRepository")
 */
class Article /*implements Translatable*/
{
    /**
     * @var integer
     *
     * @Gedmo\Slug(fields={"title"}, updatable=true, separator="_")
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="title", type="string", length=255)
     * @Gedmo\Translatable
     */
    private $title;

    /**
     * @var string
     *
     * @Gedmo\Translatable
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

    public function __construct()
    {
        $this->Date = new \Datetime();
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


}
