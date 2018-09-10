<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $arrayCategorias = ['Cama', 'Mesa', 'Banho', 'Decoração', 'Escritorio'];

        foreach ($arrayCategorias as $value) {
            $category = new Category();
            $category->setDes($value);
            $manager->persist($category);
            $manager->flush();
        }
    }
}
