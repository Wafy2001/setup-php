<?php 

namespace Core;
use PDO;

class Database {
    public $connection;
    public $statement;

    public function __construct($config)
    {
        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this -> connection = new PDO($dsn , "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
}
    public function query ($query, $params = []){
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }
    public function findAll() { 
       return $this->statement->fetchAll();
    }
    

}


?>