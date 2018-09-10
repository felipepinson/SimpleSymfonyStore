<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DetailsController extends Controller
{
    public function __construct(
        \App\Business\Fetcher\ProductsFetcher $productsFetcher
    ) {
        $this->productsFetcher = $productsFetcher;
    }

    /**
     * @Route("/{idProduct}/details", methods={"GET","HEAD"})
     */
    public function index(Request $request)
    {
        $idProduct = $request->get("idProduct");
        $product = $this->productsFetcher->findById($idProduct);

        return $this->render('detailsProduct.twig', ["product" => $product]);
    }
}
