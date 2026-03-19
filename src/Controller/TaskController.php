<?php

namespace App\Controller;

use App\Form\TaskType;
use App\Form\TaskUpdateType;
use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

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
    public function index(TaskRepository $task): Response
    {
        return $this->render('task/index.html.twig', [
            'test' => 'resultat attendu',
            'tasks' => $task->findAll()
        ]);
    }

    #[Route('/new', name:'app_new', methods: ['GET', 'POST'])]
    public function addTask(EntityManagerInterface $entityManangerInterface, Request $request):Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManangerInterface->persist($task);
            $entityManangerInterface->flush();
        }

        return $this->render('task/new.html.twig', [
        'TODO' => 'Todo',
        'form' => $form,
        ]);
    }
    #[Route('/{id}/edit', name:'app_edit', methods:['GET', 'POST'])]
    public function editTask(EntityManagerInterface $entityManager, Request $request, Task $task):Response
    {
        // $task = getTask->$VarName = $repo->findBy(['property'=>value]);;
        $form = $this->createForm(TaskUpdateType::class, $task); //
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
        }
        return $this->render('task/edit.html.twig', [
        'task' => $task,
        'form' => $form,
        ]);
    }
}
