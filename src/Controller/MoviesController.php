<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Movie;
use App\Form\MovieFormType;
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

    #[Route('/movies/create', name: 'app_movies_create')]
    public function create(Request $request): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieFormType::class, $movie);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newMovie = $form->getData();
            $this->entityManager->persist($newMovie);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_movies');
        }

        return $this->render('create.html.twig', ['form' => $form->createView()]);
    }

    #[Route('/movies/{id}', name: 'app_movies_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $movieRepository = $this->entityManager->getRepository(Movie::class);
        $movie = $movieRepository->find($id);

        return $this->render('show.html.twig', ['movie' => $movie]);
    }
}
