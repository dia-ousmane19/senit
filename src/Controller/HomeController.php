<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServicesRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ServicesRepository $repo)
    {
      //recuperation des trois premier services
      $FirstThreeService=$repo->ThreeServices();

        return $this->render('home/index.html.twig',compact('FirstThreeService'));
    }
    /**
     * @Route("/a-propos", name="apropos")
     */
    public function apropos()
    {
        return $this->render('home/apropos.html.twig');
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('home/contact.html.twig');
    }
    /**
     * @Route("/{slug}", name="animation")
     */
    public function animation($slug,ServicesRepository $repo)
    {
        $servicesComplet=$repo->AllServices($slug);
        $idService=$servicesComplet->getId();

        $otherService=$repo->FindOtherService($idService);

        return $this->render('home/animation.html.twig',compact('servicesComplet','otherService'));
    }
}
