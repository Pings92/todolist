<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TaskController extends AbstractController
{
    #Original
    // #[Route('/task', name: 'app_task')]
    // public function index(): Response
    // {

    //     return $this->render('task/index.html.twig', [
    //         'controller_name' => 'TaskController',
    //     ]);
    // }

    #[Route('/task', name: 'app_task')]
    // public function index(Task $task): Response
    public function index(): Response
    {
        // $form = findAll($task)
        return $this->render('task/index.html.twig', [
            // 'task' => $form,
            'TODO' => 'Todo'
        ]);
    }

    #[Route('/new', name:'app_new')]
    // public function addTask(EntityManangerInterface $entityManangerInterface):Response
    public function addTask():Response
    {
        // $task = new addTask()
        // if ($form isValid && isSubmitted){
        // $entityManangerInterface->get()
        // $entityManangerInterface->flush()
        // }

        return $this->render('task/index.html.twig', [
        'TODO' => 'Todo'
        ]);
    }
    #[Route('edit', name:'app_edit')]
    public function modifyTask():Response
    {
        return $this->render('task/index.html.twig', [
        'TODO' => 'Todo'
        ]);
    }
}
