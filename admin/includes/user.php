<?php

class User
{
    public function  findAllUsers()
    {
        global $database;
        $sql = "SELECT * FROM users";

        $result = $database->query($sql);
        return $result;
    }
}