<?php

namespace App\Main;

class Farm  {
    //классы с животными
    private $massAnimals = array();
    //результат сбора
    private $collectionResult= array();

    //создаю новое животное
    public function addAnimal(Animal $animal) :Animal {
        array_push($this->massAnimals,$animal);
        return new $animal;
    }
   
    //считаю животных
    public function getCountAnimal() :array {
        $getCountAnimals = array();
        foreach ( $this -> massAnimals as $key ){
            array_push($getCountAnimals ,get_class($key));
        }
        return array_count_values($getCountAnimals);
    }

    //сбор продукции
    public function setProducts() {

        //обхожу животных на ферме
        foreach ( $this->getCountAnimal() as $keyVariable => $valueVariable ){
            //перебираю названия животных чтобы не кого не пропустить
            if ( array_key_exists( $keyVariable, $this->collectionResult )) {
                //начинаю сбор продуктов
                foreach ( $this -> massAnimals as $key ){
                    if($keyVariable == get_class($key)){
                        $this->collectionResult[$keyVariable]["product"] += $key->getTovar();
                    }
                }
            }
            else {
                //если появилось новое животное создаю новую ячейку в массиве для него
                $this->collectionResult += [$keyVariable=>["product"=>0]];
                foreach ( $this -> massAnimals as $key ){
                    if($keyVariable == get_class($key)){
                        $this->collectionResult[$keyVariable]["product"] += $key->getTovar();
                    }
                }
            }
        }
    }

    //получить результат сбора
    public function getProducts() :array {
        return $this->collectionResult;
    }
}
