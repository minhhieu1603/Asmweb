<?php

namespace App\Controller;

use App\Entity\Sale;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SaleController extends Controller
{
    /**
     * @Route("/sale",name="sale_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $data = $em->getRepository(Sale::class)->findAll();

        return $this->render('sale/index.html.twig', array(
            'sales' => $data,
        ));
    }

    /**
     * @Route("/Sales/{id}",name="sale_info_more_details")
     */
    public function indexMoreDetailsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Sale::class);

        $sale = $repo->find($id);

        return $this->render('sale/saleMoreDetails.html.twig', array(
            'sale' => $sale,
        ));
    }

    /**
     * @Route("/Sales/discounted/all",name="sale_discounted")
     */
    public function showSaleDiscountedAction()
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Sale::class);

        $discountedSales = $repo->findSalesDiscounted();

        return $this->render('sale/index.html.twig', array(
            'sales' => $discountedSales,
        ));
    }

    /**
     * @Route("/Sales/discounted/{percent}",name="sale_given_discount")
     */
    public function showSalesGivenDiscountAction($percent)
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Sale::class);

        $data = $repo->findSalesGivenDiscount($percent);

        return $this->render('sale/index.html.twig', array(
            'sales' => $data,
        ));
    }
}