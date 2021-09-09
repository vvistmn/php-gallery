<?php

class User
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

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
        return !empty($result) ? array_shift($result) : false;
    }

    public static function findThisQuery($sql)
    {
        global $database;

        $result = $database->query($sql);
        $objArray = [];

        while ($row = mysqli_fetch_array($result)) {
            $objArray[] = self::instantion($row);
        }

        return $objArray;
    }

    public static function instantion($request)
    {
        $thisObj = new self;

        foreach ($request as $attribute => $value) {
            if ($thisObj->hasAttribute($attribute)) {
                $thisObj->$attribute = $value;
            }
        }

        return $thisObj;
    }

    private function hasAttribute($attribute)
    {
        $curProperties = get_object_vars($this);
        return array_key_exists($attribute, $curProperties);
    }
}