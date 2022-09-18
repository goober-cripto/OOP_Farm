<?php

namespace App\Main;

class Cow extends Animal {
    //в конструкторе задаю уникальный номер животному
    public function __construct() {   
        $this->idAnimal = parent::$id++;
    }
    // согласно условию корова может дать 8 или 12 литров молока
    public function getTovar() {   
        return rand(8,12);
    }

}