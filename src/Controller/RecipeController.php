<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\RecipeRepository;

final class RecipeController extends AbstractController
{
    #[Route('/recipe', name: 'app_recipe')]
    public function index(RecipeRepository $repository): Response
    {
        $recipes = $repository->findAll();
        dump($recipes);
        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipes,
        ]);
    }
}
