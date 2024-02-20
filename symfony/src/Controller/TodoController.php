<?php

namespace App\Controller;

use App\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class TodoController extends AbstractController
{
    /**
     * @Route("/api/data", name="api_data", methods={"GET"})
     */
    #[Route('/api/data', name: 'api_data', methods: ['GET'])]
    public function getData(EntityManagerInterface $entityManager): Response
    {
        $todos = $entityManager
            ->getRepository(Todo::class)
            ->findAll();

        $data = [];

        foreach ($todos as $todo) {
            $data[] = [
                'id' => $todo->getId(),
                'name' => $todo->getTitre(),
                'description' => $todo->isDone(),
            ];
        }

        return $this->json($data);
    }

    /**
     * @Route("/api/todos", name="api_todos_add", methods={"POST"})
     */
    #[Route('/api/todos', name: 'api_todos_add', methods: ['POST'])]
    public function addTodo(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['titre'])) {
            $todo = new Todo();
            $todo->setTitre($data['titre']);
            $todo->setDone(false);

            $entityManager->persist($todo);
            $entityManager->flush();

            return $this->json($todo, Response::HTTP_CREATED);
        }

        return $this->json(['error' => 'Invalid Todo data'], Response::HTTP_BAD_REQUEST);
    }
}

