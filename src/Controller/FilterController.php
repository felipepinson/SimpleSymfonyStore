<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FilterController extends Controller
{
    public function __construct(
        \App\Business\Fetcher\ProductsFetcher $productsFetcher,
        \App\Business\Fetcher\CategoryFetcher $categoryFetcher
    ) {
        $this->productsFetcher = $productsFetcher;
        $this->categoryFetcher = $categoryFetcher;
    }

    /**
     * @Route("/search/results")
     */
    public function renderResults(Request $request)
    {
        $parameters = $request->request->all();
        $value = $parameters['search'];

        $arrayProducts = $this->productsFetcher->getProductsSearchResult($value);

        return $this->render(
            'searchResult.twig',
            [
                "arrayProducts" => $arrayProducts,
                'valueSearch' => $value
            ]
        );
    }


    /**
     * @Route("/search/results/category/{idCategory}")
     */
    public function renderResultsByCategory(Request $request)
    {
        $idCategory = $request->get("idCategory");
        $arrayCategory = $this->categoryFetcher->getAll();

        $value = null;
        $arrayProducts = $this->productsFetcher->getProductsByIdCategory($idCategory);

        return $this->render(
            'index.twig',
            [
            "arrayProducts" => $arrayProducts,
            "arrayCategory" => $arrayCategory
            ]
        );
    }
}
