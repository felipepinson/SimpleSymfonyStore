<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CartController extends Controller
{
    public function __construct(
        \App\Business\Fetcher\ProductsFetcher $productsFetcher,
        \App\Business\Cart $cart
    ) {
        $this->productsFetcher = $productsFetcher;
        $this->cart = $cart;
    }

    /**
     * @Route("/my-cart", methods={"GET","HEAD"})
     */
    public function index(Request $request)
    {
        return $this->render('cart.twig');
    }

    /**
     * @Route("/cart-add/{idProduct}/{page}", methods={"GET","HEAD"})
     */
    public function addToCart(Request $request)
    {
        $idProduct = $request->get("idProduct");
        $data = $this->productsFetcher->findById($idProduct);
          
        $session = $request->getSession();
        
        $arrayCartItens = $session->get("myCartSession");
        
        if (!$this->cart ->isIntheCart($arrayCartItens, $idProduct)) {
            $data = $data->toArray();
            $data['qtdCart'] = (!isset($data['qtdCart']) ? 1 : $data ['qtdCart']);
            $arrayCartItens[] = $data;
            $session->set("myCartSession", $arrayCartItens);
        }

        return $this->redirect("/my-cart");
    }

    /**
     * @Route("/cart/set-qtd-itens", methods={"POST","HEAD"})
     */
    public function changeQtdtensCart(Request $request)
    {
        $parameters = $request->request->all();
        $session = $request->getSession();

        $arrayCartItens = $session->get("myCartSession");
    
        if (isset($parameters['idProduct'])) {
            $idProduct =  $parameters['idProduct'];
            $typeOperation =  $parameters['type'];
            $item = $this->cart->getItemtoSetQtd($arrayCartItens, $idProduct);

            if ($typeOperation == "sum") {
                $qtdAtual = ($item['qtdCart'] + 1);
            } else {
                $qtdAtual = ($item['qtdCart'] - 1);
            }

            $item['qtdCart'] = $qtdAtual;
            
            $newArray = [];

            foreach ($arrayCartItens as $valuesSession) {
                if ($valuesSession['id'] != $item['id']) {
                    $newArray[] = $valuesSession;
                }
            }
            
            if ($qtdAtual > 0) {
                $newArray[] = $item;
            }

            $session->set("myCartSession", $newArray);
        }

        return new Response("true");
    }

    /**
     * @Route("/cart/remove-item-cart", methods={"POST","HEAD"})
     */
    
    public function removeItemCart(Request $request)
    {
        $parameters = $request->request->all();
        $session = $request->getSession();

        $arrayCartItens = $session->get("myCartSession");

        if (isset($parameters['idProduct'])) {
            $idProduct = $parameters['idProduct'];
            $item = $this->cart->getItemtoSetQtd($arrayCartItens, $idProduct);
            $newArray = [];
            foreach ($arrayCartItens as $valuesSession) {
                if ($valuesSession['id'] != $item['id']) {
                    $newArray[] = $valuesSession;
                }
            }

            $session->set("myCartSession", $newArray);
        }

        return new Response("true");
    }
}
