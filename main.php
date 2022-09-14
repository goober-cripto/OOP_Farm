<?php

abstract class Animal{
    // ключ
    static $id = 1;
    // номер животного
    public $idAnimal=0;
    // товар который производит животное
    public abstract function getTovar();

}


//класс Корова наследую от абстракции Animal
class Cow extends Animal {
    public function __construct()
    {   //в конструкторе задаю уникальный номер животному
        $this->idAnimal = parent::$id++;
    }

    public function getTovar() 
    {   // согласно условию корова может дать 8 или 12 литров молока
        return rand(8,12);
    }

}

class Chicken extends Animal {
    public function __construct()
    {
        $this->idAnimal = parent::$id++;
    }

    public function getTovar() :int
    {
        return rand(0,1);
    }

}


class Farm  {
    //классы с животными
    private $mass_animals = array();


    //количество животных
    private $count_animals = array();

    private $count;

    //создаю новое животное
    public function new_create_Animal(Animal $animal) :Animal
    {
        array_push($this->mass_animals,$animal);
        return new $animal;
    }
   
    //считаю животных
    public function getCount_Animal() :array
    {
        $this->count_animals = array();
        foreach ( $this -> mass_animals as $key ){
            array_push($this->count_animals ,get_class($key));
        }
        return array_count_values($this->count_animals);
    }

    //сбор продукции
    public function getProducts(Animal $animal) 
    {
        //счётчик продукции
        $this->count = 0;
        foreach ( $this->mass_animals as $key  ){
            if(get_class($animal) == get_class($key)){
                $this->count +=$key->getTovar();
            }
        }
        return $this->count;
    }
   
}


$ferma = new Farm();
//хлев со всеми животными
$xlev = []; 


//заселяем в хлев 10 коров
for($i=1;$i<=10;$i++){
    $xlev[]=$ferma->new_create_Animal(new Cow);
}

//заселяем в хлев 20 кур
for($i=1;$i<=20;$i++){
    $xlev[]=$ferma->new_create_Animal(new Chicken);
}




//Вывожу на экран информацию о количестве каждого типа животных на ферме.

foreach ($ferma->getCount_Animal($xlev) as $keyVariable => $valueVariable){
echo $keyVariable.' ===> '.$valueVariable.' шт';
echo '<br>';
}

/**
 *7 раз сбираю продукцию (подоить коров и собрать яйца у кур) *
**/

//вёдра с молоком
$milk = 0;
//тара для яиц
$eggs_container = 0;

//дойка коров
for($i=1;$i<=7;$i++){
    $milk += $ferma-> getProducts(new Cow);
}
echo "<br>";
echo 'за неделю собрано ===>  '.$milk.' литров молока';

//собрали у кур яица
for($i=1;$i<=7;$i++){
    $eggs_container += $ferma->getProducts(new Chicken);
}
echo "<br>";
echo 'за неделю собрано ===> '.$eggs_container.' шт яиц';


/**
 *Добавить на ферму ещё 5 кур и 1 корову (съездили на рынок, купили животных). 
 **/

//заселяем в хлев 5 кур
for($i=1;$i<=5;$i++){
    $xlev[]=$ferma->new_create_Animal(new Chicken);
}

//заселяем в хлев 1 корову
for($i=1;$i<=1;$i++){
    $xlev[]=$ferma->new_create_Animal(new Cow);
}

/**
 * Снова вывести информацию о количестве каждого типа животных на ферме 
 **/

echo "<br>";
echo "<br>";
foreach ($ferma->getCount_Animal($xlev) as $keyVariable => $valueVariable){
echo $keyVariable.' ===> '.$valueVariable.' шт';
echo '<br>';
}



/**
 *Снова 7 раз (неделю) производим сбор продукции и выводим результат на экран.
**/

//дойка коров
for($i=1;$i<=7;$i++){
    $milk += $ferma-> getProducts(new Cow);
}
echo "<br>";
echo 'за неделю собрано ===>  '.$milk.' литров молока';

//собрали у кур яица
for($i=1;$i<=7;$i++){
    $eggs_container += $ferma->getProducts(new Chicken);
}
echo "<br>";
echo 'за неделю собрано ===> '.$eggs_container.' шт яиц';