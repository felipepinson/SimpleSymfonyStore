<?php

namespace App\Tests\Unit\Business\Persister;

use PHPUnit\Framework\TestCase;
use App\Business\Persister\OrderPersister;

class OrderPersisterTest extends TestCase
{
    public function valuesProvider()
    {
        $em = $this->createMock('\Doctrine\ORM\EntityManagerInterface');
        $class = new OrderPersister($em);
        
        $data[] = [$class, 'sumItens', [['price'=> 10, 'qtdCart'=> 2]], 20];
            
        return $data;
    }

    /**
    * @dataProvider valuesProvider
    */
    public function testMethod($class, $method, $param, $assertEquals)
    {
        $result = $class->$method($param);
        $this->assertEquals($assertEquals, $result);
    }
}
