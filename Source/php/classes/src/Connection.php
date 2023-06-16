<?php
class Connection{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $charset;
    private $pdo;
    private $dsn;
    function __construct()
    {

    }
    function getConnection(){
        $this->host=="localhost";
        $this->dbname="selfeducation";
        $this->username="root";
        $this->password="ibr@him2001";
        $this->charset="utf8mb4";

        $this->dsn='mysql:host='.$this->host.';dbname='.$this->dbname.";charset=".$this->charset;
        try {
            $this->pdo=new PDO($this->dsn,$this->username,$this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (\Exception $e) {
            echo "Connection failed : ".$e->getMessage();
        }
    }
}