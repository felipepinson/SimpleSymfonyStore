<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends Controller
{
    public function __construct(
        \App\Business\Fetcher\ProductsFetcher $productsFetcher,
        \App\Business\Fetcher\CategoryFetcher $categoryFetcher
    ) {
        $this->productsFetcher = $productsFetcher;
        $this->categoryFetcher = $categoryFetcher;
    }


    /**
     * @Route("/")
     */
    public function index()
    {
        $arrayCategory = $this->categoryFetcher->getAll();
        $arrayProducts = $this->productsFetcher->getAllProducts();
        return $this->render(
            'index.twig',
            [
            "arrayProducts" => $arrayProducts,
            "arrayCategory" => $arrayCategory
            ]
        );
    }
}
