<?php

class dbh {

    private $host = "";
    private $user = "";
    private $pwd = "";
    private $dbname = "";

    protected function connect(){

        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
        
    }

}