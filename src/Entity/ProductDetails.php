<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductDetails
 *
 * @ORM\Table(name="ProductDetails")
 * @ORM\Entity(repositoryClass="App\Repository\ProductDetailsRepository")
 */
class ProductDetails
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
     * @ORM\ManyToOne(targetEntity="Details")
     * @ORM\JoinColumn(name="id_details", referencedColumnName="id")
     */
    private $details;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="productDetails")
     * @ORM\JoinColumn(name="id_product", referencedColumnName="id")
     */
    private $product;

    /**
     * @ORM\Column(name="stat", type="integer", options={"default":1}, nullable=true)
     */
    private $stat;

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
     * Get the value of details
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set the value of details
     *
     * @return  self
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get the value of product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set the value of product
     *
     * @return  self
     */
    public function setProduct($product)
    {
        $this->product = $product;

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
}
