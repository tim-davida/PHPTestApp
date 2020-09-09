<?php

/*
    Контроллер Задач
*/
class TasksCtrl
{
    private const ROWS_PER_PAGE = 10;

    private $tasksModel;
    private $tasksView;

    function __construct()
    {
        $this->tasksModel = new TasksModel();
        $this->tasksView  = new TasksView();
    }

    // Метод для добавления новой задачи в БД
    private function addNewTaskAction()
    {
        // Формируем объект Задачи и пробуем добавить его в БД
        try
        {
            $newTask = new Task(
                    null,
                    $_POST['user'],
                    $_POST['email'],
                    $_POST['content'],
                    false
                );
            $this->tasksModel->addTask($newTask);

            // Если всё ок, то возвращаемся домой
            header('Location: http://'.$_SERVER['HTTP_HOST'].APP_HOME);
        }
        // Если не выходит, то выводим сообщение об ошибке
        catch (Exception $ex)
        {
            $this->tasksView->displayNewTaskForm($newTask, false, $ex->getMessage());
        }
    }

    // Метод для отображения страницы для изменения задачи
    private function editTaskAction()
    {
        $task_id = $_GET['task_id'];
        if (isset($task_id))
        {
            // Пробуем вытащить из БД запись о Задаче по её ID
            try
            {
                $task = $this->tasksModel->getTask($task_id);
                $this->tasksView->displayNewTaskForm($task, true);
            }
            // Если не получается, то выводим ошибку
            catch (Exception $ex)
            {
                $this->tasksView->displayNewTaskForm(null, false, $ex->getMessage());
            }
        }
    }

    // Метод для обновления записи о Задаче в БД
    private function updateTaskAction()
    {
        // Формируем объект Задачи и пробуем обновить его запись в БД
        try
        {
            print_r($_POST['state']);
            $task = new Task(
                    $_POST['task_id'],
                    $_POST['user'],
                    $_POST['email'],
                    $_POST['content'],
                    ($_POST['state'] == 'true') ? 1 : 0  // Это какой-то PHP'ый кошмар, или я дурак просто?
                );
            $this->tasksModel->updateTask($task);

            // Если всё ок, то возвращаемся домой
            header('Location: http://'.$_SERVER['HTTP_HOST'].APP_HOME);
        }
        // Если не получается, то выводим ошибку
        catch (Exception $ex)
        {
            $this->tasksView->displayNewTaskForm($task, true, $ex->getMessage());
        }
    }

    // Метод для удаления задачи из БД
    private function deleteTaskAction()
    {
        $task_id = $_GET['task_id'];
        if (isset($task_id))
        {
            // Пробуем удалить из БД запись о Задаче по её ID
            try
            {
                $task = $this->tasksModel->deleteTask($task_id);

                // Если всё ок, то возвращаемся домой
                header('Location: http://'.$_SERVER['HTTP_HOST'].APP_HOME);
            }
            // Если не получается, то выводим ошибку
            catch (Exception $ex)
            {
                $this->tasksView->displayNewTaskForm(null, false, $ex->getMessage());
            }
        }
    }

    
    /*
        Методы для "запуска" контроллера
    */

    // Метод для вывода списка Задач
    public function runTasksList()
    {
        // Обработка входных параметров
        $listPage    = isset($_GET['listPage']) ? $_GET['listPage'] : 1;
        $listSortBy  = isset($_GET['sortby']) ? $_GET['sortby'] : "TaskID";
        $listOrderBy = isset($_GET['orderby']) ? $_GET['orderby'] : "DESC";

        // Получения всего списка задач
        $tasks = $this->tasksModel->getTasks($listPage, self::ROWS_PER_PAGE, $listSortBy, $listOrderBy);

        // Получение количества всех записей
        $totalRows = $this->tasksModel->getTotalRows();
        // Вычисление количества страниц (зависит от максимального числа выводимых строк)
        $totalPages = ceil($totalRows / self::ROWS_PER_PAGE);

        // Вывод полученных данных в шаблон
        $this->tasksView->displayListView($tasks, $listPage, $totalPages, $listSortBy, $listOrderBy);
    }

    // Метод для вывода формы для работы с Задачей
    public function runNewTaskForm()
    {
        if (isset($_GET['action']))
        {
            switch ($_GET['action']) {
                case 'add':
                    $this->addNewTaskAction();
                    break;
                case 'edit':
                    $this->editTaskAction();
                    break;
                case 'update':
                    $this->updateTaskAction();
                    break;
                case 'delete':
                    $this->deleteTaskAction();
                    break;
                default:
                    throw new Exception("Invalid parameter value!", 1);
                    break;
            }
        }
        else
        {
            $this->tasksView->displayNewTaskForm();
        }
    }
}
