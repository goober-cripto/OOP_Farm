<?php

require_once realpath("vendor/autoload.php");

use App\Main\Farm;
use App\Main\Cow;
use App\Main\Chicken;

$ferma = new Farm();

//заселяем в хлев 10 коров
for ($i = 1; $i <= 10; $i++) {
    $ferma->addAnimal(new Cow);
}

//заселяем в хлев 20 кур
for ($i = 1; $i <= 20; $i++) {
    $ferma->addAnimal(new Chicken);
}

//Вывожу на экран информацию о количестве каждого типа животных на ферме.
foreach ($ferma->getCountAnimal() as $keyVariable => $valueVariable) {
    echo $keyVariable . ' ===> ' . $valueVariable . ' шт';
    echo '<br>';
}

/**
 *7 раз сбираю продукцию (подоить коров и собрать яйца у кур) *
 **/

for ($i = 1; $i <= 7; $i++) {
    $ferma->collectProducts();
}
foreach ($ferma->getProducts() as $keyVariable => $valueVariable) {
    echo $keyVariable . ' собрано ====> ' . $valueVariable['product'];
    echo '<br>';
}

/**
 *Добавить на ферму ещё 5 кур и 1 корову (съездили на рынок, купили животных). 
 **/

//заселяем в хлев 5 кур
for ($i = 1; $i <= 5; $i++) {
    $ferma->addAnimal(new \App\Main\Chicken);
}

//заселяем в хлев 1 корову
for ($i = 1; $i <= 1; $i++) {
    $ferma->addAnimal(new \App\Main\Cow("Бурёнка"));
}

/**
 * Снова вывести информацию о количестве каждого типа животных на ферме 
 **/

echo "<br>";
echo "<br>";
foreach ($ferma->getCountAnimal() as $keyVariable => $valueVariable) {
    echo $keyVariable . ' ===> ' . $valueVariable . ' шт';
    echo '<br>';
}


/**
 *Снова 7 раз (неделю) производим сбор продукции и выводим результат на экран.
 **/
for ($i = 1; $i <= 7; $i++) {
    $ferma->collectProducts();
}

foreach ($ferma->getProducts() as $keyVariable => $valueVariable) {
    echo $keyVariable . ' собрано ====> ' . $valueVariable['product'];
    echo '<br>';
}
