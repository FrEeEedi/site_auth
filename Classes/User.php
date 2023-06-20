<?php

require_once('UserStore.php');

class User
{
    private $user_store;

    private function __construct(DataBase $db)
    {
        $this->user_store = new UserStore($db);
    }

    public function getUserByID($id)
    {
    }
}
