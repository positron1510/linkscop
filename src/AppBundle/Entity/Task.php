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
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 * @ORM\Table(name="task")
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Region", inversedBy="task")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    protected $region;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Top", inversedBy="task")
     * @ORM\JoinColumn(name="top_id", referencedColumnName="id")
     */
    protected $top;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="integer", length=0)
     */
    protected $status;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     *
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Page", mappedBy="task", cascade={"persist", "remove"})
     */
    private $page;

    /**
     * Constructor Task
     */
    public function __construct()
    {
        $this->status = 0;
        $this->page = new ArrayCollection();
        $this->createdAt = new \DateTime();
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
     * Set name
     *
     * @param string $name
     *
     * @return Task
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Task
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Task
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set region
     *
     * @param \AppBundle\Entity\Region $region
     *
     * @return Task
     */
    public function setRegion(\AppBundle\Entity\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \AppBundle\Entity\Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set top
     *
     * @param \AppBundle\Entity\Top $top
     *
     * @return Task
     */
    public function setTop(\AppBundle\Entity\Top $top = null)
    {
        $this->top = $top;

        return $this;
    }

    /**
     * Get top
     *
     * @return \AppBundle\Entity\Top
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * Add page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return Task
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
