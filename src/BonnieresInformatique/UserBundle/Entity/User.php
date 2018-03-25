<?php

namespace BonnieresInformatique\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="BonnieresInformatique\UserBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Recaptcha\IsTrue
     */
    public $recaptcha;

    /**
     * @ORM\OneToMany(targetEntity="BonnieresInformatique\EcommerceBundle\Entity\UserOrder", mappedBy="user",cascade={"remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $orders;


    /**
     * @ORM\OneToMany(targetEntity="BonnieresInformatique\EcommerceBundle\Entity\UserAddress", mappedBy="user",cascade={"remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    public function __construct()
    {
        parent::__construct();
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
        $this->address = new \Doctrine\Common\Collections\ArrayCollection();
    }




    /**
     * Add orders
     *
     * @param \BonnieresInformatique\EcommerceBundle\Entity\UserOrder $orders
     * @return User
     */
    public function addOrder(\BonnieresInformatique\EcommerceBundle\Entity\UserOrder $orders)
    {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \BonnieresInformatique\EcommerceBundle\Entity\UserOrder $orders
     */
    public function removeOrder(\BonnieresInformatique\EcommerceBundle\Entity\UserOrder $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Add address
     *
     * @param \BonnieresInformatique\EcommerceBundle\Entity\UserAddress $address
     * @return User
     */
    public function addAddress(\BonnieresInformatique\EcommerceBundle\Entity\UserAddress $address)
    {
        $this->address[] = $address;

        return $this;
    }

    /**
     * Remove address
     *
     * @param \BonnieresInformatique\EcommerceBundle\Entity\UserAddress $address
     */
    public function removeAddress(\BonnieresInformatique\EcommerceBundle\Entity\UserAddress $address)
    {
        $this->address->removeElement($address);
    }

    /**
     * Get address
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAddress()
    {
        return $this->address;
    }
}
