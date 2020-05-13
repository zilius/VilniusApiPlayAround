<?php

declare(strict_types=1);


namespace App\Controller;


use App\Service\VilniusApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WasteManagementController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index() : Response
    {
        return $this->render('waste_management/index.html.twig');
    }

    /**
     * @Route("/containers", name="containers")
     */
    public function getContainers(Request $request, VilniusApiService $service)
    {
        $containers = [];

        return $this->render('waste_management/containers.html.twig',['containers' => $containers]);
    }

    /**
     * @Route("/container/{id?}", name="container")
     */
    public function getContainer()
    {

    }


}