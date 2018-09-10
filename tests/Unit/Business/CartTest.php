<?php

namespace App\Tests\Unit\Business;

use PHPUnit\Framework\TestCase;
use App\Business\Cart;

class CartTest extends TestCase
{
    public function valuesProvider()
    {
        $class = new Cart;
        
        $data[] = [$class, 'isIntheCart', [['id' => 1]], 1, true];
        $data[] = [$class, 'isIntheCart', [['id' => 2]], 1, false];
        
        $data[] = [$class, 'getItemtoSetQtd', [['id' => 1, 'des' => 'teste']], 1, ['id' => 1, 'des' => 'teste']];
        $data[] = [$class, 'getItemtoSetQtd', [['id' => 2]], 1, null];
        
        return $data;
    }

    /**
    * @dataProvider valuesProvider
    */
    public function testMethod($class, $method, $param1, $param2, $assertEquals)
    {
        $result = $class->$method($param1, $param2);
        $this->assertEquals($assertEquals, $result);
    }
}
