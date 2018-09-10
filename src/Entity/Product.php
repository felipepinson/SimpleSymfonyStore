<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Product
 *
 * @ORM\Table(name="Product")
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="ProductDetails", mappedBy="product")
     */
    private $productDetails;


    /**
     * @ORM\OneToMany(targetEntity="ProductCategory", mappedBy="product")
     */
    private $productCategory;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $des;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=20, scale=2, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(name="stat", type="integer", options={"default":1}, nullable=true)
     */
    private $stat;
    

    public function __construct()
    {
        $this->productDetails = new ArrayCollection();
        $this->productCategory = new ArrayCollection();
    }


    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    public function getProductDetails()
    {
        return $this->productDetails;
    }

    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of des
     *
     * @return  string
     */
    public function getDes()
    {
        return $this->des;
    }

    /**
     * Set the value of des
     *
     * @param  string  $des
     *
     * @return  self
     */
    public function setDes(string $des)
    {
        $this->des = $des;

        return $this;
    }

    /**
     * Get the value of image
     *
     * @return  string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @param  string  $image
     *
     * @return  self
     */
    public function setImage(string $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of qtd
     *
     * @return  string
     */
    public function getQtd()
    {
        return $this->qtd;
    }

    /**
     * Set the value of qtd
     *
     * @param  string  $qtd
     *
     * @return  self
     */
    public function setQtd(string $qtd)
    {
        $this->qtd = $qtd;

        return $this;
    }

    /**
     * Get the value of price
     *
     * @return  string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @param  string  $price
     *
     * @return  self
     */
    public function setPrice(string $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of stat
     */
    public function getStat()
    {
        return $this->stat;
    }

    /**
     * Set the value of stat
     *
     * @return  self
     */
    public function setStat($stat)
    {
        $this->stat = $stat;

        return $this;
    }

    public function toArray()
    {
        $array = [];
        $array['id'] = $this->getId();
        $array['name'] = $this->getName();
        $array['des'] = $this->getDes();
        $array['productDetails'] = $this->getProductDetails();
        $array['productCategory'] = $this->getProductCategory();
        $array['price'] = $this->getPrice();

        return $array;
    }
}
