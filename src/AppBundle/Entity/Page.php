<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 02.06.16
 * Time: 18:39
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PageRepository")
 * @ORM\Table(name="page")
 */
class Page
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Task", inversedBy="page", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     */
    protected $task;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $page;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TopDomains", mappedBy="page", cascade={"persist", "remove"})
     */
    private $topDomains;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Phrase", inversedBy="page")
     * @ORM\JoinTable(name="page_phrase")
     */
    private $phrase;

    /**
     * Constructor Page
    */
    public function __construct()
    {
        $this->phrase = new ArrayCollection();
        $this->topDomains = new ArrayCollection();
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
     * Set page
     *
     * @param string $page
     *
     * @return Page
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set task
     *
     * @param \AppBundle\Entity\Task $task
     *
     * @return Page
     */
    public function setTask(\AppBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \AppBundle\Entity\Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Add topDomain
     *
     * @param \AppBundle\Entity\TopDomains $topDomain
     *
     * @return Page
     */
    public function addTopDomain(\AppBundle\Entity\TopDomains $topDomain)
    {
        $this->topDomains[] = $topDomain;

        return $this;
    }

    /**
     * Remove topDomain
     *
     * @param \AppBundle\Entity\TopDomains $topDomain
     */
    public function removeTopDomain(\AppBundle\Entity\TopDomains $topDomain)
    {
        $this->topDomains->removeElement($topDomain);
    }

    /**
     * Get topDomains
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTopDomains()
    {
        return $this->topDomains;
    }

    /**
     * Add phrase
     *
     * @param \AppBundle\Entity\Phrase $phrase
     *
     * @return Page
     */
    public function addPhrase(\AppBundle\Entity\Phrase $phrase)
    {
        $this->phrase[] = $phrase;

        return $this;
    }

    /**
     * Remove phrase
     *
     * @param \AppBundle\Entity\Phrase $phrase
     */
    public function removePhrase(\AppBundle\Entity\Phrase $phrase)
    {
        $this->phrase->removeElement($phrase);
    }

    /**
     * Get phrase
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhrase()
    {
        return $this->phrase;
    }
}
