<?php

namespace App\Business\Persister;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Order;
use App\Entity\OrderProduct;
use App\Entity\OrderAddress;
use App\Entity\Consumer;
use App\Entity\Product;

class OrderPersister
{
    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    public function save($array)
    {
        $formData = $array['form'];
        $itensCart = $array['itensCart'];

        $dataAtual = new \DateTime(date('Y-m-d H:i:s'));

        $this->em->beginTransaction(); // suspend auto-commit

        $consumer = new Consumer();
        $consumer->setName($formData['name']);
        $consumer->setEmail($formData['email']);
        $consumer->setCpf($formData['cpf']);
        $consumer->setPhone($formData['phone']);
        
        $this->em->persist($consumer);
        
        $order = new Order();
        $order->setConsumer($consumer);
        $order->setTotal($this->sumItens($itensCart));
        $order->setOrderDate($dataAtual);
        $this->em->persist($order);
        
        $orderAddress = new OrderAddress();
        $orderAddress->setZipCode($formData['zipcode']);
        $orderAddress->setOrder($order);
        $orderAddress->setStreet($formData['street']);
        $orderAddress->setState($formData['state']);
        $orderAddress->setNumber($formData['number']);
        $orderAddress->setNeighbourhood($formData['neighbourhood']);
        $orderAddress->setCity($formData['city']);
        $orderAddress->setComplement($formData['complement']);
        $this->em->persist($orderAddress);
                
        foreach ($itensCart as $value) {
            $orderProduct = new OrderProduct();
            
            $orderProduct->setConsumer($consumer);
            $orderProduct->setOrder($order);
            $orderProduct->setProduct($this->em->getReference(
                Product::class,
                $value['id']
            ));
            $orderProduct->setUnitPrice($value['price']);
            $orderProduct->setQuantity($value['qtdCart']);
            $orderProduct->setOrderDate($dataAtual);
            $orderProduct->setOrderStatus(1);
            $orderProduct->setOrderAddress($orderAddress);
            $this->em->persist($orderProduct);
        }
        $this->em->flush();
        $this->em->commit();
        return true;
    }

    public function sumItens($array)
    {
        $vTotal = 0;
        foreach ($array as $value) {
            $vTotal = $vTotal + ($value['price']*$value['qtdCart']);
        }

        return $vTotal;
    }
}
