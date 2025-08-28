<?php
interface queryInterface{
    public function setSelectQuery($sql, $params);
    
    public function setInsertQuery($sql, $params);
}

class db implements queryInterface
{
    public $pdo;

    public function __construct()
    {
        # construct dns
        $pdo = new PDO('mysql:host=localhost;dbname=www;port=3306', 'root', '');
        return $pdo;
    }

        public function setSelectQuery($sql, $params)
    {
        # Query Select
        $query = $this->__construct()->prepare($sql);
        $query->execute($params);
        $games = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $games;
    }
        public function setInsertQuery($sql, $params)
    {
        
        # Query Insert
        $query = $this->__construct()->prepare($sql);
        $query->execute($params);

    }

}

?>