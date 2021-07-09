<?php

class Dbh
{
    private $host = "localhost:3306";
    private $user = "root";
    private $pwd = "root";
    private $dbName = "myusers";

    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    public function write($sql, $data = array())
    {

        $con = $this->connect();

        $stm = $con->prepare($sql);
        $result = $stm->execute($data);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
