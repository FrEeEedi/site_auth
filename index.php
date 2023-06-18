<?php

include_once './header.php';
include './Classes/includeClasses.php';

$db = new DataBase();
$auth = new Auth($db);
$login = '';
$password = '';

if (isset($_POST['login']) && $_POST['password']) {

    $login = $_POST['login'];
    $password = $_POST['password'];
}

if ($login && $password) {
    $login_result = $auth->login($login, $password);
}

if (isset($login_result)) { ?>
    <p>Контент для авторизованного пользователя</p>
<?php } else { ?>
    <h1>Авторизация на сайте</h1>
    <form action="" method="POST">
        <input type="text" name="login" id="form_login">
        <input type="password" name="password" id="form_password">
        <input type="submit" value="Отправить">
    </form>
<?php }




include_once './footer.php';
