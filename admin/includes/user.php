<?php

class User
{
    public $id;
    public $userName;
    public $password;
    public $firstName;
    public $lastName;

    public static function  findAllUsers()
    {
        $sql = "SELECT * FROM users";
        return self::findThisQuery($sql);
    }

    public static function findUserById($id)
    {
        global $database;
        $sql = "SELECT * FROM users WHERE id =".$id;

        $result = self::findThisQuery($sql);
        $foundUser = $result->fetch_assoc();

        return $foundUser;
    }

    public static function findThisQuery($sql)
    {
        global $database;

        $result = $database->query($sql);

        return $result;
    }
}