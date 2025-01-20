<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    #Route[("/", name="home")]
    public function home(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/hobbies", name="hobbies")
     */
    public function hobbies(): Response
    {
        return $this->render('hobbies.html.twig');
    }

    /**
     * @Route("/cv", name="cv")
     */
    public function cv(): Response
    {
        return $this->render('cv.html.twig');
    }

    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function portfolio(): Response
    {
        return $this->render('portfolio.html.twig');
    }
}