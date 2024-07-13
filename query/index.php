<?php
error_reporting(E_ERROR | E_PARSE);

class db
{
    private $hostname = "localhost";
    private $username = "root";
    private $dbName = "oop_ecomm";
    private $password = "";

    public $mysql = null;
    public $result = [];
    public $sql = '';


    public function __construct()
    {
        $this->mysql = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);
    }


    // GET DATA FROM DATABASE

    public function getData($table, $rows = "*", $join = null, $clause = null, $order = null, $lim = null)
    {
        if($this->check_table($table)) {
            $this->sql = "SELECT $rows FROM $table";
            if($join) {
                $this->sql .= " JOIN $join";
            }
            if($clause) {
                $this->sql .= " WHERE $clause";
            }
            if($order) {
                $this->sql .= " ORDER BY $order";
            }
            if($lim) {
                $this->sql .= " LIMIT $lim";
            }

            $res = $this->mysql->query($this->sql);
            if($res->num_rows > 0) {
                $this->result = $res->fetch_all(MYSQLI_ASSOC);

            }

        } else {
            die("Please enter a valid table name");
        }
    }



    // CHECK IF TABLE EXISTS
    public function check_table($table)
    {
        $sql = "SHOW TABLES LIKE '{$table}'";
        $this->mysql = $this->mysql->query($sql);
        if($this->mysql->num_rows > 0) {
            $this->mysql = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);
            return true;
        } else {
            $this->mysql = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);
            return false;
        }
    }


    // GET RESULTS
    public function getRes()
    {
        if($this->result != []) {
            return $this->result;
        }
    }

    public function __destruct()
    {
        $this->mysql->close();
    }
}
