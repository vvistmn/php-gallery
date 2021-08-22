<?php

require_once 'config.php';

class Database
{
    public $connection;

    public function __construct()
    {
        $this->open_db_connection();
    }

    public function open_db_connection ()
    {
//        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//        if (mysqli_connect_errno()) {
//            die('DB connection failed'.mysqli_error());
//        }

        if ($this->connection->connect_errno) {
            die('DB connection failed'.$this->connection->connect_error);
        }
    }

    public function query($sql)
    {
//        $result = mysqli_query($this->connection, $sql);
        $result = $this->connection->query($sql);

        $this->confirmQuery($result);

        return $result;
    }

    private function confirmQuery($result)
    {
        if (!$result) {
//            die('Query failed'.mysqli_error($this->connection));
            die('Query failed'.$this->connection->error);
        }
    }

    public function escapeString($string)
    {
//        $escapedString = mysqli_real_escape_string($this->connection, $string);
        $escapedString = $this->connection->real_escape_string($string);

        return $escapedString;
    }

    public function insertId()
    {
//        return mysqli_insert_id($this->connection);
        return $this->connection->insert_id;
    }
}

$database = new Database();
