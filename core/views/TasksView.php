<?php

class TasksView
{
    /*
        Метод для отображения списка задач
    */
    public function displayListView($tasks, $pageNum, $totalPages, $listSortBy, $listOrderBy, $userMessage = null)
    {
        /*
            Общие параметры представления
        */
        $pageTitle    = "Список всех задач";               // Заголовок страницы
        $pageContent  = "task-list";                       // Шаблон для отображения
        $userLoggedIn = UsersModel::userIsLoggedIn();      // Авторизован ли пользователь?
        $currentUser  = UsersModel::getCurrentUsername();  // ..если да, то как его зовут
        $showNavbar   = true;                              // Показывать панель навигации?
        $showHeader   = true;                              // Показывать шапку?

        /*
            Параметры выбранного шаблона
        */
        // См. во входных параметрах этого метода

        // Загрузка главного шаблона
        require('./core/templates/index.phtml');
    }

    /*
        Метод для отображения формы добавления новой задачи
    */
    public function displayNewTaskForm($task = null, $editMode = false, $userMessage = null)
    {
        /*
            Общие параметры представления
        */
        $pageTitle    = $editMode ? "Редактирование задачи" : "Добавление новой задачи";  // Заголовок страницы
        $pageContent  = "task-edit-form";                  // Шаблон для отображения
        $userLoggedIn = UsersModel::userIsLoggedIn();      // Авторизован ли пользователь?
        $currentUser  = UsersModel::getCurrentUsername();  // ..если да, то как его зовут
        $showNavbar   = true;                              // Показывать панель навигации?
        $showHeader   = true;                              // Показывать шапку?

        /*
            Параметры выбранного шаблона
        */
        if ($task != null)
        {
            $taskId       = $task->taskId;
            $taskUsername = $task->username;
            $taskEmail    = $task->email;
            $taskContent  = $task->content;
            $taskState    = $task->isDone;
        }

        // Загрузка главного шаблона
        require('./core/templates/index.phtml');
    }
}
