<?php

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends Controller
{
     /**
     * @Route("/customer",name="customer_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $customers = $em->getRepository(Customer::class)->findAll();

        return $this->render('customer/index.html.twig', array(
            'customers' => $customers,
        ));
    }

    /**
     * @Route("/customers/all/ascending",name="customer_ascending")
     */
    public function customerOrderAcsending()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("
        SELECT c
        FROM App\Entity\Customer c
        ORDER BY c.birthDate, c.isYoungDriver DESC
         ");
         $result = $query->getResult();
        return $this->render('customer/index.html.twig', array(
            'customer' => $result,
        ));
    }

    /**
     * @Route("/customers/all/descending",name="customer_descending")
     */
    public function customerOrderDescending()
    {
        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("
        SELECT c
        FROM App\Entity\Customer c
        ORDER BY c.birthDate, c.isYoungDriver DESC
         ");
         $result = $query->getResult();
        return $this->render('customer/index.html.twig', array(
            'customer' => $result,
        ));
    }

    public function customerCarBought($id)
    {
        $em = $this->getDoctrine()->getManager();
  
        $repo = $em->getRepository(Customer::class);
        $data1 = $repo-> find($id);
        $data2 = $repo->findCarBoughtByCustomer($id);
        return $this->render('customer/showCustomerAndCars.html.twig', array(
            'customer' => $data1, 'cars'=> $data2,
        ));
    }
}


