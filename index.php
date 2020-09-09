<?php

// Указываем домашний каталог для всего приложения
define("APP_HOME", dirname($_SERVER['PHP_SELF']));

// Подключение автозагрузчика классов и роутера
require_once 'core\utils\autoloader.php';
require_once 'core\utils\router.php';

// Добавления маршрута домешней страницы
Router::addRoute('', function()
{
    $tasksCtrl = new TasksCtrl();
    $tasksCtrl->runTasksList();
});
// Добавления маршрута страницы редактирования задач
Router::addRoute('edit-task', function()
{
    $tasksCtrl = new TasksCtrl();
    $tasksCtrl->runNewTaskForm();
});
// Добавления маршрута страницы входа
Router::addRoute('signin', function()
{
    $usersCtrl = new UsersCtrl();
    $usersCtrl->run();
});


// Маршрутизация по параметру "page"
if (isset($_GET['page']))
{
    Router::goRoute($_GET['page']);
}
else
{
    // Идём домой, если никакая страница не указана
    Router::goRoute('');
}
