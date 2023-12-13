<?php

namespace App\Interfaces;

interface PersistanceInterface {
    public function addRecipe() : Array;
    public function updateRecipe() : Array;
    public function deleteRecipe() : Array;
    public function deleteAllRecipes() : Array;
}