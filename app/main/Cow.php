<?php

namespace App\Main;

use \App\Main\Animal;

class Cow extends Animal
{
    //в конструкторе задаю уникальный номер животному
    public function __construct($name = NULL)
    {
        $this->idAnimal = parent::$id++;
        $this->addName($name);
    }
    // согласно условию корова может дать 8 или 12 литров молока
    public function getTovar()
    {
        return rand(8, 12);
    }
}
