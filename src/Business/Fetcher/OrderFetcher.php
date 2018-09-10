<?php

namespace App\Business\Fetcher;

use Doctrine\ORM\EntityManagerInterface;

class OrderFetcher
{
    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    public function findById($id)
    {
        return $this->em->find(\App\Entity\Order::class, $id);
    }


    public function getAllOrders()
    {
        return $this->em->getRepository(\App\Entity\Order::class)
            ->findBy([], ['total' => 'ASC']);
    }

    public function getProductsSearchResult($value)
    {
        return $this->em->getRepository(\App\Entity\Product::class)
            ->findProductsBySearch($value);
    }
}
