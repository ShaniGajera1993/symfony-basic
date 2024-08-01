<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Movie;
use Symfony\Component\HttpFoundation\Request;
class MoviesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_movies')]
    public function index(): Response
    {
        $movieRepository = $this->entityManager->getRepository(Movie::class);
        $movies = $movieRepository->findAll();

       return $this->render('index.html.twig', ['movies' => $movies]);
    }

    #[Route('/movies/{id}', name: 'app_movies_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $movieRepository = $this->entityManager->getRepository(Movie::class);
        $movie = $movieRepository->find($id);

        return $this->render('show.html.twig', ['movie' => $movie]);
    }
}
