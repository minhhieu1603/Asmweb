<?php

namespace App\Controller;

use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends Controller
{
    /**
     * @Route("/car",name="car_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cars = $em->getRepository(Car::class)->findAll();

        return $this->render('car/index.html.twig', array(
            'cars' => $cars,
        ));
    }

  /**
   * Finds and displays a car entity.
   *
   * @Route("/car/{id}", name="car_show")
   */
  public function showAction(Car $car)
  {
    return $this->render('car/show.html.twig', array(
      'car' => $car,
    ));
  }

  /**
    * Finds and displays cars by make.
    * 
    * @Route("/cars/{make}", name="cars_by_make")
    */
    public function showByMakeAction($make)
    {
      $em = $this->getDoctrine()->getManager();
      $repo = $em->getRepository(Car::class);
      $data = $repo->findByMake($make);
      return $this->render('car/index.html.twig', array(
        'cars' => $data,
      ));
    }

    /**
    * 
    * @Route("/cars/(id)/parts", name="cars_parts")
    */
    public function showCarandParts($id)
    {
      $em = $this->getDoctrine()->getManager();
      $repo = $em->getRepository(Car::class);
      $data = $repo->find($id);
      return $this->render('car/showCarandParts.html.twig', array('car' => $data,
      ));
    }
}
