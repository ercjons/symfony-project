<?php

namespace BonnieresInformatique\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feature
 *
 * @ORM\Table(name="feature")
 * @ORM\Entity(repositoryClass="BonnieresInformatique\EcommerceBundle\Repository\FeatureRepository")
 */
class Feature
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
     * @ORM\OneToOne(targetEntity="BonnieresInformatique\EcommerceBundle\Entity\Product", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="os", type="string", length=25, nullable=true)
     */
    private $os;

    /**
     * @var string
     *
     * @ORM\Column(name="cpu", type="string", length=25, nullable=true)
     */
    private $cpu;

    /**
     * @var float
     *
     * @ORM\Column(name="cpu_frequency", type="float", nullable=true)
     */
    private $cpuFrequency;

    /**
     * @var string
     *
     * @ORM\Column(name="graphic_chipset", type="string", length=25, nullable=true)
     */
    private $graphicChipset;

    /**
     * @var string
     *
     * @ORM\Column(name="graphic_capacity", type="string", length=25, nullable=true)
     */
    private $graphicCapacity;

    /**
     * @var int
     *
     * @ORM\Column(name="screen_size", type="integer", nullable=true)
     */
    private $screenSize;

    /**
     * @var string
     *
     * @ORM\Column(name="screen_type", type="string", length=25, nullable=true)
     */
    private $screenType;

    /**
     * @var int
     *
     * @ORM\Column(name="ram_capacity", type="integer", nullable=true)
     */
    private $ramCapacity;

    /**
     * @var string
     *
     * @ORM\Column(name="ram_type", type="string", length=50, nullable=true)
     */
    private $ramType;

    /**
     * @var int
     *
     * @ORM\Column(name="ram_expandable", type="integer", nullable=true)
     */
    private $ramExpandable;

    /**
     * @var int
     *
     * @ORM\Column(name="ram_slot", type="integer", nullable=true)
     */
    private $ramSlot;

    /**
     * @var int
     *
     * @ORM\Column(name="hd_capacity", type="integer", nullable=true)
     */
    private $hdCapacity;

    /**
     * @var string
     *
     * @ORM\Column(name="hd_type", type="string", length=50, nullable=true)
     */
    private $hdType;

    /**
     * @var string
     *
     * @ORM\Column(name="hardware_connect", type="string", length=25, nullable=true)
     */
    private $hardwareConnect;

    /**
     * @var int
     *
     * @ORM\Column(name="usb_port", type="smallint", nullable=true)
     */
    private $usbPort;

    /**
     * @var string
     *
     * @ORM\Column(name="display_port", type="string", length=25, nullable=true)
     */
    private $displayPort;

    /**
     * @var string
     *
     * @ORM\Column(name="network", type="string", length=50, nullable=true)
     */
    private $network;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", nullable=true)
     */
    private $weight;

    /**
     * @var int
     *
     * @ORM\Column(name="rom", type="integer", nullable=true)
     */
    private $rom;

    /**
     * @var int
     *
     * @ORM\Column(name="extend_card", type="integer", nullable=true)
     */
    private $extendCard;

    /**
     * @var int
     *
     * @ORM\Column(name="front_cam", type="integer", nullable=true)
     */
    private $frontCam;

    /**
     * @var int
     *
     * @ORM\Column(name="back_cam", type="integer", nullable=true)
     */
    private $backCam;

    /**
     * @var string
     *
     * @ORM\Column(name="compatibility", type="string", length=50, nullable=true)
     */
    private $compatibility;

    /**
     * @var string
     *
     * @ORM\Column(name="hard_soft", type="string", length=50, nullable=true)
     */
    private $hardSoft;

    /**
     * @var string
     *
     * @ORM\Column(name="pattern", type="string", length=50, nullable=true)
     */
    private $pattern;

    /**
     * @var string
     *
     * @ORM\Column(name="material", type="string", length=50, nullable=true)
     */
    private $material;

    /**
     * @var float
     *
     * @ORM\Column(name="cable_length", type="float", nullable=true)
     */
    private $cableLength;


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
     * Set os
     *
     * @param string $os
     * @return Feature
     */
    public function setOs($os)
    {
        $this->os = $os;

        return $this;
    }

    /**
     * Get os
     *
     * @return string 
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * Set cpu
     *
     * @param string $cpu
     * @return Feature
     */
    public function setCpu($cpu)
    {
        $this->cpu = $cpu;

        return $this;
    }

    /**
     * Get cpu
     *
     * @return string 
     */
    public function getCpu()
    {
        return $this->cpu;
    }

    /**
     * Set cpuFrequency
     *
     * @param float $cpuFrequency
     * @return Feature
     */
    public function setCpuFrequency($cpuFrequency)
    {
        $this->cpuFrequency = $cpuFrequency;

        return $this;
    }

    /**
     * Get cpuFrequency
     *
     * @return float 
     */
    public function getCpuFrequency()
    {
        return $this->cpuFrequency;
    }

    /**
     * Set graphicChipset
     *
     * @param string $graphicChipset
     * @return Feature
     */
    public function setGraphicChipset($graphicChipset)
    {
        $this->graphicChipset = $graphicChipset;

        return $this;
    }

    /**
     * Get graphicChipset
     *
     * @return string 
     */
    public function getGraphicChipset()
    {
        return $this->graphicChipset;
    }

    /**
     * Set graphicCapacity
     *
     * @param string $graphicCapacity
     * @return Feature
     */
    public function setGraphicCapacity($graphicCapacity)
    {
        $this->graphicCapacity = $graphicCapacity;

        return $this;
    }

    /**
     * Get graphicCapacity
     *
     * @return string 
     */
    public function getGraphicCapacity()
    {
        return $this->graphicCapacity;
    }

    /**
     * Set screenSize
     *
     * @param integer $screenSize
     * @return Feature
     */
    public function setScreenSize($screenSize)
    {
        $this->screenSize = $screenSize;

        return $this;
    }

    /**
     * Get screenSize
     *
     * @return integer 
     */
    public function getScreenSize()
    {
        return $this->screenSize;
    }

    /**
     * Set screenType
     *
     * @param string $screenType
     * @return Feature
     */
    public function setScreenType($screenType)
    {
        $this->screenType = $screenType;

        return $this;
    }

    /**
     * Get screenType
     *
     * @return string 
     */
    public function getScreenType()
    {
        return $this->screenType;
    }

    /**
     * Set ramCapacity
     *
     * @param integer $ramCapacity
     * @return Feature
     */
    public function setRamCapacity($ramCapacity)
    {
        $this->ramCapacity = $ramCapacity;

        return $this;
    }

    /**
     * Get ramCapacity
     *
     * @return integer 
     */
    public function getRamCapacity()
    {
        return $this->ramCapacity;
    }

    /**
     * Set ramType
     *
     * @param string $ramType
     * @return Feature
     */
    public function setRamType($ramType)
    {
        $this->ramType = $ramType;

        return $this;
    }

    /**
     * Get ramType
     *
     * @return string 
     */
    public function getRamType()
    {
        return $this->ramType;
    }

    /**
     * Set ramExpandable
     *
     * @param integer $ramExpandable
     * @return Feature
     */
    public function setRamExpandable($ramExpandable)
    {
        $this->ramExpandable = $ramExpandable;

        return $this;
    }

    /**
     * Get ramExpandable
     *
     * @return integer 
     */
    public function getRamExpandable()
    {
        return $this->ramExpandable;
    }

    /**
     * Set ramSlot
     *
     * @param integer $ramSlot
     * @return Feature
     */
    public function setRamSlot($ramSlot)
    {
        $this->ramSlot = $ramSlot;

        return $this;
    }

    /**
     * Get ramSlot
     *
     * @return integer 
     */
    public function getRamSlot()
    {
        return $this->ramSlot;
    }

    /**
     * Set hdCapacity
     *
     * @param integer $hdCapacity
     * @return Feature
     */
    public function setHdCapacity($hdCapacity)
    {
        $this->hdCapacity = $hdCapacity;

        return $this;
    }

    /**
     * Get hdCapacity
     *
     * @return integer 
     */
    public function getHdCapacity()
    {
        return $this->hdCapacity;
    }

    /**
     * Set hdType
     *
     * @param string $hdType
     * @return Feature
     */
    public function setHdType($hdType)
    {
        $this->hdType = $hdType;

        return $this;
    }

    /**
     * Get hdType
     *
     * @return string 
     */
    public function getHdType()
    {
        return $this->hdType;
    }

    /**
     * Set hardwareConnect
     *
     * @param string $hardwareConnect
     * @return Feature
     */
    public function setHardwareConnect($hardwareConnect)
    {
        $this->hardwareConnect = $hardwareConnect;

        return $this;
    }

    /**
     * Get hardwareConnect
     *
     * @return string 
     */
    public function getHardwareConnect()
    {
        return $this->hardwareConnect;
    }

    /**
     * Set usbPort
     *
     * @param integer $usbPort
     * @return Feature
     */
    public function setUsbPort($usbPort)
    {
        $this->usbPort = $usbPort;

        return $this;
    }

    /**
     * Get usbPort
     *
     * @return integer 
     */
    public function getUsbPort()
    {
        return $this->usbPort;
    }

    /**
     * Set displayPort
     *
     * @param string $displayPort
     * @return Feature
     */
    public function setDisplayPort($displayPort)
    {
        $this->displayPort = $displayPort;

        return $this;
    }

    /**
     * Get displayPort
     *
     * @return string 
     */
    public function getDisplayPort()
    {
        return $this->displayPort;
    }

    /**
     * Set network
     *
     * @param string $network
     * @return Feature
     */
    public function setNetwork($network)
    {
        $this->network = $network;

        return $this;
    }

    /**
     * Get network
     *
     * @return string 
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * Set weight
     *
     * @param float $weight
     * @return Feature
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set rom
     *
     * @param integer $rom
     * @return Feature
     */
    public function setRom($rom)
    {
        $this->rom = $rom;

        return $this;
    }

    /**
     * Get rom
     *
     * @return integer 
     */
    public function getRom()
    {
        return $this->rom;
    }

    /**
     * Set extendCard
     *
     * @param integer $extendCard
     * @return Feature
     */
    public function setExtendCard($extendCard)
    {
        $this->extendCard = $extendCard;

        return $this;
    }

    /**
     * Get extendCard
     *
     * @return integer 
     */
    public function getExtendCard()
    {
        return $this->extendCard;
    }

    /**
     * Set frontCam
     *
     * @param integer $frontCam
     * @return Feature
     */
    public function setFrontCam($frontCam)
    {
        $this->frontCam = $frontCam;

        return $this;
    }

    /**
     * Get frontCam
     *
     * @return integer 
     */
    public function getFrontCam()
    {
        return $this->frontCam;
    }

    /**
     * Set backCam
     *
     * @param integer $backCam
     * @return Feature
     */
    public function setBackCam($backCam)
    {
        $this->backCam = $backCam;

        return $this;
    }

    /**
     * Get backCam
     *
     * @return integer 
     */
    public function getBackCam()
    {
        return $this->backCam;
    }

    /**
     * Set compatibility
     *
     * @param string $compatibility
     * @return Feature
     */
    public function setCompatibility($compatibility)
    {
        $this->compatibility = $compatibility;

        return $this;
    }

    /**
     * Get compatibility
     *
     * @return string 
     */
    public function getCompatibility()
    {
        return $this->compatibility;
    }

    /**
     * Set hardSoft
     *
     * @param string $hardSoft
     * @return Feature
     */
    public function setHardSoft($hardSoft)
    {
        $this->hardSoft = $hardSoft;

        return $this;
    }

    /**
     * Get hardSoft
     *
     * @return string 
     */
    public function getHardSoft()
    {
        return $this->hardSoft;
    }
    

    /**
     * Set material
     *
     * @param string $material
     * @return Feature
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return string 
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set cableLength
     *
     * @param float $cableLength
     * @return Feature
     */
    public function setCableLength($cableLength)
    {
        $this->cableLength = $cableLength;

        return $this;
    }

    /**
     * Get cableLength
     *
     * @return float 
     */
    public function getCableLength()
    {
        return $this->cableLength;
    }

    /**
     * Set pattern
     *
     * @param string $pattern
     * @return Feature
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * Get pattern
     *
     * @return string 
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Set product
     *
     * @param \BonnieresInformatique\EcommerceBundle\Entity\Product $product
     * @return Feature
     */
    public function setProduct(\BonnieresInformatique\EcommerceBundle\Entity\Product $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \BonnieresInformatique\EcommerceBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
