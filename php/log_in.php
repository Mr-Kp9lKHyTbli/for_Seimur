<?php
    $login = filter_var(trim($_POST['log']),FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

    $mysql = new mysqli_connect('localhost', 'root', 'root', 'zero');

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'")
    $user = $result->fetch_assoc();
    if(count($user) == 0) {
        echo "Неверный логин или пароль";
        exit();
    } else {
        echo"Авторизация прошла успешно";
        exit();
    }

    $mysql->close();
?>