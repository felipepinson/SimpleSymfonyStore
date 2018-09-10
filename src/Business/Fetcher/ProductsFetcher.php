<?php

namespace App\Business\Fetcher;

use Doctrine\ORM\EntityManagerInterface;

class ProductsFetcher
{
    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    public function findById($id)
    {
        return $this->em->find(\App\Entity\Product::class, $id);
    }


    public function getAllProducts()
    {
        return $this->em->getRepository(\App\Entity\Product::class)
            ->findBy([], ['name' => 'ASC']);
    }

    public function getProductsSearchResult($value)
    {
        return $this->em->getRepository(\App\Entity\Product::class)
            ->findProductsBySearch($value);
    }

    public function getProductsByIdCategory($id)
    {
        return $this->em->getRepository(\App\Entity\Product::class)
            ->findProductsByIdCategory($id);
    }
}
