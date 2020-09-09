<?php

/*
    Автозагрузчик классов
*/
function classAutoloader($classname)
{
    /*
        Константы автозагрузчика
    */
    $clsPath   = "core/classes/";       // Путь к классам
    $mdlPath   = "core/model/";         // Путь к моделям
    $viewPath  = "core/views/";          // Путь к представлениям
    $ctrlPath  = "core/controllers/";   // Путь к контроллерам
    $extention = ".php";
    $fileName  = $classname.$extention;

    // Поиск файлов классов происходит в трёх директориях
    // Загрузка происходит только из той, где файл существует
    if (file_exists($clsPath.$fileName))
    {
        include_once $clsPath.$fileName;
    }
    else if (file_exists($mdlPath.$fileName))
    {
        include_once $mdlPath.$fileName;
    }
    else if (file_exists($viewPath.$fileName))
    {
        include_once $viewPath.$fileName;
    }
    else if (file_exists($ctrlPath.$fileName))
    {
        include_once $ctrlPath.$fileName;
    }

    return false;
}

spl_autoload_register('classAutoloader');
