<?php

namespace BonnieresInformatique\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserOrder
 *
 * @ORM\Table(name="user_order")
 * @ORM\Entity(repositoryClass="BonnieresInformatique\EcommerceBundle\Repository\UserOrderRepository")
 */
class UserOrder
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="BonnieresInformatique\UserBundle\Entity\User", inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="reference", type="integer", nullable=true, unique=true)
     */
    private $reference;

    /**
     * @var bool
     *
     * @ORM\Column(name="validate", type="boolean", nullable=true)
     */
    private $validate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="order_date", type="datetime", nullable=true)
     */
    private $orderDate;

    /**
     * @ORM\OneToMany(targetEntity="BonnieresInformatique\EcommerceBundle\Entity\Product", mappedBy="order",cascade={"remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $products;


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
     * Set reference
     *
     * @param integer $reference
     * @return UserOrder
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return integer 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set validate
     *
     * @param boolean $validate
     * @return UserOrder
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * Get validate
     *
     * @return boolean 
     */
    public function getValidate()
    {
        return $this->validate;
    }

    /**
     * Set orderDate
     *
     * @param \DateTime $orderDate
     * @return UserOrder
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    /**
     * Get orderDate
     *
     * @return \DateTime 
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }


    /**
     * Set user
     *
     * @param \BonnieresInformatique\UserBundle\Entity\User $user
     * @return UserOrder
     */
    public function setUser(\BonnieresInformatique\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BonnieresInformatique\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Constructor
     */
    public function __construct($validate = true)
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setValidate($validate);
        $this->setOrderDate(new \ DateTime());
    }

    /**
     * Add products
     *
     * @param \BonnieresInformatique\EcommerceBundle\Entity\Product $products
     * @return UserOrder
     */
    public function addProduct(\BonnieresInformatique\EcommerceBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \BonnieresInformatique\EcommerceBundle\Entity\Product $products
     */
    public function removeProduct(\BonnieresInformatique\EcommerceBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
}
