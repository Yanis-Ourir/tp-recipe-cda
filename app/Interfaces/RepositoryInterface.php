<?php

namespace App\Interfaces;

interface RepositoryInterface {
    public function all() : Array;

    public function findById(?int $id) : Array;
  
    public function add(array $content) : Array; 

    public function update(?int $id, array $content) : Array;

    public function deleteById(?int $id);

    public function deleteAll();
}