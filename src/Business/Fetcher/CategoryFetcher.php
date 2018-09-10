<?php

namespace App\Business\Fetcher;

use Doctrine\ORM\EntityManagerInterface;

class CategoryFetcher
{
    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    public function findById($id)
    {
        return $this->em->find(\App\Entity\Category::class, $id);
    }


    public function getAll()
    {
        return $this->em->getRepository(\App\Entity\Category::class)
            ->findBy([], ['des' => 'ASC']);
    }
}
