<?php

class UsersView {
    /*
        Метод для отображения формы входа пользователя
    */
    public function displaySigninForm($userMessage = null)
    {
        /*
            Общие параметры представления
        */
        $pageTitle    = "Вход в систему";                  // Заголовок страницы
        $pageContent  = "signin-form";                     // Шаблон для отображения
        //$userLoggedIn = UsersModel::userIsLoggedIn();      // Авторизован ли пользователь?
        //$currentUser  = UsersModel::getCurrentUsername();  // ..если да, то как его зовут
        $showNavbar   = false;                             // Показывать панель навигации?
        $showHeader   = false;                             // Показывать шапку?

        /*
            Параметры выбранного шаблона
        */
        // См. во входных параметрах этого метода

        // Загрузка главного шаблона
        require('./core/templates/index.phtml');
    }
}