<?php

namespace ToDo;

use PDO;
use PDOException;

class Database
{

    public $con;
    public $host = "localhost";
    public $username = "root";
    public $password = "root";
    public $db = "todos";


    // __construct function to connect database using PDO
    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Connection Error" . $e->getMessage();
        }
    }
}
