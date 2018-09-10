<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageDetails
 *
 * @ORM\Table(name="ImageDetails")
 * @ORM\Entity(repositoryClass="App\Repository\ImageDetailsRepository")
 */
class ImageDetails
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
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;
}
