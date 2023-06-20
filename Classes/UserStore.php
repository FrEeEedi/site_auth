<?php

class UserStore
{
    public $db_connection;

    public function __construct(DataBase $db)
    {
        $this->db_connection = $db->connection;
    }

    public function checkUser($login, $password)
    {
        $result = [];

        if ($this->db_connection->connect_error) {

            $result = $this->db_connection->connect_error;

            return $result;
        }

        $query = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
        $login_check_query = $this->db_connection->query($query);

        if ($login_check_query->num_rows) {

            $result = $this->getUserID($login);

            return $result;
        }

        return 'Неправильный логи или пароль';
    }

    public function getUserID($login)
    {
        $query = "SELECT * FROM users WHERE login = '$login'";
        $user_result = $this->db_connection->query($query);

        if ($user_result->num_rows) {

            $user_array = $this->resultToArray($user_result);

            return $user_array['id'];
        }

        return 'Неправильный логин';
    }

    public function resultToArray($result)
    {
        return $result->fetch_assoc();
    }
}
