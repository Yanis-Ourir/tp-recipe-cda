<?php

namespace App\Interfaces;

interface ImporterInterface {
    public function insertFile($fileName): Void;
}