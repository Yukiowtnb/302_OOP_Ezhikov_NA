<?php

use App\Student;
use App\StudentsList;

function runTest()
{
    //Создаем первого чечика
    $st1 = new StudentsList(array());
    $s1 = new Student();
	echo "\nStudentsList1" . PHP_EOL;
    $s1->setLastname("Иванов")
    ->setFirstname("Сергей")
    ->setFaculty("ФМиИТ")
    ->setGroup(303);
    echo $s1 . PHP_EOL;

    //Добавим чечика в список
    $st1->add($s1);
    echo "Количество человек в списке: " . $st1->count() . PHP_EOL;

    //Создаем чечиков для количества
    $s2 = new Student();
    $s2->setLastname("Петухов")
    ->setFirstname("Артём")
    ->setFaculty("ГиИиТ")
    ->setGroup(322);
    echo $s2 . PHP_EOL;

    $st1->add($s2);
    echo "Количество человек в списке: " . $st1->count() . PHP_EOL;

    $s3 = new Student();
    $s3->setLastname("Козлов")
    ->setFirstname("Сергей")
    ->setFaculty("ГИТИС")
    ->setGroup(220);
    echo $s3 . PHP_EOL;

    $st1->add($s3);
    echo "Количество человек в списке: " . $st1->count() . PHP_EOL;
	
	//Сериализуем текущий список чечиков
    $st1->store("StudentsList.bin");

     echo "\nStudentsList1\n" . PHP_EOL;

    //Выводим список чечиков с помощью метода get()
    for ($j = 0; $j < $st1->count(); $j++) {
        echo $st1->get($j) . PHP_EOL;
    }

    //Создаем второй список чечиков, пустой
    $st2 = new StudentsList(array());
	echo "\nStudentsList2" . PHP_EOL;
    echo "\nКоличество человек в списке: " . $st2->count() . PHP_EOL;

    //Загружаем в него ранее созданный и вуаля
    $st2->load("StudentsList.bin");
	echo "\nStudentsList2" . PHP_EOL;
    echo "\nКоличество человек в списке: " . $st2->count() . PHP_EOL;
    for ($j = 0; $j < $st2->count(); $j++) {
        echo $st2->get($j) . PHP_EOL;
    }
}