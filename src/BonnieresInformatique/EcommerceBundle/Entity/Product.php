<?php

namespace BonnieresInformatique\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="BonnieresInformatique\EcommerceBundle\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Product
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
     * @ORM\ManyToOne(targetEntity="BonnieresInformatique\EcommerceBundle\Entity\Category", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="BonnieresInformatique\EcommerceBundle\Entity\Brand", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity="BonnieresInformatique\EcommerceBundle\Entity\Tva", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tva;


//    public function __toString()
//    {
//        return $this->feature;
//    }



    /**
     * @ORM\ManyToOne(targetEntity="BonnieresInformatique\EcommerceBundle\Entity\UserOrder", inversedBy="products")
     * @ORM\JoinColumn(nullable=true)
     */
    private $order;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price;

    /**
     * @var bool
     *
     * @ORM\Column(name="available", type="boolean", nullable=true)
     */
    private $available;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="listing_date", type="datetime", nullable=true)
     */
    private $listingDate;

    /**
     * @var string
     *
     * @ORM\Column(name="guarantee", type="string", length=50, nullable=true)
     */
    private $guarantee;

    /**
     * @Assert\File(
     *    maxSize= "1024k" ,
     *    maxSizeMessage = "Votre fichier ne doit pas dépasser 1Mo",
     *    mimeTypes = {"image/jpeg","image/png","image/gif"},
     *    mimeTypesMessage = "Merci d'uploader un fichier jpg, png ou gif"
     * )
     */
    public $file;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    protected $path;

    

//    constructor
    /**
     * Constructor
     */
    public function __construct($available = true)
    {
        $this->setAvailable($available);
        $this->setListingDate(new \DateTime());
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
     * Set type
     *
     * @param string $type
     * @return Product
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
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
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set available
     *
     * @param boolean $available
     * @return Product
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean 
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set listingDate
     *
     * @param \DateTime $listingDate
     * @return Product
     */
    public function setListingDate($listingDate)
    {
        $this->listingDate = $listingDate;

        return $this;
    }

    /**
     * Get listingDate
     *
     * @return \DateTime 
     */
    public function getListingDate()
    {
        return $this->listingDate;
    }

    /**
     * Set guarantee
     *
     * @param string $guarantee
     * @return Product
     */
    public function setGuarantee($guarantee)
    {
        $this->guarantee = $guarantee;

        return $this;
    }

    /**
     * Get guarantee
     *
     * @return string 
     */
    public function getGuarantee()
    {
        return $this->guarantee;
    }

    /**
     * Set category
     *
     * @param \BonnieresInformatique\EcommerceBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\BonnieresInformatique\EcommerceBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \BonnieresInformatique\EcommerceBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set brand
     *
     * @param \BonnieresInformatique\EcommerceBundle\Entity\Brand $brand
     * @return Product
     */
    public function setBrand(\BonnieresInformatique\EcommerceBundle\Entity\Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \BonnieresInformatique\EcommerceBundle\Entity\Brand 
     */
    public function getBrand()
    {
        return $this->brand;
    }

//    uploads d'images

    /**
     * Set path
     *
     * @param string $path
     * @return Product
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }


    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
    }

   
    public function getFile()
    {
        return $this->file;
    }

    // Retourner le chemin absolu du fichier téléchargé
    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }
    // cette méthode sera utilisée pour afficher les images dans les vues Twig
    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }
    protected  function getUploadRootDir() {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir() {
        return 'upload/pictures';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        if(null !==$this->file) {
            // On crypte le nom du fichier avant téléchargement.
            // La méthode guessExtension() retourne l'extension du fichier.
            // On concatène le nom du fichier cryptée et l'extension "devinée"
            // Ne pas oublier d'activer le module php_fileinfo.dll dans votre fichier php.ini
            $this->path = hash('sha256', uniqid($this->path)).'.'.$this->file->guessExtension();
            // toto.jpg
            // devient
            // sdkfsflmkglmsdfkvdfv,;erkfgoper.jpg
        }
    }

    /**
     * Déclencher le téléchargement du fichier après que le dessin soit sauvegardé en DB
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     *
     */
    public function upload() {
        // Si pas de fichier, on stoppe la méthode
        if(null === $this->file) {
            return;
        }
        // Si un bug survient lors du déplacement du fichier de la mémoire temporaire vers le répertoire d'upload, alors une exception est déclenchée. L'entité Draw ne sera pas persistée dans la db, car lorque les lifeCycleCallbacks de Doctrine sont utilisés la totalité des étapes doit bien se dérouler pour que l'entitié soit enregistrée dans la DB.
        $this->file->move($this->getUploadRootDir(),$this->path);
        // Dès que le download est fait, on "vide" l'attribut drawFile
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        // On regarde si le fichier existe dans le répertoire, si oui on stocke le chemin dans $file
        if($file = $this->getAbsolutePath()) {
            // on détruit le fichier dans le répertoire
            unlink($file);
        }
    }




    /**
     * Set tva
     *
     * @param \BonnieresInformatique\EcommerceBundle\Entity\Tva $tva
     * @return Product
     */
    public function setTva(\BonnieresInformatique\EcommerceBundle\Entity\Tva $tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return \BonnieresInformatique\EcommerceBundle\Entity\Tva 
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set order
     *
     * @param \BonnieresInformatique\EcommerceBundle\Entity\UserOrder $order
     * @return Product
     */
    public function setOrder(\BonnieresInformatique\EcommerceBundle\Entity\UserOrder $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \BonnieresInformatique\EcommerceBundle\Entity\UserOrder 
     */
    public function getOrder()
    {
        return $this->order;
    }

}
