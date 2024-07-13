<?php
error_reporting(E_ERROR | E_PARSE);


session_start();
if(!$_SESSION['admin']) {
    header("Location: http://localhost/ecomm.oop/admin");
}

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

    // ADD DATA TO DB
    public function add($table, $params, $type = null)
    {
        if($this->check_table($table)) {
            $cols = implode(", ", array_keys($params));
            $vals = implode("', '", $params);
            $this->sql = "INSERT INTO $table($cols) VALUES('{$vals}')";
            if(!$type) {
                $this->sql .= "; UPDATE categories SET no_products = no_products + 1 WHERE c_id = {$params["p_category"]}";
            }
            if($this->mysql->multi_query($this->sql)) {
                array_push($this->result, "Query successfull ('$vals') Inserted in Table");
            }
        } else {
            die("Please Enter a valid Table name");
        }
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

    // UPDATE DATA FROM DATABASE
    public function updateData($table, $params = array(), $clause)
    {
        if($this->check_table($table)) {
            // $cols = implode(", ", array_keys($params));
            // $vals = implode("', '", $params);
            $vals = '';
            foreach ($params as $key => $value) {
                $vals = "$key = '$value'";
            }
            $this->sql = "UPDATE $table SET $vals $clause";
            if($this->mysql->query($this->sql)) {
                array_push($this->result, "Update ($vals) $clause");
            }
        } else {
            die("ENTER A VALID TABLE NAME");
        }
    }


    // DELETE FROM DATABASE
    public function deleteData($table, $clause)
    {
        if($this->check_table($table)) {
            $this->sql = "DELETE FROM $table $clause";
            if($this->mysql->query($this->sql)) {
                array_push($this->result, "Deleted From database $clause");
            }
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

