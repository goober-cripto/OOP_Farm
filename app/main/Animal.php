<?php

namespace App\Main;

abstract class Animal
{
    // ключ
    static $id = 1;
    // номер животного
    public $idAnimal = 0;
    //кличка животного
    public $name = NULL;
    // товар который производит животное
    public abstract function getTovar();

    public function addName($name)
    {
        $this->name = $name;
    }
}
