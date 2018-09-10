<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function __construct(
        \App\Business\Persister\OrderPersister $orderPersister,
        \App\Business\Fetcher\OrderFetcher $orderFetcher
    ) {
        $this->orderPersister = $orderPersister;
        $this->orderFetcher = $orderFetcher;
    }

    /**
     * @Route("/cart/create/order", methods={"GET","HEAD"})
     */
    public function index(Request $request)
    {
        return $this->render('formPedido.twig');
    }

    /**
     * @Route("/order/process", methods={"POST","HEAD"})
     */
    public function createOrder(Request $request)
    {
        $session = $request->getSession();
        $arrayCartItens = $session->get("myCartSession");

        $parameters = $request->request->all();

        $array = [
            'form' => $parameters,
            'itensCart' => $arrayCartItens
        ];

        $this->orderPersister->save($array);
        $session->set("myCartSession", null);

        return new Response(null);
    }
    
    /**
     * @Route("/order/list", methods={"GET","HEAD"})
     */
    public function myOrders(Request $request)
    {
        $orders = $this->orderFetcher->getAllOrders();
        return $this->render(
            'myOrders.twig',
            [
            'orders' => $orders
            ]
        );
    }

    /**
     * @Route("/order/{idOrder}/details", methods={"GET","HEAD"})
     */
    public function orderDetails(Request $request)
    {
        $idOrder = $request->get("idOrder");
        $order = $this->orderFetcher->findById($idOrder);

        return $this->render(
            'orderDetail.twig',
            [
            'order' => $order
            ]
        );
    }
}
