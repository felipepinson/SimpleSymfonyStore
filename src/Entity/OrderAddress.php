<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderAddress
 *
 * @ORM\Table(name="OrderAddress")
 * @ORM\Entity(repositoryClass="App\Repository\OrderAddressRepository")
 */
class OrderAddress
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
     * @ORM\Column(name="zipCode", type="string", length=8)
     */

    private $zipCode;

    /**
     * @ORM\OneToOne(targetEntity="Order", inversedBy="orderAddress")
     * @ORM\JoinColumn(name="id_order", referencedColumnName="id")
     */
    private $order;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=10)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="neighbourhood", type="string", length=255)
     */
    private $neighbourhood;


    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=255)
     */

    private $complement;

    /**
     * Get the value of zipCode
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set the value of zipCode
     *
     * @return  self
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

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
     * Get the value of street
     *
     * @return  string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @param  string  $street
     *
     * @return  self
     */
    public function setStreet(string $street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of state
     *
     * @return  string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @param  string  $state
     *
     * @return  self
     */
    public function setState(string $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of number
     *
     * @return  string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @param  string  $number
     *
     * @return  self
     */
    public function setNumber(string $number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of neighbourhood
     *
     * @return  string
     */
    public function getNeighbourhood()
    {
        return $this->neighbourhood;
    }

    /**
     * Set the value of neighbourhood
     *
     * @param  string  $neighbourhood
     *
     * @return  self
     */
    public function setNeighbourhood(string $neighbourhood)
    {
        $this->neighbourhood = $neighbourhood;

        return $this;
    }

    /**
     * Get the value of city
     *
     * @return  string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @param  string  $city
     *
     * @return  self
     */
    public function setCity(string $city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of complement
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set the value of complement
     *
     * @return  self
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }
}
