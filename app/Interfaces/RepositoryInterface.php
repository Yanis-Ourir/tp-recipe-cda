<?php

namespace App\Interfaces;

interface RepositoryInterface {
    public function all() : Array;

    public function findById(?int $id) : Array;
}