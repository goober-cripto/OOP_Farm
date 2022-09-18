<?php

namespace App\Main;

class Chicken extends Animal {

    public function __construct() {
        $this->idAnimal = parent::$id++;
    }

    public function getTovar() :int {
        return rand(0,1);
    }
}