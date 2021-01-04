<?php
class Quiz {
    public $host;
    public $username;
    public $password;
    public $dbname;
    public $connection;
    public $statement;
    public $query;
    public $data;

    function __construct() {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'php-quiz';
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname",
        "$this->username", "$this->password");
    }

    function execute_query() {
        $this->statement = $this->connection->prepare($this->query);
        $this->statement->execute($this->data);
    }

    function total_rows() {
        $this->execute_query();
        return $this->statement->rowCount();
    }

    function redirect($page) {
        header("location: $page");
        exit();
    }

    function result() {
        $this->execute_query();
        return $this->statement->fetchAll();
    }
}

?>