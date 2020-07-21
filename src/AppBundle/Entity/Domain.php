<?php
/**
 * Created by PhpStorm.
 * User: rdbn
 * Date: 16.06.16
 * Time: 15:15
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DomainRepository")
 * @ORM\Table(name="domain")
 */
class Domain
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=500, unique=true)
     */
    protected $domain;

    /**
     * @ORM\Column(type="integer")
     */
    protected $domains;

    /**
     * @ORM\Column(type="integer")
     */
    protected $hrefs;

    /**
     * @ORM\Column(name="is_www", type="boolean", options={"default": FALSE})
     */
    protected $isWWW;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\TopDomains", mappedBy="domain")
     */
    protected $topDomains;

    /**
     * Constructor Domain
     */
    public function __construct()
    {
        $this->isWWW = false;
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
     * Set domain
     *
     * @param string $domain
     *
     * @return Domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set domains
     *
     * @param integer $domains
     *
     * @return Domain
     */
    public function setDomains($domains)
    {
        $this->domains = $domains;

        return $this;
    }

    /**
     * Get domains
     *
     * @return integer
     */
    public function getDomains()
    {
        return $this->domains;
    }

    /**
     * Set hrefs
     *
     * @param integer $hrefs
     *
     * @return Domain
     */
    public function setHrefs($hrefs)
    {
        $this->hrefs = $hrefs;

        return $this;
    }

    /**
     * Get hrefs
     *
     * @return integer
     */
    public function getHrefs()
    {
        return $this->hrefs;
    }

    /**
     * Set isWWW
     *
     * @param boolean $isWWW
     *
     * @return Domain
     */
    public function setIsWWW($isWWW)
    {
        $this->isWWW = $isWWW;

        return $this;
    }

    /**
     * Get isWWW
     *
     * @return boolean
     */
    public function getIsWWW()
    {
        return $this->isWWW;
    }

    /**
     * Add topDomain
     *
     * @param \AppBundle\Entity\TopDomains $topDomain
     *
     * @return Domain
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
}
