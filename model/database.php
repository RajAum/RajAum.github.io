<?php
class Database{
    protected $dbhost;
    protected $dbpass;
    protected $dbname;
    protected $dbuser;
    public $connection;
    public function __construct(){
        $dbhost = 'localhost';
        $dbuser ='myuser';
        $dbpass ='myPassword';
        $dbname = 'studentdb';
        $this->connection = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
        if ($this->connection->connect_error){
            $this->error('Failed to connnect to MySQL - ');
        }
    }
    
    public function runQuery($sql){
        $result = $this->connection->query($sql);
        return $result;
    }
}
?>
