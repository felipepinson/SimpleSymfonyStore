<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderProduct
 *
 * @ORM\Table(name="OrderProduct")
 * @ORM\Entity(repositoryClass="App\Repository\OrderProductRepository")
 */
class OrderProduct
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
     * @ORM\ManyToOne(targetEntity="Consumer")
     * @ORM\JoinColumn(name="id_consumer", referencedColumnName="id")
     */
    private $consumer;

    /**
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="orderProduct")
     * @ORM\JoinColumn(name="id_order", referencedColumnName="id")
     */
    private $order;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="id_product", referencedColumnName="id")
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="unit_price", type="decimal", precision=20, scale=2, nullable=true)
     */
    private $unitPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;
    
    /**
     * @var string
     *
     * @ORM\Column(name="date", type = "datetime")
     */
    private $orderDate;

    /**
     * @var string
     *
     * @ORM\Column(name="orderStatus", type="integer")
     */
    private $orderStatus;

    /**
     * @ORM\ManyToOne(targetEntity="OrderAddress")
     * @ORM\JoinColumn(name="id_address", referencedColumnName="id")
     */
    private $orderAddress;

    /**
     * Get the value of consumer
     */
    public function getConsumer()
    {
        return $this->consumer;
    }

    /**
     * Set the value of consumer
     *
     * @return  self
     */
    public function setConsumer($consumer)
    {
        $this->consumer = $consumer;

        return $this;
    }

    /**
     * Get the value of order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the value of order
     *
     * @return  self
     */
    public function setOrder($order)
    {
        $this->order = $order;

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
     * Get the value of unitPrice
     *
     * @return  string
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Set the value of unitPrice
     *
     * @param  string  $unitPrice
     *
     * @return  self
     */
    public function setUnitPrice(string $unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * Get the value of quantity
     *
     * @return  string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @param  string  $quantity
     *
     * @return  self
     */
    public function setQuantity(string $quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of orderDate
     *
     * @return  string
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * Set the value of orderDate
     *
     * @param  string  $orderDate
     *
     * @return  self
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    /**
     * Get the value of orderStatus
     *
     * @return  string
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Set the value of orderStatus
     *
     * @param  string  $orderStatus
     *
     * @return  self
     */
    public function setOrderStatus(string $orderStatus)
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * Get the value of orderAddress
     */
    public function getOrderAddress()
    {
        return $this->orderAddress;
    }

    /**
     * Set the value of orderAddress
     *
     * @return  self
     */
    public function setOrderAddress($orderAddress)
    {
        $this->orderAddress = $orderAddress;

        return $this;
    }
}
