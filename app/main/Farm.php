<?php

namespace App\Main;

class Farm
{
    //классы с животными
    private $collectionAnimals = array();
    //результат сбора
    private $collectionResult = array();

    //создаю новое животное
    public function addAnimal(Animal $animal): Animal
    {
        array_push($this->collectionAnimals, $animal);
        return new $animal;
    }

    //считаю животных
    public function getCountAnimal(): array
    {
        $getCountAnimals = array();
        foreach ($this->collectionAnimals as $key) {
            array_push($getCountAnimals, get_class($key));
        }
        return array_count_values($getCountAnimals);
    }

    //сбор продукции
    public function collectProducts()
    {

        //обхожу животных на ферме
        foreach ($this->getCountAnimal() as $keyVariable => $valueVariable) {
            //перебираю названия животных чтобы не кого не пропустить
            if (array_key_exists($keyVariable, $this->collectionResult)) {
                //начинаю сбор продуктов
                $this->helpsСollectProducts($keyVariable);
            } else {
                //если появилось новое животное создаю новую ячейку в массиве для него
                $this->collectionResult += [$keyVariable => ["product" => 0]];
                $this->helpsСollectProducts($keyVariable);
            }
        }
    }

    //вспомогательный метод для сбора
    protected function helpsСollectProducts($keyVariable)
    {
        foreach ($this->collectionAnimals as $key) {
            if ($keyVariable == get_class($key)) {
                $this->collectionResult[$keyVariable]["product"] += $key->getTovar();
            }
        }
    }

    //получить результат сбора
    public function getProducts(): array
    {
        return $this->collectionResult;
    }
}
