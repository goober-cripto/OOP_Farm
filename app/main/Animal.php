<?php
namespace App\Main;

abstract class Animal{
    // ключ
    static $id = 1;
    // номер животного
    public $idAnimal=0;
    // товар который производит животное
    public abstract function getTovar();
}