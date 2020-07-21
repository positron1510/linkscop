<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 02.06.16
 * Time: 18:39
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PhraseRepository")
 * @ORM\Table(name="phrase")
 */
class Phrase
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $phrase;

    /**
     * @ORM\Column(type="integer")
     */
    protected $wordstat;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Page", mappedBy="phrase")
     */
    protected $page;

    /**
     * Constructor Phrase
     */
    public function __construct()
    {
        $this->page = new ArrayCollection();
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
     * Set phrase
     *
     * @param string $phrase
     *
     * @return Phrase
     */
    public function setPhrase($phrase)
    {
        $this->phrase = $phrase;

        return $this;
    }

    /**
     * Get phrase
     *
     * @return string
     */
    public function getPhrase()
    {
        return $this->phrase;
    }

    /**
     * Set wordstat
     *
     * @param integer $wordstat
     *
     * @return Phrase
     */
    public function setWordstat($wordstat)
    {
        $this->wordstat = $wordstat;

        return $this;
    }

    /**
     * Get wordstat
     *
     * @return integer
     */
    public function getWordstat()
    {
        return $this->wordstat;
    }

    /**
     * Add page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return Phrase
     */
    public function addPage(\AppBundle\Entity\Page $page)
    {
        $this->page[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \AppBundle\Entity\Page $page
     */
    public function removePage(\AppBundle\Entity\Page $page)
    {
        $this->page->removeElement($page);
    }

    /**
     * Get page
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPage()
    {
        return $this->page;
    }
}
