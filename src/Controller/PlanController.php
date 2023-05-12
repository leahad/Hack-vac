<?php

namespace App\Controller;

use App\Model\PlanManager;

class PlanController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        $planManager = new PlanManager();
        $plans = $planManager->selectAll('title');

        return $this->twig->render('Item/index.html.twig', ['plans' => $plans]);
    }

    /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $planManager = new PlanManager();
        $plan = $planManager->selectOneById($id);

        return $this->twig->render('Item/show.html.twig', ['plan' => $plan]);
    }

    /**
     * Edit a specific item
     */
    public function edit(int $id): ?string
    {
        $planManager = new PlanManager();
        $plan = $planManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $plan = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $planManager->update($plan);

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
            $planManager = new PlanManager();
            $id = $planManager->insert($plan);

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
            $planManager = new PlanManager();
            $planManager->delete((int)$id);

            header('Location:/items');
        }
    }
}
