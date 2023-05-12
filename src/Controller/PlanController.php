<?php

namespace App\Controller;

use App\Model\ChecklistManager;
use App\Model\PlanManager;
use App\Model\OpenTripManager;

class PlanController extends AbstractController
{
    private PlanManager $manager;
    private OpenTripManager $openTripManager;
    private ChecklistManager $checkListManager;

    public function __construct()
    {
        parent::__construct();
        $this->manager = new PlanManager();
        $this->openTripManager = new OpenTripManager();
        $this->checkListManager = new ChecklistManager();
    }
    /**
     * List items
     */
    public function index(): string
    {
        $plans = $this->manager->selectAll('title');

        return $this->twig->render('Item/index.html.twig', ['plans' => $plans]);
    }

    /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $plan = $this->manager->selectOneById($id);

        return $this->twig->render('Item/show.html.twig', ['plan' => $plan]);
    }

    /**
     * Edit a specific item
     */
    public function edit(int $id): ?string
    {
        $plan = $this->manager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $plan = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $this->manager->update($plan);

            header('Location: /items/show?id=' . $id);

            // we are redirecting so we don't want any content rendered
            return null;
        }

        return $this->twig->render('Item/edit.html.twig', [
            'plan' => $plan,
        ]);
    }

    /**
     * Add a new item
     */
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $plan = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $id = $this->manager->insert($plan);

            header('Location:/items/show?id=' . $id);
            return null;
        }

        return $this->twig->render('Item/add.html.twig');
    }

    /**
     * Delete a specific item
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $this->manager->delete((int)$id);

            header('Location:/items');
        }
    }

    public function locations()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $citys = $this->manager->selectAll();
            $nbrCitys = count($citys);
            $selectCity = $this->manager->selectOneById(rand(1, $nbrCitys));
            $content = $this->openTripManager->getMap(
                $_POST['destinations-type'],
                $selectCity['longitude'],
                $selectCity['latitude']
            );
            $activities = [];
            if (count($content) > 0) {
                for ($i = 0; $i < 3; $i++) {
                    $activities[$i] = $content[rand(0, count($content) - 1)];
                }
            } else {
                $activities[0] = "no activities available for this place";
            }
            $checklists = $this->checkListManager->getChecklistByType($_POST['destinations-type']);
        }


        return $this->twig->render('Item/show.html.twig', [
            'activities' => $activities,
            'selectCity' => $selectCity,
            'checklists' => $checklists,
        ]);
    }
}
