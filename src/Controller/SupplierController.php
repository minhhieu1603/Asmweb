<?php

namespace App\Controller;

use App\Entity\Supplier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupplierController extends Controller
{
    /**
     * @Route("/supplier",name="supplier_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $suppliers = $em->getRepository(Supplier::class)->findAll();

        return $this->render('supplier/index.html.twig', array(
            'suppliers' => $suppliers,
        ));
    }
    /**
     * @Route("/supplier/importer",name="supplier_importer")
     */
    public function supplierAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Supplier::class);
        $data = $repo->findByExampleField();
        return $this->render('supplier/importers.html.twig', array(
            'supplier' => $data,
        ));
    }
    /**
     * @Route("/supplier/local",name="supplier_local")
     */
    public function supplierfAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Supplier::class);
        $data = $repo->findBExampleField();
        return $this->render('supplier/importers.html.twig', array(
            'supplier' => $data,
        ));
    }
}
