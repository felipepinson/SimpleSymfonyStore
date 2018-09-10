<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Order
 *
 * @ORM\Table(name="`Order`")
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
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
     * @ORM\OneToMany(targetEntity="OrderProduct", mappedBy="order")
     */
    private $orderProduct;
    
    /**
     * @ORM\OneToOne(targetEntity="OrderAddress", mappedBy="order")
     */
    private $orderAddress;


    /**
     * @var string
     *
     * @ORM\Column(name="total", type="decimal", precision=20, scale=2, nullable=true)
     */
    private $total;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type = "datetime")
     */
    private $orderDate;


    public function __construct()
    {
        $this->orderProduct = new ArrayCollection();
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
     * Get the value of total
     *
     * @return  string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @param  string  $total
     *
     * @return  self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of orderDate
     *
     * @return  string
     */
    public function getOrderDate()
    {
        return $this->orderDate->format('Y-m-d H:i:s');
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
     * Get the value of orderProduct
     */
    public function getOrderProduct()
    {
        return $this->orderProduct;
    }

    /**
     * Get the value of orderAddress
     */
    public function getOrderAddress()
    {
        return $this->orderAddress;
    }
}
