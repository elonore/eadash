<?php

namespace App\Controller\Admin;

use App\Repository\PaysRepository;
use App\Repository\UserRepository;
use App\Repository\WineRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    protected $paysRepository;
    protected $userRepository;
    protected $wineRepository;

    public function __construct(
        PaysRepository $paysRepository,
        UserRepository $userRepository,
        WineRepository $wineRepository
    ) {
        $this->paysRepository = $paysRepository;
        $this->userRepository = $userRepository;
        $this->wineRepository = $wineRepository;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
            'countAllUser' => $this->userRepository->countAllUser(),
            'countAllWine' => $this->wineRepository->countAllWine(),
            'countAllPays' => $this->paysRepository->countAllPays(),
        ]);
    }

    /**
     * @Route("/admin/createwine", name="admin_create_wine")
     */
    public function createWine(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(WineCrudController::class)->generateUrl());
    }

    /**
     * @Route("/admin/createpays", name="admin_create_pays")
     */
    public function createPays(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(PaysCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ea Dash')
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
    }
}
