<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbnm = DB_NAME;

    private $dbh;
    private $stmnt;

    public function __construct()
    {
        $dsn = 'mysql:host='. $this->host .';dbname=' . $this->dbnm;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmnt = $this->dbh->prepare($query);
    }

    public function bind($param, $value){
        $this->stmnt->bindValue($param, $value);
    }

    public function execute()
    {
        $this->stmnt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmnt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmnt->rowCount();
    }
}