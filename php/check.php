<?php
    $login = filter_var(trim($_POST['log']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $surname = filter_var(trim($_POST['surn']),FILTER_SANITIZE_STRING);
    $patron = filter_var(trim($_POST['patron']),FILTER_SANITIZE_STRING);
    $birth = filter_var(trim($_POST['birth']),FILTER_SANITIZE_STRING);


    if(mb_strlen($login) <= 2 || mb_strlen($login) > 20) {
        echo "Длина логина должна иметь от 3 до 20 символов";
        exit;
    }
    if(mb_strlen($password) < 6) {
        echo "Длина пароля длжна быть не меньше 6 символов";
        exit;
    }
    if(mb_strlen($name) < 1) {
        echo "Введите имя";
        exit;
    }
    if(mb_strlen($surname) < 1) {
        echo "Введите фамилию";
        exit;
    }
    if(mb_strlen($patron) < 1) {
        echo "Введите отчество";
        exit;
    }
    $mysql = new mysqli('localhost', 'root', 'root', 'zero');
    $mysql->query("INSERT INTO `users` (`login`, `password`) VALUES('$login', '$password')");
    $mysql->query("INSERT INTO `users_full` (`surname`, `name`, `patronymic`, `birthday`) VALUES('$surname', '$name', '$patron', '$birth' )");
    $mysql->close();
?>