<?php

namespace App\Interfaces;

interface PersistanceInterface {
    public function add(array $content) : Array;
    public function update(?int $id, array $content) : Array;
    public function deleteById(?int $id);
    public function deleteAll();
}