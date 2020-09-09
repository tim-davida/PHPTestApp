<?php

/*
    Контроллер Пользователей
*/
class UsersCtrl extends DBHandler
{
    private $usersModel;
    private $usersView;

    function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->usersView  = new UsersView();
    }

    // Метод для вызова попытки авторизации
    private function logInAction()
    {
        /*
            -Прибыл тут один
            -Оформить?
            -Оформить как надо!
        */
        $newUser = new User(
                null,
                $_POST['inputLogin'],
                $_POST['inputPassword']
            );

        // Пробуем авторизовать пользоветля
        try {
            $this->usersModel->tryLogIn($newUser);
            // Возвращаемся домой
            header('Location: http://'.$_SERVER['HTTP_HOST'].APP_HOME);
        }
        catch (Exception $ex) {
            // Если не получилось, то выводим ошибку на форму
            $this->usersView->displaySigninForm($ex->getMessage());
        }
    }

    // Метод для вызова попытки 'разлогинивания'
    private function logOutAction()
    {
        // Выходим из системы
        $this->usersModel->logOut();
        // Возвращаемся домой
        header('Location: http://'.$_SERVER['HTTP_HOST'].APP_HOME);
    }
    

    // Метод для вывода списка Задач
    public function run()
    {
        if(isset($_GET['action']))
        {
            // Вызываем соответствующий метод в зависимости от указанного действия
            switch ($_GET['action']) {
                case 'signin':
                    $this->logInAction();
                    break;
                case 'logout':
                    $this->logOutAction();
                    break;
            }
        }
        else
        {
            // ..иначе просто показываем форму
            $this->usersView->displaySigninForm();
        }
    }
}
