<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Recipe;
use App\Entity\Ingredient;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $recipe = new Recipe();
        $recipe->setTitle('recipe 1');
        $recipe->setInstructions(['instruction 1', 'instruction 2', 'instruction 3']);

        $ingredient = new Ingredient();
        $ingredient->setName('chease');
        $ingredient->setAmount('10 slices');

        $ingredient2 = new Ingredient();
        $ingredient2->setName('ham');
        $ingredient2->setAmount('2 slices');

        $ingredient3 = new Ingredient();
        $ingredient3->setName('egg');
        $ingredient3->setAmount('4 units');

        $manager->persist($ingredient);
        $manager->persist($ingredient2);
        $manager->persist($ingredient3);

        $recipe->addIngredient($ingredient);
        $recipe->addIngredient($ingredient2);
        $recipe->addIngredient($ingredient3);

        $manager->persist($recipe);

        $recipe2 = new Recipe();
        $recipe2->setTitle('recipe 2');
        $recipe2->setInstructions(['instruction 1 for recipe 2', 'instruction 2 for recipe 2']);

        $ingredient4 = new Ingredient();
        $ingredient4->setName('carrot');
        $ingredient4->setAmount('2 units');

        $ingredient5 = new Ingredient();
        $ingredient5->setName('milk');
        $ingredient5->setAmount('250 ml');

        $manager->persist($ingredient4);
        $manager->persist($ingredient5);

        $recipe2->addIngredient($ingredient4);
        $recipe2->addIngredient($ingredient5);

        $manager->persist($recipe2);

        $manager->flush();
    }
}
