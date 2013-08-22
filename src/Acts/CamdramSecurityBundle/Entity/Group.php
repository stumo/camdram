<?php

namespace Acts\CamdramSecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserGroup
 *
 * @ORM\Table(name="acts_groups")
 * @ORM\Entity(repositoryClass="GroupRepository")
 */
class Group
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
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="short_name", type="string", length=30)
     * @Assert\NotBlank
     */
    private $short_name;

    /**
     * @var string
     * @ORM\Column(name="menu_name", type="string", length=30)
     * @Assert\NotBlank
     */
    private $menu_name;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Acts\CamdramBundle\Entity\User", inversedBy="groups")
     * @ORM\JoinTable(name="acts_user_group_links")
     */
    private $users;


    private $roles = array();

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
     * @return UserGroup
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
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add users
     *
     * @param \Acts\CamdramBundle\Entity\User $users
     * @return Group
     */
    public function addUser(\Acts\CamdramBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Acts\CamdramBundle\Entity\User $users
     */
    public function removeUser(\Acts\CamdramBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set short_name
     *
     * @param string $shortName
     * @return Group
     */
    public function setShortName($shortName)
    {
        $this->short_name = $shortName;
    
        return $this;
    }

    /**
     * Get short_name
     *
     * @return string 
     */
    public function getShortName()
    {
        return $this->short_name;
    }

    /**
     * Set menu_name
     *
     * @param string $menuName
     * @return Group
     */
    public function setMenuName($menuName)
    {
        $this->menu_name = $menuName;
    
        return $this;
    }

    /**
     * Get menu_name
     *
     * @return string 
     */
    public function getMenuName()
    {
        return $this->menu_name;
    }
}