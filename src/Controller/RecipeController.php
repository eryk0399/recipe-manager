<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\RecipeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\RecipeRepository;
use Symfony\Component\HttpFoundation\Request;

final class RecipeController extends AbstractController
{
    public function __construct(private RecipeRepository $recipeRepository) {}

    #[Route('/recipes', name: 'recipes')]
    public function index(): Response
    {
        $recipes = $this->recipeRepository->findAll();
        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipes,
        ]);
    }

    #[Route('/recipes/create', name: 'recipes_create')]
    public function create(Request $request): Response 
    {
        $recipe = new Recipe();
        $recipe->setInstructions(['instruction 1', 'instruction 2', 'instruction 3']);
        
        $form = $this->createForm(RecipeFormType::class, $recipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
        }

        return $this->render('recipe/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/recipes/{id}', methods: ['GET'], name: 'recipes_show')]
    public function show($id): Response 
    {
        return $this->render('recipe/show.html.twig', [
            'recipe' => $this->recipeRepository->find($id)
        ]);
    }
}
