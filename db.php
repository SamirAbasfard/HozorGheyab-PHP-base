<?php

class class_db
{
    public $conection_database;

    public function __construct()
    {
// ارتباط با دیتابیس
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "hozor-gheyab-db";

// Create connection
        $this->conection_database = new mysqli($servername, $username_db, $password_db, $dbname);
// Check connection
        if ($this->conection_database->connect_error) {
            die("Connection failed: " .$this->conection_database->connect_error);
        }
    }
}