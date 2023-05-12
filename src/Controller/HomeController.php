<?php

namespace App\Controller;

use App\Model\DestinationTypeManager;

class HomeController extends AbstractController
{
    private DestinationTypeManager $manager;

    public function __construct()
    {
        parent::__construct();
        $this->manager = new DestinationTypeManager();
    }
    /**
     * Display home page
     */
    public function index(): string
    {
        $types = $this->manager->selectAll();
        return $this->twig->render('Home/index.html.twig', ['types' => $types]);
    }
}
