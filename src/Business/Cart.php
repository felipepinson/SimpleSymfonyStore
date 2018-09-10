<?php

namespace App\Business;

use Doctrine\ORM\EntityManagerInterface;

class Cart
{
    public function isIntheCart($arrayCartItens, $idProduct)
    {
        if (!empty($arrayCartItens)) {
            foreach ($arrayCartItens as $iten) {
                if ($iten['id'] == $idProduct) {
                    return true;
                }
            }
        }

        return false;
    }

    public function getItemtoSetQtd($arrayCartItens, $idProduct)
    {
        if (!empty($arrayCartItens)) {
            foreach ($arrayCartItens as $iten) {
                if ($iten['id'] == $idProduct) {
                    return $iten;
                }
            }
        }

        return null;
    }
}
