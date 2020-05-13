<?php

declare(strict_types=1);


namespace App\Controller;


use App\Service\VilniusApiService;
use Carbon\Carbon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WasteManagementController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('waste_management/index.html.twig');
    }

    /**
     * @Route("/containers", name="containers")
     */
    public function getContainers(Request $request, VilniusApiService $service)
    {
        $containers = [];

        $date_range = $request->get('date_range');

        $range_to = Carbon::now()->format('y/m/d');
        $range_from = Carbon::now()->subDays(7)->format('y/m/d');

        if ($date_range) {
            $ranges = explode(' - ', $date_range);

            $range_to = $ranges[1];
            $range_from = $ranges[0];

            $page = $request->get('page') ? $request->get('page') : null;

            $containers = $service->getContainers($range_from, $range_to, $page);
        }

        return $this->render('waste_management/containers.html.twig',
            [
                'containers' => $containers,
                'range_to' => $range_to,
                'range_from' => $range_from,
            ]);
    }

    /**
     * @Route("/container/{id?}", name="container")
     */
    public function getContainer(Request $request, VilniusApiService $service)
    {
        $container_code = $request->attributes->get('_route_params')['id'];
        $data = null;

        if ($container_code) {
            $page = $request->get('page') ? $request->get('page') : null;
            $data = $service->getContainer($container_code, $page);
        }

        return $this->render('waste_management/container.html.twig', [
            'data' => $data,
            'container_code' => $container_code ? $container_code : null,
        ]);
    }


}