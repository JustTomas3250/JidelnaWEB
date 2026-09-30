<?php

class Database {
    private $host;
    private $user;
    private $password;
    private $dbname;
    private $dbport;

    private $dbh;   //handler
    private $stmt;  //sql statement
    private $error;

    public function __construct()
    {
        $this->host = getenv('DB_HOST');
        $this->user = getenv('DB_USER');
        $this->dbname = 'jidelnadb';
        $this->dbport = getenv('9090');

        $passwordFile = getenv('PASSWORD_FILE_PATH');
        $this->password = '';

        if ($passwordFile && file_exists($passwordFile)) {
            $this->password = trim(file_get_contents($passwordFile)); 
        }

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';port=' . $this->dbport;

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function results()
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function result() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function bind($param, $value)
    {   
        $this->stmt->bindValue($param, $value);
    }
}

?>