<?php


namespace App\data;

use PDO;
use PDOException;

error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");


class Database
{

    protected
        $host,
        $dbname,
        $user,
        $password,
        $db;

    function __construct($host = "", $dbname = "", $user = "", $password = "")
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->dataBase = "job";

        try {
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->dataBase", $this->user, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }

    }

    function testConnection()
    {

        if (!$this->db) //if no connection end
        {
            $this->db = true;
        } else {
            function __destruct()
            {
                return $this->db = null;
            }
        }

    }

}