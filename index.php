<?php

include_once './header.php'; 

if (isset($_GET['logout'])) {
    setcookie('userID', '', time() - 60);
}
?>

<h1>Авторизация на сайте</h1>
<form action="/profile.php" method="POST">
    <input type="text" name="login" id="form_login">
    <input type="password" name="password" id="form_password">
    <input type="submit" value="Отправить">
</form>

<?php
include_once './footer.php';
