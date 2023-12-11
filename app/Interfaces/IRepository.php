<?php

namespace App\Interfaces;

interface IRepository {
    public function allRecipe() : Array;

    public function findRecipeById(?int $id) : Array;
  
    public function addRecipe(array $content) : Array; 

    public function updateRecipe(?int $id, array $content) : Array;

    public function deleteSelectedRecipe(?int $id);

    public function deleteAllRecipes();
}