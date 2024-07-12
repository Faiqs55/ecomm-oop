<?php 

class db{
    private $hostname = "localhost";
    private $username = "root";
    private $dbName = "oop_ecomm";
    private $password = "";

    public $mysql = null;
    public $result = [];
    public $sql = '';
    

    function __construct()
    {
        $this->mysql = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);
    }

    // ADD DATA TO DB 
    function add($table, $params){
        if($this->check_table($table)){
           $cols = implode(", ", array_keys($params));
           $vals = implode("', '", $params);
           $sql = "INSERT INTO $table($cols) VALUES('{$vals}')";
           
           if($this->mysql->query($sql)){
               array_push($this->result, "Query successfull ('$vals') Inserted in Table");
           }
        }else{
            die("Please Enter a valid Table name");
        }
    }

    // CHECK IF TABLE EXISTS 
    function check_table($table){
        $sql = "SHOW TABLES LIKE '{$table}'";
        $this->mysql = $this->mysql->query($sql);
        if($this->mysql->num_rows > 0){
            $this->mysql = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);
            return true;
        }else{
            $this->mysql = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);
            return false;
        }
    }


    // GET RESULTS
    function getRes(){
        if($this->result != []){
            echo "<pre>";
            print_r($this->result);
            echo "</pre>";
        }
    }

    function __destruct()
    {
        $this->mysql->close();
    }
}

$obj = new db();

$obj->add("admin", ["name"=> "Faiq", "pass"=> "mango"]);
$obj->getRes();