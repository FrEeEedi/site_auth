<?php
class DataBase
{
    private $server = 'localhost';
    private $login = 'root';
    private $password = '';
    private $charset = 'utf8';
    private $db;

    public function __construct()
    {
        $this->db = new mysqli($this->server, $this->login, $this->password, 'project');

        if ($this->db != false) {
            $this->db->set_charset($this->charset);
        }
    }
    public function login($login, $password)
    {
        $login_check_query = $this->db->query(
            "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'"
        );

        return $login_check_query->num_rows;
    }
}
